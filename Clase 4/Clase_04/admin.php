<?php
require_once "Empleado.php";

/*
echo "POST:<br>";
var_dump($_POST);
echo "<br><br>FILE:<br>";
var_dump($_FILES);
*/

$destino = "fotos_empleados/" . $_REQUEST["legajo"]."_".$_REQUEST["apellido"].".".pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
$E1 = new Empleado($_REQUEST["nombre"], $_REQUEST["apellido"], $_REQUEST["legajo"], $_REQUEST["sueldo"], $destino);
Empleado::Agregar($E1);
move_uploaded_file(_$destino)
echo $E1->ToString()."<br>";
var_dump(Empleado::TraerTodos());