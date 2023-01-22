<?php
//CONFIGURANDO O MYSQL NO CODIGO.
$usuario_db = "root";
$senha_db = "";
$database = "jogadores_trunfo";
$host = "localhost";
// CONEXÃO ABAIXO:
$mysqlconnect = new mysqli($host, $usuario_db, $senha_db, $database);

if ($mysqlconnect->error) {
    die("Falha ao conectar ao banco de dados! " . $mysqlconnect->error);
}
