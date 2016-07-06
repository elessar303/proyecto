<?php
require_once 'dompdf/dompdf_config.inc.php';
include 'include/clase_db_init.php';
$conn=new MySQL();
$sql="select * from solicitudes a, descripcion_solicitud b, departamentos c, usuarios d where a.tipo_solicitud=b.id and a.departamento=c.id_departamento and a.asignar_usuario=d.id and a.id=".$_GET['reg']."";
$consulta=$conn->consulta($sql);
while($fila=$conn->fetch_array($consulta)){
$gerencia=utf8_encode($fila['descripcion']);
$empleado=utf8_encode($fila['usuario']);
$solicitud=utf8_encode($fila['descripcion_solicitud']);
$nombre=utf8_encode($fila['nombres']);
$apellido=utf8_encode($fila['apellidos']);
$direccion=utf8_encode($fila['direccion']);
$tlfn=utf8_encode($fila['telefono']);
}
$fecha=date("d-m-Y");
$html='
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
.page { page-break-before:always; }
</style>
<title>Actividades Realizadas a Usuarios</title>
</head>
<body>

<!-- Pagina 1 del PDF-->
<div class="page-first">

<table width=100% cellspacing=15>
<tr>
<td ><img src="images/logo_pdval.jpeg" height="80" width="120"> </td>
<td> </td>
<td align="right"><img src="images/logo_min.png" height="80" width="80"> </td>
</tr>
</table>

<table width=100% cellspacing=15>
<tr>
<td width=20%>Fecha: '.$fecha.'</td>
<td width=80%>Gerencia/Empleado: '.$gerencia.'/'.$empleado.'<br> Direccion: '.$direccion.'<br> Telefono: '.$tlfn.'</td>
</tr>
</table>

<table width=100% cellspacing=15>
<tr>
<td colspan="3" align="center">
<b>Actividades Realizadas al Usuario</b>
</td>
</tr>
<tr>
<td colspan="3" align="center">
'.$solicitud.'
</td>
</tr>

<tr>
<td colspan="3">
Observaciones:_________________________________________________________________<br>
_____________________________________________________________________________<br>
______________________________________________________________________________
</td>
</tr>
<tr>
<td width=30% align="center">Usuario Atendido</td>
<td width=40%></td>
<td width=30% align="center">Analista de Soporte</td>
</tr>
<tr>
<td width=30% align="center">___________________</td>
<td width=40%></td>
<td width=30% align="center">___________________</td>
</tr>
<tr>
<td width=30% align="center">'.$empleado.'</td>
<td width=40%></td>
<td width=30% align="center">'.$nombre.'<br>'.$apellido.'</td>
</tr>
</table>
</div>
</body>
</html>
';
$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
# Instanciamos un objeto de la clase DOMPDF.
$mipdf = new DOMPDF();

# Definimos el tamaño y orientación del papel que queremos.
# O por defecto cogerá el que está en el fichero de configuración.
$mipdf ->set_paper("letter", "portrait");

# Cargamos el contenido HTML.
$mipdf ->load_html(utf8_decode($html));

# Renderizamos el documento PDF.
$mipdf ->render();

# Enviamos el fichero PDF al navegador.
$mipdf ->stream('Planilla.pdf');
?>