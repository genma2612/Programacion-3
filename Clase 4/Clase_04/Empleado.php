<?php

    class Empleado{

    public $apellido;
    public $nombre;
    public $legajo;
    public $sueldo;
    public $path_foto;


    public function __construct($legajo,$apellido,$nombre,$sueldo,$path_foto)
    {
        $this->apellido = $apellido;
        $this->nombre = $nombre;
        $this->legajo = $legajo;
        $this->sueldo = $sueldo;
        $this->path_foto = $path_foto;
    }

    public static function Agregar($empleado)
    {
        if(!file_exists("Empleados.txt"))
        {
            $f = fopen("Empleados.txt", "w");
            fclose($f);
        }
        if(file_exists("Empleados.txt"))
        {
            $f = fopen("Empleados.txt", "a");
            fwrite($f, $empleado->ToString());
            fclose($f);
            return true;
        }
        else
            return false;
    }

    public static function TraerTodos()
    {
        $empleados = array();
        $f = fopen("Empleados.txt", "r");
        while(!feof($f))
        {
            $tempString = fgets($f);
            if($tempString == "")
                continue;
            $tempArray = explode(" - ", $tempString);
            array_push($empleados, new Empleado($tempArray[0], $tempArray[1], $tempArray[2], $tempArray[3], $tempArray[4]));
        }
        fclose($f);
        return $empleados;
    }

    public function ToString()
    {
        return $this->legajo . " - " . $this->apellido . " - " . $this->nombre . " - " . $this->sueldo . " - " . $this->path_foto . "\r\n";
    }
}

?>