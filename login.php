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
<style>
/* Reset básico */
* { margin:0; padding:0; box-sizing:border-box; }
body { font-family: Arial, sans-serif; background-color:#f0f8f5; color:#333; line-height:1.5; }

/* Header */
header { background-color:#2e8b57; color:white; padding:15px; text-align:center; position:relative; }
header h1 { font-size:1.8rem; margin-bottom:10px; }

/* Menu toggle (hamburger) */
.menu-toggle {
    display: none;
    font-size: 2rem;
    cursor: pointer;
    color: white;
    position: absolute;
    right: 20px;
    top: 15px;
}

/* Nav menu */
nav {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
}
nav a { color:white; text-decoration:none; font-weight:bold; padding:5px 10px; border-radius:5px; transition:background 0.3s; }
nav a:hover { background-color:rgba(255,255,255,0.2); }

/* Main e forms */
main { padding:20px; max-width:400px; margin:auto; }
form input[type='email'], form input[type='password'], form button { padding:10px; margin-bottom:10px; width:100%; border-radius:5px; border:1px solid #ccc; }
button { background-color:#2e8b57; color:white; border:none; cursor:pointer; font-size:1rem; }
button:hover { background-color:#276748; }
p { margin-bottom:10px; }

/* Footer */
footer { background-color:#2e8b57; color:white; text-align:center; padding:10px; margin-top:20px; }

/* Responsividade */
@media (max-width:768px) {
    header h1 { font-size:1.5rem; }
    nav { display:none; flex-direction:column; background-color:#2e8b57; width:100%; position:absolute; top:60px; left:0; }
    nav a { padding:15px; border-bottom:1px solid rgba(255,255,255,0.2); text-align:center; }
    .menu-toggle { display:block; }
}

/* Menu ativo */
nav.show { display:flex; }
</style>
</head>
<body>
<header>
<h1>Sustentare - Login</h1>
<div class="menu-toggle" id="menu-toggle">&#9776;</div>
<nav id="nav-menu">
    <a href="index.php">Início</a>
    <a href="conteudos.php">Conteúdos</a>
    <a href="quiz.php">Quizzes</a>
    <a href="progresso.php">Progresso</a>
    <a href="login.php">Login</a>
    <a href="register.php">Cadastro</a>
</nav>
</header>

<main>
<?php if($message) echo "<p style='color:red;'><strong>$message</strong></p>"; ?>
<form method="post">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="senha" placeholder="Senha" required>
<button type="submit" name="login">Entrar</button>
</form>
<p><a href="register.php">Não tem conta? Cadastre-se</a></p>
</main>

<footer>
<p>&copy; 2025 Heitor Neto Machado - Sustentare</p>
</footer>

<script>
// Menu responsivo
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('menu-toggle');
    const nav = document.getElementById('nav-menu');

    toggle.addEventListener('click', () => {
        nav.classList.toggle('show');
    });

    nav.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            if(window.innerWidth <= 768){
                nav.classList.remove('show');
            }
        });
    });
});
</script>
</body>
</html>
