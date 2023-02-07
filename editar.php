<?php
include 'conexao_db.php';
session_start();
if (!isset($_SESSION['username']) == true and !isset($_SESSION['senha']) == true) {

    header("Location: login.php");
} else {
    if (!empty($_FILES['foto_perfil']) and !empty($_POST['nome_do_usuario'])) {
        $nova_foto = $_FILES['foto_perfil'];
        $novo_nome = $_POST['nome_do_usuario'];

        $usuario_logado = $_SESSION['username']; // pega o login do usuario LOGADO.


        //FAZENDO ANALISE DOS ARQUIVOS RECEBIDOS.
        $pasta = "files/"; //pasta onde ficará armazenado
        $nomeDoArquivo = $nova_foto['name']; //nome do arquivo apenas
        $r_extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
        $cript_name = uniqid();
        $path = $pasta . $cript_name . "." . $r_extensao; // faz o path completo incluindo a pasta, o nome gerado pelo uniqid e também a extensão
        if ($r_extensao != "jpg" and $r_extensao != "png" and $r_extensao != "jpeg") {
            die("Tipo de arquivo não é aceito.");
        } else {
            move_uploaded_file($nova_foto["tmp_name"], $path); //envia a foto para a pasta fisica
            $query_envio_foto = "UPDATE usuarios SET nome_completo = '$novo_nome', nome_arquivouser = '$nomeDoArquivo', caminho_arquivouser = '$path' WHERE username = '$usuario_logado';";
            $mysqlconnect->query($query_envio_foto);
        }
    }
}


?>


<!DOCTYPE html>
<html>

<head>
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="css/style_editarperfil.css">
</head>

<body>
    <div class="container">
        <h1>Editar Perfil</h1>
        <?php ?>
        <form action="editar.php" method="post" enctype="multipart/form-data">
            <label for="foto_perfil">Alterar foto de perfil:</label>
            <input type="file" name="foto_perfil" id="foto_perfil">
            <br><br>
            <label for="nome_usuario">Alterar Nome (De preferência nome completo):</label>
            <input type="text" name="nome_do_usuario" id="nome_usuario">
            <br><br>
            <input type="submit" value="Alterar perfil">
        </form>
    </div>
</body>

</html>