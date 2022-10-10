<?php

require_once("conexao.php");

$sql_ini = "DELETE FROM placa WHERE placa = '$_GET[placa]'";
mysqli_query($conn,$sql_ini) or die (mysql_error());

//header("Location: javascript:history.back(1)"); 
echo "<script type = 'text/javascript'> location.href = 'index1.php'</script>"; 

?>