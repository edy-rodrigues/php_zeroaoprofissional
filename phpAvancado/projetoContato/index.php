<?php
require_once "Contato.class.php";

$contato = new Contato();

// ---- CREATE
// $contato->add('edineibk@gmail.com', 'Edinei Rodrigues');
// $contato->add('matheus@gmail.com');

// ---- READ ONLY ONE
// $nome = $contato->getNome("edineibk@gmail.com");

// echo "Nome: ".$nome;

// ---- READ ALL
// $lista = $contato->getAll();

// echo "<pre>";
// print_r($lista);
// echo "</pre>";

// ---- UPDATE
// $contato->editarEmail('Matheus Vicente', 'matheus@gmail.com');

// ---- DELETE
// $excluir = $contato->excluirEmail("matheus@gmail.com");
// if( $excluir ) {
//     echo "Foi excluido";
// } else {
//     echo "Não foi excluido";
// }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Contato</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .container {
            flex: 1;
            max-width: 800px;
            padding: 20px;
            color: #222;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        table {
            width: 100%;
        }

        table th {
            border: 1px solid #333;
            color: #444;
        }

        table td {
            text-align: center;
            border: 1px solid #555;
        }

        table td.acoes {
            display: flex;
            justify-content: space-around;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Contatos</h2>

    <a href="adicionar.php">[ Adicionar ]</a><br>

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
            echo "<td class='acoes'><a href='editar.php?id=". $item['id'] ."'>[ Editar ]</a><a href='excluir.php?id=". $item['id'] ."'>[ Excluir ]</a></td>";
            echo "<tr>";
        }
        ?>
        
    </table>

</div>

</body>
</html>