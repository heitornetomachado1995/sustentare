<?php
session_start();
if(!isset($_SESSION['usuario_id'])){ header("Location: login.php"); exit; }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Conteúdos - Sustentare</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<h1>Sustentare - Conteúdos</h1>
<nav>
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
</body>
</html>
