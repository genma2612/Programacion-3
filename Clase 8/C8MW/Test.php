<?php
Class Test {

    public function MostrarMetodoDinamico($request, $response, $next)
    {
        $response->getBody()->write("Estoy en la funcion de instancia\n");
        return $next($request, $response);
    }

    public static function MostrarMetodoEstatico($request, $response, $next)
    {
        $response->getBody()->write("Estoy en la funcion estatica\n");
        return $next($request, $response);
    }

}