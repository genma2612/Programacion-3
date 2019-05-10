<?php
include_once("../Empleado.php");

$op = isset($_POST["op"]) ? $_POST["op"] : null;


switch ($op) {

    case "subirFoto":
        $objRetorno = new stdClass();
        $objRetorno->Ok = false;
        
        $objRetorno->Nombre = $_POST["nombre"];
        $objRetorno->Apellido = $_POST["apellido"];
        $objRetorno->Legajo = $_POST["legajo"];

        $destino = trim("./fotos/" . date("Ymd_His") . ".jpg");
        if(move_uploaded_file($_FILES["foto"]["tmp_name"], $destino) ){
            $objRetorno->Ok = true;
            $objRetorno->Path = $destino;
            $emp = new Empleado($_POST["legajo"], $_POST["apellido"], $_POST["nombre"], $destino);
            //Agrego ./backend a la ruta para que no rompa por la posiciòn del archivo nexo.php
            Empleado::Agregar($emp);
        }

        echo json_encode($objRetorno);

        break;
    case "MostrarListado":
        $array = Empleado::TraerTodos();
        $retorno = '<table><tr><td align="center">NOMBRE</td><td align="center">LEGAJO</td><td align="center">FOTO</td><td>ACCIONES</td></tr>';
        foreach (array_reverse($array) as $obj) {
            $std = new stdClass();
            $std->nombre = $obj->nombre;
            $std->apellido = $obj->apellido;
            $std->legajo = $obj->legajo;
            $std->path_foto = trim($obj->path_foto);
            $retorno .= '<tr><td>' . $obj->nombre . '</td>';
            $retorno .= '<td>' . $obj->legajo . '</td>';
            $retorno .= '<td><img src="' . $obj->path_foto . '" width="160px" height="120px" /></td>';
            $retorno .= "<td><input type='button' value='X' onclick='Eliminar(". json_encode($std) . ")'/></td>";
            $retorno .= "<td><input type='button' value='M' onclick='Modificar(". json_encode($std) . ")'/></td>";
        }
        $retorno .= '</tr></table>';
        echo $retorno;   
        break;
    case "modificarEmpleado":
        //Mètodo que modifique al empleado de la base de datos
        $objRetorno = new stdClass();
        $objRetorno->Ok = false;
        
        $objRetorno->Nombre = $_POST["nombre"];
        $objRetorno->Apellido = $_POST["apellido"];
        $objRetorno->Legajo = $_POST["legajo"];

        $destino = trim("./fotos/" . date("Ymd_His") . ".jpg");
        if(move_uploaded_file($_FILES["foto"]["tmp_name"], $destino) ){
            $objRetorno->Ok = true;
            $objRetorno->Path = $destino;
            $emp = new Empleado($_POST["legajo"], $_POST["apellido"], $_POST["nombre"], $destino);
            //Empleado::Agregar($emp);
        }

        echo json_encode($objRetorno);
        
        break;
    default:
        echo ":(";
        break;
}