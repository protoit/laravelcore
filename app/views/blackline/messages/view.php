 <?php if($conversation){ 
    $i = 0;
    foreach ($conversation as $value):
      $own = false;
  	  $unix = human_to_unix($value->time); 
      if("u".$this->user->id == $value->sender){ $own = "own";}
      $i = $i+1;
  ?>	
  <div class="message-content <?=$own;?>">
 		<div class="message-header">
      <img class="userpic img-rounded pull-left" src="
       <?php 
              if($value->userpic_u){
                if($value->userpic_u != 'no-pic.png'){
                  echo base_url()."files/media/".$value->userpic_u;
                }else{
                  echo get_gravatar($value->email_u);
                }
                
              }else{
                if($value->userpic_c != 'no-pic.png'){
                  echo base_url()."files/media/".$value->userpic_c;
                }else{
                  echo get_gravatar($value->email_c);
                }
              }
              ?>
      "/>
        <span class="subject"><?=$value->subject;?></span><br>
 				<span class="label label-info"><?php if(isset($value->sender_u)){echo $value->sender_u;}else{ echo $value->sender_c; } ?></span>
	 			<span class="label"><?php  echo date($core_settings->date_format.' '.$core_settings->date_time_format, $unix); ?></span>
        <?php if ($id == $value->id && $value->status != "deleted") { ?>
         <a href="<?=base_url()?>messages/delete/<?=$value->id;?>" rel="" class="confirm btn btn-mini pull-right ajax-silent btn-danger btn-loader btn-loader-red"><?=$this->lang->line('application_delete');?></a>
         <?php } ?>
 		</div>
 		<div class="message-body">
 		<?=$value->message;?>
 		</div>

 	</div>
  <?php if($i == "1" && $own != "own"){ ?>
  <div class="reply">
    <?php   
    $attributes = array('class' => 'ajaxform', 'id' => 'replyform');
    echo form_open('messages/write/reply', $attributes); 
    ?>
    <input type="hidden" name="recipient" value="<?=$value->sender;?>">
    <input type="hidden" name="subject" value="<?=$value->subject;?>">
    <input type="hidden" name="conversation" value="<?=$value->conversation;?>">
    <button id="send" name="send" class="btn btn-primary btn-small btn-loader"><?=$this->lang->line('application_send');?></button>
    <textarea id="reply" name="message" placeholder="<?=$this->lang->line('application_reply');?>"></textarea>

    <?php echo form_close(); ?>

  </div>
  <?php } ?>
  <?php endforeach;?>
    <?php } ?>