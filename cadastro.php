<?php
include 'conexao_db.php';


if (!empty($_POST['username']) and !empty($_POST['senha'])) {
    $usuario_user = $_POST['username'];
    $senha_user = $_POST['senha'];


    //VERIFICANDO SE JA EXISTE O USUARIO.
    $query_verificandoUser = "SELECT * FROM usuarios WHERE username = '$usuario_user'";
    $existe_usuario = $mysqlconnect->query($query_verificandoUser);

    if ($existe_usuario->num_rows > 0) {
        echo "<h1 class='h1_error'>Já existe um usuario com essas informações</h1>";
        echo "<h1 class='h1classe'>Tente novamente com um usuario diferente!</h1>";
    } else {
        $query_insertuser = "INSERT INTO `usuarios` (`id`, `username`, `senha`) VALUES (NULL, '$usuario_user', '$senha_user')";

        $mysqlconnect->query($query_insertuser);
        echo "<h1 class='h1_sucess'>Cadastrado com sucesso! Redirecionando para o LOGIN...</h1>";
        header("Refresh: 3, url=login.php");
    }
}

?>

<html>

<head>
    <title>Cadastro Usuarios</title>
    <link rel="stylesheet" type="text/css" href="css/style_cadastro.css" media="screen" />
</head>

<body>
    <button><a href="home.php">VOLTAR</a></button>
    <h1>Cadastro STrunfo Soccer</h1>
    <form action="cadastro.php" method="post">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username">
        <br><br>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="senha">
        <br><br>
        <label for="confirm_password">Confirme a senha:</label>
        <input type="password" id="confirm_password" name="confirm_password">
        <br><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>


</html>