<div id='cssmenu'>
    <ul>
      <li><a href="index1.php">Home</a></li>
      <li><a href="#">CADASTRO</a>
           <ul>
              <li><a href="cadProducao.php">PROPOSTAS</a></li>
              <li><a href="#">REGIONAL</a></li>
              <li><a href="cadEquipe.php">EQUIPE</a></li>
              <li><a href="#">CONSULTOR</a>
                  <ul>
                    <li><a href="consultor_lista.php">LISTA</a>
                    <li><a href="cadConsultor.php">CADASTRAR</a>
                    <li><a href="editConsultor.php">EDITAR</a>
                    <li><a href="delConsultor.php">EXCLUIR</a>
                  </ul>
              </li>
              <li><a href="#">ASSOCIADO</a> </li>     
           </ul>
        </li>
      <li><a href="consProducao.php">RASTREADOR</a></li>
      <li><a href="producao.php">Produção</a></li>
    <li><a href="quadro.php">Quadro</a></li>
    <li><a href="usuario_lista.php">Usuários</a></li>
    <li><a href="sair.php">SAIR</a></li>
    <li><font size="1">Usu&aacute;rio:&nbsp;<?php echo $_SESSION['nome']; ?></font></li>
   </ul>
 
</div>