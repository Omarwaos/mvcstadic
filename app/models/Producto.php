<?php
//Requerimos de la conexion
require_once 'Conexion.php';

//Herencia (Conexion sede su método a Producto)
class Producto extends Conexion{

  //Este atributo contendrá la conexión
  private $pdo;

  //constructor

  public function __construct(){
    //La conexión asigna el acceso a $this->pdo
    $this->pdo = parent::getConexion();
  }

  //¿Qué funciones podemos realizar?
  public function listar(){
    try{
      //1. Crear la consulta SQL
      $sql="SELECT * FROM productos";
      //2. Enviar la consulta preparada a PDO
      $consulta = $this->pdo->prepare($sql);

      //3. Ejecutar la consulta
      $consulta->execute();

      //4. Entregar resultado
      //fetchALL (colección de arreglos)
      //PDO::FETCH_ASSOC (los valores son asociativos)
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      return [];
    }
  }

  public function registrar(){

  }

  public function eliminar(){

  }

  public function actualizar(){

  }

  public function buscar(){

  }

}