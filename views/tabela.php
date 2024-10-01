<table>
    <tr>
        <th style="width: 250px">Tarefas</th>
        <th style="width: 350px">Descrição</th>
        <th style="width: 100px">Prazo</th>
        <th style="width: 100px">Prioridade</th>
        <th style="width: 30px">Concluída</th>
        <th style="width: 70px">Ações</th>
    </tr>

    <?php foreach($tarefas as $tarefa) : ?>
        <tr>
            <td>
                <a href="index.php?rota=tarefa&id=<?php echo $tarefa->getId();?>"><?php echo htmlentities($tarefa->getNome());?></a>
            </td>
            <td><?php echo htmlentities($tarefa->getDescricao()); ?></td>
            <td class="centro"><?php echo converte_data_para_tela($tarefa->getPrazo());?></td>
            <td class="centro"><?php echo converte_prioridade($tarefa->getPrioridade());?></td>
            <td class="centro"><?php echo converte_concluida($tarefa->getConcluida());?></td>
            <td>
                <a href="index.php?rota=editar&id=<?php echo $tarefa->getId();?>" title="Editar" class="acao">✏️ Editar</a><br>
                <a href="index.php?rota=remover&id=<?php echo $tarefa->getId();?>" title="Remover" class="acao">🗑️ Remover</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>