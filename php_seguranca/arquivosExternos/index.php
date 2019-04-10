<?php
require_once "paginas/header.php";

$p = "home";
if(!empty($_GET['p'])) {
    $pagina = $_GET['p'];
    if(strpos($pagina, '.') === false) {
        if(file_exists('paginas/'.$pagina.'.php')) {
            $p = $pagina;
        }
    }
}
require_once "paginas/".$p.".php";

require_once "paginas/footer.php";
?>