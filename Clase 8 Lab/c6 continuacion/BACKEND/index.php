<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './vendor/autoload.php';
require_once '/AccesoDatos.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

/*
¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
*/

$app = new \Slim\App(["settings" => $config]); 

$app->get('[/]', function (Request $request, Response $response, $args) {  //mètodo que devuelva un json Exito y objEmp (json) si es false, empleado null
    $retorno = new stdClass();
    $retorno->exito = false;
    $retorno->objEmp = null;
    $legajo=$args['legajo'];
    $clave=$args['clave'];
    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
    $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * from empleados where legajo = $legajo AND clave = $clave");
    $consulta->execute();
    $empleadoBuscado= $consulta->fetch(PDO::FETCH_OBJ);
    if($empleadoBuscado != null)
    {
        $retorno->exito = true;
        $retorno->objEmp = json_encode($empleadoBuscado);
    }
    return $retorno;

});

$app->run();