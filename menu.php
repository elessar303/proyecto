<nav id="nav">
							<ul>
                                                   <li><a href="empezar.php">Inicio</a></li>
								<li>
									<a href="">Soporte</a>
									
										<?php if( $_SESSION['tipo_usuario']!=2){
                                                                    ?>
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
						</nav>