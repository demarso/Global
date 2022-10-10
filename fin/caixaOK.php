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
    
   $datacad = date('d/m/Y');
   $horacad = date('H:i');
   $datacad2 = date('d/m/Y');
   $horacad2 = date('H:i');
 
    $empresa = $_POST['empresa'];
    $associado = strtoupper($_POST['associado']);
    //$boleto = $_POST['boleto'];
    $valordi= $_POST['valordi'];
    $valordb = $_POST['valordb'];
    $valorcr = $_POST['valorcr'];
    $valordi = str_replace(',','.', str_replace('.','', $valordi));
    $valordb = str_replace(',','.', str_replace('.','', $valordb));
    $valorcr = str_replace(',','.', str_replace('.','', $valorcr));
    $motivo = $_POST['motivo'];
    $recibo = $_POST['recibo'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    
    
    //echo $associado." ".$empresa." ".$boleto." ".$motivo." ".$recibo." ".$descricao." ".$data." ".$valor."<br /> "

    include "conexao.php";

     $sql = "SELECT * FROM caixa WHERE associado = '$associado' AND data='$data'";
      $resultado = mysqli_query($conn,$sql) or die (mysql_error());
      while ($linha = mysqli_fetch_array($resultado)) {
             $ent_associado = $linha['associado'];
             $ent_boleto = $linha['boleto'];
             $ent_recibo = $linha['recibo'];
             $ent_data = $linha['data'];}
 
    if($valordi != 0.00){ 
     
        $sql = "insert into caixa(empresa,associado,boleto,motivo,recibo,descricao,data,valor) 
            values('$empresa','$associado','Dinheiro','$motivo','$recibo','$descricao','$data','$valordi')";
        $result = mysqli_query($conn,$sql) or die ("Cadastro da Entrada do Caixa não realizado.");
      
    }
    if($valordb != 0.00){
     
        $sql = "insert into caixa(empresa,associado,boleto,motivo,recibo,descricao,data,valor) 
            values('$empresa','$associado','Débito','$motivo','$recibo','$descricao','$data','$valordb')";
        $result = mysqli_query($conn,$sql) or die ("Cadastro da Entrada do Caixa não realizado.");
     
    }
    if($valorcr != 0.00){
     
        $sql = "insert into caixa(empresa,associado,boleto,motivo,recibo,descricao,data,valor) 
            values('$empresa','$associado','Crédito','$motivo','$recibo','$descricao','$data','$valorcr')";
        $result = mysqli_query($conn,$sql) or die ("Cadastro da Entrada do Caixa não realizado.");
     
    }
      echo "<script type = 'text/javascript'> location.href = 'entrada.php'</script>"; 
   
?>
 </div>
  <footer id="footer">   
     <?php include "footer.php"; ?>
  </footer>
</body>
</html>