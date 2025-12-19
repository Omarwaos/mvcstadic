<?php

//Para salir de una carepta ../
require_once '../app/models/Proveedor.php';
$proveedor = new Proveedor();

//Verificamos el método listar
print_r($proveedor->listar());

//En la terminal colocamos cd test (nombre de la carpeta supongo) Era para moverse a esa carpeta XD
//Y luego php prueba1.php (Ejecutamos el archivo)