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
    $resultado = $mysqlconnect->query($query_verificadora);
    // ele está pegando o retorno da query e fazendo um fetch_assoc que lista em array as linhas da tabela, sendo assim criou uma variavel $linha com os dados 
    $linha = $resultado->fetch_assoc();
    $id_do_usuario = $linha['id'];
    $dinheiro_do_usuario = $linha['credits'];
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
    <div class="container">
        <?php
        $query_buscaCartas = $query_buscaCartas = "SELECT * FROM loja_das_cartas
    JOIN jogadores ON loja_das_cartas.id_carta = jogadores.id";
        $resultado2 = $mysqlconnect->query($query_buscaCartas);
        while ($linha = $resultado2->fetch_assoc()) {
        ?>
            <div class="card">
                <div class="valor-carta-h4">
                    <h4>💵VALOR DA CARTA: <?php echo $linha['valor_carta'] ?> Points</h4>
                    <hr class=" hr-func">
                </div>
                <div class="imagem">
                    <img class="imagem-edit" src="<?php echo $linha['caminho_arquivo'] ?>" alt="">
                </div>
                <h2 class="nome-jogador"><?php echo $linha['nome_jogador'] ?></h2>
                <div class="texto">
                    <h4>⛳Jogos: <?php echo $linha['jogos'] ?></h4>
                    <hr class="hr-func">
                </div>
                <div class="texto">
                    <h4>🙌Vitórias: <?php echo $linha['vitorias'] ?></h4>
                    <hr class="hr-func">
                </div>
                <div class="texto">
                    <h4>⚽Gols marcados: <?php echo $linha['gols'] ?></h4>
                    <hr class="hr-func">
                </div>
                <div class="texto">
                    <h4>📅Ano nascimento: <?php echo $linha['ano_nascimento'] ?></h4>
                    <hr class="hr-func">
                </div>
                <button class="btn-comprar"><a href='/speedFunctions/comprar_carta.php?id=<?php echo $linha["id"] ?>&id_user=<?php echo $id_do_usuario ?>&dinheiroUser=<?php echo $dinheiro_do_usuario ?>'>COMPRAR</a></button>
            </div>

        <?php
        }
        // ESSA TAG PHP É CRIADA SOMENTE PARA FINALIZAR TODO O WHILE INICIADO LÁ EM CIMA.
        ?>
    </div>