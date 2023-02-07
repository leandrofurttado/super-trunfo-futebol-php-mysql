<?php
include "conexao_db.php";

session_start();

if (!isset($_SESSION['username']) == true and !isset($_SESSION['senha']) == true) {

    header("Location: login.php");
} else {
    // SETANDO A SESSÃO DO USUARIO.
    $usuario = $_SESSION['username'];
    $senha = $_SESSION['senha'];
    $query_verificadora = "SELECT * FROM usuarios WHERE username = '$usuario' and senha = '$senha'";
    $creditos_usuario = $mysqlconnect->query($query_verificadora);

    // ele está pegando o retorno da query e fazendo um fetch_assoc que lista em array as linhas da tabela, sendo assim criou uma variavel $linha com os dados 
    $linha = $creditos_usuario->fetch_assoc();
    $creditos = $linha['credits']; //aqui ele pega só a linha ''credits'' de toda a query que voltou.
    $nome_user = $linha['nome_completo'];

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
    <link rel="stylesheet" href="css/style_paineluser.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="perfil-user">
        <?php
        // *****SISTEMA PARA INSERIR FOTO NO PERFIL CASO TENHA *******
        // buscando no banco de dados o path do arquivo referente a session.
        $query_buscando = "SELECT caminho_arquivouser FROM usuarios WHERE username='$usuario'";
        $resultado = $mysqlconnect->query($query_buscando);
        if ($resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            $row_format = $row['caminho_arquivouser'];
            if ($row_format == null) {
                echo "<img class='user-padrao' src='files/photopadrao111111.png'";
            } else {
                echo "<img class='user-padrao' src='$row_format'";
            }
        } else {
            echo "<img class='user-padrao' src='files/photopadrao111111.png'";
        }
        ?>
        <h1>
            <h1>Usuario: <?php echo $nome_user; ?></h1>
            <h1>Créditos ST: <?php
                                if ($creditos <= 0) {
                                    echo 0;
                                } else {
                                    echo $creditos;
                                }
                                ?> Points</h1>
            <button class="button-edit"><a href="editar.php">Editar perfil</a></button>
    </div>

    <h1 class="titulo">Super Trunfo Soccer</h1>
    <div class="botao">
        <button class="botao_click"><a href="creations.php">CLIQUE PARA CRIAR MAIS CARDS</a></button>
        <button class=button_deslogar><a href='sair_deslogar.php'>LOGOUT</a></button>
    </div>
</body>

</html>