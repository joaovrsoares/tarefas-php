<?php
session_start();

include "banco.php";
include "auxiliares.php";
include "template.php";

$exibir_tabela = false;

if (isset ($_GET['nome']) && $_GET['nome'] != "") {
    $tarefa = [];

    $tarefa['id'] = $_GET['id'];
    $tarefa['nome'] = $_GET['nome'];

    if (array_key_exists ('descricao', $_POST)) {
        $tarefa['descricao'] = $_GET['descricao'];
    } else {
        $tarefa['descricao'] = '';
    }

    if (array_key_exists('prazo', $_POST) && (strlen($_POST['prazo']) > 0)) {
        $tarefa['prazo'] = converte_data_para_banco($_GET['prazo']);
    } else {
        $tarefa['prazo'] = '';
    }

    $tarefa['prioridade'] = $_GET['prioridade'];

    if (array_key_exists ('concluida', $_POST)) {
        $tarefa['concluida'] = 1;
    } else {
        $tarefa['concluida'] = 0;
    }

    editar_tarefa($conexao, $tarefa);
    header('Location: tarefas.php');
    die();
}

$tarefa = buscar_tarefas($conexao, $_GET['id']);

$tarefa = [
    'id' => 0,
    'nome' => '',
    'descricao' => '',
    'prazo' => '',
    'prioridade' => 1,
    'concluida' => ''
];

