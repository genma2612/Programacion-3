<?php
require_once('./clases/Juguete.php');
if(isset($_POST['tipo']) && isset($_POST['paisOrigen']) && isset($_POST['precio']) && isset($_FILES['foto']))
{
    if(!is_dir("./juguetesModificados"))
    {
        mkdir("./juguetesModificados");
    }
    $foto = "./juguetesModificados/" . $_POST['tipo'] . "." . $_POST['paisOrigen'] . ".modificado." . pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
    $j = new Juguete($_POST['tipo'], $_POST['precio'], $_POST['paisOrigen'], $foto);
    if($j->Modificar())
    {
        move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
        header("Location: Listado.php");
    }
    else
        echo "No se pudo modificar";
}