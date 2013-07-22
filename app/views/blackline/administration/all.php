<div id="options">
            <div class="btn-group margintop5 nav-tabs normal-white-space" data-toggle="buttons-radio">
                <?php foreach ($submenu as $name=>$value):?>
                    <a class="btn btn-mini" id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><?=$name?></a>
                <?php endforeach;?>
                
            </div>
            <script type="text/javascript">$(document).ready(function() { 
                    $('.nav-tabs #<?php $last_uri = end(explode("/", uri_string())); if($val_id[count($val_id)-2] != "settings"){echo end($val_id);}else{ echo $last_uri;} ?>').button('toggle'); });
            </script> 
            <div class="table_head"><h6><i class="icon-cog"></i><?=$this->lang->line('application_settings');?></h6></div>

        </div>