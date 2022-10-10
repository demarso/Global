<nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark">
  <a class="navbar-brand text-warning" href="cons.php">INSTALADORES</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="nav nav-tabs">
      
      <li class="nav-item">
          <a class="nav-link" id="navHOME" href="index1.php">HOME</a>
      </li>

<!--
      <li class="nav-item dropdown">
          <a class="nav-link  dropdown-toggle" id="navCONSULTOR" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CONSULTOR</a>
        <ul class="dropdown-menu" aria-labelledby="navCONSULTOR">
          <li class="dropdown-item"><a href="consultor_lista.php">LISTA</a></li>
          <li class="dropdown-item"><a href="consProducao.php">PRODUÇÃO</a></li>
          <li class="dropdown-item"><a href="quadroProducao.php">PROD. ANO</a></li>
          <li class="dropdown-item"><a href="consGrafico.php">GRÁFICO</a></li>
          <li class="dropdown-item"><a href="consAbas.php">CONTROLE</a></li>
        </ul>
      </li>
     

      <li class="nav-item dropdown active">
        <a class="nav-link  dropdown-toggle" id="navPastor" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PASTOR<span class="sr-only">(current)</span></a>
        <ul class="dropdown-menu" aria-labelledby="navPastor">
          <li class="dropdown-item dropdown">
            <a class="dropdown-toggle" id="navPastor" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mensagem</a>
              <ul class="dropdown-menu" aria-labelledby="navPastor-1">
                <li class="dropdown-item"><a href="#">Registrar</a></li>
                <li class="dropdown-item dropdown">
                  <a class="dropdown-toggle" id="dropdown2-1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Consultar</a>
                    <ul class="dropdown-menu" aria-labelledby="navPastor-1-1">
                      <li class="dropdown-item"><a href="#">Por Título</a></li>
                      <li class="dropdown-item"><a href="#">Por Data</a></li>
                      <li class="dropdown-item"><a href="#">Por Texto</a></li>
                    </ul>
                </li>
              </ul>
          </li>
          <li class="dropdown-item"><a href="#">Agenda</a></li>
        </ul>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" id="navTesouraria" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TESOURARIA<span class="sr-only">(current)</span></a>
        <ul class="dropdown-menu" aria-labelledby="navTesouraria">
          <li class="dropdown-item"><a href="#">Dízimos e Ofertas</a></li>
          <li class="dropdown-item dropdown">
            <a class="dropdown-toggle" id="navTesouraria-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gráficos</a>
              <ul class="dropdown-menu" aria-labelledby="navTesouraria-1">
                <li class="dropdown-item"><a href="#">Por Valor</a></li>
                <li class="dropdown-item"><a href="#">Por %</a></li>
              </ul>
          </li>
          <li class="dropdown-item"><a href="#">Anual</a></li>
        </ul>
      </li> 

      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" id="navSecretaria" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SECRETARIA<span class="sr-only">(current)</span></a>
        <ul class="dropdown-menu" aria-labelledby="navSecretaria">
          <li class="dropdown-item dropdown">
            <a class="dropdown-toggle" id="navSecretaria-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pessoas</a>
              <ul class="dropdown-menu" aria-labelledby="navSecretaria-1">
                <li class="dropdown-item"><a href="PessoaCad.php">Cadastro Pessoa</a></li>
                <li class="dropdown-item"><a href="PessoaLista.php">Lista Pessoa</a></li>
                <li class="dropdown-item"><a href='AniversarioLista.php'>Aniversariantes</a></li>
              </ul>
          </li>
          <li class="dropdown-item"><a href="#">Funcionários</a></li>
          <li class="dropdown-item dropdown">
            <a class="dropdown-toggle" id="navSecretaria-1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Atas</a>
              <ul class="dropdown-menu" aria-labelledby="navSecretaria-1-1">
                <li class="dropdown-item"><a href="#">Registro</a></li>
                <li class="dropdown-item"><a href="#">Cosultas</a></li>
              </ul>
          </li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" id="navEBD" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EBD<span class="sr-only">(current)</span></a>
        <ul class="dropdown-menu" aria-labelledby="navEBD">
          <li class="dropdown-item dropdown">
            <a class="dropdown-toggle" id="navEBD-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Classes</a>
              <ul class="dropdown-menu" aria-labelledby="navEBD-1">
                <li class="dropdown-item"><a href="#">Cadastro da Classe</a></li>
                <li class="dropdown-item"><a href="#">Lança Presença</a></li>
              </ul>
          </li>
          <li class="dropdown-item"><a href="#">Matricula Alunos</a></li>
          <li class="dropdown-item"><a href="#">Relatórios</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" id="navCELULAS" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CÉLULAS<span class="sr-only">(current)</span></a>
        <ul class="dropdown-menu" aria-labelledby="navCELULAS">
          <li class="dropdown-item"><a href="#">Cadastro da Célula</a></li>
          <li class="dropdown-item"><a href="#">Cadastro de Participantes</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" id="navCOMUNHAO" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">COMUNHÃO<span class="sr-only">(current)</span></a>
        <ul class="dropdown-menu" aria-labelledby="navCOMUNHAO">
          <li class="dropdown-item"><a href="PessoaComunhaoCad.php">Cadastro de Pessoas</a></li>
           <li class="dropdown-item"><a href="PessoaListaComunhao.php">Lista de Pessoas</a>
          <li class="dropdown-item"><a href="#">Controle de Visitas</a></li>
        </ul>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="sair.php">SAIR</a>
      </li>-->
    </ul>
  </div>
   <li><font class="text-right text-light" size="1">Usu&aacute;rio:&nbsp;<?php echo $_SESSION['nome']; ?></font></li>
</nav>