	<?php $this->load->helper('form');?>
	<div class="row-fluid">
		<div class="span10 offset1">
			<div style="color:red">
				<?php echo validation_errors(); ?>
			</div>
			<div class="well">
				<p style="color:#5F5F5F">Add a Trustee:</p>
			    <?php
			    /*
			    foreach($user as $fieldname => $fieldvalue)
			    {
			    	${$fieldname} = $fieldvalue;
			    }
			    */
			    $attributes = array('class' => 'form-horizontal');
			    echo form_open('trustee/addTrustee', $attributes);
			    ?>
			    	<div class="control-group">
			    		<label class="control-label" for="inputFirstName">Firstname</label>
			    		<div class="controls">
							<input type="text" id="inputFirstName" class="input-xlarge" name="Contact_FirstName" value="<?=set_value('Contact_FirstName');?>" placeholder="Firstname" required />
						</div>
					</div>
			    	<div class="control-group">
			    		<label class="control-label" for="inputLastName">Lastname</label>
			    		<div class="controls">
							<input type="text" id="inputLastName" class="input-xlarge" name="Contact_LastName" value="<?=set_value('Contact_LastName');?>" placeholder="Firstname" required />
						</div>
					</div>

			    	<div class="control-group">
			    		<label class="control-label" for="inputEmail">Email</label>
			    		<div class="controls">
			    			<input type="text" id="inputEmail" class="input-xlarge" name="Contact_Email" value="<?=set_value('Contact_Email');?>" placeholder="Email" required />
			    		</div>
			    	</div>
			    	<div class="control-group">
			    		<label class="control-label" for="inputMobilePhone1">Mobile Phone</label>
			    		<div class="controls">
			    			<input type="text" id="inputMobilePhone1" class="input-xlarge" name="Contact_MobilePhone1" value="<?=set_value('Contact_MobilePhone1');?>" placeholder="Mobile Phone No." required />
			    		</div>
			    	</div>
			    	<div class="control-group">
			    		<label class="control-label" for="inputMobilePhoneCarrier1">Mobile Phone Carrier</label>
			    		<div class="controls">
			    			<input type="text" id="inputMobilePhoneCarrier1" class="input-xlarge" name="Contact_MobilePhoneCarrier1" value="<?=set_value('Contact_MobilePhoneCarrier1');?>" placeholder="Mobile Phone Carrier" required />
			    		</div>
			    	</div>
			    	<div class="control-group">
			    		<label class="control-label" for="inputTwitterID">Twitter ID</label>
			    		<div class="controls">
			    			<div class="input-prepend">
								<span class="add-on">@</span>
			    				<input type="text" id="inputTwitterID" class="input-large" name="Contact_TwitterID" value="<?=set_value('Contact_TwitterID');?>" placeholder="Twitter ID">
			    			</div>
			    		</div>
			    	</div>
					<?php
					/*
					if(intval($UserDetails_MobilePhone1Verified) === 0)
					{
						?>
						<div class="controls text-center" style="margin-bottom:10px">
							<button type="submit" class="btn">Send Verification Code</button>
						</div>
						<div class="controls text-center">
							<input type="text" id="inputCarrier1" name="UserDetails_MobilePhone1Verification" value="" placeholder="Verification Code">
						</div>
						<?php
					}
					*/
					?>
					<div class="text-center">
		    			<button type="submit" class="btn btn-primary">Add</button>
					    <a href="/trustee" class="btn">Cancel</a>
					</div>
				</form>
			</div>
		</div>
	</div>

