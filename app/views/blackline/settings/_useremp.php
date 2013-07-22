<?php   
$attributes = array('class' => '', 'id' => 'user_form');
echo form_open_multipart($form_action, $attributes); 
?>
 <div class="modal-content">  
  <div class="modal-inner">
  <p>
        <label for="tjenestenr"><?=$this->lang->line('application_employeeID');?> *</label>
        <input id="tjenestenr" type="text" name="tjenestenr" class="required span5"  value="<?php if(isset($user)){echo $user->tjenestenr;} ?>"  />
</p> 
<p>
        <label for="username"><?=$this->lang->line('application_username');?> *</label>
        <input id="username" type="text" name="username" class="required span5"  value="<?php if(isset($user)){echo $user->username;} ?>"  />
</p>
<p>
        <label for="firstname"><?=$this->lang->line('application_firstname');?> *</label>
        <input id="firstname" type="text" name="firstname" class="required span5"  value="<?php if(isset($user)){echo $user->firstname;} ?>"  />
</p>
<p>
        <label for="lastname"><?=$this->lang->line('application_lastname');?> *</label>
        <input id="lastname" type="text" name="lastname" class="required span5"  value="<?php if(isset($user)){echo $user->lastname;} ?>"  />
</p>
<p>
        <label for="email"><?=$this->lang->line('application_email');?> *</label>
        <input id="email" type="text" name="email" class="required email span5" value="<?php if(isset($user)){echo $user->email;} ?>"  />
</p>
<p>
        <label for="password"><?=$this->lang->line('application_password');?> <?php if(!isset($user)){echo '*';} ?></label>
        <input id="password" type="password" name="password" class="span5 <?php if(!isset($user)){echo 'required';} ?>"  minlength="6" />
</p>
<p>
        <label for="password"><?=$this->lang->line('application_confirm_password');?> <?php if(!isset($user)){echo '*';} ?></label>
        <input id="confirm_password" type="password" name="confirm_password" class="span5" equalTo="#password" />
</p>
<p>
        <label for="userfile"><?=$this->lang->line('application_profile_picture');?></label>

              <input type="file" name="userfile" id="file">
              <div class="dummyfile">
                 <div class="input-append">
                      <input id="filename" type="text" class="input span4" name="file-name">
                      <a id="fileselectbutton" class="btn"><?=$this->lang->line('application_select');?></a>
                 </div>
            </div>

</p>
<p>
        <label for="userfile"><?=$this->lang->line('application_user_signature');?></label>

              <input type="file" name="userfile" id="file">
              <div class="dummyfile">
                 <div class="input-append">
                      <input id="filename" type="text" class="input span4" name="file-name">
                      <a id="fileselectbutton" class="btn"><?=$this->lang->line('application_select');?></a>
                 </div>
            </div>

</p>
<?php if(!isset($agent)){ ?>
<p>
        <label for="title"><?=$this->lang->line('application_title');?> *</label>
        <input id="title" type="text" name="title" class="required span5"  value="<?php if(isset($user)){echo $user->title;} ?>"  />
</p>
<p>
        <label for="status"><?=$this->lang->line('application_status');?></label>   
        <?php $options = array(
                                'active'  => $this->lang->line('application_active'),
                                'inactive'    => $this->lang->line('application_inactive')
                               ); ?>

        <?php 
        if(isset($user)){$status = $user->status;}else{$status = 'active';}
        echo form_dropdown('status', $options, $status, 'style="width:100%"');?>
</p>         
<p>
        <label for="admin"><?=$this->lang->line('application_admin');?></label>        
        <?php $options = array(
                                '1'  => $this->lang->line('application_yes'),
                                '0'    => $this->lang->line('application_no')
                               ); ?>

        <?php 
        if(isset($user)){$admin = $user->admin;}else{$admin = '0';}
        echo form_dropdown('admin', $options, $admin, 'style="width:100%"');?>
</p> 
<?php } ?> 
<?php if(!isset($agent) && $this->user->admin == "1"){ 
$access = array();
if(isset($user)){ $access = explode(",", $user->access); }
?>
<?=$this->lang->line('application_module_access');?>
<p>
<ul class="accesslist">
  <?php foreach ($modules as $key => $value) { 
    if ($value->type == "widget" && !isset($wi)) { ?>
     <h5 style="margin-left: -24px;">Widgets</h5>
    <?php $wi = TRUE; } ?>

<li> <input type="checkbox" class="cb" id="r_<?=$value->link;?>" name="access[]" value="<?=$value->id;?>" <?php if(in_array($value->id, $access)){ echo 'checked="checked"';}?>> <label for="r_<?=$value->link;?>"><?=$this->lang->line('application_'.$value->link);?></label>  </li>
<?php } ?>
</ul>
</p>
<?php } ?>

</div>
        <div class="modal-footer">
        <input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
        <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
        </div>

<?php echo form_close(); ?>