	<?php 
	$this->load->helper('form');
	$this->load->helper('date');
	?>
	<div class="row-fluid">
		<div class="span12">
			<p><strong><?="Welcome back " . $_SESSION['user_fullname']?></strong></p>
			<p>You were logged in <?=$loginstats['count']?> times, since <?=date('F j, Y', strtotime($loginstats['firstlogin']))?>.</p>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span4">
			<div class="well">
				<p style="color:#5F5F5F">Your Profile:</p>
			    <?php
			    foreach($user as $fieldname => $fieldvalue)
			    {
			    	${$fieldname} = $fieldvalue;
			    }
			    $attributes = ''; //array('class' => 'form-horizontal');
			    echo form_open('user/changeUserDetails', $attributes);
			    ?>
					<div class="controls text-center">
						<input type="text" id="inputEmail" name="UserDetails_Username" value="<?=$UserDetails_Username;?>" placeholder="Email" required>
					</div>
					<div class="controls text-center">
						<input type="text" id="inputFirstName" name="UserDetails_FirstName" value="<?=$UserDetails_FirstName;?>" placeholder="Firstname" required>
					</div>
					<div class="controls text-center">
						<input type="text" id="inputLastName" name="UserDetails_LastName" value="<?=$UserDetails_LastName;?>" placeholder="Lastname" required>
					</div>
					<div class="controls text-center">
						<input type="text" id="inputPostalCode" name="UserDetails_PostalCode" value="<?=$UserDetails_PostalCode;?>" placeholder="Postal Code">
					</div>
					<div class="controls text-center">
						<input type="text" id="inputCountry" name="UserDetails_Country" value="<?=$UserDetails_Country;?>" placeholder="Country">
					</div>
					<div class="controls text-center">
						<?=timezone_menu($_SESSION['user_timezone']);?>
					</div>
					<div class="controls text-center">
						<input type="text" id="inputPhone1" name="UserDetails_MobilePhone1" value="<?=$UserDetails_MobilePhone1;?>" placeholder="Mobile Phone">
					</div>
					<div class="controls text-center">
						<input type="text" id="inputCarrier1" name="UserDetails_MobilePhone1Carrier" value="<?=$UserDetails_Mobilecarrier1;?>" placeholder="Mobile Phone Carrier">
					</div>
					<?php
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
					?>
					<div class="controls text-center">
		    			<button type="submit" class="btn btn-info">Update</button>
					</div>
				</form>
			</div>
			<div class="well">
				<p style="color:#5F5F5F">Change Password:</p>
					<div style="color:red">
						<?php echo validation_errors(); ?>
					</div>

			    <?php
			    $attributes = ''; //array('class' => 'form-horizontal');
			    echo form_open('user/changePassword', $attributes);
			    ?>
					<div class="controls text-center" style="border-bottom:1px solid #DDDDDD;margin-bottom:15px;">
						<input type="password" id="inputCurrentPassword" name="UserDetails_Password" value="" placeholder="Current Password" required>
					</div>
					<div class="controls text-center">
						<input type="password" id="inputNewPassword" name="NewPassword" value="" placeholder="New Password" required>
					</div>
					<div class="controls text-center">
						<input type="password" id="inputVerifyPassword" name="VerifyPassword" value="" placeholder="Verify Password" required>
					</div>
					<div class="controls text-center">
		    			<button type="submit" class="btn btn-warning">Change Password</button>
					</div>
				</form>
			</div>

		</div>

		<div class="span8">
			<div class="well">
				<h5 style="text-decoration:underline">Vessel(s) on file:</h5>
				<p><?=$vessel?></p>
				<h5 style="text-decoration:underline">Floatplan(s) on file:</h5>
				<p><?=$floatplan?></p>
				<h5 style="text-decoration:underline">Trustee(s) on file:</h5>
				<p><?=$contact?></p>
			</div>
		</div>
	</div>

	<!-- Privacy Statement -->
		<div id="PasswordChangedModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    <h3 id="myModalLabel"></h3>
		  </div>
		  <div class="modal-body">
		    <p>Your password was changed succesfully</p>
		  </div>
		  <div class="modal-footer">
		    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		  </div>
		</div>


	<?php
	if(isset($passwordchanged) === true)
	{
		//echo 'is set';
		
		?>		
		<script type="text/javascript">$('#PasswordChangedModal').modal('show');</script>
		<?php
		
	}

