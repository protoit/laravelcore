  <script src="<?=base_url()?>assets/blackline/js/raphael-min.js"></script>
  <script src="<?=base_url()?>assets/blackline/js/morris-min.js"></script>
  <STYLE type="text/css">

#form_container
{
    border:1px solid #ccc;
    margin:0 auto;
    text-align:left;
    width:270px;
    list-style-type: none;
    display:block;
    float:left;
}

#form_container li
{
display: inline;
list-style-type: none;
}
 </STYLE>
<div id="main">



    
    <div class="span4 stdpad"><h2><?=$this->lang->line('application_internalnews');?><small> (<?=$eventcount;?>)</small></h2>
        <ul class="eventlist">
           <?php 
        $count = 0;
        foreach ($events as $value):  $count = $count+1; ?>
          <li>
              <p><?=$value;?></p>  
          </li>
        <?php endforeach;?>
         <?php if($count == 0) { ?>
          <li> <p><?=$this->lang->line('application_no_internalnews_yet');?></p></li>
         <?php } ?>
      </ul>
 </div>
<?php if(isset($tasks)){ ?> 
<div class="span4 stdpad">
  <h2><?=$this->lang->line('application_reports');?></h2>
  <ul id="jp-container" class="todo jp-container">
    <?php 
        $count = 0;
        foreach ($tasks as $value):  $count = $count+1; ?>

            <li class="<?=$value->status;?>"><a href="<?=base_url()?>projects/tasks/<?=$value->project_id;?>/check/<?=$value->id;?>" class="ajax-silent task-check">
              <i class="icon-tick"></i></a><a href="<?=base_url()?>projects/view/<?=$value->project_id;?>"><?=$value->name;?></a>
          </li>
         <?php endforeach;?>
         <?php if($count == 0) { ?>
          <li class="notask"><?=$this->lang->line('application_no_reports_yet');?></li>
          <li class="notask"></li>
         <?php } ?>
  </ul>
</div> 
<?php } 
if(isset($message)){ ?>  
<div class="span4 stdpad">
  <h2><?=$this->lang->line('application_recent_messages');?></h2>

      <ul class="unstyled messages dash-messages">
          <?php foreach ($message as $value):?>
          <li>
          <a href="<?=base_url()?>messages">
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
            <h5><?php if(isset($value->sender_u)){echo $value->sender_u;}else{ echo $value->sender_c; } ?></h5>
            <small><?php $unix = human_to_unix($value->time); echo date($core_settings->date_format.' '.$core_settings->date_time_format, $unix); ?></small>
            <span><?php if($value->status == "New"){ echo '<span class="label label-info">'.$this->lang->line('application_'.$value->status).'</span>';}?> <?=$value->subject;?></span>
          </a>
          </li>
          <?php endforeach;?>
           <?php if(empty($message)) { ?>
          <li style="padding: 10px 0 0 0; height: 24px; border-bottom: 1px solid #EEE;"><?=$this->lang->line('application_no_messages');?></li>
         <?php } ?>
      </ul>
      <a href="<?=base_url()?>messages/write" class="btn btn-mini" data-toggle="modal"><i class="icon-edit"></i> <?=$this->lang->line('application_write_message');?></a>
    </div>   
<?php } ?>
    <br clear="both">
    <hr>
    
      <div class="stats-frame">
        <h2><?=$this->lang->line('application_write_in_shiftjournal');?></h2>
        <br clear="all">
        <div id="form_container">
        <form method="post" action="<?php $this->content_view = 'dashboard/submit';; ?>">
        <ul>
        <li id="li_4" >
        <label class="description" for="tjenestenr"><h4>Tjenestenr</h4> </label>
        <div>
            <input id="tjenestenr" name="tjenestenr" class="element text small" type="text" value="<?php echo $this->user->tjenestenr; ?>"/> 
        </div> 
        </li>
        <li id="li_1" >
        <label class="description" for="datetime"><h4>Tid & Dato</h4> </label>
        <span>
            <input id="datetime" name="datetime" class="element text" value="<?php echo date('d/m/Y H:i:s'); ?>" type="text">   
        </span>     
        </li>
        <li>
        <label class="description" for="tasktype"><h4>Type</h4> </label>
        <span>
            <label class="choice" for="element_6_1"><input id="tasktype" name="tasktype" class="element checkbox" type="checkbox" value="1" /> ITV </label>
            <label class="choice" for="element_6_2"><input id="tasktype" name="tasktype" class="element checkbox" type="checkbox" value="1" /> Alarm </label>
            <label class="choice" for="element_6_3"><input id="tasktype" name="tasktype" class="element checkbox" type="checkbox" value="1" /> Bomiljø </label>
        </span> 
        </li>
        <li id="li_7" >
        <label class="description" for="taskcode"><h4>Kode</h4> </label>
        <div>
        <select style="width: 225px;" id="taskcode" name="taskcode">
        <?php
             
                $sql = 'SELECT * FROM shiftjournalcode';
                $result = mysql_query($sql); 
                mysql_query("SET NAMES 'utf8'");
                if (!$result) 
                echo mysql_error(); 
         
                    while($row = mysql_fetch_array($result)){
                    $codedescription = $row[codedescription];
                    $codedescriptionid = $row[id];
                    echo "<option>$codedescriptionid. $codedescription</option>";
                    }
                    ?> 
                    
        </select>
        </div> 
        </li>        
        <li id="li_5" >
        <label class="description" for="qty"><h4>Antall</h4> </label>
        <div>
            <input style="width: 25px;" id="qty" name="qty" class="element text small" type="text" maxlength="255" value=""/> 
        </div> 
        </li>
        <li id="li_3" >
        <label class="description" for="description"><h4>Beskrivelse</h4> </label>
        <div>
            <textarea style="height: 225px;" id="description" name="description"></textarea> 
        </div> 
        </li>

        <li class="btn">
        <i class="icon-plus-sign"></i><input name="add" type="submit" id="add" value="Lagre">
        </li>
            </ul>
        </form>
        </div>
        <?php
        $username="proffwqr_fc2pro";
        $password="BlEXxW)iSbef";
        $database="proffwqr_protopersonal";
        mysql_connect("localhost",$username,$password);
        @mysql_select_db($database) or die("<b>Unable to specified database</b>");
        $tjenestenr = $_POST['tjenestenr'];
        $datetime = $_POST['datetime'];
        $tasktype = $_POST['tasktype'];
        $taskcode = $_POST['taskcode'];
        $qty = $_POST['qty'];
        $description = $_POST['description'];
        $query = "INSERT INTO shiftjournal (tjenestenr,datetime, tasktype, taskcode, qty, description)
        VALUES ('$tjenestenr','$datetime','$tasktype','$taskcode','$qty','$description')";
        mysql_query("SET NAMES 'utf8'");
        mysql_query($query) or die('Error, insert query failed');

