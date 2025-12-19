<?php

//1. Acceder a la clase conexión
require_once 'Conexion.php';
//2. El preoveedor heredará las funcionalidades de la clase Conexion
class Proveedor extends Conexion{
  //3. Creamos un atributo donde guardamos la conexión

  private $pdo;

  //4. En el constructor, guardamos la conexión activa

public function __construct(){
  $this->pdo =parent::getConexion();
}

public function listar():array{
  try{
  $sql="
      SELECT 
        id, razonsocial, ruc, telefono, origen, contacto, confianza
        FROM proveedores
        ORDER BY id DESC
      ";

  $consulta=$this->pdo->prepare($sql);

  $consulta->execute();

  return $consulta->fetchAll(PDO::FETCH_ASSOC);

  }
  catch(Exception $e){
    return [];
  }



}

public function registrar($registros=[]): int{
  try{
    $sql="
    INSERT INTO proveedores
    (razonsocial, ruc, telefono, origen, contacto, confianza)
    VALUES (?,?,?,?,?,?)";
    $consulta = $this->pdo->prepare($sql);

    $consulta->execute(
      array(
        $registros['razonsocial'],
        $registros['ruc'],
        $registros['telefono'],
        $registros['origen'],
        $registros['contacto'],
        $registros['confianza'],
      )
    );

    return $this->pdo->lastInsertId();

  }
  catch(Exception $e){
    return -1;
  }

}

public function eliminar($id): int{
  try{
    $sql="DELETE FROM proveedores WHERE id=?";

    $consulta =$this->pdo->prepare($sql);

    $consulta->execute(
      array($id)
    );

    return $consulta->rowCount();
  }
  catch(Exception $e){
    return -1;
  }
  
}

public function actualizar($registros=[]):int{
  try{
  $sql="
    UPDATE proveedores SET
    razonsocial =?,
    ruc         =?,
    telefono    =?,
    origen      =?,
    contacto    =?,
    confianza   =?,
    updated     now()
    WHERE id    =?
  ";
    $consulta=$this->pdo->prepare($sql);

    $consulta->execute(
      array(
        $registros['razonsocial'],
        $registros['ruc'],
        $registros['telefono'],
        $registros['origen'],
        $registros['contacto'],
        $registros['confianza'],
        $registros['id']
      )
    );

    return $consulta->rowCount();

  }
  catch(Exception $e){
    return -1;
  }

}

}
