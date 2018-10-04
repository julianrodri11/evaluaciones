<?php

include_once('lib/Conexion.php');
$conexion = new Conexion();
include_once('fpdf181/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	// Logo
	//$this->Image('logo_pb.png',10,8,33);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Movernos a la derecha
	$this->Cell(80);
	// Título
	$this->Cell(30,10,'Reporte de estudiantes segun el nivel despues de realizar su prueba',1,0,'C');
	// Salto de línea
	$this->Ln(20);
}

// Pie de página
function Footer()
{
	// Posición: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Número de página
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
/*for($i=1;$i<=40;$i++)
	$pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);*/
	$sql="select usuario, sum(total) total FROM notas group by usuario;";
	$consulta=mysqli_query($conexion,$sql);        
	 while($filas=mysqli_fetch_assoc($consulta))
	 {  
//		echo   $d_area=$filas['nivel']; 
	 	if($filas['total']>0 and $filas['total']<=50)
	 	{
	 		$ubicacion="Nivel Bajo";
	 	}else if($filas['total']>50 and $filas['total']<=150)
	 	{
	 		$ubicacion="Nivel Medio";
	 	}


		$pdf->Cell(0,10,$filas['usuario']."--".$filas['total'].$ubicacion,0,1);
	  
	}
	
$pdf->Output();








?>

