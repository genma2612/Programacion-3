<?php

include_once ("AccesoDatos.php");
include_once ("usuario.php");

$op = isset($_POST['op']) ? $_POST['op'] : NULL;

switch ($op) {
    case 'accesoDatos':
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->RetornarConsulta("select titel AS titulo, interpret AS interprete, jahr AS anio "
                                                        . "FROM cds");
        $consulta->execute();
        
        $consulta->setFetchMode(PDO::FETCH_INTO, new cd);
        
        foreach ($consulta as $cd) {
        
            print_r($cd->MostrarDatos());
            print("
                    ");
        }

        break;

    case 'mostrarUno':
        $usuario = usuario::Traer(1);
        echo $usuario->MostrarDatos();

        break;

    case 'mostrarTodos':

        $usuarios = usuario::TraerTodosLosUsuarios();
        
        foreach ($usuarios as $user) {
            
            print_r($user->MostrarDatos());
            print("
                    ");
        }
    
        break;

    case 'insertarUser':
    
        $miuser = new usuario(2, "mail2@gmail", "2222", "jose", "ramirez", 6666);
        
        $miuser->Agregar();

        echo "ok";
        
        break;

    case 'modificarUser':
        /*
        $id = $_POST['id'];        
        $titulo = $_POST['titulo'];
        $anio = $_POST['anio'];
        $interprete = $_POST['interprete'];
        */
        $miuser = usuario::Traer(2);
        $miuser->nombre = "jose modificado";
        usuario::Modificar($miuser);
            
        break;

    case 'eliminarUser':
    
        $miuser = new usuario(2, "mail2@gmail", "2222", "jose", "ramirez", 6666);
        
        $miuser->Eliminar($miuser);

        echo "ok";
        
        break;
        
        
    default:
        echo ":(";
        break;
}
