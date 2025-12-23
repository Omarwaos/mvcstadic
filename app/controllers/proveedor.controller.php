<?php

require_once '../models/Proveedor.php';

$proveedor = new Proveedor();

if(isset($_POST['operacion'])){

  switch($_POST['operacion']){
    case 'listar':
      $registros = $proveedor->listar();
      echo json_encode($registros);
      break;
    case 'registrar':
        $datos =[
        'razonsocial' =>$_POST['razonsocial'],
        'ruc'         =>$_POST['ruc'],
        'telefono'   =>$_POST['telefono'],
        'origen'      =>$_POST['origen'],
        'contacto'       =>$_POST['contacto'],
        'confianza'      =>$_POST['confianza']
      ];
      $idobtenido=$proveedor->registrar($datos);
      echo json_encode(['id'=>$idobtenido]);
      break;

    case 'actualizar':
      break;

    case 'eliminar':
      break;
  }

}