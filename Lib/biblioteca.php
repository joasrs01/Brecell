<?php

require_once('database.php');

/// Método irá retornar um array com os celulares
function BuscarCelulares(){
    $sSql = 'SELECT CELULAR.DES_CELULAR, CELULAR.VAL_PRECO, CELULAR.CAM_IMAGEM, MARCA.DES_MARCA FROM CELULAR';
    $sSql = $sSql.' INNER JOIN MARCA ON MARCA.COD_MARCA = CELULAR.COD_MARCA';
    return Select($sSql);
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