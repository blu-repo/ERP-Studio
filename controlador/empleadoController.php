<?php


require_once('../modelos/empleado.php');



class empleadoController {


    private $empleado;


    public function __CONSTRUCT()
    {
    }

    public function insertarEmpleadoController()
    {
        $this->empleado = new Empleado();
        $nombres = $_POST['primernombreEmpleado'].' ' .$_POST['segundonombreEmpleado'];
        $apellidos = $_POST['apellidosEmpleado'];
        $TipoDocumentoEmpleado = $_POST['TipoDocumentoEmpleado'];
        $documentoEmpleado = $_POST['documentoEmpleado'];
        $nacimientoEmpleado = $_POST['nacimientoEmpleado'];
        $direccionEmpleado = $_POST['direccionEmpleado'];
        $lugarnacimientoEmpleado = $_POST['lugarnacimientoEmpleado'];
        $expedocEmpleado = $_POST['expedocEmpleado'];
        $emailempleado = $_POST['emailempleado'];
        $nacionalidadEmpleado = $_POST['nacionalidadEmpleado'];
        $rol = $_POST['rolEmpleado'];

        $this->empleado->insertarEmpleado($nombres,$apellidos,$lugarnacimientoEmpleado,$TipoDocumentoEmpleado,$expedocEmpleado,$nacionalidadEmpleado,$direccionEmpleado,$emailempleado,$nacimientoEmpleado,$documentoEmpleado,$rol);
    }

    public function getEmpleados()
    {
        $this->empleado = new Empleado();

        return $this->empleado->getEmpleados();
    }


    public function getEmpleadoById($ID)
    {
      $this->empleado = new Empleado();
      $this->empleado->getEmpleadoById($ID);
    }

}

$controller = new empleadoController();
if(isset($_POST['primernombreEmpleado'])!=null && $_POST['registroEmpleadoH']==11){
    // echo "true";
    $controller->insertarEmpleadoController();
}



?>
