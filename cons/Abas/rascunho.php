<!--**
 * @author Cesar Szpak - Celke -   cesar@celke.com.br
 * @pagina desenvolvida usando framework bootstrap,
 * o código é aberto e o uso é free,
 * porém lembre -se de conceder os créditos ao desenvolvedor.
 *-->
<?php
	session_start();
	include_once('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Criar pagina com abas</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Cadastrar Usuário</h1>
			</div>
			<div>
				<?php
					if($_SERVER['REQUEST_METHOD']=='POST'){
						$request = md5(implode($_POST));
						if(isset($_SESSION['ultima_request']) && $_SESSION['ultima_request'] == $request){
							echo "Usuário ja foi salvo!";
						}else{
							$_SESSION['ultima_request']  = $request;
							if(isset($_POST['nome'])){
								$nome = $_POST['nome'];
								$cpf = $_POST['cpf'];
								$_SESSION['nome'] = $nome;
								$_SESSION['cpf'] = $cpf;
								$result_dados_pessoais = "INSERT INTO usuarios (nome, cpf) VALUES ('$nome', '$cpf')";						
								$resultado_dados_pessoais= mysqli_query($conn, $result_dados_pessoais);
								//ID do usuario inserido
								$ultimo_id = mysqli_insert_id($conn);								
								echo $ultimo_id;
								$_SESSION['ultimo_id'] = $ultimo_id;
							}
						}
					}
						
				?>
			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#dados_pessoais" aria-controls="dados_pessoais" role="tab" data-toggle="tab">Dados Pessoais</a></li>
                    <li role="presentation">
						<?php if(isset($_SESSION['ultimo_id'])){
							?><a href="#dados_de_acesso" aria-controls="dados_de_acesso" role="tab" data-toggle="tab"><?php
						}else{
							?><a href="#"><?php
						}?>						
							Dados de Acesso
						</a>
					</li>
					<li role="presentation">
						<?php if(isset($_SESSION['ultimo_id'])){
							?><a href="#endereco" aria-controls="endereco" role="tab" data-toggle="tab"><?php
						}else{
							?><a href="#"><?php
						}?>						
							Endereço
						</a>
					</li>
			  </ul>

			  <!-- Tab panes -->
			  <div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="dados_pessoais">
					<div style="padding-top:20px;">
					 <form class="form-horizontal" action="" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nome</label>
                                <div class="col-sm-10">
                                    <input type="text" name='nome' class="form-control" id="nome" placeholder="Nome Completo" value="<?php if(isset($_SESSION['nome'])){ echo $_SESSION['nome']; }?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">CPF</label>
                                <div class="col-sm-10">
                                    <input type="text" name='cpf' class="form-control" id="cpf" placeholder="CPF" value="<?php if(isset($_SESSION['cpf'])){ echo $_SESSION['cpf']; } ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="dados_de_acesso">
					<div style="padding-top:20px;">
					 <form class="form-horizontal"  action="" method="POST">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Usuário</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="usuario" placeholder="Usuário">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Senha</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="senha" placeholder="Senha">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="endereco">
					<div style="padding-top:20px;">
					 <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Logradouro</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="logradouro" placeholder="Rua, Av...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Número</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="numero" placeholder="Número">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
			  </div>

			</div>
		</div>
		
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>