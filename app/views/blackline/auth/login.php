<div class="login">
          <div class="center"><img src="<?=base_url()?><?=$core_settings->logo;?>" alt="<?=$core_settings->company;?>" /></div>
         <?php $attributes = array('class' => 'form well', 'id' => 'login'); ?>
         <?=form_open('login', $attributes)?>
              
                  <div class="control-group">
                    <label class="control-label" for="username"><?=$this->lang->line('application_username');?></label>
                    <div class="controls">
                      <input autofocus="autofocus" type="text" class="span3" name="username" id="username" placeholder="<?=$this->lang->line('application_username');?>">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="Password"><?=$this->lang->line('application_password');?></label>
                    <div class="controls">
                      <input type="password" class="span3" name="password" id="password" placeholder="<?=$this->lang->line('application_password');?>">
                    </div>
                  </div>
                    <div class="controls">
                      <button type="submit" class="btn btn-primary"><?=$this->lang->line('application_login');?></button>
                      <a href="<?=site_url("forgotpass");?>" class="pull-right forgotpass"><?=$this->lang->line('application_forgot_password');?></a>
                    </div>
                <?=form_close()?>
                <div class="copyright">
  <div class="center"><img src="<?=base_url()?>files/media/logopp.png" alt="<?=$core_settings->company;?>" /></div>
      <p class="center">&copy; 2013 Utviklet av <a href="http://www.protoit.no">ProtoIT AS</a></p>
  </div>

            
         </div>