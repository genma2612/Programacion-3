<?php
    require_once "AccesoDatos.php";
    $retorno = '<table border="1"><tr><td align="center">Tamaño</td><td align="center">Edad</td><td align="center">Precio</td><td align="center">Nombre</td><td align="center">Raza</td><td align="center">Foto</td><td>ACCIONES</td></tr>';
    
    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();    
    $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM perros");
    $consulta->execute();

    while($fila = $consulta->fetch())
    {
        $retorno .= '<tr><td>' . $fila[1] . '</td>';
        $retorno .= '<td>' . $fila[2] . '</td>';
        $retorno .= '<td>' . $fila[3] . '</td>';
        $retorno .= '<td>' . $fila[4] . '</td>';
        $retorno .= '<td>' . $fila[5] . '</td>';
        $retorno .= '<td><img src="' . $fila[6] . '" width="160px" height="120px" /></td>';
    }
    //$retorno .= "<td><input type='button' value='X' onclick='Eliminar(". json_encode($std) . ")'/></td>";
    //$retorno .= "<td><input type='button' value='M' onclick='Modificar(". json_encode($std) . ")'/></td>";
    $retorno .= '</tr></table>';
    echo $retorno;   