<div id="main">
 <div class="span3 message-sidebar">
<div class="message-bar">
  <a id="message-trigger" href="<?=base_url()?>messages/messagelist" class="tt rb first message-list" title="<?=$this->lang->line('application_messages');?>" rel="tooltip" data-placement="top"><i class="icon-inbox"></i></a>
  <a href="<?=base_url()?>messages/messagelist/0/deleted" class="tt rb message-list" title="<?=$this->lang->line('application_messages_show_deleted');?>" rel="tooltip" data-placement="top"><i class="icon-trash"></i></a>
  <a href="<?=base_url()?>messages/write" data-toggle="modal" class="tt pull-right" title="<?=$this->lang->line('application_write_message');?>" rel="tooltip" data-placement="top"><i class="icon-envelope"></i></a>
</div>

 	<div id="message-list">
         <ul class="unstyled messages clear"> 
          </ul>
      </div>
 </div>
 
 <div id="ajax_content" class="span9">

 </div>


	 	<br clear="all">

	</div>
	