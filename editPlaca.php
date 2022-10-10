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
  <script type="text/javascript" src="include/jquery-1.2.6.pack.js"></script>
  <script type="text/javascript" src="include/jquery.maskedinput-1.1.4.pack.js"/></script>
  <script language="javascript" src="include/micoxAjax.js"></script>
<script type="text/javascript">
	
  $(function() {
       $('input[@name=placa]').mask('aaa-9999');
     });

  function mudaFoto(foto){
		document.getElementById("icone").src = foto;
	}

 </script>
</head>
<body>
<!--<img id="logo" src="imagens/logo.png" >-->

<div id="interface">
 <?php include "cabecalho1.php";
 include "conexao.php"; 
 $plac = $_GET[pl];
 $sql = "SELECT idProducao, associado, veiculo, placa FROM producao WHERE placa = '$plac'";
      $resultado = mysqli_query($conn,$sql) or die (mysql_error());
      while ($linha = mysqli_fetch_array($resultado)) {
       $id = $linha['idProducao'];
       $associado = $linha['associado'];
       $veiculo = $linha['veiculo'];
       $placa = $linha['placa'];       
     }

 ?>
   <center>
   <br />
   <form name="form1" method="post" action="editPlacaOK.php" >
    <h1>Alatere os dados que desejar</h1>
   <table width="40%" border="1">
       <input  type="hidden" name="id" id="id" size="20" tabindex="1" value="<? echo $id; ?>" readonly="true">   
       <tr><td><font size='3'>Assiciado:</font></td>
       <td>
         <input  type="text" name="associado" id="associado" size="50" tabindex="2" value="<? echo $associado; ?>" style='text-transform:uppercase'>   
       </td>
       </tr>
       <tr><td><font size='3'>Veículo:</font></td>
       <td>
         <input  type="text" name="veiculo" id="veiculo" size="30" tabindex="2" value="<? echo $veiculo; ?>" style='text-transform:uppercase'>   
       </td>
       </tr>
       <tr><td><font size='3'>Placa:</font></td>
       <td>
         <input  type="text" name="placa" id="placa" size="20" tabindex="2" value="<? echo $placa; ?>" style='text-transform:uppercase'>   
       </td>
       </tr>
       <tr>
       <td colspan="2" align="center">
         <input type="submit" value="Atualizar">   
       </td>
       </tr>
      </table>
   </form>
   </center>
   <br /><br />
<footer id="footer">   
   <?php include "footer.php"; ?>
</footer>
</div>
</body>
</html>