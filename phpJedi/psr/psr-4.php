<?php
// PSR-4
// spl_autoload_register(function($class) {
//     $base_dir = __DIR__."\\".$class.".class.php";

//     $file = str_replace("\\", "/", $base_dir);

//     if(file_exists($file)) {
//         require ($file);
//     }
// });

// PSR-4 COM COMPOSER
require_once __DIR__."/vendor/autoload.php";

$Usuario = new classes\usuario\UsuarioDAO();
echo "Nome: ".$Usuario->getNome();