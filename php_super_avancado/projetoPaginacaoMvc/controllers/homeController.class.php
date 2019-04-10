<?php
class HomeController extends Controller {

    public function index() {
        $data = array();

        $perPage = 10;
        $data['paginaAtual'] = 1;
        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $data['paginaAtual'] = intval($_GET['p']);
        }

        $offset = ($perPage * $data['paginaAtual']) - $perPage;

        $Post = new Post();
        $total = $Post->count();
        $data['totalPages'] = ceil($total / $perPage);
        $data['list'] = $Post->getList($offset, $perPage);

        $this->loadTemplate('home', $data);
    }

}
?>