	<div id="main">
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
		<div class="table_head"><h6><?=$this->lang->line('application_paypal');?> <?=$this->lang->line('application_settings');?></h6></div>
		<?php   
		$attributes = array('class' => '', 'id' => 'paypal');
		echo form_open_multipart($form_action, $attributes); 
		?>
		<table id="settings" cellspacing="0" cellpadding="0">
		<thead>
			<th><?=$this->lang->line('application_option');?></th>
			<th><?=$this->lang->line('application_value');?></th>
		</thead>

		<tr>
			<td><?=$this->lang->line('application_paypal_active');?></td>
			<td>
				<div class="switch switch-mini" data-on-label="<i class='icon-ok icon-white'></i>" data-off-label="<i class='icon-remove'></i>">
            <input name="paypal" type="checkbox" value="1" <?php if($settings->paypal == "1"){ ?> checked="checked" <?php } ?>>
        </div>
			</td>
		</tr>
		<tr>
			<td><?=$this->lang->line('application_paypal_account');?></td>
			<td><input type="text" name="paypal_account" value="<?=$settings->paypal_account;?>"></td>
		</tr>
		<tr>
			<td><?=$this->lang->line('application_paypal_currency');?></td>
			<td>
				<select name="paypal_currency" style="width:100px">
					<?php if($settings->paypal_currency != ""){ ?><option value="<?=$settings->paypal_currency;?>" selected=""><?=$settings->paypal_currency;?></option><?php } ?>
					<option value="USD" title="$">USD</option>
					<option value="AUD" title="$">AUD</option>
					<option value="BRL" title="R$">BRL</option>
					<option value="GBP" title="£">GBP</option>
					<option value="CAD" title="$">CAD</option>
					<option value="CZK" title="">CZK</option>
					<option value="DKK" title="">DKK</option>
					<option value="EUR" title="€">EUR</option>
					<option value="HKD" title="$">HKD</option>
					<option value="HUF" title="">HUF</option>
					<option value="ILS" title="₪">ILS</option>
					<option value="JPY" title="¥">JPY</option>
					<option value="MXN" title="$">MXN</option>
					<option value="TWD" title="NT$">TWD</option>
					<option value="NZD" title="$">NZD</option>
					<option value="NOK" title="">NOK</option>
					<option value="PHP" title="P">PHP</option>
					<option value="PLN" title="">PLN</option>
					<option value="SGD" title="$">SGD</option>
					<option value="SEK" title="">SEK</option>
					<option value="CHF" title="">CHF</option>
					<option value="THB" title="฿">THB</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?=$this->lang->line('application_paypal_ipn_address');?> <a class="cursor po pull-right" rel="popover" data-content="<?=$this->lang->line('application_paypal_ipn_help');?>" data-original-title="<?=$this->lang->line('application_paypal_ipn_address');?>"><i class="fam-information"></i></td>
			<td><?=base_url()?>paypalipn</td>
		</tr>

		<tr>
			<td class="bottom" colspan="2">
			 <input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
			</td>
		</tr>
	 	</table>
	 	 
		<?php echo form_close(); ?>
	

	</div>