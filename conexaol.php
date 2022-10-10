<?php
    
	$conn = mysqli_connect("localhost","cadglobal","Cgb2017","cadgloba_global");
	
	//$conn = mysqli_connect('localhost', 'root','','festas');
	if (!$conn) {
	   die('N&atilde;o conseguiu conectar: ' . mysql_error());
	}
	/*
	// seleciona o banco demarso
	$db_selected = mysql_select_db('festas', $conexao);
	if (!$db_selected) {
	   die ('Não pode selecionar o banco diario : ' . mysql_error());
	}*/

?>