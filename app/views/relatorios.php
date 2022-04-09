<?php
require('../assets/lib/fpdf/fpdf.php');

$nome = "Hellod";

















$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,$nome);
$pdf->Output();
?>