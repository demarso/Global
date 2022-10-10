<nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark">
  <a class="navbar-brand text-warning" href="#">Eventos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="nav nav-tabs">
      <li class="nav-item active">
        <a class="nav-link" href="entrada.php">ENTRADA <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">SAÍDA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">LISTA</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          CONTROLE
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">LISTA</a>
          <a class="dropdown-item" href="#">PEÇAS</a>
          <a class="dropdown-item" href="#">RELATÓRIOS</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          USUÁRIOS
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">CADASTRO</a>
          <a class="dropdown-item" href="#">LISTA</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sair.php">SAIR</a>
      </li>
    </ul>
  </div>
   <li><font class="text-right text-light" size="3">Usu&aacute;rio:&nbsp;<?php echo $_SESSION['nome']; ?></font></li>
</nav>
<!--
<ul class="nav nav-tabs">
  ...
  <li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      Dropdown <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      ...
    </ul>
  </li>
  ...
</ul>-->