<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sustentare</title>
<link rel="stylesheet" href="style.css">
<script src="script.js" defer></script>
</head>
<body>
<header>
<h1>Sustentare</h1>
<nav>
<a href="index.php">Início</a>
<a href="quiz.php">Quizzes</a>
<a href="progresso.php">Progresso</a>
<?php if(isset($_SESSION['usuario_id'])): ?>
<a href="logout.php">Sair</a>
<?php else: ?>
<a href="login.php">Login</a>
<a href="register.php">Cadastro</a>
<?php endif; ?>
</nav>
</header>
<main>
<section class="intro">
<h2>Bem-vindo ao Sustentare</h2>
<p>Aprenda sobre práticas sustentáveis e como aplicá-las no dia a dia das empresas.</p>
</section>
<section class="objetivo">
<h3>Objetivo</h3>
<p>Promover educação e conscientização sobre sustentabilidade empresarial, incentivando hábitos responsáveis no ambiente corporativo.</p>
</section>
</main>
<footer>
<p>&copy; 2025 Heitor Neto Machado - Sustentare</p>
</footer>
</body>
</html>
