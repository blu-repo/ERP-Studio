<?php 
	session_start();
	error_reporting(0);

	$ID = $_SESSION['id'];
	if($ID==null || $ID=''){	
		header('location:../404.php');
		die();
	}			 
?>
 <!DOCTYPE html>
 <html> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Flatfy Free Flat and Responsive HTML5 Template ">
    <meta name="author" content="">

	<title>Studio Princess		</title>
	

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
 
    <!-- Custom Google Web Font -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
	
    <!-- Custom CSS-->
    <link href="../css/general.css" rel="stylesheet">
	
	 <!-- Owl-Carousel -->
    <link href="../css/custom.css" rel="stylesheet">
	  <link href="../css/owl.carousel.css" rel="stylesheet">
    <link href="../css/owl.theme.css" rel="stylesheet">
	  <link href="../css/style.css" rel="stylesheet">
	  <link href="../css/animate.css" rel="stylesheet">
	
	<!-- Magnific Popup core CSS file -->
	<link rel="stylesheet" href="../css/magnific-popup.css"> 
	
	<script src="../js/modernizr-2.8.3.min.js"></script>  <!-- Modernizr /-->

</head>

<body id="home">

	<!-- Preloader -->
	<div id="preloader">
		<div id="status"></div>
	</div>
	
	
	
	<!-- NavBar-->
	<nav class="navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="panel_empleado.php">S. Princes</a>
			</div>

			<div id="menu" class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					
					<li class="menuItem"><a href="#whatis">Ventas</a>
 						<ul id="menuRegistro" style="display:none;">
 							<li id="regClientelink"><a href="">Registro Cliente</a> </li>
							<li id=""><a href="panel_ventas.php">Registro Venta</a> </li>
							<li id=""><a href="mis_ventas.php">Mis ventas</a> </li>
							<li><a href="" data-toggle="modal" data-target="#modal_validarCC">Validar Cedula</a> </li>
						</ul>	
					</li>

					<li class="menuItem"><a href="#screen">Producto</a>
						<ul id="menuRegistro" style="display:none;">
 							<li id="tablaProductolink"><a href="">Reportar Producto</a> </li>
							<li id="regEmpleadolink"><a href="">Listar productos</a> </li>	
						</ul>	
					</li>
					
					<li class="menuItem"><a href="#contact">Usuario!</a>
            <ul id="menuUsuario" style="display:none;">
              <li id="email"><?php echo $_SESSION['email'];  ?></li>
              <form action="" method="post">
                <input type="hidden" id="idEmpleadoLogin" name="idEmpleadoLogin" value="<?php echo $_SESSION['id']; ?>">
                <li id="perfil"><a href="miperfil.php">Mi perfil</a></li>
              </form>
              <li id="">Salir</li>
            </ul>
					</li>
				</ul>
			</div>
		   
		</div>
	</nav> 

      
    <?php require_once('formularios/formularios.php'); ?>
    <?php require_once('tablas/tablaProducto.php'); ?>
    <?php require_once('modal/validarCC.php'); ?>
    <?php require_once('modal/modal_success.php'); ?>
    <?php require_once('modal/modal_error.php'); ?>
    <?php require_once('../controlador/empleadoController.php'); ?>
    <?php $controller = new empleadoController(); ?>
    <?php $perfil = $controller->getEmpleadoByIdController($_SESSION['id']); ?>
    <?php $img = $controller->getImagenEmpleadoController($_SESSION['id']); ?>
	<!-- What is -->
	<div id="whatis" class="content-section-b">
			<div id="admin" class="container">
			 
			<div class="row">
				<?php if($perfil!=='null'){ 
					#var_dump($perfil); ?>
					<?php $rol = $controller->getRolController($perfil['usuario']); ?>
				
			 	<div class="col-sm-4 pull-right wow fadeInRightBig">
          <img class="img-responsive " src="../img/ipad.png" alt="">
        </div>
				
				<div class="col-sm-6 wow fadeInLeftBig"  data-animation-delay="200">   
          <h3 class="section-heading"><?php echo $perfil["nombres"] ." ". $perfil['apellidos']; ?></h3>
        	<div class="sub-title lead3"><?php echo $perfil['lugarnacimiento'] . " ". $perfil['nacionalidad']; ?><br>  </div>
          	<p class="lead">
							Fecha Registro: <?php echo $perfil['fecharegistro']; ?>
							<br>
							Tu rol: <?php echo $rol["rol"]; ?><br>
							Estado: <?php if(strcmp($perfil['estado'],'0')==0) {echo "Activo";}
								 			else{ echo "Inactivo"; } ?><br>
							Direccion: <?php echo $perfil['direccion'] ."<br> Email: ".$perfil['correo']; ?><br>
							Documento: <?php echo $perfil['documento']; ?><br>
							Fecha de nacimiento: <?php echo $perfil['fechanacimiento']; ?><br>
          	</p>

						<form enctype="multipart/form-data" method="post" id="formSubir">
  						<label for="imagen">Imagen:</label>
  						<input id="imagen" name="imagen" size="30" type="file"/>
							<input type="hidden" name="id_emp" id="id_emp" value="<?php echo $_SESSION['id'];?>"/>
  						<input type="submit" class="btn btn-info"value="Cargar imagen de Perfil"/>
						</form>
					</div> 
			</div>
			<!-- /.row -->
		<?php }else{
			echo "<h3 class='section-heading'>No se encontraron Resultados</h3> <br> <h4 class='section-heading'>Contacta con el Administrador</h4> <br>";
		} ?>
				
			<div class="row tworow">
			
				
			</div><!-- /.row -->
			

		</div>
	</div>

	<div  class="content-section-c " style="display:none;">
		<div class="container">
			<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center white">
				<h2>Get Live Updates</h2>
				<p class="lead" style="margin-top:0">A special thanks to Death.</p>
			 </div>
			<div class="col-md-6 col-md-offset-3 text-center">
				<div class="mockup-content">
						<div class="morph-button wow pulse morph-button-inflow morph-button-inflow-1">
							<button type="button "><span>Subscribe to our Newsletter</span></button>
							<div class="morph-content">
								<div>
									<div class="content-style-form content-style-form-4 ">
										<h2 class="morph-clone">Subscribe to our Newsletter</h2>
										<form>
											<p><label>Your Email Address</label><input type="text"/></p>
											<p><button>Subscribe me</button></p>
										</form>
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>	
			</div>
		</div>
	</div>	
	

	
	
	
		
	
	<footer>
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h3 class="footer-title">Boutique</h3>
            <p>Studio Princes <?php echo date('Y');	?>  <br/>
              Todos los derechos reservados<br/>
            </p>
			
          </div> <!-- /col-xs-7 -->

          <div class="col-md-5">
            <div class="footer-banner">
              <h3 class="footer-title">Studio Princes</h3>
              <ul>
                <li>Contactanos si tienes alguna duda</li>
                <li>Visualiza nuestra galeria</li>
                <li>Muchos diseños a tu alcance</li>
                <li>Visita nuestra tienda fisica</li>
              </ul>
              Visitanos: <a href="http://www.studioprinces.com" target="_blank">studioprincess.com</a>
            </div>
          </div>
        </div>
      </div>
    </footer>

	

  
    <!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>
	<script src="../js/owl.carousel.js"></script>
	<script src="../js/script.js"></script>
	<!-- StikyMenu -->
	<script src="../js/stickUp.min.js"></script>
	<script type="text/javascript">
	  jQuery(function($) {
		$(document).ready( function() {
		  $('.navbar-default').stickUp();
		  
		});
	  });
	  
	</script>
	<!-- Smoothscroll -->
	<script type="text/javascript" src="../js/jquery.corner.js"></script> 
	<script src="../js/wow.min.js"></script>
	<script>
	 new WOW().init();
	</script>
	<script src="../js/classie.js"></script>
	<script src="../js/uiMorphingButton_inflow.js"></script>
	<!-- Magnific Popup core JS file -->
	<script src="../js/jquery.magnific-popup.js"></script> 
	<script type="text/javascript" src="../js/jquery.validate.js"></script> 
	<script src="../js/app.js"></script> 
	<!-- <script type="text/javascript" src="../js/imgSubmit.js"></script>] -->

</body>

</html>
