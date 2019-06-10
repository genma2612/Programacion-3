<?php
    interface IApiUsuario{

        Public function AltaUsuario($request, $response, $args);

        Public function TraerTodosLosUsuarios($request, $response, $args);

        Public function TraerUnUsuario($request, $response, $args);

        Public function ModificarUsuario($request, $response, $args);

        Public function EliminarUsuario($request, $response, $args);

    }
    