<?php
session_start();
include("db_configuration.php");


require('./pdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(4, 10, '', 0);
$pdf->Image('logocabeza.jpg' , 10 ,9.5, 12 , 12,'jpg');
$pdf->Cell(10,8,'',0);
$pdf->Cell(150, 10, 'Foro Lolo S.L.', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(18);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'USUARIOS DE FORO LOLO', 0);
$pdf->Ln(13);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(45, 8, 'id_usuario', 1,0,"C");
$pdf->Cell(45, 8, 'nombre', 1,0,"C");
$pdf->Cell(45, 8, 'email', 1,0,"C");
$pdf->Cell(45, 8, 'nickusuario', 1,0,"C");
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA

 //CREATING THE CONNECTION
      $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
      //TESTING IF THE CONNECTION WAS RIGHT
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
$consulta = "SELECT * FROM USUARIOS";
$result = $connection->query($consulta);
$totalli = 0;
$total = 0;
while($fila = $result->fetch_object()){
	$pdf->Cell(45, 8,$fila->id_usuario, 1,0,"C");
	$pdf->Cell(45, 8,$fila->nombre,1,0,"C");
  $pdf->Cell(45, 8,$fila->email,1,0,"C");
  $pdf->Cell(45, 8,$fila->nickusuario,1,0,"C");
	$pdf->Ln(8);
}
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Output();
?>
