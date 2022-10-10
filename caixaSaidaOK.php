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
  <link rel="stylesheet" href="css/style_menu.css" type="text/css"/>
       <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="include/script.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript" src="include/script_menu.js"></script>
        <script type="text/javascript" src="include/micoxAjax.js"></script>
  <title>Saidas de Caixa</title>
  

</head>
<body>
<?php include "menu.php"; ?>
<div id="interface">
 <?php 
    
   $dataH = date('Y/m/d');
   $horacad = date('H:i');
   $datacad2 = date('d/m/Y');
   $horacad2 = date('H:i');
 
    $sangra = $_REQUEST['sangra'];
    if($sangra != "Sim") $sangra = "Não";
    $beneficiario = strtoupper($_REQUEST['beneficiario']);
    $descricao = $_REQUEST['descricao'];
    $data = $_REQUEST['data'];
    $recibo = $_REQUEST['recibo'];
    $valor = $_REQUEST['valor'];
    $valor = str_replace(',','.',str_replace('.','',$valor));
    
   // echo $beneficiario." ".$descricao." ".$data." ".$valor." ".$sangra."<br /> ";

    include "conexao.php";
    if ($sangra == "Sim"){
      $sql = "insert into sangria(dataCaixa,dataFinanceiro,valor,status) values('$data','-','$valor','0')";
      $result = mysqli_query($conn,$sql) or die ("Cadastro da Saída de Sangria não realizado.");
      
    }
    else{
      $sql = "insert into caixaSaida(beneficiario,descricao,data,recibo,valor,status) values('$beneficiario','$descricao','$data','$recibo','$valor','0')";
      $result = mysqli_query($conn,$sql) or die ("Cadastro da Saída do Caixa não realizado.");
    }
     
        $sql2 = "SELECT valor FROM caixaSaldo ";
        $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
        while ($linha2 = mysqli_fetch_array($resultado2)) {
               $saldo_atual = $linha2['valor'];}
         if(isset($saldo_atual)){      
               
               $val = $saldo_atual - $valor;

               $sql6 = "UPDATE caixaSaldo SET valor = '$val', statusSaida = 1 where data='$dataH'";
              $result6 = @mysqli_query($conn,$sql6);

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