<?php
header('Content-type: text/html; charset=UTF-8');
require_once("conexao.php");
if ( !empty($_GET["Nome"]) ) {
    $nome2 = $_GET["Nome"];
	
	$sql = "SELECT idConsultor FROM consultor WHERE nome  = '$nome2' and status = 'Ativo'";
	$results = mysqli_query($conn,$sql) or die (mysql_error());
	while ( $row = mysqli_fetch_array($results )) {
		if(!empty($row["idConsultor"]))
		   $idco = $row["idConsultor"];
		   echo str_pad( $idco, 4, '0', STR_PAD_LEFT);
		   exit; 
      }
}
 
?>