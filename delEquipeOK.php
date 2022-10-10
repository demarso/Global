<?php

require_once("conexao.php");

      $id = $_POST['equipe'];
      

$sql_ini = "UPDATE equipe SET status='Inativo' WHERE idEquipe = '$id'";
mysqli_query($conn,$sql_ini) or die (mysql_error());
 
echo "<script type = 'text/javascript'> location.href = 'delEquipe.php'</script>"; 

?>