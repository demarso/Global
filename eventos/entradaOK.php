<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GLOBAL - SINISTROS</title>  
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-info">
  <?  include "menu.php"; ?>  
  <div class="container" id="home">
    <?php 
           
      $datacadA = $_POST['datacadA'];
      $horacadA = $_POST['horacadA'];
      $placa    = $_POST['placa'];
      $veiculo  = $_POST['veiculo'];
      $associado= $_POST['associado'];
      $consultor= $_POST['consultor'];
      $regional = $_POST['regional'];
        
      //echo $Nome." ".$Login." ".$senha1." ".$Empresa." ".$Nivel." ".$Status."<br /> "

      include "conexao.php";

      $sql = "INSERT INTO evCadastro
                         (placa, associado, veiculo, consultor, regional, dataEntrada, horaEntrada) 
                         VALUES
                         ('$placa','$associado','$veiculo','$consultor','$regional','$datacadA','$horacadA')";
        $result = mysqli_query($conn,$sql) or die ("Cadastro do Evento não realizado.");

          echo "<script type = 'text/javascript'> location.href = 'entrada.php'</script>"; 
    ?>
 </div>
 <? include "footer.html"; ?>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>  
</body>
</html>