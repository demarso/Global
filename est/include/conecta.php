<?php
	//include com os dados para conectar com o mysql

	
	@ $base = mysql_connect('localhost','root','senha');
	if (mysql_errno()){
	echo "ERRO : " . mysql_errno() . "</body></html>";
	exit;
	}
	
	mysql_select_db("banco_de_dados", $base);

?>















