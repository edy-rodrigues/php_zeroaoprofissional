<?php

$dns = "mysql:dbname=db_projetotags;host=localhost";
$dbuser = "root";
$dbpass = "";

try {
    $pdo = new PDO($dns, $dbuser, $dbpass);
} catch (PDOException $e) {
    echo "ERRO: ".$e->getMessage();
    exit;
}

$sql = "SELECT caracteristicas FROM tb_usuario";
$sql = $pdo->prepare($sql);
$sql->execute();

if($sql->rowCount() > 0) {
    $lista = $sql->fetchAll();

    $carac = [];

    foreach ($lista as $usuario) {
        $palavras = explode(",", $usuario["caracteristicas"]);
        foreach ($palavras as $palavra) {
            $palavra = trim($palavra);

            if(isset($carac[$palavra])) {
                $carac[$palavra]++;
            } else {
                $carac[$palavra] = 1;
            }
        }
    }

    arsort($carac);

    $palavras = array_keys($carac);
    $cont = array_values($carac);

    $maior = max($cont);

    $tamanhos = [11, 15, 20, 30];

    for ($i=0; $i < count($palavras); $i++) { 
        $n = $cont[$i] / $maior;

        $h = ceil($n * count($tamanhos));

        echo "<p style='font-size: ". $tamanhos[$h - 1] ."px'>". $palavras[$i] ." (". $cont[$i] .")</p>";
    }
}

?>