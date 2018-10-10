<?php
require_once "fb.php";

if(isset($_SESSION['fb_access_token']) && !empty($_SESSION['fb_access_token'])) {
    $res = $fb->get('/me?fields=email,name,id,photos,picture', $_SESSION['fb_access_token']);
    $res = json_decode($res->getBody());

    echo "<pre>";
    print_r($res->picture->data);
    echo "</pre>";

    echo "<img src=". $res->picture->data->url .">";

    echo "Meu nome é: ". $res->name."<br>";
    echo "<a href='sair.php'>Sair</a>";
} else {
    header("Location: login.php");
    exit;
}
?>