<form method="post" action="<?php echo base_url();?>reports/create_history_report/<?php echo $this->uri->segment(3);?>">
<div id="response_modal" class="modal hide fade in" style="display: block;" aria-hidden="false">
            <div class="modal-header">
            <h3>Ny logg</h3>
            </div>
            <div class="modal-body">
            <p>
            <label>Date &amp; Time</label>
            <input type="text" name="history-date" id="history-date" value="<?php echo date('Y-m-d');?>" />
            </p>
            <p>
            <label>Tjenestenr</label>
            <input type="text" name="history-tjenestenr" id="history-tjenestenr" value="<?php echo $this->user->tjenestenr;?>" />
            </p>
            <p>
            <label>Description</label>
            <textarea ="history-description" id="history-description"></textarea>
            </p>
            
            </div>
            <div class="modal-footer">
            <input type="submit" name="submit" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
            <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
            </div>
            </form>