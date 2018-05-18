<?php 

require_once('../modelos/categoria.php');


class categoriaController {

    private $nombre;
    private $descripcion;
    private $categoria;

    public function insertarCategoriaController()
    {
        $this->categoria = new Categoria();

        $this->nombre = $_POST['nombrecategoriaM'];
        $this->descripcion = $_POST['descripcioncategoriaM'];

        $this->categoria->insertarCategoria($this->nombre , $this->descripcion);    
    }

}
$var = new categoriaController();
$var->insertarCategoriaController();



