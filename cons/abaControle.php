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
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
  <link rel="stylesheet" href="../css/style_menu.css" type="text/css"/>
        <script type="text/javascript" src="../include/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="../include/jquery-latest.min.js"></script>
        <script type="text/javascript" src="../include/script_menu.js"></script>
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

            $(function(){
             $("#tabela input").keyup(function(){       
              var index = $(this).parent().index();
              var nth = "#tabela td:nth-child("+(index+1).toString()+")";
              var valor = $(this).val().toUpperCase();
              var soma = 0; 
              var col = 0;
              var stjan = 0;
              var stfev = 0;
              var stmar = 0;
              var stabr = 0;
              var stmai = 0;
              var stjun = 0;
              var stjul = 0;
              var stago = 0;
              var stset = 0;
              var stout = 0;
              var stnov = 0;
              var stdez = 0;
        
            $("#tabela tbody tr").show();
            $(nth).each(function(){
                if($(this).text().toUpperCase().indexOf(valor) < 0){
                    $(this).parent().hide();
                }
                else{ 
                      stjan += parseFloat($('td:nth-child(4)', $(this).parents('tr')).text());
                      stfev += parseFloat($('td:nth-child(5)', $(this).parents('tr')).text());
                      stmar += parseFloat($('td:nth-child(6)', $(this).parents('tr')).text());
                      stabr += parseFloat($('td:nth-child(7)', $(this).parents('tr')).text());
                      stmai += parseFloat($('td:nth-child(8)', $(this).parents('tr')).text());
                      stjun += parseFloat($('td:nth-child(9)', $(this).parents('tr')).text());
                      stjul += parseFloat($('td:nth-child(10)', $(this).parents('tr')).text());
                      stago += parseFloat($('td:nth-child(11)', $(this).parents('tr')).text());
                      stset += parseFloat($('td:nth-child(12)', $(this).parents('tr')).text());
                      stout += parseFloat($('td:nth-child(13)', $(this).parents('tr')).text());
                      stnov += parseFloat($('td:nth-child(14)', $(this).parents('tr')).text());
                      stdez += parseFloat($('td:nth-child(15)', $(this).parents('tr')).text());
                       soma += parseFloat($('td:nth-child(16)', $(this).parents('tr')).text()); //parseFloat($(this).text()); 
                    }
                
                var campos = $(".campo");
                //converter coleção de elementos em array.
                campos = [].slice.apply(campos);
                $(document).on("input", campos, function (event) {
                  col = (campos.indexOf(event.target) + 1);
                });


               var numero = soma; //.toFixed(2).split('.');
              // numero[0] = numero[0].split(/(?=(?:...)*$)/).join('.');
              // numero.join(','); 
               //if(col == 8){
                  $("#resultado").val(numero);
                  $("#tjan").val(stjan);
                  $("#tfev").val(stfev);
                  $("#tmar").val(stmar);
                  $("#tabr").val(stabr);
                  $("#tmai").val(stmai);
                  $("#tjun").val(stjun);
                  $("#tjul").val(stjul);
                  $("#tago").val(stago);
                  $("#tset").val(stset);
                  $("#tout").val(stout);
                  $("#tnov").val(stnov);
                  $("#tdez").val(stdez);
              // }
            });
        });
 
        $("#tabela input").blur(function(){
            $(this).val("");
        });
      }); 

    function ver(pagina, title, w, h){
                var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;  
                var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;  
                          
                width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;  
                height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;  
                          
                var left = ((width / 2) - (w / 2)) + dualScreenLeft;  
                var top = ((height / 2) - (h / 2)) + dualScreenTop;  
                var newWindow = window.open(pagina, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);  
              
                // Puts focus on the newWindow  
                if (window.focus) {  
                    newWindow.focus();  
                }  
                     /*var v = tip;
                     document.location = "cadPessoa_ver.php?tip="+v;*/
              }        

    function checar2(pagina) 
      { 
        if (confirm("CONFIRMA A EXCLUSAO DO ITEM?")==true) 
          { 
            window.location=pagina; 
          } 
      }

      function checar3(pagina) 
      { 
        if (confirm("CONFIRMA A INATIVAÇÃO DO ITEM?")==true) 
          { 
            window.location=pagina; 
          } 
      }

      function checar4(pagina) 
      { 
        if (confirm("CONFIRMA A ATIVAÇÃO DO ITEM?")==true) 
          { 
            window.location=pagina; 
          } 
      }
      
   

