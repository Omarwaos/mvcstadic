<?php

//Necesita del modelo para poder responder...
require_once '../models/Producto.php';

$producto = new Producto();

//¿Qué operación desea realizar el usuario?
//consulta, registro, actualizar, eliminar, buscar ¿?

//isset() : función que determina si un objeto existe, fue definido
//$_POST['']  : permite interactuar con valores que envía la vista

//JSON    :Javascript Object Notation
//Mecanismo de intercabio de datos

if(isset($_POST['operacion'])){
  //El usuario nos envió una tarea...
  switch($_POST['operacion']){
    case 'listar':
      $registros = $producto->listar();
      echo json_encode($registros);
      break;
    case 'registrar':
      break;

    case 'actualizar':
      break;

    case 'eliminar':
      break;
  }

}

