<?php

session_start();
// error_reporting(0);

  $ID = $_SESSION['id'];
  if($ID==null || $ID=''){	
    header('location:../404.php');
    die();
  }

  require_once('../../DB/db.php');
  require_once('../../fpdf181/fpdf.php');

class PDF extends FPDF{

  function Footer()
    {
        $this->SetY(-40);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'','T',0,'L',$this->Image('../../img/footer.jpg',170,245,30,25));
        $this->ln(4);
        $this->Cell(0,10,'Norte de Santander',0,'L');
        $this->ln(3);
        $this->Cell(0,10,'San Jose De Cucuta',0,'L');
        $this->ln(3);
        $this->Cell(0,10,'Studio Princess',0,'L');
        $this->ln(3);
        $this->Cell(0,10,date('Y'),0,'L');
        // $this->Cell(30,25,'',0,0,'R',$this->Image('../images/log.png',152,400,19));
    }

  function Header()
  {
    $this->SetFont('Arial','',15);
    $this->Line(10,10,206,10);
    $this->Cell(20,25,'Reporte General',0,0,'L');#,$this->Image('',170,11,19));
    $this->Ln(10);
    $this->SetFont('Arial','',11);
    $this->Cell(20,25,'A continuacion se dara un avance de todas las ventas realizadas',0,0,'L');#$this->Image('images/logoDerecha.png', 175, 12, 19));
    //Se da un salto de línea de 25
    $this->Ln(25);
  }

  
  function get_content($compras)
  {  
    $this->SetFont('Arial','',11);  
    // $this->Cell(0,10,'','T',0,'L',$this->Image('../../img/slide/m1.jpg',150,70,50));

    $this->Cell(40,5,'',0,1,'L'); 
    $this->ln(5);
    # Falta agregar los detalles de la venta
    $var = mysqli_fetch_assoc($compras);
    $total = $var['total'];
    $var=null;
    
    $this->Cell(40,5,'La suma total de todas las ventas realizadas es de: '. number_format($total),0,1,'L'); 
    $this->ln(10);
    $this->Cell(40,5,'la suma total es calculada apartir de los totales de cada venta realizada por un vendedor, ',0,1,'L'); 
    $this->Cell(40,5,'asi mismo, cada vendedor puede ver sus ventas realizadas en su panel de perfil, a continuacion',0,1,'L'); 
    $this->Cell(40,5,'se mostraran los detalles mas relevantes de las ventas tanto la cantidad de productos vendidos ',0,1,'L'); 
    $this->Cell(40,5,'como su nombre y su identificador.',0,1,'L'); 
    $this->ln(5);
  }

  function getDetalles($detalles)
  { 
    $this->SetFont('Arial','',11); 
    $this->Cell(40,5,'',0,1,'L'); 
    
    // var_dump($vectorDetalles);

    while ($row = mysqli_fetch_row($detalles)){
      $this->Cell(0,3,"Cantidad vendida: ".$row[0]. " Identificador: ".$row[1]." Nombre: ".$row[2],0,1,"L");
      $this->ln(3);
    }
    $this->ln(7);
    $this->Cell(40,5,'Los detalles mostrados son tomados de los registros que se encuentran en nuestra base de datos,',0,1,'L'); 
    $this->Cell(40,5,'descargue este informe para el cual sea su necesidad, ademas recuerde sus acciones se guardaran dentro de ',0,1,'L'); 
    $this->Cell(40,5,'nuestros registros.',0,1,'L'); 
  }

  function getFirma()
  {
    $this->ln(50);
    $this->SetFont('Arial','I',11);
    $this->Line(10,193,150,193);
    $this->Cell(40,5,'Gerente General ',0,1,"L");
    $this->Cell(40,5,'Dioselina Murillo',0,1,"L");
    $this->Cell(40,5,'C.C 50.102.153',0,1,"L");
    $this->Cell(40,5,date("Y-m-d"),0,1,"L");
  }

}

$conectar = Conectar::conectarBD();

  $sql = "SELECT 
              SUM(compra.preciototal) as total
              from compra";
  
  $sql2 = "SELECT SUM(detalle.cantidad), 
          detalle.producto_id,
          producto.nombre 
          from detalle inner join producto 
          on detalle.producto_id=producto.id 
          GROUP BY detalle.producto_id , producto.nombre";


  $query = mysqli_query($conectar,$sql);
  $query2 = mysqli_query($conectar,$sql2);
  

  if($query && $query2){
    $PDF = new PDF();
    $PDF->AddPage('P','Letter');  
    $PDF->setTitle('Reporte de las ventas');
    $PDF->get_content($query);
    $PDF->getDetalles($query2);
    $PDF->getFirma();
    $PDF->Output();
  }
    

  



