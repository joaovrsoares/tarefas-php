<?php

// Conexão ao banco de dados (MySQL)
if (!defined("BD_USUARIO")) define("BD_USUARIO", "root");
if (!defined("BD_SENHA")) define("BD_SENHA", "");
if (!defined("BD_DSN")) define("BD_DSN", "mysql:dbname=atividades;host=localhost");

// E-mail para notificação
if (!defined("EMAIL_NOTIFICACAO")) define("EMAIL_NOTIFICACAO", "meuemail@gmail.com");