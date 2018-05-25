<?php 


require_once('../controlador/clienteController.php');
require_once('../controlador/empleadoController.php');
require_once('../controlador/productoController.php');

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
    $producto = new productoController();
    $producto->editarProductoController($_POST['id'],
    $_POST['nombreProductoEditar'],
    $_POST['referenciaProductoEditar'],
    $_POST['precioProductoEditar'],
    $_POST['tallaProductoEditar']);
  }




