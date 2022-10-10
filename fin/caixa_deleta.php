<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['idF'])){
    header("Location: index.php?erro=1");
    exit;
 }
 /*if($_SESSION['nivelF'] != 10){
   echo "<script>alert('Você não tem permissão para acessar está página!');history.back(-1);</script>";
   exit;
  }*/
 
  $id = $_GET['id'];
  $hoje = date("Y-m-d H:i:s");


  require_once("conexao.php");

    $sql1 = "SELECT *, DATE_FORMAT(data,'%d/%m/%Y') as dat FROM caixa WHERE idCaixa = '$id'";
	  $resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
		while ($linha1 = mysqli_fetch_array($resultado1)) {
    	$idCaixa = $linha1['idCaixa'];
      $empresa = $linha1['empresa'];
		  $associado = $linha1['associado'];
		  $boleto = $linha1['boleto'];
		  $motivo = $linha1['motivo'];
		  $recibo = $linha1['recibo'];
      $descricao = $linha1['descricao'];
      $data = $linha1['dat'];
      $data = date_format('$data', 'Y-m-d');
      $valor = $linha1['valor'];
    }
    $sql2 = "INSERT INTO caixaDeletada(idCaixa,empresa,associado,boleto,motivo,recibo,descricao,data,valor,hoje) 
            VALUES('$idCaixa','$empresa','$associado','Dinheiro','$motivo','$recibo','$descricao','$data','$valor','$hoje')";
    $result = mysqli_query($conn,$sql2) or die ("Erro.");
 

$sql = "DELETE FROM caixa WHERE idCaixa = '$id'";
mysqli_query($conn,$sql) or die (mysql_error());
 
echo "<script type = 'text/javascript'> location.href = 'entrada_caixa_lista.php'</script>"; 

?>