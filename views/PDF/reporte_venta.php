<?php

session_start();
if(!isset($_SESSION)){
  header('location:../index.php');
}

require_once('../../DB/db.php');
require_once('../../fpdf181/fpdf.php');



class PDF extends FPDF{

  function Footer()
    {
        $this->SetY(-40);
        $this->SetFont('Arial','I',8);
        // $this->Cell(0,10,'Universidad Francisco de Paula Santander','T',0,'L',$this->Image('../images/ufps.png',150,242,50));
        $this->ln(3);
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
      $this->SetFont('Arial','B',15);
      $this->Line(10,10,206,10);
      $this->Line(10,35.5,206,35.5);
      $this->Cell(30,25,'',0,0,'C');//,$this->Image('', 152,12,19));
      // $this->Cell(55,25,' Reporte General - Constructora',0,0,'R',$this->Image('../images/log.png',170,11,19));
      //$this->Cell(40,25,'',0,0,'C',$this->Image('images/logoDerecha.png', 175, 12, 19));
      //Se da un salto de línea de 25
      $this->Ln(25);
  }

  
  function get_content($datos,$ID)
  {  
    $this->SetFont('Arial','',12);  

    $this->Cell(40,5,'Codigo de venta :  '.$ID,0,1,'L');

    # Falta agregar los detalles de la venta
    while ($row = mysqli_fetch_row($datos)) {
      for ($i=0; $i <count($row) ; $i++) { 
        $this->MultiCell(0,5,$row[$i]);
      }
    }
  }

}

$conectar = Conectar::conectarBD();

$ID = $_GET['ventaID'];

$sql="SELECT detalle.precio, cliente.nombres, compra.fecharegistro , empleado.nombres, producto.nombre , producto.referencia , categoria.descripcion
      from empleado inner join compra on empleado.id=compra.empleado 
      inner join cliente on cliente.id=compra.cliente
      inner join detalle on detalle.id=compra.detalle
      inner join producto on detalle.producto_id=producto.id
      inner join categoria on producto.categoria=categoria.id
      where compra.id='$ID'";

$query = mysqli_query($conectar,$sql);

if($query==true){
  
  $PDF = new PDF();
  $PDF->AddPage('P','Letter');  
  $PDF->Cell(40,20,'Reporte General',0, 1 , ' L ');
  $PDF->setTitle('Reporte de venta # ' . $ID);
  $PDF->get_content($query,$ID);
  $PDF->Output();

}

