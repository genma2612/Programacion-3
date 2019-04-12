<?php
require_once "Empleado.php";

/*
echo "POST:<br>";
var_dump($_POST);
echo "<br><br>FILE:<br>";
var_dump($_FILES);
*/

$destino = "fotos_empleados/" . $_REQUEST["legajo"]."_".$_REQUEST["apellido"].".".pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
$E1 = new Empleado($_REQUEST["legajo"], $_REQUEST["apellido"], $_REQUEST["nombre"], $_REQUEST["sueldo"], $destino);
Empleado::Agregar($E1);
if(move_uploaded_file($_FILES["foto"]["tmp_name"],$destino))
{
    echo "Se guardó correctamente.";
}
echo $E1->ToString()."<br>";
var_dump(Empleado::TraerTodos());
$empleados = Empleado::TraerTodos();
echo "<br><br>";
foreach($empleados as $emp)
{
echo 	'<table border="1" style="width:0%;height:0%">
		<tr> 
			<td >Nombre:</td>
            <td>' . $emp->nombre . '</td>
			<td rowspan="4"><img width=100 height=100 src=' .  $emp->path_foto . '/></td>
        </tr>
        <tr>
            <td>Apellido:</td>
			<td>' . $emp->apellido . '</td>
        </tr>
        <tr>
            <td>Legajo:</td>
            <td>' . $emp->legajo . '</td>
        </tr>
        <tr>
            <td>Sueldo:</td>
            <td>' . $emp->sueldo . '</td>
        </tr>
 	</table><br>';
}
echo '<a href="http://localhost/Clase_04/index_02.html">Volver</a>';