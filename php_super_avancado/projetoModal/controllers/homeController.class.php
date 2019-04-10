<?php
class HomeController extends Controller {

    public function index() {
        $data = array();

        $Usuario = new Usuario();
        $data['list'] = $Usuario->getList();
        
        $this->loadTemplate('home', $data);
    }

}
?>