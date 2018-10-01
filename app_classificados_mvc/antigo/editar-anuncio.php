<?php require_once "pages/header.php"; ?>
<?php
if(empty($_SESSION['cLogin'])) {
    ?>
    <script>window.location.href = "login.php";</script>
    <?php
    exit;
}

require_once "classes/Anuncio.class.php";
$Anuncio = new Anuncio();

if(isset($_POST['txt-titulo']) && empty($_POST['txt-titulo'])) {
    ?>
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <h4><strong>Que pena! Não foi possível editar seu produto.</strong></h4>
        <p>Você deve preencher o <strong>título do seu produto</strong>.</p>
    </div>
    <?php
} else {
    if(isset($_POST['txt-titulo']) && !empty($_POST['txt-titulo'])) {

        $titulo = addslashes($_POST['txt-titulo']);
        $valor = addslashes($_POST['txt-valor']);
        $descricao = addslashes($_POST['txt-descricao']);
        $estado = addslashes($_POST['select-estado']);
        $categoria = addslashes($_POST['select-categoria']);
        if(isset($_FILES['fotos'])) {
            $fotos = $_FILES['fotos'];
        } else {
            $fotos = [];
        }

        if(!empty($categoria) && !empty($valor) && !empty($descricao) && !empty($estado)) {
            $Anuncio->update($_GET['id'], utf8_decode($titulo), utf8_decode($categoria), $valor, utf8_decode($descricao), utf8_decode($estado), $fotos)
            ?>
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4><strong>Parabéns</strong></h4>
                <p>Produto editado com sucesso. <a href="meus-anuncios.php">Lista dos meus produtos.</a></p>
            </div>
            <?php 
        } else if(empty($categoria)) {
            ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4><strong>Campos em branco.</strong></h4>
                <p>Você deve preencher a <strong>categoria do seu produto</strong>.</p>
            </div>
            <?php
        } else if(empty($valor)) {
            ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4><strong>Campos em branco.</strong></h4>
                <p>Você deve preencher o <strong>valor do seu produto</strong>.</p>
            </div>
            <?php
        } else if(empty($descricao)) {
            ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4><strong>Campos em branco.</strong></h4>
                <p>Você deve preencher a <strong>descrição do seu produto</strong>.</p>
            </div>
            <?php
        } else if(empty($estado)) {
            ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4><strong>Campos em branco.</strong></h4>
                <p>Você deve preencher o <strong>estado do seu produto</strong>.</p>
            </div>
            <?php
        }
    }
}

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $anuncio = $Anuncio->readOne($_GET['id']);
} else {
    ?>
    <script>window.location.href = "meus-anuncios.php";</script>
    <?php
    exit;
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
                require_once "classes/Categoria.class.php";
                $categoria = new Categoria();
                $categoria = $categoria->readAll();
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
                    <img src="assets/img/anuncios/<?php echo $foto['url']; ?>" class="img-thumbnail" border="0">
                    <a href="excluir-foto.php?id=<?php echo $foto['id']; ?>" class="btn btn-danger">Excluir Imagem</a>
                </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
        <input type="submit" value="Salvar" class="btn btn-primary btn-block">
    </form>
</div>
<?php require_once "pages/footer.php"; ?>