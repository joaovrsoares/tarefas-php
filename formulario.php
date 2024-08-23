<form method="POST">
    <input type="hidden" name="id" value="<?= $tarefa['id']; ?>">
    <fieldset>
        <legend> Nova tarefa</legend>
        <label>Tarefa:
            <input type="text" name="nome" value="<?= $tarefa['nome']; ?>" autofocus required>
        </label>
        <label>Descrição (opcional):
            <textarea name="descricao" style="resize: vertical;" value="<?= $tarefa['descricao']; ?>"></textarea>
        </label>
        <label>Prazo (opcional):
            <?php if ($tem_erros && isset($erros_validacao['prazo'])) : ?>
                <span class="erro"><?php echo $erros_validacao['prazo']; ?></span>
            <?php endif; ?>
            <input type="text" name="prazo" pattern="\d{2}/\d{2}/\d{4}" title="DD/MM/AAAA" placeholder="DD/MM/AAAA" value="<?= converte_data_para_tela($tarefa['prazo']); ?>">
        </label>
        <fieldset style="padding-top: 12px; padding-bottom: 16px">
            <legend>Prioridade:</legend>
            <input type="radio" name="prioridade" value="1" <?= $tarefa['prioridade'] == 1 ? 'checked' : ''; ?> id="1"><label for="1" style="all: unset; cursor: default;">Baixa</label>
            <input type="radio" name="prioridade" value="2" <?= $tarefa['prioridade'] == 2 ? 'checked' : ''; ?> id="2"><label for="2" style="all: unset; cursor: default;">Média</label>
            <input type="radio" name="prioridade" value="3" <?= $tarefa['prioridade'] == 3 ? 'checked' : ''; ?> id="3"><label for="3" style="all: unset; cursor: default;">Alta</label>
        </fieldset>
        <label>Concluída:
            <input type="checkbox" name="concluida" value="1" style="vertical-align: -2px">
        </label>
        <input type="submit" value="+ Adicionar">
    </fieldset>
</form>