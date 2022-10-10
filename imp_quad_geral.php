<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
unset( $_SESSION['mesc'] );
unset( $_SESSION['anoc'] );      
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
$pdf = new Creport('a4', 'portrait');
$pdf->ezStartPageNumbers(550,10,10,'','',1);
//$pdf->ezSetMargins(20, 20, 200, 20);
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
  else{

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
$pdf->ezText("<b>QUADRO DE $mesatual DE $ano</b>",14,array('justification'=>'center'));
$pdf->ezText("<b>TODAS AS EQUIPES</b>",14,array('justification'=>'center'));
$pdf->ezText("\n");
// some general data used for table output
include "conexao.php";

$saldo = 0;  $con = 1;
//echo $dia." / ".$mes." / ".$ano;

$sql1 = "SELECT * FROM consultor WHERE  status = 'Ativo' ORDER By nome";
$resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
while ($linha1 = mysqli_fetch_array($resultado1)) {
       $id = $linha1['idConsultor'];
       $id2 = str_pad( $id, 4, '0', STR_PAD_LEFT);
       $consultor1 = $linha1['nome'];
       $equipe1 = $linha1['equipe'];
       $regional1 = $linha1['regional'];
        $sub = 0;
//echo $consultor1."  ".$equipe1."  ".$regional1."<br >";

$sql = "SELECT idConsultor, count(idConsultor) as cons FROM producao WHERE idConsultor='$id' AND MONTH(dataProposta) = '$mes'";
// AND WHERE MONTH(dataProposta) = '$mes'
$resultado = mysqli_query($conn,$sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado)) {
  $contcons = $linha['cons'];
  $id3 = $linha['idConsultor'];
  // echo "Consultor: ".$contcons."<br />";
}
$sql2 = "SELECT substituicao FROM producao WHERE idConsultor='$id3' AND MONTH(dataProposta) = '$mes'";
$resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
while ($linha2 = mysqli_fetch_array($resultado2)) {
  $subst = $linha2['substituicao'];
  //$dataCadastro = $linha['idatacad'];
  if($subst == "Sim")
       $sub = $sub + 1;
}
  //echo "Substituições: ".$sub."<br />";

  $normal = $contcons - $sub;

  //echo "Normais: ".$normal."<br />";

  if ($con % 2 == 0)
     $bgcolor = "bgcolor='#FFFFFF'";
  else
     $bgcolor = "bgcolor='#FFFFCC'";


if($equipe1 == "ÁGUIA"){
  $totag = $totag + $normal;
  $data[] = array('Cod. Consultor'=>$id2,'Consultor'=>$consultor1,'Normal'=>$normal,'Substituição'=>$sub,'Total'=>$contcons);}


if($equipe1 == "ALFA"){
  $totaal = $totaal + $normal;
  $data2[] = array('Cod. Consultor'=>$id2,'Consultor'=>$consultor1,'Normal'=>$normal,'Substituição'=>$sub,'Total'=>$contcons);}


if($equipe1 == "ELITE"){
  $totel = $totel + $normal;
  $data3[] = array('Cod. Consultor'=>$id2,'Consultor'=>$consultor1,'Normal'=>$normal,'Substituição'=>$sub,'Total'=>$contcons);}


if($equipe1 == "FENIX"){
  $totfe = $totfe + $normal;
  $data4[] = array('Cod. Consultor'=>$id2,'Consultor'=>$consultor1,'Normal'=>$normal,'Substituição'=>$sub,'Total'=>$contcons);}


if($equipe1 == "GLOBAL"){
  $totgl = $totgl + $normal;
  $data5[] = array('Cod. Consultor'=>$id2,'Consultor'=>$consultor1,'Normal'=>$normal,'Substituição'=>$sub,'Total'=>$contcons);}


if($equipe1 == "POWER"){
  $totpo = $totpo + $normal;
  $data6[] = array('Cod. Consultor'=>$id2,'Consultor'=>$consultor1,'Normal'=>$normal,'Substituição'=>$sub,'Total'=>$contcons);}


if($equipe1 == "PUPILOS"){
  $totpu = $totpu + $normal;
  $data7[] = array('Cod. Consultor'=>$id2,'Consultor'=>$consultor1,'Normal'=>$normal,'Substituição'=>$sub,'Total'=>$contcons);}


if($equipe1 == "SNIPER"){
  $totsn= $totsn + $normal;
  $data8[] = array('Cod. Consultor'=>$id2,'Consultor'=>$consultor1,'Normal'=>$normal,'Substituição'=>$sub,'Total'=>$contcons);}


if($equipe1 == "GURREIROS"){
  $totti= $totti + $normal;
  $data9[] = array('Cod. Consultor'=>$id2,'Consultor'=>$consultor1,'Normal'=>$normal,'Substituição'=>$sub,'Total'=>$contcons);}

if($equipe1 == "OS INCRÍVEIS"){
  $totti= $totti + $normal;
  $data9a[] = array('Cod. Consultor'=>$id2,'Consultor'=>$consultor1,'Normal'=>$normal,'Substituição'=>$sub,'Total'=>$contcons);}

if($equipe1 == "R10"){
  $totti= $totti + $normal;
  $data9b[] = array('Cod. Consultor'=>$id2,'Consultor'=>$consultor1,'Normal'=>$normal,'Substituição'=>$sub,'Total'=>$contcons);}

if($equipe1 == "DIAMANTE"){
  $totti= $totti + $normal;
  $data9c[] = array('Cod. Consultor'=>$id2,'Consultor'=>$consultor1,'Normal'=>$normal,'Substituição'=>$sub,'Total'=>$contcons);}

if($equipe1 == "TSUNAMI"){
  $totti= $totti + $normal;
  $data9d[] = array('Cod. Consultor'=>$id2,'Consultor'=>$consultor1,'Normal'=>$normal,'Substituição'=>$sub,'Total'=>$contcons);}     

if($equipe1 == "FALCÃO" || $equipe1 == "FALCAO"){
  $totfa= $totfa + $normal;
  $data10[] = array('Cod. Consultor'=>$id2,'Consultor'=>$consultor1,'Normal'=>$normal,'Substituição'=>$sub,'Total'=>$contcons);} 

if($equipe1 == "DELTA"){
  $totde = $totde + $normal;
  $data11[] = array('Cod. Consultor'=>$id2,'Consultor'=>$consultor1,'Normal'=>$normal,'Substituição'=>$sub,'Total'=>$contcons);}

   $con=$con+1; $tot = $tot + $normal;
   
}

