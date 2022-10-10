<?php
session_start();
//header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
 if($_SESSION['nivel'] != 0 && $_SESSION['nivel'] != 10){
     echo "<script>alert('Voce nao tem permissao para acessar esta pagina!');history.back(-1);</script>";
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
  <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
  <script type="text/javascript" src="include/jquery-latest.min.js"></script>
  <script type="text/javascript" src="include/script_menu.js"></script>
  <script type="text/javascript" src="include/jquery.maskedinput-1.1.4.pack.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <title>Gestão de Propostas</title>
 <script type="text/javascript">

       $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tabela tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
     
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

    
  </script>
<style>
    .dia {font-family: helvetica, arial; font-size: 8pt; color: #FFFFFF}
    .data {font-family: helvetica, arial; font-size: 8pt; text-decoration:none; color:#191970}
    .mes {font-family: helvetica, arial; font-size: 8pt}
    .Cabecalho_Calendario {font-family: helvetica, arial; font-size: 10pt; color: #000000; text-decoration:none; font-weight:bold}
</style>
</head>
<body>
<!--<img id="logo" src="imagens/logo.png" >-->
<?php include "cabecalho_usu.php"; 
     $datacad = date('d/m/Y');
     $horacad = date('H:i');
     $datacad2 = date('d/m/Y');
     $horacad2 = date('H:i');
   ?>
<div id="interface">
	 <br />
 <input class="form-control input-group-lg" id="myInput" type="text" placeholder="Digite aqui a sua busca...">
 <center>
	<table id="tabela" align="left" width="100%" border="1">
   <thead>
	  <tr align="center" bgcolor="#CCCCCC">
	    <td align="center" style="width: 5%"><font color="#333333" size="3"><b>Editar</b></font></td>
	    <td align="center" style="width: 5%"><font color="#333333" size="3"><b>Deletar</b></font></td>
		  <td align="center" style="width: 5%"><font color="#333333" size="3"><b>N&ordm;</b></font></td>
	    <td align="center" style="width: 10%"><font color="#333333" size="3"><b>Nome</b></font></td>
	    <td align="center" style="width: 10%"><font color="#333333" size="3"><b>Login</b></font></td>
	    <td align="center" style="width: 15%"><font color="#333333" size="3"><b>Senha</b></font></td>
	    <td align="center" style="width: 15%"><font color="#333333" size="3"><b>Regional</b></font></td>
      <td align="center" style="width: 5%"><font color="#333333" size="3"><b>N&iacute;vel</b></font></td>
	   </tr>
   </thead>
	</table>

	<?php
		include "conexao.php";
		$ano = date("Y");
		$today = date("d/m/Y");
		$con = 1; 
		$sql = "select IDUsuario, Nome, login, senha, regional, nivel, status from usuario order by Nome";
		$resultado = mysqli_query($conn,$sql) or die (mysql_error());

		while ($linha = mysqli_fetch_array($resultado)) {
			$IDUsuario = $linha['IDUsuario'];
			$Nome = $linha['Nome'];
			$login = $linha['login'];
			$senha = substr($linha['senha'], 0, 15);
      $senha .= "...";
			$regional = $linha['regional'];
			$nivel = $linha['nivel'];
			$status = $linha['status'];
			
			if ($con % 2 == 0)
				 $bgcolor = "bgcolor='#FFFFFF'";
			else
				 $bgcolor = "bgcolor='#FFFFCC'";
	 ?>
  <?php if($Nome != "Denilson Soares") { ?>
	  <center>
     <table id="tabela" align="left" width="100%"  border="1">
     <tbody>
  	  <tr align="center" <? echo $bgcolor; ?>>
  	    <td align="center" style="width: 5%">
  		   <?
  		   echo "<a href=\"javascript:checar1('usuario_edita.php?id=".$IDUsuario."');\"><img src=\"imagens/letra-e.png\" width=\"20\" border=\"0\" alt=\"Click para editar o Usu&aacute;rio.\" title=\"Click para editar o Usu&aacute;rio.\"></a>";
  		   ?>
  		</td>
  	    <td align="center" style="width: 5%">
  		   <?
  		   echo "<a href=\"javascript:checar2('usuario_deleta.php?id=".$IDUsuario."');\"><img src=\"imagens/letra-d.png\" width=\"20\" border=\"0\" alt=\"Click para deletar o Usu&aacute;rio.\" title=\"Click para deletar o Usu&aacute;rio.\"></a>";
  		   ?>

  		</td>
  	    <td align="center" style="width: 5%"><font color="#333333" size="3"><b><? echo $con; ?></b></font></td>
  	    <td align="left" style="width: 10%"><font <? echo $color; ?> size="3"><b><? echo $Nome."<br /><font color='red'>".$adotante."</font>"; ?></b></font></td>
  	    <td align="center" style="width: 10%"><font color="#333333" size="3"><b><? echo $login; ?></b></font></td>
  	    <td align="center" style="width: 15%"><font color="#333333" size="3"><b><? echo $senha; ?></b></font></td>
  	    <td align="center" style="width: 15%"><font color="#333333" size="3"><b><? echo $regional; ?></b></font></td>
  	    <td align="center" style="width: 5%"><font color="#333333" size="3"><b><? echo $nivel; ?></b></font></td>

  	  </tr>
     </tbody> 
	   </table>
    </center>
  <? 
  } 
	$con = $con + 1;
	}

	$con = $con - 1;
	$saldo = number_format(round($saldo * 2 )/ 2,2);
	?>


	<footer id="footer">   
	   <?php include "footer.php"; ?>
	</footer>
</div>
</body>
</html>