<?php

require_once('lib/biblioteca.php');

function CarregarPaginaInicial(){
    include('templates/inicio.php');
}

function CarregarCarrinho(){
    include('templates/carrinho.php');
}

function CarregarPerfil(){
    include('templates/perfil.php');
}

function CarregarLogin(){
    include('templates/login.php');
}

function CarregarCadastroUsuario(){
    include('templates/cadastroUsuario.php');
}

function CarregarCadastroProduto(){
    include('templates/cadastroProduto.php');
}

function CadastrarUsuario(){
    InserirUsuario($_POST['nome'], $_POST['login'], $_POST['senha'], $_POST['tipo-usuario']);
    header('location: index.php');
}

function CadastrarProduto(){
    CadastrarProduto($_POST["nome"], $_POST["marca"], $_POST["preco"], $_POST["imagem"]);
}

function Login(){
    if(AutenticarUsuario( $_POST['usuario'], $_POST['senha'] )){
        InserirMensagem('Bem vindo '.$_SESSION['NOM_USUARIO']);
        header('location: index.php');
    }
    else{
        InserirMensagem('Usuário ou senha incorreto.', 'error');
        header('location: index.php?acao=login');
    }
}

function Logoff(){
    FinalizarSessaoUsuario();
    header('location: index.php');
}

