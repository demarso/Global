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
<!--<script type="text/javascript" src="include/micoxAjax.js"></script>-->
</head>
<body>
<?  include "cabecalho1.php"; ?>  
<div id="interface">
   <?php 
  include "conexao.php";
   $mes = date("m");
   $ano = date("Y");
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
   
   echo "<center><h1>COMPARAÇÃO DE DESEMPENHO DAS EQUIPES DE</h1></center>";
   echo "\n";
   echo "<center><h1>".$mesatual." DE ".$ano."</h1></center>"; 
  ?>
  <table align="center" width="50%" border="1">
  <tr align="center" bgcolor="#CCCCCC">
    <td align="center" style="width: 40%"><font color="#333333" size="3"><b>EQUIPE</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b>CONSULTORES</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b>PRODUÇÃO</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b>DESEMPENHO</b></font></td>
    
  </tr>
</table>

<?php
   if($_SESSION['nivel'] == 0){
   $geral = $_SESSION['totalfa']+$_SESSION['totaguia']+$_SESSION['tottussunami']+
$_SESSION['totpupilos']+$_SESSION['totelite']+$_SESSION['totsniper']+$_SESSION['totglobal']+$_SESSION['totfenix']+$_SESSION['totpower'];
   
    $sql0 = "SELECT count(idConsultor) as conteq0 FROM consultor";
    $resultado0 = mysqli_query($conn,$sql0) or die (mysql_error());
    while ($linha0 = mysqli_fetch_array($resultado0)) {
      $contgeral = $linha0['conteq0'];
     } 
    $sql1 = "SELECT count(idConsultor) as conteq1 FROM consultor WHERE equipe='ÁGUIA' ";
    $resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
    while ($linha1 = mysqli_fetch_array($resultado1)) {
      $contaguia = $linha1['conteq1'];
     }
     $desaguia = $_SESSION['totaguia']/$contaguia;

    $sql2 = "SELECT count(idConsultor) as conteq2 FROM consultor WHERE equipe='ALFA' ";
    $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
    while ($linha2 = mysqli_fetch_array($resultado2)) {
      $contalfa = $linha2['conteq2'];
     }
    $desalfa = $_SESSION['totalfa']/$contalfa;

    $sql3 = "SELECT count(idConsultor) as conteq3 FROM consultor WHERE equipe='TISSUNAMI' ";
    $resultado3 = mysqli_query($conn,$sql3) or die (mysql_error());
    while ($linha3 = mysqli_fetch_array($resultado3)) {
      $conttissu = $linha3['conteq3'];
     }
     $destissu = $_SESSION['tottussunami']/$conttissu;

    $sql4 = "SELECT count(idConsultor) as conteq4 FROM consultor WHERE equipe='PUPILOS' ";
    $resultado4 = mysqli_query($conn,$sql4) or die (mysql_error());
    while ($linha4 = mysqli_fetch_array($resultado4)) {
      $contpupi = $linha4['conteq4'];
     } 
     $despupi = $_SESSION['totpupilos']/$contpupi;

    $sql5 = "SELECT count(idConsultor) as conteq5 FROM consultor WHERE equipe='ELITE' ";
    $resultado5 = mysqli_query($conn,$sql5) or die (mysql_error());
    while ($linha5 = mysqli_fetch_array($resultado5)) {
      $contelite = $linha5['conteq5'];
     }
     $deselite = $_SESSION['totelite']/$contelite;

    $sql6 = "SELECT count(idConsultor) as conteq6 FROM consultor WHERE equipe='SNIPER' ";
    $resultado6 = mysqli_query($conn,$sql6) or die (mysql_error());
    while ($linha6 = mysqli_fetch_array($resultado6)) {
      $contsnip = $linha6['conteq6'];
     }
     $dessnip = $_SESSION['totsniper']/$contsnip;

    $sql7 = "SELECT count(idConsultor) as conteq7 FROM consultor WHERE equipe='GLOBAL' ";
    $resultado7 = mysqli_query($conn,$sql7) or die (mysql_error());
    while ($linha7 = mysqli_fetch_array($resultado7)) {
      $contglob = $linha7['conteq7'];
    }
    $desglob = $_SESSION['totglobal']/$contglob;

    $sql8 = "SELECT count(idConsultor) as conteq8 FROM consultor WHERE equipe='FENIX' ";
    $resultado8 = mysqli_query($conn,$sql8) or die (mysql_error());
    while ($linha8 = mysqli_fetch_array($resultado8)) {
      $contfenix = $linha8['conteq8'];
     }
    $desfenix = $_SESSION['totfenix']/$contfenix;

    $sql9 = "SELECT count(idConsultor) as conteq9 FROM consultor WHERE equipe='POWER' ";
    $resultado9 = mysqli_query($conn,$sql9) or die (mysql_error());
    while ($linha9 = mysqli_fetch_array($resultado9)) {
      $contpower = $linha9['conteq9'];
     }
     $despower = $_SESSION['totpower']/$contpower;
     $pc = $geral / $contgeral;
    //echo $geral."  ".$contgeral." ".number_format(round($pc * 2 )/ 2,2);
    
  }
   ?>
   <br />
   <center>
  <table align="center" width="50%"  border="1">
   <tr align="center" <? echo $bgcolor; ?>>
    <td align="center" style="width: 40%"><font color="#333333" size="3"><b>GLOBAL</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $contglob; ?></b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $_SESSION['totglobal']; ?></b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo  number_format(round($desglob*100/$pc * 2 )/ 2,2)." %"; ?></b></font></td>
  </tr>
  <tr align="center" <? echo $bgcolor; ?>>
    <td align="center" style="width: 40%"><font color="#333333" size="3"><b>SNIPER</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $contsnip; ?></b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $_SESSION['totsniper']; ?></b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo  number_format(round($dessnip*100/$pc * 2 )/ 2,2)." %"; ?></b></font></td>
  </tr>
  <tr align="center" <? echo $bgcolor; ?>>
    <td align="center" style="width: 40%"><font color="#333333" size="3"><b>ÁGUIA</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $contaguia; ?></b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $_SESSION['totaguia']; ?></b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo  number_format(round($desaguia*100/$pc * 2 )/ 2,2)." %"; ?></b></font></td>
  </tr>
  <tr align="center" <? echo $bgcolor; ?>>
    <td align="center" style="width: 40%"><font color="#333333" size="3"><b>ALFA</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $contalfa; ?></b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $_SESSION['totalfa']; ?></b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo  number_format(round($desalfa*100/$pc * 2 )/ 2,2)." %"; ?></b></font></td>
  </tr>
  <tr align="center" <? echo $bgcolor; ?>>
    <td align="center" style="width: 40%"><font color="#333333" size="3"><b>TISSUNAMI</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $conttissu; ?></b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $_SESSION['tottussunami']; ?></b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo  number_format(round($destissu*100/$pc * 2 )/ 2,2)." %"; ?></b></font></td>
  </tr>
  <tr align="center" <? echo $bgcolor; ?>>
    <td align="center" style="width: 40%"><font color="#333333" size="3"><b>PUPILOS</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $contpupi; ?></b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $_SESSION['totpupilos']; ?></b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo  number_format(round($despupi*100/$pc * 2 )/ 2,2)." %"; ?></b></font></td>
  </tr>
  <tr align="center" <? echo $bgcolor; ?>>
    <td align="center" style="width: 40%"><font color="#333333" size="3"><b>ELITE</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $contelite; ?></b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $_SESSION['totelite']; ?></b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo  number_format(round($deselite*100/$pc * 2 )/ 2,2)." %"; ?></b></font></td>
  </tr>
  <tr align="center" <? echo $bgcolor; ?>>
    <td align="center" style="width: 40%"><font color="#333333" size="3"><b>FENIX</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $contfenix; ?></b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $_SESSION['totfenix']; ?></b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo  number_format(round($desfenix*100/$pc * 2 )/ 2,2)." %"; ?></b></font></td>
  </tr>
  <tr align="center" <? echo $bgcolor; ?>>
    <td align="center" style="width: 40%"><font color="#333333" size="3"><b>POWER</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $contpower; ?></b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $_SESSION['totpower']; ?></b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo  number_format(round($despower*100/$pc * 2 )/ 2,2)." %"; ?></b></font></td>
  </tr>
  <tr>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b>ConsultoresTotal</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $contgeral; ?></b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b>Produção Total</b></font></td>
    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $geral; ?></b></font></td>
    
  </tr>
</table>
   </tr>
  </table>
</center>
</div>
 <footer id="footer">   
   <?php include "footer.php"; ?>
</footer>
</body>
</html>