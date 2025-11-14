<?php
session_start();
if(!isset($_SESSION['usuario_id'])){
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Conteúdos - Sustentare</title>
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

/* Main e sections */
main { padding:20px; }
section { margin-bottom:25px; }

/* Links */
a { color:#2e8b57; }
a:hover { text-decoration:underline; }

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
    <h1>Sustentare - Conteúdos</h1>
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
<h2>Materiais de Estudo sobre Sustentabilidade Empresarial</h2>

<section>
<h3>1. O que é Sustentabilidade Empresarial?</h3>
<p>Sustentabilidade empresarial é a prática de conduzir os negócios de forma ética, socialmente responsável e ambientalmente consciente, garantindo a longevidade da empresa e o bem-estar da sociedade.</p>
</section>

<section>
<h3>2. Práticas Sustentáveis</h3>
<ul>
<li>Redução do consumo de energia e água</li>
<li>Gestão adequada de resíduos</li>
<li>Uso de materiais recicláveis</li>
<li>Transparência e ética corporativa</li>
<li>Incentivo à diversidade e igualdade de gênero</li>
</ul>
</section>

<section>
<h3>3. Benefícios para a Empresa</h3>
<ul>
<li>Melhoria da reputação da marca</li>
<li>Redução de custos operacionais</li>
<li>Maior engajamento de funcionários</li>
<li>Atendimento a regulamentações ambientais</li>
<li>Contribuição positiva para a sociedade e meio ambiente</li>
</ul>
</section>

<section>
<h3>4. Fontes de Aprendizado</h3>
<ul>
<li><a href="https://www.undp.org/sustainable-development-goals" target="_blank">Objetivos de Desenvolvimento Sustentável - ONU</a></li>
<li><a href="https://www.sustainability.com/" target="_blank">Sustainability com Insights Empresariais</a></li>
<li><a href="https://www.globalreporting.org/" target="_blank">Global Reporting Initiative</a></li>
</ul>
</section>
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
