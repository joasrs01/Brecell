<?php 
  require_once('lib/controller.php');

 switch($_GET['acao'] ?? 'nenhuma'){
    case 'nenhuma':
      CarregarPaginaInicial();
      break;
    case 'carrinho':
      CarregarCarrinho();
      break;
    case 'perfil':
      CarregarPerfil();
      break;
    case 'login':
      CarregarLogin();
      break;
    case 'cadastro-usuario':
      CarregarCadastroUsuario();
      break;
    case 'cadastrar-usuario':
      CadastrarUsuario();
      break;
    case 'cadastro-produto':
      CarregarCadastroProduto();
      break;
    case 'cadastrar-produto':
      CadastrarProduto();
      break;
    case 'acessar':
      Login();
      break;
    case 'logoff':
      Logoff();
      break;
  }
?>