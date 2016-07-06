<?php
if (stristr($_SERVER['PHP_SELF'],'clase_db.inc.php')) {	//  evita que el script sea llamado directamente por el cliente
    header('Location: ../index.php');          			//  enviandolo directamente al index
    die();																//  Finaliza el script
}
   include '/include/clase_db_init.php';
   session_start();

 if(!empty($_POST['solicitud']) && !empty($_POST['estatus_solicitud']) && !empty($_SESSION['login1']) ){
    $solicitud=$_POST['solicitud'];
    $estatus=$_POST['estatus_solicitud'];
     $login=$_SESSION['login1'];
     $_SESSION['nombre'];
     $_SESSION['departamento'];
    }else{
      echo "<script type='text/javascript'>"
        . "alert('Error, Faltan Datos');"
              . "document.location.href='solicitud.php';"
            ."</script>";

    }

    $conn=new MySQL();


   $query=$conn->consulta("select  a.id, a.nombres, a.apellidos, b.descripcion,a.cod_dep from usuarios as a, departamentos as b where a.login='".$login."' and a.cod_dep=b.id_departamento");
   $query1=$conn->fetch_array($query);

   for ($i=0;$i<count($solicitud);$i++)
{
   $inser=$conn->consulta("insert into solicitudes(tipo_solicitud,departamento,usuario,fecha,estatus, id_usuario)values  ('".$solicitud[$i]."','".$query1['cod_dep']."','".$query1['nombres']." ".$query1['apellidos']."',NOW(),'".$estatus."', $query1['id'])");
}
if($inser){
     echo "<script type='text/javascript'>"
        . "alert('Se Ha Insertado La Solicitud');"
              . "document.location.href='solicitud.php';"
            ."</script>";
}else{


    echo "<script type='text/javascript'>"
        . "alert('Error Al Insertar La Solicitud, consulte al administrador');"
              . "document.location.href='solicitud.php';"
            ."</script>";




}

?>