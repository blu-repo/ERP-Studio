<?php 
	session_start();
	error_reporting(0);

	$ID = $_SESSION['id'];
	if($ID==null || $ID=''){	
		header('location:../404.php');
		die();
	}

	require_once('../controlador/empleadoController.php');
	$empleadoController = new empleadoController
	();
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
	<!--[if IE 9]>
		<script src="js/PIE_IE9.js"></script>
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="js/PIE_IE678.js"></script>
	<![endif]-->

	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
	<![endif]-->

</head>

<body id="home">

	<!-- Preloader -->
	<div id="preloader">
		<div id="status"></div>
	</div>
	
	<?php $empleadoController->getMenu($_SESSION['id'],$_SESSION['rol']); ?>

	<!-- What is -->
	<div id="whatis" class="content-section-b" >

		
	<?php require_once('formularios/formularios.php'); ?>
	<?php require_once('tablas/tablaProducto.php'); ?>
  <?php require_once('modal/validarCC.php'); ?>
			
			<div id="admin" class="container">

			
			
			<div class="row">
        <?php require_once('formularios/formVentas.php'); ?>
			</div><!-- /.row -->
				
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
			</div>>
		</div>
	</div>	
	
	<footer>
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h3 class="footer-title">Boutique</h3>
            <p>Studio Princes 2018  <br/>
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
</body>

</html>
