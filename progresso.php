<?php
session_start();
include 'db.php';
if(!isset($_SESSION['usuario_id'])){ header("Location: login.php"); exit; }
$usuario_id = $_SESSION['usuario_id'];
$result = mysqli_query($con,"SELECT q.pergunta, q.resposta_correta, r.resposta 
                             FROM quizzes q 
                             LEFT JOIN respostas r 
                             ON q.id=r.quiz_id AND r.usuario_id=$usuario_id");
$quizzes = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Progresso - Sustentare</title>
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

/* Main */
main { padding:20px; max-width:600px; margin:auto; }
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
<h1>Sustentare - Progresso</h1>
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
<h2>Seu Progresso</h2>
<?php
$pontuacao = 0;
foreach($quizzes as $q){
    // Verifica se o usuário respondeu
    if(is_null($q['resposta'])){
        $status = "❌ Não respondida";
    } elseif($q['resposta'] == $q['resposta_correta']){
        $status = "✔ Correta";
        $pontuacao++;
    } else {
        $status = "✖ Errada";
    }
    echo "<p><strong>{$q['pergunta']}</strong> - $status</p>";
}
echo "<p><strong>Total de acertos: $pontuacao de ".count($quizzes)."</strong></p>";
?>
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
