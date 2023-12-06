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

function CarregarCadastroProduto($arrCelular = []){
    $bAlteracao = count($arrCelular) > 0;
    $celular = $arrCelular;
    include('templates/cadastroProduto.php');
}

function CadastrarUsuario(){
    InserirUsuario($_POST['nome'], $_POST['login'], $_POST['senha'], $_POST['tipo-usuario']);
    header('location: index.php');
}

function CadastrarProduto(){
    if(InserirProduto($_POST["nome"], $_POST["marca"], $_POST["preco"], ProcessarImagem($_FILES["imagem"]))){
        InserirMensagem('Produto '.$_POST['nome'].' cadastrado com sucesso!');
    }
    else{
        InserirMensagem('Não foi possível cadastrar o produto', 'error');        
    }

    header('location: index.php?acao=cadastro-produto');
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

function CarregarCadastroMarca(){
    include('templates/cadastroMarca.php');
}

function CadastrarMarca(){
    if(InserirMarca($_POST['descricao'])){
        InserirMensagem('Marca '.$_POST['descricao'].' cadastrada com sucesso!');
        header('location: index.php?acao=cadastro-produto');
    }
    else{
        InserirMensagem('Não foi possível registrar a marca '.$_POST['descricao'].' cadastrada com sucesso!');
        header('location: index.php?acao=cadastro-marca');
    }
}

function RemoverCelular(){
    if(RemoverProduto($_GET['id'])){
        InserirMensagem('Produto removido com sucesso!');
    }
    else{
        InserirMensagem('Não foi possível remover o produto');
    }

    header('location: index.php');
}

function EditarCelular(){
    $bAlteracao = true;
    $celular = BuscarCelular($_GET['id']);

    CarregarCadastroProduto($celular);
}

function GravarAlteracaoCelular(){

    if(AlterarProduto($_GET['id'], $_POST["nome"], $_POST["marca"], $_POST["preco"], ProcessarImagem($_FILES["imagem"]))){
        InserirMensagem('Produto '.$_POST['DES_CELULAR'].' alterado com sucesso!');
        header('location: index.php');
    }
    else{
        InserirMensagem('Não foi possível alterar o produto '.$_POST['DES_CELULAR']);
        header('location: index.php?acao=alterar-produto');
    }
}