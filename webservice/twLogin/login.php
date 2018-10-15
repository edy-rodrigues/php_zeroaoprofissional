<?php
session_start();

require_once "twconfig.php";
require_once "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

$conn = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);

$request_token = $conn->oauth('oauth/request_token', array(
    'oauth_callback' => OAUTH_CALLBACK
));

$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

$url = $conn->url('oauth/authorize', array(
    'oauth_token' => $request_token['oauth_token']
));

header("Location: ". $url);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login com Twitter</title>
</head>
<body>
    
</body>
</html>