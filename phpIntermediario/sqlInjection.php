<?php

$autor = addcslashes($_POST["autor"]); // Adiociona / antes de '

$sql = "SELECT * FROM posts WHERE autor = '$autor'";

?>