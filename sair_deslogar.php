<?php

session_start();

unset($_SESSION["username"]); // feito para destruir a sessao caso nao exista.
unset($_SESSION["senha"]);
//isso fara o logout

header("Refresh:1 home.php");
