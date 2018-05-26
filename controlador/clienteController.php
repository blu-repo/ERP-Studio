<?php 


require_once('../modelos/cliente.php');

class clienteController{


    private $cliente;
    private $nombres;
    private $apellidos;
    private $documento;
    private $direccion;
    private $telefono;
    private $correo;
    private $tipoCliente;


    public function __CONTRUCT()
    {
    }


    public function insertarClienteController()
    {
        $this->cliente = new cliente();

        $this->nombres = $_POST['primernombreCliente'] . ' ' . $_POST['segundonombreCliente'];
        $this->apellidos = $_POST['apellidosCliente'];
        $this->documento = $_POST['documentoCliente'];
        $this->direccion = $_POST['direccionCliente'];
        $this->telefono = $_POST['telefonoCliente'];
        $this->correo = $_POST['emailCliente'];
        $this->tipoCliente = $_POST['tipoCliente'];
        

        $this->cliente->insertarCliente($this->nombres , $this->apellidos , $this->documento , $this->direccion , $this->telefono, $this->correo, $this->tipoCliente);
    }

    public function getClientesController()
    {
        $this->cliente = new cliente();
        return $this->cliente->getClientes();
    }

    public function editarCliente($id,$nombres,$apellidos,$documento,$telefono,$email)
    {
        $this->cliente = new cliente();
        $this->cliente->editarCliente($id,$nombres,$apellidos,$documento,$telefono,$email);
    }

    public function eliminarClienteController($id)
    {
        $this->cliente = new cliente();
        $this->cliente->eliminarCliente();
    }

    public function validarDocumentoClienteController($cc)
    {
       $this->cliente= new cliente();
       $var = $this->cliente->validarDocumento($cc);

       if($var=='valido'){
           echo 'valido';
       }
       else{
           echo 'novalido';
       }
    }    
    
 
    
}

$clienteControlador = new clienteController();

if(isset($_POST['primernombreCliente'])!=null && $_POST['apellidosCliente']!=null && $_POST['documentoCliente']!=null && $_POST['telefonoCliente']!=null && $_POST['emailCliente']!=null && $_POST['tipoClienteRegistro']==2){
    $clienteControlador->insertarClienteController();
} 

