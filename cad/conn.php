<?php

$conn = mysqli_connect("localhost","idbrasco","Idb2017","idbrasco_global");
	
//$conn = mysqli_connect('localhost', 'root', '','global');

mysqli_set_charset($conn,"utf8");

if (!$conn) {
   die('Não conseguiu conectar: ' . mysql_error());
}

/* seleciona o banco demarso
$db_selected = mysql_select_db('festas', $conexao);
if (!$db_selected) {
   die ('Não pode selecionar o banco diario : ' . mysql_error());
}*/

?>