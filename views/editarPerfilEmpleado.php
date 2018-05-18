
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
   <meta name="description" content="Flatfy Free Flat and Responsive HTML5 Template ">
   <meta name="author" content="">

 <title>Studio Princess</title>


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
       <a class="navbar-brand" href="panel_administrativo.php">S. Princes</a>
     </div>

     <div id="menu" class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
       <ul class="nav navbar-nav">

         <li class="menuItem"><a href="#whatis">Registros</a>
           <ul id="menuRegistro" style="display:none;">
             <li id="regClientelink"><a href="">Registro Cliente</a> </li>
             <li id="regEmpleadolink"><a href="">Registro empleado</a> </li>
             <li id="regProveedorlink"><a href="">Registro proveedor</a> </li>
             <li id="regProductolink"><a href="">Registro producto</a> </li>
           </ul>
         </li>

         <li class="menuItem"><a href="#useit">Clientes</a>
           <ul id="menuRegistro" style="display:none;">
             <li id="tablaClienteLink"><a href="">Listar clientes</a> </li>
             <li id="regEmpleadolink"><a href="">Registrar clientes</a> </li>
           </ul>
         </li>

         <li class="menuItem"><a href="#useit">Empleados</a>
           <ul id="menuRegistro" style="display:none;">
             <li id="tablaEmpleadoLink"><a href="">Listar empleados</a> </li>
             <li id="regEmpleadolink"><a href="">Registrar empleados</a> </li>
           </ul>
         </li>

         <li class="menuItem"><a href="#screen">Producto</a>
           <ul id="menuRegistro" style="display:none;">
             <li id="tablaProductolink"><a href="">Listar productos</a> </li>
             <li id="regEmpleadolink"><a href="">Registrar productos</a> </li>
           </ul>
         </li>

         <li class="menuItem"><a href="#contact">Usuario!</a>
         </li>
       </ul>
     </div>

   </div>
 </nav>

 <!-- What is -->
 <div id="whatis" class="content-section-b" >


 <?php require_once('formularios/formularios.php'); ?>
 <?php require_once('tablas/tablaCliente.php'); ?>
 <?php require_once('tablas/tablaEmpleado.php'); ?>
 <?php require_once('tablas/tablaProducto.php'); ?>
 <?php require_once('modalEditar/modalEditarCliente.php'); ?>
 <?php require_once('modalEditar/modalEditarEmpleado.php'); ?>
 <?php require_once('modalEliminar/modalEliminarCliente.php'); ?>
 <?php require_once('../controlador/empleadoController.php'); ?>
