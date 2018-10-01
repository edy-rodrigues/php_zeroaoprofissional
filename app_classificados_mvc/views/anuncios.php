<div class="container">
    <h1>Meus Anúncios</h1>

    <a href="<?php echo BASE_URL; ?>anuncios/add" class="btn btn-primary">Adicionar Anúncio</a>

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

            foreach ($anuncios as $item): ?>
            <tr>
                <td>
                <?php if(!empty($item['url'])): ?>
                <img src="<?php echo BASE_URL; ?>assets/img/anuncios/<?php echo $item['url']; ?>" border="0" height="75">
                <?php else: ?>
                <img src="<?php echo BASE_URL; ?>assets/img/default.png" height="75" border="0">
                <?php endif; ?>
                </td>
                <td><?php echo utf8_encode($item["titulo"]); ?></td>
                <td><?php echo "R$ ".number_format($item["valor"], 2); ?></td>
                <td><a href="<?php echo BASE_URL; ?>anuncios/editar/<?php echo $item['id'] ?>" class="btn btn-warning">Editar</a></td>
                <td><a href="<?php echo BASE_URL; ?>anuncios/excluir/<?php echo $item['id'] ?>" class="btn btn-danger">Excluir</a></td>
            </tr>
            <?php  endforeach; ?>
        </tbody>
    </table>
</div>