<html>

<head>
    <title>Tela de Cadastro</title>
    <link rel="stylesheet" type="text/css" href="css/style_cadastro.css" media="screen" />
</head>

<body>
    <h1>Cadastro STrunfo Soccer</h1>
    <form action="/cadastro" method="post">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username">
        <br><br>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password">
        <br><br>
        <label for="confirm_password">Confirme a senha:</label>
        <input type="password" id="confirm_password" name="confirm_password">
        <br><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>