<?php
require_once 'IMiddlewareable.php';

Class Verificadora implements IMiddlewareable {

    public function VerificarUsuario($request, $response, $next)
    {
        if($request->IsPost())
        {
            $retorno = new stdClass();
            $retorno->exito = false;
            $retorno->mensaje = "ACCESO DENEGADO";
            $status = 403;
            $ArrayDedatos = $request->getParsedBody();
            if($ArrayDedatos['tipo'] == "admin")
            {
                $retorno->exito = true;
                $status = 200;
                $retorno->mensaje = "Bienvenido administrador {$ArrayDedatos['nombre']}";
                $response = $next($request, $response); //Le indico que ejecute la siguiente funcion (la API)
                //$retorno->mensajeAPI = $response; //Capturo el mensaje de la siguiente funcion API
            }
            $newResponse = $response->withJson($retorno, $status);  
            return $newResponse;
        }
        if($request->IsGet())
        {
            $response = $next($request, $response);
            return $response;
        }
    }


}