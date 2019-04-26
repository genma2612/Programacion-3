<?php
$a = fopen("auto.json","r");
$objeto = fgets($a);
fclose($a);
//echo json_encode($objeto); "string de string", error.
echo $objeto; 