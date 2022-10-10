<?php 

	include 'conexao.php';
	for($x=1;$x<=12;$x=$x+1){
		$dinero[$x] = 0;
	}
	
	$meses = array('','Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez');
		
	$anno=date('Y');
	$mes=date('m');
  for($contador = 0; $contador < 2; $contador++)
{
    if($contador == 1)
        $mes = $mes-1;
    
    echo $mes." ";
      $sql1 = "SELECT * FROM consultor ORDER BY nome";
      $resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
      while ($linha1 = mysqli_fetch_array($resultado1)){
             $id = $linha1['idConsultor'];
             $consultor1 = $linha1['nome'];
             $equipe1 = $linha1['equipe'];
             $regional1 = $linha1['regional'];
             $stat = $linha1['status'];
             $sub = 0;
              //echo $consultor1."  ".$equipe1."  ".$regional1."<br >";
              if($equipe1 == "ÁGUIA"){
              $sql = "SELECT idConsultor, count(idConsultor) as cons FROM producao WHERE idConsultor='$id' AND MONTH(dataProposta) = '$mes' AND status = 'Ativo'";
              // AND WHERE MONTH(dataProposta) = '$mes'
              $resultado = mysqli_query($conn,$sql) or die (mysql_error());
              while ($linha = mysqli_fetch_array($resultado)) {
                $contcons = $linha['cons'];
                $id2 = $linha['idConsultor'];
                // echo "Consultor: ".$contcons."<br />";
              }
              $sql2 = "SELECT substituicao FROM producao WHERE idConsultor='$id2' AND MONTH(dataProposta) = '$mes' AND status = 'Ativo'";
              $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
              while ($linha2 = mysqli_fetch_array($resultado2)) {
                $subst = $linha2['substituicao'];
                //$dataCadastro = $linha['idatacad'];
                if($subst == "Sim")
                     $sub = $sub + 1;
              }
              }$totAguia = $contcons - $sub; 

              if($equipe1 == "ALFA"){
              $sql = "SELECT idConsultor, count(idConsultor) as cons FROM producao WHERE idConsultor='$id' AND MONTH(dataProposta) = '$mes' AND status = 'Ativo'";
              // AND WHERE MONTH(dataProposta) = '$mes'
              $resultado = mysqli_query($conn,$sql) or die (mysql_error());
              while ($linha = mysqli_fetch_array($resultado)) {
                $contcons = $linha['cons'];
                $id2 = $linha['idConsultor'];
                // echo "Consultor: ".$contcons."<br />";
              }
              $sql2 = "SELECT substituicao FROM producao WHERE idConsultor='$id2' AND MONTH(dataProposta) = '$mes' AND status = 'Ativo'";
              $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
              while ($linha2 = mysqli_fetch_array($resultado2)) {
                $subst = $linha2['substituicao'];
                //$dataCadastro = $linha['idatacad'];
                if($subst == "Sim")
                     $sub = $sub + 1;
              }
              }$totAlfa = $contcons - $sub;


              if($equipe1 == "DESBRAVADORES"){
              $sql = "SELECT idConsultor, count(idConsultor) as cons FROM producao WHERE idConsultor='$id' AND MONTH(dataProposta) = '$mes' AND status = 'Ativo'";
              // AND WHERE MONTH(dataProposta) = '$mes'
              $resultado = mysqli_query($conn,$sql) or die (mysql_error());
              while ($linha = mysqli_fetch_array($resultado)) {
                $contcons = $linha['cons'];
                $id2 = $linha['idConsultor'];
                // echo "Consultor: ".$contcons."<br />";
              }
              $sql2 = "SELECT substituicao FROM producao WHERE idConsultor='$id2' AND MONTH(dataProposta) = '$mes' AND status = 'Ativo'";
              $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
              while ($linha2 = mysqli_fetch_array($resultado2)) {
                $subst = $linha2['substituicao'];
                //$dataCadastro = $linha['idatacad'];
                if($subst == "Sim")
                     $sub = $sub + 1;
              }
              }$totDesb = $contcons - $sub;

              if($equipe1 == "ELITE"){
              $sql = "SELECT idConsultor, count(idConsultor) as cons FROM producao WHERE idConsultor='$id' AND MONTH(dataProposta) = '$mes' AND status = 'Ativo'";
              // AND WHERE MONTH(dataProposta) = '$mes'
              $resultado = mysqli_query($conn,$sql) or die (mysql_error());
              while ($linha = mysqli_fetch_array($resultado)) {
                $contcons = $linha['cons'];
                $id2 = $linha['idConsultor'];
                // echo "Consultor: ".$contcons."<br />";
              }
              $sql2 = "SELECT substituicao FROM producao WHERE idConsultor='$id2' AND MONTH(dataProposta) = '$mes' AND status = 'Ativo'";
              $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
              while ($linha2 = mysqli_fetch_array($resultado2)) {
                $subst = $linha2['substituicao'];
                //$dataCadastro = $linha['idatacad'];
                if($subst == "Sim")
                     $sub = $sub + 1;
              }
              }$totElite = $contcons - $sub;

              if($equipe1 == "FENIX"){
              $sql = "SELECT idConsultor, count(idConsultor) as cons FROM producao WHERE idConsultor='$id' AND MONTH(dataProposta) = '$mes' AND status = 'Ativo'";
              // AND WHERE MONTH(dataProposta) = '$mes'
              $resultado = mysqli_query($conn,$sql) or die (mysql_error());
              while ($linha = mysqli_fetch_array($resultado)) {
                $contcons = $linha['cons'];
                $id2 = $linha['idConsultor'];
                // echo "Consultor: ".$contcons."<br />";
              }
              $sql2 = "SELECT substituicao FROM producao WHERE idConsultor='$id2' AND MONTH(dataProposta) = '$mes' AND status = 'Ativo'";
              $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
              while ($linha2 = mysqli_fetch_array($resultado2)) {
                $subst = $linha2['substituicao'];
                //$dataCadastro = $linha['idatacad'];
                if($subst == "Sim")
                     $sub = $sub + 1;
              }
              }$totFenix = $contcons - $sub;

              if($equipe1 == "GLOBAL"){
              $sql = "SELECT idConsultor, count(idConsultor) as cons FROM producao WHERE idConsultor='$id' AND MONTH(dataProposta) = '$mes' AND status = 'Ativo'";
              // AND WHERE MONTH(dataProposta) = '$mes'
              $resultado = mysqli_query($conn,$sql) or die (mysql_error());
              while ($linha = mysqli_fetch_array($resultado)) {
                $contcons = $linha['cons'];
                $id2 = $linha['idConsultor'];
                // echo "Consultor: ".$contcons."<br />";
              }
              $sql2 = "SELECT substituicao FROM producao WHERE idConsultor='$id2' AND MONTH(dataProposta) = '$mes' AND status = 'Ativo'";
              $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
              while ($linha2 = mysqli_fetch_array($resultado2)) {
                $subst = $linha2['substituicao'];
                //$dataCadastro = $linha['idatacad'];
                if($subst == "Sim")
                     $sub = $sub + 1;
              }
              }$totGlob = $contcons - $sub;

              if($equipe1 == "POWER"){
              $sql = "SELECT idConsultor, count(idConsultor) as cons FROM producao WHERE idConsultor='$id' AND MONTH(dataProposta) = '$mes' AND status = 'Ativo'";
              // AND WHERE MONTH(dataProposta) = '$mes'
              $resultado = mysqli_query($conn,$sql) or die (mysql_error());
              while ($linha = mysqli_fetch_array($resultado)) {
                $contcons = $linha['cons'];
                $id2 = $linha['idConsultor'];
                // echo "Consultor: ".$contcons."<br />";
              }
              $sql2 = "SELECT substituicao FROM producao WHERE idConsultor='$id2' AND MONTH(dataProposta) = '$mes' AND status = 'Ativo'";
              $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
              while ($linha2 = mysqli_fetch_array($resultado2)) {
                $subst = $linha2['substituicao'];
                //$dataCadastro = $linha['idatacad'];
                if($subst == "Sim")
                     $sub = $sub + 1;
              }
              }$totPower = $contcons - $sub;

              if($equipe1 == "PUPILOS"){
              $sql = "SELECT idConsultor, count(idConsultor) as cons FROM producao WHERE idConsultor='$id' AND MONTH(dataProposta) = '$mes' AND status = 'Ativo'";
              // AND WHERE MONTH(dataProposta) = '$mes'
              $resultado = mysqli_query($conn,$sql) or die (mysql_error());
              while ($linha = mysqli_fetch_array($resultado)) {
                $contcons = $linha['cons'];
                $id2 = $linha['idConsultor'];
                // echo "Consultor: ".$contcons."<br />";
              }
              $sql2 = "SELECT substituicao FROM producao WHERE idConsultor='$id2' AND MONTH(dataProposta) = '$mes' AND status = 'Ativo'";
              $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
              while ($linha2 = mysqli_fetch_array($resultado2)) {
                $subst = $linha2['substituicao'];
                //$dataCadastro = $linha['idatacad'];
                if($subst == "Sim")
                     $sub = $sub + 1;
              }
              }$totPupi = $contcons - $sub;

              if($equipe1 == "SNIPER"){
              $sql = "SELECT idConsultor, count(idConsultor) as cons FROM producao WHERE idConsultor='$id' AND MONTH(dataProposta) = '$mes' AND status = 'Ativo'";
              // AND WHERE MONTH(dataProposta) = '$mes'
              $resultado = mysqli_query($conn,$sql) or die (mysql_error());
              while ($linha = mysqli_fetch_array($resultado)) {
                $contcons = $linha['cons'];
                $id2 = $linha['idConsultor'];
                // echo "Consultor: ".$contcons."<br />";
              }
              $sql2 = "SELECT substituicao FROM producao WHERE idConsultor='$id2' AND MONTH(dataProposta) = '$mes' AND status = 'Ativo'";
              $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
              while ($linha2 = mysqli_fetch_array($resultado2)) {
                $subst = $linha2['substituicao'];
                //$dataCadastro = $linha['idatacad'];
                if($subst == "Sim")
                     $sub = $sub + 1;
              }
              }$totSnip = $contcons - $sub;


              if($equipe1 == "TSUNAMI"){
              $sql = "SELECT idConsultor, count(idConsultor) as cons FROM producao WHERE idConsultor='$id' AND MONTH(dataProposta) = '$mes' AND status = 'Ativo'";
              // AND WHERE MONTH(dataProposta) = '$mes'
              $resultado = mysqli_query($conn,$sql) or die (mysql_error());
              while ($linha = mysqli_fetch_array($resultado)) {
                $contcons = $linha['cons'];
                $id2 = $linha['idConsultor'];
                // echo "Consultor: ".$contcons."<br />";
              }
              $sql2 = "SELECT substituicao FROM producao WHERE idConsultor='$id2' AND MONTH(dataProposta) = '$mes' AND status = 'Ativo'";
              $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
              while ($linha2 = mysqli_fetch_array($resultado2)) {
                $subst = $linha2['substituicao'];
                //$dataCadastro = $linha['idatacad'];
                if($subst == "Sim")
                     $sub = $sub + 1;
              }
              }$totTsun = $contcons - $sub;
      } 
          $totalG = $totTsun+$totSnip+$totPupi+$totPower+$totGlob+$totFenix+$totElite+$totDesb+$totAlfa+$totAguia;

           $sql = "update prodMes2 set valor='$totalG' where mes = '$mes' AND ano = '$anno'";
             $result = @mysqli_query($conn,$sql);
}

	$sql="SELECT * FROM prodMes2";
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
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
  <link rel="stylesheet" type="text/css" href="css/forms.css"/>
  <title>Global - Produção</title>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
  <input id="save-pdf" type="button" value="Savar em PDF" disabled />
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
          title: 'Comparativo da Produção de <?php echo $anno; ?>',
          hAxis: {title: 'Grafico do desempenho da Produçao', titleTextStyle: {color: 'blue'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      

  //var container = document.getElementById('chart_div');
  //var chart = new google.visualization.ColumnChart(container);
  var btnSave = document.getElementById('save-pdf');

  google.visualization.events.addListener(chart, 'ready', function () {
    btnSave.disabled = false;
  });
 
  btnSave.addEventListener('click', function () {
    var doc = new jsPDF('landscape');
    doc.addImage(chart.getImageURI(), 0, 0);
    doc.save('grafico.pdf');
  }, false);

    chart.draw(data, {
      chartArea: {
        bottom: 24,
        left: 60,
        right: 30,
        top: 50,
        width: '100%',
        height: '100%'
      },
      height: 500,
      title: 'Gráfico da Produção de <?php echo $anno; ?>',
      width: 1170
    });
   }
</script>
<title>Gráfico Produção</title>
</head>

<body>
<? include "cabecalho1P.php";  ?>
<div id="interface">
		<div id="chart_div" style="width: 98%; height: 500px;"></div>
</div>
</body>
</html>