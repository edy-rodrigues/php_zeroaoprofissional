<?php
session_start();
require_once "config.php";
require_once "routes.php";
require_once "vendor/autoload.php";

$Core = new Core\Core();
$Core->run();
?>