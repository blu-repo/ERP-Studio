<?php 



require_once('../modelos/ventas.php');

class ventasController {

  private $venta;


  public function getUltimaVentaController()
  {
    $this->venta = new Venta();
    return $this->venta->getUltimaVenta();
  }

  public function getModoPagoController()
  {
    $this->venta = new Venta();
    return $this->venta->getModoPago();
  }

}