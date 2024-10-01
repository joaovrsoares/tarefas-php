<form method="POST">
    <input type="hidden" name="id" value="<?php echo $tarefa->getId(); ?>">
    <fieldset>
        <legend>Nova tarefa</legend>
        <label>Tarefa:
            <?php if ($tem_erros && isset($erros_validacao['nome'])) : ?>
                <span class="erro"><?php echo $erros_validacao['nome']; ?></span>
            <?php endif; ?>
            <input type="text" name="nome" value="<?php echo htmlentities($tarefa->getNome()); ?>" autofocus required>
        </label>
        <label>Descrição (opcional):
            <textarea name="descricao" value="<?php echo htmlentities($tarefa->getDescricao()); ?>"></textarea>
        </label>
        <label>Prazo (opcional):
            <?php if ($tem_erros && isset($erros_validacao['prazo'])) : ?>
                <span class="erro"><?php echo $erros_validacao['prazo']; ?></span>
            <?php endif; ?>
            <input type="text" name="prazo" pattern="\d{2}/\d{2}/\d{4}" title="DD/MM/AAAA" placeholder="DD/MM/AAAA" value="<?php echo converte_data_para_tela($tarefa->getPrazo()); ?>">
        </label><br>
        <fieldset style="padding-bottom: 16px;">
            <legend>Prioridade:</legend>
            <div>
                <input type="radio" name="prioridade" value="1" <?php echo ($tarefa->getPrioridade() == 1) ? 'checked' : ''; ?> id="1"><label for="1">Baixa</label>
                <input type="radio" name="prioridade" value="2" <?php echo ($tarefa->getPrioridade() == 2) ? 'checked' : ''; ?> id="2"><label for="2">Média</label>
                <input type="radio" name="prioridade" value="3" <?php echo ($tarefa->getPrioridade() == 3) ? 'checked' : ''; ?> id="3"><label for="3">Alta</label>
            </div>
        </fieldset>
        <label>
            Lembrete por e-mail:
            <input type="checkbox" name="lembrete" value="1" />
        </label>
        <label>
            Concluída:
            <input type="checkbox" name="concluida" value="1" <?php echo ($tarefa->getConcluida()) ? 'checked' : ''; ?> />
        </label>
        <input type="submit" value="<?php echo ($tarefa->getId() > 0) ? 'Atualizar' : 'Cadastrar'; ?>" class="botao" />
    </fieldset>
</form>