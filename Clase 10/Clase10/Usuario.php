<?php
require_once 'IApiUsuario.php';

Class Usuario implements IApiUsuario {

    //public $legajo;
    public $legajo;
    public $tipo;
    public $nombre;

    public function ToString()
    {
        return "{$this->legajo} - {$this->tipo} - {$this->nombre} \r\n";
    }

    public function Agregar()
    {
        if(!file_exists("Usuarios.txt"))
        {
            $f = fopen("Usuarios.txt", "w");
            fclose($f);
        }
        if(file_exists("Usuarios.txt"))
        {
            $f = fopen("Usuarios.txt", "a");
            fwrite($f, $this->ToString());
            fclose($f);
            return true;
        }
        else
            return false;
    }

    public static function TraerTodos()
    {
        $usuarios = array();
        $f = fopen("Usuarios.txt", "r");
        while(!feof($f))
        {
            $tempString = fgets($f);
            if($tempString == "")
                continue;
            $tempArray = explode(" - ", $tempString);
            array_push($usuarios, new Usuario(trim($tempArray[0]), trim($tempArray[1]),trim($tempArray[2])));
        }
        fclose($f);
        return $usuarios;
    }

    public function __construct($legajo=null, $tipo=null, $nombre=null)
    {
        $this->legajo = $legajo;
        $this->tipo = $tipo;
        $this->nombre = $nombre;
    }

    //Interface

    Public function AltaUsuario($request, $response, $args){
        $json = json_decode($request->getParsedBody()['user']);
        $obj = new Usuario($json->tipo, $json->nombre);
        $obj->Agregar();
    }

    Public function TraerTodosLosUsuarios($request, $response, $args)
    {
        $array = Usuario::TraerTodos();
        $response->getBody()->write($response->withJson($array, 200));
    }

    Public function TraerUnUsuario($request, $response, $args){
        
        $retorno = "";
        $array = Usuario::TraerTodos();
        foreach ($array as $obj) {
            if($obj->legajo == $args['legajo'])
            {
                $retorno = json_encode($obj);
                break;
            }
        }
        return $retorno;
    }

    Public function ModificarUsuario($request, $response, $args){}

    Public function EliminarUsuario($request, $response, $args)
    {
        $array = Usuario::TraerTodos();
        $newArray = array();
        $json = json_decode(Usuario::TraerUnUsuario($request, $response, $args));
        $obj = new Usuario($json->legajo, $json->tipo, $json->nombre);
        for ($i=0; $i < sizeof($array); $i++) { 
            if($array[$i]->legajo == $obj->legajo)
            {
                continue;
            }
            array_push($newArray, $array[$i]);
        }
        $f = fopen("Usuarios.txt", "w");
        foreach ($newArray as $obj) {
            $obj->Agregar();
        }
        fclose($f);
    }

}