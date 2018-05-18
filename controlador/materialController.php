<?php


require_once('../modelos/material.php');

class materialController {

    private $nombre;
    private $descripcion;
    private $material;
     
    public function insertarMaterialController()
    {
        $this->nombre = $_POST['nombrematerialM'];
        $this->descripcion = $_POST['descripcionmaterialM'];

        $this->material = new Material();

        $this->material->insertarMaterial($this->nombre , $this->descripcion);
    }
}

$controladorMaterial = new materialController();

if($_POST['nombrematerialM'] != null && $_POST['descripcionmaterialM'] != null && $_POST['aggMaterial']==1){
    $controladorMaterial->insertarMaterialController();
}

