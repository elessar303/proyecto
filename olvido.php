<!DOCTYPE HTML>

<html>
    <?php
    include '/include/clase_db_init.php';
    $clave="";
      if(!empty($_POST['cedula'])){
    $clave=$_POST['cedula'];
    }
    $opcion="";
    if(!empty($_POST['opcion'])){
    $opcion=$_POST['opcion'];
    }
    $mensaje=""; 
    if($opcion==1){
    if(!empty($clave) ){
 
        $conn_pdval = new MySQL();

$cedula=$clave;
$clave= md5($clave);
     $sql="select * from usuarios where cedula=".$cedula."";
    $consult=$conn_pdval->consulta($sql);
    $nrows=$conn_pdval->num_rows($consult);
    if($nrows>0){
        $conn=new MySQL();
        $sql="UPDATE usuarios SET clave='".$clave."' WHERE cedula=".$cedula."";  
        $consult=$conn->consulta($sql);
        echo "<script type='text/javascript'>"
        . "alert('Contraseña Recuperada!');"
              . "document.location.href='index.php';"
            ."</script>";
    }else{
        $mensaje="";
        echo "<script type='text/javascript'>"
        . "alert('Error, El Usuario No Existe');"
              . "document.location.href='olvido.php';"
            ."</script>";
    }
    
    }else{
        echo "<script type='text/javascript'>"
        . "alert('Por Favor LLenar los Campos');"
              . "document.location.href='index.php';"
            ."</script>";
    }
    }//fin de boton

    ?>
	      <head>
        <title>PDVAL</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.dropotron.min.js"></script>
        <script src="js/skel.min.js"></script>
        <script src="js/skel-layers.min.js"></script>
        <script src="js/init.js"></script>
        <noscript>
            <link rel="stylesheet" href="css/skel.css" />
            <link rel="stylesheet" href="css/style.css" />
        </noscript>
        <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
    </head> 
	<body bgcolor="white">
			<div style="background-color:white;">


										
        <center><img src="images/logogobierno.png" align="center"></center>
        <div style="background-color:white;background: url(images/logousuario.png) no-repeat;background-position:center;width:1024px;height:700px;margin:0 auto;" align="center"><form action='olvido.php' method="post">
                                                                                    <table>
                                                                                    <br>
                                                                                    <br>
                                                                                    <br>
                                                                                    <br>
                                                                                    <br>
                                                                                    <br>
                                                                                    <br>
                                                                                    <br>
                                                                                    <br>
                                                                                    <br>
                                                                                        <tr> 
                                                                                            <td align="center">CEDULA:</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                        <td align="center">
                                                                                            <input type="text" placeholder="CEDULA" id="cedula" name="cedula" required maxlength="35" size="20">
                                                                                            <input type="hidden" name="opcion" value="1"/>
                                                                                        </td></tr>
                                                                                        <!--<tr><td align="center">
                                                                                                CLAVE:</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td align="center">
                                                                                                <input type="password" placeholder="CLAVE" id="clave" name="clave" required maxlength="35" size="20">
                                                                                                
                                                                                            </td>
                                                                                        </tr>-->
                                                                                    </table>
                                                                                    <button type="submit" class="button alt">RECUPERAR</button>
                                                                                    <br>
                                                                                    <br>
                                                                                    <a href="index.php">Regresar</a>
                                                                                </form>  </div>
                                                                                

									
	

			</div>

		<!-- Featured -->
			
		<!-- Main -->
			
		<!-- Footer -->
			<?php
                        include 'footer.php';
                        ?>
                       

	</body>
</html>