<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');
/*if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }*/
 $eq = $_GET['eq'];
$mes = date('m');
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
$arqexcel = "</b>QUADRO DA PRODU&Ccedil;&Atilde;O DA EQUIPE FALCAO DE ".$mesatual."</b>";
$arqexcel .= "<table align='center' width='80%' border='1'>
  <tr align='center' bgcolor='#CCCCCC'>
    <td align='center' style='width: 10%'><font size='3'><b>Cod. Consultor</b></font></td> 
    <td align='center' style='width: 30%'><font size='3'><b>Consultor</b></font></td>
    <td align='center' style='width: 20%'><font size='3'><b>Normal</b></font></td>
    <td align='center' style='width: 20%'><font size='3'><b>Substituição</b></font></td>
    <td align='center' style='width: 20%'><font size='3'><b>Total</b></font></td>
  </tr>
</table>";


include "conexao.php";

$dia = date("d");
if(isset($_SESSION['mesc'])){
      $mes = $_SESSION['mesc'];
      $ano = $_SESSION['anoc'];
  }
  else{
    $mes = date("m");
    $ano = date("Y");
  }
 

$saldo = 0;  $con = 1; $consu="";
//echo $dia." / ".$mes." / ".$ano;

$sql1 = "SELECT * FROM consultor WHERE status = 'Ativo' ORDER BY nome";
$resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
while ($linha1 = mysqli_fetch_array($resultado1)) {
       $id = $linha1['idConsultor'];
       $consultor1 = $linha1['nome'];
       $equipe1 = $linha1['equipe'];
       $regional1 = $linha1['regional'];
       $stat = $linha1['status'];
        $sub = 0;
//echo $consultor1."  ".$equipe1."  ".$regional1."<br >";
if($equipe1 == "FALCÃO"){
$sql = "SELECT idConsultor, count(idConsultor) as cons FROM producao WHERE idConsultor='$id' AND MONTH(dataProposta) = '$mes' AND YEAR(dataProposta)='$ano' AND status = 'Ativo'";
// AND WHERE MONTH(dataProposta) = '$mes'
$resultado = mysqli_query($conn,$sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado)) {
  $contcons = $linha['cons'];
  $id2 = $linha['idConsultor'];
  // echo "Consultor: ".$contcons."<br />";
}
$sql2 = "SELECT substituicao FROM producao WHERE idConsultor='$id2' AND MONTH(dataProposta) = '$mes' AND YEAR(dataProposta)='$ano' AND status = 'Ativo'";
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


  $arqexcel .= "<table align='center' width='80%'  border='1'>
      <tr align='center'>
         <td align='center' style='width: 10%'><font size='2'>$id</font></td>
         <td align='left' style='width: 30%'><font size='2'>$consultor1</font></td>
         <td align='center' style='width: 20%'><font size='2'>$normal</font></td> 
         <td align='center' style='width: 20%'><font size='2'>$sub</font></td>
         <td align='center' style='width: 20%'><font size='2'>$contcons</font></td>
      </tr>
     </table>";
  

$con = $con + 1;
}$tot = $tot + $normal; $normal = 0;
}$con = $con - 1;

$arqexcel .= "<table align='center' width='80%'  border='1'>
   <tr align='center'>
    <td  align='center' style='width: 20%'><font size='2'><b>PRODUÇÃO</b></font></td>
     <td  align='center' style='width: 20%'><font size='2'><b>$tot</b></font></td>
   </tr>
  </table>";


   header("Content-Type: application/xls");
   header("Content-Disposition:attachment; filename = quadro_falcao.xls");
   echo $arqexcel;
?>
