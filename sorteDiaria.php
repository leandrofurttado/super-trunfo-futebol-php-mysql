<?php
include "conexao_db.php";
// Array com as cartas do baralho
session_start();

$ler_html = true;

$id_do_usuario = $_GET['id_user'];

$query_Cartas = "SELECT * FROM jogadores";
$busca = $mysqlconnect->query($query_Cartas);
$dados = $busca->fetch_all(MYSQLI_ASSOC);

// Gerar um número aleatório para selecionar uma carta
$indice_jogador_sorteado = array_rand($dados);
$id_da_carta = $dados[$indice_jogador_sorteado]['id'];
$nome_jogador = $dados[$indice_jogador_sorteado]['nome_jogador'];
$gols = $dados[$indice_jogador_sorteado]['gols'];
$vitorias = $dados[$indice_jogador_sorteado]['vitorias'];
$jogos = $dados[$indice_jogador_sorteado]['jogos'];
$ano_nascimento = $dados[$indice_jogador_sorteado]['ano_nascimento'];
$valor_carta = $dados[$indice_jogador_sorteado]['valor_carta'];
$caminho_arquivo = $dados[$indice_jogador_sorteado]['caminho_arquivo'];

#TODO fazer todo o processo de adicionar essa carta para o bd do usuario logado.

if (isset($_SESSION['username']) && isset($_SESSION['senha'])) {
    $query_verificaUltimoPremio = "SELECT last_sort FROM usuarios WHERE id = '$id_do_usuario'";
    $resultado = $mysqlconnect->query($query_verificaUltimoPremio);
    $ultimoPremio = $resultado->fetch_assoc();
    $data_UltimoPremio = $ultimoPremio['last_sort'];
    $dataAtual = date('Y-m-d H:i:s');


    $tempo_minimo_espera = 24 * 60 * 60; // 24 horas em segundos
    //adicionando a carta sorteada no usuario logado.
    if ($data_UltimoPremio == null) {
        $query_inserir_carta = "INSERT INTO usuario_cartas (id_usuario, id_carta) VALUES ('$id_do_usuario', '$id_da_carta')";
        $mysqlconnect->query($query_inserir_carta);
        //adicionando a data usada agora
        $query_inserir_ultimoPremio = "UPDATE usuarios SET last_sort = '$dataAtual' WHERE id = $id_do_usuario";
        $mysqlconnect->query($query_inserir_ultimoPremio);
    } else {
        $dataAtual = date('Y-m-d H:i:s');
        $diferenca_tempo = strtotime($dataAtual) - strtotime($data_UltimoPremio);

        //aqui ele vai verificar se a diferença de tempo deu mais ou igual a 24 horas, se sim irá executar o mesmo código dando update na data
        if ($diferenca_tempo >= $tempo_minimo_espera) {
            $query_inserir_carta = "INSERT INTO usuario_cartas (id_usuario, id_carta) VALUES ('$id_do_usuario', '$id_da_carta')";
            $mysqlconnect->query($query_inserir_carta);
            //adicionando a data usada agora
            $query_inserir_ultimoPremio = "UPDATE usuarios SET last_sort = '$dataAtual' WHERE id = $id_do_usuario";
            $mysqlconnect->query($query_inserir_ultimoPremio);
        } else {
            $ler_html = false;
            echo "<h1> Você deve aguardar 24 horas para jogar novamente!";
            header("refresh:5 painel_usuario.php");
        }
    }
} else {
    echo "<h1> Você precisa estar logado para jogar no jogo da sorte!</h1>";
}
?>

<?php

if ($ler_html == true) {

?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>SORTE DIÁRIA</title>
        <link rel="stylesheet" href="css/style_sorteDiaria.css">
    </head>
    <button class="button-back"><a href="painel_usuario.php">VOLTAR PERFIL</a></button>
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
    <?php } ?>