var ieBlink = (document.all)?true:false;
function doBlink(){
	if(ieBlink){
		obj = document.getElementsByTagName('BLINK');
		for(i=0;i<obj.length;i++){
			tag=obj[i];
			tag.style.visibility=(tag.style.visibility=='hidden')?'visible':'hidden';
		}
	}
}

function ajaxGet(url,elemento_retorno,exibe_carregando){
/******
* ajaxGet - Coloca o retorno de uma url em um elemento qualquer
* Use a vontade mas coloque meu nome nos créditos. Dúvidas, me mande um email.
* A função é grande, coloque-a em um arquivo .js separado.
* Versão: 1.2 - 20/04/2006
* Autor: Micox - Náiron J.C.G - micoxjcg@yahoo.com.br - elmicox.blogspot.com
* Parametros:
* url: string; elemento_retorno: object||string; exibe_carregando:boolean
*  - Se elemento_retorno for um elemento html (inclusive inputs e selects),
*    exibe o retorno no innerHTML / value / options do elemento
*  - Se elemento_retorno for o nome de uma variavel
*    (o nome da variável deve ser declarado por string, pois será feito um eval)
*    a função irá atribuir o retorno à variável ao receber a url.
*******/
    var ajax1 = pegaAjax();
    if(ajax1){
        url = antiCacheRand(url)
        ajax1.onreadystatechange = ajaxOnReady
        ajax1.open("GET", url ,true);
        //ajax1.setRequestHeader("Content-Type", "text/html; charset=iso-8859-1");//"application/x-www-form-urlencoded");
        ajax1.setRequestHeader("Cache-Control", "no-cache");
        ajax1.setRequestHeader("Pragma", "no-cache");
        if(exibe_carregando){ put("Carregando ...")    }
        ajax1.send(null)
        return true;
    }else{
        return false;
    }
    function ajaxOnReady(){
        if (ajax1.readyState==4){
            if(ajax1.status == 200){
                var texto=ajax1.responseText;
                if(texto.indexOf(" ")<0) texto=texto.replace(/\+/g," ");
                //texto=unescape(texto); //descomente esta linha se tiver usado o urlencode no php ou asp
                put(texto);
                extraiScript(texto);
            }else{
                if(exibe_carregando){put("Falha no carregamento. " + httpStatus(ajax1.status));}
            }
            ajax1 = null
        }else if(exibe_carregando){//para mudar o status de cada carregando
                put("Carregando ..." )
        }
    }
    function put(valor){ //coloca o valor na variavel/elemento de retorno
        if((typeof(elemento_retorno)).toLowerCase()=="string"){ //se for o nome da string
            if(valor!="Falha no carregamento"){
                eval(elemento_retorno + '= unescape("' + escape(valor) + '")')
            }
        }else if(elemento_retorno.tagName.toLowerCase()=="input"){
            valor = escape(valor).replace(/\%0D\%0A/g,"")
            elemento_retorno.value = unescape(valor);
        }else if(elemento_retorno.tagName.toLowerCase()=="select"){        
            select_innerHTML(elemento_retorno,valor)
        }else if(elemento_retorno.tagName){
            elemento_retorno.innerHTML = valor;
            //alert(elemento_retorno.innerHTML)
        }    
    }
    function pegaAjax(){ //instancia um novo xmlhttprequest
        //baseado na getXMLHttpObj que possui muitas cópias na net e eu nao sei quem é o autor original
        if(typeof(XMLHttpRequest)!='undefined'){return new XMLHttpRequest();}
        var axO=['Microsoft.XMLHTTP','Msxml2.XMLHTTP','Msxml2.XMLHTTP.6.0','Msxml2.XMLHTTP.4.0','Msxml2.XMLHTTP.3.0'];
        for(var i=0;i<axO.length;i++){ try{ return new ActiveXObject(axO[i]);}catch(e){} }
        return null;
    }
    function httpStatus(stat){ //retorna o texto do erro http
        switch(stat){
            case 0: return "Erro desconhecido de javascript";
            case 400: return "400: Solicitação incompreensível"; break;
            case 403: case 404: return "404: Não foi encontrada a URL solicitada"; break;
            case 405: return "405: O servidor não suporta o método solicitado"; break;
            case 500: return "500: Erro desconhecido de natureza do servidor"; break;
            case 503: return "503: Capacidade máxima do servidor alcançada"; break;
            default: return "Erro " + stat + ". Mais informações em http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html"; break;
        }
    }
    function antiCacheRand(aurl){
        var dt = new Date();
        if(aurl.indexOf("?")>=0){// já tem parametros
            return aurl + "&" + encodeURI(Math.random() + "_" + dt.getTime());
        }else{ return aurl + "?" + encodeURI(Math.random() + "_" + dt.getTime());}
    }
}
function select_innerHTML(objeto,innerHTML){
/******
* select_innerHTML - altera o innerHTML de um select independente se é FF ou IE
* Corrige o problema de não ser possível usar o innerHTML no IE corretamente
* Veja o problema em: http://support.microsoft.com/default.aspx?scid=kb;en-us;276228
* Use a vontade mas coloque meu nome nos créditos. Dúvidas, me mande um email.
* Versão: 1.0 - 06/04/2006
* Autor: Micox - Náiron J.C.G - micoxjcg@yahoo.com.br - elmicox.blogspot.com
* Parametros:
* objeto(tipo object): o select a ser alterado
* innerHTML(tipo string): o novo valor do innerHTML
*******/
    objeto.innerHTML = ""
    var selTemp = document.createElement("micoxselect")
    var opt;
    selTemp.id="micoxselect1"
    document.body.appendChild(selTemp)
    selTemp = document.getElementById("micoxselect1")
    selTemp.style.display="none"
    if(innerHTML.toLowerCase().indexOf("<option")<0){//se não é option eu converto
        innerHTML = "<option>" + innerHTML + "</option>"
    }
    innerHTML = innerHTML.replace(/<option/g,"<span").replace(/<\/option/g,"</span")
    selTemp.innerHTML = innerHTML
    for(var i=0;i<selTemp.childNodes.length;i++){
        if(selTemp.childNodes[i].tagName){
            opt = document.createElement("OPTION")
            for(var j=0;j<selTemp.childNodes[i].attributes.length;j++){
                opt.setAttributeNode(selTemp.childNodes[i].attributes[j].cloneNode(true))
            }
            opt.value = selTemp.childNodes[i].getAttribute("value")
            opt.text = selTemp.childNodes[i].innerHTML
            if(document.all){ //IEca
                objeto.add(opt)
            }else{
                objeto.appendChild(opt)
            }                    
        }    
    }
    document.body.removeChild(selTemp)
    selTemp = null
}

