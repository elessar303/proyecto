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
	<?php if(!empty($_SESSION['nombre'])){?>
	<h1 style="color:white;">Usuario: <?php echo $_SESSION['nombre']." ".$_SESSION['apellidos'] ?> - Departamento: <?php echo $_SESSION['nombre_dep']?></h1>
	<div style="background-color:white" onmouseover="this.bgColor='white'" width="100%" align="center"><img src="images/banner.png" alt="PDVAL"></div>
	<div style="background-color:white" onmouseover="this.bgColor='white'" width="100%" align="center"><img src="images/line.png" width="100%"></div>
	<?php } ?>