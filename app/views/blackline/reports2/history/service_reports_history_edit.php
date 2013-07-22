<div id="response_modal" class="modal hide fade in" style="display: block;" aria-hidden="false">
            <div class="modal-header">
            <h3>Ny logg</h3>
            </div>
            <div class="modal-body">
            <form>
            <p>
            <label>Dato &amp; Tid</label>
            <input type="text" name="history-date" id="history-date" value="$service_reports_history->datetime" />
            </p>
            
            <p>
            <label>Tjenestenr</label>
            <input type="text" name="history-tjenestenr" id="history-tjenestenr" value="$service_reports_history->tjenestenr" />
            </p>
            <p>
            <label>Beskrivelse</label>
            <textarea ="history-description" id="history-description" value="$service_reports_history->description"></textarea>
            </p>
            <?php if(@$this->user->admin){ ?>
            <p>
            <label>Tjenestenr</label>
            <input type="text" name="history-tjenestenr" id="history-tjenestenr" value="$service_reports_history->service_reports_id" />
            </p>
            <? } ?>
            </form>
            </div>
            <div class="modal-footer">
            <input type="submit" name="submit" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
            <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
            </div>
            </div>