<?php
session_start();
//header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
  <link rel="stylesheet" href="css/style_menu.css" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="css/forms.css"/>
  <title>Gestão de Propostas</title>
  <script type="text/javascript" src="include/jquery.js"></script>
<script type="text/javascript" src="include/micoxAjax.js"></script>
<script type="text/javascript">
    function tonal(tipo){
           var a = tipo;
           document.location = "consProducao.php?tip="+a;
    }

    function mudaFoto(foto){
            document.getElementById("icone").src = foto;
    }

    function checar1(pagina) 
  { 
    if (confirm("CONFIRMA A EDICAO DO USUARIO?")==true) 
      { 
        window.location=pagina; 
      } 
  }

      function checar2(pagina) 
  { 
    if (confirm("CONFIRMA A EXCLUSAO DO USUARIO?")==true) 
      { 
        window.location=pagina; 
      } 
  }

    
     over = function() {
     var sfEls = document.getElementById("nav").
     getElementsByTagName("LI");
     for (var i=0; i<sfEls.length; i++) {
       sfEls[i].onmouseover=function() {
        this.className+=" over";
       }
       sfEls[i].onmouseout=function() {
        this.className=this.className.
        replace(new RegExp(" over\\b"), "");
       }
     }
    }

    if (window.attachEvent) window.attachEvent("onload", over);


    // construindo o calendário
    function popdate(obj,div,tam,ddd)
    {
        if (ddd)
        {
            day = ""
            mmonth = ""
            ano = ""
            c = 1
            char = ""
            for (s=0;s<parseInt(ddd.length);s++)
            {
                char = ddd.substr(s,1)
                if (char == "/")
                {
                    c++;
                    s++;
                    char = ddd.substr(s,1);
                }
                if (c==1) day    += char
                if (c==2) mmonth += char
                if (c==3) ano    += char
            }
            ddd = mmonth + "/" + day + "/" + ano
        }

        if(!ddd) {today = new Date()} else {today = new Date(ddd)}
        date_Form = eval (obj)
        if (date_Form.value == "") { date_Form = new Date()} else {date_Form = new Date(date_Form.value)}

        ano = today.getFullYear();
        mmonth = today.getMonth ();
        day = today.toString ().substr (8,2)

        umonth = new Array ("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro")
        days_Feb = (!(ano % 4) ? 29 : 28)
        days = new Array (31, days_Feb, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31)

        if ((mmonth < 0) || (mmonth > 11))  alert(mmonth)
        if ((mmonth - 1) == -1) {month_prior = 11; year_prior = ano - 1} else {month_prior = mmonth - 1; year_prior = ano}
        if ((mmonth + 1) == 12) {month_next  = 0;  year_next  = ano + 1} else {month_next  = mmonth + 1; year_next  = ano}
        txt  = "<table bgcolor='#efefff' style='border:solid #330099; border-width:2' cellspacing='0' cellpadding='3' border='0' width='"+tam+"' height='"+tam*1.1 +"'>"
        txt += "<tr bgcolor='#FFFFFF'><td colspan='7' align='center'><table border='0' cellpadding='0' width='100%' bgcolor='#FFFFFF'><tr>"
        txt += "<td width=20% align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+((mmonth+1).toString() +"/01/"+(ano-1).toString())+"') class='Cabecalho_Calendario' title='Ano Anterior'><<</a></td>"
        txt += "<td width=20% align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+( "01/" + (month_prior+1).toString() + "/" + year_prior.toString())+"') class='Cabecalho_Calendario' title='Mês Anterior'><</a></td>"
        txt += "<td width=20% align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+( "01/" + (month_next+1).toString()  + "/" + year_next.toString())+"') class='Cabecalho_Calendario' title='Próximo Mês'>></a></td>"
        txt += "<td width=20% align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+((mmonth+1).toString() +"/01/"+(ano+1).toString())+"') class='Cabecalho_Calendario' title='Próximo Ano'>>></a></td>"
        txt += "<td width=20% align=right><a href=javascript:force_close('"+div+"') class='Cabecalho_Calendario' title='Fechar Calendário'><b>X</b></a></td></tr></table></td></tr>"
        txt += "<tr><td colspan='7' align='right' bgcolor='#ccccff' class='mes'><a href=javascript:pop_year('"+obj+"','"+div+"','"+tam+"','" + (mmonth+1) + "') class='mes'>" + ano.toString() + "</a>"
        txt += " <a href=javascript:pop_month('"+obj+"','"+div+"','"+tam+"','" + ano + "') class='mes'>" + umonth[mmonth] + "</a> <div id='popd' style='position:absolute'></div></td></tr>"
        txt += "<tr bgcolor='#330099'><td width='14%' class='dia' align=center><b>Dom</b></td><td width='14%' class='dia' align=center><b>Seg</b></td><td width='14%' class='dia' align=center><b>Ter</b></td><td width='14%' class='dia' align=center><b>Qua</b></td><td width='14%' class='dia' align=center><b>Qui</b></td><td width='14%' class='dia' align=center><b>Sex<b></td><td width='14%' class='dia' align=center><b>Sab</b></td></tr>"
        today1 = new Date((mmonth+1).toString() +"/01/"+ano.toString());
        diainicio = today1.getDay () + 1;
        week = d = 1
        start = false;

        for (n=1;n<= 42;n++)
        {
            if (week == 1)  txt += "<tr bgcolor='#efefff' align=center>"
            if (week==diainicio) {start = true}
            if (d > days[mmonth]) {start=false}
            if (start)
            {
                dat = new Date((mmonth+1).toString() + "/" + d + "/" + ano.toString())
                day_dat   = dat.toString().substr(0,10)
                day_today  = date_Form.toString().substr(0,10)
                year_dat  = dat.getFullYear ()
                year_today = date_Form.getFullYear ()
                colorcell = ((day_dat == day_today) && (year_dat == year_today) ? " bgcolor='#FFCC00' " : "" )
                txt += "<td"+colorcell+" align=center><a href=javascript:block('"+  d + "/" + (mmonth+1).toString() + "/" + ano.toString() +"','"+ obj +"','" + div +"') class='data'>"+ d.toString() + "</a></td>"
                d ++
            }
            else
            {
                txt += "<td class='data' align=center> </td>"
            }
            week ++
            if (week == 8)
            {
                week = 1; txt += "</tr>"}
            }
            txt += "</table>"
            div2 = eval (div)
            div2.innerHTML = txt
    }

    // função para exibir a janela com os meses
    function pop_month(obj, div, tam, ano)
    {
      txt  = "<table bgcolor='#CCCCFF' border='0' width=80>"
      for (n = 0; n < 12; n++) { txt += "<tr><td align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+("01/" + (n+1).toString() + "/" + ano.toString())+"')>" + umonth[n] +"</a></td></tr>" }
      txt += "</table>"
      popd.innerHTML = txt
    }

    // função para exibir a janela com os anos
    function pop_year(obj, div, tam, umonth)
    {
      txt  = "<table bgcolor='#CCCCFF' border='0' width=160>"
      l = 1
      for (n=1991; n<2012; n++)
      {  if (l == 1) txt += "<tr>"
         txt += "<td align=center><a href=javascript:popdate('"+obj+"','"+div+"','"+tam+"','"+(umonth.toString () +"/01/" + n) +"')>" + n + "</a></td>"
         l++
         if (l == 4)
            {txt += "</tr>"; l = 1 }
      }
      txt += "</tr></table>"
      popd.innerHTML = txt
    }

    // função para fechar o calendário
    function force_close(div)
        { div2 = eval (div); div2.innerHTML = ''}

    // função para fechar o calendário e setar a data no campo de data associado
    function block(data, obj, div)
    {
        force_close (div)
        obj2 = eval(obj)
        obj2.value = data
    }

    $(document).ready(function(){
                    $("select[name='NomeDoFuncionario']").change(function(){
                       $("input[name='CodigoDoFuncionario']").val('Carregando...');
                              $.getJSON(
                                    'function.php',
                                    {id: $(this).val()},
                                    function(data){
                                            $.each(data, function(i, obj){
                                                    $("input[name='CodigoDoFuncionario']").val(obj.CodigoDoFuncionario);

                                            })
                                    });
                    });
            });


    function setshw(par, lay, size) {
      var obj = document.getElementById(setshw.arguments[1]);
      if(navigator.appName.substring(0,9)=="Microsoft")
      {
        obj.style.left = event.x - event.offsetX + document.body.scrollLeft;
        obj.style.top  = event.y - event.offsetY + document.body.scrollTop + size;
      }
      else
      {
        obj.style.left = par.offsetLeft + "px";
        obj.style.top  = par.offsetTop + size + "px";
      }
      obj.style.display ='block';
    }
    function shwlay(lay)
    {
      var obj = document.getElementById(shwlay.arguments[0]);
      obj.style.display='block';
    }
    function hidlay(lay)
    {
      var obj = document.getElementById(hidlay.arguments[0]);
      obj.style.display='none';
    }
    //-->

            $(document).ready(function(){
                    $("select[name='NomeDoFuncionario']").change(function(){
                       $("input[name='CodigoDoFuncionario']").val('Carregando...');
                              $.getJSON(
                                    'function.php',
                                    {id: $(this).val()},
                                    function(data){
                                            $.each(data, function(i, obj){
                                                    $("input[name='CodigoDoFuncionario']").val(obj.CodigoDoFuncionario);

                                            })
                                    });
                    });
            });


    function setshw(par, lay, size) {
      var obj = document.getElementById(setshw.arguments[1]);
      if(navigator.appName.substring(0,9)=="Microsoft")
      {
        obj.style.left = event.x - event.offsetX + document.body.scrollLeft;
        obj.style.top  = event.y - event.offsetY + document.body.scrollTop + size;
      }
      else
      {
        obj.style.left = par.offsetLeft + "px";
        obj.style.top  = par.offsetTop + size + "px";
      }
      obj.style.display ='block';
    }
    function shwlay(lay)
    {
      var obj = document.getElementById(shwlay.arguments[0]);
      obj.style.display='block';
    }
    function hidlay(lay)
    {
      var obj = document.getElementById(hidlay.arguments[0]);
      obj.style.display='none';
    }
    //-->

    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var timeValue = "" + ((hours >12) ? hours -12 :hours)
    timeValue += ((minutes < 10) ? ":0" : ":") + minutes
    timeValue += (hours >= 12) ? " PM" : " AM"
    timerRunning = true;

    mydate = new Date();
    myday = mydate.getDay();
    mymonth = mydate.getMonth();
    myweekday= mydate.getDate();
    weekday= myweekday;
    myyear= mydate.getFullYear();
    year = myyear;

    if(myday == 0)
    day = " Domingo, "

    else if(myday == 1)
    day = " Segunda, "

    else if(myday == 2)
    day = " Terça, "

    else if(myday == 3)
    day = " Quarta, "

    else if(myday == 4)
    day = " Quinta, "

    else if(myday == 5)
    day = " Sexta, "

    else if(myday == 6)
    day = " Sábado, "

    if(mymonth == 0)
    month = " de Janeiro de "

    else if(mymonth ==1)
    month = " de Fevereiro de "

    else if(mymonth ==2)
    month = " de Março de "

    else if(mymonth ==3)
    month = " de Abril de "

    else if(mymonth ==4)
    month = " de Maio de "

    else if(mymonth ==5)
    month = " de Junho de "

    else if(mymonth ==6)
    month = " de Julho de "

    else if(mymonth ==7)
    month = " de Agosto de "

    else if(mymonth ==8)
    month = " de Setembro de "

    else if(mymonth ==9)
    month = " de Outubro de "

    else if(mymonth ==10)
    month = " de Novembro de "

    else if(mymonth ==11)
    month = " de Dezembro de "

    function showTimer() {
    var time=new Date();
    var hour=time.getHours();
    var minute=time.getMinutes();
    var second=time.getSeconds();
    if(hour<10) hour ="0"+hour;
    if(minute<10) minute="0"+minute;
    if(second<10) second="0"+second;
    var st=hour+":"+minute+":"+second;
    document.getElementById("timer").innerHTML=st;
    }
    function initTimer() {
    // O metodo nativo setInterval executa uma determinada funcao em um determinado tempo
    setInterval(showTimer,1000);
    }

    //document.write( "<center>" + day + myweekday + month + year + "</center>" + "<br>");



          function Formatadata(Campo, teclapres)
          {
            var tecla = teclapres.keyCode;
            var vr = new String(Campo.value);
            vr = vr.replace("/", "");
            vr = vr.replace("/", "");
            vr = vr.replace("/", "");
            tam = vr.length + 1;
            if (tecla != 8 && tecla != 8)
            {
              if (tam > 0 && tam < 2)
                Campo.value = vr.substr(0, 2) ;
              if (tam > 2 && tam < 4)
                Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2);
              if (tam > 4 && tam < 7)
                Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2) + '/' + vr.substr(4, 7);
            }
          }

    function formatar_mascara(src, mascara) {
      var campo = src.value.length;
      var saida = mascara.substring(0,1);
      var texto = mascara.substring(campo);
      if(texto.substring(0,1) != saida) {
        src.value += texto.substring(0,1);
      }
    }

    function formatar_moeda(campo, separador_milhar, separador_decimal, tecla) {
      var sep = 0;
      var key = '';
      var i = j = 0;
      var len = len2 = 0;
      var strCheck = '0123456789';
      var aux = aux2 = '';
      var whichCode = (window.Event) ? tecla.which : tecla.keyCode;

      if (whichCode == 13) return true; // Tecla Enter
      if (whichCode == 8) return true; // Tecla Delete
      key = String.fromCharCode(whichCode); // Pegando o valor digitado
      if (strCheck.indexOf(key) == -1) return false; // Valor inválido (não inteiro)
      len = campo.value.length;
      for(i = 0; i < len; i++)
      if ((campo.value.charAt(i) != '0') && (campo.value.charAt(i) != separador_decimal)) break;
      aux = '';
      for(; i < len; i++)
      if (strCheck.indexOf(campo.value.charAt(i))!=-1) aux += campo.value.charAt(i);
      aux += key;
      len = aux.length;
      if (len == 0) campo.value = '';
      if (len == 1) campo.value = '0'+ separador_decimal + '0' + aux;
      if (len == 2) campo.value = '0'+ separador_decimal + aux;

      if (len > 2) {
        aux2 = '';

        for (j = 0, i = len - 3; i >= 0; i--) {
          if (j == 3) {
            aux2 += separador_milhar;
            j = 0;
          }
          aux2 += aux.charAt(i);
          j++;
        }

        campo.value = '';
        len2 = aux2.length;
        for (i = len2 - 1; i >= 0; i--)
        campo.value += aux2.charAt(i);
        campo.value += separador_decimal + aux.substr(len - 2, len);
      }

      return false;
    }

    function formatTelefone(element, e){
      if (e.keyCode != 8){
        length = element.value.length;
        if (length == 2){
          if (element.value.charAt(0)!="(")
            element.value = "(" + element.value + ")";
        }
        if (length == 3){
          if (element.value.charAt(0)=="("){
            element.value += ")";}
        }
      if (length == 8){
          element.value += "-";}
      }
    }

    function MascaraData(data){
            if(mascaraInteiro(data)==false){
                event.returnValue = false;
            }
            return formataCampo(data, '00/00/0000', event);
        }

      //formata de forma generica os campos
        function formataCampo(campo, Mascara, evento) {
            var boleanoMascara;

            var Digitato = evento.keyCode;
            exp = /\-|\.|\/|\(|\)| /g
            campoSoNumeros = campo.value.toString().replace( exp, "" );

            var posicaoCampo = 0;
            var NovoValorCampo="";
            var TamanhoMascara = campoSoNumeros.length;;

            if (Digitato != 8) { // backspace
                for(i=0; i<= TamanhoMascara; i++) {
                    boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                            || (Mascara.charAt(i) == "/"))
                    boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(")
                            || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " "))
                    if (boleanoMascara) {
                        NovoValorCampo += Mascara.charAt(i);
                        TamanhoMascara++;
                    }else {
                        NovoValorCampo += campoSoNumeros.charAt(posicaoCampo);
                        posicaoCampo++;
                    }
                }
                campo.value = NovoValorCampo;
                return true;
            }else {
                return true;
            }
        }  

