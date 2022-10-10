<div id='cssmenu'>
    <ul>
    	<li><a href="index1.php">Home</a></li>
    	<li><a href="#">CADASTRO</a>
           <ul>
              <li><a href="#">PROPOSTAS</a>
                  <ul>
                    <li><a href="cadProducao.php">CADASTRAR</a></li>
                    <li><a href="consProdAssociado.php">CONSULTA POR ASSOCIADO</a></li>
                    <li><a href="producao_usuario.php">CONSULTA POR USUARIO</a></li>
                    <li><a href="cadProducaoMigracao.php">MIGRAÇÃO EXCEL</a></li>
                  </ul>
              </li>
              <li><a href="#">REGIONAL</a>
                  <ul>
                    <li><a href="cadRegional.php">CADASTRAR</a></li>
                    <li><a href="delRegional.php">INATIVAR</a></li>
                  </ul>
              </li>
              <li><a href="#">EQUIPE</a>
                  <ul>
                    <li><a href="cadEquipe.php">CADASTRAR</a></li>
                    <li><a href="editEquipe.php">EDITAR NOME</a></li>
                    <li><a href="delEquipe.php">INATIVAR</a></li>
                  </ul>
              </li>
              <li><a href="#">CONSULTOR</a>
                  <ul>
                    <li><a href="consultor_lista.php">LISTA</a></li>
                    <li><a href="cadConsultor.php">CADASTRAR</a></li>
                    <li><a href="editDadosConsultor.php">EDITAR DADOS</a></li>
                    <!--<li><a href="editConsultor.php">TROCAR EQUIPE</a></li>-->
                  </ul>
              </li>
              <li><a href="#">ASSOCIADO</a></li>     
           </ul>
        </li>
    	<li><a href="consProducao.php">RASTREADOR</a></li>
    	<li><a href="producao.php">Produção</a></li>
		<li><a href="quadro.php">Quadro</a></li>
		<li><a href="sair.php">SAIR</a></li>
		<li><font size="1">Usu&aacute;rio:&nbsp;<?php echo $_SESSION['nome']; ?></font></li>
   </ul>
 
</div>