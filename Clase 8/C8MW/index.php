<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './vendor/autoload.php';
require_once 'Test.php';
require_once 'Usuario.php';
require_once 'Verificadora.php';

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

//*********************************************************************************************//
//CONFIGURO LOS VERBOS GET, POST, PUT Y DELETE
//*********************************************************************************************//
$app->get('[/]', function (Request $request, Response $response) {    
    $response->getBody()->write("GET => Bienvenido!!! a SlimFramework");
    return $response;

});

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

//*********************************************************************************************//
//AGRUPACION DE RUTAS
//*********************************************************************************************//
///
//FUNCIONES MIDDLEWARE EN VARIABLE
$funcionMiddlewareUno = function($request, $response, $next){
    if($request->IsGet())
    {
        $response->getBody()->write("Viene por Get\r\n");
    }
    if($request->IsPost())
    {
        $response->getBody()->write("Viene por Post\r\n");
        $ArrayDedatos = $request->getParsedBody();
        //var_dump($ArrayDedatos);
        if($ArrayDedatos['tipo'] == "admin")
        {
            $response->getBody()->write("TIPO: {$ArrayDedatos['tipo']} NOMBRE: {$ArrayDedatos['nombre']} \r\n");
            $response->getBody()->write("Funcion MW uno pre-verbo\r\n");
            $response = $next($request, $response); //Le indico que ejecute la siguiente funcion (la API)
            $response->getBody()->write("\r\nFuncion MW uno post-verbo");
        }
        else
            $response->getBody()->write("No es admin, no tiene permiso para acceder.");
    }
    return $response;
};
///
$app->group('/credenciales', function () {

    $this->get('[/]', function ($request, $response, $args) {
        $response->getBody()->write("Grupo credenciales, por GET");
    });
 
     $this->post('[/]', function ($request, $response, $args) {      
        $response->getBody()->write("Grupo credenciales, por POST");
    });
     
})->add($funcionMiddlewareUno);
/// POO
$app->group('/clase', function () {

    $this->get('[/]', function ($request, $response, $args) {
        $response->getBody()->write("Grupo clase, por GET");
    });
 
     $this->post('[/]', function ($request, $response, $args) {      
        $response->getBody()->write("Grupo clase, por POST");
    });
     
})->add(\Test::class . ':MostrarMetodoDinamico')->add(\Test::class . '::MostrarMetodoEstatico');

$app->group('/usuario', function () {

    $this->get('[/]', function ($request, $response, $args) { //Debe estar aca el traerTodos
        $array = Usuario::TraerTodos();
        $response->getBody()->write($response->withJson($array, 200));
    });
 
     $this->post('[/]', function ($request, $response, $args) {      
        //$response->getBody()->write("Grupo usuario, por POST");
        $ArrayDedatos = $request->getParsedBody();
        $user = new Usuario($ArrayDedatos['tipo'], $ArrayDedatos['nombre']);
        $user->Agregar();
    });
     
})->add(\Verificadora::class . ':VerificarUsuario');

$app->run();