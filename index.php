<?php 
  require_once('templates/cabecalho.php');
  require_once('lib/biblioteca.php');

  $acao = $_GET['acao'] ?? 'nenhuma';

  switch($acao){
    case 'nenhuma':
      include_once('templates/inicio.php');
      break;
    case 'carrinho':
      include_once('templates/carrinho.php');
      break;
    case 'perfil':
      include_once('templates/perfil.php');
      break;
    case 'login':
      include_once('templates/login.php');
      break;
    case 'cadastro-usuario':
        include_once('templates/cadastroUsuario.php');
        break;
    case 'cadastro-produto':
      include_once('templates/cadastroProduto.php');
      break;
  }

  require_once('templates/rodape.php');
