<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
      
include 'src/Cezpdf.php';

class Creport extends Cezpdf
{
    public function __construct($p, $o)
    {
        parent::__construct($p, $o, 'none', array());
        $this->isUnicode = true;
        $this->allowedTags .= '|uline';
        // always embed the font for the time being
        //$this->embedFont = false;
    }
}
$pdf = new Creport('a4', 'landscape');
$pdf->ezStartPageNumbers(770,10,10,'','',1);
if (strpos(PHP_OS, 'WIN') !== false) {
    $pdf->tempPath = 'C:/temp';
}
$f = (isset($_GET['font'])) ? $_GET['font'] : 'FreeSerif';

$mainFont = $f;

$pdf->selectFont('Helvetica');
$ano = date("Y"); //$_SESSION['ano1']
$dia = date("d");
$mes = date("m"); //$_SESSION['mes1'];
if(isset($_SESSION['mesc'])){
      $mes = $_SESSION['mesc'];
      $ano = $_SESSION['anoc'];
  }
   if($mes == 1) $mesatual = "JANEIRO";
   if($mes == 2) $mesatual = "FEVEREIRO";
   if($mes == 3) $mesatual = "MARÇO";
   if($mes == 4) $mesatual = "ABRIL";
   if($mes == 5) $mesatual = "MAIO";
   if($mes == 6) $mesatual = "JUNHO";
   if($mes == 7) $mesatual = "JULHO";
   if($mes == 8) $mesatual = "AGOSTO";
   if($mes == 9) $mesatual = "SETEMBRO";
   if($mes == 10) $mesatual = "OUTUBRO";
   if($mes == 11) $mesatual = "NOVEMBRO";
   if($mes == 12) $mesatual = "DEZEMBRO";

$pdf->addJpegFromFile('imagens/logo.jpg',50,$pdf->y-20,100);
$pdf->ezText("<b>PRODUÇÃO DE $mesatual DE $ano</b>",14,array('justification'=>'center'));
$pdf->ezText("<b>ITAGUAÍ</b>",14,array('justification'=>'center'));
$pdf->ezText("\n");
// some general data used for table output
include "conexao.php";
$ano = date("Y"); //$_SESSION['ano1']
$dia = date("d");
$mes = date("m"); //$_SESSION['mes1'];
if(isset($_SESSION['mesc'])){
      $mes = $_SESSION['mesc'];
      $ano = $_SESSION['anoc'];
  }
$saldo = 0;  $con = 1;
//echo $dia." / ".$mes." / ".$ano;

$sql = "SELECT *, DATE_FORMAT(dataProposta,'%d/%m/%Y') as idataProposta, DATE_FORMAT(dataRecebimento,'%d/%m/%Y') as idataRecebimento, DATE_FORMAT(dataInstalacao,'%d/%m/%Y') as idataInstalacao FROM producao WHERE MONTH(dataProposta) = '$mes' AND YEAR(dataProposta) = '$ano' ORDER BY dataProposta DESC";
//WHERE MONTH(dataProposta) = '$mes'
$resultado = mysqli_query($conn,$sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado)) {
      
      $idProducao = $linha['idProducao'];
      $id = $linha['idConsultor']; 
      $associado = $linha['associado']; 
      $veiculo = $linha['veiculo'];
      $placa = $linha['placa']; 
      $dataProposta = $linha['idataProposta'];
      $dataRecebimento = $linha['idataRecebimento']; 
      $substituicao = $linha['substituicao']; 
      $migracao = $linha['migracao']; 
      $vistoria = $linha['vistoria'];
      $pendencia = $linha['pendencia']; 
      $obsProducao = $linha['obsprod']; 
      $rastreador = $linha['rastreador']; 
      $dataInstalacao = $linha['idataInstalacao']; 
      $localInstalacao = $linha['local']; 
      $equipamento = $linha['equipamento']; 
      $instalador = $linha['instalador'];
      $corte = $linha['corte']; 
      $ship = $linha['chip']; 
      $obsInstalacao = $linha['obsinst'];
   
   $sql1 = "SELECT * FROM consultor WHERE idConsultor = '$id'";
   $resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
   while ($linha1 = mysqli_fetch_array($resultado1)) {
       $consultor1 = $linha1['nome'];
       $equipe1 = $linha1['equipe'];
       $regional1 = $linha1['regional'];
   
//echo $id." ".$consultor1." ".$associado." ".$equipe1." ".$reginal1." ".$dataProposta;
   
  if ($con % 2 == 0)
     $bgcolor = "bgcolor='#FFFFFF'";
  else
     $bgcolor = "bgcolor='#FFFFCC'";

if($regional1 == 'ITAGUAÍ'){
$data[] = array('Nº'=>$con ,'Consultor'=>$consultor1,'Regional'=>$regional1,'Associado'=>$associado,'Veículo'=>$veiculo,'Placa'=>$placa,'Proposta'=>$dataProposta,'Recebido'=>$Receb,'Rastr'=>$rastreador,'Instal'=>$dataInstalacao);
$con=$con+1;
}}}

$pdf->ezTable($data,$cols,'',array('xPos'=>25,'xOrientation'=>'right','width'=>550,'cols'=>array('Nº'=>array('width'=>50),'Consultor'=>array('width'=>120),'Regional'=>array('width'=>90),'Associado'=>array('width'=>120),'Veículo'=>array('width'=>90),'Placa'=>array('width'=>65),'Proposta'=>array('width'=>65),'Recebido'=>array('width'=>65),'Rastr'=>array('width'=>65),'Instal'=>array('width'=>65))));


$pdf->ezStream();
?>