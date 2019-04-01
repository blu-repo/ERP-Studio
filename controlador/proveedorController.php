<?php 


require_once('../modelos/proveedor.php');
class proveedorController {

    private $nombre_empresa;
    private $direccionEmpresa;
    private $telefonoEmpresa;
    private $emailEmpresa;
		private $NIT;
		private $proveedor;


		public function __CONSTRUCT()
		{
		}

		public function insertarProveedor()
		{

			$this->proveedor = new proveedor();

			$this->nombre_empresa = $_POST['nombreEmpresaProveedor'];
			$this->NIT  =  $_POST['nitProveedor'];
			$this->telefonoEmpresa = $_POST['telefonoproveedor'];
			$this->emailEmpresa = $_POST['emailempresa'];
			$this->direccioEmpresa = $_POST['direccionEmpresa'];

			$this->proveedor->insertarProveedor($this->nombre_empresa ,$this->direccioEmpresa,$this->telefonoEmpresa,$this->emailEmpresa,$this->NIT);
		}

		public function getProveedoresController()
		{
			$this->proveedor = new proveedor();
			return $this->proveedor->getProveedores();
		}

		public function getProveedorController($id)
		{
			$this->proveedor = new proveedor();
			return $this->proveedor->getProveedorDatos($id);
		}

		public function getContactoProveedorController($id)
		{
			$this->proveedor = new proveedor();
			return $this->proveedor->getContactoProveedor($id);
		}

		public function setProveedorController($id,$nombre,$nit,$telefono,$email,$direccion)
		{
			$this->proveedor = new proveedor();
			$this->proveedor->setProveedor($id,$nombre,$nit,$telefono,$email,$direccion);
		}

		public function setContactoProveedorController($id,$nombre,$documento,$direccion,$telefono,$email,$accion)
		{
			$this->proveedor = new proveedor();
			$this->proveedor->setContactoProveedor($id,$nombre,$documento,$direccion,$telefono,$email,$accion);
		}

}

$ObjetoProveedor = new proveedorController();

if(isset($_POST['nombreEmpresaProveedor'])!=null && $_POST['nitProveedor']!=null && $_POST['telefonoproveedor']!=null && $_POST['emailempresa']!=null && $_POST['registroProveedorEmpresa']==3)
{
	$ObjetoProveedor->insertarProveedor();
}
