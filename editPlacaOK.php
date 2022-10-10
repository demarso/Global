<?php
session_start();
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
 ?>
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
      
      $id = $_POST['id'];
      $veiculo = strtoupper($_POST['veiculo']);
      $placa = strtoupper($_POST['placa']);
            
      //echo $consultor." ".$regional." ".$equipe;
 
      $sql2 = "UPDATE producao SET veiculo = '$veiculo', placa = '$placa' WHERE idProducao = '$id'";
      $result = mysqli_query($conn,$sql2) or die ("Cadastro do Consultor não realizado.");
      
      echo "<script type = 'text/javascript'> location.href = 'consProducao.php'</script>";
       
   ?>
   </center>
   <br /><br />
<footer id="footer">   
   <?php include "footer.php"; ?>
</footer>
</div>
</body>
</html>