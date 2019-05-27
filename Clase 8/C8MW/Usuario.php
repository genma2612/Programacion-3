<?php
Class Usuario {

    public $tipo;
    public $nombre;

    public function ToString()
    {
        return "{$this->tipo} - {$this->nombre} \r\n";
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
            array_push($usuarios, new Usuario($tempArray[0], $tempArray[1]));
        }
        fclose($f);
        return $usuarios;
    }

    public function __construct($tipo, $nombre)
    {
        $this->tipo = $tipo;
        $this->nombre = $nombre;
    }

}