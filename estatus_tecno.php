<?php
if (stristr($_SERVER['PHP_SELF'],'clase_db.inc.php')) {	//  evita que el script sea llamado directamente por el cliente
    header('Location: ../index.php');          			//  enviandolo directamente al index 
    die();																//  Finaliza el script
}
   include '/include/clase_db_init.php';
   session_start();
  
 if(!empty($_GET['id']) && !empty($_GET['estatus']) ){
    $id=$_GET['id'];
    $estatus=$_GET['estatus'];
     
    }else{
      echo "<script type='text/javascript'>"
        . "alert('Error, Faltan Datos');"
              . "document.location.href='tecnologia_estatus.php';"
            ."</script>";
        
    }
    
    $conn=new MySQL();


  // echo "update solicitudes set asignar_usuario=".$personal_asignado." where id=".$solicitud;exit();
   $inser=$conn->consulta("update solicitudes set estatus_tecnologia=".$estatus." where id=".$id);

if($inser){
     echo "<script type='text/javascript'>"
        . "alert('Se Ha Modificado El Estatus');"
              . "document.location.href='tecnologia_estatus.php';"
            ."</script>";
}else{
    
    
    echo "<script type='text/javascript'>"
        . "alert('Error Al modificar estatus, consulte al administrador');"
              . "document.location.href='tecnologia_estatus.php';"
            ."</script>";
    
    
    
    
}

?>