<div id="options">
			<div class="btn-group margintop5 nav-tabs normal-white-space" data-toggle="buttons-radio">
				<?php foreach ($submenu as $name=>$value):?>
	                <a class="btn btn-mini" id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><?=$name?></a>
	            <?php endforeach;?>
	            
			</div>
			<script type="text/javascript">$(document).ready(function() { 
	            	$('.nav-tabs #<?php $last_uri = end(explode("/", uri_string())); if($val_id[count($val_id)-2] != "settings"){echo end($val_id);}else{ echo $last_uri;} ?>').button('toggle'); });
	        </script> 

		</div>
		<hr/>
<div class="table_head"><h6><i class="icon-cog"></i><?=$this->lang->line('application_settings');?></h6></div>
<?php   
$attributes = array('class' => '', 'id' => 'settings_form');
echo form_open_multipart($form_action, $attributes); 
?>
<table id="settings" cellspacing="0" cellpadding="0">
	<thead>
		<th><?=$this->lang->line('application_option');?></th>
		<th><?=$this->lang->line('application_value');?></th>
	</thead>
    <tr>
        <td><?=$this->lang->line('application_bank_name');?></td>
        <td><input type="text" name="bank_name" class="required no-margin span6" value="<?=$settings->bank_name;?>"></td>
    </tr>
    <tr>
        <td><?=$this->lang->line('application_bank_account');?></td>
        <td><input type="text" name="bank_account" class="required no-margin span6" value="<?=$settings->bank_account;?>"></td>
    </tr>
    <tr>
        <td><?=$this->lang->line('application_organization_number');?></td>
        <td><input type="text" name="organization_number" class="required no-margin span6" value="<?=$settings->organization_number;?>"></td>
    </tr>
	<tr>
		<td><?=$this->lang->line('application_company_name');?></td>
		<td><input type="text" name="company" class="required no-margin span6" value="<?=$settings->company;?>"></td>
	</tr>
	<tr>
		<td><?=$this->lang->line('application_contact');?></td>
		<td><input type="text" name="invoice_contact" class="required no-margin span6" value="<?=$settings->invoice_contact;?>"></td>
	</tr>
	<tr>
		<td><?=$this->lang->line('application_address');?></td>
		<td><input type="text" name="invoice_address" class="required no-margin span6" value="<?=$settings->invoice_address;?>"></td>
	</tr>
    <tr>
        <td><?=$this->lang->line('application_zip_code');?></td>
        <td><input type="text" name="zip_code" class="required no-margin span6" value="<?=$settings->zip_code;?>"></td>
    </tr>
	<tr>
		<td><?=$this->lang->line('application_city');?></td>
		<td><input type="text" name="invoice_city" class="required no-margin span6" value="<?=$settings->invoice_city;?>"></td>
	</tr>
	<tr>
		<td><?=$this->lang->line('application_phone');?></td>
		<td><input type="text" name="invoice_tel" class="required no-margin span6" value="<?=$settings->invoice_tel;?>"></td>
	</tr>
		<tr>
		<td><?=$this->lang->line('application_email');?></td>
		<td><input type="text" name="email" class="required no-margin span6" value="<?=$settings->email;?>"></td>
	</tr>
	<tr>
		<td><?=$this->lang->line('application_domain');?> <a class="cursor po pull-right" rel="popover" data-content="Full URL to your Freelance Cockpit installation. Including subfolder i.e. http://www.yoursite.com/FC/" data-original-title="Domain URL"><i class="fam-information"></i></a>
		</td>
		<td><input type="text" name="domain" class="required no-margin span6" value="<?=$settings->domain;?>">
			
		</td>
	</tr>
	<tr>
		<td><?=$this->lang->line('application_logo');?> <a class="cursor po pull-right" rel="popover" data-content="<div class='logo'><img src='<?=$core_settings->logo;?>'></div>" data-original-title="<?=$this->lang->line('application_logo');?>"><i class="fam-information"></i></a>
		</td>
		<td>
			<input type="file" name="userfile" id="file">
			<div class="dummyfile">
				<div class="input-append no-margin">
					<input id="filename" type="text" class="input span6" name="file-name">
					<a id="fileselectbutton" rel="upload1" class="btn"><?=$this->lang->line('application_select');?></a>

				</div>

			</div>
		</td>
	</tr>
	<tr>
		<td><?=$this->lang->line('application_invoice');?> <?=$this->lang->line('application_logo');?> <a class="cursor po pull-right" rel="popover" data-content="<div class='logo' style='background:#FFFFFF'><img src='<?=$core_settings->invoice_logo;?>'></div>" data-original-title="<?=$this->lang->line('application_invoice');?> <?=$this->lang->line('application_logo');?>"><i class="fam-information"></i></a>
		</td>
		<td>
			<input type="file" name="userfile2" id="file2">
			<div class="dummyfile">
				<div class="input-append no-margin">
					<input id="filename2" type="text" class="input span6" name="file-name2">
					<a id="fileselectbutton2" class="btn"><?=$this->lang->line('application_select');?></a>

				</div>

			</div>
		</td>
	</tr>
	<tr>
		<td><?=$this->lang->line('application_tax');?></td>
		<td>
			<div class="input-append">
				<input class="number required  no-margin span1" name="tax" id="appendedInput" type="text" value="<?=$settings->tax;?>"><span class="add-on">%</span>
			</div>
		</td>
	</tr>
	<tr>
		<td><?=$this->lang->line('application_default_currency');?></td>
		<td><input type="text" name="currency" class="required no-margin span1" value="<?=$settings->currency;?>"></td>
	</tr>
	<tr>
		<td><?=$this->lang->line('application_default_template');?></td>
		<td> <?php $options = array();
			if ($handle = opendir('application/views/')) {

		        while (false !== ($entry = readdir($handle))) {
		              if ($entry != "." && $entry != ".." && $entry != "index.html") {
		              	$options[$entry] = ucwords($entry);
	                	}
				}
				closedir($handle);
			}
			echo form_dropdown('template', $options, $settings->template, 'style="width:250px"'); ?>
		</td>
	</tr>
	<tr>
		<td><?=$this->lang->line('application_default_language');?></td>
		<td> <?php $options = array();
			if ($handle = opendir('application/language/')) {

		        while (false !== ($entry = readdir($handle))) {
		              if ($entry != "." && $entry != "..") {
		              	$options[$entry] = ucwords($entry);
	                	}
				}
				closedir($handle);
			}
			echo form_dropdown('language', $options, $settings->language, 'style="width:250px"'); ?>
		</td>
	</tr>
	<tr>
		<td><?=$this->lang->line('application_date_format');?></td>
		<td> <?php $options = array(
			'F j, Y'  => date("F j, Y"),
			'Y/m/d'    => date("Y/m/d"),
			'm/d/Y' => date("m/d/Y"),
			'd/m/Y' => date("d/m/Y"),
			'd.m.Y' => date("d.m.Y"),
			'd-m-Y' => date("d-m-Y"),
			);
			echo form_dropdown('date_format', $options, $settings->date_format, 'style="width:250px"'); ?>
		</td>
	</tr>
	<tr>
		<td><?=$this->lang->line('application_date_time_format');?></td>
		<td> <?php $options = array(
			'g:i a'  => date("g:i a"),
			'g:i A'    => date("g:i A"),
			'H:i' => date("H:i"),
			);
			echo form_dropdown('date_time_format', $options, $settings->date_time_format, 'style="width:250px"'); ?>
		</td>
	</tr>
		<tr>
			<td><?=$this->lang->line('application_default_terms');?></td>
			<td><textarea class="textarea required no-margin span12" name="invoice_terms" rows="5"><?=$settings->invoice_terms;?></textarea></td>
		</tr>
		<tr>
			<td class="bottom" colspan="2">
			 <input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
			</td>
		</tr>

	</table>
	
	<?php echo form_close(); ?>