<select onchange="populate_table(this.value)">
<?php
		foreach($the_content as $data){
			if($data->company!=""){
?>			
			<option><?php echo $data->company; ?></option>
<?php
			}
		}
?>			
</select>