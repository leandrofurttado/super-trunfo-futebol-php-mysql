<?php
include "conexao_db.php";
session_start();
if (!empty($_POST['senha']) and !empty($_POST['username'])) {

    $usuario_user = $_POST['username'];
    $senha_user = $_POST['senha'];

    $query_verificadora = "SELECT * FROM usuarios WHERE username = '$usuario_user' and senha = '$senha_user'";
    $verifica = $mysqlconnect->query($query_verificadora);

    if ($verifica->num_rows > 0) {
        echo "<h1 class=h1_sucess> Login efetuado com sucesso! Redirecionando para suas cartas...</h1>";

        $_SESSION["username"] = $usuario_user;
        $_SESSION["senha"] = $senha_user;

        header("Refresh: 3, painel_usuario.php");
    } else {
        echo "<h1 class=h1_error>Usuario ou senha inválidos!</h1>";
        unset($_SESSION["username"]); // feito para destruir a sessao caso nao exista.
        unset($_SESSION["senha"]);
    }
}

?>



<html>

<head>
    <title>LOGIN SuperTrunfo</title>
    <link rel="stylesheet" type="text/css" href="css/style_login.css" media="screen" />
</head>

<body>
    <button><a href="home.php">VOLTAR</a></button>
    <h1>Login STrunfo Soccer</h1>
    <form action="login.php" method="POST">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username">
        <br><br>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="senha">
        <br><br>
        <input type="submit" value="Entrar">
    </form>
</body>

</html>