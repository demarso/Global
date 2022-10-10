<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['idF'])){
    header("Location: index.php?erro=1");
    exit;
 }
 
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" href="css/style.css" type="text/css"/>
  <title>Entradas Fiananceiro</title>
  

</head>
<body>
<?php include "menu.php"; ?>
<div id="interface">
 <?php 
    
   $hoje = date('d/m/Y');
    
    $idS = $_GET['idS'];

    //echo $idS;
    
  
    include "conexao.php";
   
      $sql = "update sangria set dataFinanceiro = STR_TO_DATE('$hoje','%d/%m/%Y'), status = 1 where idSangria = '$idS'";
      $result = mysqli_query($conn,$sql) or die ("Recebimento da Sangria não realizado.");

      // echo "<script type = 'text/javascript'> location.href = 'entrada.php'</script>";

?>
  <script language="javascript">
     window.close('sangria.php');
     window.close();
  </script>
 </div>
  <footer id="footer">   
     <?php include "footer.php"; ?>
  </footer>
</body>
</html>