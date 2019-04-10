<?php
session_start();
header("Content-Type: image/jpeg");

$captcha = $_SESSION['captcha'];

$imagem = imagecreate(130, 50);
imagecolorallocate($imagem, 200, 200, 200);

$fontColor = imagecolorallocate($imagem, 20, 20, 20);

imagettftext($imagem, 40, 0, 22, 35, $fontColor, 'Ginga.otf', $captcha);

imagejpeg($imagem, null, 100);
?>