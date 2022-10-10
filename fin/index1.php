<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['idF'])){
    header("Location: index.php?erro=1");
    exit;
 }
 
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>>GLOBAL - Financeiro</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css?version=12">
  <link rel="stylesheet" href="css/navbar.css">
  <script>
      (function($){
      $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');

        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
        $('.dropdown-submenu .show').removeClass("show");
        });

        return false;
      });
    })(jQuery)
</script>
</head>
<body class="bg-info">
  <?  include "menu.php"; ?>  
  <div class="container" id="home">
    <div class="row">
        <div class="col-12 text-center mt-5">
            <h1>GLOBAL - CONTROLE FINANCEIRO</h1>
        </div>
    </div>
 </div>
 <? include "footer.html"; ?>
    <script src="include/jquery.min.js"></script>
    <script src="include/bootstrap.bundle.min.js"></script>
    <script src="include/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="include/custom.js"></script>
    <script src="include/jquery-3.2.1.min.js"></script>
    <script src="include/popper.min.js"></script>
    <script src="include/bootstrap.min.js"></script>
    <script src="include/navbar.js"></script>  
</body>
</html>