Ejercicio 16:
<br>
<?php
    $cadena = "hola";
    $arrayCadena = InvertirCadena($cadena);
    $contador = count($arrayCadena);
    for($i=$contador; $i>=0; $i--)
    {
        echo $arrayCadena[$i];
    }


    function InvertirCadena($cadena)
    {
        $arrayCadena = array();
        $arrayCadena = str_split($cadena);
        return $arrayCadena;
    }
?>
<br>