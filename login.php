<?php



?>



<html>

<head>
    <title>LOGIN SuperTrunfo</title>
    <link rel="stylesheet" type="text/css" href="css/style_login.css" media="screen" />
</head>

<body>
    <button><a href="home.php">VOLTAR</a></button>
    <h1>Login STrunfo Soccer</h1>
    <form action="/login" method="POST">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username">
        <br><br>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password">
        <br><br>
        <input type="submit" value="Entrar">
    </form>
</body>

</html>