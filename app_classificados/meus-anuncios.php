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
                <td><img src="assets/img/anuncios/<?php echo $item['url'] ?>" border="0"></td>
                <td><?php echo $item["titulo"]; ?></td>
                <td><?php echo number_format($item["valor"], 2); ?></td>
                <td></td>
                <td></td>
            </tr>
            <?php  endforeach; ?>
        </tbody>
    </table>
</div>
<?php require_once "pages/footer.php"; ?>