<?php

require_once("conexao.php");

$id = $_GET['id'];
$sql = "DELETE FROM finDir WHERE idFindir = '$id'";
mysqli_query($conn,$sql) or die (mysql_error());
 
echo "<script type = 'text/javascript'> location.href = 'entrFinDir.php'</script>"; 

?>