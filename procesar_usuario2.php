<?php
if (stristr($_SERVER['PHP_SELF'],'clase_db.inc.php')) {	//  evita que el script sea llamado directamente por el cliente
    header('Location: ../index.php');          			//  enviandolo directamente al index
    die();																//  Finaliza el script
}
   include '/include/clase_db_init.php';
   session_start();

 if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['cedula']) && !empty($_POST['departamento']) && !empty($_POST['clave']) && !empty($_SESSION['login1']) ){

    }else{
      echo "<script type='text/javascript'>"
        . "alert('Error, Faltan Datos');"
              . "document.location.href='agregar.php';"
            ."</script>";

    }

    $conn=new MySQL();
//
//    echo "select  a.nombres, a.apellidos, b.descripcion,a.cod_dep "
//           . "from usuarios as a, departamentos as b where a.login='".$login."' and a.cod_dep=b.id_departamento";exit();


   //echo "insert into solicitudes(tipo_solicitud,departamento,usuario,fecha,estatus)values  ('".$solicitud."','".$query1['cod_dep']."','".$query1['nombres']." ".$query1['apellidos']."',now(),'".$estatus."')";exit();
  // echo "insert into usuarios(login,nombres,apellidos,cedula,cod_dep,clave)values "
      //     . " ('".$_POST['login']."','".$_POST['nombre']."','".$_POST['apellido']." ".$_POST['cedula']."','".$_POST['departamento']."','".md5($_POST['clave'])."')";
    $sql="UPDATE usuarios SET login='".$_POST['login']."',nombres='".$_POST['nombre']."',apellidos='".$_POST['apellido']."',cedula=".$_POST['cedula'].",cod_dep='".$_POST['departamento']."',clave='".md5($_POST['clave'])."',telefono='".$_POST['tlfn']."',direccion='".$_POST['direccion']."',id_tipo='".$_POST['tipo_usuario']."' WHERE id=".$_POST['id']."";
    //echo $sql; exit();
    $inser=$conn->consulta($sql);

if($inser){
     echo "<script type='text/javascript'>"
        . "alert('Se Ha Modificado al Usuario');"
              . "document.location.href='registrar.php';"
            ."</script>";
}else{


    echo "<script type='text/javascript'>"
        . "alert('Error Al Modificar el Usuario, consulte al administrador');"
              . "document.location.href='registrar.php';"
            ."</script>";
}

?>