<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['idF'])){
    header("Location: index.php?erro=1");
    exit;
 }
 if($_SESSION['nivelF'] != 0){
     echo "<script>alert('Voce nao tem permissao para acessar esta pagina!');history.back(-1);</script>";
     exit;
  }
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" href="css/style.css" type="text/css"/>
  <title>GLOBAL - Financeiro</title>
  <script type="text/javascript" src="include/jquery.js"></script>
<script type="text/javascript" src="include/micoxAjax.js"></script>

</head>
<body>
<?php include "menu_banco.php"; ?>
<div id="interface">
 <?php 
     
   $id = $_GET['id'];

   include 'conexao.php';

   $sql = "delete from bancos where idBanco=$id";
   $result = @mysqli_query($conn,$sql);


      echo "<script type = 'text/javascript'> location.href = 'banco_lista.php'</script>"; 
?>
</div>
  <footer id="footer">   
     <?php include "footer.php"; ?>
  </footer>
</body>
</html>