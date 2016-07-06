<?php

error_reporting(0);
if (stristr($_SERVER['PHP_SELF'],'clase_db.inc.php')) {	//  evita que el script sea llamado directamente por el cliente
    header('Location: ../index.php');          			//  enviandolo directamente al index
    die();																//  Finaliza el script
}
 class MySQL{

  private $conexion; private $total_consultas;

  public function MySQL(){
    if(!isset($this->conexion)){
      $this->conexion = (mysqli_connect("localhost","root",""))
        or die(mysql_error());

      $db="soporte";
    $bd1="Error al conectar a la base de datos, Consultar al Administrador";
      mysqli_select_db($this->conexion,$db) or die($bd1);
    }
  }

  public function consulta($consulta){
    $this->total_consultas++;
    $resultado = mysqli_query($this->conexion,$consulta);
    if(!$resultado){
      echo 'MySQL Error: ' . mysqli_error($this->conexion);
      exit;
    }
    return $resultado;
  }

  public function fetch_array($consulta){
   return mysqli_fetch_array($consulta);
  }

  public function num_rows($consulta){
   return mysqli_num_rows($consulta);
  }

  public function getTotalConsultas(){
   return $this->total_consultas;
  }

}?>