function extraiScript(texto){
//Maravilhosa função feita pelo SkyWalker.TO do imasters/forum
//http://forum.imasters.com.br/index.php?showtopic=165277&
    // inicializa o inicio ><
    var ini = 0;
    // loop enquanto achar um script
    while (ini!=-1){
        // procura uma tag de script
        ini = texto.indexOf('<script', ini);
        // se encontrar
        if (ini >=0){
            // define o inicio para depois do fechamento dessa tag
            ini = texto.indexOf('>', ini) + 1;
            // procura o final do script
            var fim = texto.indexOf('</script>', ini);
            // extrai apenas o script
            codigo = texto.substring(ini,fim);
            // executa o script
            //eval(codigo);
            /**********************
            * Alterado por Micox - micoxjcg@yahoo.com.br
            * Alterei pois com o eval não executava funções.
            ***********************/
            novo = document.createElement("script")
            novo.text = codigo;
            document.body.appendChild(novo);
        }
    }
}

 /***********************************************************************************************************************************/


function loadXMLDoc(url,valor)
{
    req = null;
    // Procura por um objeto nativo (Mozilla/Safari)
    if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
        req.onreadystatechange = processReqChange;
        req.open("GET", url+'?categoria='+valor, true);
        req.send(null);
    // Procura por uma versao ActiveX (IE)
    } else if (window.ActiveXObject) {
        req = new ActiveXObject("Microsoft.XMLHTTP");
        if (req) {
            req.onreadystatechange = processReqChange;
            req.open("GET", url+'?categoria='+valor, true);
            req.send();
        }
    }
}

function processReqChange()
{
    // apenas quando o estado for "completado"
    if (req.readyState == 4) {
        // apenas se o servidor retornar "OK"
        if (req.status == 200) {
            // procura pela div id="atualiza" e insere o conteudo
            // retornado nela, como texto HTML
            document.getElementById('atualiza').innerHTML = req.responseText;
        } else {
            alert("Houve um problema ao obter os dados:\n" + req.statusText);
        }
    }
}

