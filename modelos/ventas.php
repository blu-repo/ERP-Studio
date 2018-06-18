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

      session_start();
      
      if(!empty($_SESSION['cart'])):
        $this->conectar = Conectar::conectarBD();
        $productos = $_SESSION['cart'];
        $totalVenta = 0;
        $fecha = date("Y-m-d");
        
        
        $IDCLiente  =  $this->getClienteDocumento($documento,$this->conectar);
        $IDEmpleado = $this->getIDEmpleado($ID,$this->conectar);
        if(strcmp($IDCLiente,'null')==0){
          return "errorCliente";
        }
        for ($i=0; $i <count($productos) ; $i++){ 
          $totalVenta+= (int) $productos[$i]["total"];
        }
        echo $ID . '-'. $documento. "-".$modopago."-".$totalVenta . "-" . $IDCLiente . "-".$IDEmpleado;

        $prepareVenta = "INSERT INTO compra
                        (preciototal,fecharegistro,cliente,empleado,modopago)
                        values
                        (?,?,?,?,?)";
         
        $tablaCompra = $this->conectar->prepare($prepareVenta);
        $tablaCompra->bind_param("sssss",$totalVenta,$fecha,$IDCLiente,$IDEmpleado,$modopago); 
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

  /**
   * Permite insertar los detalles de cada venta
   */

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
   * Permite obtener el ID de un empleado apartir de su ID de usuario
   */

   private function getIDEmpleado($ID,$conexion)
   {
      $sql = "SELECT id from empleado
              where empleado.usuario=?";
      
      $stm = $conexion->prepare($sql);
      $stm->bind_param('s',$ID);
      $stm->execute();
      $resultado = $stm->get_result();
      if($resultado->num_rows===0 || $resultado->num_rows>1)
        return "null";
      
      $vector = $resultado->fetch_assoc();
      $stm->close();
      return $vector["id"];

        
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
    $IDEmpleado  = $this->getIDEmpleado($ID,$this->conectar);

    $sql = "SELECT compra.id as ID,
          compra.preciototal as total,
          compra.fecharegistro as fecha,
          cliente.nombres as nombre
          from compra inner join cliente
          on compra.cliente = cliente.id
          where compra.empleado=?";
    
    $stm = $this->conectar->prepare($sql);
    $stm->bind_param("s",$IDEmpleado);
    $stm->execute();

    $resultado = $stm->get_result();

    if($resultado->num_rows===0)
      return "null";
    
    $stm->close();
    return $resultado;
     
  }


}