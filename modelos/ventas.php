<?php


require_once('../DB/db.php');

class Venta{

  private $conectar;  


  /**
   * 
   */
  public function __CONTRUCT(){}

  /**
   * Permite registrar una venta dentro de la BD
   */
  public function registrarVenta()
  {
    # code...
  }


  /**
   * Permite obtener la ultima venta registrada
   */
  public function getUltimaVenta()
  {
      $this->conectar = Conectar::conectarBD();
      $sql = "SELECT MAX(compra.id) from compra";
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






}