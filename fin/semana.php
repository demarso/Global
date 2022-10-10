<html>
<head>
<title></title>
</head>
<body>
<?php
	$meses = array (1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");
	$diasdasemana = array (1 => "Segunda-Feira",2 => "Terça-Feira",3 => "Quarta-Feira",4 => "Quinta-Feira",5 => "Sexta-Feira",6 => "Sábado",0 => "Domingo");
	 $hoje = getdate();
	 $dia = $hoje["mday"];
	 $mes = $hoje["mon"];
	 $nomemes = $meses[$mes];
	 $ano = $hoje["year"];
	 $diadasemana = $hoje["wday"];
	 $nomediadasemana = $diasdasemana[$diadasemana];
	 echo "$nomediadasemana, $dia de $nomemes de $ano";
	 
	 if($nomediadasemana == 'Segunda-Feira'){
        $ontem = date ("Y-m-d",mktime (0,0,0,$mes,$dia-2,$ano));
      }else{
        $ontem = date ("Y-m-d",mktime (0,0,0,$mes,$dia-1,$ano));
      }
       echo "<br />";
      echo $ontem;
	 ?>

</body>
</html>