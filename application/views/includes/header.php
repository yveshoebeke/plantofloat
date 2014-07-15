<!DOCTYPE html>
<html lang="en">
<head>
	<title>Plantofloat - a floatplan generator</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="index, nofollow" />
    <meta name="author" content="byteSupply - Yves Hoebeke" />
    <meta name="description" content="Float Plan Management" />
    <meta name="keywords" content="boating, sailing, boating safety, passage, passage planning, planning, navigation, emergency, float plan, maritime, maritime navigation, planning, maritime planning, nautical" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/assets/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">	<link rel="shortcut icon" href="/assets/img/favicon.ico" />
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
<?php include_once('analyticstracking.inc.php') ?>
<div class="container">
	<div class="row-fluid">
		<div class="span12">
			<h2 style="color:#3A87AD"><img src="/assets/img/logo.png" alt="Plantofloat Logo" width="34" height="32" />Plantofloat</h1>
			<hr />
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<ul class="nav nav-tabs">
			    <li><a href="/">Welcome Page</a></li>
				<?php
				switch ($mode){
					case 'user':
						?>
					    <li class="active"><a href="#">My Info</a></li>
					    <li><a href="/vessel">Vessel</a></li>
					    <li><a href="/floatplan">Float Plan</a></li>
					    <li><a href="/trustee">Trustee</a></li>
					    <?php
					    if(isset($_SESSION['user_type']) &&  $_SESSION['user_type'] == 1)
					    {
					    	?>
						    <!--<li><a href="http://plantofloat.com/index.php/admin">Admin</a></li>-->
						    <li><a href="#">Admin</a></li>
						    <?php
					    }
					    break;
					case 'vessel':
						?>
					    <li><a href="/user">My Info</a></li>
					    <li class="active"><a href="#">Vessel</a></li>
					    <li><a href="/floatplan">Float Plan</a></li>
					    <li><a href="/trustee">Trustee</a></li>
					    <?php
					    break;
					case 'floatplan':
						?>
					    <li><a href="/user">My Info</a></li>
					    <li><a href="/vessel">Vessel</a></li>
					    <li class="active"><a href="#">Float Plan</a></li>
					    <li><a href="/trustee">Trustee</a></li>
					    <?php
					    break;
					case 'trustee':
						?>
					    <li><a href="/user">My Info</a></li>
					    <li><a href="/vessel">Vessel</a></li>
					    <li><a href="/floatplan">Float Plan</a></li>
					    <li class="active"><a href="#">Trustee</a></li>
					    <?php
					    break;
				}
				?>
			</ul>
		</div>
	</div>
