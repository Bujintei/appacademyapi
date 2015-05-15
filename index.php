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

//function that connects to Instagram
function connectToInstagram($url){
	$ch = curl_init();
	curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => 2,
		));
	$result= curl_exec($ch);
	curl_close($ch);
	return $result;
}
//function to get userID
function getUserID($userName){
	$url = 'http://api.instagram.com/v1/users/search?q='.$userName.'&client_id='.clientID;
	$instagramInfo = connectToInstagram($url);
	$results = json_decode($instagramInfo, true);
	echo $results['data']['0']['id'];
}

if (isset($_GET['code'])){
	$code = ($_GET['code']);
	$url = 'https://api.instagram.com/oauth/access_token';
	$access_token_settings = array('client_id' => clientID,
									'client_secret' => clientSecret,
									'grant_type' => 'authorization_code',
									'redirect_uri' =>redirectURI,
									'code' => $code
									);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $access_token_settings);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$result = curl_exec($curl);
curl_close($curl);

$results = json_decode($result, true);
getUserID($results['user']['username']);
}
else{
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
<?php
}
?>