<nav class="navbar navbar-expand-lg navbar-secondary bg-secondary bg-dark">
  <img src="imagens/logo.png" width="100">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="nav nav-tabs">
      
      <li class="nav-item">
          <a class="nav-link" id="navHOME" href="index1.php">HOME</a>
      </li>
<!--*********************************************************************************************************** -->
      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" id="navCADASTRO" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CADASTRO<span class="sr-only">(current)</span></a>
        <ul class="dropdown-menu" aria-labelledby="navCADASTRO">
<!--*********************************************************************************************************** -->     
          <li class="dropdown-item dropdown">
            <a class="dropdown-toggle" id="navPROPOSTAS-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PROPOSTAS</a>
              <ul class="dropdown-menu" aria-labelledby="navPROPOSTAS-1">
                <li class="dropdown-item"><a href="cadProducao.php">CADASTRAR</a></li>
                <li class="dropdown-item"><a href="consProdAssociado.php">CONSULTA POR ASSOCIADO</a></li>
              </ul>
          </li>
           
<!--*********************************************************************************************************** -->
        <li class="dropdown-item dropdown">
            <a class="dropdown-toggle" id="navREGIONAL-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">REGIONAL</a>
          <ul class="dropdown-menu" aria-labelledby="navREGIONAL-1">
            <li class="dropdown-item"><a href="cadRegional.php">CADASTRAR</a></li>
            <li class="dropdown-item"><a href="delRegional.php">INATIVAR</a></li>
          </ul>
        </li>
<!--*********************************************************************************************************** -->

      <li class="dropdown-item dropdown">
          <a class="dropdown-toggle" id="navEQUIPE-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EQUIPE</a>
        <ul class="dropdown-menu" aria-labelledby="navEQUIPE-1">
          <li class="dropdown-item"><a href="cadEquipe.php">CADASTRAR</a></li>
          <li class="dropdown-item"><a href="editEquipe.php">EDITAR NOME</a></li>
          <li class="dropdown-item"><a href="delEquipe.php">INATIVAR</a></li>
        </ul>
      </li>
<!--*********************************************************************************************************** -->

      <li class="dropdown-item dropdown">
          <a class="dropdown-toggle" id="navCONSULTOR-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CONSULTOR</a>
        <ul class="dropdown-menu" aria-labelledby="navCONSULTOR-1">
          <li class="dropdown-item"><a href="consultor_lista.php">LISTA</a></li>
          <li class="dropdown-item"><a href="cadConsultor.php">CADASTRAR</a></li>
          <li class="dropdown-item"><a href="editDadosConsultor.php">EDITAR DADOS</a></li>
          <li class="dropdown-item"><a href="editConsultor.php">TROCAR EQUIPE</a></li>
          <li class="dropdown-item"><a href="delConsultor.php">INATIVAR</a></li>
        </ul>
      </li>
<!--*********************************************************************************************************** -->

      <li class="dropdown-item dropdown">
          <a class="dropdown-toggle" id="navASSOCIADO-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ASSOCIADO</a>
  <!--      <ul class="dropdown-menu" aria-labelledby="navASSOCIADO">
          <li class="dropdown-item"><a href="consultor_lista.php">LISTA</a></li>
          <li class="dropdown-item"><a href="cadConsultor.php">CADASTRAR</a></li>
          <li class="dropdown-item"><a href="editDadosConsultor.php">EDITAR DADOS</a></li>
          <li class="dropdown-item"><a href="editConsultor.php">TROCAR EQUIPE</a></li>
          <li class="dropdown-item"><a href="delConsultor.php">INATIVAR</a></li>
          <li class="dropdown-item"><a href="reativaConsultor.php">REATIVAR</a></li>
        </ul>-->
      </li>
<!--*********************************************************************************************************** -->

      <li class="dropdown-item dropdown">
          <a class="dropdown-toggle" id="navINSTALADOR-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">INSTALADOR</a>
        <ul class="dropdown-menu" aria-labelledby="navINSTALADOR-1">
          <li class="dropdown-item"><a href="cadInstalador.php">CADASTRAR</a></li>
        </ul>
      </li>
<!--*********************************************************************************************************** -->
    </ul>
    </li>

      <li class="nav-item">
        <a class="nav-link" id="navRASTREADOR" href="consProducao.php">RASTREADOR</a>
      </li>
      <li class="nav-item">
        <a  class="nav-link" id="navPRODUCAO" href="producao.php" >Produção</a>
      </li>
      <li class="nav-item">
        <a  class="nav-link" id="navQUADRO" href="quadro.php">Quadro</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="navUSUARIO" href="usuario_lista.php">Usuários</a>
      </li>
      <li class="nav-item">
        <a  class="nav-link" id="navSAIR" href="sair.php">SAIR</a>
      </li>
   </ul>
  </div>
   <li><font class="text-right text-light" size="1">Usu&aacute;rio:&nbsp;<?php echo $_SESSION['nome']; ?></font></li>
</nav>
<!--*********************************************************************************************************** -->
