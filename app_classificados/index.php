<?php require_once "pages/header.php"; ?>
<?php
require_once "classes/Anuncio.class.php";
require_once "classes/Usuario.class.php";
require_once "classes/Categoria.class.php";

$Anuncio = new Anuncio();
$Usuario = new Usuario();
$Categoria = new Categoria();

$filtros = array(
    "categoria" => "",
    "preco" => "",
    "estado" => ""
);
if(isset($_GET['filtros'])) {
    $filtros = $_GET['filtros'];
}

$total_anuncios = $Anuncio->getTotalAnuncio();
$total_usuarios = $Usuario->getTotalUsuario();
$total_anuncios_filtrado = $Anuncio->getTotalAnuncioFiltrado($filtros);

$page = 1;
$perPage = 2;
if(isset($_GET['p']) && !empty($_GET['p'])) {
    $page = addslashes($_GET['p']);
}
$total_page = ceil($total_anuncios_filtrado / $perPage);

$anuncios = $Anuncio->getUltimosAnuncios($page, $perPage, $filtros);
$categorias = $Categoria->readAll();
?>
<div class="container-fluid">
    <div class="jumbotron">
        <h2>Nós temos hoje <?php echo $total_anuncios; ?> anúncios.</h2>
        <p>E mais de <?php echo $total_usuarios; ?> usuários cadastrados.</p>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <h4>Pesquisa Avançada</h4>
            <form method="get">
                <div class="form-group">
                    <label for="select-categoria">Categoria:</label>
                    <select id="select-categoria" name="filtros[categoria]" class="form-control">
                        <option value=""></option>
                        <?php foreach($categorias as $cat): ?>
                        <option value="<?php echo $cat['id']; ?>" <?php echo $cat['id'] == $filtros['categoria'] ? 'selected="selected"' : ''; ?>><?php echo utf8_encode($cat['nome']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="select-preco">Preco:</label>
                    <select id="select-preco" name="filtros[preco]" class="form-control">
                        <option value=""></option>
                        <option value="0-100" <?php echo $filtros['preco'] == '0-100' ? 'selected="selected"' : ''; ?>>R$ 0 - 100</option>
                        <option value="101-500" <?php echo $filtros['preco'] == '101-500' ? 'selected="selected"' : ''; ?>>R$ 101 - 500</option>
                        <option value="501-1000" <?php echo $filtros['preco'] == '501-1000' ? 'selected="selected"' : ''; ?>>R$ 501 - 1000</option>
                        <option value="1001-2000" <?php echo $filtros['preco'] == '1001-2000' ? 'selected="selected"' : ''; ?>>R$ 1001 - 2000</option>
                        <option value="2001" <?php echo $filtros['preco'] == '2001' ? 'selected="selected"' : ''; ?>>R$ 2001 +</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="select-estado">Estado de Conservação:</label>
                    <select id="select-estado" name="filtros[estado]" class="form-control">
                        <option value=""></option>
                        <option value="2" <?php echo $filtros['estado'] == '2' ? 'selected="selected"' : ''; ?>>Ótimo</option>
                        <option value="1" <?php echo $filtros['estado'] == '1' ? 'selected="selected"' : ''; ?>>Bom</option>
                        <option value="0" <?php echo $filtros['estado'] == '0' ? 'selected="selected"' : ''; ?>>Ruim</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" value="Buscar">
                </div>
            </form>
        </div>
        <div class="col-sm-9">
            <h4>Últimos Anúncios</h4>
            <table class="table table-striped">
                <tbody>
                    <?php if(count($anuncios) > 0): ?>
                    <?php foreach($anuncios as $anuncio): ?>
                    <tr>
                        <td>
                            <?php if(!empty($anuncio['url'])): ?>
                            <img src="assets/img/anuncios/<?php echo $anuncio['url']; ?>" border="0" height="75">
                            <?php else: ?>
                            <img src="assets/img/default.png" height="75" border="0">
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="produto.php?id=<?php echo $anuncio['id']; ?>"><?php echo utf8_encode($anuncio['titulo']); ?></a><br>
                            <?php echo utf8_encode($anuncio['categoria']); ?>
                        </td>
                        <td>
                            <?php echo "R$ ".number_format($anuncio["valor"], 2); ?>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    <?php else: ?>
                    <div class="alert alert-info">
                        <h4><strong>Desulpa, nenhum produto foi encontrado.</strong></h4>
                        <p>Não foi encontrado nenhum produto com está busca!</p>
                    </div>
                    <?php endif; ?>
                </tbody>
            </table>
            <ul class="pagination">
                <?php for($i=1; $i <= $total_page; $i++): ?>
                <li class="<?php echo $page == $i ? 'active' : ''; ?>"><a href="index.php?<?php $w = $_GET; $w['p'] = $i; echo http_build_query($w); ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>
<?php require_once "pages/footer.php"; ?>