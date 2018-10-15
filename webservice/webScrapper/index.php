<?php
require_once "simple_html_dom.php";

$html = file_get_html('https://www.youtube.com/results?search_query='. $_GET['q']);

$result = $html->find(".yt-lockup");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto Crowller</title>
</head>
<body>
<table>
    <thead>
        <th>Thumnail</th>
        <th>Tempo</th>
        <th>Link</th>
        <th>Titulo</th>
        <th>Autor</th>
        <th>Views</th>
    </thead>
    <tbody>
        <?php foreach($result as $video): ?>
        <?php
            $img = $video->find('.yt-thumb-simple img', 0)->attr['src'];
            $tempo = $video->find('.video-time', 0)->plaintext;
            $link = "https://www.youtube.com". $video->find('.yt-lockup-title a', 0)->href;
            $titulo = $video->find('.yt-lockup-title a', 0)->plaintext;
            $autor = $video->find('.yt-lockup-byline a', 0)->plaintext;
            $views = $video->find('.yt-lockup-meta-info li', 1)->plaintext;
        ?>
        <tr>
            <td><?php echo "<img src='". $img ."'>"; ?></td>
            <td><?php echo $tempo; ?></td>
            <td><?php echo $link; ?></td>
            <td><?php echo $titulo; ?></td>
            <td><?php echo $autor; ?></td>
            <td><?php echo $views; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
foreach ($result as $video) {

    echo "<img src='". $img ."'>";
    echo $tempo."<br>";
    echo "LINK: ". $link ."<br>";
    echo "TITULO: ". $titulo ."<br>";
    echo "Autor: ". $autor ."<br>";
    echo "Views: ". $views ."<br>";
    echo "<hr>";
}
?>
</body>
</html>