<?php 


require_once('../controlador/clienteController.php');
require_once('../controlador/empleadoController.php');
require_once('../controlador/productoController.php');
require_once('../controlador/ventasController.php');


if(isset($_POST) && $_POST['editar']==1){
  editarClienteBD();  
}

if(isset($_POST) && $_POST['editar']==2){
  eliminarCliente();
}

if(isset($_POST) && $_POST['editar']==3){
  editarEmpleadoEstudios($_POST['id'],$_POST['Instituto'],$_POST['titulo'],$_POST['salid']);
}

if(isset($_POST) && $_POST['editar']==4){
  editarEmpleadoExamenes();
}
if(isset($_POST) && $_POST['editar']==5){
  actualizarPensionController($_POST['id_empleado'],$_POST['id']);
}
if(isset($_POST) && $_POST['editar']==6){
  editarEmpleadoDatos();
}
if(isset($_POST) && $_POST['editar']==7){
  editarProducto();
}
if(isset($_POST) && $_POST['editar']==8){
  loginEmpleado();
}

if(isset($_POST) && $_POST['editar']==9){
  validarDocumentoCliente();
}

if(isset($_POST) && $_POST['editar']==10){
  registrarVenta();
}
if(isset($_POST) && $_POST['editar']==11){
  uploadImagenPerfil();
}

  function uploadImagenPerfil()
  {
    $nombre_img = $_FILES['imagen']['name'];
$tipo = $_FILES['imagen']['type'];
$tamano = $_FILES['imagen']['size'];
 
//Si existe imagen y tiene un tamaño correcto
if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 200000)) 
{
   //indicamos los formatos que permitimos subir a nuestro servidor
   if (($_FILES["imagen"]["type"] == "image/gif")
   || ($_FILES["imagen"]["type"] == "image/jpeg")
   || ($_FILES["imagen"]["type"] == "image/jpg")
   || ($_FILES["imagen"]["type"] == "image/png"))
   {
      // Ruta donde se guardarán las imágenes que subamos
      $directorio = $_SERVER['DOCUMENT_ROOT'].'/modelo/ERP-Studio/img/upload/';
      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
      echo $directorio."".$nombre_img;
      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
      // header('location:../views/miperfil.php');
    } 
    else 
    {
       //si no cumple con el formato
       echo "No se puede subir una imagen con ese formato ";
    }
} 
else 
{
   //si existe la variable pero se pasa del tamaño permitido
   if($nombre_img == !NULL) echo "La imagen es demasiado grande "; 
}

  }

  function registrarVenta()
  {
     $venta = new ventasController();
     $venta->registraVentaController($_POST['idEmpleadoVenta'],
     $_POST['referenciaProductoCompra'],
     $_POST['documentoEmpleadoVenta'],
     $_POST['modopago']);
  }

  function validarDocumentoCliente()
  { 
     $cliente = new clienteController();
     $cliente->validarDocumentoClienteController($_POST['cc']);
  }

  function loginEmpleado()
  {
    $empleado = new empleadoController();
    $empleado->loginEmpleadoController($_POST['email'],$_POST['pass']);
  }

  function editarClienteBD()
  {
    $cliente = new clienteController();
    $cliente->editarCliente($_POST['id'],$_POST['primerNombreClienteED'],$_POST['apellidosClienteED'],$_POST['documentoClienteED'],$_POST['telefonoClienteED'],$_POST['emailClienteED']);  
  }

  function eliminarCliente()
  {
    $cliente = new clienteController();
    $cliente->eliminarClienteController($_POST['id']);
  }  

  function editarEmpleadoEstudios($id,$instituto,$titulo,$fecha)
  {
     $empleado = new empleadoController();
     $empleado->editarEmpleadoEstudiosController($id,$instituto,$titulo,$fecha);
  }

  function editarEmpleadoExamenes()
  {
    $empleado = new empleadoController();
    $empleado->editarEmpleadoExamenes($_POST['id'],$_POST['entidadmedica'],$_POST['dictamen'],$_POST['fecharealizacionExamen'],$_POST['telefonoEntidad'],$_POST['direccionEntidad'],$_POST['observacionExamen']);
  }

  function actualizarPensionController($id_empleado , $id_empresa)
  {
    $empleado = new empleadoController();
    $empleado->actualizarPensionController($id_empleado,$id_empresa);
  }

  function editarEmpleadoDatos()
  {
    $empleado = new empleadoController();
    $empleado->editarEmpleadoController($_POST['id'],
    $_POST['nombresEmpleadoEditar'],
    $_POST['apellidosEmpleadoEditar'],
    $_POST['documentoEmpleadoEdicion'],
    $_POST['direccionEmpleadoEditar'],
    $_POST['lugarnacimientoEmpleadoEditar'],
    $_POST['emailempleadoEditar'],
    $_POST['nacimientoEmpleadoEditar']);
  }

  function editarProducto()
  {
    $producto = new ventaController();
    $producto->editarventaController($_POST['id'],
    $_POST['nombreProductoEditar'],
    $_POST['referenciaProductoEditar'],
    $_POST['precioProductoEditar'],
    $_POST['tallaProductoEditar']);
  }