function Atualiza(valor)
{
    loadXMLDoc("Atualiza.php",valor);
}

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



function ConsisteTecla(Tecla,Campo)
{
        if (Tecla > 47 && Tecla < 58)
      {
         event.returnValue = true;
         ConsisteHora(Campo);     
        }
        else
        {
     event.returnValue = false;
        }
}
function ConsisteHora(Campo)
{
      back = '';
            if(Campo.value.length == 2)
      { 
              hrs = (Campo.value.substring(0,2));
                if (hrs >= 00 && hrs <= 23)
                {
                    Campo.value += ":";
                    event.returnValue = true;
                    back = (Campo.value.substring(0,3));
                }
                else
                {
                    Campo.value = "";
                    event.returnValue = false;
                }
            }
            else if(Campo.value.length == 4)
            {
            min = (Campo.value.substring(3,4));
            if (min >= 0 && min < 6)
                {
                    event.returnValue = true; 
                }
                else
                {
                    back = (Campo.value.substring(0,3));
                    Campo.value = "";
                    Campo.value    = back;
                    event.returnValue = false;
                }
            }
        
}
//*****************************************************************************************************
function ValidEmail()
{
  var obj = eval("document.forms[0].Email");
  var txt = obj.value;
  if ((txt.length != 0) && ((txt.indexOf("@") < 1) || (txt.indexOf('.') < 7)))
  {
    alert('Email incorreto');
	obj.focus();
  }
}
//*****************************************************************************************************
function validaEMAIL($email){ 
   $mail_correcto = 0; 
   //verifico umas coisas 
   if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){ 
      if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) { 
         //vejo se tem caracter . (ponto)
         if (substr_count($email,".")>= 1){ 
            //obtenho a terminação do dominio 
            $term_dom = substr(strrchr ($email, '.'),1); 
            //verifico que a terminação do dominio seja correcta 
         if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){ 
            //verifico que o de antes do dominio seja correcto 
            $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1); 
            $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1); 
            if ($caracter_ult != "@" && $caracter_ult != "."){ 
               $mail_correcto = 1; 
            } 
         } 
      } 
   } 
} 

if ($mail_correcto) 
   return true; 
else 
   return false; 
}

//*****************************************************************************************************

function ValidaCNPJ(cnpj) {

  var i = 0;
  var l = 0;
  var strNum = "";
  var strMul = "6543298765432";
  var character = "";
  var iValido = 1;
  var iSoma = 0;
  var strNum_base = "";
  var iLenNum_base = 0;
  var iLenMul = 0;
  var iSoma = 0;
  var strNum_base = 0;
  var iLenNum_base = 0;

  if (cnpj == "")
        return ("Preencha o campo CNPJ.");

  l = cnpj.length;
  for (i = 0; i < l; i++) {
        caracter = cnpj.substring(i,i+1)
        if ((caracter >= '0') && (caracter <= '9'))
           strNum = strNum + caracter;
  };

  if(strNum.length != 14)
        return ("CNPJ deve conter 14 caracteres.");

  strNum_base = strNum.substring(0,12);
  iLenNum_base = strNum_base.length - 1;
  iLenMul = strMul.length - 1;
  for(i = 0;i < 12; i++)
        iSoma = iSoma +
                        parseInt(strNum_base.substring((iLenNum_base-i),(iLenNum_base-i)+1),10) *
                        parseInt(strMul.substring((iLenMul-i),(iLenMul-i)+1),10);

  iSoma = 11 - (iSoma - Math.floor(iSoma/11) * 11);
  if(iSoma == 11 || iSoma == 10)
        iSoma = 0;

  strNum_base = strNum_base + iSoma;
  iSoma = 0;
  iLenNum_base = strNum_base.length - 1
  for(i = 0; i < 13; i++)
        iSoma = iSoma +
                        parseInt(strNum_base.substring((iLenNum_base-i),(iLenNum_base-i)+1),10) *
                        parseInt(strMul.substring((iLenMul-i),(iLenMul-i)+1),10)

  iSoma = 11 - (iSoma - Math.floor(iSoma/11) * 11);
  if(iSoma == 11 || iSoma == 10)
        iSoma = 0;
  strNum_base = strNum_base + iSoma;
  if(strNum != strNum_base)
        return ("CNPJ inválido.");

  return ("CNPJ OK!");

}
 //*****************************************************************************************************
