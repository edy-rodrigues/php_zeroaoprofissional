<?php
// PSR-0
spl_autoload_register(function($class) {
    $file = 'classes/'.$class.".class.php";
    if (file_exists($file)) {
        require_once ($file);
    }
});

$edinei = new Admin();
echo "Nome: ". $edinei->getNome();