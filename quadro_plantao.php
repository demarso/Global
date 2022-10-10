<?php
session_start();
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 } 
 
    include "conexao.php";
  
   $mes = date("m");
   $ano = date("Y");
   $geral = 0;
    
 $eq = 'PLANTAO GLOBAL - NOVA IGUAÇU';

   
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

   
?>
<br />
 <center>
 <H2>EQUIPE <? echo $eq;   ?></H2>
 <table align="center" width="80%" border="1">
  <tr align="center" bgcolor="#CCCCCC">
    <td align="center" style="width: 10%"><font color="#333333" size="3"><b>Cod. Consultor</b></font></td> 
    <td align="center" style="width: 30%"><font color="#333333" size="3"><b>Consultor</b></font></td>
    <td align="center" style="width: 15%"><font color="#333333" size="3"><b>Normal</b></font></td>
    <td align="center" style="width: 15%"><font color="#333333" size="3"><b>Substituição</b></font></td>
    <td align="center" style="width: 15%"><font color="#333333" size="3"><b>Reativação</b></font></td>
    <td align="center" style="width: 15%"><font color="#333333" size="3"><b>Total</b></font></td>
  </tr>
</table>

<?php
$ano = date("Y");
$dia = date("d");
$mes = date("m");
if(isset($_SESSION['mesc'])){
      $mes = $_SESSION['mesc'];
      $ano = $_SESSION['anoc'];
  }

$contcons = 0;$subst = 0;$reat = 0;
$saldo = 0;  $con = 1; $consu="";
$mes_atual = date("m"); $ano_atual = date("Y");
include "conexao.php";
    $sql1 = "SELECT * FROM consultor WHERE equipe = '$eq' and status = 'Ativo' ORDER BY nome";
    
    $resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
    while ($linha1 = mysqli_fetch_array($resultado1)) {
           $id = $linha1['idConsultor'];
           $id2 = str_pad( $id, 4, '0', STR_PAD_LEFT);
           $consultor1 = $linha1['nome'];
           $equipe1 = $linha1['equipe'];
           $regional1 = $linha1['regional'];
           $stat = $linha1['status'];
           $contcons = 0;$sub = 0;$reat = 0; 
$sql = "SELECT idConsultor, count(idConsultor) as cons FROM producao WHERE idConsultor='$id' AND MONTH(dataProposta) = '$mes' AND YEAR(dataProposta) = '$ano'";// AND status = 'Ativo'
// AND WHERE MONTH(dataProposta) = '$mes'
$resultado = mysqli_query($conn,$sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado)) {
  $contcons = $linha['cons'];
  $id3 = $linha['idConsultor'];
  // echo "Consultor: ".$contcons."<br />";
}
$sql2 = "SELECT substituicao FROM producao WHERE idConsultor='$id' AND MONTH(dataProposta) = '$mes' AND YEAR(dataProposta) = '$ano'";
$resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
while ($linha2 = mysqli_fetch_array($resultado2)) {
  $subst = $linha2['substituicao'];
  //$dataCadastro = $linha['idatacad'];
  if($subst == "Sim")
       $sub = $sub + 1;
}
  //echo "Substituições: ".$sub."<br />";
$sql3 = "SELECT reativacao FROM producao WHERE idConsultor='$id' AND MONTH(dataProposta) = '$mes' AND YEAR(dataProposta) = '$ano'";
$resultado3 = mysqli_query($conn,$sql3) or die (mysql_error());
while ($linha3 = mysqli_fetch_array($resultado3)) {
  $reativ = $linha3['reativacao'];
  //$dataCadastro = $linha['idatacad'];
  if($reativ == "Sim")
       $reat = $reat + 1;
}
  //echo "Substituições: ".$sub."<br />";

  $normal = $contcons - $sub - $reat;
  

  //echo "Normais: ".$normal."<br />";

  if ($con % 2 == 0)
     $bgcolor = "bgcolor='#FFFFFF'";
  else
     $bgcolor = "bgcolor='#FFFFCC'";

   if($stat == "Inativo")
      $nomecolor = "color='#6699FF'";
    else
      $nomecolor = "color='black'";

?>

  <table align="center" width="80%"  border="1">
  <tr align="center" <? echo $bgcolor; ?>>
     <td align="center" style="width: 10%"><font <? echo $nomecolor; ?> size="2"><b><? echo $id2; ?></b></font></td>
     <td align="left" style="width: 30%"><font <? echo $nomecolor; ?> size="2"><b><? echo $consultor1; ?></b></font></td>
     <td align="center" style="width: 15%"><font <? echo $nomecolor; ?> size="2"><b><? echo $normal; ?></b></font></td> 
     <td align="center" style="width: 15%"><font <? echo $nomecolor; ?> size="2"><b><? echo $sub; ?></b></font></td>
     <td align="center" style="width: 15%"><font <? echo $nomecolor; ?> size="2"><b><? echo $reat; ?></b></font></td>
     <td align="center" style="width: 15%"><font <? echo $nomecolor; ?> size="2"><b><? echo $contcons; ?></b></font></td>
  </tr>
 </table>
</center>
<?
$con = $con + 1; $normaltot = $normaltot + $normal; $reattot = $reattot + $reat; $subtot = $subtot + $sub;
}$consu = $id; $tot = $tot + $normal; $normal = 0; $totalg = $normaltot + $reattot + $subtot;
  
  
   //}
   // }
$con = $con - 1;
$_SESSION['reatplantao'] = $_SESSION['reatplantao'] + $reattot;
$_SESSION['subplantao'] = $_SESSION['subplantao'] + $subtot;
$_SESSION['totplantao'] = $_SESSION['totplantao'] + $normaltot;
?>
<center>
  <table align="center" width="80%"  border="1">
   <tr align="center" <? echo $bgcolor; ?>>
    <td colspan="2"  align="center" style="width: 40%"><font color="#333333" size="2"><b>PRODUÇÃO</b></font></td>
    <td  align="center" style="width: 15%"><font color="#333333" size="2"><b><? echo $normaltot; ?></b></font></td>
    <td  align="center" style="width: 15%"><font color="#333333" size="2"><b><? echo $subtot; ?></b></font></td>
    <td  align="center" style="width: 15%"><font color="#333333" size="2"><b><? echo $reattot; ?></b></font></td>
    <td  align="center" style="width: 15%"><font color="#333333" size="2"><b><? echo $totalg; ?></b></font></td>
   </tr>
  </table>
</center>