<?php

if(!empty($_POST['login']) && !empty($_POST['nombre']) && !empty($_POST['apellidos'])&& !empty($_POST['cedula'])&& !empty($_POST['clave'])){
    $login=$_POST['login'];
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $cedula=$_POST['cedula'];
    $clave=md5($_POST['clave']);
    $cod_dep=$_POST['departamento'];
    $id=$_POST['id'];
    //print_r($_POST['valores']);
   
    include '/include/clase_db_init.php';
  $conn=new MySQL();
  $inser=$conn->consulta("UPDATE `usuarios` SET `login`='$login',`clave`='$clave',`nombres`='$nombre',`apellidos`='$apellidos',`cedula`='$cedula',`cod_dep`=$cod_dep WHERE id=$id");
   if($inser){
       
      echo $resultado=1;
   }else{
      echo $resultado=0;
       
   }
    
    
    
}

?>