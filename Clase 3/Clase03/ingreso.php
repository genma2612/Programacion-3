<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>??</title>
    </head>
    <body>
        <form action="index4.php?alumno=UTN" method="POST"> 
            <input title="Nombre" type="text" name="nombre" placeholder="Ingrese su nombre" required >
            <hr/>
            <input title="Apellido" type="text" name="apellido" placeholder="Ingrese su apellido" required >
            <hr/>
            <input type="submit" value="Enviar" />
            <input type="reset" value="Limpiar" />
        </form>
    </body>
</html>
<?php
// ? luego de index4.php para agregar variables por GET var_name=valor