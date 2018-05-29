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

  public function registraVentaController($ID , $referencia , $documento , $modopago)
  {
    $this->venta = new Venta();
    $this->venta->registrarVenta($ID , $referencia , $documento , $modopago);
  }

}