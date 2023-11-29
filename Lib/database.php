<?php

    $hostname='127.0.0.1';
	$username='root';
	
    define('Conexao', mysqli_connect($hostname,$username, '') );
	mysqli_select_db(Conexao, "DB_BRECELL");

    function Comando( $sSql ){
        return mysqli_query(Conexao, $sSql);
    }

    function Select($sSql){
        $resultado = Comando($sSql);
        $arrRetorno = [];

        if($resultado){
            while($row = mysqli_fetch_array($resultado)){
                $arrRetorno[] = $row;
            }
        }

        return $arrRetorno;
    }

    function AtualizarDB( $arrValores, $sTabela ){
        $arrColunas = Select("SHOW COLUMNS FROM $sTabela");
        $sComandoInsert = "INSERT INTO $sTabela";
        $sComandoValues = "VALUES";
        $sValoresColuna = '';
        $sVirgulaColuna = '';
        $sValores = '';
        $sVirgula = '';

        foreach( $arrValores as $coluna => $valor ){
            foreach( $arrColunas as $linhaColuna ){
                if( $coluna == $linhaColuna['Field'] ){
                    $sValoresColuna = $sValoresColuna.$sVirgulaTabela.$linhaColuna['Field'];
                    $sVirgulaTabela = ', ';
                }
            }
        }

        foreach( $arrValores as $linha ){
            $sValores = $sValores.$sVirgula.$valor;
            $sVirgula = ', ';
        }

        Comando( "INSERT INTO $sTabela ($sValoresColuna) "  );
    }