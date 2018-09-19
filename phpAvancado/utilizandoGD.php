<?php

$arquivo = "assets/img/background.jpg";

$altura = 500;
$largura = 500;

list($largura_original, $altura_original) = getimagesize($arquivo);

$ratio = $largura_original / $altura_original;

if ( $largura / $altura > $ratio ) {
    $largura = $altura * $ratio;
} else {
    $altura = $largura / $ratio;
}

$imagem_final = imagecreatetruecolor($largura, $altura);
$imagem_original = imagecreatefromjpeg($arquivo);

imagecopyresampled($imagem_final, $imagem_original, 0, 0, 0, 0, $largura, $altura, $largura_original, $altura_original);

$nome_da_imagem = "background".date("d-m-Y")."-".rand(1, 999);

imagejpeg($imagem_final, "assets/img/".$nome_da_imagem.".jpg", 100);

echo "Imagem redimensionada com sucesso!";

?>