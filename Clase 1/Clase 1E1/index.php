Ejercicio 1:
<br>
<?php
    $nombre = "Manuel";
    $apellido = "Gonzàlez";
    echo $apellido . ", " . $nombre;
?>
<br>

Ejercicio 2:
<br>
<?php
    $x = -3;
    $y = 15;
    echo $x + $y;
?>
<br>

Ejercicio 3:
<br>
<?php
    $x = -3;
    $y = 15;
    echo $x . "<br>" . $y . "<br>", $x + $y;
?>
<br>

Ejercicio 4:
<br>
<?php
    $num = 1;
    $suma = 1;
    do
    {
        $suma = $suma + $num;
        //echo "<br>" . $num;
        echo " " . $num;
        $num++;
    } while ($suma < 1000)
?>
<br>

Ejercicio 7:
<br>
<?php
    $month = (int)date("n");
    //$month = 12;
    echo date("l dS \of F");
    echo "<br>";
    switch($month)
    {
        case 1:
        case 2:
        case 3:
            echo "Estamos en Verano";
            break;
        case 4:
        case 5:
        case 6:
            echo "Estamos en Otoño";
            break;
        case 7;
        case 8;
        case 9;
            echo "Estamos en Invierno";
            break;
        case 10;
        case 11;
        case 12;
            echo "Estamos en Primavera";
            break;     
    }
?>