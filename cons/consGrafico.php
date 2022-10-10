<?php
  session_start();
  date_default_timezone_set('America/Sao_Paulo');
  if($_SESSION['nome'] != "Vivian Martins" && $_SESSION['nome'] != "Denilson Soares" && $_SESSION['nome'] != "MARIANNE COSTA" && $_SESSION['nome'] != "JOSE EDUARDO SOARES SALDANHA"){
     echo "<script>alert('Você não tem permissão para acessar está página!');</script>";
     echo "<script language=\"javascript\">window.close();</script>";
     exit;
   }
   
   unset( $_SESSION['mesc'] );
   unset( $_SESSION['anoc'] );
   include ("conexao.php");
   
   if(isset($_POST['anoc'])){
      $anoc = $_POST['anoc'];
      $consul = $_POST['consultor']; 
      $mes = date('m');
      $ano = date('Y');
  
       if($mes == 1) $mesatual = "JANEIRO";
       if($mes == 2) $mesatual = "FEVEREIRO";
       if($mes == 3) $mesatual = "MARÇO";
       if($mes == 4) $mesatual = "ABRIL";
       if($mes == 5) $mesatual = "MAIO";
       if($mes == 6) $mesatual = "JUNHO";
       if($mes == 7) $mesatual = "JULHO";
       if($mes == 8) $mesatual = "AGOSTO";
       if($mes == 9) $mesatual = "SETEMBRO";
       if($mes == 10) $mesatual = "OUTUBRO";
       if($mes == 11) $mesatual = "NOVEMBRO";
       if($mes == 12) $mesatual = "DEZEMBRO";
     
   

  $meses = array('','Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez');
   for($x=1;$x<=12;$x=$x+1){
    $dinero[$x] = 0;
     
      $mes=$x;
       //FROM `producao` where idConsultor=119 and year(dataProposta)=2018 and MONTH(dataProposta) = 1
      $sql="SELECT count('idConsultor') as valor FROM producao WHERE idConsultor = '$consul' and YEAR(dataProposta) = '$anoc' and MONTH(dataProposta)='$x'";
        $resp = mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($resp)){
           
          $dinero[$mes]=$dinero[$mes]+$row['valor'];
         //echo $mes."/".$y."  ";
      
        }
   } 
  }
  $sql1 = "SELECT nome FROM consultor WHERE idConsultor = '$consul'";
   $resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
   while ($linha1 = mysqli_fetch_array($resultado1)) {
       $consultor1 = $linha1['nome'];
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GESTÃO - GLOBAL</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/navbar.css">
      <script type="text/javascript" src="https://www.google.com/jsapi"></script>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mes', 'Produção'],
          <?php
            for($x=1;$x<=12;$x=$x+1){ 
          ?>
          ['<?php echo $meses[$x]; ?>', <?php echo $dinero[$x]; ?>],
          <?php } ?>
        ]);

        
        var options = {
          title: 'Acompanhamento da Produção de <?php echo $anoc; ?> de <?php echo $consultor1; ?>',
          hAxis: {title: 'Grafico do desempenho da Produçao', titleTextStyle: {color: 'blue'}},
          
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
       

</head>
<body class="bg-info">
  <?  include "menu.php"; ?>  
<div class="container" id="home">
  
  <div class="row">
    <div class="col-12 mt-4 mb-1"> 
      <form class="form-inline" name='form1' action='<? $myself ?>' method='post'>
        <div class="form-group row mt-1 mb-1">
          <label class="col-sm-4 col-form-label mr-0" for="consultor"><b>Selecione o Consultor:</b></label>
          <div class="col-md-3">
            <select class="form-control ml-0" name="consultor" id="consultor">
                <option value="">---</option>
                  <?php
                    
                    $sql = "SELECT idConsultor, nome FROM consultor WHERE status='Ativo' ORDER BY nome";
                    $results = mysqli_query($conn,$sql);
                    while ( $row = mysqli_fetch_array($results) ) {
                      echo "<option value='".$row[0]."'>".$row[1]."</option>";
                    }
                  ?>
            </select>
          </div>
        </div>   
        <div class="form-group row mt-1 mb-1 ml-5">
          <label class="col-sm-2 col-form-label" for="anoc"><b>Ano:</b></label>
          <div class="col-md-3">
               <select class="form-control" name="anoc" id="anoc" onchange="this.form.submit()">
                <option value=""> - - -</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2025">2026</option>
                <option value="2025">2027</option>
                <option value="2025">2028</option>
                <option value="2025">2029</option>
                <option value="2025">2030</option>
               </select>
          </div>
        </div>    
      <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagens/q_pret.png" width="20">&nbsp;&nbsp;<font size="5">- Normal/Ativo</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagens/q_verm.png" width="20">&nbsp;&nbsp;<font size="5">- Substituição</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagens/q_cian.png" width="20">&nbsp;&nbsp;<font size="5">- Inativo</font>-->
      </form>
    </div>
  </div>
  
 <div id="chart_div" style="width: 98%; height: 450px;"></div>

</div>
<? include "footer.html"; ?>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/script.js"></script>  
</body>
</html>