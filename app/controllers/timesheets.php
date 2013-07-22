<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timesheets extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        

        $access = FALSE;
            if($this->user || $this->client){
            foreach ($this->view_data['menu'] as $key => $value) { 
                if($value->link == "timesheets"){
                    $access = TRUE;
                }
            }
            if(!($access)){redirect($this->view_data['menu'][0]->link);}
            
        }else{
            redirect('login');
        }

    }
    
    function index()
    {
        $year = date('Y', time());
        $tax = $this->view_data['core_settings']->tax;
        $this->load->database();
        $sql = "select invoices.paid_date, ROUND(sum(invoice_has_items.value*invoice_has_items.amount)-if(SUBSTR(invoices.discount,-1)='%',(sum(invoice_has_items.value*invoice_has_items.amount)/100*(SUBSTRING(invoices.discount, 1, CHAR_LENGTH(invoices.discount) - 1))), invoices.discount)+sum(invoice_has_items.value*invoice_has_items.amount)/100*$tax,0) as summary FROM invoices, invoice_has_items where invoices.id = invoice_has_items.invoice_id AND invoices.`status` = 'Paid' AND paid_date between '$year-01-01'
AND '$year-12-31' GROUP BY SUBSTR(invoices.paid_date,1,7)";
        $query = $this->db->query($sql);
        $this->view_data["stats"] = $query->result();
        $this->view_data["year"] = $year;
        //Projects
            //open
            $this->view_data["projects_open"] = Project::count(array('conditions' => array('progress < ?', 100)));
            //all
            $this->view_data["projects_all"] = Project::count();
        //invoices
            //open
            $this->view_data["invoices_open"] = Invoice::count(array('conditions' => array('status != ?', 'Paid')));
            //all
            $this->view_data["invoices_all"] = Invoice::count();
        //payments open
        $thismonth = date('m');
        $this->view_data["month"] = date('M');
        $sql = "select invoices.paid_date, ROUND(sum(invoice_has_items.value*invoice_has_items.amount)-if(SUBSTR(invoices.discount,-1)='%',(sum(invoice_has_items.value*invoice_has_items.amount)/100*(SUBSTRING(invoices.discount, 1, CHAR_LENGTH(invoices.discount) - 1))), invoices.discount)+sum(invoice_has_items.value*invoice_has_items.amount)/100*$tax,0) as summary FROM invoices, invoice_has_items where invoices.id = invoice_has_items.invoice_id AND invoices.`status` = 'Paid' AND paid_date between '$year-$thismonth-01'
AND '$year-$thismonth-31' ";
        $query = $this->db->query($sql);
        $this->view_data["payments"] = $query->result();
        //payments outstanding
        $thismonth = date('m');
        $this->view_data["month"] = date('M');
        $sql = "select invoices.paid_date, ROUND(sum(invoice_has_items.value*invoice_has_items.amount)-if(SUBSTR(invoices.discount,-1)='%',(sum(invoice_has_items.value*invoice_has_items.amount)/100*(SUBSTRING(invoices.discount, 1, CHAR_LENGTH(invoices.discount) - 1))), invoices.discount)+sum(invoice_has_items.value*invoice_has_items.amount)/100*$tax,0) as summary FROM invoices, invoice_has_items where invoices.id = invoice_has_items.invoice_id AND invoices.`status` != 'Paid' ";
        $query = $this->db->query($sql);
        $this->view_data["paymentsoutstanding"] = $query->result();
        

        

        //Events
        $events = array();
        $date = date('Y-m-d', time());
        $eventcount = 0;
        foreach ($this->view_data['menu'] as $key => $value) { 
                if($value->link == "invoices"){
                    $sql = 'SELECT * FROM invoices WHERE status != "Paid" AND due_date < "'.$date.'" ORDER BY due_date';
                    $res = $this->db->query($sql);
                    $res = $res->result();
                    foreach ($res as $key2 => $value2) {
                        $eventline = str_replace("{invoice_number}", '<a href="'.base_url().'invoices/view/'.$value2->id.'">#'.$value2->reference.'</a>', $this->lang->line('event_invoice_overdue'));
                        $events[$value2->due_date.".".$value2->id] = $eventline;
                        $eventcount = $eventcount+1;
                    }
                    
                }
                if($value->link == "projects"){
                    $sql = 'SELECT * FROM projects WHERE progress != "100" AND end < "'.$date.'" ORDER BY end';
                    $res = $this->db->query($sql);
                    $res = $res->result();

                    foreach ($res as $key2 => $value2) {
                        if($this->user->admin == 0){ 
                            $sql = "SELECT id FROM `project_has_workers` WHERE project_id = ".$value->id." AND user_id = ".$this->user->id;
                            $query = $this->db->query($sql);
                            $res = $query->result();
                            if($res){
                                $eventline = str_replace("{project_number}", '<a href="'.base_url().'projects/view/'.$value2->id.'">#'.$value2->reference.'</a>', $this->lang->line('event_project_overdue'));
                                $events[$value2->end.".".$value2->id] = $eventline;
                                $eventcount = $eventcount+1;
                            }
                        }else{
                            $eventline = str_replace("{project_number}", '<a href="'.base_url().'projects/view/'.$value2->id.'">#'.$value2->reference.'</a>', $this->lang->line('event_project_overdue'));
                            $events[$value2->end.".".$value2->id] = $eventline;
                            $eventcount = $eventcount+1;
                        }
                    }
                }
                if($value->link == "subscriptions"){
                    $sql = 'SELECT * FROM subscriptions WHERE status != "Inactive" AND end_date > "'.$date.'" AND next_payment <= "'.$date.'" ORDER BY next_payment';
                    $res = $this->db->query($sql);
                    $res = $res->result();
                    foreach ($res as $key2 => $value2) {
                        $eventline = str_replace("{subscription_number}", '<a href="'.base_url().'subscriptions/view/'.$value2->id.'">#'.$value2->reference.'</a>', $this->lang->line('event_subscription_new_invoice'));
                        $events[$value2->next_payment.".".$value2->id] = $eventline;
                        $eventcount = $eventcount+1;
                    }
                    
                }
                if ($value->link == "messages") {
                    $sql = 'SELECT privatemessages.id, privatemessages.`status`, privatemessages.subject, privatemessages.message, privatemessages.`time`, privatemessages.`recipient`, clients.`userpic` as userpic_c, users.`userpic` as userpic_u  , users.`email` as email_u , clients.`email` as email_c , CONCAT(users.firstname," ", users.lastname) as sender_u, CONCAT(clients.firstname," ", clients.lastname) as sender_c
                            FROM privatemessages
                            LEFT JOIN clients ON CONCAT("c",clients.id) = privatemessages.sender
                            LEFT JOIN users ON CONCAT("u",users.id) = privatemessages.sender 
                            GROUP by privatemessages.id HAVING privatemessages.recipient = "u'.$this->user->id.'"AND privatemessages.status != "deleted" ORDER BY privatemessages.`time` DESC LIMIT 6';
                    $query = $this->db->query($sql);
                    $this->view_data["message"] = array_filter($query->result());
                }
                if ($value->link == "projects") {
                    $sql = 'SELECT * FROM project_has_tasks WHERE status != "done" AND user_id = "'.$this->user->id.'" ORDER BY project_id';
                    $taskquery = $this->db->query($sql);
                    $this->view_data["tasks"] = $taskquery->result();
                }

        }
        krsort($events);
        $this->view_data["events"] = $events;
        $this->view_data["eventcount"] = $eventcount;
        


        $this->content_view = 'timesheets/all';
    }
    function filter($year = FALSE){
        if(!$year){ $year = date('Y', time()); }
        $this->load->database();
        $sql = "select invoices.paid_date, sum(invoice_has_items.value*invoice_has_items.amount) as summary FROM invoices, invoice_has_items where invoices.id = invoice_has_items.invoice_id AND invoices.`status` = 'Paid' AND paid_date between '$year-01-01'
AND '$year-12-31' GROUP BY invoices.paid_date";
        $query = $this->db->query($sql);
        $sql = "select invoices.paid_date, sum(invoice_has_items.value*invoice_has_items.amount) as summary FROM invoices, invoice_has_items where invoices.id = invoice_has_items.invoice_id AND invoices.`status` = 'Paid' GROUP BY invoices.paid_date";
        $jan = $this->db->query($sql);
        $this->view_data["stats"] = $query->result();
        $this->view_data["year"] = $year;
        $this->content_view = 'timesheets/all';
    }
    function create()
    {    
        if($_POST){
            unset($_POST['send']);
            $_POST['datetime'] = time();
            $_POST = array_map('htmlspecialchars', $_POST);
            $project = Project::create($_POST);
            $new_project_reference = $_POST['reference']+1;
            $project_reference = Setting::first();
            $project_reference->update_attributes(array('project_reference' => $new_project_reference));
               if(!$project){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_create_project_error'));}
               else{$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_create_project_success'));
                   $project_last = Project::last();
                   $sql = "INSERT INTO `project_has_workers` (`project_id`, `user_id`) VALUES (".$project_last->id.", ".$this->user->id.")";
                $query = $this->db->query($sql);
                   }
            redirect('projects');
        }else
        {
            $this->view_data['companies'] = Company::find('all',array('conditions' => array('inactive=?','0')));
            $this->view_data['next_reference'] = Project::last();
            $this->theme_view = 'modal';
            $this->view_data['title'] = $this->lang->line('application_create_project');
            $this->view_data['form_action'] = 'projects/create';
            $this->content_view = 'projects/_project';
        }    
    }    
    function update($id = FALSE)
    {    
        
        if($id!=NULL){
            $timesheet = Timesheet::find($id);
            $objectcat = Objectcat::all();
            
            ?>
            <div id="response_modal" class="modal hide fade in" style="display: block;" aria-hidden="false">
            <div class="modal-header">
            <h3><?=$this->lang->line('application_edit_timesheets');?></h3>
            </div>
            <div class="modal-body">
            <form method="post" action="<?php echo base_url();?>timesheets/update_record">
            <input type="hidden" name="id" value="<?php echo $timesheet->id;?>"/>
            <div class="modal-inner">
            
            <!-- Write to $timesheet->date and Fetch from same column -->
            <p>
            <?php
            $fromSQL = $timesheet->date;
            $newSQLDate = date("d/m/Y", strtotime($fromSQL)); ?>
            <label><?=$this->lang->line('application_date');?></label>
            <input type="text" name="date" value="<?php echo $newSQLDate;?>"/>
            </p>
            <!-- Write to $timesheet->tjenestenr and Fetch from same column -->
            <p>
            <label><?=$this->lang->line('application_employeeID');?></label>
            <input type="text" name="tjenestenr" value="<?php echo $timesheet->tjenestenr;?>"/>
            </p>
            <!-- Write to $timesheet->start and Fetch from same column -->
            <p>
            <label><?=$this->lang->line('application_shift_start');?></label>
            <input type="text" name="start" value="<?php echo $timesheet->start;?>"/>
            </p>
            <!-- Write to $timesheet->end and Fetch from same column -->
            <p>
            <label><?=$this->lang->line('application_shift_end');?></label>
            <input type="text" name="end" value="<?php echo $timesheet->end;?>"/>
            </p>
            <!-- Write to $timesheet->object -->
            <p>
            <label>Object</label>
            <select class="required inpt" name="txtemail">
            <option>2 Kokker</option>
            <option>Bobs Pub</option>
            <option>Choice Pub</option>
            <option selected>Grønlandstorg</option>
            <option>Norges Taxi</option>
            <option>Olafiagangen</option>
            <option>Operabar</option>
            <option>Posthallen</option>
            <option>Star Gate</option>
            </select>
            </p>
            <!-- Write to $timesheet->qty and Fetch from same column -->
            <p>
            <label><?=$this->lang->line('application_qty');?></label>
            <input type="text" name="qty" value="<?php echo $timesheet->qty;?>"/>
            </p>
            </div>
            <div class="modal-footer">
            <input type="submit" name="submit" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
            <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
            </div>
            <?php echo form_close(); ?>
            </div>
            </div>
            <?php
            
            
        }
        die();
        /*
        if($_POST){
            unset($_POST['send']);
            $id = $_POST['id'];
            $_POST = array_map('htmlspecialchars', $_POST);
            if (!isset($_POST["progress_calc"])) {
                $_POST["progress_calc"] = 0;
            }
            $project = Project::find($id);
            $project->update_attributes($_POST);
               if(!$project){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_save_project_error'));}
               else{$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_save_project_success'));}
            redirect('projects/view/'.$id);
        }else
        {
            $this->view_data['companies'] = Company::find('all',array('conditions' => array('inactive=?','0')));
            $this->view_data['project'] = Project::find($id);
            $this->theme_view = 'modal';
            $this->view_data['title'] = $this->lang->line('application_edit_project');
            $this->view_data['form_action'] = 'projects/update';
            $this->content_view = 'projects/_project';
        }    
        */
    }    
    
    function update_record(){
        if($_POST){
            $date = $_POST['date'];
            $datetimeold = DateTime::createFromFormat('d/m/Y', ($date));
            $newDate = $datetimeold->format('Y-m-d');
            $_POST[$newDate] = $newDate;
            $record = Timesheet::find($_POST['id']);
            $record->date = $_POST[$newDate];
            $record->start = $_POST['start'];
            $record->end = $_POST['end'];
            $record->object = $_POST['txtemail'];
            $record->qty = $_POST['qty'];
            $record->tjenestenr = $_POST['tjenestenr'];
            $record->save();
            redirect('timesheets');            
        }    
    }
       
    function delete($id = FALSE)
    {    
    
        if($id!=FALSE){
            $timesheet = Timesheet::find($id);
            $timesheet->status = "inactive";
            $timesheet->save();            
        }
        redirect('timesheets');
        
        
        /*
        $project = Project::find($id);
        $project->delete();
        $sql = 'DELETE FROM project_has_tasks WHERE project_id = "'.$id.'"';
        $this->db->query($sql);
        $this->content_view = 'projects/all';
        if(!$project){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_delete_project_error'));}
               else{$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_delete_project_success'));}
            if(isset($view)){redirect('projects/view/'.$id);}else{redirect('projects');}
        */
    }

}