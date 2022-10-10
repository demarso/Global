<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
/*if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }*/
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GESTÃO - GLOBAL</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css?version=12">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
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
            });]
</script>
<body class="bg-info">
<?  include "menuB.php"; ?>  
<div class="container" id="home">
     <br>
      <a href="AlteraSenha.php">Alterar Senha</a> <br /><br />
     
      <? if($_SESSION['nome'] == "Vivian Martins" || $_SESSION['nome'] == "Denilson Soares"){ ?>
        <div class="row mt-5 mb-5 text-center">
          <div class="col-sm">
             <a href="indexP.php" class="btn btn-primary btn-bg">
          <span class="fas fa-male mr-2"></span>CONSULTORES</a>
         </div>
        </div> 
      <?  }  ?>
    
    
</div>
<? include "footer.html"; ?>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/script.js"></script>  
</body>
</html>