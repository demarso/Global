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
  <link rel="stylesheet" type="text/css" href="css/estilo.css?version=12"/>
  <link rel="stylesheet" href="css/style_menu.css?version=12" type="text/css"/>
  <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
  <script type="text/javascript" src="include/script.js"></script>
  <script type="text/javascript" src="include/jquery-latest.min.js"></script>
  <script type="text/javascript" src="include/script_menu.js"></script>
  <script type="text/javascript" src="include/jquery.inputmask.bundle.js"></script>
<script type="text/javascript">
	/*
  $(function() {
       $('input[@name=placa]').mask('aaa-9999');
     });
  

  function mudaFoto(foto){
		document.getElementById("icone").src = foto;
	}*/

 </script>
 <title>Gestão de Propostas</title>
</head>
<body>
<!--<img id="logo" src="imagens/logo.png" >-->

<div id="interface">
 <?php 
   include "cabecalho1P.php";
   include "conexao.php";
   $assoc = $_POST["associado"]; 
 ?>
   <center>
   <br />
   <form name="form1" method="post" action="editAssociadoOK.php" >
    <h1>Altere o nome do Associado</h1>
    <? echo "Atual: ".$assoc."."?><br />
   <input  type="hidden" name="id" id="id" size="20" tabindex="1" value="<? echo $id; ?>" >
    <table width="40%" border="1">
      <tr><td><font size='3'>Associado:</font></td>
        <td>
          <input type="hidden" name="associado" id="associado" size="40" value="<? echo  $assoc; ?>">
        </td>
        <td>
           <input type="text" name="associ" id="associ" size="40" value="<? echo  $associado; ?>" title="Altere o nome do associado">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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