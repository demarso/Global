<?php

require_once("conexao.php");

$sql_ini = "UPDATE instalador SET status='Inativo' WHERE nome = '$_GET[nome]'";
mysqli_query($conn,$sql_ini) or die (mysql_error());
 
echo "<script type = 'text/javascript'> location.href = 'index1.php'</script>"; 

?>