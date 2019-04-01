<?php
require_once "persona.php";

//var_dump($_REQUEST); //$_GET / $_POST / $_REQUEST
//die();

$p1 = new Persona($_REQUEST["nombre"], $_REQUEST["apellido"]);
$p1->Guardar();
$p1->Leer();

//var_dump(Persona::TraerTodasLasPersonas());