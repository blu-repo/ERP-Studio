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
  public function registrarVenta($ID , $documento , $modopago)
  {
    try{

      $this->conectar = Conectar::conectarBD();
      session_start();

      if(!empty($_SESSION['cart'])):
        $productos = $_SESSION['cart'];
        $totalVenta = 0;
        $fecha = date("Y-m-d");
        
        $IDCLiente  =  $this->getClienteDocumento($documento,$this->conectar);

        if(strcmp($IDCLiente,'null')==0){
          return "errorCliente";
        }
        for ($i=0; $i <count($productos) ; $i++) { 
          $totalVenta+= (int) $productos[$i]["total"];
        }

        $prepareVenta = "INSERT INTO compra
                        (preciototal,fecharegistro,cliente,empleado,modopago)
                        values
                        (?,?,?,?,?)";
         
        $tablaCompra = $this->conectar->prepare($prepareVenta);
        $tablaCompra->bind_param("sssss",$totalVenta,$fecha,$IDCLiente,$ID,$modopago); 
        $tablaCompra->execute();

        if($tablaCompra->affected_rows === 0){
          return "noinserto";
        }
        else{
          $IDcompra = $this->conectar->insert_id;
          $tablaDetalles = $this->insertDetalles($IDcompra,$this->conectar,$productos);
          if(strcmp($tablaDetalles,'si')==0){
            unset($_SESSION['cart']);
            return "inserto";
          }
          else if(strcmp($tablaDetalles,'no')==0){
            return "nope";
          }
        }
      else:
        return "nocreada";  
      endif;  
      
    }catch(Exception $e)
    {
      return "null";
    }
  
  }

  private function insertDetalles($ID,$conexion,$productos)
  {
    try{

      $precio;
      $cantidad;
      $talla;
      $id;
      $cont = 0;
      // echo count($productos);

      for($i=0; $i<count($productos); $i++){

        $precio = $productos[$i]["precio"];
        $cantidad = $productos[$i]["cantidadCompra"];
        $talla = $productos[$i]["talla"];
        $id = $productos[$i]["id"];
        $fecha = date('Y-m-d');
        $cont = $cont +1;

        $sql = "INSERT INTO detalle
                (cantidad,precio,fecharegistro,talla,producto_id,compra_id)
                values
                (?,?,?,?,?,?)";
        $stm = $conexion->prepare($sql);
        $stm->bind_param('ssssss',$cantidad,$precio,$fecha,$talla,$id,$ID);
        $stm->execute();
      }
      
      if($cont==count($productos)){
        return "si";
      }else{
        return "no";
      }

    }catch(Exception $e){
      
    }
  }

  /**
   * Permite btener el ID de un cliente atravez de su documento
   */

  private function getClienteDocumento($doc,$conexion)
  {
    try{
      $sql ="SELECT id from cliente where cliente.documento=?";
      $cliente = $conexion->prepare($sql);
      $cliente->bind_param("s",$doc);
      $cliente->execute();

      $resultado = $cliente->get_result();

      if($resultado->num_rows===0)
        return "null";

      $vector = $resultado->fetch_assoc();

      $cliente->close();
      return $vector["id"];

    }catch(Exception $e){
      return "null";
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