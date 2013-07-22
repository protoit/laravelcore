<ul class="unstyled messages clear">
<?php if($message){
          foreach ($message as $value):
          $unix = human_to_unix($value->time); ?>
          <li class="<?=$value->status;?>">
          <a href="<?=base_url()?>cmessages/view/<?=$value->id;?>" id="listmessage<?=$value->id;?>" class="ajax">
            <img class="userpic img-rounded" src="
            
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
            <h5><?php if(isset($value->sender_u)){echo $value->sender_u;}else{ echo $value->sender_c; } ?> 
              <span class="pull-right time">
                <?php $date_today = date('Y-m-d');
                      $date = date('Y-m-d', $unix);
                      if($date == $date_today){ 
                            echo date($core_settings->date_time_format, $unix); 
                          }else{
                           echo date($core_settings->date_format, $unix); 
                } ?>
              </span></h5>
            <span> <?=$value->subject;?></span>
          </a>
          </li>
          <?php endforeach;?>
          
  		<?php } else{ ?>
        <li><?=$this->lang->line('application_no_messages');?></li>
        <?php } ?>
</ul>
<div style="height:50px">
      <div class="dataTables_paginate paging_two_button">
           <?php if($message_list_page_prev >= 0){ ?>
            <a href="<?=base_url()?>cmessages/messagelist/<?=$message_list_page_prev;?><?php if(isset($deleted)){echo $deleted;}?>" class="paginate_enabled_previous message-list"><?=$this->lang->line('application_previous');?></a><?php }else{ ?><a href="#" class="paginate_disabled_previous"><?=$this->lang->line('application_previous');?></a><?php } if($message_list_page_next < $message_rows){ ?><a href="<?=base_url()?>cmessages/messagelist/<?=$message_list_page_next;?><?php if(isset($deleted)){echo $deleted;}?>" class="paginate_enabled_next message-list"><?=$this->lang->line('application_next');?></a><?php }else{ ?><a href="#" class="paginate_disabled_next"><?=$this->lang->line('application_next');?></a>
          <?php } ?>
        </div>
<div>
     
        
      

