<?php
if(isset($_FILES['file'])) {
    $file = $_FILES['file'];

    move_uploaded_file($file['tmp_name'], 'img/'.$file['name']);

    echo "Arquivo de: ".$_POST['txt-nome']. " enviado com sucesso!";
}
?>