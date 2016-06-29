<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Solicitud </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script type="text/javascript">


function validacion() {
    valor = document.getElementById("solicitud").selectedIndex;

        if (valor==0 || valor>3) {
    // Si no se cumple la condicion...
    alert('[ERROR] El campo Tipo Solicitud debe tener un valor Valido...');
    return false;
  }
   valor1 = document.getElementById("estatus_solicitud").selectedIndex;
    if (valor1==0 || valor1>2) {
    // Si no se cumple la condicion...
    alert('[ERROR] El campo Estatus de Solicitud debe tener un valor Valido...');
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
      method="post" action="procesar_solicitud.php" name="solicitud1" id="solicitud1" onsubmit="return validacion()">

    <div >
        <p style="color: #3498DB;alignment-adjust: middle; margin-top: 10px;"><h3>Solicitud de Soporte</h3></p>
            <div class="item-cont">
                <div class="large">

                   <?php  // Consultar la base de datos
                   $conn=new MySQL();
                    $consulta_mysql=$conn->consulta('select * from descripcion_solicitud');



                    echo "<select  size='5' name='solicitud[]' id='solicitud' multiple> <option value='0' disabled>Tipo de Soporte...</option>";
                    while($fila=$resultado_consulta_mysql=$conn->fetch_array($consulta_mysql)){
                        echo "<option value='".$fila['tipo_solicitud']."'>".$fila['descripcion_solicitud']."</option>";
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
                   <div class="item-cont">
                <div class="large">
                    <select  size="1" name="estatus_solicitud" id="estatus_solicitud">
                <option value="0">Tipo de Estatus...</option>
		<option value="1">Normal</option>
		<option value="2">Urgente</option>

                    </select>
                </div></div></div>

    <div class="submit"><input type="submit" value="Enviar"/></div></form>
<p class="frmd"></p>
<!-- Stop Formoid form-->

<!-- Footer -->


