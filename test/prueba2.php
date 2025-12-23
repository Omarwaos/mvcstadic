<?php

require_once '../app/models/Proveedor.php';
$proveedor = new Proveedor();

//print_r($producto->registrar('Accesorio','Genius','Parlante 70W',12,'2025-10-10',5));
//Antes de utilizar el método, cramos un array con los nuevos datos

$datos =[
  'id'=>2,
  'razonsocial'=>'Sony',
  'ruc'=>'20548796532',
  'telefono'=>'987654321',
  'origen'=>'E',
  'contacto'=>'Juan Perez',
  'confianza'=>5
];
print_r($proveedor->actualizar($datos));