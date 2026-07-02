<?php

require_once "../fpdf/fpdf.php";
require_once "../model/Alumni.php";

$model = new Alumni();
$data = $model->tampil();

$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);

$pdf->Cell(
190,
10,
'LAPORAN DATA ALUMNI',
0,
1,
'C'
);

$pdf->Ln(5);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(10,10,'No',1);
$pdf->Cell(35,10,'NIM',1);
$pdf->Cell(55,10,'Nama',1);
$pdf->Cell(45,10,'Prodi',1);
$pdf->Cell(45,10,'Status',1);

$pdf->Ln();

$pdf->SetFont('Arial','',10);

$no=1;

while($row=mysqli_fetch_assoc($data))
{

$pdf->Cell(10,8,$no++,1);

$pdf->Cell(35,8,$row['nim'],1);

$pdf->Cell(55,8,$row['nama'],1);

$pdf->Cell(45,8,$row['prodi'],1);

$pdf->Cell(45,8,$row['status'],1);

$pdf->Ln();

}

$pdf->Output();