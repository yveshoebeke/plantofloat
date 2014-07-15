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
    $("#contactUs").alert()
  });
  </script>
	<style type="text/css">
	</style>
</head>
<body>
<?php $this->load->helper('form');?>
<div class="container">
	<div class="row-fluid">
		<div class="span12">
			<h2 style="color:#3A87AD"><img src="/assets/img/logo.png" alt="Plantofloat Logo" width="34" height="32" />Welcome to Plantofloat!</h2>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span12">
			<h5 style="color:#999999">Send us your message.</h5>
      		<hr />
		</div>
	</div>

	<div class="row-fluid">
		<div class="span8">
		    <?php
		    $attributes = array('class' => 'form-horizontal');
		    echo form_open('user/getContactUs', $attributes);

		    if(isset($_SESSION['user_fullname']) && $_SESSION['user_fullname'] !== 'John Smith')
		    {
		      $yourName = $_SESSION['user_fullname'];
		      $yourEmail = $_SESSION['user_email'];
		      $readOnly = ' readOnly';
		    } else {
		      $yourName = '';
		      $yourEmail = '';
		      $readOnly = '';
		    }
		    ?>
		    	<div class="control-group">
		    		<label class="control-label" for="inputYourName">Name</label>
		    		<div class="controls">
		    			<input type="text" id="inputYourName" class="input-xxlarge" name="yourName" placeholder="Your Name" value="<?=$yourName?>"<?=$readOnly?> required />
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputYourEmail">Email</label>
		    		<div class="controls">
		    			<input type="text" id="inputYourEmail" class="input-xxlarge" name="yourEmail" placeholder="Your Email" value="<?=$yourEmail?>"<?=$readOnly?> required />
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputYourMessage">Message</label>
		    		<div class="controls">
		    			<textarea id="intputYourMessage" class="input-xxlarge" name="yourMessage" rows="5" required></textarea>
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<label class="control-label" for="inputYourEmail">Four times 2 is</label>
		    		<div class="controls">
		    			<input type="text" id="isHuman" class="input-mini" name="isHuman" placeholder="Answer" value="" required />
		    		</div>
		    	</div>
		    	<div class="control-group">
		    		<div class="controls">
		    			<button type="submit" class="btn btn-primary">Send</button>
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

</body>
</html>
