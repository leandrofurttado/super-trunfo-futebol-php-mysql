<?php
include "conexao_db.php";

session_start();

if (!isset($_SESSION['username']) == true and (!isset($_SESSION['senha']) == true)) {
    echo "<h1> Faça login para acessar a loja </h1>";
    header("refresh:2 login.php");
} else {
    // SETANDO A SESSÃO DO USUARIO.
    $usuario = $_SESSION['username'];
    $senha = $_SESSION['senha'];
    $query_verificadora = "SELECT * FROM usuarios WHERE username = '$usuario' and senha = '$senha'";
    $creditos_usuario = $mysqlconnect->query($query_verificadora);
    // ele está pegando o retorno da query e fazendo um fetch_assoc que lista em array as linhas da tabela, sendo assim criou uma variavel $linha com os dados 
    $linha = $creditos_usuario->fetch_assoc();
    $id_do_usuario = $linha['id'];
}




?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Loja de Cartas</title>
    <link rel="stylesheet" href="css/style_loja.css">
</head>

<body>
    <h1>Loja de Cartas</h1>
    <div class="card-deck">
        <div class="card">
            <img class="card-img-top" src="files/63e2ee77f2e53.jpg" alt="Carta 1">
            <div class="card-body">
                <h5 class="card-title">Carta 1</h5>
                <p class="card-text">Descrição da Carta 1</p>
            </div>
            <div class="card-footer">
                <p class="card-price">R$ 10,00</p>
                <button class="card-button">Comprar</button>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="carta2.jpg" alt="Carta 2">
            <div class="card-body">
                <h5 class="card-title">Carta 2</h5>
                <p class="card-text">Descrição da Carta 2</p>
            </div>
            <div class="card-footer">
                <p class="card-price">R$ 15,00</p>
                <button class="card-button">Comprar</button>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="carta3.jpg" alt="Carta 3">
            <div class="card-body">
                <h5 class="card-title">Carta 3</h5>
                <p class="card-text">Descrição da Carta 3</p>
            </div>
            <div class="card-footer">
                <p class="card-price">R$ 20,00</p>
                <button class="card-button">Comprar</button>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="carta4.jpg" alt="Carta 4">
            <div class="card-body">
                <h5 class="card-title">Carta 4</h5>
                <p class="card-text">Descrição da Carta 4</p>
            </div>
            <div class="card-footer">
                <p class="card-price">R$ 25,00</p>
                <button class="card-button">Comprar</button>
            </div>
        </div>