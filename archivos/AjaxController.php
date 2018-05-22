<?php 


require_once('../controlador/clienteController.php');
require_once('../controlador/empleadoController.php');

if(isset($_POST) && $_POST['editar']==1){
  editarClienteBD();  
}
if(isset($_POST) && $_POST['editar']==2){
  eliminarCliente();
}
if(isset($_POST) && $_POST['editar']==3){
  editarEmpleadoEstudios($_POST['id'],$_POST['Instituto'],$_POST['titulo'],$_POST['salid']);
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




