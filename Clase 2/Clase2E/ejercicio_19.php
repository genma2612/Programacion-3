<?php
require_once "ejercicio_19_Clases/FiguraGeometrica.php";
require_once "ejercicio_19_Clases/Rectangulo.php";
require_once "ejercicio_19_Clases/Triangulo.php";

$rectangulo = new Rectangulo(7,3);
echo $rectangulo->ToString();