<?php

$cadena = "Manuel Gonzalez";

$f = fopen("archivo.txt", "a+"); //agrego + para poder leerlo desde el navegador

fwrite($f, $cadena . " actualizado a las: " . date("H:i:s") . "\n");

rewind($f);

while(!feof($f))
{
    echo fgets($f) . "<br>";
} 

fclose($f);

?>