// Relógio e data na tela
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


//*****************************************************************************************************
function formatar_mascara(src, mascara) {
	var campo = src.value.length;
	var saida = mascara.substring(0,1);
	var texto = mascara.substring(campo);
	if(texto.substring(0,1) != saida) {
		src.value += texto.substring(0,1);
	}
}
//*****************************************************************************************************
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
//*****************************************************************************************************
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
/*
$(document).ready(function(){
		$("#Telefone").mask("99)9999-9999");
		$("#CelMae").mask("99)9999-9999");
		$("#CelPai").mask("99)9999-9999");
		$("#cpf").mask("999.999.999-99");
		$("#cep").mask("99999-999");
		$("#data").mask("99/99/9999");
	}); 
	
<!-- Begin
var n;
var p;
var p1;
function ValidatePhone(){
p=p1.value
if(p.length==2){
//d10=p.indexOf('(')
pp=p;
d4=p.indexOf('(')
d5=p.indexOf(')')
if(d4==-1){
pp="("+pp;
}
if(d5==-1){
pp=pp+")";
}
//pp="("+pp+")";
document.form1.telefone.value="";
document.form1.telefone.value=pp;
}
if(p.length>2){
d1=p.indexOf('(')
d2=p.indexOf(')')
if(d2==-1){
l30=p.length;
p30=p.substring(0,4);
//alert(p30);
p30=p30+")"
p31=p.substring(4,l30);
pp=p30+p31;
//alert(p31);
document.form1.telefone.value="";
document.form1.telefone.value=pp;
}
}
if(p.length>5){
p11=p.substring(d1+1,d2);
if(p11.length>3){
p12=p11;
l12=p12.length;
l15=p.length
//l12=l12-3
p13=p11.substring(0,3);
p14=p11.substring(3,l12);
p15=p.substring(d2+1,l15);
document.form1.telefone.value="";
pp="("+p13+")"+p14+p15;
document.form1.telefone.value=pp;
//obj1.value="";
//obj1.value=pp;
}
l16=p.length;
p16=p.substring(d2+1,l16);
l17=p16.length;
if(l17>3&&p16.indexOf('-')==-1){
p17=p.substring(d2+1,d2+5);
p18=p.substring(d2+5,l16);
p19=p.substring(0,d2+1);
//alert(p19);
pp=p19+p17+"-"+p18;
document.form1.telefone.value="";
document.form1.telefone.value=pp;
//obj1.value="";
//obj1.value=pp;
}
}
//}
setTimeout(ValidatePhone,100)
}
function getIt(m){
n=m.name;
//p1=document.forms[0].elements[n]
p1=m
ValidatePhone()
}
function testphone(obj1){
p=obj1.value
//alert(p)
p=p.replace("(","")
p=p.replace(")","")
p=p.replace("-","")
p=p.replace("-","")
//alert(isNaN(p))
if(isNaN(p)==true){
alert("Check phone");
return false;
}
}
// End -->
*/
//*****************************************************************************************************
function valida_dados (nomeform)
{
    if (nomeform.rsoacial.value=="")
    {
        alert ("Por favor digite a Razão Social.");
        return false;
    }

    if (nomeform.endereco.value=="")
    {
        alert ("Por favor digite o endereço.");
        return false;
    }

    if (nomeform.telefone.value=="")
    {
        alert ("Por favor digite o telefone.");
        return false;
    }

    if (nomeform.fantasia.value=="")
    {
        alert ("Por favor digite o nome fantasia.");
        return false;
    }

    if (nomeform.cnpj.value=="")
    {
        alert ("Por favor digite o cnpj.");
        return false;
    }


    if (nomeform.nome.value=="")
    {
        alert ("Por favor digite o nome.");
        return false;
    }
    /*if (nomeform.uf.selectedIndex ==0)
    {
        alert ("Por favor selecione o estado.");
        return false;
    }*/
    if (nomeform.login.value=="" || nomeform.login.value.indexOf('@', 0) == -1 || nomeform.login.value.indexOf('.', 0) == -1)
    {
        alert ("E-mail invalido.");
        return false;
    }

    if (nomeform.telefone.value=="")
    {
        alert ("Por favor digite o telefone.");
        return false;
    }
/*
    if (nomeform.banco.value=="")
    {
        alert ("Por favor digite o banco.");
        return false;
    }


    if (nomeform.ag.value=="")
    {
        alert ("Por favor digite a agencia bancaria.");
        return false;
    }

    if (nomeform.conta.value=="")
    {
        alert ("Por favor digite a conta.");
        return false;
    }*/

    
return true;
}