</script>
</head>
<body>
  <?php
   
   $mes = date("m");
   $ano = date("Y");
   $_SESSION['mesc'] = $mes;
   $_SESSION['anoc'] = $ano;

  
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

  
?>
<br />
  <font size="-2" color="black">
 <table id="tabela" align="center" width="100%" border="1">
   <thead>
      <tr align="center" bgcolor="#CCCCCC">
        <th align="center" style="width: 3%"><b>C&oacute;digo</b></th>
        <th align="center" style="width: 10%"><b>Nome</b></th>
        <th align="center" style="width: 8%"><b>EQUIPE</b></th>
        <th align="center" style="width: 3%"><b>JAN</b></th>
        <th align="center" style="width: 3%"><b>FEV</b></th>
        <th align="center" style="width: 3%"><b>MAR</b></th>
        <th align="center" style="width: 3%"><b>ABR</b></th>
        <th align="center" style="width: 3%"><b>MAI</b></th>
        <th align="center" style="width: 3%"><b>JUN</b></th>
        <th align="center" style="width: 3%"><b>JUL</b></th>
        <th align="center" style="width: 3%"><b>AGO</b></th>
        <th align="center" style="width: 3%"><b>SET</b></th>
        <th align="center" style="width: 3%"><b>OUT</b></th>
        <th align="center" style="width: 3%"><b>NOV</b></th>
        <th align="center" style="width: 3%"><b>DEZ</b></th>
        <th align="center" style="width: 3%"><b>TOTAL</b></th>
        <th align="center" style="width: 3%"><font color="blue"><b>ASSOC.</b></font></th>
        <th align="center" style="width: 3%"><font color="blue"><b>CONF.</b></font></th>
        <th align="center" style="width: 3%"><font color="blue"><b>&Iacute;NDICE</b></font></th>
      </tr> 
    <tr align="center" bgcolor="#CCCCCC">
      <th align="center" style="width: 3%"></th>
      <th align="center" style="width: 10%"><input type="text" id="txtColuna2" size="5%"/></th>
      <th align="center" style="width: 8%"><input type="text" id="txtColuna3" size="3%"/></th>
      <th align="center" style="width: 3%"></th>
      <th align="center" style="width: 3%"></th>
      <th align="center" style="width: 3%"></th>
      <th align="center" style="width: 3%"></th>
      <th align="center" style="width: 3%"></th>
      <th align="center" style="width: 3%"></th>
      <th align="center" style="width: 3%"></th>
      <th align="center" style="width: 3%"></th>
      <th align="center" style="width: 3%"></th>
      <th align="center" style="width: 3%"></th>
      <th align="center" style="width: 3%"></th>
      <th align="center" style="width: 3%"></th>
      <th align="center" style="width: 3%"></th>
      <th align="center" style="width: 3%"></th>
      <th align="center" style="width: 3%"></th>
      <th align="center" style="width: 3%"></th>
     </tr>
    </thead>
 </table>
