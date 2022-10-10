<?php
  include "conexao.php";
  for($a=2021;$a<=2031;$a=$a+1){
	  for($x=1;$x<=12;$x=$x+1){
		  $sql1 = "INSERT INTO prodMes (mes, ano) VALUES ('$x','$a')";
		  $result1 = mysqli_query($conn,$sql1) or die ("Cadastro do Instalador não realizado.");
}}
?>