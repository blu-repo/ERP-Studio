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

  public function registraVentaController($ID ,$documento , $modopago)
  {
    $this->venta = new Venta();
    echo $this->venta->registrarVenta($ID , $documento , $modopago);
  }

  public function getVentasEmpleadoController($ID)
  {
    $this->venta=new Venta();
    return $this->venta->getVentasEmpleado($ID);
  }

  public function getTodasVentas()
  {
    $this->venta = new Venta();
    return $this->venta->getVentas();
  }

}