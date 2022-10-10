<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['idF'])){
    header("Location: index.php?erro=1");
    exit;
 }

$beneficiario = strtoupper($_GET["benef"]);
$descricao = $_GET["desc"];
$data = $_GET["data"];
$data = date("d-m-Y", strtotime($data));
$valor = $_GET["valor"];
$valor = number_format($valor, 2, ',', '.');
//echo $beneficiario." ".$descricao." ".$data." ".$valor;
// ==================================================================================
include ('class.ezpdf.php');
//include ('Cezpdf.php');
$pdf = new Cezpdf();
$pdf->selectFont('fonts/Helvetica.afm');
$pdf->ezStartPageNumbers(570,10,10,'','',1);
$pdf = new Cezpdf('a4','portrait');
$pdf -> ezSetMargins(50,70,50,50);
//include_once 'Cezpdf.php';
//$pdf = new CezPDF('a4');
$pdf->rectangle(50, 450, 500,300);
//===================================================================================

$pdf->addJpegFromFile('logo.png',45,60,60,60,"left");
$pdf->ezText("\n");$pdf->ezText("\n");$pdf->ezText("\n");

$pdf->ezText("<b>                       R E C I B O</b>",20,array('justification'=>'left'));// Define o texto do seu pdf, e o tamanho da fonte;

$pdf->ezText("<b>Data: </b>$data\n\n",14,array('justification'=>'right'));

$pdf->ezText("<b>      Recebi da GLOBAL o valor de R$ $valor, referente a:",14,array('justification'=>'left'));

$pdf->ezText("<b>      $descricao",14,array('justification'=>'left'));

//$pdf->ezText("<b>      Valor: </b>R$ $valor",14,array('justification'=>'left'));


$pdf->ezText("\n");

$pdf->ezText("\n");


$pdf->ezText("         ______________________________________________________",14);


$pdf->ezText("                  $beneficiario",14);



$pdf->ezStream();



?>