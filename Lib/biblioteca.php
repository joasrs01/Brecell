<?php

require_once('database.php');
session_start();

define('IMAGENS','resources\celulares\\');

$bAlteracao = false;

/// Método irá retornar um array com os celulares
function BuscarCelulares(){
    $sSql = 'SELECT CELULAR.COD_CELULAR, CELULAR.DES_CELULAR, CELULAR.VAL_PRECO, CELULAR.CAM_IMAGEM, MARCA.DES_MARCA FROM CELULAR';
    $sSql = $sSql.' INNER JOIN MARCA ON MARCA.COD_MARCA = CELULAR.COD_MARCA';
    return Select($sSql);
}

function BuscarCelular($iCodCelular){
    $sSql = 'SELECT CELULAR.COD_CELULAR, CELULAR.DES_CELULAR, CELULAR.VAL_PRECO, CELULAR.CAM_IMAGEM, CELULAR.COD_MARCA FROM CELULAR';
    $sSql = $sSql." WHERE COD_CELULAR = $iCodCelular";
    return Select($sSql)[0];
}

function BuscarUsuarios(){
    return Select('SELECT COD_USUARIO, NOM_USUARIO, LOGIN, SENHA, TIP_USUARIO FROM USUARIO');
}

function BuscarMarcas(){
    return Select('SELECT COD_MARCA, DES_MARCA FROM MARCA');
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

    if(Comando( $sSql )){
        SetarSessaoUsuario( $sNome, $sLogin, $tipUsuario );
    }
}

function AlterarProduto( $iCodProduto, $sNomeProduto, $iMarcaProduto, $nPrecoProduto, $imgProduto){

    $sCaminhoImagemCorrigido = str_replace('\\','\\\\',$imgProduto);
    $sSql = "UPDATE CELULAR SET DES_CELULAR = $sNomeProduto, VAL_PRECO = $nPrecoProduto, CAM_IMAGEM = $sCaminhoImagemCorrigido, COD_MARCA = $iMarcaProduto";
    $sSql = $sSql." WHERE COD_CELULAR = $iCodProduto ";

    return Comando( $sSql );
}

function InserirProduto($sNomeProduto, $iMarcaProduto, $nPrecoProduto, $imgProduto){

    $sCaminhoImagemCorrigido = str_replace('\\','\\\\',$imgProduto);
    $sSql = "INSERT INTO CELULAR ( DES_CELULAR, VAL_PRECO, CAM_IMAGEM, COD_MARCA ) ";
    $sSql = $sSql."VALUES ('$sNomeProduto', $nPrecoProduto, '$sCaminhoImagemCorrigido', $iMarcaProduto)";

    return Comando( $sSql );
}

function RemoverProduto($iCodProduto){
    return Comando( "DELETE FROM CELULAR WHERE COD_CELULAR = $iCodProduto" );
}

function InserirMarca($sDescricaoMarca){
    $sSql = "INSERT INTO MARCA ( DES_MARCA ) ";
    $sSql = $sSql."VALUES ('$sDescricaoMarca')";

    return Comando( $sSql );
}

function AutenticarUsuario( $login, $senha ){
    $usuarios = BuscarUsuarios();
    
    foreach ($usuarios as $user) {
        if( $user['LOGIN'] == $login && Decodifica($user['SENHA']) == $senha ){
            SetarSessaoUsuario( $user['NOM_USUARIO'], $user['LOGIN'], $user['TIP_USUARIO'] );
            return true;
        }
    }  

    return false;
}

function SetarSessaoUsuario( $snome, $slogin ,$tipUsuario ){
    $_SESSION['NOM_USUARIO'] = $snome;
    $_SESSION['USUARIO'] = $slogin;
    $_SESSION['TIP_USUARIO'] = $tipUsuario;
}

function FinalizarSessaoUsuario(){
    unset($_SESSION['TIP_USUARIO']);
    unset($_SESSION['NOM_USUARIO']);
    unset($_SESSION['USUARIO']);
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

function UsuarioLogado(){
    return isset($_SESSION['USUARIO']);
}

function UsuarioRepresentante(){
    return $_SESSION['TIP_USUARIO'] == 'rep';
}

function ProcessarImagem( $imagemParametro, $imagemOriginal = '' ){

    $imgRetorno = $imagemOriginal;

    if (isset($imagemParametro) && $imagemParametro['error'] == 0) {
        $temp = $imagemParametro['tmp_name'];
        $nome = time().'-'.sha1_file($temp);
        $finfo = new finfo(FILEINFO_MIME_TYPE);

        $fileInfo = $finfo->file($temp);

        $extensoes = [
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpg',
            'png' => 'image/png',
        ];
        if( !empty($imagemOriginal) ){
            unlink($imagemOriginal);
        }

        $extensaoTemp = array_search($fileInfo, $extensoes);
        $extensao = !$extensaoTemp ? 'jpeg': $extensaoTemp;
        $imgRetorno = IMAGENS.$nome.'.'.$extensao;IMAGENS.$nome.'.'.$extensao;
        move_uploaded_file($temp,$imgRetorno);
    }

    return $imgRetorno;
}