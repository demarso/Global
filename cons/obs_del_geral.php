<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if($_SESSION['nome'] != "Vivian Martins" && $_SESSION['nome'] != "Denilson Soares" && $_SESSION['nome'] != "MARIANNE COSTA" && $_SESSION['nome'] != "JOSE EDUARDO SOARES SALDANHA"){
   echo "<script>alert('Você não tem permissão para acessar está página!');</script>";
   echo "<script language=\"javascript\">window.close();</script>";
   exit;
 }
  $ano = date("Y");
 
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
  <link rel="stylesheet" href="../css/style_menu.css" type="text/css"/>
    <script type="text/javascript" src="../include/jquery-1.3.2.js"></script>
    <script type="text/javascript" src="../include/jquery-latest.min.js"></script>
    <script type="text/javascript" src="../include/script_menu.js"></script>
    <script type="text/javascript">
    </script>
   
</head>
<body>
  
    <?  

     include ("conexao.php");   
    
     $sql = "UPDATE consultor SET obs=''";
     $result = mysqli_query($conn,$sql) or die ("Limpeza não realizada.");
    
     echo "<script type = 'text/javascript'> location.href = 'quadroProducao.php'</script>";

    ?>
</body>
</html>