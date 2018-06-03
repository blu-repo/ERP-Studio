<?php


require_once('../DB/db.php');

class Venta{

  private $conectar;  


  /**
   * 
   */
  public function __CONTRUCT(){}

  /**
   * @$ID
   * Permite registrar una venta dentro de la BD
   */
  public function registrarVenta($ID , $referencia , $documento , $modopago)
  {
    $this->conectar = Conectar::conectarBD();
    

    if($this->existeCliente($documento , $this->conectar)==true){
      
      $ID_cliente = "SELECT id from cliente where documento='$documento'";
      $ID_producto = "SELECT id from producto where referencia='$referencia'";
      $detalle = "SELECT detalle.id,detalle.cantidad from producto inner join detalle on producto.id=detalle.producto_id where producto.referencia='$referencia'";
  
      $query_cliente = mysqli_query($this->conectar,$ID_cliente);
      $query_producto = mysqli_query($this->conectar,$ID_producto);
      $query_detalle = mysqli_query($this->conectar,$detalle);
        if($query_cliente==true && $query_producto==true && $query_detalle==true){
          if(mysqli_num_rows($query_cliente)>=1 && mysqli_num_rows($query_detalle)>=1 && mysqli_num_rows($query_producto)>=1){
            $cliente_ID = $this->getVector($query_cliente);
            $producto_ID  = $this->getVector($query_producto);
            $detalle_ID = $this->getVector($query_detalle);
            
              if($cliente_ID!=null && $producto_ID!=null && $detalle_ID!=null){
                $sql = "INSERT INTO compra 
                        (referencia,fecharegistro,cliente,empleado,modopago,detalle)
                        values('$referencia',NOW(),'$cliente_ID','$ID','$modopago','$detalle_ID')";

                $query_compra = mysqli_query($this->conectar,$sql);
  
                if($query_compra==true){
                  $this->actualizarDetalleProducto($producto_ID,$this->conectar);
                  echo "exitoso";
                }
              }
           }   
        }
    }
    else{
       echo "empleadonoregistrado";
    }
    
  }

  /**
   * Permite descontar la cantidad de productos vendidos
   */
  private function actualizarDetalleProducto($ID,$conexion)
  {
    $sql = "UPDATE detalle
    set cantidad=cantidad-1
    where detalle.producto_id='$ID'";

    $query = mysqli_query($conexion,$sql);

    if($query==true){
      return true;
    }
  }

  /**
   * @$query
   * Permite transformar una consulta a un Array()
   */
  private function getVector($query)
  {
    $vector = mysqli_fetch_array($query);
    if(empty($vector) || $vector==null)
    {
      return null;
    }
    return $vector[0];
  }

  /**
   * Permite verificar si existe un cliente en la base de datos
   */
  private function existeCliente($documento,$conexion)
  {
    $sql = "SELECT * from cliente where cliente.documento='$documento'";
    $query = mysqli_query($conexion,$sql);

    if($query==true){
      if(mysqli_num_rows($query)==1){
        return true;
      }
    }
    return false;
  }


  /**
   * Permite obtener la ultima venta registrada
   */
  public function getUltimaVenta()
  {
      $this->conectar = Conectar::conectarBD();
      $sql = "SELECT MAX(id) from compra";
      $query = mysqli_query($this->conectar,$sql);

      if($query==true){
          $compra = mysqli_fetch_array($query);
          $ID = $compra[0];
          return $ID;
      }
      else{
        return "nohayventas"; 
      }
    return 0;
  }


  /**
   * Permite obtener todos los modos de pago dentro de la BD
   */
  public function getModoPago()
  {
     $this->conectar = Conectar::conectarBD();
     $sql = "SELECT * from modopago";

     $query = mysqli_query($this->conectar,$sql);

     if($query==true){
       if(mysqli_num_rows($query) >= 1){
         return $query;
       }
     }
     else{
      return mysqli_error($this->conectar);
     }
  }

  /**
   * Permite traer los datos de las ventas realizados por un empleado
   */
  public function getVentasEmpleado($ID)
  {
     $this->conectar = Conectar::conectarBD();
     
     $sql="SELECT compra.id , detalle.precio, cliente.nombres, compra.fecharegistro 
          from empleado inner join compra on empleado.id=compra.empleado 
          inner join cliente on cliente.id=compra.cliente
          inner join detalle on detalle.id=compra.detalle
          inner join producto on detalle.producto_id=producto.id
          where empleado.id='$ID'";

      $query = mysqli_query($this->conectar,$sql);
      
      if($query==true){
        return $query;
      }
  }


}