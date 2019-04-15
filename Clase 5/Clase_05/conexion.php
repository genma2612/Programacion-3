<?php

class conexion
{
    public static $base = "usuarios";
    private static $user = "root";
    private static $clave = "";

    public static function EstablecerConexion()
    {
        $con = @mysql_connect("localhost", $conexion->user, $conexion->clave);
        return $con;
    }

    public static function CerrarConexion()
    {
        mysql_close();
    }
    
}