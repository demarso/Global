<?php
session_start();
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
 
include "conexao.php";
      $sql0 = "SELECT idEquipe, nome, status FROM equipe WHERE status = 'Ativo'";
      $results0 = mysqli_query($conn,$sql0);
      while ( $row0 = mysqli_fetch_array($results0) ){
              $ide = $row0['idEquipe'];
              $nom = $row0['nome'];
              $sta = $row0['status'];
        if($nom == 'LOBOS WALL STREET') { 
?>
<br /><br />
 <center>
 <H2>EQUIPE LOBOS WALL STREET</H2>
 <table align="center" width="80%" border="1">
  <tr align="center" bgcolor="#CCCCCC">
    <td align="center" style="width: 10%"><font color="#333333" size="3"><b>Cod. Consultor</b></font></td> 
    <td align="center" style="width: 30%"><font color="#333333" size="3"><b>Consultor</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b>Normal</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b>Substituição</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b>Total</b></font></td>
  </tr>
</table>

<?php
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
       $id2 = str_pad( $id, 4, '0', STR_PAD_LEFT);
       $consultor1 = $linha1['nome'];
       $equipe1 = $linha1['equipe'];
       $regional1 = $linha1['regional'];
       $stat = $linha1['status'];
        $sub = 0;
//echo $consultor1."  ".$equipe1."  ".$regional1."<br >";
if($equipe1 == "LOBOS WALL STREET"){
   $eq = "LOBOS WALL STREET";
$sql = "SELECT idConsultor, count(idConsultor) as cons FROM producao WHERE idConsultor='$id' AND MONTH(dataProposta) = '$mes' AND YEAR(dataProposta) = '$ano'  AND status = 'Ativo'";
// AND WHERE MONTH(dataProposta) = '$mes'
$resultado = mysqli_query($conn,$sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado)) {
  $contcons = $linha['cons'];
  $id3 = $linha['idConsultor'];
  // echo "Consultor: ".$contcons."<br />";
}
$sql2 = "SELECT substituicao FROM producao WHERE idConsultor='$id3' AND MONTH(dataProposta) = '$mes' AND YEAR(dataProposta) = '$ano' AND status = 'Ativo'";
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
  
  if($stat == "Inativo")
      $nomecolor = "color='#6699FF'";
    else
      $nomecolor = "color='black'";

?>

  <table align="center" width="80%"  border="1">
  <tr align="center" <? echo $bgcolor; ?>>
     <td align="center" style="width: 10%"><font <? echo $nomecolor; ?> size="2"><b><? echo $id2; ?></b></font></td>
     <td align="left" style="width: 30%"><font <? echo $nomecolor; ?> size="2"><b><? echo $consultor1; ?></b></font></td>
     <td align="center" style="width: 20%"><font <? echo $nomecolor; ?> size="2"><b><? echo $normal; ?></b></font></td> 
     <td align="center" style="width: 20%"><font <? echo $nomecolor; ?> size="2"><b><? echo $sub; ?></b></font></td>
     <td align="center" style="width: 20%"><font <? echo $nomecolor; ?> size="2"><b><? echo $contcons; ?></b></font></td>
  </tr>
 </table>
</center>
<?
$con = $con + 1;
}$consu = $id; $tot = $tot + $normal; $normal = 0;
 } 
  // }
   //}
   // }
$con = $con - 1;
$saldo = number_format(round($saldo * 2 )/ 2,2);
$_SESSION['totlobos'] = $tot;
?>
<center>
  <table align="center" width="80%"  border="1">
   <tr align="center" <? echo $bgcolor; ?>>
    <td  align="center" style="width: 20%"><font color="#333333" size="2"><b>PRODUÇÃO</b></font></td>
     <td  align="center" style="width: 20%"><font color="#333333" size="2"><b><? echo $tot; ?></b></font></td>
   </tr>
  </table>
</center>
<a href="imp_quadro_lobos.php?eq=<? echo $eq; ?>"><img src="imagens/Logo_Excel-pt.png" width="60" align="right" title="Exporta quadro LOBOS WALL STREET para arquivo EXCEL"></a>
<?  $tot =0; } } ?>