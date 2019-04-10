<?php

$imagem = "assets/img/background.jpg";

list($largura_original, $altura_original) = getimagesize($imagem);
list($largura_mini, $altura_mini) = getimagesize("assets/img/avatar_hat.jpg");

$imagem_final = imagecreatetruecolor($largura_original, $altura_original);

$imagem_original = imagecreatefromjpeg($imagem);
$imagem_mini = imagecreatefromjpeg("assets/img/avatar_hat.jpg");

imagecopy($imagem_final, $imagem_original, 0, 0, 0, 0, $largura_original, $altura_original);

imagecopy($imagem_final, $imagem_mini, 100, 200, 0, 0, $largura_mini, $altura_mini);

$nome_do_arquivo = "background".date("d-m-Y")."-".rand(0, 999);

imagejpeg($imagem_final, "assets/img/".$nome_do_arquivo.".jpg", 100);

echo "Imagem criada com sucesso!";

?>