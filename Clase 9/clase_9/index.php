<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use Firebase\JWT\JWT; //Incluyo Firebase

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

$app = new \Slim\App(["settings" => $config]); 


///

$app->get('[/]', function (Request $request, Response $response) {  //mètodo que devuelva un json Exito y objEmp (json) si es false, empleado null
    $response->getBody()->write("Funciona!!");
    return $response;

});

$app->post('/crear[/]', function (Request $request, Response $response) {
    
    $user = new stdClass();
    $user->nombre = "Juan";
    $user->apellido = "Perez";
    $user->division = "3A";

    $payload = array( //Genero el payload, incluyo la informacion del $user en el atributo data
        'iat' => time(),
        //'exp' => ;,
        'data' => $user
    );

    //Codifico a JWT
    $token = JWT::encode($payload, "miClaseSuperSecreta");

    //$response->getBody()->write("POST => Bienvenido!!! a SlimFramework");

    return $response->withJson($token, 200);

});

$app->post('/verificar[/]', function (Request $request, Response $response) {
    $arrayDeDatos = $request->getParsedBody();
    $token = $arrayDeDatos['token'];

    if(empty($token) || $token === "")
    {
        throw new Exception("Token vacio");
    }
    try{
        //Decodifico agregando el token, la clave y el tipo de codificado
        $decodificado = JWT::decode($token, 'miClaseSuperSecreta', ['HS256']);

    }
    catch(Exception $e){
        throw new Exception("Token no valido!!! --> " . $e->getMessage());
    }
    var_dump($decodificado);
    return "token ok!\r\n";

});

$app->post('/obtenerpayload[/]', function (Request $request, Response $response) {
    $arrayDeDatos = $request->getParsedBody();
    $token = $arrayDeDatos['token'];

    if(empty($token) || $token === "")
    {
        throw new Exception("Token vacio");
    }
    try{
        //Decodifico agregando el token, la clave y el tipo de codificado
        $decodificado = JWT::decode($token, 'miClaseSuperSecreta', ['HS256']);

    }
    catch(Exception $e){
        throw new Exception("Token no valido!!! --> " . $e->getMessage());
    }
    $user = $decodificado->data;
    return $response->withJson($user, 200);

});

//Grupo JWT
$app->group('/JWT', function () {

    //funciones middleware
    $MW1 = function($request, $response, $next){
        $arrayDeDatos = $request->getParsedBody();
        $nombre = isset($arrayDeDatos['nombre']);// ? $arrayDeDatos['nombre'] : NULL;
        $apellido = isset($arrayDeDatos['apellido']);// ? $arrayDeDatos['apellido'] : NULL;
        $division = isset($arrayDeDatos['division']);// ? $arrayDeDatos['division'] : NULL;
        if($nombre == null || $apellido == null || $division == null)
        {
            $retorno = new StdClass();
            $retorno->mensaje = "Falta informacion en el formulario: Nombre: {$nombre} - "
            . "Apellido: {$apellido} - Division: {$division}";
            $newResponse = $response->withJson($retorno, 409);
        }
        else
        {
            $newResponse = $next($request, $response);
        }
        return $newResponse;
    };

    $MW2 = function($request, $response, $next){ //si datos != "" ->next si datos == "" ->json + 409
        $arrayDeDatos = $request->getParsedBody();
        if($arrayDeDatos["nombre"] == "" || $arrayDeDatos["apellido"] == "" || $arrayDeDatos["division"] == "")
        {
            $retorno = new StdClass();
            $retorno->mensaje = "Campos vacios en el formulario";
            $newResponse = $response->withJson($retorno, 409);
        }
        else
        {
            $newResponse = $next($request, $response);
        }
        return $newResponse;
    };

    /*$this->get('/', function ($request, $response, $args) {
        $response->getBody()->write("HOLA, Bienvenido a la apirest... ingresá tu nombre");
    });*/

    $this->post('/mostrar[/]', function ($request, $response, $args) { //Verifico si el token es vàlido
        $arrayDeDatos = $request->getParsedBody();
        $token = $arrayDeDatos['token'];
        if(empty($token) || $token === "")
        {
            throw new Exception("Token vacio");
        }
        try{
            $decodificado = JWT::decode($token, 'miClaseSuperSecreta', ['HS256']);
            $newResponse = $response->getBody()->write(Usuario::TraerListado());
        }
        catch(Exception $e){
            $retorno = new stdClass();
            $retorno->mensaje = "Token no valido!!! --> " . $e->getMessage();
            $newResponse = $response->withJson($retorno, 409);
        }
        return $newResponse;
    });
 
     $this->post('/', function ($request, $response) {
        $arrayDeDatos = $request->getParsedBody();      
        $user = new Usuario($arrayDeDatos['nombre'], $arrayDeDatos['apellido'], $arrayDeDatos['division']);
        if(Usuario::Verificar($user))
        {
            $payload = array(
                'iat' => time(),
                'data' => $user
            );
            $token = JWT::encode($payload, "miClaseSuperSecreta");        
            $newResponse = $response->withJson($token, 200);
        }
        else
        {
            $retorno = new stdClass();
            $retorno->mensaje = "El usuario no esta";
            $newResponse = $response->withJson($retorno, 409);
        }
        return $newResponse;
    })->add($MW2)->add($MW1);
     
});

$app->run();