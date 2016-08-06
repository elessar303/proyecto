<link rel="stylesheet" type="text/css" href="css/tabla_solicitud.css" media="screen" />
<script language="javascript">
function modificar(valor2){
     
    var Id = $('#'+valor2).find(":selected").val();
            //$('option:selected', valor2).val();
 location.href = "calificar.php?id='"+valor2+"'&califica='"+Id+"'"; 
}
</script>
<div class="datagrid"><table>
<thead>
<tr><th colspan="7"><center>Mis Solicitudes</center></center></th></tr>
<tr><th>Departamento</th><th>Tipo de Soporte</th><th>Estatus</th><th>Solicitante</th><th>Asignado</th><th colspan="2">Calificar</th></tr>
</thead>
<tbody>
<?php
$estatus=new MySQL();
$sql="select a.id,b.descripcion, d.descripcion_solicitud, a.estatus, a.usuario, a.asignar_usuario, c.nombres, c.apellidos, e.descripcion_estatus, a.califica
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
echo"<td>".utf8_encode($fila['descripcion'])."</td><td>".$fila['descripcion_solicitud']."</td><td>".$fila['descripcion_estatus']."</td><td>".$fila['usuario']."</td><td>".$usuario_asign."</td><td id='".$fila['id']."'>";if($fila['califica']=="0"){echo "<select size='1' name=".$fila['id']." id=".$fila['id']."><option value='0' ";if($fila['califica']==0){echo "selected";}echo ">Sin Calificar</option><option value='1' ";if($fila['califica']==1){echo "selected";} echo ">Malo</option>"; echo "<option value='2' ";if($fila['califica']==2){echo "selected";}echo">Regular</option>";echo "<option value='3' ";if($fila['califica']==3){echo "selected";}echo">Bueno</option>";echo "</select>";}elseif($fila['califica']=="1"){ echo "MALO";}elseif($fila['califica']=="2"){ echo "REGULAR";}elseif($fila['califica']=="3"){ echo "BUENO";} echo"</td><td class='texto1'><input type='hidden' name=id_solicitud id=id_solicitud value='".$fila['id']."'>";if($fila['califica']==0){echo"<button id=actuar nombre=actuar value=".$fila['id']." onclick='modificar(this.value)'>MODIFICAR</button>";}echo "</td></tr>";
$contar++;}
?>
</tbody>
</table>
</div>