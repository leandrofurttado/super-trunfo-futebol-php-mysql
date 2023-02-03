<?php
//VAI VERIFICAR SE O USUARIO ESTÁ LOGADO/SESSIONADO E IRÁ APRESENTAR O NOME DE USUARIO DELE NO PAINEL PRINCIPAL.
session_start();

$usuario = '';
if (isset($_SESSION['username']) == true and isset($_SESSION['senha']) == true) {

    $usuario = $_SESSION['username'];
}


?>


<html>

<head>
    <title>Super Trunfo - Home</title>
    <link rel="stylesheet" type="text/css" href="css/style_home.css" media="screen" />
</head>

<body>
    <?php
    if ($usuario != '') {
        echo "<h1>Bem-vindo ao Super Trunfo $usuario!<button class=button_deslogar><a href='sair_deslogar.php'>SAIR</a></button></h1>";
    } else {
        echo "<h1>Bem-vindo ao Super Trunfo! Faça login para obter cartas!</h1>";
    }
    ?>

    <p>O Super Trunfo é um jogo de cartas onde cada carta possui informações únicas, como nome, idade, peso e altura. O objetivo do jogo é comparar essas informações entre as cartas e descobrir qual é a carta mais forte. Neste caso o projeto atual trabalha com cartas de Jogadores de Futebol. E ai? Quem terá o jogador mais craque? </p>
    <p>Para jogar, basta criar uma conta ou fazer login.</p>
    <button><a href="login.php">Login</a></button>
    <button><a href="cadastro.php">Cadastro</a></button>
    <button><a href="painel_usuario.php">Ver minhas cartas!</a></button>
</body>

</html>