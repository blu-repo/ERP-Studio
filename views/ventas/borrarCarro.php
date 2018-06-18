<?php 

session_start();
if(!empty($_SESSION["cart"])){
  $cart = $_SESSION["cart"];
  echo count($cart);
  if(count($cart)==1)
  { 
    unset($_SESSION["cart"]); 
  }
  else{
		$newcart = array();
		foreach($cart as $c){
			if($c["id"]!=$_GET["id"]){
				$newcart[] = $c;
			}
		}
		$_SESSION["cart"] = $newcart;
	}
}

print " <script>  window.location='../panel_ventas.php';</script>";