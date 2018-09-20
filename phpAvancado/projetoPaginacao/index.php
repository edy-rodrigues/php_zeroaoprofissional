<?php

try {
    $pdo = new PDO("mysql:dbname=db_blog;host=localhost", "root", "");
} catch(PDOException $e) {
    echo "ERRO: ".$e->getMessage();
}

$total = 0;
$sql = "SELECT COUNT(*) as qtde FROM tb_post";
$sql = $pdo->query($sql);
$sql = $sql->fetch();
$total = $sql['qtde'];

$qtde_registros = 100;
$total_paginas = $total / $qtde_registros;

$pagina = 1;
if(isset($_GET['p']) && !empty($_GET['p'])) {
    $pagina = addslashes($_GET['p']);
}

$init = ($pagina - 1) * $qtde_registros;

$sql = "SELECT * FROM tb_post LIMIT $init, $qtde_registros";
$sql = $pdo->query($sql);

if($sql->rowCount() > 0) {

    foreach ($sql->fetchAll() as $post) {
        echo $post['id']. ' - '. $post['titulo'].'<br>';
    }

}

echo "<hr>";

for ($i=0; $i < $total_paginas; $i++) { 
    echo "<a href='./?p=".($i + 1)."'>[ ". ($i + 1) ." ]</a> ";
}

?>