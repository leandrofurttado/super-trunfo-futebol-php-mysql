<?php
include "conexao_db.php";
// Array com as cartas do baralho
session_start();

$query_Cartas = "SELECT * FROM jogadores";
$busca = $mysqlconnect->query($query_Cartas);
$dados = $busca->fetch_all(MYSQLI_ASSOC);

// Gerar um número aleatório para selecionar uma carta
$indice_jogador_sorteado = array_rand($dados);
$nome_jogador = $dados[$indice_jogador_sorteado]['nome_jogador'];
$gols = $dados[$indice_jogador_sorteado]['gols'];
$vitorias = $dados[$indice_jogador_sorteado]['vitorias'];
$jogos = $dados[$indice_jogador_sorteado]['jogos'];
$ano_nascimento = $dados[$indice_jogador_sorteado]['ano_nascimento'];
$valor_carta = $dados[$indice_jogador_sorteado]['valor_carta'];
$caminho_arquivo = $dados[$indice_jogador_sorteado]['caminho_arquivo'];

#TODO fazer todo o processo de adicionar essa carta para o bd do usuario logado.
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>SORTE DIÁRIA</title>
    <link rel="stylesheet" href="css/style_sorteDiaria.css">
</head>
s
<div class="card">
    <div class="valor-carta-h4">
        <h4>💵VALOR DA CARTA: <?php echo $valor_carta ?> Points</h4>
        <hr class=" hr-func">
    </div>
    <div class="imagem">
        <img class="imagem-edit" src="<?php echo $caminho_arquivo ?>" alt="">
    </div>
    <h2 class="nome-jogador"><?php echo $nome_jogador ?></h2>
    <div class="texto">
        <h4>⛳Jogos: <?php echo $jogos ?></h4>
        <hr class="hr-func">
    </div>
    <div class="texto">
        <h4>🙌Vitórias: <?php echo $vitorias ?></h4>
        <hr class="hr-func">
    </div>
    <div class="texto">
        <h4>⚽Gols marcados: <?php echo $gols ?></h4>
        <hr class="hr-func">
    </div>
    <div class="texto">
        <h4>📅Ano nascimento: <?php echo $ano_nascimento ?></h4>
        <hr class="hr-func">
    </div>