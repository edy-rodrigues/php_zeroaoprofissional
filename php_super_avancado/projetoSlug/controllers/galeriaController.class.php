<?php
class galeriaController extends Controller {

    public function index() {
        $data = array();

        $Anuncio = new Anuncio();
        $data['list'] = $Anuncio->getList();

        $this->loadTemplate("galeria", $data);
    }

    public function abrir($slug) {
        $data = array();

        $Anuncio = new Anuncio();
        $data['album'] = $Anuncio->getOneSlug($slug);

        $this->loadTemplate("album", $data);
    }

    public function SlugURL($str){
        $str = strtolower(utf8_decode($str)); $i=1;
        $str = strtr($str, utf8_decode('àáâãäåæçèéêëìíîïñòóôõöøùúûýýÿ'), 'aaaaaaaceeeeiiiinoooooouuuyyy');
        $str = preg_replace("/([^a-z0-9])/",'-',utf8_encode($str));
        while($i>0) $str = str_replace('--','-',$str,$i);
        if (substr($str, -1) == '-') $str = substr($str, 0, -1);
        return $str;
    }

}
?>