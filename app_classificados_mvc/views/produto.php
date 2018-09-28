<div class="container-fluid">
    <div class="row">
        <div class="col-sm-5">
            <div class="carousel slide" data-ride="carousel" id="carousel-produto">
                <div class="carousel-inner" role="listbox">
                    <?php foreach($anuncio['fotos'] as $chave => $foto): ?>
                    <div class="item <?php echo $chave == '0' ? 'active' : ''; ?>">
                        <img src="<?php echo BASE_URL; ?>assets/img/anuncios/<?php echo $foto['url'] ?>" alt="">
                    </div>
                    <?php endforeach; ?>
                </div>
                <a href="#carousel-produto" class="left carousel-control" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
                <a href="#carousel-produto" class="right carousel-control" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
            </div>
        </div>
        <div class="col-sm-7">
            <h2><?php echo utf8_encode($anuncio['titulo']); ?></h2>
            <h4><?php echo utf8_encode($anuncio['categoria']); ?></h4>
            <p class="mb-2"><?php echo utf8_encode($anuncio['descricao']); ?></p>
            <h3><?php echo "R$ ".number_format($anuncio["valor"], 2, ",", "."); ?></h3>
            <h4><?php echo utf8_encode($anuncio['telefone']); ?></h4>
            <h5>Estado: <?php echo $anuncio['estado'] == '0' ? 'Ruim' : $anuncio['estado'] == '1' ? 'Bom' : 'Ótimo'; ?></h5>
        </div>
    </div>
</div>