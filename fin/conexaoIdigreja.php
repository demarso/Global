<?php

$conn = mysqli_connect('bdhost0066.servidorwebfacil.com',"idigreja","Dms120429","idigreja_financas");
mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_query($conn,'SET character_set_connection=utf8');
mysqli_query($conn,'SET character_set_client=utf8');
mysqli_query($conn,'SET character_set_results=utf8');
mysqli_set_charset($conn,"utf8");
//$conn = mysqli_connect('localhost', 'root','','festas');
if (!$conn) {
   die('Não conseguiu conectar: ' . mysql_error());
}
/*
// seleciona o banco demarso
$db_selected = mysql_select_db('festas', $conexao);
if (!$db_selected) {
   die ('Não pode selecionar o banco diario : ' . mysql_error());
}*/

?>
