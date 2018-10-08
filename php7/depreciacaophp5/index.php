<?php
// Algumas funcionalidades que serão depreciadas
class Carro {

    // function __construct
    function Carro() {
        echo "Classe construída!";
    }

    // static function
    function rodar() {
        echo "Vrumm!";
    }

}

$Carro = new Carro();
Carro::rodar();

// mysql foi depreciado não o mysqli
try {
    mysql_connect("locahost", "root", "");
} catch(Throwable $e) {
    "Erro:". $e->getMessage(); 
}
?>