<?php $empleado = new empleadoController(); ?>
     <div id="admin" class="container">

       <div class="row">
         <?php require_once('formularios/edicionEmpleado.php'); ?>
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

 <!-- Credits -->
 <div id="credits" class="content-section-a" style="display:none;">
   <div class="container">
     <div class="row">

     <div class="col-md-6 col-md-offset-3 text-center wrap_title">
       <h2>Credits</h2>
       <p class="lead" style="margin-top:0">A special thanks to Death.</p>
      </div>

       <div class="col-sm-6  block wow bounceIn">
         <div class="row">
           <div class="col-md-4 box-icon rotate">
             <i class="fa fa-desktop fa-4x "> </i>
           </div>
           <div class="col-md-8 box-ct">
             <h3> Bootstrap </h3>
             <p> Lorem ipsum dolor sit ametconsectetur adipiscing elit. Suspendisse orci quam. </p>
           </div>
         </div>
       </div>
       <div class="col-sm-6 block wow bounceIn">
         <div class="row">
           <div class="col-md-4 box-icon rotate">
           <i class="fa fa-picture-o fa-4x "> </i>
           </div>
           <div class="col-md-8 box-ct">
           <h3> Owl-Carousel </h3>
           <p> Nullam mo  arcu ac molestie scelerisqu vulputate, molestie ligula gravida, tempus ipsum.</p>
           </div>
         </div>
       </div>
     </div>

     <div class="row tworow">
       <div class="col-sm-6  block wow bounceIn">
         <div class="row">
           <div class="col-md-4 box-icon rotate">
             <i class="fa fa-magic fa-4x "> </i>
           </div>
           <div class="col-md-8 box-ct">
             <h3> Codrops </h3>
             <p> Lorem ipsum dolor sit ametconsectetur adipiscing elit. Suspendisse orci quam. </p>
           </div>
         </div>
       </div>
       <div class="col-sm-6 block wow bounceIn">
         <div class="row">
           <div class="col-md-4 box-icon rotate">
           <i class="fa fa-heart fa-4x "> </i>
           </div>
           <div class="col-md-8 box-ct">
           <h3> Lorem Ipsum</h3>
           <p> Nullam mo  arcu ac molestie scelerisqu vulputate, molestie ligula gravida, tempus ipsum.</p>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>

 <!-- Banner Download -->
 <div id="downloadlink" class="banner" style="display:none;">
   <div class="container">
     <div class="row">
       <div class="col-md-6 col-md-offset-3 text-center wrap_title">
       <h2>Download Free</h2>
       <p class="lead" style="margin-top:0">Pay with a Tweet</p>
       <p><a class="btn btn-embossed btn-primary view" role="button">Free Download</a></p>
      </div>
     </div>
   </div>
 </div>

 <!-- Contact -->
 <div id="contact" class="content-section-a" style="display:none;">
   <div class="container">
     <div class="row">

     <div class="col-md-6 col-md-offset-3 text-center wrap_title">
       <h2>Contactanos</h2>
       <!-- <p class="lead" style="margin-top:0">A special thanks to Death.</p> -->
     </div>

     <form role="form" action="" method="post" >
       <div class="col-md-6">
         <div class="form-group">
           <label for="InputName">Tu nombre</label>
           <div class="input-group">
             <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Nombre" required>
             <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
           </div>
         </div>

         <div class="form-group">
           <label for="InputEmail">Tu Email</label>
           <div class="input-group">
             <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Correo electronico" required  >
             <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
           </div>
         </div>

         <div class="form-group">
           <label for="InputMessage">Mensaje</label>
           <div class="input-group">
             <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
             <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
           </div>
         </div>

         <input type="submit" name="submit" id="submit" value="Enviar" class="btn wow tada btn-embossed btn-primary pull-right">
       </div>
     </form>

     <hr class="featurette-divider hidden-lg">
       <div class="col-md-5 col-md-push-1 address">
         <address>
         <h3>Localizacion</h3>
         <p class="lead"><a href="https://www.google.com.co/maps/place/studio+princess,+C%C3%BAcuta,+Norte+de+Santander/@7.9052916,-72.4892246,17z/data=!4m13!1m7!3m6!1s0x8e664517a6671b25:0xf3836c60e472f42e!2sstudio+princess,+C%C3%BAcuta,+Norte+de+Santander!3b1!8m2!3d7.9052916!4d-72.4870359!3m4!1s0x8e664517a6671b25:0xf3836c60e472f42e!8m2!3d7.9052916!4d-72.4870359">Studio Princes<br>
         Cucuta - Norte de Santander</a><br>
         Phone: 301 123-4568<br>
         <!-- Fax: XXX-XXX-YYYY -->
         </p>
         </address>

         <h3>Social</h3>
         <li class="social">
         <a href="#"><i class="fa fa-facebook-square fa-size"> </i></a>
         <a href="#"><i class="fa  fa-twitter-square fa-size"> </i> </a>
         <a href="#"><i class="fa fa-google-plus-square fa-size"> </i></a>
         <a href="#"><i class="fa fa-flickr fa-size"> </i> </a>
         </li>
       </div>
     </div>
   </div>
 </div>



 <footer>
     <div class="container">
       <div class="row">
         <div class="col-md-7">
           <h3 class="footer-title">Boutique</h3>
           <p>Studio Princes 2018  <br/>
             Todos los derechos reservados<br/>
             <!-- Go to: <a  href="http://andreagalanti.it" target="_blank">andreagalanti.it</a> -->
           </p>

     <!-- LICENSE -->
     <!-- <a rel="cc:attributionURL" href="http://www.andreagalanti.it/flatfy"
      property="dc:title">Flatfy Theme </a> by
      <a rel="dc:creator" href="http://www.andreagalanti.it"
      property="cc:attributionName">Andrea Galanti</a>
      is licensed to the public under
      <BR>the <a rel="license"
      href="http://creativecommons.org/licenses/by-nc/3.0/it/deed.it">Creative
      Commons Attribution 3.0 License - NOT COMMERCIAL</a>.
       -->

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
