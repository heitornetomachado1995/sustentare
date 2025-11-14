<?php
$host = "localhost";
$user = "editar"; // seu usuário do MySQL
$pass = "editar";     // sua senha do MySQL
$db   = "editar"; // nome do banco
$con = mysqli_connect($host, $user, $pass, $db);
if (!$con) { die("Conexão falhou: " . mysqli_connect_error()); }
?>


