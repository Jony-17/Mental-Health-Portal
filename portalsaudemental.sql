-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Mar-2024 às 20:50
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `portalsaudemental`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `artigos`
--

CREATE TABLE `artigos` (
  `artigo_id` int(11) NOT NULL,
  `juncao_perturbacoes_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` mediumtext NOT NULL,
  `data_publicacao` mediumtext NOT NULL,
  `autor` mediumtext NOT NULL,
  `img_artigo` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `artigos`
--

INSERT INTO `artigos` (`artigo_id`, `juncao_perturbacoes_id`, `titulo`, `descricao`, `data_publicacao`, `autor`, `img_artigo`) VALUES
(1, 1, 'O que é a saúde mental?', 'Estima-se que uma em cada cinco pessoas em Portugal tenha uma doença mental.', '09 de outubro de 2020', 'Sandra Varandas, Bárbara Ferreira e Inês M. Borges', 'https://images.impresa.pt/sicnot/2020-10-02-livro-saude-mental-2/original/mw-720'),
(2, 2, 'Saúde mental: deixar de sofrer em silêncio', 'Pedir ajuda aos amigos, aos familiares, ao médico de família ou ao psicólogo é o grande passo para a recuperação.', '13 de outubro de 2020', 'Sandra Varandas e Bárbara Ferreira', 'https://images.impresa.pt/sicnot/2020-09-27-saude-mental--2-.jpg/original/mw-720'),
(3, 3, '\"Ó doutor, eu não estou bem. Não tem um medicamento para mim?\"', 'A SIC Notícias falou com o psicoterapeuta Pedro Brás sobre o consumo de antidepressivos e ansiolíticos em Portugal.', '11 de outubro de 2020', 'Bárbara Ferreira', 'https://images.impresa.pt/sicnot/2020-10-09-cerebro-1/original/mw-720'),
(4, 4, 'Como está a saúde mental das crianças e dos jovens?', 'Vinte por cento das crianças e dos adolescentes têm, pelo menos, uma perturbação mental, de acordo com a Organização Mundial de Saúde.', '10 de outubro de 2020', 'Rita Rogado, Sandra Varandas e Diogo Sentieiro', 'https://images.impresa.pt/sicnot/2020-10-08-Copy-of-Copy-of-Copy-of-Copy-of-Copy-of-Copy-of-Copy-of-Untitled-Design.png/original/mw-720'),
(5, 5, 'A sociedade está preparada para lidar com a doença mental?', 'Estima-se que 20% da população portuguesa sofra ou venha a sofrer de uma doença mental.', '10 de outubro de 2020', 'Bárbara Ferreira', 'https://images.impresa.pt/sicnot/2020-10-01-puzzle-saude-mental-7d99260e-1/original/mw-720'),
(6, 6, '\"Não há o mínimo dos recursos\". As lacunas e os números da saúde mental em Portugal', 'Mais de um quinto dos portugueses tem uma perturbação mental.', '10 de outubro de 2020', 'Rita Rogado', 'https://images.impresa.pt/sicnot/2020-10-10-saude-mental.png/original/mw-720'),
(7, 7, 'A vida nunca mais foi a mesma desde aquela noite', '\"Quis contar a minha história ao pormenor por vários motivos: não por ser um drama razoavelmente bom, mas porque não quero que outros se sintam sozinhos nesta difícil jornada.\"', '11 de outubro de 2020', 'SIC Notícias', 'https://images.impresa.pt/sicnot/2020-10-10-Saude-mental.jpg/original/mw-720');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos_perturbacoes`
--

CREATE TABLE `grupos_perturbacoes` (
  `grupos_perturbacoes_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grupos_perturbacoes`
--

INSERT INTO `grupos_perturbacoes` (`grupos_perturbacoes_id`, `nome`) VALUES
(1, 'Ansiedade Social'),
(2, 'Ansiedade Generalizada'),
(3, 'Agorafobia'),
(4, 'Fobia específica'),
(5, 'Perturbação de pânico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `juncao_perturbacoes`
--

CREATE TABLE `juncao_perturbacoes` (
  `juncao_perturbacoes_id` int(11) NOT NULL,
  `perturbacoes_id` int(11) NOT NULL,
  `grupos_perturbacoes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `juncao_perturbacoes`
--

INSERT INTO `juncao_perturbacoes` (`juncao_perturbacoes_id`, `perturbacoes_id`, `grupos_perturbacoes_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 1703689423, 1703689628, 'ola'),
(2, 1703689628, 1703689423, 'esta tudo bem nando?'),
(3, 1703689423, 1703689628, 'sim e contigo?'),
(4, 1703689628, 1703689423, 'também, obrigado'),
(5, 1703689423, 1703689628, 'ok'),
(6, 1703689628, 1035944128, 'Boa tarde Fernando!'),
(7, 1035944128, 1703689628, 'Como estás?'),
(8, 1703689628, 1035944128, 'a'),
(9, 1703689628, 1035944128, 'a'),
(10, 1703689628, 1035944128, 'a'),
(11, 1703689628, 1035944128, 'a'),
(12, 1703689628, 1035944128, 'a'),
(13, 1703689628, 1035944128, 'a'),
(14, 1703689628, 1035944128, 'a'),
(15, 1703689628, 1035944128, 'a'),
(16, 1703689628, 1035944128, 'a'),
(17, 1703689628, 1035944128, 'a'),
(18, 1703689628, 1035944128, 'a'),
(19, 1703689628, 1035944128, 'a'),
(20, 1703689628, 1035944128, 'a'),
(21, 1035944128, 1659325471, 'ola miguel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perturbacoes`
--

CREATE TABLE `perturbacoes` (
  `perturbacoes_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perturbacoes`
--

INSERT INTO `perturbacoes` (`perturbacoes_id`, `nome`) VALUES
(1, 'Perturbações de Ansiedade'),
(2, 'Perturbações do Sono - Vigília'),
(3, 'Perturbações de Humor'),
(4, 'Perturbações Alimentares'),
(5, 'Perturbações Obsessivo-Compulsivas'),
(6, 'Perturbações de Personalidade'),
(7, 'Perturbações relacionadas com Trauma e Fatores de stress');

-- --------------------------------------------------------

--
-- Estrutura da tabela `quizzes`
--

CREATE TABLE `quizzes` (
  `quiz_id` int(11) NOT NULL,
  `utilizador_id` int(11) NOT NULL,
  `quiz_empatia_id` int(11) DEFAULT NULL,
  `quiz_preocupacao_id` int(11) DEFAULT NULL,
  `quiz_energia_id` int(11) DEFAULT NULL,
  `quiz_emocao_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `quizzes`
--

INSERT INTO `quizzes` (`quiz_id`, `utilizador_id`, `quiz_empatia_id`, `quiz_preocupacao_id`, `quiz_energia_id`, `quiz_emocao_id`) VALUES
(88, 18, 1, 1, NULL, NULL),
(93, 18, 1, 1, NULL, NULL),
(94, 18, 1, NULL, NULL, NULL),
(95, 18, NULL, 1, NULL, NULL),
(96, 18, 1, NULL, NULL, NULL),
(97, 18, 1, NULL, NULL, NULL),
(98, 18, NULL, 1, NULL, NULL),
(99, 18, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quiz_emocao`
--

CREATE TABLE `quiz_emocao` (
  `quiz_emocao_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `quiz_emocao`
--

INSERT INTO `quiz_emocao` (`quiz_emocao_id`, `nome`) VALUES
(1, 'O quão livre emocionalmente, és?');

-- --------------------------------------------------------

--
-- Estrutura da tabela `quiz_empatia`
--

CREATE TABLE `quiz_empatia` (
  `quiz_empatia_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `quiz_empatia`
--

INSERT INTO `quiz_empatia` (`quiz_empatia_id`, `nome`) VALUES
(1, 'O quão empática/o és?');

-- --------------------------------------------------------

--
-- Estrutura da tabela `quiz_energia`
--

CREATE TABLE `quiz_energia` (
  `quiz_energia_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `quiz_energia`
--

INSERT INTO `quiz_energia` (`quiz_energia_id`, `nome`) VALUES
(1, 'Tens uma energia positiva?');

-- --------------------------------------------------------

--
-- Estrutura da tabela `quiz_preocupacao`
--

CREATE TABLE `quiz_preocupacao` (
  `quiz_preocupacao_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `quiz_preocupacao`
--

INSERT INTO `quiz_preocupacao` (`quiz_preocupacao_id`, `nome`) VALUES
(1, 'O quão preocupada/o és?');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `utilizador_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `genero` tinyint(1) NOT NULL,
  `img_perfil` mediumtext NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `data_criacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`utilizador_id`, `unique_id`, `nome`, `email`, `password`, `genero`, `img_perfil`, `admin`, `data_criacao`) VALUES
(10, 0, 'Admin2', 'admin2@gmail.com', '$2y$10$/VvdG5/dxdJXeUa/ockQFeiuQtyPZPuIr0aZHd3u7QJVGa9Bg2ZKC', 2, 'user2.png', 1, '0000-00-00 00:00:00'),
(12, 0, 'Admin', 'admin@gmail.com', '$2y$10$qhuOmrEAp7dt2CkDG.RAiOqrT.Ief55PRldhZjDpzDuVejQv002k.', 1, 'user.png', 1, '2024-02-25 20:17:56'),
(18, 1703689423, 'João', 'teste@gmail.com', '$2y$10$7Hf76z0PQaMFE.hBKGE7vur5e1OkdxEVsWD1CYFlddpt/CjfQs1ey', 1, 'user2.png', 0, '2024-03-11 15:13:13'),
(26, 1703689628, 'Fernando', 'teste2@gmail.com', '$2y$10$yAkDfepI6ubbkl0tHBluPOO6FOdJ6N6ODgi0/JZp8GZ6IwUfFrgzu', 3, 'user.png', 0, '2024-03-12 10:26:14'),
(27, 1035944128, 'Miguel', 'teste3@gmail.com', '$2y$10$i2zHS8WBb0bgvZDzkSgE7./3LGOfUa2lGKJjhli9sOEmzlCk8fwRu', 1, 'pin booking.jpg', 0, '2024-03-12 16:38:55');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `artigos`
--
ALTER TABLE `artigos`
  ADD PRIMARY KEY (`artigo_id`);

--
-- Índices para tabela `grupos_perturbacoes`
--
ALTER TABLE `grupos_perturbacoes`
  ADD PRIMARY KEY (`grupos_perturbacoes_id`);

--
-- Índices para tabela `juncao_perturbacoes`
--
ALTER TABLE `juncao_perturbacoes`
  ADD PRIMARY KEY (`juncao_perturbacoes_id`),
  ADD KEY `fk_perturbacoes_id` (`perturbacoes_id`),
  ADD KEY `fk_grupos_perturbacoes_id` (`grupos_perturbacoes_id`);

--
-- Índices para tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`msg_id`);

--
-- Índices para tabela `perturbacoes`
--
ALTER TABLE `perturbacoes`
  ADD PRIMARY KEY (`perturbacoes_id`);

--
-- Índices para tabela `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `fk_utilizador_id` (`utilizador_id`),
  ADD KEY `fk_quiz_empatia_id` (`quiz_empatia_id`),
  ADD KEY `fk_quiz_preocupacao_id` (`quiz_preocupacao_id`),
  ADD KEY `fk_quiz_energia_id` (`quiz_energia_id`),
  ADD KEY `fk_quiz_emocao_id` (`quiz_emocao_id`);

--
-- Índices para tabela `quiz_emocao`
--
ALTER TABLE `quiz_emocao`
  ADD PRIMARY KEY (`quiz_emocao_id`);

--
-- Índices para tabela `quiz_empatia`
--
ALTER TABLE `quiz_empatia`
  ADD PRIMARY KEY (`quiz_empatia_id`);

--
-- Índices para tabela `quiz_energia`
--
ALTER TABLE `quiz_energia`
  ADD PRIMARY KEY (`quiz_energia_id`);

--
-- Índices para tabela `quiz_preocupacao`
--
ALTER TABLE `quiz_preocupacao`
  ADD PRIMARY KEY (`quiz_preocupacao_id`);

--
-- Índices para tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`utilizador_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `artigos`
--
ALTER TABLE `artigos`
  MODIFY `artigo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `grupos_perturbacoes`
--
ALTER TABLE `grupos_perturbacoes`
  MODIFY `grupos_perturbacoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `juncao_perturbacoes`
--
ALTER TABLE `juncao_perturbacoes`
  MODIFY `juncao_perturbacoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `perturbacoes`
--
ALTER TABLE `perturbacoes`
  MODIFY `perturbacoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de tabela `quiz_emocao`
--
ALTER TABLE `quiz_emocao`
  MODIFY `quiz_emocao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `quiz_empatia`
--
ALTER TABLE `quiz_empatia`
  MODIFY `quiz_empatia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `quiz_energia`
--
ALTER TABLE `quiz_energia`
  MODIFY `quiz_energia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `quiz_preocupacao`
--
ALTER TABLE `quiz_preocupacao`
  MODIFY `quiz_preocupacao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `utilizador_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `juncao_perturbacoes`
--
ALTER TABLE `juncao_perturbacoes`
  ADD CONSTRAINT `fk_grupos_perturbacoes_id` FOREIGN KEY (`grupos_perturbacoes_id`) REFERENCES `grupos_perturbacoes` (`grupos_perturbacoes_id`),
  ADD CONSTRAINT `fk_perturbacoes_id` FOREIGN KEY (`perturbacoes_id`) REFERENCES `perturbacoes` (`perturbacoes_id`);

--
-- Limitadores para a tabela `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `fk_quiz_emocao_id` FOREIGN KEY (`quiz_emocao_id`) REFERENCES `quiz_emocao` (`quiz_emocao_id`),
  ADD CONSTRAINT `fk_quiz_empatia_id` FOREIGN KEY (`quiz_empatia_id`) REFERENCES `quiz_empatia` (`quiz_empatia_id`),
  ADD CONSTRAINT `fk_quiz_energia_id` FOREIGN KEY (`quiz_energia_id`) REFERENCES `quiz_energia` (`quiz_energia_id`),
  ADD CONSTRAINT `fk_quiz_preocupacao_id` FOREIGN KEY (`quiz_preocupacao_id`) REFERENCES `quiz_preocupacao` (`quiz_preocupacao_id`),
  ADD CONSTRAINT `fk_utilizador_id` FOREIGN KEY (`utilizador_id`) REFERENCES `utilizadores` (`utilizador_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
