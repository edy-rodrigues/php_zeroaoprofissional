<?php
require_once "simple_html_dom.php";

$html = file_get_html('https://www.youtube.com/results?search_query=gta');

$result = $html->find(".yt-lockup");

foreach ($result as $video) {
    $img = $video->find('.yt-thumb-simple img', 0)->attr['src'];
    $tempo = $video->find('.video-time', 0)->plaintext;
    $link = "https://www.youtube.com". $video->find('.yt-lockup-title a', 0)->href;
    $titulo = $video->find('.yt-lockup-title a', 0)->plaintext;
    $autor = $video->find('.yt-lockup-byline a', 0)->plaintext;

    echo "<img src='". $img ."'>";
    echo $tempo."<br>";
    echo "LINK: ". $link."<br>";
    echo "TITULO: ". $titulo."<br>";
    echo "Autor: ". $autor."<br>";
    echo "<hr>";
}
?>