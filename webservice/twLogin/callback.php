<?php
session_start();

require_once "twconfig.php";
require_once "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

$request_token = array(
    'oauth_token' => $_SESSION['oauth_token'],
    'oauth_token_secret' => $_SESSION['oauth_token_secret']
);

$conn = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $request_token['oauth_token'], $request_token['oauth_token_secret']);

$_SESSION['tw_access_token'] = $conn->oauth('oauth/access_token', array(
    'oauth_verifier' => $_GET['oauth_verifier']
));

header("Location: index.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Callback Twitter</title>
</head>
<body>
    
</body>
</html>