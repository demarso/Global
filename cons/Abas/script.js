<script type="text/javascript">
02 	$(document).ready(function(){
03 		$("#content div:nth-child(1)").show();
04 		$(".abas li:first div").addClass("selected");		
05 		$(".aba").click(function(){
06 			$(".aba").removeClass("selected");
07 			$(this).addClass("selected");
08 			var indice = $(this).parent().index();
09 			indice++;
10 			$("#content div").hide();
11 			$("#content div:nth-child("+indice+")").show();
12 		});
13 		
14 		$(".aba").hover(
15 			function(){$(this).addClass("ativa")},
16 			function(){$(this).removeClass("ativa")}
17 		);				
18 	});
19 </script>