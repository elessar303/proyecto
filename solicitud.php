   <!DOCTYPE HTML>
   <html>
<?php
if (stristr($_SERVER['PHP_SELF'],'clase_db.inc.php')) {	//  evita que el script sea llamado directamente por el cliente
    header('Location: ../index.php');          			//  enviandolo directamente al index 
    die();																//  Finaliza el script
}
   include '/include/clase_db_init.php';
   session_start();
   include 'cabecera.php';
   ?>


 
	<body class="homepage">
            <!-- Header -->
			<div id="header">
				<div class="container">
						
					<!-- Logo -->
						<h1><a href="#" id="logo">PDVAL</a></h1>
                                                <div id="menu"> 
                                                    <?php 
                                                    if(!empty($_SESSION['login1'])){
                                                        include 'menu.php';
                                                    }
                                                    ?>
					<!-- Nav -->
					
                                                </div>

					<!-- Banner -->
						<div id="banner">
							<div >
								<!--FORMULARIO--><?php
                                                                 include 'solicitud_usuario.php';
                                                                ?>
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