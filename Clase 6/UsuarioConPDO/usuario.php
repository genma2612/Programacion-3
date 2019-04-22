<?php

class usuario
{
    public $id;
    public $correo;
    public $clave;
    public $nombre;
    public $apellido;
    public $perfil;

    public function MostrarDatos()
    {
            return $this->id." - ".$this->correo." - ".$this->nombre." - ".$this->apellido;
    }

    public static function Traer($id)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta('SELECT * FROM usuarios WHERE id = ?');        
        $consulta->bindParam(1, $id, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetchObject("usuario");                                             
    }

    public static function Verificar($user, $psw) //True or False si el usuario y contraseña existe en la db
    {

    }

    public static function TraerTodosLosUsuarios() //Null o array de usuarios
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT id, correo, clave, nombre, apellido, "
                                                        . "perfil FROM usuarios");        
        
        $consulta->execute();
        
        $consulta->setFetchMode(PDO::FETCH_INTO, new usuario);                                                

        return $consulta; 
    }

    public static function Eliminar($user) //True o False si pudo eliminar
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();  
        $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM usuarios WHERE id = :id");
        $consulta->bindValue(':id', $user->id, PDO::PARAM_INT);
        return $consulta->execute();
    }

    public function Agregar() //True o False si pudo agregar
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO usuarios (id, correo, clave, nombre, apellido, perfil)"
                                                    . "VALUES(:id, :correo, :clave, :nombre, :apellido, :perfil)"); 
        $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
        $consulta->bindValue(':correo', $this->correo, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_INT);
        $consulta->execute();   
    }

    public static function Modificar($obj) //True o False si pudo modificar ()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE usuarios SET correo = :correo, clave = :clave, 
                                                        nombre = :nombre, apellido = :apellido, perfil = :perfil WHERE id = :id");
        
        $consulta->bindValue(':id', $obj->id, PDO::PARAM_INT);
        $consulta->bindValue(':correo', $obj->correo, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $obj->clave, PDO::PARAM_STR);
        $consulta->bindValue(':nombre', $obj->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $obj->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':perfil', $obj->perfil, PDO::PARAM_INT);

        return $consulta->execute();
    }

    public function __construct($id=null,$correo=null,$clave=null,$nombre=null,$apellido=null,$perfil=null)
    {
        if($id != null)
        {
            $this->id = $id;
            $this->correo = $correo;
            $this->clave = $clave;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->perfil = $perfil;
        }
    }

}

