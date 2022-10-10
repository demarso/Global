<?php 
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
 if($_SESSION['nivel'] != 0  && $_SESSION['nivel'] != 10){
     echo "<script>alert('Voce nao tem permissao para acessar esta pagina!');history.back(-1);</script>";
     exit;
 }    
	
 include 'conexao.php';
	for($x=1;$x<=12;$x=$x+1){
		$dinero[$x] = 0;
	}
	
	$meses = array('','Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez');
	
  if (empty($_POST['anoc']))	
	     $anno = date("Y");
     else  
       $anno = $_POST['anoc'];
	
	$sql="SELECT * FROM prodmes WHERE ano = '$anno'";
    $resp = mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($resp)){
		
		$y=$row['ano'];
		
		$mes=$row['mes'];
		//echo $mes."/".$y."  ";
		if($y==$anno){
		$dinero[$mes]=$dinero[$mes]+$row['valor'];
	    }
     }
	
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/estilo.css" />
  <link rel="stylesheet" href="css/style_menu.css" type="text/css" />
  <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
  <script type="text/javascript" src="include/script.js"></script>
  <script type="text/javascript" src="include/jquery-latest.min.js"></script>
  <script type="text/javascript" src="include/script_menu.js"></script>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      //google.load("visualization", "1", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      //google.setOnLoadCallback(drawChart);
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
          title: 'Comparativo da Produção de <?php echo $anno; ?>',
          hAxis: {title: 'Grafico do desempenho da Produçao', titleTextStyle: {color: 'blue'}}
        };
        
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
  </script>
<title>Gráfico Produção</title>
</head>

<body>
<? include "cabecalho1P.php";  ?>
<div id="interface">
  <form name='form1' action='<? $myself ?>' method='post'>
   <table>
    <tr>
           <td><font color="cyan"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SELECIONE PARA CONSULTAR OUTRO ANO:</b></font></td>
           <td><font color="yellow"><b>Ano:</b></font></td>
           <td>
             <select name="anoc" id="anoc" onchange="this.form.submit()">
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
             </select>
           </td>
    </tr>
    
   </table>
  <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagens/q_pret.png" width="20">&nbsp;&nbsp;<font size="5">- Normal/Ativo</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagens/q_verm.png" width="20">&nbsp;&nbsp;<font size="5">- Substituição</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagens/q_cian.png" width="20">&nbsp;&nbsp;<font size="5">- Inativo</font>-->
  </form>
		<div id="chart_div" style="width: 98%; height: 450px;"></div>
</div>
</body>
</html>