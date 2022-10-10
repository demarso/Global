<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['idF'])){
    header("Location: index.php?erro=1");
    exit;
 }
 if($_SESSION['nivelF'] != 10){
   echo "<script>alert('Você não tem permissão para acessar está página!');history.back(-1);</script>";
   exit;
  }
 
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" href="css/style.css" type="text/css"/>
  <title>Entradas Caixa</title>
  

</head>
<body>
<?php include "menu.php"; ?>
<div id="interface">
 <?php 
    
   $datacad = date('d/m/Y');
   $horacad = date('H:i');
   $datacad2 = date('d/m/Y');
   $horacad2 = date('H:i');
 
    $id = $_POST['id'];
    $datac = $_POST['datac'];
    $dataf = $_POST['dataf'];
    $valor = $_POST['valor'];
   // $valor = str_replace(',','.', str_replace('.','', $valor));
    
    //echo $associado." ".$empresa." ".$boleto." ".$motivo." ".$recibo." ".$descricao." ".$data." ".$valor."<br /> "

    include "conexao.php";

     $sql = "update sangria set dataCaixa='$datac', dataFinanceiro='$dataf',valor='$valor' where idSangria=$id";
    $result = @mysqli_query($conn,$sql);

    
      echo "<script type = 'text/javascript'> location.href = 'index1.php'</script>"; 
   
?>
 </div>
  <footer id="footer">   
     <?php include "footer.php"; ?>
  </footer>
</body>
</html>