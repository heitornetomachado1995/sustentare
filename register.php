<?php
include 'db.php';
$message = "";
$success = false;

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
        $success = true;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro - Sustentare</title>
<style>
/* Reset */
* { margin:0; padding:0; box-sizing:border-box; }
body { font-family: Arial, sans-serif; background-color:#f0f8f5; color:#333; line-height:1.5; }

/* Header */
header { background-color:#2e8b57; color:white; padding:15px; text-align:center; position:relative; }
header h1 { font-size:1.8rem; margin-bottom:10px; }
.menu-toggle { display:none; font-size:2rem; cursor:pointer; color:white; position:absolute; right:20px; top:15px; }
nav { display:flex; flex-wrap: wrap; justify-content: center; gap: 10px; }
nav a { color:white; text-decoration:none; font-weight:bold; padding:5px 10px; border-radius:5px; transition:background 0.3s; }
nav a:hover { background-color:rgba(255,255,255,0.2); }

/* Main form */
main { padding:20px; max-width:400px; margin:auto; background:white; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1); }
main h2 { text-align:center; margin-bottom:20px; }
form input { width:100%; padding:10px; margin-bottom:10px; border-radius:5px; border:1px solid #ccc; }
button { width:100%; padding:10px; background-color:#2e8b57; color:white; border:none; border-radius:5px; cursor:pointer; font-size:1rem; }
button:hover { background-color:#276748; }
.message { text-align:center; font-weight:bold; margin-bottom:15px; color:red; }
.success { color:green; }

/* Footer */
footer { background-color:#2e8b57; color:white; text-align:center; padding:10px; margin-top:20px; }

/* Responsividade */
@media (max-width:768px) {
    header h1 { font-size:1.5rem; }
    nav { display:none; flex-direction:column; background-color:#2e8b57; width:100%; position:absolute; top:60px; left:0; }
    nav a { padding:15px; border-bottom:1px solid rgba(255,255,255,0.2); text-align:center; }
    .menu-toggle { display:block; }
}
nav.show { display:flex; }
</style>
</head>
<body>
<header>
<h1>Sustentare - Cadastro</h1>
<div class="menu-toggle" id="menu-toggle">&#9776;</div>
<nav id="nav-menu">
    <a href="index.php">Início</a>
    <a href="conteudos.php">Conteúdos</a>
    <a href="quiz.php">Quizzes</a>
    <a href="progresso.php">Progresso</a>
    <a href="login.php">Login</a>
</nav>
</header>

<main>
<h2>Cadastro</h2>
<?php if($message) echo "<div class='message ".($success ? "success":"")."'>$message</div>"; ?>
<form method="post">
<input type="text" name="nome" placeholder="Nome" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="senha" placeholder="Senha" required>
<button type="submit" name="register">Cadastrar</button>
</form>
<p style="text-align:center; margin-top:10px;"><a href="login.php">Já tem conta? Faça login</a></p>
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

    <?php if($success): ?>
    // Redireciona para login após 2 segundos
    setTimeout(() => { window.location.href = 'login.php'; }, 2000);
    <?php endif; ?>
});
</script>
</body>
</html>
