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
    $nome_user = $linha['nome_completo']; //aqui ele pega só a linha ''nome_completo'' do usuario de toda a query que voltou
    $id_do_usuario = $linha['id'];
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
    <h1 class="perfil-user">Seja bem-vindo, <?php echo $nome_user ?>! O seu ID: <?php echo $id_do_usuario ?></h1>
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
            <h1>Usuario: <?php echo $usuario; ?></h1>
            <h1>Créditos ST: <?php
                                if ($creditos <= 0) {
                                    echo 0;
                                } else {
                                    echo $creditos;
                                }
                                ?> Points</h1>
            <div class="container-buttons">
                <button class="button-edit"><a href="editar.php">Editar perfil</a></button>
                <hr>
                <button class=button_loja><a href='loja.php'>LOJA de Cartas</a></button>
                <hr>
                <button class=button-diario><a href='sorteDiaria.php?id_user=<?php echo $id_do_usuario ?>'>Sorte diária</a></button>
            </div>
            <hr>
            <button class=button_deslogar><a href='/speedFunctions/sair_deslogar.php'>LOGOUT</a></button>

    </div>

    <h1 class="titulo">Super Trunfo Soccer</h1>
    <div class="container">

        <?php //MOMENTO PARA ACESSAR O BANCO DE DADOS DOS JOGADORES/CARDS

        $query_verifica_id_cartas = "SELECT c.id, c.nome_jogador, c.jogos, c.vitorias, c.gols, c.ano_nascimento, c.caminho_arquivo, c.valor_carta
        FROM jogadores c
        INNER JOIN usuario_cartas cu ON c.id = cu.id_carta
        WHERE cu.id_usuario = $id_do_usuario"; //QUERY QUE IRÁ UNIR A TABELA COM CHAVES ESTRANGEIRAS JUNTAMENTE COM A TABELA DE CARTAS E NO FINAL ELA SÓ EXIBE SE O cu.id_usuario FOR IGUAL AO ID SESSION LOGADO.


        $resultado_pesquisa = $mysqlconnect->query($query_verifica_id_cartas); //array com os ids de todas as cartas somente do usuario da session.
        ?>

        <?php

        if ($resultado_pesquisa->num_rows > 0) {
            while ($linha = $resultado_pesquisa->fetch_assoc()) { // o While começa aqui e termina lá em baixo com uma abertura de codigo php apenas para fechar a chaves
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
                    <button class='botao_venda'><a href='/speedFunctions/vender_carta.php?id=<?php echo $linha["id"] ?>&id_user=<?php echo $id_do_usuario ?>'>Vender carta</a></button>
                </div>
            <?php } ?>
        <?php } else {
            echo "<h1> Você não possui cartas ainda! </h1>";
        } ?>

    </div>
    <div class="botao">
        <?php
        if ($usuario == "adm") {
            echo "<button class='botao_click'><a href='creations.php'>CLIQUE PARA CRIAR MAIS CARDS</a></button>";
        }
        ?>


    </div>
</body>

</html>