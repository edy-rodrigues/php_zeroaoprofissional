<?php

if(count($_FILES['txt-mArquivo']['tmp_name']) > 0) {

    for ($i=0; $i < count($_FILES['txt-mArquivo']['tmp_name']); $i++) { 
        
        $arquivo = $_FILES['txt-mArquivo'];

        $extensao[$i] =  pathinfo($arquivo['name'][$i], PATHINFO_EXTENSION);
        $nomeDoArquivo = md5($arquivo['name'][$i].time().rand(0, 999)).".$extensao[$i]";
        move_uploaded_file($arquivo['tmp_name'][$i], '../projetoUploadArquivo/arquivos/'.$nomeDoArquivo);

    }

    echo "Arquivos enviados com sucesso!";

}

?>