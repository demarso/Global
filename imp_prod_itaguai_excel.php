<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
/*if (!isset($_SESSION['id'])){
    header('Location: index.php?erro=1');
    exit; 
 }*/
  $mes = date('m');
  $ano = date('Y');
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
$arqexcel = "<meta charset='UTF-8'>";
$arqexcel = "<b>PRODU&Ccedil;&Atilde;O DE ITAGUA&Iacute; DE ".$mesatual." DE ".$ano."</b>";
$arqexcel .= "<table id='tabela' align='center' width='100%'' border='1'>
 </thead>
  <tr align='center' bgcolor='#CCCCCC'>
    <th align='center' style='width: 5%'><font color='#333333' size='3'><b>N&ordm;</b></font></th> 
    <th align='center' style='width: 15%'><font color='#333333' size='3'><b>Consultor</b></font></th>
    <th align='center' style='width: 10%'><font color='#333333' size='3'><b>Regional</b></font></th>
    <th align='center' style='width: 15%'><font color='#333333' size='3'><b>Associado</b></font></th>
    <th align='center' style='width: 10%'><font color='#333333' size='3'><b>Ve&iacute;culo</b></font></th>
    <th align='center' style='width: 8%'><font color='#333333' size='3'><b>Placa</b></font></th>
    <th align='center' style='width: 8%'><font color='#333333' size='3'><b>Proposta</b></font></th>
    <th align='center' style='width: 8%'><font color='#333333' size='3'><b>Receb.</b></font></th>
    <th align='center' style='width: 5%'><font color='#333333' size='3'><b>Rastr.</b></font></th>
    <th align='center' style='width: 8%'><font color='#333333' size='3'><b>Instal.</b></font></th>
  </tr>
  
 </thead>
</table>";

include 'conexao.php';
$ano = date('Y'); //$_SESSION['ano1']
$dia = date('d');
$mes = date('m'); //$_SESSION['mes1'];
if(isset($_SESSION['mesc'])){
      $mes = $_SESSION['mesc'];
      $ano = $_SESSION['anoc'];
  }
  
$saldo = 0;  $con = 1;
//echo $dia.' / '.$mes.' / '.$ano;

$sql = "SELECT *, DATE_FORMAT(dataProposta,'%d/%m/%Y') as idataProposta, DATE_FORMAT(dataRecebimento,'%d/%m/%Y') as idataRecebimento, DATE_FORMAT(dataInstalacao,'%d/%m/%Y') as idataInstalacao FROM producao WHERE MONTH(dataProposta) = '$mes' AND YEAR(dataProposta) = '$ano' ORDER BY dataProposta DESC";

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
       $regionall = $linha1['regional'];

if ($regionall == "ITAGUAI" || $regionall == "ITAGUAÍ") {
$arqexcel .= "<table id='tabela' align='center' width='100%'  border='1'>
 <tbody>
  <tr align='center'>
    <td align='center' style='width: 5%'><font size='2'>$con</font></td>
    <td align='left' style='width: 15%'><font color='#333333' size='2'>$consultor1</font></td>
    <td align='center' style='width: 10%'><font color='#333333' size='2'>$regionall</font></td>
    <td align='center' style='width: 15%'><font color='#333333' size='2'>$associado</font></td>
    <td align='center' style='width: 10%'><font color='#333333' size='2'>$veiculo</font></td>
    <td align='center' style='width: 8%'><font color='#333333' size='2'>$placa</font></td>
    <td align='center' style='width: 8%'><font color='#333333' size='2'>$dataProposta</font></td>
    <td align='center' style='width: 8%'><font color='#333333' size='2'>$dataRecebimento</font></td>
    <td align='center' style='width: 5%'><font color='#333333' size='2'>$rastreador</font></td>
    <td align='center' style='width: 8%'><font color='#333333' size='2'>$dataInstalacao</font></td>
  </tr>
 </tbody>
 </table>";

$con = $con + 1;
}}}
$con = $con - 1;
   header("Content-Type: application/xls;  charset=UTF-8;");
   header("Content-Disposition:attachment; filename = prod-itaguai.xls");
   $arqexcel = utf8_decode($arqexcel);
   echo $arqexcel;
?>