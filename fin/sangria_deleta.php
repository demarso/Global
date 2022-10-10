<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['idF'])){
    header("Location: index.php?erro=1");
    exit;
 }
/* if($_SESSION['nivelF'] != 10){
   echo "<script>alert('Você não tem permissão para acessar está página!');history.back(-1);</script>";
   exit;
  }*/

  $id = $_GET['id'];
  $hoje = date("Y-m-d H:i:s");


  require_once("conexao.php");

   $sql1 = "SELECT *, DATE_FORMAT(dataCaixa,'%d/%m/%Y') as dat FROM sangria WHERE idSangria = '$id'";
		$resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
		while ($linha1 = mysqli_fetch_array($resultado1)) {
   		$idS = $linha1['idSangria'];
		  $data = $linha1['dat'];
      $data = date_format('$data', 'Y-m-d');
      $valor = $linha1['valor'];
    }

    $sql2 = "INSERT INTO sangriaDeletada(idSangria,dataCaixa,valor,status,hoje)
             VALUES('$id','$data','$valor','0','$hoje')";
      $result2 = mysqli_query($conn,$sql2) or die ("Erro.");


    $sql = "DELETE FROM sangria where idSangria = '$id'";
    $result = @mysqli_query($conn,$sql);

		//$sql = "DELETE FROM sangria WHERE idSangria = '$id'";
		//mysqli_query($conn,$sql) or die (mysql_error());
 
echo "<script type = 'text/javascript'> location.href = 'saida_caixa_lista.php'</script>"; 

?>