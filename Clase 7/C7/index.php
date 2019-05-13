<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './vendor/autoload.php';

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


$app->get('[/]', function (Request $request, Response $response) {    
    $response->getBody()->write("GET => Bienvenido!!! a SlimFramework");
    return $response;

});

/*
COMPLETAR POST, PUT Y DELETE
*/

$app->post('[/]', function (Request $request, Response $response) {    
    $response->getBody()->write("POST => Bienvenido!!! a SlimFramework");
    return $response;

});

$app->put('[/]', function (Request $request, Response $response) {    
    $response->getBody()->write("PUT => Bienvenido!!! a SlimFramework");
    return $response;

});

$app->delete('[/]', function (Request $request, Response $response) {    
    $response->getBody()->write("DELETE => Bienvenido!!! a SlimFramework");
    return $response;

});

//Ruteo distinto por GET

$app->get('/saludar/', function (Request $request, Response $response) {    
    $response->getBody()->write("GET => Hola Mundo sin params");
    return $response;

});

$app->get('/mostrar/{nombre}', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hola " . strtoupper($args['nombre']));
    return $response;

});

$app->post('/recuperar/', function (Request $request, Response $response) {
    $datosRecuperados = $request->getParsedBody();
    $obj = new stdClass();
    $obj->nombre = $datosRecuperados['nombre'];
    $obj->apellido = $datosRecuperados['apellido'];
    $obj->id = rand();
    //$response->getBody()->write($response->withJson($obj,200));
    $obj_resp = $response->withJson($obj,200);
    return $obj_resp;

});

$app->post('/recuperarJSON/', function (Request $request, Response $response) {
    $datosRecuperados = $request->getParsedBody();
    $obj = json_decode($datosRecuperados['objeto']);
    //var_dump($obj);
    $response->getBody()->write($obj);
    return $response;

});

$app->run();