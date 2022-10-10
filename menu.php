<ul>
	<li onMouseOver="mudaFoto('imagens/home.png')" onMouseOut="mudaFoto('imagens/globo.png')"><a href="index1.php">Home</a></li>
    <li onMouseOver="mudaFoto('imagens/cadastro.png')" onMouseOut="mudaFoto('imagens/globo.png')"><a href="cadProducao.php">CADASTRO</a></li>
    <li onMouseOver="mudaFoto('imagens/consulta.png')" onMouseOut="mudaFoto('imagens/globo.png')"><a href="consProducao.php">RASTREADOR</a></li>
    <li onMouseOver="mudaFoto('imagens/producao.png')" onMouseOut="mudaFoto('imagens/globo.png')"><a href="producao.php">Produção</a></li>
	<li onMouseOver="mudaFoto('imagens/resumo.png')" onMouseOut="mudaFoto('imagens/globo.png')"><a href="quadro.php">Quadro</a></li>
	<li onMouseOver="mudaFoto('imagens/ico_cadastro.png')" onMouseOut="mudaFoto('imagens/globo.png')"><a href="usuario_lista.php">Usuários</a></li>
<!--	<li onMouseOver="mudaFoto('imagens/hospedagem.png')" onMouseOut="mudaFoto('imagens/espaco_ico.png')"><a href="#">Receber</a></li>
	<li onMouseOver="mudaFoto('imagens/informa.png')" onMouseOut="mudaFoto('imagens/espaco_ico.png)"><a href="#">Pagar</a></li>
	<li onMouseOver="mudaFoto('imagens/informa.png')" onMouseOut="mudaFoto('imagens/espaco_ico.png)"><a href="#">Caixa</a></li>
	<li onMouseOver="mudaFoto('imagens/informa.png')" onMouseOut="mudaFoto('imagens/espaco_ico.png)"><a href="#">Cadastro</a></li>-->
	<li onMouseOver="mudaFoto('imagens/sair2.png')" onMouseOut="mudaFoto('imagens/globo.png')"><a href="sair.php">SAIR</a></li>
	<h3>&nbsp;&nbsp;Usu&aacute;rio:&nbsp;&nbsp;<?php echo $_SESSION['nome']; ?></h3>
</ul>