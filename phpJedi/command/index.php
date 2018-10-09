<?php
require_once "classes.php";

$Luz = new Luz();
$C = new LuzOnCommand($Luz);
callCommand($C);

echo "LUZ: ". $Luz->getStatus();

?>