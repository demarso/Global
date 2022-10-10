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

    $sql1 = "SELECT *, DATE_FORMAT(data,'%d/%m/%Y') as dat FROM caixasaida WHERE idCaixaSaida = '$id'";
	  $resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
		while ($linha1 = mysqli_fetch_array($resultado1)) {
    	  $idCaixaSaida = $linha1['idCaixaSaida'];
        $beneficiario = $linha1['beneficiario'];
		    $descricao = $linha1['descricao'];
		    $data = $linha1['dat'];
        $data = date_format('$data', 'Y-m-d');
		    $recibo = $linha1['recibo'];
        $valor = $linha1['valor'];
        $status = $linha1['status'];
    }
   // echo $idCaixaSaida." ".$beneficiario." ".$descricao." ".$data." ".$recibo." ".$valor." ".$status." ".$hoje;
    
    $sql2 = "INSERT INTO caixasSaidaDeletada(
                                idCaixaSaida,
                                beneficiario,
                                descricao,
                                data,
                                recibo,
                                valor,
                                status,
                                hoje
                                ) VALUES
                               ('$idCaixaSaida',
                               '$beneficiario',
                               '$descricao',
                               '$data',
                               '$recibo',
                               '$valor',
                               '$status',
                               '$hoje'
                               )";
    $result2 = mysqli_query($conn,$sql2) or die ("Erro.");


   $sql = "DELETE FROM caixasaida WHERE idCaixaSaida = '$id'";
   if (mysqli_query($conn, $sql)) {
       echo "Item deletado";
   } else {
       echo "Erro em deletar item: " . mysqli_error($conn);
   }
   //$result = @mysqli_query($conn,$sql_ini);

 
echo "<script type = 'text/javascript'> location.href = 'saida_caixa_lista.php'</script>"; 

?>