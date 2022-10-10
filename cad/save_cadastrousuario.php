<?php
$Nome = $_REQUEST['Nome'];
$Login = $_REQUEST['login'];
$Senha = $_REQUEST['senha'];
$Email = $_REQUEST['email'];
$Nivel = $_REQUEST['nivel'];
$Status = $_REQUEST['status'];

  $confu1 = "L2xB3Sbia";
  $confu2 = "Dawi748v2";
  $senha1 = $Senha;
  $senha1 = $confu1.$senha1.$confu2;
  $senha1 = hash( 'SHA256',$senha1);

include "conn.php";

$sql = "insert into usuario(Nome,login,senha,email,nivel,status) 
        values('$Nome','$Login','$senha1','$Email','$Nivel','$Status')";
$result = @mysqli_query($conn,$sql);

echo json_encode(array(
	'Nome' => $Nome,
	'login' => $Login,
	'senha' => $Senha,
	'email' => $Email,
	'nivel' => $Nivel,
	'status' => $Status
));

?>