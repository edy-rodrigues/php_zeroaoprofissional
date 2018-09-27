<?php
require_once "Contato.class.php";

$contato = new Contato();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Contato</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- CSS -->
</head>
<body>

<div class="container">

    <h2>Contatos</h2>

    <a href="adicionar.php" data-action="open-modal">[ Adicionar ]</a><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>

        <?php
        $lista = $contato->getAll();
        foreach ($lista as $item) {
            echo "<tr>";
            echo "<td>".$item['id']."</td>";
            echo "<td>".$item['nome']."</td>";
            echo "<td>".$item['email']."</td>";
            echo "<td class='acoes'><a href='editar.php?id=". $item['id'] ."' data-action='open-modal'>[ Editar ]</a><a href='excluir.php?id=". $item['id'] ."'>[ Excluir ]</a></td>";
            echo "<tr>";
        }
        ?>
        
    </table>
    <!-- SCRIPT -->
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <!-- SCRIPT -->
</div>

<div id="modal">
    <div class="modal-content">
        
    </div>
</div>

</body>
</html>