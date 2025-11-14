<?php
session_start();
include 'db.php';
if(!isset($_SESSION['usuario_id'])){ header("Location: login.php"); exit; }

$result = mysqli_query($con,"SELECT * FROM quizzes");
$quizzes = mysqli_fetch_all($result, MYSQLI_ASSOC);

if(isset($_POST['enviar'])){
    $usuario_id = $_SESSION['usuario_id'];
    $pontuacao = 0;
    foreach($quizzes as $q){
        $resposta = $_POST['quiz_'.$q['id']] ?? '';
        mysqli_query($con,"INSERT INTO respostas (usuario_id, quiz_id, resposta) VALUES ($usuario_id, {$q['id']}, '$resposta')");
        if($resposta == $q['resposta_correta']) $pontuacao++;
    }
    $resultado_msg = "Você acertou $pontuacao de ".count($quizzes)." perguntas!";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quiz - Sustentare</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<h1>Sustentare - Quiz</h1>
<nav>
<a href="index.php">Início</a>
<a href="quiz.php">Quizzes</a>
<a href="progresso.php">Progresso</a>
<a href="logout.php">Sair</a>
</nav>
</header>
<main>
<h2>Quiz sobre Sustentabilidade Empresarial</h2>
<form method="post">
<?php foreach($quizzes as $q): ?>
<p><strong><?= $q['pergunta'] ?></strong></p>
<input type="radio" name="quiz_<?= $q['id'] ?>" value="A"> <?= $q['opcao_a'] ?><br>
<input type="radio" name="quiz_<?= $q['id'] ?>" value="B"> <?= $q['opcao_b'] ?><br>
<input type="radio" name="quiz_<?= $q['id'] ?>" value="C"> <?= $q['opcao_c'] ?><br>
<input type="radio" name="quiz_<?= $q['id'] ?>" value="D"> <?= $q['opcao_d'] ?><br><br>
<?php endforeach; ?>
<button type="submit" name="enviar">Enviar</button>
</form>
<?php if(isset($resultado_msg)) echo "<p><strong>$resultado_msg</strong></p>"; ?>
</main>
<footer>&copy; 2025 Heitor Neto Machado - Sustentare</footer>
</body>
</html>
