<?php
require_once "persona.php";

$p1 = new Persona("Manuel", "Gonzalez");
$p1->nombre = "Felipe";
$p1->Guardar();
$p1->Leer();