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
</head>
<body>
<?php include_once('includes/analyticstracking.inc.php') ?>
<div class="container">
	<div class="row-fluid">
		<div class="span12">
			<h2 style="color:#3A87AD"><img src="/assets/img/logo.png" alt="Plantofloat Logo" width="34" height="32" />Plantofloat</h2>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span12">
			<h5 style="color:#999999">Real time reporting to Plantofloat</h5>
      <hr />
		</div>
	</div>

	<div class="row-fluid">
		<div class="span12">
			<p>When en-route and have communication capabilities<sup>(1)</sup> that can handle email, you can report back to Plantofloat.</p>
			<p>Plantofloat scans a "reporting email account"<sup>(2)</sup> every 5 minutes to see if any valid reporting is present.</p>
			<p>The subject of the email must be your valid floatplan identifier, which is given to you after creating your floatplan. Invalid data content in the subject line will cause the entire message to be abandoned.</p>
			<p>There are 4 seperate type of message types that will be recognized by our system:</p>
			<ol>
				<li style="text-decoration:underline">Message type designators are:</li>
					<ol>
						<li>P - Position Report.</li>
						<li>O - Observation.</li>
						<li>C - Change to plan.</li>
						<li>M - General message.</li>
					</ol>
				<li style="text-decoration:underline">General data rules:</li>
					<ul>
						<li>Subject line must contain a valid floatplan identifier of a floatplan that is in an activate (opened) status.</li>
						<li>The body of the message may only contain valid type designators, followed by there associated data in its proper order.</li>
						<li>Data elements are separated by a comma (",").</li>
						<li>If different type of messages are combined in a single transmission, they must be contained on their own line, i.e. separated by a return.</li>
						<li>Date/time is always considered in GMT and in the following format:</li>
							<ul>
								<li>Date as YYYYMMDD, 4 digit year followed by month and day, like: 20130621 (June 6, 2013).</li>
								<li>Time as HHMM, 24 hr format, reflecting GMT values, like: 2115 (9:15 PM GMT, or 4:15 PM EST for example).</li>
								<li>Both can be combined to make a full "timestamp", like: 201306212115 (June 6, 2013 at 21:15 GMT).</li>
								<li>If omitted, we will assume the time when the message is received by our system and we will set an indication that this time may be not exact (due to transmission propagation time).</li>
								<li>You may omit the date, and give the time only, and visa-versa. The missing part of the timestamp will be provided by the system receipt timestamp.</li>
							</ul>
						<li>Speed is to be given in knots.</li>
						<li>Distance is always to be assumed to be in NM (Nautical Miles).</li>
						<li>Longitude and Latitude must be in decimal format, like: 20.385825,-151.171875 (20&deg; 23' 9", 151&deg; 10' 19" West).</li>
						<li>Wave heights are in feet and wave periods (time between crests) are in minutes, like: 8,2 (8 ft crests every 2 minutes).</li>
						<li>Temperatures must be given in degrees Celsius.</li>
						<li>Barometric pressures are expected to be reported in millibars (mb), optionally followed by a "R" or "F", indicating Rising or Falling respectively.</li>
						<li>Optional data elements may be eliminated. In order to keep the same sequence, an omitted data element must be replaced by an "-", or just an empty space.</li>
					</ul>
				<li style="text-decoration:underline">Details regarding the different message types:</li>
					<ol>
						<li style="text-decoration:underline"><span style="background-color:#FFFF00">P</span>osition report:</li>
							<ul>
								<li>General Format: <span style="background-color:#FFFF00">P</span><span style="background-color:#DDDDDD">{timestamp},Latitude,Longitude,{Heading},{Speed},{Revised ETA}</span> ("{...}" indicates optional value).</li>
								<li>Examples:</li>
									<ul>
										<li><span style="background-color:#DDDDDD">P201310211700,28.304,-73.455,210,8,20131025</span> &raquo; On October 21, 2013 I was at 28.303N,73.455W on a heading of 210 running at 8kts and revise my ETA to October 25.</li>
										<li><span style="background-color:#DDDDDD">P,28.304,-73.455</span> &raquo; I am at 28.303N,73.455W (timestamp to be determined by system reception date/time).</li>
										<li><span style="background-color:#DDDDDD">P,28.304,-73.455,-,-,20130916</span> &raquo; Same as previous example, but with added change of ETA.</li>
										<li><span style="background-color:#DDDDDD">P20131021,28.304,-73.455,210,8</span> &raquo; On Oct 21, 2013 I was at 28.303N,73.455W on a 210 degree heading at 8kts (missing time will be substituted by system reception time).</li>
									</ul>
								</ul>
						<li style="text-decoration:underline"><span style="background-color:#FFFF00">O</span>bservations:</li>
							<ul>
								<li>General Format: <span style="background-color:#FFFF00">O</span><span style="background-color:#DDDDDD">{timestamp},Wind direction,Wind speed,{Visibility},{Barometric Press}{F/R},{Air Temp},{Water Temp},{Wave Height},{Wave Period}</span> ("{...}" indicates optional value).</li>
								<li>Examples:</li>
									<ul>
										<li><span style="background-color:#DDDDDD">O201310211700,090,15,5,1011.4R,21,14,8,2</span> &raquo; On October 21, 2013 at 17:00GMT I observed wind from the East/90 degrees at 15kts. Visibility is 5NM, air temperature was 21C, water temperature 14C. Barometric pressure was at 1011.4mb and rising. Wave crests were at 8ft every 2 minutes.</li>
										<li><span style="background-color:#DDDDDD">O,090,15</span> &raquo; I observed wind from the East (90 degrees) at 15kts.</li>
									</ul>
								</ul>
						<li style="text-decoration:underline"><span style="background-color:#FFFF00">C</span>hanges to current plan:</li>
							<ul>
								<li>General Format: <span style="background-color:#FFFF00">C</span><span style="background-color:#DDDDDD">{timestamp},eta,{destination}</li>
								<li>Examples:</li>
									<ul>
										<li><span style="background-color:#DDDDDD">C201310211700,20131024,block island</span> &raquo; On October 21, 2013 at 17:00GMT I change my plan to reflect an ETA of 10/24/2013 to a new destination, Block Island.</li>
										<li><span style="background-color:#DDDDDD">C,201307091600</span> &raquo; I change my plan to reflect a new ETA of 16:00GMT on 07/09/2013 (no change in destination).</li>
										<li><span style="background-color:#DDDDDD">C20130814,,Catalina Island</span> &raquo; I change my plan on August 14 2013 to reflect a new destination (Catalina Island).</li>
									</ul>
							</ul>
						<li style="text-decoration:underline"><span style="background-color:#FFFF00">G</span>eneral Messages:</li>
							<ul>
								<li>General Format: <span style="background-color:#FFFF00">M</span><span style="background-color:#DDDDDD">{timestamp},message</li>
								<li>Example:</li>
									<ul>
										<li><span style="background-color:#DDDDDD">M,It sure is pretty here</span> &raquo; The message "It sure is pretty here" will be forwarded to the contacts you associated with your floatplan <strong>and</strong> assigned to receive these messages<sup>(3)</sup>.</li>
									</ul>
							</ul>
					</ol>
			</ol>
			<p><sup>(1)</sup>Examples are email enabled HF/SSB or VHF radios, Satellite phones and SMS messaging from a mobile phone when within range of cellular service. Of course if you are in a marina, you can send an email from your computer via WiFi or cable connection.</p>
			<p><sup>(2)</sup>This account will be revealed to you after registration and upon request thereafter.</p>
			<p><sup>(3)</sup>Of course, since you need to have email access, you could send these messages directly. However, as an addedd convenience you can bulk send a message to multiple contacts at once. They will receive this on all channels possible (as indicated by you): email and social media.</p>
	        <p><a href="/" class="btn btn-info">Return to Homepage</a></p>
		</div>
	</div>
