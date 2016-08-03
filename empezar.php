   <!DOCTYPE HTML>
   <html>
<?php
if (stristr($_SERVER['PHP_SELF'],'clase_db.inc.php')) {	//  evita que el script sea llamado directamente por el cliente
    header('Location: ../index.php');          			//  enviandolo directamente al index 
    die();																//  Finaliza el script
}
session_start(); 
   include '/include/clase_db_init.php';
   
   include 'cabecera.php'; 
   ?>


 
	<body class="homepage">

		<!-- Header -->
			<div id="header">
				<div class="container">
						
					<!-- Logo -->
						<h1><a href="#" id="logo"></a></h1>
                                                <div id="menu"> 
                                                    <?php   
                                                    if(!empty($_SESSION['login1'])){
                                                    	?>
                                                    
                                                       <nav id="nav">
							<ul>
                                                   <li class="active"><a href="empezar.php">Inicio</a></li>
								<li>
									
									
										<?php if( $_SESSION['tipo_usuario']!=2){
                                                                    ?>
                                        <a href="">Soporte</a>
                                        <ul>
										<li><a href="solicitud.php">Registrar Solicitud</a></li>
										</ul>
										<?php } ?>
										
<!--										<li>
											<a href="">Phasellus consequat</a>
											<ul>
												<li><a href="#">Lorem ipsum dolor</a></li>
												<li><a href="#">Phasellus consequat</a></li>
												<li><a href="#">Magna phasellus</a></li>
												<li><a href="#">Etiam dolore nisl</a></li>
												<li><a href="#">Veroeros feugiat</a></li>
											</ul>
										</li>
										<li><a href="estatus_solicitud.php">Verificar Estatus de Solicitud</a></li>-->
									
								</li>    <?php if($_SESSION['departamento']<=5){
                                                                    ?>
								<li><a href="estatus_solicitud.php">Asignaciones</a></li>
                                                                  <?php } ?>
								<li><a href="reportes.php">Reportes</a></li>
																<?php if($_SESSION['departamento']==0){
                                                                    ?>
                                                                <li><a href="registrar.php">Usuarios</a></li>
                                                                <?php } ?>
                                                                <?php
                                                                if($_SESSION['departamento']==0){
                                                                    ?>
                                                                <li><a href="agregar.php">Agregar Usuario</a></li>
								
                                                                <?php } 
                                                                if($_SESSION['departamento']==0 || $_SESSION['departamento']==2 ){
                                                                ?>
                                                                <li><a href="tecnologia_estatus.php">Tecnologia Tareas</a></li>
                                                                        <?php } ?> 
                                                                <li><a href="cerrar.php">Cerrar Sesion</a></li>
                                                        </ul>
</nav>												<?php	
                                                    }
                                                    ?>
					<!-- Nav -->											
                                                </div>

					<!-- Banner -->
						<div id="banner">
							<div>
							<?php
							include "mis_solicitudes.php";
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