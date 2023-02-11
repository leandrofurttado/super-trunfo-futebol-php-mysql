<?php

include "../conexao_db.php";
session_start();

$id = $_GET["id"];
$id_usuario = $_GET["id_user"];
// Selecione a informação da carta a partir do banco de dados
$query = "SELECT * FROM jogadores WHERE id = $id";
$result = $mysqlconnect->query($query);
$carta = mysqli_fetch_assoc($result);

// Verifique se a carta foi encontrada

if (!$carta) {
    echo "<h1> Não foi possível vender esta carta! </h1>";
} else {
    // ADICIONANDO A CARTA NA TABELA DA LOJA.
    $valor_da_carta = $carta['valor_carta'];
    $query_addTable = "INSERT INTO loja_das_cartas (id_carta, id_vendedor, valor_carta) 
    VALUES ($id, $id_usuario, $valor_da_carta)";
    $mysqlconnect->query($query_addTable);
    ///
    ////DEVEMOS AGORA RETIRAR A CARTA DO USUARIO QUE VENDEU E ADICIONAR O VALOR DA VENDA.
    $query_removeCarta = "DELETE FROM usuario_cartas WHERE id_carta = $id AND id_usuario = $id_usuario";
    $mysqlconnect->query($query_removeCarta);
    /////
    ///AGORA IREMOS OBTER O VALOR ATUAL DOS CREDITS DO USUARIO E SOMAR COM O VALOR DA VENDA.
    $query_Credits = "SELECT 'credits' FROM usuarios WHERE id = $id_usuario";
    $creditos = mysqli_fetch_assoc($mysqlconnect->query($query_Credits));
    //--- AGORA É SÓ SOMAR COM A VENDA
    $creditos_final = intval($valor_da_carta) + intval($creditos['credits']);
    // agora basta colocar o valor da soma na conta:
    $query_addValor = "UPDATE usuarios SET credits = '$creditos_final' WHERE id = $id_usuario";
    $mysqlconnect->query($query_addValor);


    echo "<h1> Creditos total: $creditos_final</h1>";


    header("refresh:5 /painel_usuario.php");
}

?>


<h1>Jogador: <?php echo $carta["nome_jogador"] ?> foi vendido com sucesso!
    Cheque o dinheiro em sua conta.</h1>
<h1>+<?php echo $carta['valor_carta'] ?> points</h1>

<!-- Formulário de venda aqui -->
<!-- ... -->