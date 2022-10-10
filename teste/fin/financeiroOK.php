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
    
   $datacad = date('Y/m/d');
   $horacad = date('H:i');
   $datacad2 = date('d/m/Y');
   $horacad2 = date('H:i');
 
    $empresa = $_POST['empresa'];
   // $sacado = strtoupper($_POST['sacado']);
    $banco = $_POST['banco'];
    $tipoentrada = $_POST['tipoentrada'];
    $data = $_POST['data'];
    $valor = $_POST['valor'];
    $valor = str_replace(',','.', str_replace('.','', $valor));

   // echo $datacad." ".$sacado." ".$titulo." ".$vencimento." ".$valor;

    include "conexao.php";
       
      //$sql = "INSERT INTO financeiro(datacad, empresa, sacado, titulo, vencimento, valor, status) VALUES ('$datacad','$empresa','$sacado','$titulo','$vencimento','$valor',0)";

    $sql = "INSERT INTO movBanco
           (idBanco, empresa, tipoentrada, data, valor, status) 
           VALUES 
           ('$banco','$empresa','$tipoentrada','$data','$valor',0)";

      $result = mysqli_query($conn,$sql) or die ("Cadastro da Entrada do Banco não realizado.");
    

      echo "<script type = 'text/javascript'> location.href = 'entrada.php'</script>"; 
   
?>
 </div>
  <footer id="footer">   
     <?php include "footer.php"; ?>
  </footer>
</body>
</html>