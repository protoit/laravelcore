<div id="myModal3" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3 id="myModalLabel3">Confirm Delete</h3>
    </div>
    <div class="modal-body">
        <p>Delete Report?</p>
    </div>
    <div class="modal-footer">
        <a href="{{ Request::root()}}/reports/service/delete/" class="btn blue" id="delete_me">Confirm</a>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>




<div id="report_history" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3 id="myModalLabel3">Report History</h3>
    </div>
    <div class="modal-body">
        <!--<p>Delete Report?</p>-->
        
        
       <div class="control-group">
        <label class="control-label" for="firstName">Date and Time</label>
        <div class="controls">
            <input name="datetime" type="text" class="m-wrap" id="datetime" placeholder="">
        </div>
    	</div> 
        
         <div class="control-group">
        	<label class="control-label" for="firstName">Tjenestenr</label>
        	<div class="controls">
            	<input name="tjenestenr" type="text" class="m-wrap" id="tjenestenr" placeholder="">
        	</div>
    	</div> 
        
        <div class="control-group">
        	<label class="control-label" for="firstName">Description</label>
        	<div class="controls">
            	<input name="description" type="text" class="m-wrap" id="description" placeholder="">
        	</div>
    	</div>
        
        <input name="history_report_id" type="hidden" class="m-wrap" id="history_report_id">
        <input name="history_id" type="hidden" class="m-wrap" id="history_id">
    
    </div>
    
    
    
  
    <div class="modal-footer">
        <a href="#" class="btn blue" id="report_history_save">Save</a>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>


<div id="deleteFile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3 id="myModalLabel3">Confirm Delete</h3>
    </div>
    <div class="modal-body">
        <p>Delete File?</p>
    </div>
    <div class="modal-footer">
        <a href="{{ Request::root()}}/reports/service/delete/" class="btn blue" id="delete_file_confirm">Confirm</a>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>