/*function verificasenha(nomeform)
{
  while(true){
    if (nomeform.Senha.value=="")
    {
        alert ("Por favor digite a Senha Antiga.");
        berak;
    }
	
    if (nomeform.Senha1.value=="")
    {
        alert ("Por favor digite a Nova Senha.");
        break;
    }
	
    if (nomeform.Senha2.value=="")
    {
        alert ("Você deve confirmar a sua senha Nova.");
       break;
    }
	
   
    if (nomeform.Senha1.value != nomeform.Senha2.value)
    { 
   	 alert ("Os campos Senha e confirmação de Senha devem ser idênticos");
	 break;
    }
  }
  return true;
}*/

function conta(){ 
      	document.formulario.caracteres.value=document.formulario.equipamento.value.length 
		           
} 

function conta1(){ 
      	document.formulario.caracteres1.value=document.formulario.servico.value.length 
} 

function conta2(){ 
      	document.formulario.caracteres2.value=document.formulario.obs.value.length 
} 

function textCounter(field, countfield, maxlimit) {
 if (field.value.length > maxlimit) // if too long...trim it!
    field.value = field.value.substring(0, maxlimit);
 // otherwise, update 'characters left' counter
 else 
    countfield.value = maxlimit - field.value.length;
 }
 
limite=200; //altere o 15 pelo valor q vc desejar ser o limite de caracteres
rest=limite;
function Verifica() {
    if(rest>0) {
        rest = limite-document.getElementById("texto").value.length;
        document.getElementById("limite").value=rest;
        antes = document.getElementById("texto").value;
    } else
        document.getElementById("texto").value = antes;
}

