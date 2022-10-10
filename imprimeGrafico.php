<html>
 <head>
  <script tipo = "text / javascript" src = "https://www.gstatic.com/charts/loader.js" ></script> 
   <script tipo = "text / javascript" >     
   	  google.gráficos.de carga("corrente",{
   	   pacotes:['corechart']
   	  });     
   	  google.gráficos.setOnLoadCallback(drawChart);

      visualização.arrayToDataTable([['elemento' , 'densidade' , { papel : 'estilo' }], [ 'cobre' , 8.94 , '# b87333' , ], [ 'Prata' , 10,49 , 'prata' ], [ 'Gold ' , 19.30 , 'ouro' ], [ 'Platinum' , 21.45 , 'color: # e5e4e2' ] ]);
           
      : "Densidade de metais preciosos, em g / cm ^ 3" , bar : { 
         groupWidth : '95%' 
      },         
         legenda : 'nenhuma' , 
      }; 
      var chart_div = documento.getElementById('chart_div'); 
      var gráfico = novo Google.visualização.ColumnChart(chart_div);
       // Espere até que o gráfico para concluir o desenho antes de chamar o método getImageURI ().       google . visualização . 
  
      eventos.addListener(gráfico ,'pronto',função (){         
      	 chart_div.innerHTML = '<img src = "'+gráfico.getImageURI()+'">' ;         
      	 consola.log(chart_div.innerHTML); 
      });       
         gráfico.desenhar(dados,opções); 
      } 
   </script>
</head>
<body>
	<div id = 'chart_div' > </div>
</body> 
</html>