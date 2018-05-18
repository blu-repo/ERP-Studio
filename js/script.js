/*
Theme: Flatfy Theme
Author: Andrea Galanti
Bootstrap Version 
Build: 1.0
http://www.andreagalanti.it
*/

$(window).load(function() { 
	//Preloader 
	$('#status').delay(300).fadeOut(); 
	$('#preloader').delay(300).fadeOut('slow');
	$('body').delay(550).css({'overflow':'visible'});
})

$(document).ready(function() {
		//animated logo
		$(".navbar-brand").hover(function () {
			$(this).toggleClass("animated shake");
		});
		
		//animated scroll_arrow
		$(".img_scroll").hover(function () {
			$(this).toggleClass("animated infinite bounce");
		});
		
		//Wow Animation DISABLE FOR ANIMATION MOBILE/TABLET
		wow = new WOW(
		{
			mobile: false
		});
		wow.init();
		
		//MagnificPopup
		$('.image-link').magnificPopup({type:'image'});


		// OwlCarousel N1
		$("#owl-demo").owlCarousel({
			autoPlay: 3000,
			items : 3,
			itemsDesktop : [1199,3],
			itemsDesktopSmall : [979,3]
		});

		// OwlCarousel N2
		$("#owl-demo-1").owlCarousel({
			  navigation : false, // Show next and prev buttons
			  slideSpeed : 300,
			  paginationSpeed : 400,
			  singleItem:true
		});

		//SmothScroll
		$('a[href*=#]').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
			&& location.hostname == this.hostname) {
					var $target = $(this.hash);
					$target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
					if ($target.length) {
							var targetOffset = $target.offset().top;
							$('html,body').animate({scrollTop: targetOffset}, 600);
							return false;
					}
			}
		});
		
		//Subscribe
		new UIMorphingButton( document.querySelector( '.morph-button' ) );
		// for demo purposes only
		[].slice.call( document.querySelectorAll( 'form button' ) ).forEach( function( bttn ) { 
			bttn.addEventListener( 'click', function( ev ) { ev.preventDefault(); } );
		} );



		$menu = $('#menu').find('ul').find('li');
		
	    $menu.hover(function() {

			$(this).children('ul').stop();
			$(this).children('ul').slideDown();

			}, function() {

			$(this).children('ul').stop();
			$(this).children('ul').slideUp();
		});

		// Script de formularios

		$('#regClientelink').on('click',function(){
				event.preventDefault();
			$('#whatis').find('#regCliente').css('display','block');

			$('#whatis').find('#regProducto').css('display','none');
			$('#whatis').find('#regEmpleado').css('display','none');
			$('#whatis').find('#regProveedor').css('display','none');
			
			$('#whatis').find('#admin').css('display','none');

			$('#whatis').find('#tablaEmpleado').css('display' , 'none');
			$('#whatis').find('#tablaCliente').css('display' , 'none');
			$('#whatis').find('#tablaProducto').css('display' , 'none');
			
		});

		$('#regProductolink').on('click',function(){
			event.preventDefault();
		$('#whatis').find('#regProducto').css('display','block');

		$('#whatis').find('#regProveedor').css('display','none');	
		$('#whatis').find('#regEmpleado').css('display','none');	
		$('#whatis').find('#regCliente').css('display','none');

		$('#whatis').find('#admin').css('display','none');

		
		$('#whatis').find('#tablaEmpleados').css('display' , 'none');
		$('#whatis').find('#tablaCliente').css('display' , 'none');
		$('#whatis').find('#tablaProducto').css('display' , 'none');
		
	    });

		
		$('#regEmpleadolink').on('click',function(){ 
			event.preventDefault();
		$('#whatis').find('#regEmpleado').css('display','block');

		$('#whatis').find('#regProveedor').css('display','none');
		$('#whatis').find('#regProducto').css('display','none');
		$('#whatis').find('#regCliente').css('display','none');

		$('#whatis').find('#admin').css('display','none');

		
		$('#whatis').find('#tablaEmpleados').css('display' , 'none');
		$('#whatis').find('#tablaCliente').css('display' , 'none');
		$('#whatis').find('#tablaProducto').css('display' , 'none');
		
		});
		
		
		$('#regProveedorlink').on('click',function(){
			event.preventDefault();
			$('#whatis').find('#regProveedor').css('display','block');

			$('#whatis').find('#regEmpleado').css('display','none');	
			$('#whatis').find('#regCliente').css('display','none');
			$('#whatis').find('#regProducto').css('display','none');	

			$('#whatis').find('#admin').css('display','none');

			$('#whatis').find('#tablaEmpleados').css('display' , 'none');
			$('#whatis').find('#tablaCliente').css('display' , 'none');
			$('#whatis').find('#tablaProducto').css('display' , 'none');
		
		});
	


		// Script de tablas

		$('#tablaEmpleadoLink').on('click',function(){
			event.preventDefault();
			$('#whatis').find('#tablaEmpleados').css('display','block');

			$('#whatis').find('#admin').css('display','none');
			$('#whatis').find('#tablaCliente').css('display' , 'none');
			$('#whatis').find('#tablaProducto').css('display' , 'none');

			$('#whatis').find('#regProducto').css('display','none');
			$('#whatis').find('#regEmpleado').css('display','none');
			$('#whatis').find('#regProveedor').css('display','none');
			$('#whatis').find('#regCliente').css('display','none');
		});


		$('#tablaClienteLink').on('click',function()
		{	
			event.preventDefault();
			
			$('#whatis').find('#tablaCliente').css('display' , 'block');

			$('#whatis').find('#tablaEmpleados').css('display' , 'none');
			$('#whatis').find('#tablaProducto').css('display' , 'none');

			$('#whatis').find('#admin').css('display','none');

			$('#whatis').find('#regProducto').css('display','none');
			$('#whatis').find('#regEmpleado').css('display','none');
			$('#whatis').find('#regProveedor').css('display','none');
			$('#whatis').find('#regCliente').css('display','none');
		});


		$('#tablaProductolink').on('click',function()
		{
				event.preventDefault();

				$('#whatis').find('#tablaProducto').css('display' , 'block');

				$('#whatis').find('#tablaEmpleados').css('display' , 'none');
				$('#whatis').find('#tablaCliente').css('display' , 'none');
				$('#whatis').find('#admin').css('display','none');

				$('#whatis').find('#regProducto').css('display','none');
				$('#whatis').find('#regEmpleado').css('display','none');
				$('#whatis').find('#regProveedor').css('display','none');
				$('#whatis').find('#regCliente').css('display','none');

		});




});

