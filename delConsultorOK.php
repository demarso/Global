<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
require_once("conexao.php");
$motivo = "Inativado";
$datacadA = date('Y-m-d');
$horacadA = date('H:i');
$responsavel = $_SESSION['nome'];

$id = $_GET['id'];
 
    $sql_ini = "UPDATE consultor SET status='Inativo' WHERE idConsultor = '$id'";
    mysqli_query($conn,$sql_ini) or die (mysql_error());
 
    $sql3 = "INSERT INTO consultorHistorico (idConsultor,data,hora,motivo,responsavel) VALUES ('$id','$datacadA','$horacadA','$motivo','$responsavel')";
    $result = mysqli_query($conn,$sql3) or die ("Cadastro do Histórico do Consultor não realizado.");

    echo "<script type = 'text/javascript'> location.href = 'consultor_lista.php'</script>";

?>