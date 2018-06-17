<?php 


session_start();
if(!empty($_POST)){
  if(isset($_POST['referenciaProductoVenta']) && isset($_POST['cantidadProductoVenta'])):
    $partir = $_POST['referenciaProductoVenta'];
    $cantidadSeleccionada = $_POST['cantidadProductoVenta'];

    echo $partir;
    $ref = explode("-",$partir);
    if($cantidadSeleccionada > $ref[3]){
      print " <script>
                window.location='../panel_ventas.php';
              </script>";
    }  
    if(empty($_SESSION['cart'])){
      $_SESSION['cart'] = array(
        "id"=>$ref[0],
        "referencia"=>$ref[1],
        "precio"=>$ref[2],
        "cantidadCompra"=>$ref[3],
        "total"=> ( (int) $ref[2] * (int) $cantidadSeleccionada)
      );
    }
    else{
      $compra = $_SESSION['cart'];
      array_push($compra, array(
        "id"=>$ref[0],
        "referencia"=>$ref[1],
        "precio"=>$ref[2],
        "cantidadCompra"=>$ref[3],
        "total"=> ( (int) $ref[2] * (int) $cantidadSeleccionada )
      ));
      $_SESSION['cart'] = $compra;
    }

    var_dump($_SESSION['cart']);
    
  endif;  
}