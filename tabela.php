<table>
    <tr>
        <th style="width: 250px">Tarefas</th>
        <th style="width: 350px">Descrição</th>
        <th style="width: 100px">Prazo</th>
        <th style="width: 100px">Prioridade</th>
        <th style="width: 30px">Concluída</th>
        <th style="width: 70px">Ações</th>
    </tr>

    <?php foreach($lista_tarefas as $tarefa) : ?>
        <tr>
            <td><?php echo $tarefa['nome']; ?></td>
            <td><?php echo $tarefa['descricao'] ?></td>
            <td class="centro"><?php echo converte_data_para_tela($tarefa['prazo']) ?></td>
            <td class="centro"><?php echo converte_prioridade($tarefa['prioridade']) ?></td>
            <td class="centro"><?php echo converte_concluida($tarefa['concluida']) ?></td>
            <td>
                <a href="editar.php?id=<?= $tarefa['id']; ?>" title="Editar" style="all: unset; cursor: pointer; font-size: 0.75rem;">✏️ Editar</a><br>
                <a href="remover.php?id=<?= $tarefa['id']; ?>" title="Remover" style="all: unset; cursor: pointer; font-size: 0.75rem;">🗑️ Remover</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>