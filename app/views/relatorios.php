<?php
define ('FPDF_FONTPATH','font/');
require('../assets/lib/fpdf/fpdf.php');

$pdf = new FPDF ();
$pdf -> AddPage('L');
$pdf -> SetFont('Arial','B',20,'C');
$pdf -> Cell(270, 20,utf8_decode('Relatório Geral de Visitas'),0,0,"C");
$pdf-> Ln(30);

$pdo = new PDO ('mysql:host=localhost; dbname=elephant_edu','root','');
$sql = $pdo->prepare("SELECT * FROM visitas");
$sql->execute();

/*
$pdo2 = new PDO ('mysql:host=localhost; dbname=elephant_edu','root','');
$sql2 = $pdo2->prepare("SELECT * FROM usuarios");
$sql2->execute();
*/

$pdf->SetFillColor(211,211,211);
$pdf -> SetFont('Arial','I',10);
$pdf-> Cell(45,14,'Professor',1,0,'C',TRUE);
$pdf-> Cell(45,14,'Telefone',1,0,'C',TRUE);
$pdf-> Cell(45,14,'Quantidade de Alunos',1,0,'C',TRUE);
$pdf-> Cell(50,14,utf8_decode('Conteúdo'),1,0,'C',TRUE);
$pdf-> Cell(45,14,'Data da visita',1,0,'C',TRUE);
$pdf-> Cell(45,14,'Criado em',1,0,'C',TRUE);
$pdf->Ln();

foreach($sql as $resultado){
    $pdf->Cell(45,14, utf8_decode($resultado['professor']),1,0,'C');
    $pdf->Cell(45,14,$resultado['telefone'],1,0,'C');
    $pdf->Cell(45,14,$resultado['qtd_alunos'],1,0,'C');
    $pdf->Cell(50,14,utf8_decode($resultado['conteudo']),1,0,'C');
    $pdf->Cell(45,14,$resultado['data_visita'],1,0,'C');
    $pdf->Cell(45,14,$resultado['criado_em'],1,0,'C');
    $pdf->Ln();
}
/* Para exibir os dados da tabela usuarios
foreach($sql2 as $resultado2){
    $pdf->Cell(45,14, utf8_decode($resultado2['nome']),1,0,'C');
}
*/

$pdf->OutPut();