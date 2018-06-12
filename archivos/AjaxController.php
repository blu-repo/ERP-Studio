<?php 


require_once('../controlador/clienteController.php');
require_once('../controlador/empleadoController.php');
require_once('../controlador/productoController.php');
require_once('../controlador/ventasController.php');
require_once('../controlador/proveedorController.php');


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
  echo uploadImagenPerfil();
}
if(isset($_POST) && $_POST['editar']==12){
  logOutEmpleado();
}
if(isset($_POST) && $_POST['editar']==13){
  logOutAdmin();
}
if(isset($_POST) && $_POST['editar']==14){
  editarProveedor();  
}
if(isset($_POST) && $_POST['editar']==15){
  editarContactoProveedor();  
}

if(isset($_POST) && $_POST['editar']==16){
  editarProductoAdmin();  
}
if(isset($_POST) && $_POST['editar']==17){
  uploadImagenProducto();  
}

  function uploadImagenProducto()
  {
    $producto = new productoController();
    $producto->cargarImagenProductoController($_POST['id']);
  }

  function editarProductoAdmin()
  {
    $producto = new productoController();
    $producto->setProductoAdminController($_POST['ideProductoEditarVal'],
    $_POST['nombreproductoEditar'],
    $_POST['codigoproductoEditar'],
    $_POST['colorIDproductoEditar'],
    $_POST['telaIDproductoEditar'],
    $_POST['proveedorIDProductoEditar'],
    $_POST['productoIDEditar'],
    $_POST['categoriaIDproductoEditar'],
    $_POST['tallaproductoEditar'],
    $_POST['precioproductoEditar']);
  }

  function editarContactoProveedor()
  {
    $proveedor  = new proveedorController();
    $proveedor->setContactoProveedorController($_POST['IDproveedorContacto'],
    $_POST['nombreContacto'],
    $_POST['documentoContacto'],
    $_POST['direccionContacto'],
    $_POST['telefonoContacto'],
    $_POST['emailContacto'],
    $_POST['accionContacto']);
  }

  function editarProveedor()
  {
    $proveedor = new proveedorController();
    $proveedor->setProveedorController($_POST['idproveedorEditar'],
    $_POST['nombreEmpresaProveedorEditar'],
    $_POST['nitProveedor'],
    $_POST['telefonoproveedor'],
    $_POST['emailempresa'],
    $_POST['direccionEmpresa']);
  }


  function logOutAdmin()
  {
    session_start();

    $var = $_POST['id'];

    if(empty($var) || $var==null){
      header('location:../404.php');
      die();
    }
    session_destroy();
    echo 'index';
  }

  function logOutEmpleado()
  {
    session_start();
    $var =  $_POST['id'];
    
    $sessio = $_SESSION['id'];
    if(empty($var) || $var==null){
      header('location:../404.php');
      die();
    }

    session_destroy();
    echo "index";
  }

  function uploadImagenPerfil()
  {
    $empleado = new empleadoController();
    return $empleado->uploadImagenPerfilEmpleadoController($_POST['id']);
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




