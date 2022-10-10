<?php

require_once("conexao.php");

$id = $_GET['id'];
$sql = "DELETE FROM caixa WHERE idCaixa = '$id'";
mysqli_query($conn,$sql) or die (mysql_error());
 
echo "<script type = 'text/javascript'> location.href = 'entrada_caixa_lista.php'</script>"; 

?>