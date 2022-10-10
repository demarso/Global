<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" type="text/css" href="css/estilo.css?version=12"/>
  <link rel="stylesheet" href="css/style_menu.css?version=12" type="text/css"/>
  <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
  <script type="text/javascript" src="include/script.js"></script>
  <script type="text/javascript" src="include/jquery-latest.min.js"></script>
  <script type="text/javascript" src="include/script_menu.js"></script>
  <script type="text/javascript" src="include/jquery.inputmask.bundle.js"></script>
   <script language="javascript" src="include/micoxAjax.js"></script>

<style>
    .dia {font-family: helvetica, arial; font-size: 8pt; color: #FFFFFF}
    .data {font-family: helvetica, arial; font-size: 8pt; text-decoration:none; color:#191970}
    .mes {font-family: helvetica, arial; font-size: 8pt}
    .Cabecalho_Calendario {font-family: helvetica, arial; font-size: 10pt; color: #000000; text-decoration:none; font-weight:bold}
</style>
</head>
<body>
<?php 
  $datacad = date('Y-m-d');
  $horacad = date('H:i');
  $datacad2 = date('Y/m/d');
  $horacad2 = date('H:i');
  $regi = $_SESSION['regio'];
 ?>
<div id="interface">
<?php
include "conexao.php";
 $cont = $cont + 1; $TAB = chr(9);
 $sql = "SELECT placa FROM `producao` WHERE MONTH(dataProposta)=10 and YEAR(dataProposta)=2017";
 $resultado = mysqli_query($conn,$sql) or die (mysql_error());
 while ($linha = mysqli_fetch_array($resultado)) {
        $placa = $linha['placa'];
  if((strlen($placa)) > 7){
  $placa2 = str_replace("-", "", $placa);
?>  
  <table BORDER=1>
   <tr>
     <td width="30" align="center"><? echo $cont?></td><td width="150" align="center"><? echo $placa?></td><td width="150" align="center"><? echo $placa2 ?></td>
   </tr>  
  <table>
<?    
  //echo $cont." ".$TAB." ".$placa." ".$TAB." ".$placa2."<br>";
  }$cont = $cont + 1;
 }       
?>
</div>
   <footer id="footer">   
    <?php include "footer.php"; ?>
   </footer>

</body>
</html>