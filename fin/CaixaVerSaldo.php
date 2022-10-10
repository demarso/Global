 <?php
 include "conexao.php";
      $dataH = '2020-10-31';
      $mes = date('m');
      
      
    $sql0 = "SELECT saldoant FROM saldo where idSaldo = 1";
         $result0 = mysqli_query($conn,$sql0) or die (mysql_error());
         while ($linha0 = mysqli_fetch_array($result0)) {
             $saldoant = $linha0['saldoant']; }
             //$saldoant = '1257.62';
             $saldoant2 = number_format($saldoant, 2, ',', '.');
             
      $sql = "SELECT sum(valor) as val FROM caixa where data = '$dataH' and boleto = 'Dinheiro'";
      $resultado = mysqli_query($conn,$sql) or die (mysql_error());
      while ($linha = mysqli_fetch_array($resultado)) {
             $ent_din = $linha['val'];}
            // $ent_din = $ent_din + $_SESSION['sald'];
             $ent_din2 = number_format($ent_din, 2, ',', '.'); // str_replace('.',',',str_replace(',','.',$ent_din));
      
      $sql2 = "SELECT sum(valor) as val2 FROM caixa where data = '$dataH' and boleto = 'Crédito'";
      $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
      while ($linha2 = mysqli_fetch_array($resultado2)) {
             $ent_cre = $linha2['val2'];}
             $ent_cre2 = number_format($ent_cre, 2, ',', '.'); //str_replace('.',',',str_replace(',','.',$ent_cre));
      
      $sql3 = "SELECT sum(valor) as val3 FROM caixa where data = '$dataH' and boleto = 'Débito'";
      $resultado3 = mysqli_query($conn,$sql3) or die (mysql_error());
      while ($linha3 = mysqli_fetch_array($resultado3)) {
             $ent_deb = $linha3['val3'];}
             $ent_deb2 = number_format($ent_deb, 2, ',', '.'); //str_replace('.',',',str_replace(',','.',$ent_deb));       
      
      $sql4 = "SELECT sum(valor) as val4 FROM caixasaida where data = '$dataH'";
      $resultado4 = mysqli_query($conn,$sql4) or die (mysql_error());
      while ($linha4 = mysqli_fetch_array($resultado4)) {
             $saidas = $linha4['val4'];}
      
      $sql5 = "SELECT sum(valor) as val5 FROM sangria where dataCaixa = '$dataH'";
      $resultado5 = mysqli_query($conn,$sql5) or die (mysql_error());
      while ($linha5 = mysqli_fetch_array($resultado5)) {
             $sangra = $linha5['val5'];}

    
      
      $saidasT = $saidas+$sangra;
      $saldonovo = $ent_din+$saldoant-$saidasT; //$ent_din-$saidasT;
      $saldo1 = $ent_din-$saidasT;
      $saidas2 = number_format($saidasT, 2, ',', '.');
      $saldo2 = number_format($saldonovo, 2, ',', '.');
      $saldo1 = number_format($saldo1, 2, ',', '.');
      
      $saldofin = $saldo+$saldoant;
      $saldofin2 = number_format($saldofin, 2, ',', '.');

      $ent_tot = ($ent_din + $ent_cre + $ent_deb);
      $ent_tot2 = number_format($ent_tot, 2, ',', '.');  

      if($saldonovo > 0) $cor = "color='blue'"; else $cor = "color='red'";
      echo "CAIXA: Entradas: Dinheiro:<font color='blue'>R$ ".$ent_din2."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Débito:<font color='blue'>R$ ".$ent_deb2."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Crédito:<font color='blue'>R$ ".$ent_cre2."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ENTRADA TOTAL:<font color='blue'>R$  ".$ent_tot2;
      echo "<br />";  
      echo "Saldo dia anterior: <font color='red'>R$ ".$saldoant2."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saídas: <font color='red'>R$ ".$saidas2."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saldo hoje: <font $cor>R$ ".$saldo1."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saldo em dinheiro: <font $cor>R$ ".$saldo2."</font>";
?>