<?php
try
{
    $objPDO = new PDO('mysql:host=localhost;dbname=cdcol', "root",""); //Establezco la conexion dns, user, pass (dns is conection string)
    $objQuery = $objPDO->query('SELECT * FROM cds'); //Ejecuto la consulta
    $datos = $objQuery->fetchall(PDO::FETCH_ASSOC); //Creo el objeto con el array asociativo (segùn constante) de lo que retorna la consulta
    
    var_dump($datos);
    //echo 'Conexion establecida';
}
catch (PDOException $e)
{
    echo $e->getMessage(); //Mensaje de error
}