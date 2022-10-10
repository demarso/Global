<?php
	include "conexao.php";

	$sql_read = "SELECT * FROM caixaSaldo";
	$dados = $PDO->query($sql_read);

	$resultado = array();

	while($c = $dados->fetch(PDO::FETCH_OBJ)) {

		$resultado[] = array("idSaldo"=>$c->idSaldo, "data"=>$c->data, "dinheiro"=>$c->dinheiro, "debito"=>$c->debito, "credito"=>$c->credito, "total"=>$c->total, "saida"=>$c->saida, "valor"=>$c->valor);
	}

	echo json_encode($resultado);
?>