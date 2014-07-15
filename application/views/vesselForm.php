	<?php $this->load->helper('form');?>
	<div class="row-fluid">
		<div class="span10 offset1">
			<div class="well">
				<div class="row-fluid">
					<div class="span12">
						<h5 style="color:#999999">Add a Vessel.</h5>
			      		<hr />
					</div>
				</div>
			    <?php
			    /*
			    foreach($user as $fieldname => $fieldvalue)
			    {
			    	${$fieldname} = $fieldvalue;
			    }
			    */
			    $attributes = array('class' => 'form-horizontal');
			    echo form_open('user/changeUserDetails', $attributes);
			    ?>
				<div class="row">
				    <div class="span2 offset1">Oars:</div>
				    <div class="span8">
					    <label class="radio inline">
							<input type="radio" name="vesselType" id="oarsKayak" value="kayak">
							Kayak
						</label>
					    <label class="radio inline">
							<input type="radio" name="vesselType" id="oarsCanoe" value="canoe">
							Canoe
						</label>
					    <label class="radio inline">
							<input type="radio" name="vesselType" id="oarsRowboat" value="rowboat">
							Rowboat
						</label>
					</div>
				</div>
				
				<div class="row">
				    <div class="span2 offset1">Sail:</div>
				    <div class="span8">
					    <label class="radio inline">
							<input type="radio" name="vesselType" id="sailFractionalSloop" value="fractional">
							Sloop
						</label>
					    <label class="radio inline">
							<input type="radio" name="vesselType" id="sailCat" value="cat">
							Cat
						</label>
					    <label class="radio inline">
							<input type="radio" name="vesselType" id="sailCutter" value="cutter">
							Cutter
						</label>
					    <label class="radio inline">
							<input type="radio" name="vesselType" id="sailYawl" value="yawl">
							Yawl
						</label>
					    <label class="radio inline">
							<input type="radio" name="vesselType" id="sailKetch" value="ketch">
							Ketch
						</label>
					    <label class="radio inline">
							<input type="radio" name="vesselType" id="sailShooner" value="schooner">
							Schooner
						</label>
					</div>
				</div>
				
				<div class="row">
				    <div class="span2 offset1">Power:</div>
				    <div class="span8">
					    <label class="radio inline">
							<input type="radio" name="vesselType" id="powerPWC" value="pwc">
							PWC
						</label>
					    <label class="radio inline">
							<input type="radio" name="vesselType" id="powerSpeedBoat" value="speedboat">
							Speed Boat
						</label>
					    <label class="radio inline">
							<input type="radio" name="vesselType" id="powerCruiser" value="cruiser">
							Motor Cruiser
						</label>
					    <label class="radio inline">
							<input type="radio" name="vesselType" id="powerHouseboat" value="houseboat">
							House Boat
						</label>
					</div>
				</div>

				<div class="row">
					<div class="span10 offset1">
						<hr />
						<h6>General</h6>
					</div>
				</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputEmail">Manufacturer</label>
		    		<div class="controls">
		    			<input type="text" id="inputEmail" class="input-xlarge" name="UserDetails_Username" value="<?=set_value('UserDetails_Username');?>" placeholder="Email" required>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputEmail">Model</label>
		    		<div class="controls">
		    			<input type="text" id="inputEmail" class="input-xlarge" name="UserDetails_Username" value="<?=set_value('UserDetails_Username');?>" placeholder="Email" required>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputEmail">Year Build</label>
		    		<div class="controls">
		    			<input type="text" id="inputEmail" class="input-xlarge" name="UserDetails_Username" value="<?=set_value('UserDetails_Username');?>" placeholder="Email" required>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputEmail">Capacity</label>
		    		<div class="controls">
		    			<input type="text" id="inputEmail" class="input-xlarge" name="UserDetails_Username" value="<?=set_value('UserDetails_Username');?>" placeholder="Email" required>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputEmail">Length</label>
		    		<div class="controls">
		    			<input type="text" id="inputEmail" class="input-xlarge" name="UserDetails_Username" value="<?=set_value('UserDetails_Username');?>" placeholder="Email" required>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputEmail">Hull Color</label>
		    		<div class="controls">
		    			<input type="text" id="inputEmail" class="input-xlarge" name="UserDetails_Username" value="<?=set_value('UserDetails_Username');?>" placeholder="Email" required>
		    		</div>
		    	</div>

				<div class="row">
					<div class="span10 offset1">
						<hr />
						<h6>Registration</h6>
					</div>
				</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputEmail">Country</label>
		    		<div class="controls">
		    			<input type="text" id="inputEmail" class="input-xlarge" name="UserDetails_Username" value="<?=set_value('UserDetails_Username');?>" placeholder="Email" required>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputEmail">Registration no.</label>
		    		<div class="controls">
		    			<input type="text" id="inputEmail" class="input-xlarge" name="UserDetails_Username" value="<?=set_value('UserDetails_Username');?>" placeholder="Email" required>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputEmail">IMO</label>
		    		<div class="controls">
		    			<input type="text" id="inputEmail" class="input-xlarge" name="UserDetails_Username" value="<?=set_value('UserDetails_Username');?>" placeholder="Email" required>
		    		</div>
		    	</div>

				
				<div class="row">
					<div class="span10 offset1">
						<hr />
						<h6>Communication</h6>
					</div>
				</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputEmail">VHF</label>
		    		<div class="controls">
					    <label class="radio inline">
							<input type="radio" name="VHF" id="noVHF" value="No" checked>
							No
						</label>
					    <label class="radio inline">
							<input type="radio" name="VHF" id="yesVHF" value="Yes">
							Yes
						</label>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputEmail">AIS</label>
		    		<div class="controls">
					    <label class="checkbox inline">
							<input type="checkbox" name="AISclassA" id="AISclassA" value="inboard">
							Class A
						</label>
					    <label class="checkbox inline">
							<input type="checkbox" name="AISclassB" id="AISclassB" value="outboard">
							Class B
						</label>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputEmail">HF/SSB</label>
		    		<div class="controls">
					    <label class="radio inline">
							<input type="radio" name="HF" id="noHF" value="No" checked>
							No
						</label>
					    <label class="radio inline">
							<input type="radio" name="HF" id="yesHF" value="Yes">
							Yes
						</label>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputEmail">Satelite</label>
		    		<div class="controls">
					    <label class="radio inline">
							<input type="radio" name="SAT" id="noSAT" value="No" checked>
							No
						</label>
					    <label class="radio inline">
							<input type="radio" name="SAT" id="yesSAT" value="Yes">
							Yes
						</label>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputEmail">Email Capable</label>
		    		<div class="controls">
					    <label class="radio inline">
							<input type="radio" name="emailCapable" id="noEmail" value="No" checked>
							No
						</label>
					    <label class="radio inline">
							<input type="radio" name="emailCapable" id="yesEmail" value="Yes">
							Yes
						</label>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputEmail">Call Sign</label>
		    		<div class="controls">
		    			<input type="text" id="inputEmail" class="input-xlarge" name="UserDetails_Username" value="<?=set_value('UserDetails_Username');?>" placeholder="Vessel Callsign" required>
		    		</div>
		    	</div>

		
				<div class="row">
					<div class="span10 offset1">
						<hr />
						<h6>Powerplant(s)</h6>
					</div>
				</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputNoOfMotors">Number of Powerplants</label>
		    		<div class="controls">
						<select>
						  <option>1</option>
						  <option>2</option>
						  <option>3</option>
						  <option>4</option>
						  <option>more</option>
						</select>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputMotorManufacturer">Manufacturer</label>
		    		<div class="controls">
		    			<input type="text" id="inputMotorManufacturer" class="input-xlarge" name="UserDetails_Username" value="<?=set_value('UserDetails_Username');?>" placeholder="Motor Manufacturer" required>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputMotorModel">Model</label>
		    		<div class="controls">
		    			<input type="text" id="inputMotorModel" class="input-xlarge" name="UserDetails_Username" value="<?=set_value('UserDetails_Username');?>" placeholder="Motor Model" required>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputEmail">In/Out board</label>
		    		<div class="controls">
					    <label class="radio inline">
							<input type="radio" name="motorInOutBoard" id="motorInboard" value="inboard" checked>
							Inboard
						</label>
					    <label class="radio inline">
							<input type="radio" name="motorInOutBoard" id="motorOutboard" value="outboard">
							Outboard
						</label>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputEmail">Fuel Capacity</label>
		    		<div class="controls">
						<div class="input-append">
							<input type="text" id="inputEmail" class="input-xlarge" name="UserDetails_Username" value="<?=set_value('UserDetails_Username');?>" placeholder="Fuel Capacity" required>
							<div class="btn-group">
								<button class="btn dropdown-toggle" data-toggle="dropdown">
								Units
								<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">US Gallons</a></li>
									<li><a href="#">Litres</a></li>
									<li><a href="#">Imperial Gallons</a></li>
								</ul>
							</div>
						</div>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputEmail">Fuel Consumption</label>
		    		<div class="controls">
						<div class="input-append">
			    			<input type="text" id="inputEmail" class="input-xlarge" name="UserDetails_Username" value="<?=set_value('UserDetails_Username');?>" placeholder="Fuel Consuption" required>
							<div class="btn-group">
								<button class="btn dropdown-toggle" data-toggle="dropdown">
								Units
								<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">US Gallons / Hr</a></li>
									<li><a href="#">Litres / Hr</a></li>
									<li><a href="#">Imperial Gallons / Hr</a></li>
								</ul>
							</div>
						</div>
		    		</div>
		    	</div>

				<div class="row">
					<div class="span10 offset1">
						<hr />
						<h6>Emergency Equipment</h6>
					</div>
				</div>
				

		    	<!--
			    emergency equipment
			    no of fire exstinguisers
			    no of lifevests
			    flares
			    EPRIB
			    lifeboat(s), dinghy, ...

			    experience
			    crew accumulative years of experience 1-2-3-5-5+
				-->
			</form>
			</div>
		</div>
	</div>
