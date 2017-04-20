<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SOS</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/superfish.css" media="screen">
<script src="js/jquery-1.9.0.min.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.js"></script>
<script>

		// initialise plugins
		jQuery(function(){
			jQuery('#example').superfish({
				//useClick: true
			});
		});

		</script>
</head>
<body>
<div class="header-wrapper">
  <div class="wrapper">
    <div class="logo">
      <h1>Save Mankind</h1>
      <span>Its Our World</span> </div>
    <div class="menu">
      <ul class="sf-menu" id="example">
        <li><a href="index.html">Home</a></li>
        <li><a href="map.html">Relief Shelters</a></li>
        <li class="current"> <a href="index.php" >SOS</a>
        </li>
        <li> <a href="#">Pages </a>
          <ul>
            <li class="current"><a href="protectionguide.html">Self-Protection Guidelines</a></li>
			<a href="guidelines.html">Survival Guidelines</a></li>
			     <li><a href="Firstaid.html">First Aid</a></li>
            <li><a href="proactive.html">Proactive Preparation</a></li>
			
			<li> <a href="Quick.html">Quick Evacuation.</a> </li>
           
            <li><a href="IMHelp.html">Immediate help details </a></li>
			 <li><a href="DD.html"> Do's and Dont's</a></li>
            <li><a href="faq.html">FAQs</a></li>
			
          </ul>
        </li>
        <li> <a href="Emergency.html">Emergency Nos.</a> </li>
		 
        <li> <a href="Suspicious.html">Suspicious Activity</a> </li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
<center><br><br><br><br><h1>Message Sent Successfully....</h1></center>
</body>
</html>
<?php

require('inc/Services/Twilio.php'); 

$account_sid = ''; 
$auth_token = ''; 
$client = new Services_Twilio($account_sid, $auth_token); 

$user_ip = getenv('REMOTE_ADDR');
$url = "http://ip-api.com/json";
$geo = json_decode(file_get_contents($url), true);

$lat = $geo["lat"];
$long = $geo["lon"];
$zip = $geo["zip"];
$city = $geo["city"];
$country = $geo["country"];


$client->account->messages->create(array( 
	'To' => "",
	'From' => "", 
	'Body' => "Emergency Alert,Help us Country=$country City=$city Zipcode=$zip Lat=$lat Long=$long",   
));
?>
