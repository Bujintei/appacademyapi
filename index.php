<?php 
//Configuration for our PHP Server
set_time_limit(0);
ini_set('default_socket_timeout', 300);
session_start();

//Make Constants using define.
define('client_id', 'c73d173254d844b89d8117954f97d9ee');
define('client_secret', '971766cd8c4f4af7b7a6ff36f32b68b0');
define('redirectURI', 'http://localhost/appapi/index.php');
define('ImageDirectory', 'pics/');

?>

<!-- CLIENT INFO
CLIENT ID c73d173254d844b89d8117954f97d9ee	
CLIENT SECRET 971766cd8c4f4af7b7a6ff36f32b68b0
WEBSITE URL http://localhost/appapi/index.php
REDIRECT URI http://localhost/appapi/index.php -->