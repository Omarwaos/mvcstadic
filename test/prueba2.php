<?php

require_once '../app/models/Proveedor.php';
$proveedor = new Proveedor();

//print_r($producto->registrar('Accesorio','Genius','Parlante 70W',12,'2025-10-10',5));
//Antes de utilizar el método, cramos un array con los nuevos datos

$datos =[
  "razonsocial"   =>"Empresa Z",
  "ruc"           =>"20345434556",
  "telefono"      =>"934565134",
  "origen"        => "N",
  "contacto"      => "Pedro Perez",
  "confianza"     => 5,
  "id"            => 1
];
print_r($proveedor->actualizar($datos));