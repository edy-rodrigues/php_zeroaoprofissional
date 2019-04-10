<?php

if(!empty($_FILES['foto']['tmp_name'])) {

    $tipo = array("image/png", "image/jpg", "image/jpeg");

    if(in_array($_FILES['foto']['type'], $tipo, true)) {

        $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $nomeArquivo = md5(time().rand(0, 999).time()).".".$ext;
    
        move_uploaded_file($_FILES['foto']['tmp_name'], "fotos/". $nomeArquivo);
    
        echo "Foto enviada com sucesso!";
    }
}

?>