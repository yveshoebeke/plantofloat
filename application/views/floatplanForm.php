
	<?php 
	$this->load->helper('form');
	$this->load->helper('date');
	?>

	<div class="row-fluid">
		<div class="span12">
			<h5 style="color:#999999">Register.</h5>
      		<hr />
		</div>
	</div>

	<div class="row-fluid">
		<div class="span12" style="color:red">
			<?php echo validation_errors(); ?>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span12">
		    <?php
		    $attributes = array('class' => 'form-horizontal');
		    echo form_open('floatplan/floatplanAdd', $attributes);
		    ?>
			   	<div class="control-group">
		 			<label class="control-label" for="inputSecurity">Select Vessel:</label>
					<div class="controls">
			    		<?=form_dropdown('Floatplan_VesselID',$vessels);?>
					</div>
				</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputDepartureLocation">Departure from:</label>
		    		<div class="controls">
		    			<textarea id="intputDepartureLocation" class="input-xxlarge" name="Floatplan_Departure" rows="5" required></textarea>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputDepartureDatetime">Departure Day and Time:</label>
		    		<div class="controls">
		    			<input type="text" id="inputDepartureDatetime" class="input-xlarge" name="Floatplan_ETD" value="<?=set_value('UserDetails_FirstName');?>" placeholder="mm/dd/yyyy hh:mm" required>
						<?=timezone_menu($_SESSION['user_timezone']);?>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputRoute">Route description:</label>
		    		<div class="controls">
		    			<textarea id="intputRoute" class="input-xxlarge" name="Floatplan_Route" rows="5" required></textarea>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputArrivalLocation">Destination:</label>
		    		<div class="controls">
		    			<textarea id="intputArrivalLocation" class="input-xxlarge" name="Floatplan_Destination" rows="5" required></textarea>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputArrivalDatetime">Arrival Day and Time:</label>
		    		<div class="controls">
		    			<input type="text" id="inputArrivalDatetime" class="input-xlarge" name="Floatplan_ETA" value="<?=set_value('UserDetails_LastName');?>" placeholder="mm/dd/yyyy hh:mm" required>
						<?=timezone_menu($_SESSION['user_timezone']);?>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputManifest">Passenger/Goods Manifest</label>
		    		<div class="controls">
		    			<textarea id="intputManifest" class="input-xxlarge" name="Floatplan_Manifest" rows="5"></textarea>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputVerifyPassword">Set Floatplan Status:</label>
					<div class="controls">
			    		<?=form_dropdown('Floatplan_Status',$status);?>
						<a class="tooltipster" href="#" data-toggle="tooltip" title="Setting the status to 'Pending' will cause your Floatplan to automatically be opened at the given Departure Date and Time."><i class="icon-info-sign"></i></a>
					</div>
		    	</div>
		   		<div class="control-group">
		    		<div class="controls">
		    			<button type="submit" class="btn btn-primary">Register Floatplan</button>
					    <a href="/floatplan" class="btn">Cancel</a>
		    		</div>
		    	</div>
		    </form>
		</div>
	</div>
	

<!-- Terms and Conditions -->
<div id="helpModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Floatplan Help</h3>
  </div>
  <div class="modal-body">
    <p>(Preliminary)</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>

</body>
</html>
