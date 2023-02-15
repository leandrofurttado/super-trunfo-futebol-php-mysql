<?php

include "../conexao_db.php";

$id_carta = $_GET["id"];
$id_usuario = $_GET["id_user"];
$dinheiro_usuario = $_GET["dinheiroUser"];

// Selecione a informação da carta a partir do banco de dados
$query = "SELECT * FROM loja_das_cartas WHERE id_carta = $id_carta";
$result = $mysqlconnect->query($query);
$carta = mysqli_fetch_assoc($result);
$valor_da_carta = $carta['valor_carta'];

if (!$carta or $dinheiro_usuario < $valor_da_carta) {
    echo "<h1 class=h1_error> Não foi possível comprar esta carta! Você não possui dinheiro suficiente ou a carta já não está mais disponível!</h1>";
    header("refresh:3 ../loja.php");
} else {
    // ADICIONANDO A CARTA NA TABELA DO USUARIO.
    $query_addTable = "INSERT INTO usuario_cartas (id_carta, id_usuario) 
    VALUES ($id_carta, $id_usuario)";
    $mysqlconnect->query($query_addTable);

    //DELETANDO A CARTA DA LOJA
    $query_removeCard = "DELETE FROM loja_das_cartas WHERE id_carta = $id_carta";
    $mysqlconnect->query($query_removeCard);


    // tirando o dinheiro do comprador
    $query_Credits = "SELECT `credits` FROM usuarios WHERE id = $id_usuario";
    $creditos = mysqli_fetch_assoc($mysqlconnect->query($query_Credits));
    //--- AGORA É SÓ SUBTRAIR COM A COMPRA
    $creditos_final = intval($creditos['credits']) - intval($valor_da_carta);
    // agora basta colocar o valor QUE RESTOU na conta:
    $query_addValor = "UPDATE usuarios SET credits = '$creditos_final' WHERE id = $id_usuario";
    $mysqlconnect->query($query_addValor);

    header("refresh:5 ../painel_usuario.php")
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Você adquiriu este jogador com sucesso! Verifique suas cartas.</title>
        <style>
            .container {
                text-align: center;
                margin-top: 50px;
            }

            .message {
                font-size: 36px;
                font-weight: bold;
                color: #2ecc71;
                animation-name: zoomIn;
                animation-duration: 1s;
                animation-timing-function: ease-in-out;
            }

            @keyframes zoomIn {
                0% {
                    transform: scale(0);
                }

                100% {
                    transform: scale(1);
                }
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="message">Você adquiriu este jogador com sucesso! Verifique suas cartas.</div>
        </div>
    </body>

    </html>
<?php
}
?>