/*Calendário
function maxDays(mm, yyyy){
var mDay;
	if((mm == 3) || (mm == 5) || (mm == 8) || (mm == 10)){
		mDay = 30;
  	}
  	else{
  		mDay = 31
  		if(mm == 1){
   			if (yyyy/4 - parseInt(yyyy/4) != 0){
   				mDay = 28
   			}
		   	else{
   				mDay = 29
  			}
		}
  }
return mDay;
}
function changeBg(id){
	if (eval(id).style.backgroundColor != "yellow"){
		eval(id).style.backgroundColor = "yellow"
	}
	else{
		eval(id).style.backgroundColor = "#ffffff"
	}
}
function writeCalendar(){
var now = new Date
var dd = now.getDate()
var mm = now.getMonth()
var dow = now.getDay()
var yyyy = now.getFullYear()
var arrM = new Array("Janeiro","Fevereiro","Marco","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro")
var arrY = new Array()
	for (ii=0;ii<=4;ii++){
		arrY[ii] = yyyy - 2 + ii
	}
var arrD = new Array("Dom","Seg","Ter","Qua","Qui","Sex","Sab")

var text = ""
text = "<form name=calForm>"
text += "<table border=1>"
text += "<tr><td>"
text += "<table width=80%><tr>"
text += "<td align=left>"
text += "<select name=selMonth onChange='changeCal()'>"
	for (ii=0;ii<=11;ii++){
		if (ii==mm){
			text += "<option value= " + ii + " Selected>" + arrM[ii] + "</option>"
		}
		else{
			text += "<option value= " + ii + ">" + arrM[ii] + "</option>"
		}
	}
text += "</select>"
text += "</td>"
text += "<td align=right>"
text += "<select name=selYear onChange='changeCal()'>"
	for (ii=0;ii<=4;ii++){
		if (ii==2){
			text += "<option value= " + arrY[ii] + " Selected>" + arrY[ii] + "</option>"
		}
		else{
			text += "<option value= " + arrY[ii] + ">" + arrY[ii] + "</option>"
		}
	}
text += "</select>"
text += "</td>"
text += "</tr></table>"
text += "</td></tr>"
text += "<tr><td>"
text += "<table border=1>"
text += "<tr>"
	for (ii=0;ii<=6;ii++){
		text += "<td align=center><span class=label>" + arrD[ii] + "</span></td>"
	}
text += "</tr>"
aa = 0
	for (kk=0;kk<=5;kk++){
		text += "<tr>"
		for (ii=0;ii<=6;ii++){
			text += "<td align=center><span id=sp" + aa + " onClick='changeBg(this.id)'>1</span></td>"
			aa += 1
		}
		text += "</tr>"
	}
text += "</table>"
text += "</td></tr>"
text += "</table>"
text += "</form>"
document.write(text)
changeCal()
}
function changeCal(){
var now = new Date
var dd = now.getDate()
var mm = now.getMonth()
var dow = now.getDay()
var yyyy = now.getFullYear()
var currM = parseInt(document.calForm.selMonth.value)
var prevM
	if (currM!=0){
		prevM = currM - 1
	}
	else{
		prevM = 11
	}
var currY = parseInt(document.calForm.selYear.value)
var mmyyyy = new Date()
mmyyyy.setFullYear(currY)
mmyyyy.setMonth(currM)
mmyyyy.setDate(1)
var day1 = mmyyyy.getDay()
	if (day1 == 0){
		day1 = 7
	}
var arrN = new Array(41)
var aa
	for (ii=0;ii<day1;ii++){
		arrN[ii] = maxDays((prevM),currY) - day1 + ii + 1
	}
	aa = 1
	for (ii=day1;ii<=day1+maxDays(currM,currY)-1;ii++){
		arrN[ii] = aa
		aa += 1
	}
	aa = 1
	for (ii=day1+maxDays(currM,currY);ii<=41;ii++){
		arrN[ii] = aa
		aa += 1
	}
	for (ii=0;ii<=41;ii++){
		eval("sp"+ii).style.backgroundColor = "#FFFFFF"
	}
var dCount = 0
	for (ii=0;ii<=41;ii++){
		if (((ii<7)&&(arrN[ii]>20))||((ii>27)&&(arrN[ii]<20))){
			eval("sp"+ii).innerHTML = arrN[ii]
			eval("sp"+ii).className = "c3"
		}
		else{
			eval("sp"+ii).innerHTML = arrN[ii]
			if ((dCount==0)||(dCount==6)){
				eval("sp"+ii).className = "c2"
			}
			else{
				eval("sp"+ii).className = "c1"
			}
			if ((arrN[ii]==dd)&&(mm==currM)&&(yyyy==currY)){
				eval("sp"+ii).style.backgroundColor="#90EE90"
			}
		}
	dCount += 1
		if (dCount>6){
			dCount=0
		}
	}
}
function desabilitar(){ 
   	alert ("* * * D E S A B I L I T A D O * * *") 
   	return false 
}

document.oncontextmenu=desabilitar  

function desabilita($NomeEx){
	if ($NomeEx == "** ALUNO NÃO FAZ PROVAS **")
 document.getElementById('enviar').disabled = true; // desabilitar
}
*/
/********** PROCESSA SELEÇÃO***************************/

function ajaxGetInfo(title)
{
	a = ajax();
	if(a!=null)
	{
		a.onreadystatechange = function() { if(a.readyState == 4) document.getElementById('info').value = a.responseText; }
		a.open("GET", "processSelecao.php?Turma="+title, true);
		a.send(null);
	}
	else document.getElementById('info').value = "Error retrieving data!";
}
 

function ajaxGetRecord(title)
{
	a = ajax();
	if(a!=null)
	{
		a.onreadystatechange = function() { if(a.readyState == 4) document.getElementById('info').value = a.responseText; }
		a.open("GET", "ConsAlunoNext.php?id="+title, true);
		a.send(null);
	}
	else document.getElementById('info').value = "Error retrieving data!";
}
 
function ajax()
{
	if(window.XMLHttpRequest) return new XMLHttpRequest();
	if(window.ActiveXObject) return new ActiveXObject("Microsoft.XMLHTTP");
	return null;
}
/*
</head>
 <body>
  <select name="books" onchange="ajaxGetInfo(this.value)"></select>
  <textarea name="info" id="info" cols="20" rows="5"></textarea>
 </body>
</html>
*/
/********** FIM - PROCESSA SELEÇÃO***************************/

function MascaraCNPJ(cnpj){
        if(mascaraInteiro(cnpj)==false){
                event.returnValue = false;
        }       
        return formataCampo(cnpj, '00.000.000/0000-00', event);
}

