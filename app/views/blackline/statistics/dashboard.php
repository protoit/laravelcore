  <script src="<?=base_url()?>assets/blackline/js/raphael-min.js"></script>
  <script src="<?=base_url()?>assets/blackline/js/morris-min.js"></script>
<div id="main">
<?php if(@$this->user->admin) { ?>
      <div class="stats-frame">
        <h1><?=$this->lang->line('application_statistics');?> <small><?=$year;?></small></h1>
              <div id="graph"></div>
      <br clear="all">
      <div id="stat-numbers" class="offset-top">
        <div class="span3"><h2><?=$invoices_open;?><small> / <?=$invoices_all;?></small></h2> <h5><?=$this->lang->line('application_open_invoices');?></h5></div>
        <div class="span3"><h2><?=$projects_open;?><small> / <?=$projects_all;?></small></h2> <h5><?=$this->lang->line('application_open_projects');?></h5></div>
        <div class="span3"><h2><?=$core_settings->currency;?> <?php if(empty($payments[0]->summary)){echo "0";}else{echo number_format($payments[0]->summary); }?></h2> <h5><?=$this->lang->line('application_'.$month);?> <?=$this->lang->line('application_payments');?></h5></div>
        <div class="span3"><h2><?=$core_settings->currency;?> <?php if(empty($paymentsoutstanding[0]->summary)){echo "0";}else{echo number_format($paymentsoutstanding[0]->summary); } ?></h2> <h5><?=$this->lang->line('application_outstanding_payments');?></h5></div>  
      </div>
        <br clear="all">  
  </div> 
  <? } ?> 

      <?php 
      $line1 = "";
      for ($i = 01; $i <= 12; $i++) {

        $num = "0";
        foreach ($stats as $value):
        $act_month = explode("-", $value->paid_date); 
        if($act_month[1] == $i){  
          $num = $value->summary; 
        }
        endforeach; 
          $i = sprintf("%02.2d", $i);
          $line1 .= "{m: '".$year."-".$i."', a: ".$num."}";
          if($i != "12"){ $line1 .= ",";}
        } ?>



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
	  
	  $('#stats_table').dataTable({
			"bPaginate": true ,
			"bFilter": true,
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
		var global_object_name = '';
		var global_company_name = '';
		  function populate_table(company_name){
				global_company_name = company_name;
				$.post("<?php echo base_url(); ?>ajax/get_task_codes",{company_name: global_company_name, object_name: global_object_name},function(result){
					$.post("<?php echo base_url(); ?>ajax/count_task_codes",{company_name: global_company_name, object_name: global_object_name},function(count){
						$('#stats_table tfoot #total_count').html(count);
					});
					$('#stats_table tbody').html(result);
						  $('#stats_table').dataTable();
				});
		  }
	
		  function get_companies(name){
				global_object_name = name;
				$.post("<?php echo base_url(); ?>ajax/test",{object_name: name},function(result){
					$('#dropdown_container').html(result);
				});
	  }
    </script>


      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/jquery.mousewheel.js"></script>
      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/jquery.jscrollpane.min.js"></script>
      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/scroll-startstop.events.jquery.js"></script>
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
    <!-- Last modified by joel -->
    <br clear="all">
    <div class="span3" style="width: 100% !important;">
	<div id="options">
			<div class="btn-group margintop5 pull-left nav-tabs" data-toggle="buttons-radio">
            <?php
					
					$query = $this->db->query('SELECT DISTINCT object FROM shiftjournal WHERE object!=""');
					$object = $query->result();
					foreach($object as $obj){
			?>
                    <a class="btn btn-mini active" id="all" href="#" onclick="get_companies('<?php echo $obj->object; ?>')"><?php echo $obj->object; ?></a>
            <?php
					}
			?>			
            </div>
            <script type="text/javascript">$(document).ready(function() { 
                    $('.nav-tabs #shiftjournal').button('toggle'); });
            </script> 
        <br clear="all">
	</div>
	<div id="dropdown_container" style="padding: 20px 0px;">
		
	</div>
    <div class="table_head"><h6><i class="icon-list-alt"></i>Oppgavekode Statistikk</h6></div>
	<table id="stats_table" width="100%"> 
        <thead>
            <th width='1%'>Oppgavekode</th>
            <th width='1%'>Antall Personer</th>
        </thead>
				<?php $total = 0; ?>
		        <tbody>
				    <?php foreach($taskcodes as $taskcode){ ?>
					    <tr>
                            <td><?php echo $taskcode->taskcode; ?></td>
                            <td><?php echo $taskcode->quantity; ?></td>
							<?php $total += $taskcode->quantity; ?>
                        </tr>
						<?php } ?>
				</tbody>
				<tfoot>
					<tr>
					<td><strong>Totalt</strong></td>
					<td id="total_count"><?php echo $total; ?></td>
					</tr>
				</tfoot>
	</table>
    </div>
    </br>