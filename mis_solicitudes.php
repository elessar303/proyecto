<link rel="stylesheet" type="text/css" href="css/tabla_solicitud.css" media="screen" />
<div class="datagrid"><table>
<thead>
<tr><th colspan="5"><center>Mis Solicitudes</center></center></th></tr>
<tr><th>Departamento</th><th>Tipo de Soporte</th><th>Estatus</th><th>Solicitante</th><th>Asignado</th></tr>
</thead>
<tbody>
<?php
$estatus=new MySQL();
$sql="select a.id,b.descripcion, d.descripcion_solicitud, a.estatus, a.usuario, a.asignar_usuario, c.nombres, c.apellidos, e.descripcion_estatus
from solicitudes as a,
departamentos as b,
usuarios as c,
descripcion_solicitud as d,
estatus as e
where a.tipo_solicitud=d.tipo_solicitud
and a.departamento=b.id_departamento
and c.id=a.asignar_usuario
and e.id_estatus=a.estatus
and a.id_usuario=".$_SESSION['id']."";
$consulta=$estatus->consulta($sql);
$contar=0;
while($fila=$estatus->fetch_array($consulta)){
	$usuario_asign=$fila['nombres']." ".$fila['apellidos'];
if($contar%2==0){echo"<tr>";}else{echo"<tr class='alt'>";}
echo"<td>".utf8_encode($fila['descripcion'])."</td><td>".$fila['descripcion_solicitud']."</td><td>".$fila['descripcion_estatus']."</td><td>".$fila['usuario']."</td><td>".$usuario_asign."</td></tr>";
$contar++;}
?>
</tbody>
</table>
</div>