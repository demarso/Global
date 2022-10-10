<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['idF'])){
    header("Location: index.php?erro=1");
    exit;
 }

 $meses = array (1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");
  $diasdasemana = array (1 => "Segunda-Feira",2 => "Terça-Feira",3 => "Quarta-Feira",4 => "Quinta-Feira",5 => "Sexta-Feira",6 => "Sábado",0 => "Domingo");
   $hoje = getdate();
   $dia = $hoje["mday"];
   $mes = $hoje["mon"];
   $nomemes = $meses[$mes];
   $ano = $hoje["year"];
   $diadasemana = $hoje["wday"];
   $nomediadasemana = $diasdasemana[$diadasemana];
 
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
        <title>Fin - Entradas</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="css/style.css?version=12" type="text/css" charset="utf-8"/>
         <link rel="stylesheet" href="css/style_menu.css?version=12" type="text/css"/>
         <link rel="stylesheet" href="css/bootstrap.min.css">
       <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="include/script.js?version=1"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript" src="include/script_menu.js"></script>
        <script type="text/javascript" src="include/micoxAjax.js?version=12"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  <script type="text/javascript">
            
        $(function() {
                var d=1000;
                $('#menu span').each(function(){
                    $(this).stop().animate({
                        'top':'-17px'
                    },d+=250);
                });

                $('#menu > li').hover(
                function () {
                    var $this = $(this);
                    $('a',$this).addClass('hover');
                    $('span',$this).stop().animate({'top':'40px'},300).css({'zIndex':'10'});
                },
                function () {
                    var $this = $(this);
                    $('a',$this).removeClass('hover');
                    $('span',$this).stop().animate({'top':'-17px'},800).css({'zIndex':'-1'});
                }
            );
            });
        
        function maskIt(w,e,m,r,a){
  				// Cancela se o evento for Backspace
  				if (!e) var e = window.event
  				if (e.keyCode) code = e.keyCode;
  				else if (e.which) code = e.which;
  				// Variáveis da função
  				var txt  = (!r) ? w.value.replace(/[^\d]+/gi,'') : w.value.replace(/[^\d]+/gi,'').reverse();
  				var mask = (!r) ? m : m.reverse();
  				var pre  = (a ) ? a.pre : "";
  				var pos  = (a ) ? a.pos : "";
  				var ret  = "";
  				if(code == 9 || code == 8 || txt.length == mask.replace(/[^#]+/g,'').length) return false;
  				// Loop na máscara para aplicar os caracteres
  				for(var x=0,y=0, z=mask.length;x<z && y<txt.length;){
  				if(mask.charAt(x)!='#'){
  				ret += mask.charAt(x); x++; } 
  				else {
  				ret += txt.charAt(y); y++; x++; } }
  				// Retorno da função
  				ret = (!r) ? ret : ret.reverse()	
  				w.value = pre+ret+pos; }
  				// Novo método para o objeto 'String'
  				String.prototype.reverse = function(){
				  return this.split('').reverse().join(''); 
        };

				function number_format( number, decimals, dec_point, thousands_sep ) {
  				var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
  				var d = dec_point == undefined ? "," : dec_point;
  				var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
  				var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
  				return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
				}

				function calcula(operacion){ 
  				var operando1 = parseFloat( document.calc.operando1.value.replace(/\./g, "").replace(",", ".") );
  				var operando2 = parseFloat( document.calc.operando2.value.replace(/\./g, "").replace(",", ".") );
  				var result = eval(operando1 + operacion + operando2);
  				document.calc.resultado.value = number_format(result,2, ',', '.');
				} 

          
        function desabilita() {
            var x,y,z,w;
            x = document.getElementById("sacado");
            y = document.getElementById("titulo");
            v = document.getElementById("valor");
            z = document.getElementById("vsangria");
            w = document.getElementById("trsangria");
           if(document.getElementById("sangra").checked==true){
              x.visible = false;
              x.disabled = true;
              y.visible = false;
              y.disabled = true;
              v.visible = false;
              v.disabled = true;
              z.visible = true;                
              z.disabled = false;
              w.removeAttribute("disabled");
            }
            else{
              x.visible = true;
              x.disabled = false;
              y.visible = true;                
              y.disabled = false;
              v.visible = true;                
              v.disabled = false;
              z.visible = false;
              z.disabled = true;
              w.display.none;
              
            }
        }
         
        function desabilita2() {
            var z;
            z = document.getElementById("vsangria");
            z.visible = false;
            z.disabled=true;
          }

        function newPopup(){
          varWindow = window.open ('sangria.php', 'popup')
          }

      
        function checar2(pagina) 
              { 
                if (confirm("CONFIRMA A TRANSFERÊNCIA? \n SÓ TRANSFIRA SE NAO FOR FAZER MAIS LANÇAMENTOS! \n ESTA ABA SERÁ FECHADA!")==true) 
                  { 
                    window.location=pagina; 
                  } 
              }
            
            document.getElementById('valordi').style.display = "none";
            document.getElementById('valordb').style.display = "none";
            document.getElementById('valorcr').style.display = "none";
              
            function habilitacao(){
              if(document.getElementById('Dinheiro').checked){
                document.getElementById('valordi').style.display = 'block';
                document.getElementById('valordb').style.display = 'none';
                document.getElementById('valorcr').style.display = 'none';
              }
              if(document.getElementById('Débito').checked){
                document.getElementById('valordb').style.display = 'block';
                document.getElementById('valordi').style.display = 'none';
                document.getElementById('valorcr').style.display = 'none';
              }
              if(document.getElementById('Crédito').checked){
                document.getElementById('valorcr').style.display = 'block';
                document.getElementById('valordb').style.display = 'none';
                document.getElementById('valordi').style.display = 'none';
              }
            }
          
       
  </script>
        
</head>
<body>

  <? include "menu.php" ?>
 <h1>Entradas
      <? if($_SESSION['nivelF'] == 0) echo "- Financeiro" ?>
        <? if($_SESSION['nivelF'] == 1) echo "- Fiscal" ?>
        <? if($_SESSION['nivelF'] == 2) echo "- Caixa" ?>
        <? if($_SESSION['nivelF'] == 3) echo "- Baixa" ?>
    </h1>
 <div id="interface">
    
   <div id="caixa1">
   <?php 
     if($_SESSION['nivelF'] == 0){ ?>
       
      <form name="form1" method="post" action="financeiroOK.php" >
      <table>
        <tr>
          <td><h3>Sangria:</h3></td>
           <td>
            <?
             echo "<a href=\"sangria.php\" target=\"_black\"><img src=\"imagens/botao1.png\" width=\"140px\" border=\"0\" alt=\"Click para receber a sangria.\" title=\"Click para receber a sangria.\"></a>";
           ?>
          </td> 
        </tr>
        <tr>
           <td><h3>Empresa:</h3></td>
             <td>
              <INPUT TYPE="RADIO" NAME="empresa" VALUE="global" tabindex="1" checked="true"> Global
              <INPUT TYPE="RADIO" NAME="empresa" VALUE="jrx"> JRX
              <INPUT TYPE="RADIO" NAME="empresa" VALUE="oficina"> Oficina
             </td>
        </tr>
        <tr>
          <td><h3>Banco:</h3></td>
           <td>
            <select name="banco" id="banco" tabindex="2">
             <option value="">Selecione</option>
                  <?php
                    //Busco os estados
              require_once("conexao.php");
              $sql3 = "SELECT idBanco, nomeBanco FROM bancos";
              $results3 = mysqli_query($conn, $sql3);
              while ( $row = mysqli_fetch_array($results3) ) {
                echo "<option value='".$row[idBanco]."'>".$row[nomeBanco]."</option>";
              }
                ?>
           </select>
          </td>
        </tr>
        <tr>
            <td><h3>Tipo de Entrada:</h3></td>
             <td>
              <INPUT TYPE="RADIO" NAME="tipoentrada" VALUE="credito" tabindex="3" checked="true"> Crédito
              <INPUT TYPE="RADIO" NAME="tipoentrada" VALUE="saque"> Saque
             </td>
        </tr>
        <tr>
            <td><h3>Data:</h3></td>
             <td>
               <input type="date" name="data" id="data" size="15" tabindex="4" required="true">
             </td>
        </tr>
        <tr>
          <td><h3>Valor:</h3></td>
          <td>
             <input type="text" name="valor" id="valor" size="10" tabindex="5" onkeyup="maskIt(this,event,'###.###.###,##',true)" style="text-align: right;" >
          </tr>
       </table>          
           <center>
        <table>
          <tr>
             <td colspan="4" align="center"><hr align="center" width="600" size="1" color=red></td>
           </tr>
           <tr>
             <td colspan="4" align="center"><input type="submit" size="150" value="REGISTRAR">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
             <input type="reset" value="LIMPA" /></td> 
             <td> <a href="entrada_financeiro_lista.php"><img src="imagens/lista2.png" width="100"></a></td>
           </tr>
        </table>
    </center>
      </form>
    <?}?>
    <? if($_SESSION['nivelF'] == 1 || $_SESSION['nivelF'] == 10){ ?>
        
    <?}?>
    <? if($_SESSION['nivelF'] == 2  || $_SESSION['nivelF'] == 10){ ?>
        
         <form name="form1" method="post" action="caixaOK.php" >
          <table>
            <tr>
              <td><h3>Empresa:</h3></td>
              <td>
              <INPUT TYPE="RADIO" NAME="empresa" VALUE="global" tabindex="2" checked="true"> Global
              <INPUT TYPE="RADIO" NAME="empresa" VALUE="jrx"> JRX
              <INPUT TYPE="RADIO" NAME="empresa" VALUE="oficina"> Oficina
             </td>
            </tr>
            <tr>
            <td><h3>Data:</h3></td>
             <td>
               <input type="date" name="data" id="data" size="15" tabindex="6" required="true">
             </td>
        </tr>
           <tr>
		         <td><h3>Associado:</h3></td>
		         <td>
		           <input type="text" name="associado" id="associado" size="60" tabindex="1" style='text-transform:uppercase' required="true">
		         </td>
    		   </tr>
    	<!--	<tr>
	         <td><h3>Pagamento:</h3></td>
  	         <td>
              <INPUT TYPE="RADIO" id="Dinheiro" NAME="boleto" VALUE="Dinheiro" tabindex="2"> Dinheiro
              <INPUT TYPE="RADIO" id="Débito" NAME="boleto" VALUE="Débito"> Débito
              <INPUT TYPE="RADIO" id="Crédito" NAME="boleto" VALUE="Crédito"> Crédito
  	         </td>
        </tr> -->
        <tr>
          <td><h3>Valor do Pagamento:</h3></td>
            <td>
              Dinheiro:&nbsp;<input type="text" id="valordi" name="valordi" size="10" onkeyup="maskIt(this,event,'###.###.###,##',true)" style="text-align: right;" PLACEHOLDER="Dinheiro">&nbsp;&nbsp;
              Débito:&nbsp;<input type="text" id="valordb" name="valordb" size="10" onkeyup="maskIt(this,event,'###.###.###,##',true)"style="text-align: right;" PLACEHOLDER="Débito">&nbsp;&nbsp;
              Crédito:&nbsp;<input type="text" id="valorcr" name="valorcr" size="10" onkeyup="maskIt(this,event,'###.###.###,##',true)"style="text-align: right;" PLACEHOLDER="Crédito">
            </td>
        </tr>
        <tr>
	         <td><h3>Motivo:</h3></td>
	         <td>
	             <INPUT TYPE="RADIO" NAME="motivo" VALUE="Rastreador" tabindex="3"> Rastreador
	             <INPUT TYPE="RADIO" NAME="motivo" VALUE="Vidro"> Vidro
	             <INPUT TYPE="RADIO" NAME="motivo" VALUE="Mensalidade"> Mensalidade
	             <INPUT TYPE="RADIO" NAME="motivo" VALUE="Franquia"> Franquia
	         </td>
            </tr>
    		<tr>
		        <td><h3>Recido/NF:</h3></td>
		         <td>
		           <input type="text" name="recibo" id="recibo" size="10" tabindex="4" required="true">
		         </td>
    		</tr>
    		<tr>
		        <td><h3>Descrição:</h3></td>
		         <td>
		           <input type="text" name="descricao" id="descricao" size="60" tabindex="5" required="true">
		         </td>
    		</tr>
    		       
          </table>
         <center>
		    <table>
		      <tr>
		         <td colspan="4" align="center"><hr align="center" width="600" size="1" color=red></td>
		       </tr>
		       <tr>
		         <td colspan="4" align="center"><input type="submit" size="150" value="REGISTRAR">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		         <input type="reset" value="LIMPA" /></td> 
		         <td> <a href="entrada_caixa_lista.php"><img src="imagens/lista2.png" width="100"></a></td>
		       </tr>
		    </table>
    </center>
   
         </form>
     
    <? } ?>

    <? if($_SESSION['nivelF'] == 3 || $_SESSION['nivelF'] == 10){ ?>
        
    <?}?>

   </div> 
   <center>
    <?
     if($_SESSION['nivelF'] == 0){
     include "conexao.php";
      $dataH = date('Y/m/d');
      
      $mes = date('m'); 
      $sql = "select sum(valor) as val from movbanco where month(data) = '$mes' and tipoentrada = 'credito'";
      $resultado = mysqli_query($conn,$sql) or die (mysql_error());
      while ($linha = mysqli_fetch_array($resultado)) {
             $ent_credito1 = $linha['val'];}
             $ent_credito = number_format($ent_credito1, 2, ',', '.'); // str_replace('.',',',str_replace(',','.',$ent_din));
      
      $sql2 = "select sum(valor) as val2 from movbanco where month(data) = '$mes' and tipoentrada = 'saque'";
      $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
      while ($linha2 = mysqli_fetch_array($resultado2)) {
             $ent_sac1 = $linha2['val2'];}
             $ent_sac = number_format($ent_sac1, 2, ',', '.'); //str_replace('.',',',str_replace(',','.',$ent_cre));
      
      $ent_tot = $ent_credito1 + $ent_sac1;
      $ent_tot = number_format($ent_tot, 2, ',', '.');

      $sql3 = "select sum(valor) as val3 from financeirosaida where  month(data) = '$mes'";
      $resultado3 = mysqli_query($conn,$sql3) or die (mysql_error());
      while ($linha3 = mysqli_fetch_array($resultado3)) {
             $saida1 = $linha3['val3'];}
             $saida = number_format($saida1, 2, ',', '.'); //str_replace('.',',',str_replace(',','.',$ent_deb));       
      
      $sql4 = "select sum(valor) as val4 from sangria where month(data) = '$mes' and status = 1";
      $resultado4 = mysqli_query($conn,$sql4) or die (mysql_error());
      while ($linha4 = mysqli_fetch_array($resultado4)) {
             $sangra = $linha4['val4'];}
      
      //$saidasT = $saida+$sangra;
      //$saldo = $ent_din-$saidasT;
      //$saidas2 = number_format($saidasT, 2, ',', '.');
      //$saldo2 = number_format($saldo, 2, ',', '.');

      //$ent_tot = ($ent_din + $ent_cre + $ent_deb);
      //$ent_tot = number_format($ent_tot, 2, ',', '.');  

      //if($saldo > 0) $cor = "color='blue'"; else $cor = "color='red'";
      echo "FINANCEIRO: Entradas: Créditos:<font color='blue'>R$ ".$ent_credito."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saques:<font color='blue'>R$ ".$ent_sac."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ENTRADA TOTAL:<font color='blue'>R$  ".$ent_tot;
      echo "<br />";  
      echo "Saídas: <font color='red'>R$ ".$saida."</font>";
    }
    

  if($_SESSION['nivelF'] == 2 || $_SESSION['nivelF'] == 10){
     include "conexao.php";
      $dataH = date('Y-m-d');
      
      $dia = date("d",mktime());
      $mes = date("m",mktime());
      $ano = date("Y",mktime());
                  
      $sql = "SELECT data,valor FROM caixasaldo WHERE data = '$dataH'";
      $resultado = mysqli_query($conn,$sql) or die (mysql_error());
      while ($linha = mysqli_fetch_array($resultado)) {
             $val = $linha['valor'];
             $dat = $linha['data'];
             }
   
      if(empty($val) || empty($dat)){
         $sql = "INSERT INTO caixasaldo (data,dinheiro,debito,credito,saida,sangria,total,valor,status,statusSaida) VALUES ('$dataH',0,0,0,0,0,0,0,0,0)";
         $resultado = mysqli_query($conn,$sql) or die ("Cadastro do Saldo de Caixa não realizado.");

         $sql22 = "SELECT saldo FROM saldo where idSaldo = 1";
         $result22 = mysqli_query($conn,$sql22) or die (mysql_error());
         while ($linha22 = mysqli_fetch_array($result22)) {
             $saldoult = $linha22['saldo'];}
         $sql23 = "UPDATE saldo SET saldoant='$saldoult' where idSaldo = 1";
         $result23 = @mysqli_query($conn,$sql23);
      }

      $sql5 = "SELECT saldoant FROM saldo where idSaldo = 1";
         $result5 = mysqli_query($conn,$sql5) or die (mysql_error());
         while ($linha5 = mysqli_fetch_array($result5)) {
             $saldoant = $linha5['saldoant']; }
             $saldoant2 = number_format($saldoant, 2, ',', '.');
/*
      if($nomediadasemana == 'Segunda-Feira'){
        $ontem = date ("Y-m-d",mktime (0,0,0,$mes,$dia-2,$ano));

        $sql = "SELECT sum(valor) as val FROM caixaSaida where data = '$ontem'";
        $result = mysqli_query($conn,$sql) or die (mysql_error());
        while ($linha = mysqli_fetch_array($result)) {
             $saidont = $linha['val'];}

        $sql = "SELECT sum(valor) as san FROM sangria where dataCaixa = '$ontem'";
        $result = mysqli_query($conn,$sql) or die (mysql_error());
        while ($linha = mysqli_fetch_array($result)) {
             $saiSanOnt = $linha['san'];}

        $sql = "SELECT valor FROM caixasaldo where data = '$ontem' AND status=0";
        $result = mysqli_query($conn,$sql) or die (mysql_error());
        while ($linha = mysqli_fetch_array($result)) {     
              $salOnt = $linha['valor'];}

        $saldo_onten2 = number_format($salOnt, 2, ',', '.');      
        
        $sqlOnt = "UPDATE caixasaldo SET valor='$salOnt', status=1 where data='$dataH'";
        $resultOnt = @mysqli_query($conn,$sqlOnt);     
        
        $sqlOnt = "UPDATE caixasaldo SET status=1 where data='$ontem'";
        $resultOnt = @mysqli_query($conn,$sqlOnt); 
            
          
        
      }else{
        $ontem = date ("Y-m-d",mktime (0,0,0,$mes,$dia-1,$ano));
        
      }*/

     //***************************************************************************************************************************
     /*
      $sql = "SELECT saida FROM caixaSaldo WHERE data = '$ontem'";
      $resultado = mysqli_query($conn,$sql) or die (mysql_error());
      while ($linha = mysqli_fetch_array($resultado)) {
             $saiOntem = $linha['saida'];}

      $sql = "SELECT sangria FROM caixaSaldo WHERE data = '$ontem'";
      $resultado = mysqli_query($conn,$sql) or die (mysql_error());
      while ($linha = mysqli_fetch_array($resultado)) {
             $sangOntem = $linha['sangria']; }

      $sql = "SELECT dinheiro FROM caixaSaldo WHERE data = '$ontem'";
      $resultado = mysqli_query($conn,$sql) or die (mysql_error());
      while ($linha = mysqli_fetch_array($resultado)) {
             $dinOntem = $linha['dinheiro']; }

      $sql = "SELECT valor FROM caixaSaldo WHERE data = '$ontem'";
      $resultado = mysqli_query($conn,$sql) or die (mysql_error());
      while ($linha = mysqli_fetch_array($resultado)) {
             $saldoOntem = $linha['valor']; }              

         $saldo_onten = $dinOntem-($saiOntem + $sangOntem)+$saldoOntem;      
         $saldo_onten2 = number_format($saldo_onten, 2, ',', '.'); 

      echo $dinOntem." ".$saiOntem." ".$sangOntem." ".$saldo_onten; */
      //***************************************************************************************************************************

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

     /*   if($nomediadasemana != 'Sábado'){
        $sql = "UPDATE caixasaldo SET status=1 where data='$dataH' and status=0";
        $result = @mysqli_query($conn,$sql);
        }

         $sql = "SELECT valor FROM caixasaldo where data = '$ontem' AND status=1";
         $result = mysqli_query($conn,$sql) or die (mysql_error());
         while ($linha = mysqli_fetch_array($result)) {
             $salOnt = $linha['valor']; }

         $sql = "SELECT saldo FROM saldo where idSaldo = 1";
         $result = mysqli_query($conn,$sql) or die (mysql_error());
         while ($linha = mysqli_fetch_array($result)) {
             $saldo = $linha['saldo']; } */     


      
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
  
    $sql = "UPDATE caixasaldo SET dinheiro='$ent_din', debito='$ent_deb', credito='$ent_cre', total='$ent_tot', valor='$saldonovo' where data='$dataH'";
    $result = @mysqli_query($conn,$sql);

     $sql = "UPDATE saldo SET saldo='$saldonovo' where idSaldo = 1";
     $result = @mysqli_query($conn,$sql);
      
 }
    ?>
   <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="" type="button" onClick="window.open('cadSaldo.php?sa=<? //echo $saldo; ?>')" value="TRANSFERIR SALDO">-->
  </center>
 </div>
     <footer id="footer">   
       <?php include "footer.php"; ?>
    </footer>
</body>
</html>