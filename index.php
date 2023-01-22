<?php
include "conexao_db.php";

$consulta = "SELECT * FROM jogadores";
$con = $mysqlconnect->query($consulta) or die("Erro de conexão com o SQL" . $mysqlconnect->error);
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
        <?php while ($dado = $con->fetch_array()) { ?>
            <div class="card">
                <div class="imagem">
                    <img class="neymar" src="<?php echo $dado["caminho_arquivo"]; ?>" alt="">
                </div>
                <h2 class="nome-jogador"><?php echo $dado["nome_jogador"]; ?></h2>
                <div class="texto">
                    <h4>⛳Jogos: <?php echo $dado["jogos"]; ?></h4>
                    <hr class="hr-func">
                </div>
                <div class="texto">
                    <h4>🙌Vitórias: <?php echo $dado["vitorias"]; ?></h4>
                    <hr class="hr-func">
                </div>
                <div class="texto">
                    <h4>⚽Gols marcados: <?php echo $dado["gols"]; ?></h4>
                    <hr class="hr-func">
                </div>
                <div class="texto">
                    <h4>📅Ano nascimento: <?php echo $dado["ano_nascimento"]; ?></h4>
                    <hr class="hr-func">
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="botao">
        <button class="botao_click"><a href="creations.php">CLIQUE PARA CRIAR MAIS CARDS</a></button>
    </div>
</body>

</html>