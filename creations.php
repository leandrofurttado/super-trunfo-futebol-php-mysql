<?php
include "conexao_db.php";
if (isset($_FILES['arquivo']) and isset($_POST['nome_do_jogador']) and isset($_POST['partidas_disputadas']) and isset($_POST['vitorias_jogador']) and isset($_POST['gols_jogador']) and isset($_POST['nascimento_jogador'])) {
    $arquivo = $_FILES['arquivo'];
    $nome_jogador = $_POST['nome_do_jogador'];
    $partidas = $_POST['partidas_disputadas'];
    $vitorias_jogador = $_POST['vitorias_jogador'];
    $gols_jogador = $_POST['gols_jogador'];
    $nascimento_jogador = $_POST['nascimento_jogador'];
    $valor_mercado_jogador = $_POST['valor_carta'];

    //diretorio arquivos
    $pasta = "files/";
    $nomeDoArquivo = $arquivo['name'];
    $r_extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
    $cript_name = uniqid();
    $path = $pasta . $cript_name . "." . $r_extensao;
    if ($r_extensao != "jpg" and $r_extensao != "png" and $r_extensao != "jpeg") {
        die("Tipo de arquivo não é aceito.");
    }
    $envio_true = move_uploaded_file($arquivo["tmp_name"], $path);
    if ($envio_true) {
        //CODIGO SQL
        $inserir_sql = "INSERT INTO jogadores (nome_jogador, jogos, vitorias, gols, ano_nascimento, nome_arquivo, caminho_arquivo, valor_carta) VALUES ('$nome_jogador', '$partidas', '$vitorias_jogador', '$gols_jogador', '$nascimento_jogador', '$nomeDoArquivo', '$path', '$valor_carta')";
        // ENVIANDO PRO BANCO DE DADOS COM O SQL.
        $mysqlconnect->query($inserir_sql);

        echo "<h1 class='h1-sucess'>Jogador inserido com sucesso!<br>    Volte para as cards!</h1>";
    } else {
        echo "Falha ao enviar arquivo!";
    }
} else {
    echo "<h1 class='h1-centralizer'>Preencha o formulario completo!</h1>";
}
//FIM CODIGO DE ENVIAR ARQUIVOS PARA O BANCO DE DADOS
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trunfo - EDITAR/ADICIONAR</title>
    <link rel="icon" href="img/icon_trunfo.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="formularios">
        <form class="formulario" action="creations.php" method="POST" enctype="multipart/form-data">
            <fieldset class="fieldset-color" style="width: 10%;">
                <label>Envie a foto do jogador:</label>
                <input type="file" name="arquivo" id="Arquivo"><br>
                <hr>
                <label>Nome do jogador:</label>
                <input type="text" name="nome_do_jogador">
                <hr>
                <label>Partidas disputadas:</label>
                <input type="text" name="partidas_disputadas">
                <hr>
                <label>Vitórias:</label><br>
                <input type="text" name="vitorias_jogador">
                <hr>
                <label>Gols marcados:</label>
                <input type="text" name="gols_jogador">
                <hr>
                <label>Ano de nascimento:</label>
                <input type="number" name="nascimento_jogador">
                <hr>
                <label>Valor de mercado da carta:</label>
                <input type="number" name="valor_carta">
                <br>
                <hr>
                <input type="submit" value="Enviar">
            </fieldset>
        </form>
        <form class="remove-jogador" action="creations.php" method="POST">
            <fieldset class="fieldset-color" style="width: 10%;">
                <h2 class="h2remove">Remover carta!</h2>
                <label>ID da carta:</label>
                <input type="number" name="id_carta_jogador">
                <br>
                <hr>
                <input type="submit" value="Enviar">
                <?php
                //APAGAR UM JOGADOR*******
                if (isset($_POST['id_carta_jogador'])) {
                    $id_jogador = $_POST['id_carta_jogador'];
                    $consulta = "SELECT * FROM usuario_cartas";
                    $conexao = $mysqlconnect->query($consulta) or die("Não foi possível deletar!");

                    if ($conexao->num_rows > 0) {
                        $delete = "DELETE FROM usuario_cartas WHERE id_carta = '$id_jogador'";
                        $mysqlconnect->query($delete);
                        echo "<h1 class='h1-sucess'>Jogador removido!</h1>";
                    } else {
                        echo "<h3> Você não possui este jogador!";
                    }
                } else {
                    echo "Preencha o nome do jogador que deseja apagar!";
                }
                ?>
            </fieldset>
        </form>
    </div>
    <div class="botao">
        <button class="botao_click"><a href="painel_usuario.php">CLIQUE PARA VOLTAR AO PAINEL LOGADO</a></button>
    </div>
</body>

</html>