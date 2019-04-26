<?php
//echo $_GET["miProducto"]; // = a var_dump($_get) (Funcion que envia como echo todo)
var_dump($_GET);

$objJson = json_decode($_GET["miProducto"]);
echo "Nombre: " . $objJson->nombre . " Codigo: " . $objJson->codigoBarra . " Precio: " . $objJson->precio;
var_dump($objJson);