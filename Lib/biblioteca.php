<?php

require_once('database.php');

/// Método irá retornar um array com os celulares
function BuscarCelulares(){
    $sSql = 'SELECT CELULAR.DES_CELULAR, CELULAR.VAL_PRECO, CELULAR.CAM_IMAGEM, MARCA.DES_MARCA FROM CELULAR';
    $sSql = $sSql.' INNER JOIN MARCA ON MARCA.COD_MARCA = CELULAR.COD_MARCA';
    return Select($sSql);
}