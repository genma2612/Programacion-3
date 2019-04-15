<?php

class usuario
{
    public $id;
    public $correo;
    public $clave;
    public $nombre;
    public $apellido;
    public $perfil;

    public function Traer($id)
    {
        $retorno = null;
        $con = BaseDatos::EstablecerConexion();
        $sql = "SELECT * FROM usuarios WHERE id={$id}";
        $rs = mysql_db_query($con, $sql);
        if($rs)
        {
            $datos = mysql_fetch_object($rs);
            $retorno = new usuario($datos->id,$datos->correo,$datos->clave,$datos->nombre,$datos->apellido,$datos->perfil);
        }
        BaseDatos::CerrarConexion();
        return $retorno;
    }

    public function TraerTodos() //Null o array de usuarios
    {
        $array = null;
        $con = BaseDatos::EstablecerConexion();



    }

    public function Eliminar() //True o False si pudo eliminar
    {
        $retorno = false;
        $con = BaseDatos::EstablecerConexion();
        


    }

    public static function Agregar($obj) //True o False si pudo agregar
    {
        $retorno = false;
        $con = BaseDatos::EstablecerConexion();
    }

    public static function Modificar($obj) //True o False si pudo modificar ()
    {
        
    }

    public function __construct($id,$correo,$clave,$nombre,$apellido,$perfil)
    {
        $this->id = $id;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->perfil = $perfil;
    }

}

class BaseDatos
{
    public static $base = "usuarios";
    private static $user = "root";
    private static $clave = "";

    public static function EstablecerConexion()
    {
        $con = @mysql_connect("localhost", $BaseDatos->user, $BaseDatos->clave);
        return $con;
    }

    public static function CerrarConexion()
    {
        mysql_close();
    }
}

