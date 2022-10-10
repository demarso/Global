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
 
    $sangra = $_REQUEST['sangra'];
    if($sangra != "Sim") $sangra = "Não";
    $beneficiario = strtoupper($_REQUEST['beneficiario']);
    $descricao = $_REQUEST['descricao'];
    $data = $_REQUEST['data'];
    $valor = $_REQUEST['valor'];
    $valor = str_replace(',','.',str_replace('.','',$valor));
    
    //echo $beneficiario." ".$descricao." ".$data." ".$valor."<br /> ";

    include "conexao.php";
    if ($sangra == "Sim"){
      $sql = "insert into sangria(dataCaixa,dataFinanceiro,valor,status) values(STR_TO_DATE('$dataH','%d/%m/%Y'),'-','$valor','0')";
      $result = mysqli_query($conn,$sql) or die ("Cadastro da Saída de Sangria não realizado.");
    }
    else{
      $sql = "insert into caixaSaida(beneficiario,descricao,data,valor,status) values('$beneficiario','$descricao',STR_TO_DATE('$data','%d/%m/%Y'),'$valor','0')";
      $result = mysqli_query($conn,$sql) or die ("Cadastro da Saída do Caixa não realizado.");
    }
      //echo "<script type='text/javascript'> window.open('recibo1.php?benef=$beneficiario&desc=$descricao&data=$data&valor=$valor','_blank')</script>"; 
     echo "<script type = 'text/javascript'> location.href = 'saida.php'</script>";
?>
 </div>
  <footer id="footer">   
     <?php include "footer.php"; ?>
  </footer>
</body>
</html>