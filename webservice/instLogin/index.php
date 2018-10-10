<?php
session_start();
require_once "instagramAPI/Instagram.php";
require_once 'instConfig.php';


if(isset($_SESSION['inst_access_token']) && !empty($_SESSION['inst_access_token'])) {

    $instagram->setAccessToken($_SESSION['inst_access_token']);

    $res = $instagram->getUserMedia('self');

    foreach ($res->data as $foto) {
        $link = $foto->link;
        $like = $foto->likes->count;
        $img = $foto->images->low_resolution->url;
        $legend = isset($foto->caption->text) ? $foto->caption->text : '';

        echo $legend."<br>";
        echo "<a href='". $link ."'><img src='". $img ."'></a><br>";
        echo "Likes: ". $like ."<hr>";
    }

    // echo "Meu nome é: ". $res->data->username;

} else {
    $loginUrl = $instagram->getLoginUrl();
    echo "<a href='". $loginUrl ."'>Login com Instagram</a>";
}

?>