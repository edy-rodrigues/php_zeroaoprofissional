<?php
$array = array(
    'nome' => 'Edinei',
    'idade' => 19
);

// if(isset($array['idade'])) {
//     $idade = $array['idade'];
// } else {
//     $idade = '';
// }

// $idade = (isset($array['idade'])) ? $array['idade'] : '';

$idade = $array['idade'] ?? "";

echo $idade;

?>