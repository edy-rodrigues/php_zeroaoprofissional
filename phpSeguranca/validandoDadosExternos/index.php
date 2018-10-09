<?php
/**  
 * filter_var 
 * filter_input [GET, POST]
 * 
 * filter_validate_int
 * filter_validate_boolean
 * filter_validate_float
 * filter_validate_url
 * filter_validate_email
 * filter_validate_regex
 * filter_validate_ip
 * 
 * filter_sanitize_string
 * filter_sanitize_encoded
 * filter_sanitize_special_chars
*/
// $numero = 1;
// if(filter_var($numero, FILTER_VALIDATE_INT)) {
//     echo "Verdadeiro";
// } else {
//     echo "Falso";
// }

// $html = "Este é <strong>meu nome</strong>";
// $html = strip_tags($html);
// $texto = filter_var($html, FILTER_SANITIZE_SPECIAL_CHARS);

// echo $texto;

// ----------------------------------------------------
// $email = filter_input(INPUT_GET, "email", FILTER_VALIDATE_EMAIL);
// echo $email;

$prioridade = filter_input(INPUT_POST, 'prioridade', FILTER_VALIDATE_INT, array(
    "options" => array(
        "min_range" => 1,
        "max_range" => 4,
        "default" => 1
    )
));
echo $prioridade;

?>
<form action="" method="post">
    <select name="prioridade" id="">
        <option value="1">Prioridade 1</option>
        <option value="2">Prioridade 2</option>
        <option value="3">Prioridade 3</option>
    </select>
    <input type="submit" value="Enviar">
</form>