<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Solicitud </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script type="text/javascript">


function validacion() {
   valor1 = document.getElementById("nombre").value;
    if ( valor1 == null || valor1.length == 0 || /^\s+$/.test(valor1) ) {
    // Si no se cumple la condicion...
    alert('[ERROR] El campo nombre debe tener un valor Valido...');
    document.getElementById("nombre").focus();
    return false;
  }
 valor2 = document.getElementById("apellido").value;
    if ( valor2 == null || valor2.length == 0 || /^\s+$/.test(valor2) ) {
    // Si no se cumple la condicion...
    alert('[ERROR] El campo apellido debe tener un valor Valido...');
    document.getElementById("apellido").focus();
    return false;
  }
  valor3 = document.getElementById("cedula").value;
    if ( valor3 == null || valor3.length == 0 || /^\s+$/.test(valor3) || isNaN(valor3) ) {
    // Si no se cumple la condicion...
    alert('[ERROR] El campo cedula debe tener un valor Valido(solo numeros)...');
    document.getElementById("cedula").focus();
    return false;
  }
  valor4= document.getElementById("login").value;
    if ( valor4 == null || valor4.length == 0 || /^\s+$/.test(valor4) ) {
    // Si no se cumple la condicion...
    alert('[ERROR] El campo login debe tener un valor Valido...');
    document.getElementById("login").focus();
    return false;
  }
  valor5 = document.getElementById("clave").value;
  valor6 = document.getElementById("reclave").value;
    if ( (valor5 == null || valor6 == null) || (valor5.length == 0 || valor6.length == 0)  || (/^\s+$/.test(valor1) || /^\s+$/.test(valor1)) ) {
    // Si no se cumple la condicion...
    alert('[ERROR] El los campos claves tienen errores...');
    document.getElementById("clave").focus();
    return false;
  }
  if(valor5!=valor6){
      alert('[ERROR] El los campos claves no son iguales...');
      document.getElementById("clave").focus();
    return false;
  }

  // Si el script ha llegado a este punto, todas las condiciones
  // se han cumplido, por lo que se devuelve el valor true
  return true;
}

        </script>
</head>
<body >

<!-- Start Formoid form-->
<link rel="stylesheet" href="solicitud_usuario_files/formoid1/formoid-solid-blue.css" type="text/css" />

<form class="formoid-solid-blue" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:350px;min-width:150px"
      method="post" action="procesar_usuario2.php" name="solicitud1" id="solicitud1" onsubmit="return validacion()">


    <div >
        <p style="color: #3498DB;alignment-adjust: middle; margin-top: 10px;"><h3>Editar Usuario</h3></p>
            <div class="item-cont">
                <div class="large">

                   <?php  // Consultar la base de datos
                   $conn=new MySQL();
                    $consulta_mysql=$conn->consulta('select * from departamentos');
                    $consulta_mysql2=$conn->consulta('select * from tipo_usuario');
                    $sql="select a.id, a.login, a.clave, a.nombres, a.apellidos, a.cedula, a.cod_dep, a.telefono, a.direccion, a.id_tipo, b.descripcion,b.id_departamento from usuarios as a, departamentos as b where a.cod_dep=b.id_departamento and a.id='".$_GET['usuario']."'";
                    //echo $sql; exit();
                    $consulta=$conn->consulta($sql);
                    $fila=$conn->fetch_array($consulta);



                    echo "<select  size='1' name='departamento' id='departamento' style='width:195px' title='SELECCIONE DEPARTAMENTO'> <option value=''>Departamento...</option>";
                    while($fila2=$resultado_consulta_mysql=$conn->fetch_array($consulta_mysql)){
                        echo "<option ";if($fila2['id_departamento']==$fila['id_departamento']){echo"selected='selected'";}; echo "value='".$fila2['id_departamento']."'>".$fila2['descripcion']."</option>";
                    }
                    echo "</select>";

                    ?>
                    </div></div>
<!--                    <select  size="1" name="solicitud" id="solicitud">
                <option value="0">Tipo de Soporte...</option>
		<option value="1">Soporte Impresora</option>
		<option value="2">Soporte PC</option>
		<option value="3">Soporte Caja</option>
                    </select> </div></div>-->
                    <div hidden="hidden"><input hidden="hidden" type=text name='id' id='id' value='<?php echo $fila['id'];?>'/></div>
                   <div class="item-cont">
                       <div class="large"><br>
                    <h4><input name="nombre" id="nombre" placeholder="NOMBRES" title='COLOQUE NOMBRES' value='<?php echo $fila['nombres'];?>' style=" text-align:center;"/></h4>
                </div>
                    <div class="large">
                    <h4><input name="apellido" id="apellido" placeholder="APELLIDOS"  title='COLOQUE APELLIDOS' value='<?php echo $fila['apellidos'];?>' style=" text-align:center;"/></h4>
                </div>
                        <div class="large">
                            <h4><input name="cedula" id="cedula" placeholder="CEDULA"  title='COLOQUE CEDULA' value='<?php echo $fila['cedula'];?>'  style=" text-align:center;"/></h4>
                </div>
                <div class="large">
                            <h4><input name="tlfn" id="tlfn" placeholder="TELEFONO"  title='COLOQUE TELEFONO' value='<?php echo $fila['telefono'];?>'  style=" text-align:center;"/></h4>
                </div>
                <div class="large">
                            <h4><input name="direccion" id="direccion" placeholder="DIRECCION"  title='COLOQUE DIRECCION' value='<?php echo $fila['direccion'];?>'  style=" text-align:center;"/></h4>
                </div>

                       <div class="large">
                            <h4><input name="login" id="login" placeholder="LOGIN"  title='COLOQUE LOGIN' value='<?php echo $fila['login'];?>'  style=" text-align:center;"/></h4>
                </div>
                       <div class="large">
                           <h4><input name="clave"  type="password" id="clave" placeholder="CLAVE"  title='COLOQUE CLAVE' value='<?php echo $fila['clave'];?>'  style=" display: inline-block; text-align: center; width: 190px;"/></h4>
                      </div>
                       <div class="large">
                            <h4><input name="reclave" type="password" id="reclave" placeholder="REPITA CLAVE"  title='REPITA CLAVE' value='<?php echo $fila['clave'];?>'  style="display: inline-block; text-align:center; width: 190px;"/></h4>
                      </div>

                      <div class="large">
                      <?php
                      echo "<select  size='1' name='tipo_usuario' id='tipo_usuario' style='width:195px' title='SELECCIONE DEPARTAMENTO'> <option value='0'>Seleccione...</option>";
                    while($fila3=$resultado_consulta_mysql=$conn->fetch_array($consulta_mysql2)){
                        echo "<option ";if($fila3['id']==$fila['id_tipo']){echo"selected='selected'";}; echo "value='".$fila3['id']."'>".$fila3['tipo_usuario']."</option>";
                    }
                    echo "</select>";
                      ?>
                      </div>
                </div>


              </div>

    <div class="submit"><input type="submit" value="Editar"/></div></form>
<p class="frmd"></p>
<!-- Stop Formoid form-->

<!-- Footer -->


