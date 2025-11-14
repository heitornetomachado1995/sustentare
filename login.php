<?php
session_start();
include 'db.php';
$message = "";
if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $senha = $_POST['senha'];
    $result = mysqli_query($con,"SELECT * FROM usuarios WHERE email='$email'");
    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        if(password_verify($senha,$user['senha'])){
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_nome'] = $user['nome'];
            header("Location: quiz.php");
            exit;
        } else { $message = "Senha incorreta!"; }
    } else { $message = "Email não cadastrado!"; }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Sustentare</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header><h1>Sustentare - Login</h1></header>
<main>
<?php if($message) echo "<p>$message</p>"; ?>
<form method="post">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="senha" placeholder="Senha" required>
<button type="submit" name="login">Entrar</button>
</form>
<p><a href="register.php">Não tem conta? Cadastre-se</a></p>
</main>
<footer>&copy; 2025 Heitor Neto Machado - Sustentare</footer>
</body>
</html>
