<?php
 
  $dia = date("d",mktime());
  $mes = date("m",mktime());
  $ano = date("Y",mktime());
  $var = date("d/m/Y");
  $date = str_replace('/', '-', $var);
  $dataH = date("Y-m-d", strtotime($date));
  $ontem = date("Y-m-d",mktime (0,0,0,$mes,$dia,$ano));
 $antiontem = date("Y-m-d",mktime (0,0,0,$mes,$dia-2,$ano));
 echo $ontem."<br />";
 echo $antiontem."<br /><br />";
  include "conexao.php";
      
     $sql20 = "SELECT valor FROM caixasaldo where data = '$antiontem' AND status=1";
         $result20 = mysqli_query($conn,$sql20) or die (mysql_error());
         while ($linha20 = mysqli_fetch_array($result20)) {
             $salAntiOnt = $linha20['valor']; }
             $salAntiOnt2 = number_format($salAntiOnt, 2, ',', '.');

     $sql21 = "SELECT valor FROM caixasaldo where data = '$ontem' AND status=1";
         $result21 = mysqli_query($conn,$sql21) or die (mysql_error());
         while ($linha21 = mysqli_fetch_array($result21)) {
             $salOnt = $linha21['valor']; }
             $salOnt2 = number_format($salOnt, 2, ',', '.');

     $sql22 = "SELECT valor FROM caixasaldo where data = '$dataH' AND status=1";
         $result22 = mysqli_query($conn,$sql22) or die (mysql_error());
         while ($linha22 = mysqli_fetch_array($result22)) {
             $saldohoje = $linha22['valor']; } 
             //$saldohoje = number_format($saldohoje, 2, ',', '.');                  

      $sql = "SELECT sum(valor) as val FROM caixa where data = '$ontem' and boleto = 'Dinheiro'";
      $resultado = mysqli_query($conn,$sql) or die (mysql_error());
      while ($linha = mysqli_fetch_array($resultado)) {
             $ent_din = $linha['val'];}
            // $ent_din = $ent_din + $_SESSION['sald'];
             $ent_din2 = number_format($ent_din, 2, ',', '.'); // str_replace('.',',',str_replace(',','.',$ent_din));
      
      $sql2 = "SELECT sum(valor) as val2 FROM caixa where data = '$ontem' and boleto = 'Crédito'";
      $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
      while ($linha2 = mysqli_fetch_array($resultado2)) {
             $ent_cre = $linha2['val2'];}
             $ent_cre2 = number_format($ent_cre, 2, ',', '.'); //str_replace('.',',',str_replace(',','.',$ent_cre));
      
      $sql3 = "SELECT sum(valor) as val3 FROM caixa where data = '$ontem' and boleto = 'Débito'";
      $resultado3 = mysqli_query($conn,$sql3) or die (mysql_error());
      while ($linha3 = mysqli_fetch_array($resultado3)) {
             $ent_deb = $linha3['val3'];}
             $ent_deb2 = number_format($ent_deb, 2, ',', '.'); //str_replace('.',',',str_replace(',','.',$ent_deb));       
      
      $sql4 = "SELECT sum(valor) as val4 FROM caixasaida where data = '$ontem'";
      $resultado4 = mysqli_query($conn,$sql4) or die (mysql_error());
      while ($linha4 = mysqli_fetch_array($resultado4)) {
             $saidas = $linha4['val4'];}
             //$saidas = number_format($saidas, 2, ',', '.');
      
      $sql5 = "SELECT sum(valor) as val5 FROM sangria where dataCaixa = '$ontem'";
      $resultado5 = mysqli_query($conn,$sql5) or die (mysql_error());
      while ($linha5 = mysqli_fetch_array($resultado5)) {
             $sangra = $linha5['val5'];}
             //$sangra = number_format($sangra, 2, ',', '.');

      

     echo "Dinheiro: ".$ent_din2."<br />";
     echo "Crédito: ".$ent_cre2."<br />";
     echo "Débido: ".$ent_deb2."<br />";
     echo "Sídas: ".$saidas."<br />";
     echo "Sangria: ".$sangra."<br /><br />";

     echo "Saldo Antiontem: ".$salAntiOnt."<br />";
     echo "Saldo ontem: ".$salOnt."<br /><br />";

     $entradasT = 0;
     $entradasT = $salAntiOnt + $ent_din;
     //$entradasT = number_format($entradasT, 2, ',', '.');
     $saidasT = 0;
     $saidasT = $saidas + $sangra;
     //$saidasT = number_format($saidasT, 2, ',', '.');

     $saldoontemT =  $entradasT - $saidasT; 
     
     echo "Entradas: ".$entradasT."<br />";
     echo "Saidas: ".$saidasT."<br />";

     echo "Saldo Hoje: ".$saldoontemT."<br />";

     if($dataH == $ontem) echo "Data Igual";
    
    // $sql = "UPDATE caixasaldo SET dinheiro='$ent_din', debito='$ent_deb', credito='$ent_cre', total='$ent_tot', valor='$saldo' where data='$dataH'";
    // $result = @mysqli_query($conn,$sql);    
?>