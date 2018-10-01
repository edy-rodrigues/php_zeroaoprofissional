<?php 

if(isset($txt_titulo) && !$txt_titulo) {
    ?>
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <h4><strong>Que pena! Não foi possível editar seu produto.</strong></h4>
        <p>Você deve preencher o <strong>título do seu produto</strong>.</p>
    </div>
    <?php
} else {

    if(isset($campos_vazio) && !$campos_vazio) {
        ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4><strong>Parabéns</strong></h4>
            <p>Produto editado com sucesso. <a href="<?php echo BASE_URL; ?>anuncios">Lista dos meus produtos.</a></p>
        </div>
        <?php 
    } else if(isset($select_categoria) && !$select_categoria) {
        ?>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4><strong>Campos em branco.</strong></h4>
            <p>Você deve preencher a <strong>categoria do seu produto</strong>.</p>
        </div>
        <?php
    } else if(isset($txt_valor) && !$txt_valor) {
        ?>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4><strong>Campos em branco.</strong></h4>
            <p>Você deve preencher o <strong>valor do seu produto</strong>.</p>
        </div>
        <?php
    } else if(isset($txt_descricao) && !$txt_descricao) {
        ?>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4><strong>Campos em branco.</strong></h4>
            <p>Você deve preencher a <strong>descrição do seu produto</strong>.</p>
        </div>
        <?php
    } else if(isset($select_estado) && !$select_estado) {
        ?>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4><strong>Campos em branco.</strong></h4>
            <p>Você deve preencher o <strong>estado do seu produto</strong>.</p>
        </div>
        <?php
    }
}

?>
<div class="container">
    <h1>Meus Anúncios - Editar Anúncio</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="txt-titulo">Titulo:</label>
            <input type="text" name="txt-titulo" id="txt-titulo" class="form-control" value="<?php echo utf8_encode($anuncio['titulo']); ?>">
        </div>
        <div class="form-group">
            <label for="select-categoria">Categoria:</label>
            <select name="select-categoria" id="select-categoria" class="form-control">
                <?php
                foreach ($categoria as $item): ?>
                <option value="<?php echo $item['id']; ?>" <?php echo $anuncio['id_categoria'] == $item['id'] ? 'selected="selected"' : '' ?>><?php echo utf8_encode($item['nome']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="txt-valor">Valor:</label>
            <input type="text" name="txt-valor" id="txt-valor" class="form-control" value="<?php echo $anuncio['valor']; ?>">
        </div>
        <div class="form-group">
            <label for="txt-descricao">Descricao:</label>
            <textarea type="text" name="txt-descricao" id="txt-descricao" class="form-control"><?php echo utf8_encode($anuncio['descricao']); ?></textarea>
        </div>
        <div class="form-group">
            <label for="select-estado">Estado de Conservação:</label>
            <select name="select-estado" id="select-estado" class="form-control">
                <option value="0" <?php echo $anuncio['estado'] == '0' ? 'selected="selected"' : '' ?>>Ruim</option>
                <option value="1" <?php echo $anuncio['estado'] == '1' ? 'selected="selected"' : '' ?>>Bom</option>
                <option value="2" <?php echo $anuncio['estado'] == '2' ? 'selected="selected"' : '' ?>>Ótimo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="select-estado">Adicione fotos do anúncio:</label>
            <input type="file" name="fotos[]" multiple><br>

            <div class="panel panel-primary">
                <div class="panel-heading">Fotos do Anúncio</div>
                <div class="panel-body">
                <?php foreach($anuncio['fotos'] as $foto): ?>
                <div class="foto_item">
                    <img src="<?php echo BASE_URL; ?>assets/img/anuncios/<?php echo $foto['url']; ?>" class="img-thumbnail" border="0">
                    <a href="<?php echo BASE_URL; ?>anuncios/excluirFoto/<?php echo $foto['id']; ?>" class="btn btn-danger">Excluir Imagem</a>
                </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
        <input type="submit" value="Salvar" class="btn btn-primary btn-block">
    </form>
</div>