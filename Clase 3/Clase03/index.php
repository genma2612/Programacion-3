<?php

$cadena = "Manuel Gonzalez";

$f = fopen("archivo.txt", "w");

if(fwrite($f, $cadena));
    echo "Archivo creado correctamente";

fclose($f);

?>