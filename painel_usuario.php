<?php
session_start();

if (!isset($_SESSION['username']) == true and !isset($_SESSION['senha']) == true) {

    header("Location: login.php");
} else {
    echo "<h1> Logado! </h1>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperTrunfo - Suas cartas</title>
    <link rel="icon" href="img/icon_trunfo.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <h1 class="titulo">Super Trunfo Soccer</h1>
    <div class="container">
    </div>
    <div class="botao">
        <button class="botao_click"><a href="creations.php">CLIQUE PARA CRIAR MAIS CARDS</a></button>
    </div>
</body>

</html>