<?php
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        $cadenaJSON = isset($_POST['json']) ? $_POST['json'] : null;   
        $dog = json_decode($cadenaJSON);
        $pathOrigen = $_FILES['foto']['tmp_name'];  
        $extension = "." . pathinfo($_FILES["foto"]["name"],PATHINFO_EXTENSION);
        $pathDestino = "./BACKEND/fotos/" . $dog->nombre . "." . date('Ymd_His') . $extension;
        $dog->pathFoto = $pathDestino;
        $cadenaNuevaJson = json_encode($dog);
        $ar = fopen("./perro.json", "a");
        $cant = fwrite($ar, $cadenaNuevaJson . "\r\n");
        fclose($ar);
        $resultado["OK"] = $cant > 0 ? true : false;
        $objJson = json_decode($cadenaJSON);     
        move_uploaded_file($pathOrigen, $pathDestino);
        echo json_encode($resultado);