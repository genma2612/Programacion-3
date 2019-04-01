<?php

$f = fopen("archivo.txt", "r");
echo "Mi nombre es: " . fgets($f);
fclose($f);
