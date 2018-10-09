<?php
require_once "fb.php";

if(isset($_SESSION['fb_access_token']) && !empty($_SESSION['fb_access_token'])) {
    echo "Ta logado";
} else {
    header("Location: login.php");
    exit;
}
?>