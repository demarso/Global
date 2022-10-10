<?php

date_default_timezone_set('America/Sao_Paulo');

 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" type="text/css" href="css/estilo.css?version=12" />
  <link rel="stylesheet" type="text/css" href="css/style_menu.css" />
  <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
  <script type="text/javascript" src="include/script.js"></script>
  <script type="text/javascript" src="include/jquery-latest.min.js"></script>
  <script type="text/javascript" src="include/script_menu.js"></script>
  <!--<script type="text/javascript" src="include/micoxAjax.js"></script>-->
  <title>Gestão de Propostas</title> 

</head>
<body>
<?php include "cabecalho1P.php";  ?>
<div id="interface">
  <?php 
   include "conexao.php";
   $hoje = date('Y/m/d');
   $hojeBr = date('d/m/Y');
   $cont = 1;
   

  
   $lista = array();
   $ids = array();
     $sql = "SELECT idConsultor, nome FROM consultor WHERE status='Ativo' order by nome";
      $results = mysqli_query($conn,$sql);
      $reg = mysqli_num_rows($results);
      while ( $row = mysqli_fetch_array($results) ) {
        $lista[$cont] = ($row['nome']);
        $ids[$cont] = ($row['idConsultor']);
        $cont = $cont + 1;
      }
      $cont = $cont - 1;
    if(isset($_POST['sort'])){  
      $sort = rand(1,$reg);
      $idSort = $ids[$sort];
      $sorteado = $lista[$sort];

      $sql = "INSERT INTO sorteioSup (idConsultor,dataSorteio,nome) VALUES ('$idSort', '$hoje', '$sorteado')";
      $result = mysqli_query($conn,$sql) or die ("Cadastro do Consultor não realizado."); 
    }
  ?>

  <div id="palco4">
   <center>
   <form name='form1' action='<? $myself ?>' method='post'>
    <input type="hidden" name="sort" value="1">
    <input type="submit" class="button" size="150" style="width: 250px; height: 40px" align="center" value="S  O  R  T  E  A  R">
  </form>
  </center><br />
    <?
    echo "<font color='blue' size='5'>Sorteado: ".array_search($sorteado, $lista)."    Data: ".$hojeBr."</font><br />";  
      echo "<font color='blue' size='5'> ID:<br /></font><font color='yellow' size='5'>".$ids[$sort]."</font><br /><font color='blue' size='5'>Nome:</font><br /><font color='yellow' size='5'>".$lista[$sort]."</font></b><br /><br />"; 
      echo "<center><font color='yellow' size='5'>HISTÓRICO DO SORTEIO</font><br /></center>";
      ?>
  
  <div style="height: 300px; overflow: auto;">
      <table align="center" width="80%" border="1">
        <thead>
          <th style="width: 10%">ID</th>
          <th style="width: 20%">Data</th>
          <th style="width: 70%">Nome</th>
        </thead>
      </table>

      <?php
       $sql1 = "SELECT *,DATE_FORMAT(dataSorteio,'%d/%m/%Y') as idata FROM sorteioSup ORDER BY dataSorteio DESC,nome ASC";
        //WHERE MONTH(dataProposta) = '$mes'
        $resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
        while ($linha1 = mysqli_fetch_array($resultado1)) {
          $idSorteio = $linha1['IdSorteio'];
          $idSup = $linha1['IdConsultor'];
          $id2 = str_pad( $idSup, 4, '0', STR_PAD_LEFT); 
          $nome = $linha1['nome']; 
          $dataSorteio = $linha1['idata'];
      ?>
      <table align="center" width="80%" border="1">
        <body>
          <tr>
            <td style="width: 10%"><? echo $id2; ?></td>
            <td style="width: 20%"><? echo $dataSorteio; ?></td>
            <td style="width: 70%"><? echo $nome; ?></td>
          </tr>
        </body>
      </table>
    <? } ?>
  </div>
  </div>
  <div id="palco3">
   <?
   echo "<font color='blue' size='5'>LISTA DE CONSULTORES</font><br />";
   for($n=1; $n<$reg+1; $n++){
        echo $n."-".$lista[$n]."<br />";
    }  //array_search($sorteado, $lista) ?>
</div>
</div>
 <footer id="footer">   
   <?php include "footer.php"; ?>
</footer>

</body>
</html>