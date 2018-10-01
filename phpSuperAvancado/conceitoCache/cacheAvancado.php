<?php
$p = 'pagina';
if(isset($_GET['p']) && !empty($_GET['p']) && file_exists("paginas/".$_GET['p'].".php")) {
    $p = $_GET['p'];
}
class Cache {

    private $cache;

    public function setPage($p) {
        $html = $this->readCachePage($p);
        if($html) {
            file_put_contents("caches/".$p.".cache", $html);
            echo $html;
        } else {
            require_once "caches/".$p.".cache";
        }
    }

    private function readCachePage($p) {
        if(file_exists("caches/".$p.".cache") && $this->is_valido("caches/".$p.".cache")) {
            $html = false;
        } else {
            ob_start();
            require_once "paginas/".$p.".php";
            $html = ob_get_contents();
            ob_end_clean();
        }
        return $html;
    }

    private function is_valido($cache) {
        $ultima_modifcacao = filemtime($cache);
        $c = time() - $ultima_modifcacao;
        
        if($c > 10) {
            return false;
        } else {
            return true;
        }
    }
}
$cache = new Cache();

$cache->setPage($p);
?>