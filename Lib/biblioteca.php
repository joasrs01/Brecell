<?php

require_once('database.php');
session_start();
$usuarioLogado = isset($_SESSION['usuario']);

/// Método irá retornar um array com os celulares
function BuscarCelulares(){
    $sSql = 'SELECT CELULAR.DES_CELULAR, CELULAR.VAL_PRECO, CELULAR.CAM_IMAGEM, MARCA.DES_MARCA FROM CELULAR';
    $sSql = $sSql.' INNER JOIN MARCA ON MARCA.COD_MARCA = CELULAR.COD_MARCA';
    return Select($sSql);
}

function BuscarUsuarios(){
    return Select("SELECT COD_USUARIO, NOM_USAURIO, LOGIN, SENHA, TIP_USUARIO FROM USUARIO");
}

function Codifica($sTexto){
    return base64_encode($sTexto);
}

function Decodifica($sTexto){
    return base64_decode($sTexto);
}

function InserirUsuario($sNome, $sLogin, $sSenha, $tipUsuario){
    $sSql = "INSERT INTO USUARIO ( NOM_USUARIO, LOGIN, SENHA, TIP_USUARIO ) ";
    $sSql = $sSql."VALUES ('$sNome', '$sLogin', '".Codifica($sSenha)."', '$tipUsuario')";

    Comando( $sSql );
}

function AutenticarUsuario( $login, $senha ){
    $usuarios = BuscarUsuarios();
    $bAutenticado = false;

    foreach ($usuarios as $user) {
        if( $user['LOGIN'] == $login && Decodifica($user['SENHA']) == $senha ){
            $_SESSION['tipUsuario'] = $user['TIP_USUARIO'];
            $_SESSION['nome'] = $user['NOM_USUARIO'];
            $bAutenticado = true;
            break;
        }
    }  

    return $bAutenticado;
}

function Logoff(){
    unset($_SESSION['usuario']);
}

function InserirMensagem($mensagem, $tipo = 'success') {
    $_SESSION['mensagem'] = [
        'mensagem' => $mensagem,
        'tipo' => $tipo
    ];
}

function LerMensagem() {
    if (isset($_SESSION['mensagem'])) {
        $mensagem = $_SESSION['mensagem'];
        unset($_SESSION['mensagem']);
        return $mensagem;
    } 
    return false;
}