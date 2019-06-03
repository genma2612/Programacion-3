<?php
        $retorno = '<table border="1"><tr><td align="center">Tamaño</td><td align="center">Edad</td><td align="center">Precio</td><td align="center">Nombre</td><td align="center">Raza</td><td align="center">Foto</td><td>ACCIONES</td></tr>';
        $f = fopen("./perro.json", "r");
        while(!feof($f))
        {
            $tempString = fgets($f);
            if($tempString == "")
                continue;
            $tempObj = json_decode($tempString);
            $retorno .= '<tr><td>' . $tempObj->tamano . '</td>';
            $retorno .= '<td>' . $tempObj->edad . '</td>';
            $retorno .= '<td>' . $tempObj->precio . '</td>';
            $retorno .= '<td>' . $tempObj->nombre . '</td>';
            $retorno .= '<td>' . $tempObj->raza . '</td>';
            $retorno .= '<td><img src="' . $tempObj->pathFoto . '" width="160px" height="120px" /></td>';
        }
        fclose($f);
        //$retorno .= "<td><input type='button' value='X' onclick='Eliminar(". json_encode($std) . ")'/></td>";
        //$retorno .= "<td><input type='button' value='M' onclick='Modificar(". json_encode($std) . ")'/></td>";
        $retorno .= '</tr></table>';
        echo $retorno;   