<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CRIPTOGRAFIA</title>
</head>

<body>
 <center>
  <form action="indexOK.php" method="post" name="form1" >
	<fieldset id="forms" style="background-color:#E9E9E9">
    
	  <label for="senha"><b>Senha para teste:</b></label>
	  <input type="text" name="senha" id="senha" tabindex="3" title="Informe a Senha" />
      <br /><br />
      <input type="submit" class="button" name="cadastrar"  value="Efetuar Cadastro"  />
    </fieldset>
   </form>
 <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<?php 
 if(isset($_POST['submit'])){ 
        $senha = $_POST['senha'];
	
	    $confu1 = "L2xB3Sbia";
	    $confu2 = "Dawi748v2";
	    $senha1 = $senha;
	    $senha1 = $confu1.$senha1.$confu2;
	    $senha1 = hash( 'SHA256',$senha1);
		
	  echo "A senha será: ".$senha1;
}
 ?>
 </center>
</body>
</html>