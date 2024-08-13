<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>
    <link rel="stylesheet" type="text/css" href="tarefas.css">
</head>
<body>

<h1><a href="?">Gerenciador de Tarefas - PHP</a></h1>
<?php include "formulario.php"; ?>
<br>
<?php if ($exibir_tabela) : ?>
    <?php include "tabela.php"; ?>
<?php endif; ?>
</body>
</html>