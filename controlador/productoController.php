<?php


require_once('../modelos/producto.php');


class productoController {

    private $producto;

    public function __CONSTRUCT(){
    }


    public function insertarProductoController()
    {
        $nombre = $_POST['nombreproducto']; 
        $codigo = $_POST['codigoproducto'];
        $colorIDproducto = $_POST['colorIDproducto'];
        $telaIDproducto = $_POST['telaIDproducto'];
        $proveedorIDProducto = $_POST['proveedorIDProducto'];
        $productoID = $_POST['productoID'];
        $categoriaIDproducto = $_POST['categoriaIDproducto'];
        $tallaproducto = $_POST['tallaproducto'];
        $cantidadProductoM = $_POST['cantidadProductoM'];
        $precioProductoM = $_POST['precioProductoM'];
        $tallaProductoM = $_POST['tallaProductoM'];

        if(empty($cantidadProductoM) || $cantidadProductoM=='' || empty($tallaProductoM) || $tallaProductoM=='' || empty($precioProductoM) || $precioProductoM==''){
            echo "nodetalles";
            return;
        }else{
            $this->producto = new producto();
            $this->producto->insertarProducto($nombre,$codigo,$colorIDproducto,$telaIDproducto,$proveedorIDProducto,$telaIDproducto,$categoriaIDproducto,$tallaproducto,$cantidadProductoM,$precioProductoM);
        }
        
    }


    public function getProductosController()
    {
        $this->producto = new producto();
        return $this->producto->getProductos();
    }

    public function getCategoriaController($ID)
    {
       $this->producto = new producto();
       return $this->producto->getCategoria($ID);
    }

    
    public function editarProductoController($id,$nombre,$referencia,$precio,$talla)
    {
        $this->producto = new Producto();
        $this->producto->editarProducto($id,$nombre,$referencia,$precio,$talla);
    }

    public function getDatosProducto($ID)
    {
        $this->producto = new Producto();
        return $this->producto->getDatos($ID);
    }

    public function setProductoAdminController($ID,$nombre,$referencia,$color,$material,$proveedor,$articulo,$categoria,$talla,$precio)
    {
        $this->producto = new Producto();
        $this->producto->setProducto($ID,$nombre,$referencia,$color,$material,$proveedor,$articulo,$categoria,$talla,$precio);
    }

    public function cargarImagenProductoController($ID)
    {
        $this->producto = new producto();
        $dato = $this->producto->cargarImagenProducto($ID);
        if(strcmp($dato,'tope')==0){
            echo "tope";
        }else if(strcmp($dato,'true')==0){
            echo "true";
        }else if(strcmp($dato,'false')==0){
            echo "false";
        }

    }


}

$class = new productoController();

if(isset($_POST['nombreproducto'])!=null && $_POST['codigoproducto']!=null && $_POST['colorIDproducto']!=null && $_POST['tallaproducto']!=null && $_POST['registroProdcutoH']==10){
    $class->insertarProductoController();
}
