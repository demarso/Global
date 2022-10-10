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
  <title>Entradas Caixa</title>
  

</head>
<body>

<div id="interface">
 <?php 
    
   $datacad = date('d/m/Y');
   $horacad = date('H:i');
   $datacad2 = date('d/m/Y');
   $horacad2 = date('H:i');
 
    $id = $_POST['id'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $valor = $_POST['valor'];
   // $valor = str_replace(',','.', str_replace('.','', $valor));
    
    //echo $associado." ".$empresa." ".$boleto." ".$motivo." ".$recibo." ".$descricao." ".$data." ".$valor."<br /> "

    include "conexao.php";

     $sql = "update finDir set descricao='$descricao',data='$data',valor='$valor' where idFindir=$id";
    $result = @mysqli_query($conn,$sql);

    
      echo "<script type = 'text/javascript'> location.href = 'entrFinDir.php'</script>"; 
   
?>
 </div>
  <footer id="footer">   
     <?php include "footer.php"; ?>
  </footer>
</body>
</html>