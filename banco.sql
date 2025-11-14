-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14/11/2025 às 06:02
-- Versão do servidor: 11.8.3-MariaDB-log
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u429077791_quiz`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `pergunta` varchar(255) NOT NULL,
  `opcao_a` varchar(255) NOT NULL,
  `opcao_b` varchar(255) NOT NULL,
  `opcao_c` varchar(255) NOT NULL,
  `opcao_d` varchar(255) NOT NULL,
  `resposta_correta` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `quizzes`
--

INSERT INTO `quizzes` (`id`, `pergunta`, `opcao_a`, `opcao_b`, `opcao_c`, `opcao_d`, `resposta_correta`) VALUES
(1, 'Qual das ações abaixo contribui mais para reduzir o consumo de energia em uma empresa?', 'Deixar todos os computadores ligados 24h', 'Utilizar iluminação LED e desligar equipamentos não usados', 'Aumentar a temperatura do ar-condicionado', 'Instalar mais impressoras', 'B'),
(2, 'Qual estratégia é mais eficiente para reduzir desperdício de materiais no escritório?', 'Digitalizar documentos e reduzir impressão', 'Comprar papel em grandes quantidades', 'Armazenar papel velho para \'usar depois\'', 'Ignorar o desperdício', 'A'),
(3, 'Como uma empresa pode engajar seus colaboradores em práticas sustentáveis?', 'Aplicando multas por erro ambiental', 'Oferecendo treinamentos e incentivos', 'Ignorando a opinião dos funcionários', 'Apenas publicando avisos', 'B'),
(4, 'Qual indicador ajuda a medir a sustentabilidade de uma empresa?', 'Lucro mensal', 'Pegada de carbono e consumo de recursos', 'Número de funcionários', 'Tempo médio de reuniões', 'B'),
(5, 'Qual das ações abaixo é considerada uma prática de gestão de resíduos sustentável?', 'Misturar todo tipo de lixo em uma lixeira', 'Separar recicláveis, orgânicos e rejeitos corretamente', 'Queimar resíduos no quintal', 'Deixar resíduos acumularem sem controle', 'B');

-- --------------------------------------------------------

--
-- Estrutura para tabela `respostas`
--

CREATE TABLE `respostas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `resposta` char(1) NOT NULL,
  `data_resposta` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `respostas`
--

INSERT INTO `respostas` (`id`, `usuario_id`, `quiz_id`, `resposta`, `data_resposta`) VALUES
(1, 1, 1, 'B', '2025-11-14 05:38:07'),
(2, 1, 2, 'D', '2025-11-14 05:38:07'),
(3, 1, 3, 'B', '2025-11-14 05:38:07'),
(4, 1, 4, 'B', '2025-11-14 05:38:07'),
(5, 1, 5, 'C', '2025-11-14 05:38:07');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_cadastro` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `data_cadastro`) VALUES
(1, 'estet', 'email@emailc.com', 'senhaaqui', '2025-11-14 05:37:40');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `respostas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `respostas_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
