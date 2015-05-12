<?php 
//Configuration for our PHP Server
set_time_limit(0);
ini_set('default_socket_timeout', 300);
session_start();

//Make Constants using define.
define('clientID', 'dd86d0663cfe4bda9c8bd5ffda8d7a76');
define('clientSecret', '44a1cb4b5f694a879bc71cf8e8238ae1');
define('redirectURI', 'http://localhost/appacademyapi/index.php');
define('ImageDirectory', 'pics/');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>JESUS</title>
	</head>
	<body>
		<!-- Creating a login for people to go and give approval for our web app to access their Instagram Account 
		After getting approval, we are now going to have the information so that we can play with it.
		-->
		<a href="https:api.instagram.com/oauth/authorize/?client_id=<?php echo clientID; ?>&redirect_uri=<?php echo redirectURI; ?>&response_type=code">LOGIN</a>
		<script src="js/main.js"></script>
	</body>
</html>