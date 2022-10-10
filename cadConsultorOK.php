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
  <link rel="stylesheet" href="css/style_menu.css" type="text/css"/>
  <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
  <script type="text/javascript" src="include/script.js"></script>
  <script type="text/javascript" src="include/jquery-latest.min.js"></script>
  <script type="text/javascript" src="include/script_menu.js"></script>
</head>
<body>
<!--<img id="logo" src="imagens/logo.png" >-->
<div id="interface">
 <?php include "cabecalho1P.php"; ?>
   <center>
   <br />
   <?php
      include("conexao.php");
      
      $datacadA = $_POST['datacadA'];
      $horacadA = $_POST['horacadA'];
      $consultor = strtoupper($_POST['consultor']);
      $regional = strtoupper($_POST['regional']);
      $equipe = strtoupper($_POST['equipe']);
      $vinculo = strtoupper($_POST['vinculo']);
      $responsavel = $_SESSION['nome'];
      $motivo = "Cadastro";
      //echo $consultor." / ".$regional." / ".$equipe." / ".$vinculo."<br />";

      $sql = "SELECT nome FROM consultor WHERE nome = '$consultor'";
      $tabela = mysqli_query($conn,$sql) or die(mysql_error());
      $registro = mysqli_num_rows($tabela);
  
      //echo $registro;

     if ($registro != 0)
      {
           echo "<script>alert(\"Consultor já cadastrado!\");history.go(-2);</script>";
          
      }
      else{
      $sql2 = "INSERT INTO consultor (data,hora,nome,regional,equipe,vinculo,status) VALUES ('$datacadA','$horacadA','$consultor','$regional','$equipe', '$vinculo', 'Ativo')";
      $result = mysqli_query($conn,$sql2) or die ("Cadastro do Consultor não realizado.");
      
      $sql3 = "SELECT * FROM consultor WHERE nome = '$consultor' and status='Ativo'";
      $resultado3 = mysqli_query($conn,$sql3) or die (mysql_error());
      while ($linha3 = mysqli_fetch_array($resultado3)) {
          $id = $linha3['idConsultor'];
      }
      
      $sql4 = "INSERT INTO consultorHistorico (idConsultor,data,hora,regional,equipe,vinculo,motivo,responsavel) VALUES ('$id','$datacadA','$horacadA','$regional','$equipe','$vinculo','$motivo','$responsavel')";
      $result = mysqli_query($conn,$sql4) or die ("Cadastro do Histórico do Consultor não realizado.");

      }

      echo "<script type = 'text/javascript'> location.href = 'cadConsultor.php'</script>";
    
   ?>
   </center>
   <br /><br />
<footer id="footer">   
   <?php include "footer.php"; ?>
</footer>
</div>
</body>
</html>