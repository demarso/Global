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
<!--<img id="logo" src="imagens/logo.png" >-->
<div id="interface">
 <?php include "cabecalho1.php"; ?>
   <center>
   <br />
   <?php
      include("conexao.php");
      
      $associado = $_POST['associado'];
      
      $sql = "SELECT nome FROM associado WHERE nome = '$associado'";
      $tabela = mysqli_query($conn,$sql) or die(mysql_error());
      $registro = mysqli_num_rows($tabela);
  
      if ($registro != 0)
      {
           echo "<script>alert(\"Associado já cadastrado!\");history.go(-2);</script>";
      }
      else
      {
          $sql = "INSERT INTO associado(nome) VALUES('$associado')";
     
          $result = mysqli_query($conn,$sql) or die ("Cadastro do Associado não realizado.");
          
          $var = "<script language=javascript>window.history.go(-2);</script>";
               echo $var;
          //echo "<script type = 'text/javascript'> location.href = 'index1.php'</script>";
      }
   ?>
   </center>
   <br /><br />
<footer id="footer">   
   <?php include "footer.php"; ?>
</footer>
</div>
</body>
</html>