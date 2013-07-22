<div class="login">
          <div class="center"><img src="<?=base_url()?><?=$core_settings->logo;?>" alt="<?=$core_settings->company;?>" /></div>
         <?php $attributes = array('class' => 'form well', 'id' => 'login'); ?>
         <?=form_open('forgotpass', $attributes)?>
              <p><?=$this->lang->line('application_identify_account');?></p>
                  <div class="control-group">
                    <label class="control-label" for="email"><?=$this->lang->line('application_email');?></label>
                    <div class="controls">
                      <input type="text" class="span3" name="email" id="email" placeholder="<?=$this->lang->line('application_email');?>">
                    </div>
                  </div>
                
                    <div class="controls">
                      <button type="submit" class="btn btn-primary"><?=$this->lang->line('application_reset_password');?></button>
                      <a href="<?=site_url("login");?>" class="pull-right forgotpass"><?=$this->lang->line('application_go_to_login');?></a>
                    </div>
                <?=form_close()?>
            
         </div>