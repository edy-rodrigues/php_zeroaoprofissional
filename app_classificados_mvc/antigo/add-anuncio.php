<?php require_once "pages/header.php"; ?>
<?php
if(empty($_SESSION['cLogin'])) {
    ?>
    <script>window.location.href = "login.php";</script>
    <?php
    exit;
}

require_once "classes/Anuncio.class.php";
$anuncio = new Anuncio();
if(isset($_POST['txt-titulo']) && empty($_POST['txt-titulo'])) {
    ?>
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <h4><strong>Que pena! Não foi possível cadastrar seu produto.</strong></h4>
        <p>Por favor preencha o título do seu produto.</p>
    </div>
    <?php
} else {
    if(isset($_POST['txt-titulo']) && !empty($_POST['txt-titulo'])) {

        $titulo = addslashes($_POST['txt-titulo']);
        $valor = addslashes($_POST['txt-valor']);
        $descricao = addslashes($_POST['txt-descricao']);
        $estado = addslashes($_POST['select-estado']);
        $categoria = addslashes($_POST['select-categoria']);

        if(!empty($categoria) && !empty($valor) && !empty($descricao) && !empty($estado)) {
            if($anuncio->create(utf8_decode($titulo), utf8_decode($categoria), $valor, utf8_decode($descricao), utf8_decode($estado))) {
                ?>
            <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <h4><strong>Parabéns</strong></h4>
                    <p>Produto adicionado com sucesso. <a href="meus-anuncios.php">Lista dos meus produtos.</a></p>
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
        } else if(empty($categoria)) {
            ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4><strong>Campos em branco.</strong></h4>
                <p>Por favor preencha a categoria do seu produto.</p>
            </div>
            <?php
        } else if(empty($valor)) {
            ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4><strong>Campos em branco.</strong></h4>
                <p>Por favor preencha o valor do seu produto.</p>
            </div>
            <?php
        } else if(empty($descricao)) {
            ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4><strong>Campos em branco.</strong></h4>
                <p>Por favor preencha a descricao do seu produto.</p>
            </div>
            <?php
        } else if(empty($estado)) {
            ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4><strong>Campos em branco.</strong></h4>
                <p>Por favor preencha o estado do seu produto.</p>
            </div>
            <?php
        }
    }
}

?>
<div class="container">
    <h1>Meus Anúncios - Adicionar Anúncio</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="txt-titulo">Titulo:</label>
            <input type="text" name="txt-titulo" id="txt-titulo" class="form-control" <?php echo isset($_POST['txt-titulo']) && !empty($_POST['txt-titulo']) ? "value='$titulo'" : "" ?>>
        </div>
        <div class="form-group">
            <label for="select-categoria">Categoria:</label>
            <select name="select-categoria" id="select-categoria" class="form-control">
                <?php
                require_once "classes/Categoria.class.php";
                $categoria = new Categoria();
                $categoria = $categoria->readAll();
                foreach ($categoria as $item): ?>
                <option value="<?php echo $item['id']; ?>" <?php echo isset($_POST['select-categoria']) && !empty($_POST['select-categoria'] && $_POST['select-categoria'] == $item['id']) ? "selected=selected" : "" ?>><?php echo utf8_encode($item['nome']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="txt-valor">Valor:</label>
            <input type="text" name="txt-valor" id="txt-valor" class="form-control" <?php echo isset($_POST['txt-valor']) && !empty($_POST['txt-valor']) ? "value='$valor'" : "" ?>>
        </div>
        <div class="form-group">
            <label for="txt-descricao">Descricao:</label>
            <textarea type="text" name="txt-descricao" id="txt-descricao" class="form-control"><?php echo isset($_POST['txt-descricao']) && !empty($_POST['txt-descricao']) ? $descricao : "" ?></textarea>
        </div>
        <div class="form-group">
            <label for="select-estado">Estado de Conservação:</label>
            <select name="select-estado" id="select-estado" class="form-control">
                <option value="0" <?php echo isset($_POST['select-estado']) && !empty($_POST['select-estado'] && $_POST['select-estado'] == "0") ? "selected=selected" : "" ?>>Ruim</option>
                <option value="1" <?php echo isset($_POST['select-estado']) && !empty($_POST['select-estado'] && $_POST['select-estado'] == "1") ? "selected=selected" : "" ?>>Bom</option>
                <option value="2" <?php echo isset($_POST['select-estado']) && !empty($_POST['select-estado'] && $_POST['select-estado'] == "2") ? "selected=selected" : "" ?>>Ótimo</option>
            </select>
        </div>
        <input type="submit" value="Adicionar Anúncio" class="btn btn-primary btn-block">
    </form>
</div>
<?php require_once "pages/footer.php"; ?>