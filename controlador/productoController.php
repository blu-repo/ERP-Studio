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

        
        
        $this->producto = new producto();
        $this->producto->insertarProducto($nombre,$codigo,$colorIDproducto,$telaIDproducto,$proveedorIDProducto,$telaIDproducto,$categoriaIDproducto,$tallaproducto,$cantidadProductoM,$precioProductoM);
    }


    public function getProductos()
    {
        return 0;
    }


}

$class = new productoController();

if(isset($_POST['nombreproducto'])!=null && $_POST['codigoproducto']!=null && $_POST['colorIDproducto']!=null && $_POST['tallaproducto']!=null && $_POST['registroProdcutoH']==10){
    $class->insertarProductoController();
}
