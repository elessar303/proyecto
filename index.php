<!DOCTYPE HTML>

<html>
    <?php
    include '/include/clase_db_init.php';
    $nombre="";$clave="";
    if(!empty($_POST['nombre'])){
    $nombre=$_POST['nombre'];
    }
      if(!empty($_POST['clave'])){
    $clave=$_POST['clave'];
    }
    $opcion="";
    if(!empty($_POST['opcion'])){
    $opcion=$_POST['opcion'];
    }
    $mensaje=""; 
    if($opcion==1){
    if(!empty($nombre) && !empty($clave) ){
 
        $conn_pdval = new MySQL();

$clave=  md5($clave);
     $sql="select * from usuarios where login='".$nombre."'";
    $consult=$conn_pdval->consulta($sql);
    $nrows=$conn_pdval->num_rows($consult);
    if($nrows>0){
       $sql="select login, nombres, cod_dep, id, id_tipo from usuarios where login='".$nombre."' and clave='".$clave."'"; 
        $consult=$conn_pdval->Consulta($sql);
    $nrows=$conn_pdval->num_rows($consult);
    if($nrows>0){
        session_start();
        $arre=$conn_pdval->fetch_array($consult);
         $_SESSION['login1']=$arre['login'];
        $_SESSION['nombre']=$arre['nombres'];
        $_SESSION['departamento']=$arre['cod_dep'];
       $_SESSION['id']=$arre['id'];
       $_SESSION['tipo_usuario']=$arre['id_tipo'];
        header("Location:empezar.php");
    }else{
        $mensaje="Error, Clave Incorrecta";
    }
        
        
    }else{
        $mensaje="Error, El Usuario No Existe";
    }
    
    }else{
        $mensaje="Por Favor LLenar los Campos";
    }
    }//fin de boton
    include 'cabecera.php';
    ?>
	
	<body class="homepage">

		<!-- Header -->
			<div id="header">
				<div class="container">
						
					<!-- Logo -->
						<h1><a href="#" id="logo">PDVAL</a></h1>
                                                <div id="menu"> 
					<!-- Nav -->
					
                                                </div>

					<!-- Banner -->
						<div id="banner">
							<div class="container">
								<section>
									<header class="major" >
										<h2><?php echo $mensaje;?></h2>
                                                                                <form action='index.php' method="post">
                                                                                    <table border="1" align="center">
                                                                                        <tr> 
                                                                                            <td align="center">USUARIO:</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                        <td align="center">
                                                                                            <input type="text" placeholder="LOGIN" id="nombre" name="nombre" required maxlength="35" size="20">
                                                                                        </td></tr>
                                                                                        <tr><td align="center">
                                                                                                CLAVE:</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td align="center">
                                                                                                <input type="password" placeholder="CLAVE" id="clave" name="clave" required maxlength="35" size="20">
                                                                                                <input type="hidden" name="opcion" value="1"/>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                    <button type="submit" class="button alt">Sign Up</button>
                                                                                </form>
									</header>
									
								</section>			
							</div>
						</div>

				</div>
			</div>

		<!-- Featured -->
			
		<!-- Main -->
			
		<!-- Footer -->
			<?php
                        include 'footer.php';
                        ?>
                       

	</body>
</html>