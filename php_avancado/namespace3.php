<?php

require_once "namespace1.php";
require_once "namespace2.php";

$sobre = new \aplicacao\v1\Sobre();

echo "Versão: ".$sobre->getVersao();

?>