<?php

use PHPMailer\PHPMailer\PHPMailer;

function tem_post() {
    if (count($_POST) > 0) {
        return true;
    }
    return false;
}

function enviar_email($tarefa, $anexos = array()) {
    $corpo = preparar_corpo_email($tarefa, $anexos);
    $email = new PHPMailer();

    # Configuração do PHPMailer
    $email->isSMTP();
    $email->Host = "smtp.gmail.com";
    $email->Port = 587;
    $email->SMTPSecure = "tls";
    $email->SMTPAuth = true;
    $email->Username = "meuemail@email.com";
    $email->Password = "minhasenha";
    $email->setFrom("meuemail@email.com", "Avisador de tarefas");
    $email->addAddress(EMAIL_NOTIFICACAO);
    $email->Subject = "Aviso de tarefa: {$tarefa['nome']}";
    $email->msgHTML($corpo);

    foreach ($tarefa->getAnexos() as $anexo) {
        $email->addAttachment(__DIR__ . "/../anexos/{$anexo->getArquivo()}");
    }

    $email->send();
}

function preparar_corpo_email($tarefa) {
    ob_start();
    include __DIR__ . "/../template_email.php";

    $corpo = ob_get_contents();

    ob_end_clean();

    return $corpo;
}                  

/*function montar_email() {
    $tem_anexos = '';

    if (count($anexos) > 0) {
        $tem_anexos = "<p><strong>Atenção!</strong> Esta tarefa contém anexos!</p>";
    }

    $corpo = "
        <html lang='pt-BR'>
            <head>
                <meta charset=\"utf-8\">
                <title>Gerenciador de tarefas</title>
                <link rel=\"stylesheet\" href=\"tarefas.css\" type=\"text/css\">
            </head>
            <body>
                <h1>Tarefa: {$tarefa['nome']}</h1>
                <p><strong>Concluida:</strong> " . converte_concluida($tarefa['concluida']) . "</p>
                <p><strong>Descrição:</strong>" . nl2br($tarefa['descricao']) . "</p>
                <p><strong>Prazo:</strong>" . converte_data_para_exibir($tarefa['prazo']) . "</p>
                <p><strong>Prioridade:</strong>" . converte_prioridade($tarefa['prioridade']) . "</p>
                {$tem_anexos}
            </body>
        </html>
    ";
}*/

function tratar_anexo($anexo) {
    $padrao = '/^.+(\.pdf$|\.zip$)$/';
    $resultado = preg_match($padrao, $anexo['name']);

    if (! $resultado) {
        return false;
    }

    move_uploaded_file($anexo['tmp_name'], __DIR__ . "/../anexos/{$anexo['name']}");
    
    return true;
}

function validar_data($data){
    $padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
    $resultado = preg_match($padrao, $data);

    if (! $resultado) {
        return false;
    }

    $dados = explode('/', $data);
    $dia = $dados[0];
    $mes = $dados[1];
    $ano = $dados[2];

    $resultado = checkdate($mes, $dia, $ano);

    return $resultado;
}

// Função para converter a situação de número para texto
function converte_concluida($concluida) {
    if ($concluida == 1) {
        return 'Sim';
    } else {
        return 'Não';
    }
}

// Função para converter a prioridade de número para texto
// Switch faz a comparação de uma variável com uma série de valores
function converte_prioridade($codigo) {
    $prioridade = '';
    switch ($codigo) {
        case '1':
            $prioridade = 'Baixa';
            break;
        case '2':
            $prioridade = 'Média';
            break;
        case '3':
            $prioridade = 'Alta';
            break;
    }
    return $prioridade;
}

// Função para converter a data do formato brasileiro para o formato do banco de dados
// 20/06/2024 > 2024-06-20
function converte_data_para_banco($data) {
    if ($data == '') {
        return '';
    }

    $dados = explode('/', $data);
    $data_mysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";
    return $data_mysql;
}

function converte_data_br_para_objeto($data) {
    if ($data == "") {
        return "";
    }

    $dados = explode("/", $data);

    if (count($dados) != 3) {
        return $data;
    }

    return DateTime::createFromFormat('d/m/Y', $data);
}

function converte_data_para_tela($data) {
    if (is_object($data) && get_class($data) == "DateTime") {
        return $data->format("d/m/Y");
    }

    if ($data == "" OR $data == "0000-00-00") {
        return "";
    }

    $dados = explode("-", $data);

    if (count($dados) != 3) {
        return $data;
    }

    $data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";

    return $data_exibir;
}
