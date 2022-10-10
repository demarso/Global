$(function(){
	$("#tabela input").keyup(function(){		

		var index = $(this).parent().index();
		var nth = "#tabela td:nth-child("+(index+1).toString()+")";
		var valor = $(this).val().toUpperCase();
		$("#tabela tbody tr").show();
		$(nth).each(function(){
			if($(this).text().toUpperCase().indexOf(valor) < 0){
				$(this).parent().hide();
			}
		});
	});

	$("#tabela input").blur(function(){
		$(this).val("");
	});	
});

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
        }else{ 
          return aurl + "?" + encodeURI(Math.random() + "_" + dt.getTime());
        }
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

            function getEndereco() {
                    // Se o campo CEP não estiver vazio
                    if($.trim($("#cep").val()) != ""){
                        /* 
                            Para conectar no serviço e executar o json, precisamos usar a função
                            getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
                            dataTypes não possibilitam esta interação entre domínios diferentes
                            Estou chamando a url do serviço passando o parâmetro "formato=javascript" e o CEP digitado no formulário
                            http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val()
                        */
                        $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){
                            // o getScript dá um eval no script, então é só ler!
                            //Se o resultado for igual a 1
                            if(resultadoCEP["resultado"]){
                                // troca o valor dos elementos
                                $("#endereco").val(unescape(resultadoCEP["tipo_logradouro"])+": "+unescape(resultadoCEP["logradouro"])+", ");
                                $("#bairro").val(unescape(resultadoCEP["bairro"]));
                                $("#cidade").val(unescape(resultadoCEP["cidade"]));
                                $("#estado").val(unescape(resultadoCEP["uf"]));
                            }else{
                                alert("Endereço não encontrado");
                            }
                        });             
                    }           
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

//adiciona mascara ao CEP
function MascaraCEP(cep){
        if(mascaraInteiro(cep)==false){
                event.returnValue = false;
        }       
        return formataCampo(cep, '00000-000', event);
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