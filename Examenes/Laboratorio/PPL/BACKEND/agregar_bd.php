<?php
    require_once "AccesoDatos.php";
    date_default_timezone_set("America/Argentina/Buenos_Aires");

    $cadenaJSON = isset($_POST['json']) ? $_POST['json'] : null;   
    $dog = json_decode($cadenaJSON);

    $pathOrigen = $_FILES['foto']['tmp_name'];  
    $extension = "." . pathinfo($_FILES["foto"]["name"],PATHINFO_EXTENSION);
    $pathDestino = "./BACKEND/fotos/" . $dog->nombre . "." . date('Ymd_His') . $extension;
    $dog->pathFoto = $pathDestino;

    $retorno = new stdClass();
    $retorno->OK = false;
    $retorno->perro = "";

    $objetoDatos = AccesoDatos::DameUnObjetoAcceso();
    $consulta = $objetoDatos->RetornarConsulta("INSERT INTO perros (tamanio, edad, precio, nombre, raza, path_foto)"
                                                        . "VALUES(:tamano, :edad, :precio, :nombre, :raza, :path_foto)"); 
            
    $consulta->bindParam(':tamano', $dog->tamano, PDO::PARAM_STR);
    $consulta->bindParam(':edad', $dog->edad, PDO::PARAM_INT);
    $consulta->bindParam(':precio', $dog->precio, PDO::PARAM_INT);
    $consulta->bindParam(':nombre', $dog->nombre, PDO::PARAM_STR);
    $consulta->bindParam(':raza', $dog->raza, PDO::PARAM_STR);
    $consulta->bindParam(':path_foto', $dog->pathFoto, PDO::PARAM_STR);

    if($consulta->execute())
    {
        $retorno->perro = json_encode($dog);
        $retorno->OK = true;  
        move_uploaded_file($pathOrigen, $pathDestino);
    }
    echo json_encode($retorno);