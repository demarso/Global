<?php
session_start();
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
  <link rel="stylesheet" type="text/css" href="css/forms.css"/>
  <title>Gestão de Propostas</title>
<script type="text/javascript" src="include/jquery.js"></script>
<script type="text/javascript" src="include/micoxAjax.js"></script>
<script type="text/javascript">
  
      function mudaFoto(foto){
        document.getElementById("icone").src = foto;
      }
</script>
</head>
<body>
<div id="interface">
 <?php include "cabecalho1.php"; ?>
 <br /><br />
 <center>
 <H2>EQUIPE ÁGUIA</H2>
 <table align="center" width="80%" border="1">
  <tr align="center" bgcolor="#CCCCCC">
    <td align="center" style="width: 10%"><font color="#333333" size="3"><b>Nº</b></font></td> 
    <td align="center" style="width: 30%"><font color="#333333" size="3"><b>Consultor</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b>Normal</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b>Substituição</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b>Total</b></font></td>
  </tr>
</table>
<H2>EQUIPE PUPILOS</H2>
 <table align="center" width="80%" border="1">
  <tr align="center" bgcolor="#CCCCCC">
    <td align="center" style="width: 10%"><font color="#333333" size="3"><b>Nº</b></font></td> 
    <td align="center" style="width: 30%"><font color="#333333" size="3"><b>Consultor</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b>Normal</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b>Substituição</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b>Total</b></font></td>
  </tr>
</table>
<H2>EQUIPE TISSUNAMI</H2>
 <table align="center" width="80%" border="1">
  <tr align="center" bgcolor="#CCCCCC">
    <td align="center" style="width: 10%"><font color="#333333" size="3"><b>Nº</b></font></td> 
    <td align="center" style="width: 30%"><font color="#333333" size="3"><b>Consultor</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b>Normal</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b>Substituição</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b>Total</b></font></td>
  </tr>
</table>

<?php
include "conexao.php";
$ano = date("Y");
$dia = date("d");
$mes = date("m");

$saldo = 0;  $con = 1;
//echo $dia." / ".$mes." / ".$ano;

$sql1 = "SELECT * FROM consultor";
$resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
while ($linha1 = mysqli_fetch_array($resultado1)) {
       $id = $linha1['idConsultor'];
       $consultor1 = $linha1['nome'];
       $equipe1 = $linha1['equipe'];
       $regional1 = $linha1['regional'];
        $sub = 0;

$sql = "SELECT count(consultor) as cons FROM producao WHERE idConsultor='$id' ";
$resultado = mysqli_query($conn,$sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado)) {
  $contcons = $linha['cons'];
   
$sql2 = "SELECT substituicao FROM producao WHERE consultor='$consultor1' ";
$resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
while ($linha2 = mysqli_fetch_array($resultado2)) {
  $subst = $linha2['substituicao'];
  //$dataCadastro = $linha['idatacad'];
  if($subst == "Sim")
       $sub = $sub + 1;
  
  $normal = $contcons - $sub;

  if ($con % 2 == 0)
     $bgcolor = "bgcolor='#FFFFFF'";
  else
     $bgcolor = "bgcolor='#FFFFCC'";

?>
<?php if($equipe1 == "ÁGUIA"){ ?>
<H2>EQUIPE ÁGUIA</H2>
  <table align="center" width="80%"  border="1">
  <tr align="center" <? echo $bgcolor; ?>>
     <td align="center" style="width: 10%"><font color="#333333" size="2"><b><? echo $con; ?></b></font></td>
      <td align="left" style="width: 30%"><font color="#333333" size="2"><b><? echo $consultor1; ?></b></font></td>
     <td align="center" style="width: 20%"><font color="#333333" size="2"><b><? echo $normal; ?></b></font></td> 
     <td align="center" style="width: 20%"><font color="#333333" size="2"><b><? echo $sub; ?></b></font></td>
     <td align="center" style="width: 20%"><font color="#333333" size="2"><b><? echo $contcons; ?></b></font></td>
  </tr>
</table>
<?}?>
<?php if($equipe1 == "PUPILOS"){ ?>
<H2>EQUIPE PUPILOS</H2>
  <table align="center" width="80%"  border="1">
  <tr align="center" <? echo $bgcolor; ?>>
     <td align="center" style="width: 10%"><font color="#333333" size="2"><b><? echo $con; ?></b></font></td>
      <td align="left" style="width: 30%"><font color="#333333" size="2"><b><? echo $consultor1; ?></b></font></td>
     <td align="center" style="width: 20%"><font color="#333333" size="2"><b><? echo $normal; ?></b></font></td> 
     <td align="center" style="width: 20%"><font color="#333333" size="2"><b><? echo $sub; ?></b></font></td>
     <td align="center" style="width: 20%"><font color="#333333" size="2"><b><? echo $contcons; ?></b></font></td>
  </tr>
</table>
<?}?>
<?php if($equipe1 == "TISSUNAMI"){ ?>
<H2>EQUIPE TISSUNAMI</H2>
  <table align="center" width="80%"  border="1">
  <tr align="center" <? echo $bgcolor; ?>>
     <td align="center" style="width: 10%"><font color="#333333" size="2"><b><? echo $con; ?></b></font></td>
      <td align="left" style="width: 30%"><font color="#333333" size="2"><b><? echo $consultor1; ?></b></font></td>
     <td align="center" style="width: 20%"><font color="#333333" size="2"><b><? echo $normal; ?></b></font></td> 
     <td align="center" style="width: 20%"><font color="#333333" size="2"><b><? echo $sub; ?></b></font></td>
     <td align="center" style="width: 20%"><font color="#333333" size="2"><b><? echo $contcons; ?></b></font></td>
  </tr>
</table>
<?}?>
</center>
<?
$con = $con + 1;
}}}
$con = $con - 1;
$saldo = number_format(round($saldo * 2 )/ 2,2);
?>
<br /><br />
 <footer id="footer">   
   <?php include "footer.php"; ?>
</footer>
</div>
</body>
</html>