<?php
$accion = $_GET["accion"];
switch ($accion) {
    case '1':
        echo $_GET["cadena"];
        break;
    case '2':
        $f = fopen("nombres.txt", "a");
        $count = fwrite($f, $_GET["cadena"] . "\r\n");
        //var_dump($_GET["cadena"]);
        fclose($f);
        if($count > 0)
        {
            echo "1";
        }
        else
            echo "0";
        break;

    case '3':
        $retornoPre = '<table border="1" style="width:0%;height:0%">';
        $f = fopen("nombres.txt", "r");
        while(!feof($f))
        {
            $tempString = fgets($f);
            if($tempString == "")
                continue;
            $retornoPre .= '<tr><td>Nombre: </td><td>' . $tempString . '</td></tr>';
        }
        $retornoPre .= '</table>';
        fclose($f);
        echo $retornoPre;
        break;
    case '4': //verifica si el nombre ya existe antes de guardarlo
        $codigo = "0";
        $f = fopen("nombres.txt", "r");
        while(!feof($f))
        {
            $tempString = fgets($f);
            if($tempString == "")
                continue;
            else if(strcmp($tempString, $_GET["cadena"]) == 0)
            {
                $codigo = "1";
                break;
            }
        }
        echo $codigo;
        break;
}
?>