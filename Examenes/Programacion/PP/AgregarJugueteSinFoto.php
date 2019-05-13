<?php
require_once('./clases/Juguete.php');
if(isset($_POST['tipo']) && isset($_POST['precio']) && isset($_POST['paisOrigen']))
{
    if(!is_dir("./archivos"))
    {
        mkdir("./archivos");
    }
    $f = fopen("./archivos/juguetes_sin_foto.txt", "a");
    $juguete = new Juguete($_POST['tipo'],$_POST['precio'],$_POST['paisOrigen']);
    if($juguete->Agregar())
    {
        fwrite($f, $juguete->ToString() . "-" . date("d/m/Y") . "\r\n");
        fclose($f);
        echo "Juguete guardado exitosamente";
    }
    else
    {
        echo $juguete->ToString();
    }

}