<?php
if(isset($txt_titulo) && !$txt_titulo) {
    ?>
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <h4><strong>Campos em branco.</strong></h4>
        <p>Por favor preencha o <strong>título do seu produto</strong>.</p>
    </div>
    <?php
} else {
    if(isset($campos_vazio) && !$campos_vazio) {
        if($add_anuncio) {
            ?>
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4><strong>Parabéns</strong></h4>
                <p>Produto adicionado com sucesso. <a href="<?php echo BASE_URL; ?>anuncios">Lista dos meus produtos.</a></p>
            </div>
            <?php 
        } else {
            ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4><strong>Erro ao adicionar um novo produto</strong></h4>
                <p>Por favor verifique os dados preenchidos no formulário</p>
            </div>
            <?php
        }
    } else if(isset($select_categoria) && !$select_categoria) {
        ?>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4><strong>Campos em branco.</strong></h4>
            <p>Por favor preencha a <strong>categoria do seu produto</strong>.</p>
        </div>
        <?php
    } else if(isset($txt_valor) && !$txt_valor) {
        ?>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4><strong>Campos em branco.</strong></h4>
            <p>Por favor preencha o <strong>valor do seu produto</strong>.</p>
        </div>
        <?php
    } else if(isset($txt_produto) && !$txt_produto) {
        ?>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4><strong>Campos em branco.</strong></h4>
            <p>Por favor preencha a <strong>descricao do seu produto</strong>.</p>
        </div>
        <?php
    } else if(isset($txt_descricao) && !$txt_descricao) {
        ?>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4><strong>Campos em branco.</strong></h4>
            <p>Por favor preencha a <strong>descricao do seu descrição</strong>.</p>
        </div>
        <?php
    } else if(isset($select_estado) && !$select_estado) {
        ?>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4><strong>Campos em branco.</strong></h4>
            <p>Por favor preencha o <strong>estado do seu produto</strong>.</p>
        </div>
        <?php
    }
}

?>
<div class="container">
    <h1>Meus Anúncios - Adicionar Anúncio</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="txt-titulo">Titulo:</label>
            <input type="text" name="txt-titulo" id="txt-titulo" class="form-control" <?php echo isset($txt_titulo_tmp) ? "value='$txt_titulo_tmp'" : "" ?>>
        </div>
        <div class="form-group">
            <label for="select-categoria">Categoria:</label>
            <select name="select-categoria" id="select-categoria" class="form-control">
                <?php
                foreach ($categoria as $item): ?>
                <option value="<?php echo $item['id']; ?>" <?php echo isset($select_categoria) && $select_categoria == $item['id'] ? "selected=selected" : "" ?>><?php echo utf8_encode($item['nome']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="txt-valor">Valor:</label>
            <input type="text" name="txt-valor" id="txt-valor" class="form-control" <?php echo isset($txt_valor_tmp) ? "value='$txt_valor_tmp'" : "" ?>>
        </div>
        <div class="form-group">
            <label for="txt-descricao">Descricao:</label>
            <textarea type="text" name="txt-descricao" id="txt-descricao" class="form-control"><?php echo isset($txt_descricao_tmp) ? $txt_descricao_tmp : "" ?></textarea>
        </div>
        <div class="form-group">
            <label for="select-estado">Estado de Conservação:</label>
            <select name="select-estado" id="select-estado" class="form-control">
                <option value="0" <?php echo isset($select_estado_tmp) && $select_estado_tmp == "0" ? "selected=selected" : "" ?>>Ruim</option>
                <option value="1" <?php echo isset($select_estado_tmp) && $select_estado_tmp == "1" ? "selected=selected" : "" ?>>Bom</option>
                <option value="2" <?php echo isset($select_estado_tmp) && $select_estado_tmp == "2" ? "selected=selected" : "" ?>>Ótimo</option>
            </select>
        </div>
        <input type="submit" value="Adicionar Anúncio" class="btn btn-primary btn-block">
    </form>
</div>