<?php

$id = $_REQUEST['IDUsuario'];
$Nome = $_REQUEST['Nome'];
$login = $_REQUEST['login'];
$Senha = $_REQUEST['senha'];
$Email = $_REQUEST['email'];
$Nivel = $_REQUEST['nivel'];
$Status = $_REQUEST['status'];

  $confu1 = "L2xB3Sbia";
  $confu2 = "Dawi748v2";
  $senha1 = $Senha;
  $senha1 = $confu1.$senha1.$confu2;
  $senha1 = hash( 'SHA256',$senha1);

include 'conn.php';

$sql = "update usuario set Nome='$Nome',login='$login',senha='$senha1',email='$Email',nivel='$Nivel',status='$Status' where IDUsuario=$id";
$result = @mysqli_query($conn,$sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Erro ao atualizar dados.'));
}
?>