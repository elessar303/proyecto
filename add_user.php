<?php
if (stristr($_SERVER['PHP_SELF'],'clase_db.inc.php')) {	//  evita que el script sea llamado directamente por el cliente
    header('Location: ../index.php');          			//  enviandolo directamente al index 
    die();																//  Finaliza el script
}
   include '/include/clase_db_init.php';
   session_start();
  
 if(!empty($_GET['usuario'])){
    $usuario=$_GET['usuario'];
    //$personal_asignado=$_GET['resp_asig'];
     
    }else{
      echo "<script type='text/javascript'>"
        . "alert('Error, Faltan Datos');"
              . "document.location.href='estatus_solicitud.php';"
            ."</script>";
        
    }
    
    $conn=new MySQL();
    $activar="";
if(!empty($_POST['generar'])){
    $activar=$_POST['generar'];
}
if($activar=='si'){
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
}
   
  
   include 'cabecera.php';
?>

    
<link rel="stylesheet" type="text/css" href="css/tabla_solicitud.css" media="screen" />
<script type="text/javascript">
  
    function modificar(){ 
       
         login=document.getElementById("login").value;
         id=document.getElementById("actuar").value;
        nombre=document.getElementById("nombre").value;
        apellidos=document.getElementById("apellidos").value;
        cedula=document.getElementById("cedula").value;
        clave=document.getElementById("clave").value;
        departamento=document.getElementById("departamento").value;
       
        var valores={
            "login":login, "nombre":nombre,"apellidos":apellidos, "cedula":cedula, "clave":clave, "id":id, "departamento":departamento};
        
        $.ajax({
            data: valores,
            url: 'update_usuario.php',
            type: 'post',
            beforeSend: function () {
                       
                        
                    },
                    success: function (response){
                       if(response==1){
                           alert('Modificacion Exitosa');
                       }else{
                           alert('Error Al Modificar, Consulte Al Administrador');
                       }
                        
                    }
        })
        
        
        
        
    }
</script>
<body class="homepage">
            <!-- Header -->
			<div id="header">
				<div class="container">
						
					<!-- Logo -->
						<h1><a href="#" id="logo">PDVAL</a></h1>
                                                <div id="menu"> 
                                                    <?php 
                                                    if($_SESSION['login']=!""){
                                                        include 'menu.php';
                                                    }
                                                    ?>
					<!-- Nav -->
					 </div>
                                                

					<!-- Banner -->
						<div id="banner">
							
<div class="datagrid">
    
    <table>
<thead>
  
 
     <tr><th>Login</th><th>Nombre</th><th>Apellido</th><th>Cedula</th><th>Clave</th><th>Departamento</th><th>Operaccion</th></tr>
  
</thead> 

<tbody>
<?php
$estatus=new MySQL();//"select * from solicitudes as a, departamentos as b, usuarios as c,descripcion_solicitud as d where a.tipo_solicitud=d.tipo_solicitud and a.departamento=b.id_departamento "
$consulta=$estatus->consulta("select a.id, a.login, a.clave, a.nombres, a.apellidos, a.cedula, a.cod_dep, b.descripcion,b.id_departamento from usuarios as a, departamentos as b where a.cod_dep=b.id_departamento and a.id='".$_GET['usuario']."'");

    $fila=$estatus->fetch_array($consulta);
                      


                   
           echo"<tr class='alt'>";
            
            echo"
        <td><input type=text style='width: 100%; font-size: 12;'   id='login' name ='login' value='".utf8_encode($fila['login'])."' /></td>"
                    . "<td><input type=text style='width: 100%; font-size: 12; ' name=nombre id=nombre value='".$fila['nombres']."' /></td>"
                    . "<td><input type=text style='width: 100%; font-size: 12; name='apellidos' id='apellidos' value='".$fila['apellidos']."'/></td>"
                    . "<td><input type=text style='width: 100%; font-size: 12;  name='cedula' id='cedula' value='".$fila['cedula']."'/></td>"
                    . ""
                    . "<td><input type=password style='width: 100%; font-size: 12; name='clave' id='clave' value='".$fila['clave']."'/></td>"
                    . "<td ><select name=departamento id=departamento size=1 style='margin-top:-35;'>";$consulta_dep=$conn->consulta("select id_departamento, descripcion from departamentos");
                   // $arreglo_dep=$conn->fetch_array($consulta_dep);
                  while($arreglo_dep=$conn->fetch_array($consulta_dep)){
                   echo "<option ";if($fila['cod_dep']==$arreglo_dep[0]){echo"selected";}; echo " value=".$arreglo_dep[0].">".$arreglo_dep[1]."</option>"; 
                   }
                   echo "</select></td>
                        
                    <td><button id=actuar   nombre=actuar value=".$fila['id']." onclick='modificar()' style='margin-top:-35;'>MODIFICAR</button>
                          
                    </td></tr>
                    <div id='resultado'></div>
                 ";       
          ?>              
   
</tbody>
    </table>
</div></div></div></div>
                                                    
		<!-- Featured -->
			
		<!-- Main -->
			
		<!-- Footer -->
			<?php
                                                            include 'footer.php';
                                                            ?>

	