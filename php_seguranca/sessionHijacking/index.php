<?php
session_start();
if(empty($_SESSION['dono'])) {
    $_SESSION['dono'] = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
}
$token = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
if($_SESSION['dono'] != $token) {
    exit;
}

echo "Meu sistema";
// if(empty($_SESSION['numero'])) {
//     $_SESSION['numero'] = rand(0, 99);
// }

print_r($_SESSION);
?>