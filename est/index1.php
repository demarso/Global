<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
require("include/arruma_link.php");
if (!isset($_SESSION['idE'])){
    header("Location: index.php?erro=1");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
        <title>GLOBAL - Estoque</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8"/>
        <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
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
        </script>
    </head>
<body>
  <? include "menu.php" ?><br />
  <div id="interface"><br /><br /><br /><br />
    <h1>GLOBAL - CONTROLE DE ESTOQUE</h1>

     
  </div>
  <footer id="footer">   
     <?php include "footer.php"; ?>
  </footer>
 </body>
</html>