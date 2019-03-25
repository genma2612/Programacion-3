Ejercicio 15:
<br>
<?php
    $cant = 4;
    for($i=1; $i<=$cant; $i++)
    {
        echo Potencias($i) . " ";
    }




    function Potencias($numero)
    {
        return pow($numero, $numero);
    }
?>
<br>