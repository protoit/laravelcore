<div id="mainfull">
<?php   
$attributes = array('class' => '', 'id' => '_quotation');
echo form_open($form_action, $attributes); 
?>
<div class="top"><?=$this->lang->line('quotation_website_quotation');?>

<div class="btn-group pull-right">
                                    <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">
                                      <img src="<?=base_url()?>assets/blackline/img/<?php if($this->input->cookie('language') != ""){echo $this->input->cookie('language');}else{echo "english";} ?>.png" style="margin-top:-1px" align="middle">
                                      <span class="caret"></span>
                                    </a>
                                     <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dLabel">
                                        <?php if ($handle = opendir('application/language/')) {

									          while (false !== ($entry = readdir($handle))) {
									              if ($entry != "." && $entry != "..") {
									                ?><li><a href="<?=base_url()?>agent/language/<?=$entry;?>"><img src="<?=base_url()?>assets/blackline/img/<?=$entry;?>.png" class="language-img"><?=ucwords($entry);?></a></li>
                                  <?php } }
      									           closedir($handle);
      									          } ?>
                      
                                      </ul>
                                  </div>
      
</div>
		
<div class="row">
		<span class="question"><?=$this->lang->line('quotation_question_1');?></span>
			
			<div class="radiobutton"><input type="radio" id="q1_aw1" name="q1" value="1" checked="checked" /><label for="q1_aw1"><?=$this->lang->line('quotation_question_1_aw_1');?></label></div>
			<div class="radiobutton"><input type="radio" id="q1_aw2" name="q1" value="2"><label for="q1_aw2"><?=$this->lang->line('quotation_question_1_aw_2');?></label></div>
			<div class="radiobutton"><input type="radio" id="q1_aw3" name="q1" value="3"><label for="q1_aw3"><?=$this->lang->line('quotation_question_1_aw_3');?></label></div>
			<div class="radiobutton"><input type="radio" id="q1_aw4" name="q1" value="4"><label for="q1_aw4"><?=$this->lang->line('quotation_question_1_aw_4');?></label></div>
			<div class="radiobutton"><input type="radio" id="q1_aw5" name="q1" value="5"><label for="q1_aw5"><?=$this->lang->line('quotation_question_1_aw_5');?></label></div>
		<br/>

		<span class="question"><?=$this->lang->line('quotation_question_2');?></span>

			<div class="radiobutton"><input type="radio" id="q2_aw1" name="q2" value="1" checked="checked" /><label for="q2_aw1"><?=$this->lang->line('quotation_question_2_aw_1');?></label></div>
			<div class="radiobutton"><input type="radio" id="q2_aw2" name="q2" value="2"><label for="q2_aw2"><?=$this->lang->line('quotation_question_2_aw_2');?></label></div>
			<div class="radiobutton"><input type="radio" id="q2_aw3" name="q2" value="3"><label for="q2_aw3"><?=$this->lang->line('quotation_question_2_aw_3');?></label></div>
			<div class="radiobutton"><input type="radio" id="q2_aw4" name="q2" value="4"><label for="q2_aw4"><?=$this->lang->line('quotation_question_2_aw_4');?></label></div>
 
		<br/>

		<span class="question"><?=$this->lang->line('quotation_question_3');?></span>
			
			<div class="radiobutton"><input type="radio" id="q3_aw1" name="q3" value="1" checked="checked"><label for="q3_aw1"><?=$this->lang->line('quotation_question_3_aw_1');?></label></div>
			<div class="radiobutton"><input type="radio" id="q3_aw2" name="q3" value="2"><label for="q3_aw2"><?=$this->lang->line('quotation_question_3_aw_2');?></label></div>
		<br/>

		<span class="question"><?=$this->lang->line('quotation_question_4');?></span>
			<input class="required " type="text" name="q4" maxlength="100" value="http://">
		<br/>

		<span class="question"><?=$this->lang->line('quotation_question_5');?> *</span>			
			<textarea class="required " rows="6" name="q5"  maxlength="400"></textarea>

		<br/>

		<span class="question"><?=$this->lang->line('quotation_question_6');?> (<?=$core_settings->currency;?>)</span>

			<div class="radiobutton"><input type="radio" id="q6_aw1" name="q6" value="1"  checked="checked" /><label for="q6_aw1"><?=$this->lang->line('quotation_question_6_aw_1');?></label></div>
			<div class="radiobutton"><input type="radio" id="q6_aw2" name="q6" value="2"><label for="q6_aw2"><?=$this->lang->line('quotation_question_6_aw_2');?></label></div>
			<div class="radiobutton"><input type="radio" id="q6_aw3" name="q6" value="3"><label for="q6_aw3"><?=$this->lang->line('quotation_question_6_aw_3');?></label></div>
			<div class="radiobutton"><input type="radio" id="q6_aw4" name="q6" value="4"><label for="q6_aw4"><?=$this->lang->line('quotation_question_6_aw_4');?></label></div>
 		<br/>

			<span class="question"><?=$this->lang->line('quotation_question_7');?></span>	
			<input class=" " name="company" type="text" maxlength="100" value="">
 		<br/>

 			<span class="question"><?=$this->lang->line('quotation_question_8');?> *</span>	
			<input class="required " type="text" name="fullname" maxlength="100" value="">
 		<br/>

			<span class="question"><?=$this->lang->line('quotation_question_9');?> *</span>
			<input class="required email " type="text" name="email" maxlength="100" value="">
 		<br/>

			<span class="question"><?=$this->lang->line('quotation_question_10');?> *</span>
			<input class="required " type="text" name="phone" maxlength="100" value="">
 		<br/>
 		
			<span class="question"><?=$this->lang->line('quotation_question_11');?> *</span>
			<input class="required " type="text" name="address" maxlength="100" value="">
 		<br/>
 		
			<span class="question"><?=$this->lang->line('quotation_question_12');?> *</span>
			<input class="required " type="text" name="city" maxlength="100" value="">
 		<br/>
 		
 			<span class="question"><?=$this->lang->line('quotation_question_13');?> *</span>
			<input class="required " type="text" name="zip" maxlength="100" value="">
 		<br/>

			<span class="question"><?=$this->lang->line('quotation_question_14');?> *</span>
			<input class="required " type="text" name="country" maxlength="100" value="">
 		<br/>

			<span class="question"><?=$this->lang->line('quotation_question_15');?></span>		
			<textarea name="comment" class="" rows="6" maxlength="400"></textarea>
		<br clear="all">
</div>
	<div class="bottom">
		<input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('quotation_save');?>"/>
	</div>
<?php echo form_close(); ?>
</div>