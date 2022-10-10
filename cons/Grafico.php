<?php
  session_start();
  date_default_timezone_set('America/Sao_Paulo');
  if($_SESSION['nome'] != "Vivian Martins" && $_SESSION['nome'] != "Denilson Soares" && $_SESSION['nome'] != "MARIANNE COSTA" && $_SESSION['nome'] != "JOSE EDUARDO SOARES SALDANHA"){
     echo "<script>alert('Você não tem permissão para acessar está página!');</script>";
     echo "<script language=\"javascript\">window.close();</script>";
     exit;
   }
      
   include 'conexao.php'; 
   $consu = $_SESSION['co']; 
   //echo "Consultor: ".$consu;

   $anno = date("Y");
  //echo $consul;
  $meses = array('','Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez');
   for($x=1;$x<=12;$x=$x+1){
    $dinero[$x] = 0;
     
      $mes=$x;
       //FROM `producao` where idConsultor=119 and year(dataProposta)=2018 and MONTH(dataProposta) = 1
      $sql="SELECT count('idConsultor') as valor FROM producao WHERE idConsultor = '$consu' and YEAR(dataProposta) = '$anno' and MONTH(dataProposta)='$x'";
        $resp = mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($resp)){
           
          $dinero[$mes]=$dinero[$mes]+$row['valor'];
         //echo $mes."/".$y."  ";
      
        }
   } 
   $sql1 = "SELECT nome FROM consultor WHERE idConsultor = '$consu' and status='Ativo'";
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
          title: 'Acompanhamento da Produção de <?php echo $anno; ?> de <?php echo $consultor1; ?>',
          hAxis: {title: 'Grafico do desempenho da Produçao', titleTextStyle: {color: 'blue'}},
          
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
  </script>
       

</head>
<body class="bg-info">
<div class="container" id="home">
 <div id="chart_div" style="width: 500px; height: 300px;"></div>
</div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/script.js"></script>  
</body>
</html>