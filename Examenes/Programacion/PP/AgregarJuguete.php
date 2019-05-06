<?php
require_once('./clases/Juguete.php');
if(isset($_POST['tipo']) && isset($_POST['precio']) && isset($_POST['paisOrigen']) && isset($_FILES['foto']))
{
    if(!is_dir("./juguetes"))
    {
        mkdir("./juguetes");
        if(!is_dir("./juguetes/imagenes/"))
            mkdir("./juguetes/imagenes/");
    }
    $foto = "./juguetes/imagenes/" . $_POST['tipo'] . "." . $_POST['paisOrigen'] . ".".date("His")."." . pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
    $j = new Juguete($_POST['tipo'],$_POST['precio'],$_POST['paisOrigen'],$foto);
    if($j->Verificar(Juguete::Traer()))
    {
        if($j->Agregar())
        {
            move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
            header("Location: Listado.php");
        }
        else
        {
            echo "Error al agregar el juguete a la base de datos";
        }

    }
    else
        echo "El juguete ya existe en la base de datos";
}