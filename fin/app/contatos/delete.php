<?php
	include "conexao.php";

	$id = $_POST['id'];
	$foto = $_POST['foto'];

	$sql_delete = "DELETE FROM contatos WHERE id=:id";

	$stmt = $PDO->prepare($sql_delete);

	$stmt->bindParam(':id', $id);

	if($stmt->execute()) {

		//===================================================================
		unlink($foto);
		//===================================================================

		$dados = array("DELETE"=>"OK");
	} else {

		$dados = array("DELETE"=>"ERRO");
	}

	echo json_encode($dados);
?>