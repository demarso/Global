<!DOCTYPE html>
<html lang="pt-br">
<head>
        <title>GLOBAL - Financeiro</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8"/>
        <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="include/script.js"></script>
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
  <div id="interface"><br /><br /><br /><br />
    <h1>GLOBAL - CONTROLE FINANCEIRO</h1>
    
     <div id="login">
      <form action="testar.php" method="post" name="formulario">
        <font class="font3">
        <?php
         if (isset($_GET['errologin'])){
          echo "\n";
          echo "<font size='3' color='#FFFF00'><b>&nbsp;&nbsp&nbsp&nbsp*** Senha inválida! ***</b></font>";
          echo "\n";
          }
         if (isset($_GET['erro'])){
          echo "\n";
          echo "<font size='3' color='#FF0000'><b>*** Coloque o Login e senha válidos primeiro! ***</b></font>";
          echo "\n";
          } 
        ?>
        </font>
        <table>
        <tr>
         <td><font size="5">Login:</font></td>
        </tr>
        <tr>
         <td><input type="text" name="login" size="30" align="left" maxlength=18 ></td>
        </tr>
         <tr><td>&nbsp;</td></tr>
         <tr>
           <td><font size="5">Senha:</font></td>
         </tr>
         <tr>
           <td><input type="password" name="senha" size="30" class="formulario"></td>
         </tr>
         <tr><td>&nbsp;</td></tr>
         <tr>
          <td><input type="submit" value="LOGAR" class="formulario"></td>
         </tr>
        </table>
        </form>
    </div>
  </div>
  <footer id="footer">   
     <?php include "footer.php"; ?>
  </footer>
</body>
</html>