<?php

require_once('lib/biblioteca.php');

function CarregarPaginaInicial(){
    include('templates/inicio.php');
    // fetch('templates/listaTarefas.html');
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
    
}

function CadastrarProduto(){

}