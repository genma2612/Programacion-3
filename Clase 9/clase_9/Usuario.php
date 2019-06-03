<?php
class Usuario
{
	public $nombre;
 	public $apellido;
  	public $division;


    public static function Verificar($user)
    {
        $retorno = false;
        $array = Usuario::TraerTodos();
        foreach ($array as $obj) {
            if($user->nombre == $obj->nombre && $user->apellido == $obj->apellido && $user->division == $obj->division)
            {
                $retorno = true;
                break;
            }
        }
        return $retorno;
    }

    private static function TraerTodos()
    {
        $user1 = new Usuario("Manuel","Gonzalez","3A");
        $user2 = new Usuario("Juan","Perez","2B");
        $user3 = new Usuario("Miguel","Lopez","1C");
        $user4 = new Usuario("Laura","Rodriguez","2C");
        $user5 = new Usuario("Aldo","Garcia","1A");
        $usuarios = Array($user1, $user2, $user3, $user4, $user5);
        return $usuarios;
    }

    public static function traerListado() //Tabla html que retorna todos los usuarios
    {
        $retorno =  '<table border="1"><tr><td align="center">Nombre</td>' .
                    '<td align="center">Apellido</td>'. 
                    '<td align="center">Division</td></tr>';
        $array = Usuario::TraerTodos();
        foreach ($array as $obj) {
            $retorno .= '<tr><td>' . $obj->nombre . '</td>';
            $retorno .= '<td>' . $obj->apellido . '</td>';
            $retorno .= '<td>' . $obj->division . '</td></tr>';
        }
        $retorno .= '</table>';
        return $retorno;
    }

    public function __construct($nombre, $apellido, $division)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->division = $division;
    } 
}