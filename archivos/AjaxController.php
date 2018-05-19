<?php 


require_once('../controlador/clienteController.php');

if(isset($_POST) && $_POST['editar']==1){
  editarClienteBD();  
}
if(isset($_POST) && $_POST['editar']==2){
  eliminarCliente();
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




