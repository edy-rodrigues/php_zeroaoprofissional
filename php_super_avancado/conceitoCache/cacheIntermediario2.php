<?php
class Cache {

    private $cache;

    public function setPage() {
        $html = $this->readCachePage();
        if($html) {
            file_put_contents("cachePage.cache", $html);
            echo $html;
        } else {
            require_once "cachePage.cache";
        }
    }

    public function readCachePage() {
        if(file_exists("cachePage.cache")) {
            $html = false;
        } else {
            ob_start();
            require_once "cacheIntermediario.php";
            $html = ob_get_contents();
            ob_end_clean();
        }
        return $html;
    }
}

$cache = new Cache();

$cache->setPage();
?>