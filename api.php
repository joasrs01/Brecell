<?php

require_once "lib/biblioteca.php";
    $acao = $_SERVER['REQUEST_METHOD'];
    //$modulo = $_SERVER['PATH_INFO'];

    switch ($acao) {
        case 'GET':
            
            // $tarefas = lerListaTarefas();
            // header('Content-type: application/json');
            // echo json_encode($tarefas);
        break;
        case 'POST':
            $tarefa = json_decode(file_get_contents('php://input'),true);
            $tarefa = adicionarTarefa($tarefa['descricao']);
            http_response_code(201);
            header('Content-type: application/json');
            echo json_encode($tarefa);
            break;
        case 'PUT':
            $tarefa = json_decode(file_get_contents('php://input'),true);
            $tarefa = editarTarefa($tarefa['id'],$tarefa['descricao'],$tarefa['finalizado']);
            http_response_code(201);
            header('Content-type: application/json');
            echo json_encode($tarefa);
            break;
        case 'DELETE': 
            $id = $_GET['id'];
            excluirTarefa($id);
        break;
    }

function AdicionarUsuario(){

}