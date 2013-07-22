<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admintimesheets extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        

        $access = FALSE;
        if($this->client){    
            redirect('cprojects');
        }elseif($this->user){
            foreach ($this->view_data['menu'] as $key => $value) { 
                if($value->link == "admintimesheets"){
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
        


        $this->content_view = 'admintimesheets/all';
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
        $this->content_view = 'admintimesheets/all';
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
    }    
    function assign($id = FALSE)
    {    
        $this->load->helper('notification');
        if($_POST){
            unset($_POST['send']);
            $id = $_POST['id'];
            $project = Project::find_by_id($id);
            $sql = "SELECT user_id FROM project_has_workers WHERE project_id=".$id;
            $query = $this->db->query($sql);
            $query = $query->result_array();
            foreach($query as $k => $a) {
                if (is_array($a)) { $query[$k] = $a['user_id']; }
            }

            $added = array_diff($_POST["user_id"], $query);
            $removed = array_diff($query, $_POST["user_id"]);

            foreach ($added as $value){
            $sql = "INSERT INTO `project_has_workers` (`project_id`, `user_id`) VALUES (".$id.", ".$value.")";
            $query = $this->db->query($sql);
            $receiver = User::find_by_id($value);
            send_notification($receiver->email, $this->lang->line('application_notification_project_assign_subject'), $this->lang->line('application_notification_project_assign').'<br><strong>'.$project->name.'</strong>');
            }

            foreach ($removed as $value){
            $sql = "DELETE FROM `project_has_workers` WHERE user_id = ".$value." AND project_id=".$id;
            $query = $this->db->query($sql);
            //$receiver = User::find_by_id($value);
            }

               if(!$query){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_save_project_error'));}
               else{$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_save_project_success'));}
            redirect('projects/view/'.$id);
        }else
        {
            $this->view_data['users'] = User::find('all',array('conditions' => array('status=?','active')));
            $this->view_data['project'] = Project::find($id);
            $this->theme_view = 'modal';
            $this->view_data['title'] = $this->lang->line('application_assign_to_agents');
            $this->view_data['form_action'] = 'projects/assign';
            $this->content_view = 'projects/_assign';
        }    
    }    
    function delete($id = FALSE)
    {    
        $project = Project::find($id);
        $project->delete();
        $sql = 'DELETE FROM project_has_tasks WHERE project_id = "'.$id.'"';
        $this->db->query($sql);
        $this->content_view = 'projects/all';
        if(!$project){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_delete_project_error'));}
               else{$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_delete_project_success'));}
            if(isset($view)){redirect('projects/view/'.$id);}else{redirect('projects');}
    }
    function timer_reset($id = FALSE){
        $project = Project::find($id);
        $attr = array('time_spent' => '0');
        $project->update_attributes($attr);
        $this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_timer_reset'));
        redirect('projects/view/'.$id);
    }
    function view($id = FALSE)
    { 
        $this->view_data['submenu'] = array();
        $this->view_data['project'] = Project::find($id);
        $tasks = ProjectHasTask::count(array('conditions' => 'project_id = '.$id));
        $tasks_done = ProjectHasTask::count(array('conditions' => array('status = ? AND project_id = ?', 'done', $id)));
        $this->view_data['progress'] = $this->view_data['project']->progress;
        if($this->view_data['project']->progress_calc == 1){
            if ($tasks) {$this->view_data['progress'] = round($tasks_done/$tasks*100);}
            $attr = array('progress' => $this->view_data['progress']);
            $this->view_data['project']->update_attributes($attr);
        }
        $projecthasworker = ProjectHasWorker::all(array('conditions' => array('user_id = ? AND project_id = ?', $this->user->id, $id)));
        if(!$projecthasworker && $this->user->admin != 1){ 
                $this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_no_access_error'));
                redirect('projects'); 
        }
        $tracking = $this->view_data['project']->time_spent;
        if(!empty($this->view_data['project']->tracking)){ $tracking=(time()-$this->view_data['project']->tracking)+$this->view_data['project']->time_spent; }
            
        $tracking = floor($tracking/60);
        $tracking_hours = floor($tracking/60);
        $tracking_minutes = $tracking-($tracking_hours*60);

        $this->view_data['time_spent'] = $tracking_hours." ".$this->lang->line('application_hours')." ".$tracking_minutes." ".$this->lang->line('application_minutes');
        $this->content_view = 'projects/view';

    }
    function tasks($id = FALSE, $condition = FALSE, $task_id = FALSE)
    {
        $this->view_data['submenu'] = array(
                                $this->lang->line('application_back') => 'projects',
                                $this->lang->line('application_overview') => 'projects/view/'.$id,
                                 );
        switch ($condition) {
            case 'add':
                $this->content_view = 'projects/_tasks';
                if($_POST){
                    unset($_POST['send']);
                    $_POST = array_map('htmlspecialchars', $_POST);
                    $_POST['project_id'] = $id;
                    $task = ProjectHasTask::create($_POST);
                       if(!$task){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_save_task_error'));}
                       else{$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_save_task_success'));}
                    redirect('projects/view/'.$id);
                }else
                {
                    $this->theme_view = 'modal';
                    $this->view_data['project'] = Project::find($id);
                    $this->view_data['title'] = $this->lang->line('application_add_task');
                    $this->view_data['form_action'] = 'projects/tasks/'.$id.'/add';
                    $this->content_view = 'projects/_tasks';
                }    
                break;
            case 'update':
                $this->content_view = 'projects/_tasks';
                $this->view_data['task'] = ProjectHasTask::find($task_id);
                if($_POST){
                    unset($_POST['send']);
                    if(!isset($_POST['public'])){$_POST['public'] = 0;}
                    $_POST = array_map('htmlspecialchars', $_POST);
                    $task_id = $_POST['id'];
                    $task = ProjectHasTask::find($task_id);
                    $task->update_attributes($_POST);
                       if(!$task){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_save_task_error'));}
                       else{$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_save_task_success'));}
                    redirect('projects/view/'.$id);
                }else
                {
                    $this->theme_view = 'modal';
                    $this->view_data['project'] = Project::find($id);
                    $this->view_data['title'] = $this->lang->line('application_edit_task');
                    $this->view_data['form_action'] = 'projects/tasks/'.$id.'/update/'.$task_id;
                    $this->content_view = 'projects/_tasks';
                }    
                break;
            case 'check':
                    $task = ProjectHasTask::find($task_id);
                    if ($task->status == 'done'){$task->status = 'open';}else{$task->status = 'done';}
                    $task->save();
                    $project = Project::find($id);
                    $tasks = ProjectHasTask::count(array('conditions' => 'project_id = '.$id));
                    $tasks_done = ProjectHasTask::count(array('conditions' => array('status = ? AND project_id = ?', 'done', $id)));
                    if($project->progress_calc == 1){
                        if ($tasks) {$progress = round($tasks_done/$tasks*100);}
                        $attr = array('progress' => $progress);
                        $project->update_attributes($attr);
                    }
                       if(!$task){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_save_task_error'));}
                       $this->theme_view = 'ajax';
                       $this->content_view = 'projects';
                break;
            case 'delete':
                    $task = ProjectHasTask::find($task_id);
                    $task->delete();
                       if(!$task){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_delete_task_error'));}
                       else{$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_delete_task_success'));}
                    redirect('projects/view/'.$id);
                break;
            default:
                $this->view_data['project'] = Project::find($id);
                $this->content_view = 'projects/tasks';
                break;
        }

    }
    function media($id = FALSE, $condition = FALSE, $media_id = FALSE)
    {
        $this->view_data['submenu'] = array(
                                $this->lang->line('application_back') => 'projects',
                                $this->lang->line('application_overview') => 'projects/view/'.$id,
                                 $this->lang->line('application_tasks') => 'projects/tasks/'.$id,
                                 $this->lang->line('application_media') => 'projects/media/'.$id,
                                 );
        switch ($condition) {
            case 'view':

                if($_POST){
                    unset($_POST['send']);
                    unset($_POST['_wysihtml5_mode']);
                    //$_POST = array_map('htmlspecialchars', $_POST);
                    $_POST['project_id'] = $id;
                    $_POST['media_id'] = $media_id;
                    $_POST['from'] = $this->user->firstname.' '.$this->user->lastname;
                    $message = Message::create($_POST);
                       if(!$message){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_save_message_error'));}
                       else{$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_save_message_success'));}
                       redirect('projects/media/'.$id.'/view/'.$media_id);
                }
                $this->content_view = 'projects/view_media';
                $this->view_data['media'] = ProjectHasFile::find($media_id);
                $this->view_data['form_action'] = 'projects/media/'.$id.'/view/'.$media_id;
                $this->view_data['filetype'] = explode('.', $this->view_data['media']->filename);
                $this->view_data['filetype'] = $this->view_data['filetype'][1];
                $this->view_data['backlink'] = 'projects/view/'.$id;
                break;
            case 'add':
                $this->content_view = 'projects/_media';
                $this->view_data['project'] = Project::find($id);
                if($_POST){
                    $config['upload_path'] = './files/media/';
                    $config['encrypt_name'] = TRUE;
                    $config['allowed_types'] = '*';

                    $this->load->library('upload', $config);

                    if ( ! $this->upload->do_upload())
                        {
                            $error = $this->upload->display_errors('', ' ');
                            $this->session->set_flashdata('message', 'error:'.$error);
                            redirect('projects/media/'.$id);
                        }
                        else
                        {
                            $data = array('upload_data' => $this->upload->data());

                            $_POST['filename'] = $data['upload_data']['orig_name'];
                            $_POST['savename'] = $data['upload_data']['file_name'];
                            $_POST['type'] = $data['upload_data']['file_type'];
                        }

                    unset($_POST['send']);
                    unset($_POST['userfile']);
                    unset($_POST['file-name']);
                    $_POST = array_map('htmlspecialchars', $_POST);
                    $_POST['project_id'] = $id;
                    $_POST['user_id'] = $this->user->id;
                    $media = ProjectHasFile::create($_POST);
                       if(!$media){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_save_media_error'));}
                       else{$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_save_media_success'));}
                    redirect('projects/view/'.$id);
                }else
                {
                    $this->theme_view = 'modal';
                    $this->view_data['title'] = $this->lang->line('application_add_media');
                    $this->view_data['form_action'] = 'projects/media/'.$id.'/add';
                    $this->content_view = 'projects/_media';
                }    
                break;
            case 'update':
                $this->content_view = 'projects/_media';
                $this->view_data['media'] = ProjectHasFile::find($media_id);
                $this->view_data['project'] = Project::find($id);
                if($_POST){
                    unset($_POST['send']);
                    unset($_POST['_wysihtml5_mode']);
                    $_POST = array_map('htmlspecialchars', $_POST);
                    $media_id = $_POST['id'];
                    $media = ProjectHasFile::find($media_id);
                    $media->update_attributes($_POST);
                       if(!$media){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_save_media_error'));}
                       else{$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_save_media_success'));}
                    redirect('projects/view/'.$id);
                }else
                {
                    $this->theme_view = 'modal';
                    $this->view_data['title'] = $this->lang->line('application_edit_media');
                    $this->view_data['form_action'] = 'projects/media/'.$id.'/update/'.$media_id;
                    $this->content_view = 'projects/_media';
                }    
                break;
            case 'delete':
                    $media = ProjectHasFile::find($media_id);
                    $media->delete();
                    $this->load->database();
                    $sql = "DELETE FROM messages WHERE media_id = $media_id";
                    $this->db->query($sql);
                       if(!$media){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_delete_media_error'));}
                       else{    unlink('./files/media/'.$media->savename);
                               $this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_delete_media_success'));
                           }
                    redirect('projects/view/'.$id);
                break;
            default:
                $this->view_data['project'] = Project::find($id);
                $this->content_view = 'projects/view/'.$id;
                break;
        }

    }
    function deletemessage($project_id, $media_id, $id){
                    $message = Message::find($id);
                    if($message->from == $this->user->firstname." ".$this->user->lastname || $this->user->admin == "1"){
                    $message->delete();
                    }
                       if(!$message){
                           $this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_delete_message_error'));
                       }
                       else{ 
                           $this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_delete_message_success'));
                       }
                    redirect('projects/media/'.$project_id.'/view/'.$media_id);
    }
    function tracking($id = FALSE)
    {
        $project = Project::find($id);
        if(empty($project->tracking)){
            $project->update_attributes(array('tracking' => time()));    
            
        }else{
        $timeDiff=time()-$project->tracking;
        $project->update_attributes(array('tracking' => '', 'time_spent' => $project->time_spent+$timeDiff));
        }
        redirect('projects/view/'.$id);

    }
    function sticky($id = FALSE)
    {
        $project = Project::find($id);
        if($project->sticky == 0){
            $project->update_attributes(array('sticky' => '1'));
               $this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_make_sticky_success'));    
            
        }else{
        $project->update_attributes(array('sticky' => '0'));
        $this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_remove_sticky_success'));
        }
        redirect('projects/view/'.$id);

    }
    function download($media_id = FALSE){
        $media = ProjectHasFile::find($media_id);
        $media->download_counter = $media->download_counter+1;
        $media->save();
        header('Content-type: '.$media->type);
        header('Content-disposition: attachment; filename='.$media->filename);
        readfile('./files/media/'.$media->savename);
    }

}