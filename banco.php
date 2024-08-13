<?php
$dbServidor = 'localhost';
$dbUsuario = 'root';
$dbSenha = '1302';
$dbBanco = 'atividades';

$conexao = mysqli_connect($dbServidor, $dbUsuario, $dbSenha, $dbBanco);
// Conecta ao banco de dados usando as variáveis definidas acima

function gravar_anexo($conexao, $anexo) {
    $sqlGravar = "
        INSERT INTO anexos
        (tarefa_id, nome, arquivo)
        VALUES
        (
            {$anexo['tarefa_id']},
            '{$anexo['nome']}',
            '{$anexo['arquivo']}'
        )
    ";

    mysqli_query($conexao, $sqlGravar);
}

function buscar_anexo() {
    $sqlBusca = "SELECT * FROM anexos WHERE tarefa_id = {$tarefa_id}";
    $resultado = mysqli_query($conexao, $sqlBusca);

    $anexos = array();
    
}

function buscar_tarefas($conexao) {
    $sqlBusca = 'SELECT * FROM tarefas';
    $resultado = mysqli_query($conexao, $sqlBusca);
    $tarefas = [];

    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        $tarefas[] = $tarefa;
    }

    return $tarefas;
}

// Grava tarefas no banco de dados
function gravar_tarefa($conexao, $tarefa) {
    if ($tarefa['prazo'] == '') {
        $prazo = 'NULL';
    } else {
        $prazo = "'{$tarefa['prazo']}'";
    }

    $sqlGravar = "INSERT INTO tarefas(
            nome, descricao, prioridade, prazo, concluida
        )
        VALUES(
            '{$tarefa['nome']}',
            '{$tarefa['descricao']}',
             {$tarefa['prioridade']},
             $prazo,
             {$tarefa['concluida']}
        )
    ";

    mysqli_query($conexao, $sqlGravar);
}

function editar_tarefa($conexao, $tarefa) {
    $sqlEditar = "
        UPDATE tarefas SET
            nome =       '{$tarefa['nome']}',
            descricao =  '{$tarefa['descricao']}',
            prioridade = '{$tarefa['prioridade']}',
            prazo =      '{$tarefa['prazo']}',
            concluida =  '{$tarefa['concluida']}'
        WHERE id = {$tarefa['id']}
    ";

    mysqli_query($conexao, $sqlEditar);
}

function remover_tarefa($conexao, $id) {
    $sqlRemover = "DELETE FROM tarefas WHERE id = $id";
    mysqli_query($conexao, $sqlRemover);
}