$data9[] = array('PRODUÇÃO'=>$tot);

$pdf->ezText("<b>EQUIPE ÁGUIA</b>",14,array('justification'=>'center'));
$pdf->ezTable($data,$cols,'',array('xPos'=>80,'xOrientation'=>'right','width'=>380,'cols'=>array('Cod. Consultor'=>array('width'=>60),'Consultor'=>array('width'=>200),'Normal'=>array('width'=>60),'Substituição'=>array('width'=>65),'Total'=>array('width'=>60))));
$pdf->ezText("<b>                                                                                           TOTAL: $totag</b>",14);

$pdf->ezText("\n");
$pdf->ezText("<b>EQUIPE ALFA</b>",14,array('justification'=>'center'));
$pdf->ezTable($data2,$cols,'',array('xPos'=>80,'xOrientation'=>'right','width'=>380,'cols'=>array('Cod. Consultor'=>array('width'=>60),'Consultor'=>array('width'=>200),'Normal'=>array('width'=>60),'Substituição'=>array('width'=>65),'Total'=>array('width'=>60))));
$pdf->ezText("<b>                                                                                           TOTAL: $totaal</b>",14);

$pdf->ezText("\n");
$pdf->ezText("<b>EQUIPE ELITE</b>",14,array('justification'=>'center'));
$pdf->ezTable($data3,$cols,'',array('xPos'=>80,'xOrientation'=>'right','width'=>380,'cols'=>array('Cod. Consultor'=>array('width'=>60),'Consultor'=>array('width'=>200),'Normal'=>array('width'=>60),'Substituição'=>array('width'=>65),'Total'=>array('width'=>60))));
$pdf->ezText("<b>                                                                                           TOTAL: $totel</b>",14);

$pdf->ezText("\n");
$pdf->ezText("<b>EQUIPE FENIX</b>",14,array('justification'=>'center'));
$pdf->ezTable($data4,$cols,'',array('xPos'=>80,'xOrientation'=>'right','width'=>380,'cols'=>array('Cod. Consultor'=>array('width'=>60),'Consultor'=>array('width'=>200),'Normal'=>array('width'=>60),'Substituição'=>array('width'=>65),'Total'=>array('width'=>60))));
$pdf->ezText("<b>                                                                                           TOTAL: $totfe</b>",14);

$pdf->ezText("\n");
$pdf->ezText("<b>EQUIPE GLOBAL</b>",14,array('justification'=>'center'));
$pdf->ezTable($data5,$cols,'',array('xPos'=>80,'xOrientation'=>'right','width'=>380,'cols'=>array('Cod. Consultor'=>array('width'=>60),'Consultor'=>array('width'=>200),'Normal'=>array('width'=>60),'Substituição'=>array('width'=>65),'Total'=>array('width'=>60))));
$pdf->ezText("<b>                                                                               TOTAL: $totgl</b>",14);

$pdf->ezText("\n");
$pdf->ezText("<b>EQUIPE POWER</b>",14,array('justification'=>'center'));
$pdf->ezTable($data6,$cols,'',array('xPos'=>80,'xOrientation'=>'right','width'=>380,'cols'=>array('Cod. Consultor'=>array('width'=>60),'Consultor'=>array('width'=>200),'Normal'=>array('width'=>60),'Substituição'=>array('width'=>65),'Total'=>array('width'=>60))));
$pdf->ezText("<b>                                                                                           TOTAL: $totpo</b>",14);

