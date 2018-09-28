<?php
class homeController extends Controller {
    public function index() {
        $dados = array();

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

        $dados['total_anuncios'] = $total_anuncios;
        $dados['total_usuarios'] = $total_usuarios;
        $dados['total_usuarios_filtrado'] = $total_anuncios_filtrado;
        $dados['categorias'] = $categorias;
        $dados['filtros'] = $filtros;
        $dados['anuncios'] = $anuncios;
        $dados['total_page'] = $total_page;
        $dados['page'] = $page;


        $this->loadTemplate('home', $dados);
    }
}
?>