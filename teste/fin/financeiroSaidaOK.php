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
<?php include "menu.php"; ?>
<div id="interface">
 <?php 
    
   $dataH = date('d/m/Y');
   $horacad = date('H:i');
   $datacad2 = date('d/m/Y');
   $horacad2 = date('H:i');
 
    
    $beneficiario = strtoupper($_REQUEST['beneficiario']);
    $tiposaida = $_REQUEST['tiposaida'];
    $descricao = $_REQUEST['descricao'];
    $data = $_REQUEST['data'];
    $valor = $_REQUEST['valor'];
    $valor = str_replace(',','.',str_replace('.','',$valor));
    
    //echo $beneficiario." ".$descricao." ".$data." ".$valor."<br /> ";

    include "conexao.php";
    
      $sql = "insert into financeiroSaida(tiposaida,beneficiario,descricao,data,valor,status) values('$tiposaida','$beneficiario','$descricao','$data','$valor','0')";
      $result = mysqli_query($conn,$sql) or die ("Cadastro da Saída do Caixa não realizado.");
    
     echo "<script type = 'text/javascript'> location.href = 'saida.php'</script>";
?>
 </div>
  <footer id="footer">   
     <?php include "footer.php"; ?>
  </footer>
</body>
</html>