</script>
<style>
    .dia {font-family: helvetica, arial; font-size: 8pt; color: #FFFFFF}
    .data {font-family: helvetica, arial; font-size: 8pt; text-decoration:none; color:#191970}
    .mes {font-family: helvetica, arial; font-size: 8pt}
    .Cabecalho_Calendario {font-family: helvetica, arial; font-size: 10pt; color: #000000; text-decoration:none; font-weight:bold}
</style>
</head>
<body>
<?php include "cabecalho_usu.php"; 
     $datacad = date('d/m/Y');
     $horacad = date('H:i');
     $datacad2 = date('d/m/Y');
     $horacad2 = date('H:i');
   ?>
<div id="interface">
	 
   <center>
	  <table align="center" width="60%" border="1">
	   <tr align="center" bgcolor="#CCCCCC">
	    <td align="center" style="width: 20%"><font color="#333333" size="3"><b>N&ordm;</b></font></td>
	    <td align="center" style="width: 40%"><font color="#333333" size="3"><b>Nome</b></font></td>
	    <td align="center" style="width: 40%"><font color="#333333" size="3"><b>Data/Hora</b></font></td>
	   </tr>
	  </table>
   </center>

	<?php
		include "conexao.php";
		
		$con = 1; 
		$sql = "select * from acesso order by data desc";
		$resultado = mysqli_query($conn,$sql) or die (mysql_error());

		while ($linha = mysqli_fetch_array($resultado)) {
			$Nome = $linha['nome'];
			$Data = $linha['data'];
						
			if ($con % 2 == 0)
				 $bgcolor = "bgcolor='#FFFFFF'";
			else
				 $bgcolor = "bgcolor='#FFFFCC'";
	 ?>
  	<center>
  	 <table align="center" width="60%"  border="1">
  	  <tr align="center" <? echo $bgcolor; ?>>
  	    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $con; ?></b></font></td>
  	    <td align="left" style="width: 40%"><font <? echo $color; ?> size="3"><b><? echo $Nome."<br /><font color='red'>".$adotante."</font>"; ?></b></font></td>
  	    <td align="center" style="width: 40%"><font color="#333333" size="3"><b><? echo $Data; ?></b></font></td>
  	  </tr>
  	 </table>
    </center>
	<?
	$con = $con + 1;
	}


	$con = $con - 1;
	
	?>

</div>
	<footer id="footer">   
	   <?php include "footer.php"; ?>
	</footer>

</body>
</html>