<link rel="stylesheet" type="text/css" href="css/tabla_solicitud.css" media="screen" />
<script language="javascript">
    var valor;
function Carga(valor1){
valor=valor1;
}

function modificar(valor2){
    window.location.href = "asignar_persona.php?resp_asig="+valor+"&id_solicitud="+valor2+"";
}
</script>
<div class="datagrid"><table>
<thead>
   <?php
   if($_SESSION['departamento']>5){
   ?>
    <tr><th>Departamento</th><th>Tipo de Soporte</th><th>Estatus</th><th>Solicitante</th><th>Asignado</th></tr>
    <?php
   }else{
       ?>
     <tr><th>Departamento</th><th>Tipo de Soporte</th><th>Estatus</th><th>Solicitante</th><th>Asignado</th><th>Imprimir</th></tr>
     <?php
   }
   ?>
</thead>
<tfoot>
    <tr><td colspan="5">
            <div id="paging">
    <!--<ul><li><a href="#"><span>Previous</span></a></li>
 <li><a href="#" class="active"><span>1</span></a></li>
 <li><a href="#"><span>2</span></a></li>
 <li><a href="#"><span>3</span></a></li>
 <li><a href="#"><span>4</span></a></li>
 <li><a href="#"><span>5</span></a></li>
 <li><a href="#"><span>Next</span></a></li></ul>
    -->        </div>

    </tr></tfoot>
<tbody>
<?php
$estatus=new MySQL();//"select * from solicitudes as a, departamentos as b, usuarios as c,descripcion_solicitud as d where a.tipo_solicitud=d.tipo_solicitud and a.departamento=b.id_departamento "
$sql="select a.id,b.descripcion, d.descripcion_solicitud, a.estatus, a.usuario, a.asignar_usuario
from solicitudes as a,
departamentos as b,
descripcion_solicitud as d
where a.tipo_solicitud=d.tipo_solicitud
and a.departamento=b.id_departamento";
if($_SESSION['tipo_usuario']>0){
    $sql.=" and a.asignar_usuario=".$_SESSION['id']."";
}
$consulta=$estatus->consulta($sql);

$contar=0;
if($_SESSION['departamento']>5){
while($fila=$estatus->fetch_array($consulta)){
                       if($fila['estatus']==1){
                           $estatus1='NORMAL';
}else{
    $estatus1='URGENTE';
}
if($fila['asignar_usuario']==0){
    $usuario_asign='Sin Asignar';
}else{
     $query2=$estatus->consulta("select nombres, apellidos from usuarios where id='".$fila['asignar_usuario']."'");
    $result_q=$estatus->fetch_array($query2);
     $usuario_asign=$result_q['nombres']." ".$result_q['apellidos'];
   // $usuario_asign=$fila['asignar_usuario'];
}
                    if($contar%2==0)
            echo"            <tr>";else echo"<tr class='alt'>";
            echo"
        <td>".utf8_encode($fila['descripcion'])."</td><td>".$fila['descripcion_solicitud']."</td><td>".$estatus1."</td><td>".$fila['usuario']."</td><td>".$usuario_asign."</td></tr>
                 ";

$contar++;}
}
else{
    //es administrador





//"<form action='asignar_persona.php' method='POST'>";

    while($fila=$estatus->fetch_array($consulta)){
                       if($fila['estatus']==1){
                           $estatus1='NORMAL';
}else{
    $estatus1='URGENTE';
}

if($fila['asignar_usuario']==0){
     $query=$estatus->consulta("select id, nombres, apellidos from usuarios where cod_dep in ('0','2') ");
    $usuario_asign="<select name='resp_asig' id='resp_asig' size=1 onChange='Carga(this.value)';><option value=''>Seleccione...</option>";
    while($asig=$estatus->fetch_array($query)){
        $usuario_asign.="<option value='".$asig['id']."'>".$asig['nombres']." ".$asig['apellidos']."</option>";
    }
    $usuario_asign.="</select>";
}else{
     $query2=$estatus->consulta("select nombres, apellidos from usuarios where id='".$fila['asignar_usuario']."'");
    $result_q=$estatus->fetch_array($query2);
     $usuario_asign=$result_q['nombres']." ".$result_q['apellidos'];
}
                    if($contar%2==0)
            echo"            <tr>";else echo"<tr class='alt'>";

            echo"
        <td>".utf8_encode($fila['descripcion'])."</td><td>".$fila['descripcion_solicitud']."</td><td>".$estatus1."</td><td>".$fila['usuario']."</td>"
                    . ""
                    . "<td>".$usuario_asign."</td>

                    
                    <td>
                    ";
                    if($fila['asignar_usuario']!=0){
                    echo "<a href='imprimir_solicitud.php?reg=".$fila['id']."' title='Imprimir Registro'>Imprimir Planilla</a>";
                    }
                    echo"
                    </td>
                    </tr>
                 ";

$contar++;} echo "</form>";

















}
                    ?>
<!--<tr>
        <td>data</td><td>data</td><td>data</td><td>data</td></tr>
<tr class="alt"><td>data</td><td>data</td><td>data</td><td>data</td></tr>
<tr><td>data</td><td>data</td><td>data</td><td>data</td></tr>
<tr class="alt"><td>data</td><td>data</td><td>data</td><td>data</td></tr>
<tr><td>data</td><td>data</td><td>data</td><td>data</td></tr>-->
</tbody>
</table></div>
