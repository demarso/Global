 <nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark">
  <a class="navbar-brand text-warning" href="index1.php">Financeiro</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="nav nav-tabs">
<!--****************************************************************************************--> 
      <li class="nav-item">
        <a class="nav-link" href="index1.php">Home</a>
      </li>
<!--****************************************************************************************-->
      <li class="nav-item dropdown active">
        <a class="nav-link  dropdown-toggle" id="navInsc" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Entradas<span class="sr-only">(current)</span></a>
        <ul class="dropdown-menu" aria-labelledby="navInsc">
          <li class="dropdown-item"><a href='entrada_caixa_lista.php'>Caixa</a></li>
          <li class="dropdown-item"><a href='entrada_financeiro_lista.php'>Financeiro</a></li>
          <li class="dropdown-item"><a href='ResumoDoDia.php'>Resumo do dia</a></li>
        </ul>
      </li>
<!--****************************************************************************************-->
      <li class="nav-item dropdown active">
        <a class="nav-link  dropdown-toggle" id="navInsc" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Saídas</a>
        <ul class="dropdown-menu" aria-labelledby="navInsc">
          <li class="dropdown-item"><a href='saida_caixa_lista.php'>Caixa</a></li>
          <li class="dropdown-item"><a href='saida_financeiro_lista.php'>Financeiro</a></li>
        </ul>
      </li> 
<!--****************************************************************************************-->
      <li class="nav-item dropdown active">
        <a class="nav-link  dropdown-toggle" id="navInsc" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Diretoria</a>
        <ul class="dropdown-menu" aria-labelledby="navInsc">
          <li class="dropdown-item"><a href='entrFinDir.php'>Saídas</a></li>
          <li class="dropdown-item"><a href='entrResumoDir.php'>Resumo Caixa</a></li>
        </ul>
      </li> 
<!--****************************************************************************************-->

      <li class="nav-item">
        <a class="nav-link" href="../sair.php">SAIR</a>
      </li>
    </ul>
  </div>
   <li><font class="text-right text-light" size="1">Usu&aacute;rio:&nbsp;<?php echo $_SESSION['nomeF']; ?></font></li>
</nav> 