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
      
      $_SESSION['cart'] = array (array(
        "id"=>$ref[0],
        "referencia"=>$ref[1],
        "precio"=>$ref[2],
        "cantidadCompra"=>$cantidadSeleccionada,
        "total"=> ( (int) $ref[2] * (int) $cantidadSeleccionada),
        "talla"=> $ref[4]
      ));
      
    }
    else{
      $compra = $_SESSION['cart'];
      $repetido = false;
      if($repetido){
        print "<script>alert('Error: Producto Repetido!');</script>";
      }
      else{
          array_push($compra, array(
          "id"=>$ref[0],
          "referencia"=>$ref[1],
          "precio"=>$ref[2],
          "cantidadCompra"=>$cantidadSeleccionada,
          "total"=> ( (int) $ref[2] * (int) $cantidadSeleccionada ),
          "talla"=> $ref[4]
        ));
        $_SESSION['cart'] = $compra;
        
      }
    }

    print " <script>
            window.location='../panel_ventas.php';
            </script>";
    
    
  endif;  
}