<?php

if(!empty($_POST['login']) && !empty($_POST['nombre']) && !empty($_POST['apellidos'])&& !empty($_POST['cedula'])&& !empty($_POST['clave'])){
    $login=$_POST['login'];
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $cedula=$_POST['cedula'];
    $clave=md5($_POST['clave']);
    $cod_dep=$_POST['departamento'];
    $id=$_POST['id'];
    $tlfn=$_POST['tlfn'];
    $direccion=$_POST['direccion'];
    $id_tipo=$_POST['id_tipo'];
    //print_r($_POST['valores']);
   
    include '/include/clase_db_init.php';
  $conn=new MySQL();
  $sql="UPDATE `usuarios` SET `login`='$login',`clave`='$clave',`nombres`='$nombre',`apellidos`='$apellidos',`cedula`='$cedula',`cod_dep`=$cod_dep, telefono='$tlfn', direccion='$direccion', id_tipo=$id_tipo WHERE id=$id";
  echo $sql; 
  $inser=$conn->consulta($sql);
   if($inser){
       
      echo $resultado=1;
   }else{
      echo $resultado=0;
       
   }
    
    
    
}

?>