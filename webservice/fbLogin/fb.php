<?php
session_start();
require_once "Facebook/autoload.php";

$fb = new Facebook\Facebook([
    'app_id' => '168586560717166',
    'app_secret' => 'eda56574a0e7453e6a1afe4adb7f9a0e',
    'default_graph_version' => 'v2.7'
]);
?>