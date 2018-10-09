<?php
$pass = '$2y$10$HvkFs1vo/aM7VXeSrTDgC.aTfRZxh76LLDpw5.A4B1lsR.VhJ.iwC';
$hash = password_hash("123456", PASSWORD_BCRYPT);
echo $hash.'<hr>';
$senha = "123456";

if(password_verify($senha, $hash)) {
    echo "ACERTOU";
} else {
    echo "ERROU";
}
?>