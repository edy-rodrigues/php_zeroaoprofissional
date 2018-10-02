<?php
require_once "config.php";

if(!empty($_POST['text'])) {
    $text = $_POST['text'];

    $sql = "SELECT * FROM tb_usuario WHERE nome LIKE :texto";
    $sql = $db->prepare($sql);
    $sql->bindValue(":texto", $text.'%');
    $sql->execute();

    if($sql->rowCount() > 0) {
        foreach ($sql->fetchAll() as $user) {
            $array[] = array('nome' => $user['nome'], 'id' => $user['id']);
        }
        echo json_encode($array);
    } else {
        $array[] = array('error' => "Nenhum usuário foi encontrado");
    }
}
?>