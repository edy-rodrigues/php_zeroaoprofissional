<?php

$arquivo = $_FILES['txt-arquivo'];

if(isset($arquivo['tmp_name']) && !empty($arquivo['tmp_name'])) {

    $extensao =  pathinfo($arquivo['name'], PATHINFO_EXTENSION);
    $nomeDoArquivo = md5($arquivo['name'].time().rand(0, 999)).".$extensao";

    move_uploaded_file($arquivo['tmp_name'], '../projetoUploadArquivo/arquivos/'.$nomeDoArquivo);

    echo "Arquivo enviado com sucesso!";

}
?>