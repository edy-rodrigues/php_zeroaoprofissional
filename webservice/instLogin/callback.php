<?php
session_start();
require_once "instagramAPI/Instagram.php";
require_once 'instConfig.php';

if(isset($_GET['code'])) {
    $code = $_GET['code'];

    $_SESSION['inst_access_token'] = $instagram->getOAuthToken($code);
}

header("Location: index.php");
?>