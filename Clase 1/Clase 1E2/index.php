Ejercicio 9:
<br>
<?php
    $numeros = array();
    $suma = 0;
    $promedio = 0;
    $cant = 5;
    for($i=0; $i<$cant; $i++)
    {
        $numeros[$i] = rand(1,10);
        echo "Elemento ", $i+1, " es ", $numeros[$i], "<br>";
        $suma += $numeros[$i];
    }
    $promedio = $suma / $cant;
    echo "La suma es: ", $suma, ".<br>", "El promedio es: ", $promedio, ".<br>";
    if($promedio == 6)
        echo "El promedio es igual a 6";
    else if($promedio < 6)
        echo "El promedio es menor a 6";
    else if($promedio > 6)
        echo "El promedio es mayor a 6";
?>
<br>

Ejercicio 10:
<br>
<?php

?>
<br>