<?php

class Persona
{
    public $nombre;
    public $apellido;

    function Guardar()
    {
        if(!file_exists("archivoPersona.txt"))
        {
            $f = fopen("archivoPersona.txt", "w");
            fclose($f);
        }
        if(file_exists("archivoPersona.txt"))
        {
            $f = fopen("archivoPersona.txt", "a");
            fwrite($f, $this->toString() . "\n");
            //fwrite($f, $this->toString() . " actualizado a las: " . date("H:i:s") . "\n");
            fclose($f);
            return true;
        }
        else
            return false;
        
    }

    function Leer()
    {
        if(file_exists("archivoPersona.txt"))
        {
            $f = fopen("archivoPersona.txt", "r");
            while(!feof($f))
            {
                echo fgets($f) . "<br>";
            }
            fclose($f);
            return true;
        }
        else
            return false;
    }


    function toString()
    {
        return $this->nombre . " - " . $this->apellido;
    }

    static function TraerTodasLasPersonas()
    {
        $personas = array();
        $f = fopen("archivoPersona.txt", "r");
        while(!feof($f))
        {
            $tempString = fgets($f);
            if($tempString == "")
                continue;
            $tempArray = explode(" - ", $tempString);
            array_push($personas, new Persona($tempArray[0], $tempArray[1]));
        }
        return $personas;
        fclose($f);
    }

    public function __construct($nombre, $apellido)
	{
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }
}


