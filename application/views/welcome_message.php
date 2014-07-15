<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome to Plantofloat - a floatplan generator</title>
  <meta http-equiv="refresh" content="900">
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
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">
    $(document).ready( function() {
      $('.tooltipster').tooltip();
      $("#contactUs").alert()
    });
    google.load('visualization', '1', {packages: ['corechart']});
  </script>
	<style type="text/css">
	</style>
</head>
<body>
<?php include_once('includes/analyticstracking.inc.php') ?>
<?php $this->load->helper('form');?>
<div class="container">
	<div class="row-fluid">
		<div class="span12">
      <?php
      if(isset($_SESSION['user_fullname']))
      {
        ?>
        <span style="margin:0;padding:0;float:right;font-size:75%;color:#3A87AD"><?=$_SESSION['user_fullname']?></span>
        <?php
      }
      ?>
			<h2 style="color:#3A87AD"><img src="/assets/img/logo.png" alt="Plantofloat Logo" width="34" height="32" />Welcome to Plantofloat!</h2>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span12">
			<h5 style="color:#999999">A Float Plan Generator, bringing your float plan into the 21st Century!</h5>
      <hr />
		</div>
	</div>

	<div class="row-fluid">
    <?php
    if(isset($_SESSION['user_fullname']))
    {
      ?>
  		<div class="span6">
  			<div class="navbar">
  			  <div class="navbar-inner">
  			    <ul class="nav">
              <li><a a href="#SignOutModal" role="button" data-toggle="modal">Sign Out</a></li>
              <li><a href="#PrivacyModal" role="button" data-toggle="modal">Privacy</a></li>
              <li><a href="#TermsModal" role="button" data-toggle="modal">Terms</a></li>
              <li><a href="/user/contactUs" role="button">Contact Us</a></li>
  			    </ul>
  			  </div>
  			</div>
      </div>
      <div class="span2 offset4">
        <div class="navbar">
          <div class="navbar-inner">
            <ul class="nav">
              <li><a a href="/user" role="button">My Info</a></li>
            </ul>
          </div>
        </div>
      </div>
      <?php
    } else {
      ?>
      <div class="span6">
        <div class="navbar">
          <div class="navbar-inner">
            <ul class="nav">
              <li><a a href="#SignInModal" role="button" data-toggle="modal">Sign In</a></li>
              <li><a href="/user/registerMe" role="button">Register</a></li>
              <li><a href="#PrivacyModal" role="button" data-toggle="modal">Privacy</a></li>
              <li><a href="#TermsModal" role="button" data-toggle="modal">Terms</a></li>
              <li><a href="/user/contactUs" role="button">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
	</div>
	<div class="row">
    	<div class="well span4">
        <script type="text/javascript">
          function drawVisualization(){
            var options = {title:'Status of Current Plans on file:'};
            /*
            var data = google.visualization.arrayToDataTable([['Task', 'Hours per Day'],['Draft', 1],['Pending',4],['Open',2],['Closed', 4]]);
            */
            var data = google.visualization.arrayToDataTable(<?=$floatplanstatus?>);
            new google.visualization.PieChart(document.getElementById('floatplanstatus')).
                draw(data, options);
          }
          google.setOnLoadCallback(drawVisualization);
        </script>
        <div id="floatplanstatus" style="margin-bottom:20px;padding:1px;border:1px solid #CCCCCC;border-radius:5px;">
        </div>
        <div style="margin:20px 0;padding:0 20px;text-align:center">
          <a href="http://blog.plantofloat.com" title="Wordpress Blog" target="_blank"><img src="/assets/img/social/wordpress-footer.png" alt="Wordpress" /></a>
          <a href="http://twitter.com/plantofloat" title="Twitter" target="_blank"><img src="/assets/img/social/twitter-footer.png" alt="Twitter" /></a>
          <a href="#" title="LinkedIn" target="_blank"><img src="/assets/img/social/linkedin-footer.jpg" alt="LinkedIn" /></a>
          <a href="#" title="YouTube" target="_blank"><img src="/assets/img/social/youtube-footer.jpg" alt="YouTube" /></a>
        </div>
        <div>
      		<p><span class="label label-info">Info</span>&nbsp;I am currently rewriting <strong>plantofloat</strong> to run under a <a title="MVC Framework" href="http://en.wikipedia.com/wiki/Model–view–controller" target="_blank">MVC framework</a>.</p>
     			<p>Adaptive styling will make it usable with portable devices.</p>
      		<img src="/assets/img/responsive-illustrations.png" alt="This site can be used on portable devices." title="This site can be used on portable devices." style="margin-bottom:20px;"/>
        </div>
        <div>
          <code>Alpha version, limited functionality!</code>
          <img src="/assets/img/carte-permis-hauturier.jpg" alt="File a Float Plan!" title="File a Float Plan!" style="margin:20px 0 20px 0;"/>
        </div>


   		</div>

		<div class="span7" style="border:1px solid #cccccc;border-radius:4px;padding:15px;background-color:#F8E0E0">
			<p>As you all may be aware, there is currently no viable way of creating a Float Plan that takes advantage of the common available technologies most of us use on a daily basis.
			<p>This Float Plan generator will be leading the way to bring this aspect of the boating world into the 21st century.
			<p>Consider it a tool that goes way beyond filling out a piece of paper that you can give to a friend. It will provide you with the means to predefine your vessel, its equipment and capabilities. When the time comes you file your intended destination(s), estimated time of arrival, and other applicable details to create the equivalent of a Float Plan.</p>
			<p>You then will be able to designate a number of people that will be notified in case you do not close your Float Plan after your estimated time of arrival (plus tolerance defined by you). This notification can take on a number of ways, such as email, phone message and social media (Twitter, Facebook). The receipients will be notified ahead of time by email.</p>
			<p>If an overdue notification is received, they will be given instructions how to proceed.</p>
			<p>So, to make a long story short, after registration (no personal information requested, besides a valid email address) and entering your vessel's information; you can then fill out a route plan containing departure, enroute and arrival data.</p>
			<p>Prior to departure you activate the Float Plan and after arrival you close it.</p>
			<p>Those of you who have knowledge of aviation procedures will find this very familiar.</p>
			<p>Oh yes, almost forgot the best part: <span class="label label-important">it's free!</span></p>
      <p>Checkout a future feature: <a href="/reporting">Real time interaction with your floatplan</a>.</p>
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
				&copy; 2013 - <a href="http://bytesupply.com"><span style="color:#FA5858;">byte</span><span style="color:#819FF7">Supply</span></a> - all rights reserved (v0.5).
			</p>
		</div>
		<div class="span6">
			<p class="footer text-right">
				Page rendered in <strong>{elapsed_time}</strong> seconds.
			</p>
		</div>
	</div>
</div>

<!-- Modal section below -->
<!-- Sign up -->
<div id="SignInModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Sign In</h3>
  </div>
  <div class="modal-body">
    <?php
    $attributes = array('class' => 'form-horizontal');
    echo form_open('user/login', $attributes);
    ?>
      <div class="control-group">
        <label class="control-label" for="inputEmail">Email</label>
        <div class="controls">
          <input type="text" id="inputEmail" name="email" placeholder="Email" required />
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputPassword">Password</label>
        <div class="controls">
          <input type="password" id="inputPassword" name="password" placeholder="Password" required />
        <p><a href="/ForgotPassword">Forgot Password?</a></p>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <label class="checkbox">
            <input type="checkbox" name="rememberme" />Remember me&nbsp;<a class="tooltipster" href="#" data-toggle="tooltip" title="Will enable auto-login when you check this option. Automatically expires after six months; or immediately when indicated during the sign-out process."><i class="icon-info-sign"></i></a>
          </label>
          <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
  </div>
</div>

<!-- Sign Out -->
<div id="SignOutModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Sign Out</h3>
  </div>
  <div class="modal-body">
    <?php
    $attributes = array('class' => 'form-horizontal');
    echo form_open('user/logout', $attributes);
    ?>
     <div class="control-group">
        <div class="controls">
          <p>You are signed in as <?=$_SESSION['user_fullname']?>.</p>
          <p>Sign-in time: <?=$_SESSION['user_logintime']?></p>
          <?php
			$cookie = $this->input->cookie('_p2F_login');
			if($cookie !== false)
          {
            ?>
            <label class="checkbox" style="margin-top:35px;">
              <input type="checkbox" name="forgetme" />Forget me&nbsp;<a class="tooltipster" href="#" data-toggle="tooltip" title="Will remove your auto-login when you check this option."><i class="icon-info-sign"></i></a>
            </label>
            <?php
          }
          ?>
          <button type="submit" class="btn btn-warning">Sign out</button>
        </div>
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
  </div>
</div>

<!-- Privacy Statement -->
<div id="PrivacyModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Privacy Statement</h3>
  </div>
  <div class="modal-body">
    <p>Plantofloat.com does not track or otherwise capture personal information on this web site.</p>
    <p>We retain limited traffic information about visitors passing through these pages.</p>
    <p>We use this information only to analyze general traffic patterns (e.g. what pages and their content are most/least popular) and to perform routine system maintenance. The data gathered consists of IP addresses, date/time stamps and our page content identification tags.</p>
    <p>Whether you're browsing our site, using our applications, or seeking to acquire our professional services, we want to make you comfortable with our privacy practices and the security measures we take to protect your personal information.</p>
    <p>While we've structured our Websites so that, in general, you can visit us on the Web without identifying yourself or revealing any personal information, you may be required to provide personal information to access certain secured and detailed information, download certain software, enter certain transactions, and/or to request our services.</p>
    <p>If you choose to email us and provide personally identifiable information about yourself, we will use this information only to respond to your inquiry.</p>
    <p>We will not sell, rent or otherwise disclose that information to third parties, unless such parties are member of an official U.S. law enforcement agency, equiped with a proper subpoena.</p>
    <p>The content of these pages is appropriate to all ages. Content is not provided by users, nor can it be altered but by the Administrator of this site.</p>
    <p>Use the <a href="#ContactUsModal" data-dismiss="modal" aria-hidden="true" role="button" data-toggle="modal">Contact Us</a> form in case you have any questions about our privacy practices, or have other issues with these pages.</p>
    <p>We hope you appreciate these efforts since they are in the spirit of improving the quality of your visit here.</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
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