</font>
<?php
  $con = 1;
  $sql = "SELECT idConsultor, nome, equipe, status FROM consultor ORDER BY status, nome";
       $resultado = mysqli_query($conn,$sql) or die (mysql_error());
       while ($linha = mysqli_fetch_array($resultado)) {
                 $idc = $linha['idConsultor'];
                 $nomec = $linha['nome'];
                 $equipec = $linha['equipe'];
                 $statusc = $linha['status'];
                 if($statusc == "Inativo")
                       $nomecolor = "color='#6699FF'";
                 else    
                       $nomecolor = "color='black'";

        $sql2= "SELECT count(idConsultor) as conti FROM producao WHERE idConsultor = '$idc' and MONTH(dataProposta)=1 AND YEAR(dataProposta)='$ano' AND substituicao <> 'Sim'";
           $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
           while ($linha2 = mysqli_fetch_array($resultado2)) {
                     $prodsJan = $linha2['conti'];}
        $sql2  = "SELECT count(idConsultor) as conti FROM producao WHERE idConsultor = '$idc' and MONTH(dataProposta)=2 AND YEAR(dataProposta)='$ano' AND substituicao <> 'Sim'";
           $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
           while ($linha2 = mysqli_fetch_array($resultado2)) {
                     $prodsFev = $linha2['conti'];}

        $sql2 = "SELECT count(idConsultor) as conti FROM producao WHERE idConsultor = '$idc' and MONTH(dataProposta)=3 AND YEAR(dataProposta)='$ano' AND substituicao <> 'Sim'";
           $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
           while ($linha2 = mysqli_fetch_array($resultado2)) {
                     $prodsMar = $linha2['conti'];}
        $sql2 = "SELECT count(idConsultor) as conti FROM producao WHERE idConsultor = '$idc' and MONTH(dataProposta)=4 AND YEAR(dataProposta)='$ano' AND substituicao <> 'Sim'";
           $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
           while ($linha2 = mysqli_fetch_array($resultado2)) {
                     $prodsAbr = $linha2['conti'];}                              
        $sql2 = "SELECT count(idConsultor) as conti FROM producao WHERE idConsultor = '$idc' and MONTH(dataProposta)=5 AND YEAR(dataProposta)='$ano' AND substituicao <> 'Sim'";
           $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
           while ($linha2 = mysqli_fetch_array($resultado2)) {
                     $prodsMai = $linha2['conti'];}             
        $sql2 = "SELECT count(idConsultor) as conti FROM producao WHERE idConsultor = '$idc' and MONTH(dataProposta)=6 AND YEAR(dataProposta)='$ano' AND substituicao <> 'Sim'";
           $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
           while ($linha2 = mysqli_fetch_array($resultado2)) {
                     $prodsJun = $linha2['conti'];}
        $sql2 = "SELECT count(idConsultor) as conti FROM producao WHERE idConsultor = '$idc' and MONTH(dataProposta)=7 AND YEAR(dataProposta)='$ano' AND substituicao <> 'Sim'";
           $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
           while ($linha2 = mysqli_fetch_array($resultado2)) {
                     $prodsJul = $linha2['conti'];}
        $sql2 = "SELECT count(idConsultor) as conti FROM producao WHERE idConsultor = '$idc' and MONTH(dataProposta)=8 AND YEAR(dataProposta)='$ano' AND substituicao <> 'Sim'";
           $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
           while ($linha2 = mysqli_fetch_array($resultado2)) {
                     $prodsAgo = $linha2['conti'];}
        $sql2 = "SELECT count(idConsultor) as conti FROM producao WHERE idConsultor = '$idc' and MONTH(dataProposta)=9 AND YEAR(dataProposta)='$ano' AND substituicao <> 'Sim'";
           $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
           while ($linha2 = mysqli_fetch_array($resultado2)) {
                     $prodsSet = $linha2['conti'];}
        $sql2 = "SELECT count(idConsultor) as conti FROM producao WHERE idConsultor = '$idc' and MONTH(dataProposta)=10 AND YEAR(dataProposta)='$ano' AND substituicao <> 'Sim'";
           $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
           while ($linha2 = mysqli_fetch_array($resultado2)) {
                     $prodsOut = $linha2['conti'];}
        $sql2 = "SELECT count(idConsultor) as conti FROM producao WHERE idConsultor = '$idc' and MONTH(dataProposta)=11 AND YEAR(dataProposta)='$ano' AND substituicao <> 'Sim'";
           $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
           while ($linha2 = mysqli_fetch_array($resultado2)) {
                     $prodsNov = $linha2['conti'];}
        $sql2 = "SELECT count(idConsultor) as conti FROM producao WHERE idConsultor = '$idc' and MONTH(dataProposta)=12 AND YEAR(dataProposta)='$ano' AND substituicao <> 'Sim'";
           $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
           while ($linha2 = mysqli_fetch_array($resultado2)) {
                     $prodsDez = $linha2['conti'];}

        $prodTot = $prodsJan+$prodsFev+$prodsMar+$prodsAbr+$prodsMai+$prodsJun+$prodsJul+$prodsAgo+$prodsSet+$prodsOut+$prodsNov+$prodsDez;
        $totJan = $totJan + $prodsJan;
        $totFev = $totFev + $prodsFev;
        $totMar = $totMar + $prodsMar;
        $totAbr = $totAbr + $prodsAbr;
        $totMai = $totMai + $prodsMai;
        $totJun = $totJun + $prodsJun;
        $totJul = $totJul + $prodsJul;
        $totAgo = $totAgo + $prodsAgo;
        $totSet = $totSet + $prodsSet;
        $totOut = $totOut + $prodsOut;
        $totNov = $totNov + $prodsNov;
        $totDez = $totDez + $prodsDez;

        $ProGeral = $ProGeral + $prodTot;

      if ($con % 2 == 0)
        $bgcolor = "bgcolor='#FFFFFF'";
      else
        $bgcolor = "bgcolor='#FFFFCC'";

      $sql3 = "SELECT * FROM indice WHERE idConsultor='$idc' AND ano='$ano'";
      $resultado3 = mysqli_query($conn,$sql3) or die (mysql_error());
      $registro3 = mysqli_num_rows($resultado3);
      if ($registro3 != 0){
      while ($linha3 = mysqli_fetch_array($resultado3)) {
              $associ = $linha3['totAssoc'];
              $confer = $linha3['totConf'];
              $indice = $linha3['indice'];
             }
      }
      else{
            $associ = 0;
            $confer = 0;
            $indice = 0;
          } 
?>
    <table id="tabela" align="center" width="100%"  border="1">
     <tbody>
     <tr align="center" <? echo $bgcolor; ?>>
    <!--  <td align="center" style="width: 5%">
       <?
       //echo "<a href=\"javascript:checar2('#?id=".$idProducao."');\"><img src=\"imagens/letra-d.png\" width=\"20\" border=\"0\" alt=\"Click para deletar este item.\" title=\"Click para deletar este item.\"></a>&nbsp;&nbsp;";
      //if($stat == "Ativo")
      // echo "<a href=\"javascript:checar3('#?id=".$idProducao."');\"><img src=\"imagens/letra_I.png\" width=\"20\" border=\"0\" alt=\"Click para inativar este item.\" title=\"Click para inativar este item.\"></a>&nbsp;";
      //else if($stat == "Inativo")
      //  echo "<a href=\"javascript:checar4('#?id=".$idProducao."');\"><img src=\"imagens/letra_A.png\" width=\"20\" border=\"0\" alt=\"Click para ativar este item.\" title=\"Click para ativar este item.\"></a>&nbsp;";
       ?>
    </td>-->
    <td align="center" style="width: 3%"><font size="-2"><b><? echo $idc; ?></b></font></td>
    <td align="left" style="width: 10%"><font size="-2" <? echo $nomecolor; ?>><b><? echo $nomec; ?></b></font></td>
     <td align="left" style="width: 8%"><font size="-2"><b><? echo $equipec; ?></b></font></td>
    <td align="center" style="width: 3%"><font size="-2"><b><? echo $prodsJan; ?></b></font></td>
    <td align="center" style="width: 3%"><font size="-2"><b><? echo $prodsFev; ?></b></font></td>
    <td align="center" style="width: 3%"><font size="-2"><b><? echo $prodsMar; ?></b></font></td>
    <td align="center" style="width: 3%"><font size="-2"><b><? echo $prodsAbr; ?></b></font></td>
    <td align="center" style="width: 3%"><font size="-2"><b><? echo $prodsMai; ?></b></font></td>
    <td align="center" style="width: 3%"><font size="-2"><b><? echo $prodsJun; ?></b></font></td>
    <td align="center" style="width: 3%"><font size="-2"><b><? echo $prodsJul; ?></b></font></td>
    <td align="center" style="width: 3%"><font size="-2"><b><? echo $prodsAgo; ?></b></font></td>
    <td align="center" style="width: 3%"><font size="-2"><b><? echo $prodsSet; ?></b></font></td>
    <td align="center" style="width: 3%"><font size="-2"><b><? echo $prodsOut; ?></b></font></td>
    <td align="center" style="width: 3%"><font size="-2"><b><? echo $prodsNov; ?></b></font></td>
    <td align="center" style="width: 3%"><font size="-2"><b><? echo $prodsDez; ?></b></font></td>
    <td align="center" style="width: 3%"><font size="-2"><b><? echo $prodTot; ?></b></font></td>
    <td align="center" id="associ" style="width: 3%" onclick="ver('assoc_ver.php?tip='+<? echo $idc; ?>,'num associados',300,200)" onmouseover="<? echo 'Clique entrar num de associados'; ?>"><font size="-2" color="blue"><b><? echo $associ; ?></b></font></td>
    <td align="center" id="confi" style="width: 3%"><font size="-2" color="blue"><b><? echo $confer; ?></b></font></td>
    <td align="center" id="indic" style="width: 3%"><font size="-2" color="blue"><b><? echo $indice." %"; ?></b></font></td>
    </tr>
    </tbody>
    </table>
     
  <?
    $con = $con + 1;
  }
    $con = $con - 1;

  ?>
  <table align="center" width="100%"  border="1">
   <tr align="center" bgcolor="#CCCCCC">
        <td align="center" style="width: 3%"></td>
        <td align="center" style="width: 10%"></td>
        <td align="center" style="width: 8%"></td>
        <td align="center" style="width: 3%"><b>JAN</b></td>
        <td align="center" style="width: 3%"><b>FEV</b></td>
        <td align="center" style="width: 3%"><b>MAR</b></td>
        <td align="center" style="width: 3%"><b>ABR</b></td>
        <td align="center" style="width: 3%"><b>MAI</b></td>
        <td align="center" style="width: 3%"><b>JUN</b></td>
        <td align="center" style="width: 3%"><b>JUL</b></td>
        <td align="center" style="width: 3%"><b>AGO</b></td>
        <td align="center" style="width: 3%"><b>SET</b></td>
        <td align="center" style="width: 3%"><b>OUT</b></td>
        <td align="center" style="width: 3%"><b>NOV</b></td>
        <td align="center" style="width: 3%"><b>DEZ</b></td>
        <td align="center" style="width: 3%"></td>
        <td align="center" style="width: 3%"></td>
        <td align="center" style="width: 3%"></td>
        <td align="center" style="width: 3%"></td>
      </tr> 
   <tr>
     <td align="center" style="width: 3%"></td>
     <td align="left" style="width: 10%"></td>
     <td align="left" style="width: 8%">Total</td>
     <td align="center" style="width: 3%"><input id="tjan" type="text" align="right" size="3" style="color: blue; font-weight: bold;" value="<? echo $totJan; ?>" readonly /></td>
     <td align="center" style="width: 3%"><input id="tfev" type="text" align="right" size="3" style="color: blue; font-weight: bold;" value="<? echo $totFev; ?>" readonly /></b></td>
     <td align="center" style="width: 3%"><input id="tmar" type="text" align="right" size="3" style="color: blue; font-weight: bold;" value="<? echo $totMar; ?>" readonly /></td>
     <td align="center" style="width: 3%"><input id="tabr" type="text" align="right" size="3" style="color: blue; font-weight: bold;" value="<? echo $totAbr; ?>" readonly /></td>
     <td align="center" style="width: 3%"><input id="tmai" type="text" align="right" size="3" style="color: blue; font-weight: bold;" value="<? echo $totMai; ?>" readonly /></td>
     <td align="center" style="width: 3%"><input id="tjun" type="text" align="right" size="3" style="color: blue; font-weight: bold;" value="<? echo $totJun; ?>" readonly /></td>
     <td align="center" style="width: 3%"><input id="tjul" type="text" align="right" size="3" style="color: blue; font-weight: bold;" value="<? echo $totJul; ?>" readonly /></td>
     <td align="center" style="width: 3%"><input id="tago" type="text" align="right" size="3" style="color: blue; font-weight: bold;" value="<? echo $totAgo; ?>" readonly /></td>
     <td align="center" style="width: 3%"><input id="tset" type="text" align="right" size="3" style="color: blue; font-weight: bold;" value="<? echo $totSet; ?>" readonly /></td>
     <td align="center" style="width: 3%"><input id="tout" type="text" align="right" size="3" style="color: blue; font-weight: bold;" value="<? echo $totOut; ?>" readonly /></td>
     <td align="center" style="width: 3%"><input id="tnov" type="text" align="right" size="3" style="color: blue; font-weight: bold;" value="<? echo $totNov; ?>" readonly /></td>
     <td align="center" style="width: 3%"><input id="tdez" type="text" align="right" size="3" style="color: blue; font-weight: bold;" value="<? echo $totDez; ?>" readonly /></td>
     <td align="center" style="width: 3%"></td>
     <td align="center" style="width: 3%"></td>
     <td align="center" style="width: 3%"></td>
     <td align="center" style="width: 3%"></td>
    </tr>
   </table>
    <div style="position: relative; margin-right: 100px" align="right">
         Total Geral: <b><input id="resultado" type="text" align="right" size="6" style="color: blue; font-weight: bold;" value="<? echo $ProGeral; ?>" readonly /></b>
    </div>
</div>
 <footer id="footer">   
   <?php include ".\footer.php"; ?>
</footer>

</body>
</html>