<?php
require_once "Facebook.class.php";

$fb = new Facebook();

$post = $fb->createPost();
$post->__set("author", "Edinei");
$post->__set("message", "Essa é a minha menssagem da postagem");

echo "Autor: ". $post->__get("author"). "<br>";
echo $post->__get("message"). "<br>";
echo "<hr>";

$post2 = $fb->createPost();
$post2->__set("author", "Bia");
$post2->__set("message", "Postagem muito linda");

echo "Autor: ". $post2->__get("author"). "<br>";
echo $post2->__get("message"). "<br>";
echo "<hr>";

?>