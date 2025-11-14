<?php
include 'db.php';
$message = "";
if(isset($_POST['register'])){
    $nome = mysqli_real_escape_string($con,$_POST['nome']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $verifica = mysqli_query($con,"SELECT * FROM usuarios WHERE email='$email'");
    if(mysqli_num_rows($verifica) > 0){
        $message = "Email já cadastrado!";
    } else {
        mysqli_query($con,"INSERT INTO usuarios (nome,email,senha) VALUES ('$nome','$email','$senha')");
        $message = "Cadastro realizado com sucesso!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro - Sustentare</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header><h1>Sustentare - Cadastro</h1></header>
<main>
<?php if($message) echo "<p>$message</p>"; ?>
<form method="post">
<input type="text" name="nome" placeholder="Nome" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="senha" placeholder="Senha" required>
<button type="submit" name="register">Cadastrar</button>
</form>
<p><a href="login.php">Já tem conta? Faça login</a></p>
</main>
<footer>&copy; 2025 Heitor Neto Machado - Sustentare</footer>
</body>
</html>
