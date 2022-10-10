<?php
  header("Content-Type: text/html;  charset=ISO-8859-1",true);
require_once("conexao.php");
 session_start();
if ( !empty($_GET["Nome"]) ) {
    $tit = $_GET["Nome"];
	
	$sql = "SELECT texto FROM contrato WHERE titulo  = '$tit'";
	$results = mysqli_query($conn, $sql) or die (mysql_error());
	if(mysqli_num_rows($results)){
		
		while ( $row = mysqli_fetch_array($results )) {
			echo $row['texto'];
		}
	}
	 else {
		echo "";
	 }
}
 else {
	echo "";
}
 
?>