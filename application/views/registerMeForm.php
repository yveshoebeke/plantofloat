<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome to Plantofloat</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="index, nofollow" />
  <meta name="author" content="byteSupply - Yves Hoebeke" />
  <meta name="description" content="Float Plan Management" />
  <meta name="keywords" content="boating, sailing, boating safety, passage, passage planning, planning, navigation, emergency, float plan, maritime, maritime navigation, planning, maritime planning, nautical" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/assets/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
  <link rel="shortcut icon" href="/assets/img/favicon.ico" />
	<link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="/assets/css/style.css" rel="stylesheet" type="text/css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="/assets/bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript">
  $(document).ready( function() {
    $('.tooltipster').tooltip();
  });
  </script>
	<style type="text/css">
	</style>
</head>
<body>
<?php
$this->load->helper('form');
$this->load->helper('date');
?>
<div class="container">
	<div class="row-fluid">
		<div class="span12">
			<h2 style="color:#3A87AD"><img src="/assets/img/logo.png" alt="Plantofloat Logo" width="34" height="32" />Welcome to Plantofloat!</h2>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span12">
			<h5 style="color:#999999">Register.</h5>
      		<hr />
		</div>
	</div>

	<div class="row-fluid">
		<div class="span8 offset2" style="color:red">
			<?php echo validation_errors(); ?>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span10 offset1">
		    <?php
		    $attributes = array('class' => 'form-horizontal');
		    echo form_open('user/processRegisterForm', $attributes);
		    ?>
		    	<div class="control-group">
		    		<label class="control-label" for="inputEmail">Email</label>
		    		<div class="controls">
		    			<input type="text" id="inputEmail" class="input-xlarge" name="UserDetails_Username" value="<?=set_value('UserDetails_Username');?>" placeholder="Email" required>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputFirstName">First Name</label>
		    		<div class="controls">
		    			<input type="text" id="inputFirstName" class="input-xlarge" name="UserDetails_FirstName" value="<?=set_value('UserDetails_FirstName');?>" placeholder="First Name" required>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputLastName">Last Name</label>
		    		<div class="controls">
		    			<input type="text" id="inputLastName" class="input-xlarge" name="UserDetails_LastName" value="<?=set_value('UserDetails_LastName');?>" placeholder="Last Name" required>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="">Your default timezone</label>
		    		<div class="controls">
						<?=timezone_menu('UM5');?>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputPassword">Password</label>
		    		<div class="controls">
		    			<input type="password" id="inputPassword" class="input-xlarge" name="UserDetails_Password" value="" placeholder="Password" required>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputVerifyPassword">Verify Password</label>
		    		<div class="controls">
		    			<input type="password" id="inputVerifyPassword" class="input-xlarge" name="Verify_Password" value="" placeholder="Verify Password" required>
		    		</div>
		    	</div>
			   	<div class="control-group">
		 			<label class="control-label" for="inputSecurity">Security Question</label>
					<div class="controls">
			    		<?=form_dropdown('UserDetails_SecurityQuestion',$security);?>
						<a class="tooltipster" href="#" data-toggle="tooltip" title="To positively identify you for various administration tasks, such as changing passwords, etc."><i class="icon-info-sign"></i></a>
					</div>
				</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputVerifyPassword">Security Answer</label>
		    		<div class="controls">
		    			<input type="text" id="inputSecurityQuestion" class="input-xlarge" name="UserDetails_SecurityAnswer" value="" placeholder="Security Answer" required>
		    		</div>
		    	</div>
			   	<div class="control-group">
		 			<label class="control-label" for="inputVerifyHuman">21 divided by three ?</label>
					<div class="controls">
						<input type="text" id="inputVerifyHuman" class="input-mini" name="Verify_Human" value="<?=set_value('UserDetails_SecurityAnswer');?>" placeholder="Answer" required>
						&nbsp;
						<a class="tooltipster" href="#" data-toggle="tooltip" title="To assure us that these inputs are not generated by a computer."><i class="icon-info-sign"></i></a>
					</div>
				</div>
		   		<div class="control-group">
		    		<div class="controls">
		    			<label class="checkbox">
		    				<input type="checkbox" name="termsAgreed" required>I have read and agree with the&nbsp;<a href="#TermsModal" data-dismiss="modal" aria-hidden="true" role="button" data-toggle="modal">Terms &amp; Conditions</a>.
		    			</label>
		    			<label class="checkbox">
		    				<input type="checkbox" name="UserDetails_Subscribed">Send me periodic updates and news regarding Plantofloat.com.&nbsp;<a class="tooltipster" href="#" data-toggle="tooltip" title="You will always be able to unsubscribe."><i class="icon-info-sign"></i></a>
			    			</label>
		    			<button type="submit" class="btn btn-primary">Register</button>
					    <a href="/" class="btn">Cancel</a>
		    		</div>
		    	</div>
		    </form>
		</div>
	</div>
	
  <div class="row-fluid">
    <div class="span12">
      <hr />
    </div>
  </div>
	<div class="row-fluid">
		<div class="span6">
			<p class="footer text-left">
				&copy; 2013 - <a href="http://bytesupply.com"><span style="color:#FA5858;">byte</span><span style="color:#819FF7">Supply</span></a> - all rights reserved.
			</p>
		</div>
		<div class="span6">
			<p class="footer text-right">
				Page rendered in <strong>{elapsed_time}</strong> seconds.
			</p>
		</div>
	</div>
</div>

<!-- Terms and Conditions -->
<div id="TermsModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Terms and Conditions</h3>
  </div>
  <div class="modal-body">
    <p>(Preliminary)</p>
  	<p>Terms of service are subject to change and vary from service to service, so several initiatives exist to increase public awareness by clarifying such differences in Terms, including:</p>
  	<ul>
  		<li>Copyright licensing on user content</li>
  		<li>Transparency on government or law enforcement requests for content removal</li>
  		<li>Notification of government or third-party requests for personal data</li>
  		<li>Transparency of security practices</li>
  		<li>Saved or temporary first and third-party cookies</li>
  		<li>Data tracking policy and opt-out availability</li>
  		<li>Pseudonym allowance</li>
  		<li>Readability of Terms</li>
  		<li>Notification and feedback prior to changes in Terms</li>
  		<li>Availability of previous Terms</li>
  		<li>Notification prior to information transfer in event of merger or aquisition</li>
  		<li>Indemnification or compensation for claims against account or content</li>
  		<li>Cancellation or termination of account by user and or service</li>
  	</ul>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>

</body>
</html>
