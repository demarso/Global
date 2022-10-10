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
      
     // $id = $_POST['id'];
      $consultor = strtoupper($_POST['consultor']);
      $regional = strtoupper($_POST['regional']);
      $equipe = strtoupper($_POST['equipe']);
      $vinculo = strtoupper($_POST['vinculo']);
      $data1 = $_POST['data1'];

      //echo $consultor." ".$regional." ".$equipe;
      $sql = "SELECT idConsultor FROM consultor WHERE nome = '$consultor'";
      $resultado = mysqli_query($conn,$sql) or die (mysql_error());
      while ($linha = mysqli_fetch_array($resultado)) {
       $id = $linha['idConsultor'];
       }

      $sql2 = "UPDATE consultor SET status='Inativo' WHERE idConsultor = '$id'";
      $result = mysqli_query($conn,$sql2) or die ("Cadastro do Consultor não atualizado.");
      
            
      $sql1 = "INSERT INTO consultor( nome, regional, equipe, vinculo, status)
                              VALUES( '$consultor',
                                      '$regional',
                                      '$equipe',
                                      '$vinculo',
                                      'Ativo'
                                    )";

      $result1 = mysqli_query($conn,$sql1) or die ("Cadastro da Consultor não realizado.");                               

      $sql = "SELECT idConsultor FROM consultor WHERE nome = '$consultor' and status = 'Ativo'";
      $resultado = mysqli_query($conn,$sql) or die (mysql_error());
      while ($linha = mysqli_fetch_array($resultado)) {
       $id2 = $linha['idConsultor'];
       }

      $sql2 = "UPDATE producao SET idConsultor='$id2' WHERE idConsultor = '$id' and dataProposta >= '$data1'";
      $result = mysqli_query($conn,$sql2) or die ("Cadastro do Consultor não atualizado.");                            
   
     
        echo "<script type = 'text/javascript'> location.href = 'index1.php'</script>";
   ?>
   </center>
   <br /><br />
<footer id="footer">   
   <?php include "footer.php"; ?>
</footer>
</div>
</body>
</html>