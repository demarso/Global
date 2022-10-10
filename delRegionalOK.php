<?php

require_once("conexao.php");

      $id = $_POST['regional'];
      

$sql_ini = "UPDATE regional SET status='Inativo' WHERE idRegional = '$id'";
mysqli_query($conn,$sql_ini) or die (mysql_error());
 
echo "<script type = 'text/javascript'> location.href = 'delRegional.php'</script>"; 

?>