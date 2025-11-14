<?php
session_start();
include 'db.php';
if(!isset($_SESSION['usuario_id'])){ header("Location: login.php"); exit; }
$usuario_id = $_SESSION['usuario_id'];
$result = mysqli_query($con,"SELECT q.pergunta, q.resposta_correta, r.resposta FROM quizzes q LEFT JOIN respostas r ON q.id=r.quiz_id AND r.usuario_id=$usuario_id");
$quizzes = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Progresso - Sustentare</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<h1>Sustentare - Progresso</h1>
<nav>
<a href="index.php">Início</a>
<a href="quiz.php">Quizzes</a>
<a href="progresso.php">Progresso</a>
<a href="logout.php">Sair</a>
</nav>
</header>
<main>
<h2>Seu Progresso</h2>
<?php
$pontuacao = 0;
foreach($quizzes as $q){
    $status = ($q[2]==$q[1]) ? "✔ Correta" : ($q[2] ? "✖ Errada" : "❌ Não respondida");
    if($status=="✔ Correta") $pontuacao++;
    echo "<p><strong>{$q[0]}</strong> - $status</p>";
}
echo "<p><strong>Total de acertos: $pontuacao de ".count($quizzes)."</strong></p>";
?>
</main>
<footer>&copy; 2025 Heitor Neto Machado - Sustentare</footer>
</body>
</html>
