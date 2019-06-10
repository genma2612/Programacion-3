<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './vendor/autoload.php';
require_once 'Usuario.php';

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

//*********************************************************************************************//
//INICIALIZO EL APIREST
//*********************************************************************************************//
$app = new \Slim\App(["settings" => $config]);

$app->group('/usuarios', function () {
 
    $this->post('/alta[/]', \Usuario::class . ':AltaUsuario'); //implemento el còdigo en la clase

    $this->get('/traeruno/{legajo}', \Usuario::class . ':TraerUnUsuario');

    $this->get('/traertodos[/]', \Usuario::class . ':TraerTodosLosUsuarios'); //Debe estar aca el traerTodos

    $this->delete('/eliminar/{legajo}', \Usuario::class . ':EliminarUsuario');
    
});

$app->run();