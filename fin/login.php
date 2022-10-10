<?php

require "conexao.php";

$usuario = $_POST["login_name"];
$senha = $_POST["login_pass"];


	$confu1 = "L2xB3Sbia";
	$confu2 = "Dawi748v2";
	$senha1 = $senha;
	$senha1 = $confu1.$senha1.$confu2;
	$senha1 = hash( 'SHA256',$senha1);

$sql_query = "select nome from usuariof where login like '$usuario' and senha like '$senha1';";

$result = mysqli_query($conn, $sql_query);

if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);

$nome = $row["nome"];

echo "Olá, bem vindo ".$nome;


}
else {
echo "Erro no login, usuário ou senha inválidos";
}

?>