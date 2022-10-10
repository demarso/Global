<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GLOBAL - EVENTOS</title>  
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script type="text/javascript" src="JS/jquery-3.2.1.min.js"></script>
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
            })
</script>
 </head> 
<body class="bg-dark">
  
  <div class="container">
    <div class="col-12">
          <div class="row mt-5 mb-5 justify-content-sm-center text-primary bg-primary">
            <h3 class="text-light">SISTEMA DE CONTROLE DE EVENTOS</h3>  
          </div>  
        </div>
    <div class="card card-login col-sm-4 col-xs-12 mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
      <form action="testar.php" method="post" name="formulario">
          <?php
         if (isset($_GET['errologin'])){
          echo "\n";
          echo "<font size='3' color='#FF0000'><b>&nbsp;&nbsp&nbsp&nbsp*** Senha inválida! ***</b></font>";
          echo "\n";
          }
         if (isset($_GET['erro'])){
          echo "\n";
          echo "<font size='3' color='#FF0000'><b>*** Coloque o Login e senha válidos primeiro! ***</b></font>";
          echo "\n";
          } 
        ?>
        <div class="form-group ">
          <label for="email">Seu Login</label>
          <input type="text" class="form-control" name="login" id="login" 
            placeholder="Digite Seu Nome de Login">
        </div>
        <div class="form-group">
          <label for="senha">Sua Senha</label>
          <input type="password" class="form-control" name="senha" id="senha" 
            placeholder="Digite sua Senha">
        </div>
        <button class="btn btn-primary btn-block">Entrar no Sistema</button>
      </form>
      </div>
    </div>
  </div>
  <? include "footer.html"; ?>

  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>  
</body>
</html>