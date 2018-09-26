<?php require_once "pages/header.php"; ?>
<?php
if(empty($_SESSION['cLogin'])) {
    ?>
    <script>window.location.href = "login.php";</script>
    <?php
    exit;
}
?>
<div class="container">
    <h1>Meus Anúncios</h1>

    <a href="add-anuncio.php" class="btn btn-primary">Adicionar Anúncio</a>

    <h3>Lista de anúncios</h3>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Título</th>
                <th>Valor</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "classes/Anuncio.class.php";
            $anuncio = new Anuncio();
            $anuncios = $anuncio->readAll();

            foreach ($anuncios as $item): ?>
            <tr>
                <td>
                <?php if(!empty($item['url'])): ?>
                <img src="assets/img/anuncios/<?php echo $item['url']; ?>" border="0" height="75">
                <?php else: ?>
                <img src="assets/img/default.png" height="75" border="0">
                <?php endif; ?>
                </td>
                <td><?php echo $item["titulo"]; ?></td>
                <td><?php echo number_format($item["valor"], 2); ?></td>
                <td><a href="editar-anuncio.php?id=<?php echo $item['id'] ?>" class="btn btn-warning">Editar</a></td>
                <td><a href="excluir-anuncio.php?id=<?php echo $item['id'] ?>" class="btn btn-danger">Excluir</a></td>
            </tr>
            <?php  endforeach; ?>
        </tbody>
    </table>
</div>
<?php require_once "pages/footer.php"; ?>