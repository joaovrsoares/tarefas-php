<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/tarefas.css" type="text/css" />
    <title>Gerenciador de tarefas</title>
</head>
<body>
    <h1>Tarefa: <?php echo htmlentities($tarefa->getNome()); ?></h1>

    <fieldset>
        <legend>Tarefa</legend>
        <p><a href="index.php?rota=tarefas">Voltar para a lista de tarefas</a>.</p>

        <p><strong>Concluída:</strong> <?php echo converte_concluida($tarefa->getConcluida())?></p>
        <p><strong>Descrição:</strong> <?php echo nl2br($tarefa->getDescricao())?></p>
        <p><strong>Prazo:</strong> <?php echo converte_data_para_tela($tarefa->getPrazo())?></p>
        <p><strong>Prioridade:</strong> <?php echo converte_prioridade($tarefa->getPrioridade())?></p>

        <h2>Anexos</h2>
        <!-- Lista de anexos -->
        <?php if (count($tarefa->getAnexos()) > 0) : ?>
            <table>
                <tr>
                    <th>Arquivo</th>
                    <th>Opções</th>
                </tr>
                <?php foreach ($tarefa->getAnexos() as $anexo) : ?>
                    <tr>
                        <td><?php echo htmlentities($anexo->getNome()); ?></td>
                        <td>
                            <a href="anexos/<?php echo $anexo->getArquivo(); ?>" class="acao">⬇️ Download</a><br>
                            <a href="./index.php?rota=remover_anexo&id=<?php echo $anexo->getId(); ?>" class="acao">🗑️ Remover</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table><br>
        <?php else : ?>
            <p>Não há anexos para esta tarefa.</p><br>
        <?php endif; ?>

        <!-- Formulário para um novo anexo -->
        <form action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Novo anexo</legend>
                <input type="hidden" name="tarefa_id" value="<?php echo $tarefa->getId(); ?>" />
                <label>
                    <?php if ($tem_erros && isset($erros_validacao['anexo'])) : ?>
                        <span class="erro"><?php echo $erros_validacao['anexo']; ?></span>
                    <?php endif; ?>
                    <input type="file" name="anexo" />
                </label>
                <input type="submit" value="Cadastrar" class="botao" />
            </fieldset>
        </form>
    </fieldset>
</body>
</html>