//adiciona mascara de cep
function MascaraCep(cep){
                if(mascaraInteiro(cep)==false){
                event.returnValue = false;
        }       
        return formataCampo(cep, '00000-000', event);
}

//adiciona mascara de data
function MascaraData(data){
        if(mascaraInteiro(data)==false){
                event.returnValue = false;
        }       
        return formataCampo(data, '00/00/0000', event);
}

//adiciona mascara ao telefone
function MascaraTelefone(tel){  
        if(mascaraInteiro(tel)==false){
                event.returnValue = false;
        }       
        return formataCampo(tel, '(00) 0000-0000', event);
}

function MascaraCelular(cel){  
        if(mascaraInteiro(cel)==false){
                event.returnValue = false;
        }       
        return formataCampo(cel, '(00) 00000-0000', event);
}

function MascaraLetra(comp){  
        if(mascaraLetra(comp)==false){
                event.returnValue = false;
        }       
        return formataCampo(comp, 'A', event);
}

//adiciona mascara ao CPF
function MascaraCPF(cpf){
        if(mascaraInteiro(cpf)==false){
                event.returnValue = false;
        }       
        return formataCampo(cpf, '000.000.000-00', event);
}

//valida telefone
function ValidaTelefone(tel){
        exp = /\(\d{2}\)\ \d{4}\-\d{4}/
        if(!exp.test(tel.value))
                alert('Numero de Telefone Invalido!');
}

//valida CEP
function ValidaCep(cep){
        exp = /\d{2}\.\d{3}\-\d{3}/
        if(!exp.test(cep.value))
                alert('Numero de Cep Invalido!');               
}

//valida data
function ValidaData(data){
        exp = /\d{2}\/\d{2}\/\d{4}/
        if(!exp.test(data.value))
                alert('Data Invalida!');                        
}

//valida o CPF digitado
function ValidarCPF(Objcpf){
        var cpf = Objcpf.value;
        exp = /\.|\-/g
        cpf = cpf.toString().replace( exp, "" ); 
        var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
        var soma1=0, soma2=0;
        var vlr =11;
        
        for(i=0;i<9;i++){
                soma1+=eval(cpf.charAt(i)*(vlr-1));
                soma2+=eval(cpf.charAt(i)*vlr);
                vlr--;
        }       
        soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
        soma2=(((soma2+(2*soma1))*10)%11);
        
        var digitoGerado=(soma1*10)+soma2;
        if(digitoGerado!=digitoDigitado)        
                alert('CPF Invalido!');         
}

//valida numero inteiro com mascara
function mascaraInteiro(){
        if (event.keyCode < 48 || event.keyCode > 57){
                event.returnValue = false;
                return false;
        }
        return true;
}

function mascaraLetra(){
        if (event.keyCode <= 65 && event.keyCode >= 122 && event.keyCode > 90 && event.keyCode < 97 )
		{
                event.returnValue = false;
                return false;
        }
        return true;
}

//valida o CNPJ digitado
function ValidarCNPJ(ObjCnpj){
        var cnpj = ObjCnpj.value;
        var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
        var dig1= new Number;
        var dig2= new Number;
        
        exp = /\.|\-|\//g
        cnpj = cnpj.toString().replace( exp, "" ); 
        var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));
                
        for(i = 0; i<valida.length; i++){
                dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);  
                dig2 += cnpj.charAt(i)*valida[i];       
        }
        dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
        dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));
        
        if(((dig1*10)+dig2) != digito)  
                alert('CNPJ Invalido!');
                
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

function virgula(){	
if(document.form1.Notas.value.indexOf(",")!=-1){	
alert("Virgula não pode");	
document.form1.Notas.value="";	
}	
}

function Onlynumbers(e)
{
        var tecla=new Number();
        if(window.event) {
                tecla = e.keyCode;
        }
        else if(e.which) {
                tecla = e.which;
        }
        else {
                return true;
        }
        if((tecla >= "97") && (tecla <= "122")){
                return false;
        }
}

function Onlychars(e)
{
        var tecla=new Number();
        if(window.event) {
                tecla = e.keyCode;
        }
        else if(e.which) {
                tecla = e.which;
        }
        else {
                return true;
        }
        if((tecla >= "48") && (tecla <= "57")){
                return false;
        }
}
	