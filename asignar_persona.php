<?php
if (stristr($_SERVER['PHP_SELF'],'clase_db.inc.php')) {	//  evita que el script sea llamado directamente por el cliente
    header('Location: ../index.php');          			//  enviandolo directamente al index 
    die();																//  Finaliza el script
}
   include '/include/clase_db_init.php';
   session_start();
  
 if(!empty($_GET['id_solicitud']) && !empty($_GET['resp_asig']) ){
    $solicitud=$_GET['id_solicitud'];
    $personal_asignado=$_GET['resp_asig'];
     
    }else{
      echo "<script type='text/javascript'>"
        . "alert('Error, Faltan Datos');"
              . "document.location.href='estatus_solicitud.php';"
            ."</script>";
        
    }
    
    $conn=new MySQL();


  // echo "update solicitudes set asignar_usuario=".$personal_asignado." where id=".$solicitud;exit();
   $inser=$conn->consulta("update solicitudes set asignar_usuario=".$personal_asignado." where id=".$solicitud);

if($inser){
     echo "<script type='text/javascript'>"
        . "alert('Se Ha Insertado La Solicitud');"
              . "document.location.href='estatus_solicitud.php';"
            ."</script>";
}else{
    
    
    echo "<script type='text/javascript'>"
        . "alert('Error Al Insertar La Solicitud, consulte al administrador');"
              . "document.location.href='estatus_solicitud.php';"
            ."</script>";
    
    
    
    
}

?>