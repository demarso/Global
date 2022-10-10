<ul>
	<li onMouseOver="mudaFoto('imagens/home.png')" onMouseOut="mudaFoto('imagens/globo.png')"><a href="index1.php">Home</a></li>
    <li onMouseOver="mudaFoto('imagens/cadastro.png')" onMouseOut="mudaFoto('imagens/globo.png')"><a href="cadProducao.php">CADASTRO</a></li>
    <li onMouseOver="mudaFoto('imagens/consulta.png')" onMouseOut="mudaFoto('imagens/globo.png')"><a href="consProducao.php">RASTREADOR</a></li>
    <li onMouseOver="mudaFoto('imagens/producao.png')" onMouseOut="mudaFoto('imagens/espaco_ico.png')"><a href="producao.php">Produção</a></li>
	<li onMouseOver="mudaFoto('imagens/resumo.png')" onMouseOut="mudaFoto('imagens/globo.png')"><a href="quadro.php">Quadro</a></li>
	<li onMouseOver="mudaFoto('imagens/sair2.png')" onMouseOut="mudaFoto('imagens/globo.png')"><a href="sair.php">SAIR</a></li>
	<font size="3">Usu&aacute;rio:&nbsp;&nbsp;<?php echo $_SESSION['nome']; ?></font>
	
</ul>