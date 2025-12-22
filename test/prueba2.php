<?php

require_once '../app/models/Producto.php';
$producto = new Producto();

//print_r($producto->registrar('Accesorio','Genius','Parlante 70W',12,'2025-10-10',5));
//Antes de utilizar el método, cramos un array con los nuevos datos

$datos =[
  'id'=>3,
  'clasificacion'=>'Componente',
  'marca'=>'Asus',
  'descripcion'=>'Tarjeta Madre B450',
  'garantia'=>24,
  'ingreso'=>'2023-05-15',
  'cantidad'=>10
];
print_r($producto->actualizar($datos));