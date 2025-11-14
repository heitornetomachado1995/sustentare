<?php
session_start();
include 'db.php';
if(!isset($_SESSION['usuario_id'])){ header("Location: login.php"); exit; }

$result = mysqli_query($con,"SELECT * FROM quizzes");
$quizzes = mysqli_fetch_all($result, MYSQLI_ASSOC);

$usuario_id = $_SESSION['usuario_id'];
$resultado_msg = "";

// Evita duplicar respostas
if(isset($_POST['enviar'])){
    $pontuacao = 0;
    foreach($quizzes as $q){
        $resposta = $_POST['quiz_'.$q['id']] ?? '';
        // Verifica se já respondeu
        $check = mysqli_query($con,"SELECT * FROM respostas WHERE usuario_id=$usuario_id AND quiz_id={$q['id']}");
        if(mysqli_num_rows($check) == 0){
            mysqli_query($con,"INSERT INTO respostas (usuario_id, quiz_id, resposta) VALUES ($usuario_id, {$q['id']}, '$resposta')");
        }
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
<style>
/* Reset */
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
nav { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; }
nav a { color:white; text-decoration:none; font-weight:bold; padding:5px 10px; border-radius:5px; transition:background 0.3s; }
nav a:hover { background-color:rgba(255,255,255,0.2); }

/* Main quiz */
main { padding:20px; max-width:700px; margin:auto; background:white; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1); }
main h2 { margin-bottom:20px; text-align:center; }
.quiz-question { margin-bottom:20px; padding:15px; border:1px solid #ccc; border-radius:5px; background:#f9f9f9; }
.quiz-question p { font-weight:bold; margin-bottom:10px; }
.quiz-options label { display:block; margin-bottom:5px; cursor:pointer; }
button { padding:10px 20px; background-color:#2e8b57; color:white; border:none; border-radius:5px; cursor:pointer; font-size:1rem; display:block; margin:auto; }
button:hover { background-color:#276748; }
.result { text-align:center; margin-top:20px; font-size:1.2rem; font-weight:bold; color:#2e8b57; }

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
<h1>Sustentare - Quiz</h1>
<div class="menu-toggle" id="menu-toggle">&#9776;</div>
<nav id="nav-menu">
    <a href="index.php">Início</a>
    <a href="conteudos.php">Conteúdos</a>
    <a href="quiz.php">Quizzes</a>
    <a href="progresso.php">Progresso</a>
    <a href="logout.php">Sair</a>
</nav>
</header>

<main>
<h2>Quiz sobre Sustentabilidade Empresarial</h2>
<form method="post">
<?php foreach($quizzes as $q): ?>
<div class="quiz-question">
<p><?= $q['pergunta'] ?></p>
<div class="quiz-options">
<label><input type="radio" name="quiz_<?= $q['id'] ?>" value="A"> <?= $q['opcao_a'] ?></label>
<label><input type="radio" name="quiz_<?= $q['id'] ?>" value="B"> <?= $q['opcao_b'] ?></label>
<label><input type="radio" name="quiz_<?= $q['id'] ?>" value="C"> <?= $q['opcao_c'] ?></label>
<label><input type="radio" name="quiz_<?= $q['id'] ?>" value="D"> <?= $q['opcao_d'] ?></label>
</div>
</div>
<?php endforeach; ?>
<button type="submit" name="enviar">Enviar</button>
</form>
<?php if($resultado_msg) echo "<div class='result'>$resultado_msg</div>"; ?>
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
