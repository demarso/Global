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
 ?>
   <center>
   <br />
   <form name="form1" method="post" action="editAssociado1.php" >
    <h1>Selecione o nome do Associado</h1>
   <input  type="hidden" name="id" id="id" size="20" tabindex="1" value="<? echo $id; ?>" readonly="true">
    <table width="40%" border="1">
      <tr><td><font size='3'>Associado:</font></td>
        <td>
          <select name="associado" id="associado" tabindex="3" onchange="tonal2();">
            <option value="">---</option>
              <?php
                include ("conexao.php");
                $sql = "SELECT distinct(associado) FROM producao ORDER BY associado";
                $results = mysqli_query($conn,$sql);
                while ( $row = mysqli_fetch_array($results) ) {
                  echo "<option value='".$row[0]."'>".$row[0]."</option>";
                }
              ?>
          </select>
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