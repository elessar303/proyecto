<link rel="stylesheet" type="text/css" href="css/tabla_solicitud.css" media="screen" />
<script language="javascript">
    var valor;
function Carga(valor1){
valor=valor1;
}

function modificar(valor2){
    window.location.href = "add_user.php?usuario="+valor2; 
}
</script>
<div class="datagrid"><table>
<thead>
  
 
     <tr><th>Login</th><th>Nombre</th><th>Apellido</th><th>Cedula</th><th>Clave</th><th>Departamento</th><th>Operaccion</th></tr>
  
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
$consulta=$estatus->consulta("select a.id, a.login, a.clave, a.nombres, a.apellidos, a.cedula, b.descripcion from usuarios as a, departamentos as b where a.cod_dep=b.id_departamento");

$contar=0;
if($_SESSION['departamento']!=0){
echo "<script language='javascript'> alert('No tiene Los Privilegios Para Ingresar a Este Sitio');"
    . " window.location.href = 'empezar.php';"
        . "</script>";
}

else{
    //es administrador
    
    
   
    
    
//"<form action='asignar_persona.php' method='POST'>";

    while($fila=$estatus->fetch_array($consulta)){
                      


                    if($contar%2==0)
            echo"            <tr>";else echo"<tr class='alt'>";
            
            echo"
        <td>".utf8_encode($fila['login'])."</td><td>".$fila['nombres']."</td><td>".$fila['apellidos']."</td><td>".$fila['cedula']."</td>"
                    . ""
                    . "<td>".$fila['clave']."</td><td>".$fila['descripcion']."</td>
                        
                    <td><button id=actuar nombre=actuar value=".$fila['id']." onclick='modificar(this.value)'>MODIFICAR</button>
                          
                    </td></tr>
                 ";       
                        
$contar++;} echo "</form>";
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
                    ?>

</tbody>
</table></div>
