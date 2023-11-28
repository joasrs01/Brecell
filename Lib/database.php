<?php

    $hostname='127.0.0.1';
	$username='root';
	
    define('MySql', mysqli_connect($hostname,$username, '') );
	mysqli_select_db(MySql, "DB_BRECELL");

    function Select($sSql){
        $resultado = mysqli_query(MySql, $sSql);
        $arrRetorno = [];

        if($resultado){
            while($row = mysqli_fetch_array($resultado)){
                $arrRetorno[] = $row;
            }
        }

        return $arrRetorno;
    }