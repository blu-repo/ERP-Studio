<?php 


require_once('../modelos/articulo.php');

class articuloController {
     

    private $nombre;
    private $descripcion;
    private $articulo;

    public function insertarArticuloController()
    {
        $this->nombre = $_POST['nombrearticuloM'];
        $this->descripcion = $_POST['descripcionarticuloM'];
        $this->articulo = new Articulo();

        $this->articulo->insertarTipoArticulo($this->nombre , $this->descripcion);
    }

}

$controlador = new articuloController();

if($_POST['nombrearticuloM'] != null && $_POST['aggArticulo']==2 && $_POST['descripcionarticuloM']!=null){
    $controlador->insertarArticuloController();
}