?>    
    </div>
        <br clear="all">    
  </div>  



  <script type="text/javascript">
    $(document).ready(function(){

        Morris.Line({
        element: 'graph',
        data: [
          <?php echo $line1; ?>
        ],
        xkey: 'm',
        ykeys: ['a'],
        labels: ['<?=$this->lang->line('application_received');?>'],
        xLabels: 'month'
      });

function tick(){
  $('ul.messages li:first').slideUp('slow', function () { $(this).appendTo($('ul.messages')).fadeIn('slow'); });
}
<?php if(count($message) > 2){ ?>
setInterval(function(){ tick() }, 5000);
<?php } ?>
$('ul.eventlist li').click(function(){
  $('ul.eventlist li:first').slideUp('slow', function () { $(this).appendTo($('ul.eventlist')).fadeIn('slow'); });
});



    });
    </script>


      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/jquery.mousewheel.js"></script>
      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/jquery.jscrollpane.min.js"></script>
      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/scroll-startstop.events.jquery.js"></script>


    <script type="text/javascript">
      $(function() {
      
        // the element we want to apply the jScrollPane
        var $el         = $('.jp-container').jScrollPane({
          verticalGutter  : -16
        }),
            
        // the extension functions and options  
          extensionPlugin   = {
            
            extPluginOpts : {
              // speed for the fadeOut animation
              mouseLeaveFadeSpeed : 500,
              // scrollbar fades out after hovertimeout_t milliseconds
              hovertimeout_t    : 1000,
              // if set to false, the scrollbar will be shown on mouseenter and hidden on mouseleave
              // if set to true, the same will happen, but the scrollbar will be also hidden on mouseenter after "hovertimeout_t" ms
              // also, it will be shown when we start to scroll and hidden when stopping
              useTimeout      : false,
              // the extension only applies for devices with width > deviceWidth
              deviceWidth     : 980
            },
            hovertimeout  : null, // timeout to hide the scrollbar
            isScrollbarHover: false,// true if the mouse is over the scrollbar
            elementtimeout  : null, // avoids showing the scrollbar when moving from inside the element to outside, passing over the scrollbar
            isScrolling   : false,// true if scrolling
            addHoverFunc  : function() {
              
              // run only if the window has a width bigger than deviceWidth
              if( $(window).width() <= this.extPluginOpts.deviceWidth ) return false;
              
              var instance    = this;
              
              // functions to show / hide the scrollbar
              $.fn.jspmouseenter  = $.fn.show;
              $.fn.jspmouseleave  = $.fn.fadeOut;
              
              // hide the jScrollPane vertical bar
              var $vBar     = this.getContentPane().siblings('.jspVerticalBar').hide();
              
              /*
               * mouseenter / mouseleave events on the main element
               * also scrollstart / scrollstop - @James Padolsey : http://james.padolsey.com/javascript/special-scroll-events-for-jquery/
               */
              $el.bind('mouseenter.jsp',function() {
                
                // show the scrollbar
                $vBar.stop( true, true ).jspmouseenter();
                
                if( !instance.extPluginOpts.useTimeout ) return false;
                
                // hide the scrollbar after hovertimeout_t ms
                clearTimeout( instance.hovertimeout );
                instance.hovertimeout   = setTimeout(function() {
                  // if scrolling at the moment don't hide it
                  if( !instance.isScrolling )
                    $vBar.stop( true, true ).jspmouseleave( instance.extPluginOpts.mouseLeaveFadeSpeed || 0 );
                }, instance.extPluginOpts.hovertimeout_t );
                
                
              }).bind('mouseleave.jsp',function() {
                
                // hide the scrollbar
                if( !instance.extPluginOpts.useTimeout )
                  $vBar.stop( true, true ).jspmouseleave( instance.extPluginOpts.mouseLeaveFadeSpeed || 0 );
                else {
                clearTimeout( instance.elementtimeout );
                if( !instance.isScrolling )
                    $vBar.stop( true, true ).jspmouseleave( instance.extPluginOpts.mouseLeaveFadeSpeed || 0 );
                }
                
              });
              
              if( this.extPluginOpts.useTimeout ) {
                
                $el.bind('scrollstart.jsp', function() {
                
                  // when scrolling show the scrollbar
                  clearTimeout( instance.hovertimeout );
                  instance.isScrolling  = true;
                  $vBar.stop( true, true ).jspmouseenter();
                  
                }).bind('scrollstop.jsp', function() {
                  
                  // when stop scrolling hide the scrollbar (if not hovering it at the moment)
                  clearTimeout( instance.hovertimeout );
                  instance.isScrolling  = false;
                  instance.hovertimeout   = setTimeout(function() {
                    if( !instance.isScrollbarHover )
                      $vBar.stop( true, true ).jspmouseleave( instance.extPluginOpts.mouseLeaveFadeSpeed || 0 );
                  }, instance.extPluginOpts.hovertimeout_t );
                  
                });
                
                // wrap the scrollbar
                // we need this to be able to add the mouseenter / mouseleave events to the scrollbar
                var $vBarWrapper  = $('<div/>').css({
                  position  : 'absolute',
                  left    : $vBar.css('left'),
                  top     : $vBar.css('top'),
                  right   : $vBar.css('right'),
                  bottom    : $vBar.css('bottom'),
                  width   : $vBar.width(),
                  height    : $vBar.height()
                }).bind('mouseenter.jsp',function() {
                  
                  clearTimeout( instance.hovertimeout );
                  clearTimeout( instance.elementtimeout );
                  
                  instance.isScrollbarHover = true;
                  
                  // show the scrollbar after 100 ms.
                  // avoids showing the scrollbar when moving from inside the element to outside, passing over the scrollbar                
                  instance.elementtimeout = setTimeout(function() {
                    $vBar.stop( true, true ).jspmouseenter();
                  }, 100 ); 
                  
                }).bind('mouseleave.jsp',function() {
                  
                  // hide the scrollbar after hovertimeout_t
                  clearTimeout( instance.hovertimeout );
                  instance.isScrollbarHover = false;
                  instance.hovertimeout = setTimeout(function() {
                    // if scrolling at the moment don't hide it
                    if( !instance.isScrolling )
                      $vBar.stop( true, true ).jspmouseleave( instance.extPluginOpts.mouseLeaveFadeSpeed || 0 );
                  }, instance.extPluginOpts.hovertimeout_t );
                  
                });
                
                $vBar.wrap( $vBarWrapper );
              
              }
            
            }
            
          },
          
          // the jScrollPane instance
          jspapi      = $el.data('jsp');
          
        // extend the jScollPane by merging 
        $.extend( true, jspapi, extensionPlugin );
        jspapi.addHoverFunc();
      
      });
    </script>