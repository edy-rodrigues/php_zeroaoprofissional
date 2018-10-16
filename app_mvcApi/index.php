<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
require_once "config.php";
require_once "routes.php";
require_once "vendor/autoload.php";

$Core = new Core\Core();
$Core->run();
?>