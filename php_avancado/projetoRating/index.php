<?php
require_once "conexao.php";

$sql = "SELECT * FROM tb_filme";
$sql = $pdo->query($sql);
if($sql->rowCount() > 0) {
    foreach ($sql->fetchAll() as $filme): ?>
    <fieldset>
        <strong><?php echo $filme['titulo']; ?></strong><br><br>
        <a href="votar.php?id=<?php echo $filme['id']; ?>&voto=1"><img src="star.png" height='20' alt="Estrela"></a>
        <a href="votar.php?id=<?php echo $filme['id']; ?>&voto=2"><img src="star.png" height='20' alt="Estrela"></a>
        <a href="votar.php?id=<?php echo $filme['id']; ?>&voto=3"><img src="star.png" height='20' alt="Estrela"></a>
        <a href="votar.php?id=<?php echo $filme['id']; ?>&voto=4"><img src="star.png" height='20' alt="Estrela"></a>
        <a href="votar.php?id=<?php echo $filme['id']; ?>&voto=5"><img src="star.png" height='20' alt="Estrela"></a>
        ( <?php echo $filme['media'] ?> )
    </fieldset>
    <?php endforeach;
} else {
    echo "Não há filmes cadastrados!";
}

?>