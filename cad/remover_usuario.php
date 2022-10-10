<?php

$id = intval($_REQUEST['id']);

include 'conn.php';

$sql = "delete from usuario where IDUsuario=$id";
$result = @mysqli_query($conn,$sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Erro ao remover dados.'));
}
?>