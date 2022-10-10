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
    $empresa = $_POST['empresa'];
    $associado = strtoupper($_POST['associado']);
    $boleto = $_POST['boleto'];
    $motivo = $_POST['motivo'];
    $recibo = $_POST['recibo'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $valor = $_POST['valor'];
   // $valor = str_replace(',','.', str_replace('.','', $valor));
    
    //echo $associado." ".$empresa." ".$boleto." ".$motivo." ".$recibo." ".$descricao." ".$data." ".$valor."<br /> "

    include "conexao.php";

     $sql = "update caixa set empresa='$empresa',associado='$associado',boleto='$boleto',motivo='$motivo',recibo='$recibo',descricao='$descricao',data='$data',valor='$valor' where idCaixa=$id";
    $result = @mysqli_query($conn,$sql);

    
      echo "<script type = 'text/javascript'> location.href = 'entrada_caixa_lista.php'</script>"; 
   
?>
 </div>
  <footer id="footer">   
     <?php include "footer.php"; ?>
  </footer>
</body>
</html>