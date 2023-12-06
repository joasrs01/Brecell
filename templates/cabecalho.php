<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Brechó do Celular</title>
  <link rel="shortcut icon" type="imagex/png" href="resources/sistema/celular.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"
    defer></script>
  <link href="style.css" rel="stylesheet" />
  <script src="script.js" defer></script>
</head>

<body>
  <nav class="navbar bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="resources/sistema/celular.ico" alt="Logo" width="30" height="24"
          class="d-inline-block align-text-top">
        Brechó do Celular
      </a>
      <div>
        <?php
        if (UsuarioLogado()) {
          ?>
          <label id="nome-usuario">
            <?= $_SESSION['NOM_USUARIO'] ?>
          </label> |
          <a class="btn btn-danger" href="index.php?acao=logoff">Logoff</a>
          <?php
          if (UsuarioRepresentante()) {
            ?>
            <a class="btn btn-light" href="index.php?acao=cadastro-produto">Cadastrar Produtos</a>
            <a class="btn btn-light" href="index.php?acao=cadastro-marca">Cadastrar Marca</a>
            <?php
          }
          ?>
          <?php
        } else {
          ?>
          <a class="btn btn-success" href="index.php?acao=login">Login</a>
          <a class="btn btn-success" href="index.php?acao=cadastro-usuario">Cadastre-se</a>
          <?php
        }
        ?>
        <div id="div-carrinho">
          <img id="img-carrinho" src="resources/sistema/carrinho.png" />
          <label id="qtd-itens-carrinho">1</label>
        </div>
      </div>
      <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          <a class="nav-link active" href="index.php?acao=carrinho">Carrinho</a>
          <a class="nav-link active" href="index.php?acao=perfil">Perfil</a>
        </div>
      </div> -->
    </div>
  </nav>
  <?php
  $mensagem = lerMensagem();
  if ($mensagem !== false) {
    ?>
    <div class="alert alert-<?= $mensagem['tipo'] ?>" role="alert">
      <?= $mensagem['mensagem'] ?>
    </div>
    <?php
  }
  ?>