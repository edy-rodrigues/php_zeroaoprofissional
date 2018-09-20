<?php
session_start();

if(!empty($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

require_once "conexao.php";
require_once "Language.class.php";
$lang = new Language();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="index.php?lang=en">English</a>
<a href="index.php?lang=pt-br">Português</a>
<a href="index.php?lang=es">Español</a>
<hr>
Linguagem Definida: <?php echo $lang->getLanguage(); ?><br>
<button><?php $lang->get("BUY"); ?></button>
<a href=""><?php $lang->get("LOGOUT");  ?></a><br><br>

<?php $lang->get("NAME"); ?>: Edinei
<br><br>

<?php

$sql = "SELECT id, (SELECT value FROM tb_language WHERE tb_language.lang = :lang AND tb_language.name = tb_category.lang_item) AS name FROM tb_category";
$sql = $pdo->prepare($sql);
$sql->bindValue(":lang", $lang->getLanguage());
$sql->execute();

echo "<h3>". $lang->get('CATEGORY') ."</h3><br>";
if($sql->rowCount() > 0) {
    foreach ($sql->fetchAll() as $category) {
        echo $category['name'].'<br>';
    }
}

?>
</body>
</html>