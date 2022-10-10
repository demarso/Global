<?php
session_start();
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
  
      include("conexao.php");
      
      $equipe = strtoupper($_POST['equipe']);
      $regional = strtoupper($_POST['regional']);

     // echo $equipe." ".$regional."<br />";

      $sql = "SELECT nome FROM equipe WHERE nome = '$equipe' AND status = 'Ativo'";
      
      $tabela = mysqli_query($conn,$sql) or die(mysql_error());
      $registro = mysqli_num_rows($tabela);
                        
      if ($registro != 0)
      {
           echo "<script>alert(\"Equipe já cadastrada!\");history.go(-1);</script>";
      }
      else
      {
           $sql1 = "INSERT INTO equipe (nome, regional, status) VALUES ('$equipe', '$regional', 'Ativo')";
           $result1 = mysqli_query($conn,$sql1) or die ("Cadastro da Equipe não realizado.");
            echo "<script type = 'text/javascript'> location.href = 'cadEquipe.php'</script>";
      }   

     
?>