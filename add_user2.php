<?php
if (stristr($_SERVER['PHP_SELF'],'clase_db.inc.php')) {	//  evita que el script sea llamado directamente por el cliente
    header('Location: ../index.php');          			//  enviandolo directamente al index
    die();																//  Finaliza el script
}
   include '/include/clase_db_init.php';
  include 'cabecera.php';
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
        tlfn=document.getElementById("tlfn").value;
        direccion=document.getElementById("direccion").value;
        id_tipo=document.getElementById("id_tipo").value;

        var valores={
            "login":login, "nombre":nombre,"apellidos":apellidos, "cedula":cedula, "clave":clave, "id":id, "departamento":departamento, "tlfn":tlfn, "direccion":direccion, "id_tipo":id_tipo};

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



<tbody>
<?php
$estatus=new MySQL();//"select * from solicitudes as a, departamentos as b, usuarios as c,descripcion_solicitud as d where a.tipo_solicitud=d.tipo_solicitud and a.departamento=b.id_departamento "
$consulta=$estatus->consulta("select a.id, a.login, a.clave, a.nombres, a.apellidos, a.cedula, a.telefono,a.direccion,a.cod_dep,a.id_tipo, b.descripcion,b.id_departamento from usuarios as a, departamentos as b where a.cod_dep=b.id_departamento and a.id='".$_GET['usuario']."'");

    $fila=$estatus->fetch_array($consulta);

?>                      <div>
                        <h4>Departamento
                          <select name=departamento id=departamento size=1 ;'>"<?php
                          $consulta_dep=$conn->consulta("select id_departamento, descripcion from departamentos");
                   // $arreglo_dep=$conn->fetch_array($consulta_dep);
                  while($arreglo_dep=$conn->fetch_array($consulta_dep)){
                   echo "<option ";if($fila['cod_dep']==$arreglo_dep[0]){echo"selected";}; echo " value=".$arreglo_dep[0].">".$arreglo_dep[1]."</option>";
                   }?>
                   </select>
                        </h4>
                        </div>
                       <div class="large">
                    <h4>Nombres: <input name="nombre" id="nombre" value="<?php echo utf8_encode($fila['nombres']); ?>" placeholder="NOMBRES" title='COLOQUE NOMBRES' style=" text-align:center;"/></h4>
                </div>
                    <div class="large">
                    <h4>Apellidos: <input name="apellido" id="apellidos" value="<?php echo utf8_encode($fila['apellidos']); ?>" placeholder="APELLIDOS"  title='COLOQUE APELLIDOS' style=" text-align:center;"/></h4>
                </div>
                        <div class="large">
                            <h4>Cedula: <input name="cedula" id="cedula" value="<?php echo utf8_encode($fila['cedula']); ?>" placeholder="CEDULA"  title='COLOQUE CEDULA' style=" text-align:center;"/></h4>
                </div>
                <div class="large">
                            <h4>Telefono: <input name="tlfn" id="tlfn" value="<?php echo utf8_encode($fila['telefono']); ?>" placeholder="TELEFONO"  title='COLOQUE TELEFONO' style=" text-align:center;"/></h4>
                </div>
                <div class="large">
                            <h4>Direccion: <input name="direccion" id="direccion" value="<?php echo utf8_encode($fila['direccion']); ?>" placeholder="DIRECCION"  title='COLOQUE DIRECCION' style=" text-align:center;"/></h4>
                </div>

                       <div class="large">
                            <h4> Login: <input name="login" id="login" value="<?php echo utf8_encode($fila['login']); ?>" placeholder="LOGIN"  title='COLOQUE LOGIN' style=" text-align:center;"/></h4>
                </div>
                       <div class="large">
                           <h4>Clave: <input name="clave"  type="password" id="clave" value="<?php echo utf8_encode($fila['clave']); ?>" placeholder="CLAVE"  title='COLOQUE CLAVE' style=" display: inline-block; text-align: center; width: 190px;"/></h4>
                </div>
                       <div class="large">
                            <h4>Confirmar Clave<input name="reclave" type="password" id="reclave" value="<?php echo utf8_encode($fila['clave']); ?>" placeholder="REPITA CLAVE"  title='REPITA CLAVE' style="display: inline-block; text-align:center; width: 190px;"/></h4>
                </div>
                <div>
                        <h4>Tipo Usuario
                          <select name=id_tipo id=id_tipo size=1 ;'>"<?php
                          $consulta_dep2=$conn->consulta("select * from tipo_usuario");
                   // $arreglo_dep=$conn->fetch_array($consulta_dep);
                  while($arreglo_dep=$conn->fetch_array($consulta_dep2)){
                   echo "<option ";if($fila['id_tipo']==$arreglo_dep[0]){echo"selected";}; echo " value=".$arreglo_dep[0].">".$arreglo_dep[1]."</option>";
                   }?>
                   </select>
                        </h4>
                        </div>
                   </div></div>


        <td><button id=actuar   nombre=actuar value="<?php echo utf8_encode($fila['id']); ?>" onclick='modificar(this.value)'>MODIFICAR</button>

                    </td></tr>
                    <div id='resultado'></div>
</tbody>

</div></div>

		<!-- Featured -->

		<!-- Main -->

		<!-- Footer -->
			<?php
                                                            include 'footer.php';
                                                            ?>

