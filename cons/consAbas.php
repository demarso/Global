<?php
  session_start();
  date_default_timezone_set('America/Sao_Paulo');
  
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CONSULTORES</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/navbar.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
</head>
<body class="bg-info">
  <?  include "menu.php"; ?>  
<div class="container" id="home">
  <?php
    
   include 'conexao.php'; 
 ?>
 <form name='form1' action='<? $myself ?>' method='post'>
   <tabel>
    <tr>
       <td><font size="6" color="yellow"><b>   Selecione o Consultor: </b></font></td>
         <td>
          <select name="ctor" id="ctor" onchange="this.form.submit()">
            <option value="">---</option>
              <?php
                
                $sql = "SELECT idConsultor, nome FROM consultor WHERE status='Ativo' ORDER BY nome";
                $results = mysqli_query($conn,$sql);
                while ( $row = mysqli_fetch_array($results) ) {
                  echo "<option value='".$row[0]."'>".$row[1]."</option>";
                }
              ?>
          </select>
         </td>
      </tr>
   </tabel>
  </form>
  <? 
     $consu = $_POST['ctor']; 
     $_SESSION['co'] = $consu;

  $sql1 = "SELECT * FROM consultor WHERE idConsultor = '$consu' and status='Ativo'";
   $resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
   while ($linha1 = mysqli_fetch_array($resultado1)) {
      $id = $linha1['idConsultor'];
      $id2 = str_pad( $id, 4, '0', STR_PAD_LEFT); 
      $nome = $linha1['nome']; 
      $regional = $linha1['regional'];
      $equipe = $linha1['equipe']; 
      $vinculo = $linha1['vinculo'];
      $stat = $linha1['status'];
  }
  ?>

 <font size="5" color="white">INFORMAÇÕES DO CONSULTOR: </font><font size="5" color="yellow"><? echo $nome ?></font>
  
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#dados">Dados</a></li>
    <li><a data-toggle="tab" href="#grafico">Gráfico</a></li>
    <li><a data-toggle="tab" href="#producao">Produção</a></li>
    <li><a data-toggle="tab" href="#controle">Controle</a></li>
  </ul>

  <div class="tab-content">
    <div id="dados" class="tab-pane fade in active">
      <h3>Dados</h3>
      <table class="table table-hover table-sm mt-0 mb-0" id="tabela">
          <tr align="center" bgcolor="#CCCCCC">
            <td align="center" style="width: 50%"><font color="#333333" size="3"><b>Cód. Consultor</b></font></td> 
            <td align="center" style="width: 50%"><font color="#333333" size="3"><b><? echo $id2; ?></b></font></td>
          </tr>
          <tr align="center" bgcolor="#CCCCCC">
            <td align="center" style="width: 50%"><font color="#333333" size="3"><b>Consultor</b></font></td>
            <td align="center" style="width: 50%"><font color="#333333" size="3"><b><? echo $nome; ?></b></font></td>  
          </tr>
          <tr align="center" bgcolor="#CCCCCC">
            <td align="center" style="width: 50%"><font color="#333333" size="3"><b>Regional</b></font></td>
            <td align="center" style="width: 50%"><font color="#333333" size="3"><b><? echo $regional; ?></b></font></td>
          </tr>
          <tr align="center" bgcolor="#CCCCCC">
            <td align="center" style="width: 50%"><font color="#333333" size="3"><b>Equipe</b></font></td>
            <td align="center" style="width: 50%"><font color="#333333" size="3"><b><? echo $equipe; ?></b></font></td>
          </tr>
          <tr align="center" bgcolor="#CCCCCC">
            <td align="center" style="width: 50%"><font color="#333333" size="3"><b>Vínculo</b></font></td>
            <td align="center" style="width: 50%"><font color="#333333" size="3"><b><? echo $vinculo; ?></b></font></td>
          </tr>
          <tr align="center" bgcolor="#CCCCCC">
            <td align="center" style="width: 50%"><font color="#333333" size="3"><b>Status</b></font></td>
            <td align="center" style="width: 50%"><font color="#333333" size="3"><b><? echo $stat; ?></b></font></td>
          </tr>
        </table>
    </div>
    <div id="grafico" class="tab-pane fade">
      <h3>Gráfico</h3>
      <? include "Grafico.php"; ?>
    </div>
    <div id="producao" class="tab-pane fade">
      <h3>Produção</h3>
     <? include ("Producao.php?consultor=".$consu); ?>
    </div>
    <div id="controle" class="tab-pane fade">
      <h3>Controle</h3>
      <p><? echo $consu; ?></p>
    </div>
  </div>



</div>

<? include "footer.html"; ?>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/script.js"></script>  
</body>
</html>