$pdf->ezText("\n");
$pdf->ezText("<b>EQUIPE DELATA</b>",14,array('justification'=>'center'));
$pdf->ezTable($data11,$cols,'',array('xPos'=>80,'xOrientation'=>'right','width'=>380,'cols'=>array('Cod. Consultor'=>array('width'=>60),'Consultor'=>array('width'=>200),'Normal'=>array('width'=>60),'Substituição'=>array('width'=>65),'Total'=>array('width'=>60))));
$pdf->ezText("<b>                                                                                           TOTAL: $totde</b>",14);

$pdf->ezText("\n");
$pdf->ezText("<b>EQUIPE PUPILOS</b>",14,array('justification'=>'center'));
$pdf->ezTable($data7,$cols,'',array('xPos'=>80,'xOrientation'=>'right','width'=>380,'cols'=>array('Cod. Consultor'=>array('width'=>60),'Consultor'=>array('width'=>200),'Normal'=>array('width'=>60),'Substituição'=>array('width'=>65),'Total'=>array('width'=>60))));
$pdf->ezText("<b>                                                                                                   TOTAL: $totpu</b>",14);

$pdf->ezText("\n");
$pdf->ezText("<b>EQUIPE SNIPER</b>",14,array('justification'=>'center'));
$pdf->ezTable($data8,$cols,'',array('xPos'=>80,'xOrientation'=>'right','width'=>380,'cols'=>array('Cod. Consultor'=>array('width'=>60),'Consultor'=>array('width'=>200),'Normal'=>array('width'=>60),'Substituição'=>array('width'=>65),'Total'=>array('width'=>60))));
$pdf->ezText("<b>                                                                               TOTAL: $totsn</b>",14);

$pdf->ezText("\n");
$pdf->ezText("<b>EQUIPE TSUNAMI</b>",14,array('justification'=>'center'));
$pdf->ezTable($data9d,$cols,'',array('xPos'=>80,'xOrientation'=>'right','width'=>380,'cols'=>array('Cod. Consultor'=>array('width'=>60),'Consultor'=>array('width'=>200),'Normal'=>array('width'=>60),'Substituição'=>array('width'=>65),'Total'=>array('width'=>60))));
$pdf->ezText("<b>                                                                               TOTAL: $totti</b>",14);

$pdf->ezText("\n");
$pdf->ezText("<b>EQUIPE GURREIROS</b>",14,array('justification'=>'center'));
$pdf->ezTable($data9,$cols,'',array('xPos'=>80,'xOrientation'=>'right','width'=>380,'cols'=>array('Cod. Consultor'=>array('width'=>60),'Consultor'=>array('width'=>200),'Normal'=>array('width'=>60),'Substituição'=>array('width'=>65),'Total'=>array('width'=>60))));
$pdf->ezText("<b>                                                                               TOTAL: $totti</b>",14);

$pdf->ezText("\n");
$pdf->ezText("<b>EQUIPE OS INCRÍVEIS</b>",14,array('justification'=>'center'));
$pdf->ezTable($data9a,$cols,'',array('xPos'=>80,'xOrientation'=>'right','width'=>380,'cols'=>array('Cod. Consultor'=>array('width'=>60),'Consultor'=>array('width'=>200),'Normal'=>array('width'=>60),'Substituição'=>array('width'=>65),'Total'=>array('width'=>60))));
$pdf->ezText("<b>                                                                               TOTAL: $totti</b>",14);

$pdf->ezText("\n");
$pdf->ezText("<b>EQUIPE R10</b>",14,array('justification'=>'center'));
$pdf->ezTable($data9b,$cols,'',array('xPos'=>80,'xOrientation'=>'right','width'=>380,'cols'=>array('Cod. Consultor'=>array('width'=>60),'Consultor'=>array('width'=>200),'Normal'=>array('width'=>60),'Substituição'=>array('width'=>65),'Total'=>array('width'=>60))));
$pdf->ezText("<b>                                                                               TOTAL: $totti</b>",14);

$pdf->ezText("\n");
$pdf->ezText("<b>EQUIPE DIAMANTE</b>",14,array('justification'=>'center'));
$pdf->ezTable($data9c,$cols,'',array('xPos'=>80,'xOrientation'=>'right','width'=>380,'cols'=>array('Cod. Consultor'=>array('width'=>60),'Consultor'=>array('width'=>200),'Normal'=>array('width'=>60),'Substituição'=>array('width'=>65),'Total'=>array('width'=>60))));
$pdf->ezText("<b>                                                                               TOTAL: $totti</b>",14);

$pdf->ezText("\n");
$pdf->ezText("<b>EQUIPE FALCÃO</b>",14,array('justification'=>'center'));
$pdf->ezTable($data10,$cols,'',array('xPos'=>80,'xOrientation'=>'right','width'=>380,'cols'=>array('Cod. Consultor'=>array('width'=>60),'Consultor'=>array('width'=>200),'Normal'=>array('width'=>60),'Substituição'=>array('width'=>65),'Total'=>array('width'=>60))));
$pdf->ezText("<b>                                                                               TOTAL: $totfa</b>",14);

$pdf->ezText("\n");
$pdf->ezText("<b>                                       PRODUÇÃO TOTAL: $tot PROPOSTAS.</b>",14);


$pdf->ezStream();
?>