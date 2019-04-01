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
        $precioProductoM = $_POST['precioproducto'];
        $cantidad = $_POST['cantidadProducto'];

            $this->producto = new producto();
            $this->producto->insertarProducto(
                $nombre,
                $codigo,
                $colorIDproducto,
                $telaIDproducto,
                $proveedorIDProducto,
                $productoID,
                $categoriaIDproducto,
                $tallaproducto,
                $precioProductoM,
                $cantidad);
    }


    public function getProductosController()
    {
        $this->producto = new producto();
        return $this->producto->getProductos();
    }

    public function getCategoriaController($id)
    {
       $this->producto = new producto();
       return $this->producto->getCategoria($id);
    }

    
    public function editarProductoController($id,$nombre,$referencia,$precio,$talla)
    {
        $this->producto = new Producto();
        $this->producto->editarProducto($id,$nombre,$referencia,$precio,$talla);
    }

    public function getDatosProducto($id)
    {
        $this->producto = new Producto();
        return $this->producto->getDatos($id);
    }

    public function setProductoAdminController($ID,$nombre,$referencia,$color,$material,$proveedor,$articulo,$categoria,$talla,$precio)
    {
        $this->producto = new Producto();
        $this->producto->setProducto($ID,$nombre,$referencia,$color,$material,$proveedor,$articulo,$categoria,$talla,$precio);
    }

    public function cargarImagenProductoController($id)
    {
        $this->producto = new producto();
        $dato = $this->producto->cargarImagenProducto($id);
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
