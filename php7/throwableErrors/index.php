<?php

try {
    ahsdjsh();
} catch(Throwable $e) {
    echo "Erro no arquivo: ". $e->getFile()."<br>";
    echo "Erro na linha: ". $e->getLine()."<br>";
    echo "Erro: ". $e->getMessage()."<br>";
    $msg = "Erro no arquivo: ". $e->getFile() ."\nNa linha: ". $e->getLine() ."\nTipo do erro: ". $e->getMessage();
    file_put_contents("error". date("d-m-Y__H-i-s") .".txt", $msg);
    exit;
}

?>