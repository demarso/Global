<?php
date_default_timezone_set('America/Sao_Paulo');
require_once("conexao.php");
$mes = date('m');
$ano = date('Y');

//echo $_GET[placa];
    $sql = "SELECT placa, dataProposta FROM producao WHERE placa = '$_GET[placa]' and MONTH(dataProposta)='$mes' and YEAR(dataProposta)='$ano'";
      $results = mysqli_query($conn,$sql) or die(mysql_error());
      while ( $row = mysqli_fetch_array($results )) {
      if(!empty($row["placa"]))
       //echo $row["nickigreja"].'        '; 
       echo "<script>alert('Placa já cadastrada!!'); location.href = 'cadProducao.php'</script>";
       exit;
             
}
      //else
      	//echo "<script>history.go(-1);</script>";
    
    
      //echo "<script type = 'text/javascript'> location.href = 'cadProducao.php'</script>"; 

?>