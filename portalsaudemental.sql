-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Abr-2024 às 22:20
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
-- Estrutura da tabela `10_factos`
--

CREATE TABLE `10_factos` (
  `10_factos_id` int(11) NOT NULL,
  `perturbacoes_id` int(11) NOT NULL,
  `nº` int(11) NOT NULL,
  `factos` text NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `10_factos`
--

INSERT INTO `10_factos` (`10_factos_id`, `perturbacoes_id`, `nº`, `factos`, `descricao`) VALUES
(1, 1, 1, 'Symptoms', 'While symptoms anxiety can be debilitating, with proper treatment—including medication and psychotherapy—people can learn to manage their symptoms and live a more productive life.'),
(2, 1, 2, 'Introdução', 'While symptoms anxiety can be debilitating, with proper treatment—including medication and psychotherapy—people.'),
(3, 1, 3, 'Testeteste', 'TestetesteTestetesteTestetesteTestetesteTesteteste'),
(4, 1, 4, 'Teste4', 'TesteTesteTesteTesteTesteTesteTeste'),
(5, 1, 5, 'Teste5', 'TesteTesteTesteTesteTesteTesteTeste'),
(6, 1, 6, 'Teste6', 'TesteTesteTesteTesteTesteTesteTeste'),
(7, 1, 7, 'Teste7', 'TesteTesteTesteTesteTesteTesteTeste'),
(8, 1, 8, 'Teste8', 'TesteTesteTesteTesteTesteTesteTeste'),
(9, 1, 9, 'Teste9', 'TesteTesteTesteTesteTesteTesteTeste'),
(10, 1, 10, 'Teste10', 'TesteTesteTesteTesteTesteTesteTeste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `artigos`
--

CREATE TABLE `artigos` (
  `artigo_id` int(11) NOT NULL,
  `juncao_perturbacoes_id` int(11) DEFAULT NULL,
  `juncao_pert_pers_id` int(11) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` mediumtext NOT NULL,
  `data_publicacao` mediumtext NOT NULL,
  `autor` mediumtext NOT NULL,
  `img_artigo` mediumtext NOT NULL,
  `conteudo_texto` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `artigos`
--

INSERT INTO `artigos` (`artigo_id`, `juncao_perturbacoes_id`, `juncao_pert_pers_id`, `titulo`, `descricao`, `data_publicacao`, `autor`, `img_artigo`, `conteudo_texto`) VALUES
(1, 1, NULL, 'O que é a saúde mental?', 'Estima-se que uma em cada cinco pessoas em Portugal tenha uma doença mental.', '09 de outubro de 2020', 'Sandra Varandas, Bárbara Ferreira e Inês M. Borges', 'https://images.impresa.pt/sicnot/2020-10-02-livro-saude-mental-2/original/mw-720', 'Everybody deals with anxiety als with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietfrom time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n        Everybody deals with anxiety als with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietfrom time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n        '),
(2, 2, NULL, 'Como está a saúde mental?', 'Pedir ajuda aos amigos, aos familiares, ao médico de família ou ao psicólogo é o grande passo para a recuperação.', '13 de outubro de 2020', 'Sandra Varandas e Bárbara Ferreira', 'https://images.impresa.pt/sicnot/2020-09-27-saude-mental--2-.jpg/original/mw-720', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(3, 3, NULL, 'A sociedade está preparada? ', 'A SIC Notícias falou com o psicoterapeuta Pedro Brás sobre o consumo de antidepressivos e ansiolíticos em Portugal.', '11 de outubro de 2020', 'Bárbara Ferreira', 'https://images.impresa.pt/sicnot/2020-10-09-cerebro-1/original/mw-720', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(4, 4, NULL, 'Como está a saúde mental das crianças e dos jovens?', 'Vinte por cento das crianças e dos adolescentes têm, pelo menos, uma perturbação mental, de acordo com a Organização Mundial de Saúde.', '10 de outubro de 2020', 'Rita Rogado, Sandra Varandas e Diogo Sentieiro', 'https://images.impresa.pt/sicnot/2020-10-08-Copy-of-Copy-of-Copy-of-Copy-of-Copy-of-Copy-of-Copy-of-Untitled-Design.png/original/mw-720', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(5, 5, NULL, 'A sociedade está preparada para lidar com a doença mental?', 'Estima-se que 20% da população portuguesa sofra ou venha a sofrer de uma doença mental.', '10 de outubro de 2020', 'Bárbara Ferreira', 'https://images.impresa.pt/sicnot/2020-10-01-puzzle-saude-mental-7d99260e-1/original/mw-720', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(6, 6, NULL, 'Como é a saúde mental?', 'Mais de um quinto dos portugueses tem uma perturbação mental.', '10 de outubro de 2020', 'Rita Rogado', 'https://images.impresa.pt/sicnot/2020-10-10-saude-mental.png/original/mw-720', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(7, 7, NULL, 'A vida nunca mais foi a mesma desde aquela noite', '\"Quis contar a minha história ao pormenor por vários motivos: não por ser um drama razoavelmente bom, mas porque não quero que outros se sintam sozinhos nesta difícil jornada.\"', '11 de outubro de 2020', 'SIC Notícias', 'https://images.impresa.pt/sicnot/2020-10-10-Saude-mental.jpg/original/mw-720', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(8, 8, NULL, 'Uma história, uma caixa azul e um pássaro para falar de saúde mental a crianças e adolescentes', 'Uma equipa de psicólogos e terapeutas ocupacionais do Hospital de São João visita as escolas da Maia, do Porto e de Valongo para combater preconceitos ligados à saúde mental.', '16 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3878:2585:nowe:0:0/rs:fill:640/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/03/16102359/1-igor-martins-portaabertasaudemental-01-069-1.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(9, 9, NULL, 'O que é a terapia de casal? E para que serve?', 'Discussões e diferenças de opinião fazem parte da vida de qualquer casal. Se são difíceis de ultrapassar ou não há boa comunicação, a terapia pode ajudar. A recuperar ou a preparar um final saudável.', '16 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:4096:2731:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/03/08152454/gettyimages-1204607778-scaled.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(10, 10, NULL, 'Este coro ajuda a tratar a doença mental', 'No Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:2000:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/02/19174904/igor-martins-hospitalmagalhaeslemos-16-025.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(11, 11, NULL, 'coro ajuda a tratar a doença mental', 'No Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:2000:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/02/19174904/igor-martins-hospitalmagalhaeslemos-16-025.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(12, 12, NULL, 'ajuda a tratar a doença mental', 'No Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:2000:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/02/19174904/igor-martins-hospitalmagalhaeslemos-16-025.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(13, 13, NULL, 'Este coro a', 'No Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:2000:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/02/19174904/igor-martins-hospitalmagalhaeslemos-16-025.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(14, 14, NULL, 'Este coro aju mentalll', 'No Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:2000:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/02/19174904/igor-martins-hospitalmagalhaeslemos-16-025.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(15, 15, NULL, 'Este coro ajunça mental', 'No Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:2000:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/02/19174904/igor-martins-hospitalmagalhaeslemos-16-025.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(16, 16, NULL, 'Este a tratar a doença mental', 'No Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:2000:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/02/19174904/igor-martins-hospitalmagalhaeslemos-16-025.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(17, 17, NULL, 'Este ', 'No Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:2000:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/02/19174904/igor-martins-hospitalmagalhaeslemos-16-025.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(18, 18, NULL, 'Este coro ajuda a tratar a doen', 'No Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:2000:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/02/19174904/igor-martins-hospitalmagalhaeslemos-16-025.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(19, NULL, 1, 'Este coro ajuda a t', 'No Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:2000:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/02/19174904/igor-martins-hospitalmagalhaeslemos-16-025.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudo_artigo`
--

CREATE TABLE `conteudo_artigo` (
  `conteudo_artigo_id` int(11) NOT NULL,
  `artigo_id` int(11) NOT NULL,
  `ponto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `conteudo_artigo`
--

INSERT INTO `conteudo_artigo` (`conteudo_artigo_id`, `artigo_id`, `ponto`) VALUES
(1, 1, 'Introdução'),
(2, 1, 'Desenvolvimento'),
(3, 1, 'Conclusão'),
(4, 2, 'Conteúdo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos_perturbacoes`
--

CREATE TABLE `grupos_perturbacoes` (
  `grupos_perturbacoes_id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `texto` mediumtext NOT NULL,
  `sintomas_texto` mediumtext NOT NULL,
  `prevalencias_texto` mediumtext NOT NULL,
  `ajuda_texto` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grupos_perturbacoes`
--

INSERT INTO `grupos_perturbacoes` (`grupos_perturbacoes_id`, `nome`, `texto`, `sintomas_texto`, `prevalencias_texto`, `ajuda_texto`) VALUES
(1, 'Ansiedade Social', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety, know that you are not alone. The National Institutes of Mental Health estimate that nearly one-third of US adults will deal with an anxiety disorder at some point in their lives.1 Any Anxiety Disorder, National Institutes of Mental Health Since anxiety is a common mental health condition (and is a condition that can be debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety screening.2 \n\n', 'Generalized anxiety disorder (GAD) is a specific type of anxiety disorder. Most people worry at times about their health, job, money, or family, but people with GAD experience anxiety about these things and more, in a way that is persistent, excessive, and intrusive. [1]\n\nOften, people with GAD struggle to relax and have trouble concentrating on tasks. They may experience physical symptoms including restlessness, sweating, difficulty swallowing, and using the restroom a lot.\n\nAccording to mental health experts, nearly 3% of all U.S. adults have experienced GAD in the last year and it is estimated that up to 9% experience GAD at some point in their lives. Considering that anxiety is a common mental health condition, the United States Preventative Services Task Force recommends that all adults under the age of 65 should be routinely screened for anxiety. [2]', 'teste', 'Generalized anxiety disorder (GAD) is a specific type of anxiety disorder. Most people worry at times about their health, job, money, or family, but people with GAD experience anxiety about these things and more, in a way that is persistent, excessive, and intrusive. [1]\n\nOften, people with GAD struggle to relax and have trouble concentrating on tasks. They may experience physical symptoms including restlessness, sweating, difficulty swallowing, and using the restroom a lot.\n\nAccording to mental health experts, nearly 3% of all U.S. adults have experienced GAD in the last year and it is estimated that up to 9% experience GAD at some point in their lives. Considering that anxiety is a common mental health condition, the United States Preventative Services Task Force recommends that all adults under the age of 65 should be routinely screened for anxiety. [2]'),
(2, 'Ansiedade Generalizada', 'teste', 'teste', 'teste', 'teste'),
(3, 'Agorafobia', 'teste', 'teste', 'teste', 'teste'),
(4, 'Fobia específica', 'teste', 'teste', 'teste', 'teste'),
(5, 'Perturbação de pânico', 'teste', 'teste', 'teste', 'teste'),
(6, 'Perturbação de Insónia', 'teste', 'teste', 'teste', 'teste'),
(7, 'Hipersonolência', 'teste', 'teste', 'teste', 'teste'),
(8, 'Perturbação Depressiva Major', 'teste', 'teste', 'teste', 'teste'),
(9, 'Perturbação Bipolar', 'teste', 'teste', 'teste', 'teste'),
(10, 'Anorexia Nervosa', 'teste', 'teste', 'teste', 'teste'),
(11, 'Bulimia Nervosa', 'teste', 'teste', 'teste', 'teste'),
(12, 'Perturbação de Ingestão Alimentar Compulsiva', 'teste', 'teste', 'teste', 'teste'),
(13, 'Perturbações Obsessivo-Compulsivas', 'teste', 'teste', 'teste', 'teste'),
(14, 'Grupo A', 'teste', '', '', ''),
(15, 'Grupo B', 'teste', '', '', ''),
(16, 'Grupo C', 'teste', '', '', ''),
(17, 'Perturbação de Stress Pós-Traumático', 'teste', 'teste', 'teste', 'teste'),
(18, 'Perturbação de Ajustamento', 'teste', 'teste', 'teste', 'teste');

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
(5, 1, 5),
(6, 2, 6),
(7, 2, 7),
(8, 3, 8),
(9, 3, 9),
(10, 4, 10),
(11, 4, 11),
(12, 4, 12),
(13, 5, 13),
(14, 6, 14),
(15, 6, 15),
(16, 6, 16),
(17, 7, 17),
(18, 7, 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `juncao_pert_personalidade`
--

CREATE TABLE `juncao_pert_personalidade` (
  `juncao_pert_pers_id` int(11) NOT NULL,
  `perturbacoes_personalidade_id` int(11) NOT NULL,
  `grupos_perturbacoes_id` int(11) NOT NULL,
  `perturbacoes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `juncao_pert_personalidade`
--

INSERT INTO `juncao_pert_personalidade` (`juncao_pert_pers_id`, `perturbacoes_personalidade_id`, `grupos_perturbacoes_id`, `perturbacoes_id`) VALUES
(1, 1, 14, 6),
(2, 2, 14, 6),
(3, 3, 14, 6),
(4, 4, 15, 6),
(5, 5, 15, 6),
(6, 6, 15, 6),
(7, 7, 15, 6),
(8, 8, 16, 6),
(9, 9, 16, 6),
(10, 10, 16, 6);

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
(21, 1035944128, 1659325471, 'ola miguel'),
(22, 1703689628, 1703689423, 'Olá!'),
(23, 1703689423, 1703689628, 'Como estás?'),
(24, 1703689628, 1703689423, 'bem e tu?'),
(25, 1703689423, 1703689628, 'também, obg por perguntares');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perturbacoes`
--

CREATE TABLE `perturbacoes` (
  `perturbacoes_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `texto` mediumtext NOT NULL,
  `img_perturbacao` mediumtext DEFAULT NULL,
  `banner_perturbacao` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perturbacoes`
--

INSERT INTO `perturbacoes` (`perturbacoes_id`, `nome`, `texto`, `img_perturbacao`, `banner_perturbacao`) VALUES
(1, 'Perturbações de Ansiedade', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety, know that you are not alone. The National Institutes of Mental Health estimate that nearly one-third of US adults will deal with an anxiety disorder at some point in their lives.1 Any Anxiety Disorder, National Institutes of Mental Health Since anxiety is a common mental health condition (and is a condition that can be debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety screening.2 Treatment options like therapy, medication, self-care strategies, and lifestyle changes can help you manage your anxiety and help you live your best life at home, at work, and in your relationships.\n\nwith anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety, know that you are not alone. The National Institutes of Mental Health estimate that nearly one-third of US adults will deal with an anxiety disorder at some point in their lives.1 Any Anxiety Disorder, National Institutes of Mental Health Since anxiety is a common mental health condition (and is a condition that can be debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety screening.2 Treatment options like therapy, medication, self-care strategies, and lifestyle changes can help you manage your anxiety and help you live your best life at home, at work, and in your relationships.\n\n', 'https://i.ibb.co/dc26MBN/pert-ansie.png', 'https://images.unsplash.com/photo-1607214368910-d7b795724be4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(2, 'Perturbações do Sono - Vigília', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'https://i.ibb.co/tBQHpFF/pert-sono.png', 'https://images.unsplash.com/photo-1607214368910-d7b795724be4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(3, 'Perturbações de Humor', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'https://i.ibb.co/3dMTsNb/pert-humor.png', 'https://images.unsplash.com/photo-1607214368910-d7b795724be4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(4, 'Perturbações Alimentares', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'https://i.ibb.co/Mp1bqy7/pert-aliment.png', 'https://images.unsplash.com/photo-1607214368910-d7b795724be4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(5, 'Perturbações Obsessivo-Compulsivas', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'https://i.ibb.co/s2gQVVf/pert-obscomp.png', 'https://images.unsplash.com/photo-1607214368910-d7b795724be4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(6, 'Perturbações de Personalidade', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'https://i.ibb.co/4NyWkFy/pert-perso.png', 'https://images.unsplash.com/photo-1607214368910-d7b795724be4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(7, 'Perturbações relacionadas com Trauma e Fatores de stress', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'https://i.ibb.co/wpVRfkR/pert-stress.png', 'https://images.unsplash.com/photo-1607214368910-d7b795724be4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perturbacoes_personalidade`
--

CREATE TABLE `perturbacoes_personalidade` (
  `perturbacoes_personalidade_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `texto` mediumtext NOT NULL,
  `sintomas_texto` mediumtext NOT NULL,
  `prevalencias_texto` mediumtext NOT NULL,
  `ajuda_texto` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perturbacoes_personalidade`
--

INSERT INTO `perturbacoes_personalidade` (`perturbacoes_personalidade_id`, `nome`, `texto`, `sintomas_texto`, `prevalencias_texto`, `ajuda_texto`) VALUES
(1, 'Perturbação Paranóide da Personalidade', 'teste', 'teste', 'teste', 'teste'),
(2, 'Perturbação Esquizóide da Personalidade', 'teste', 'teste', 'teste', 'teste'),
(3, 'Perturbação Esquizotípica de Personalidade', 'teste', 'teste', 'teste', 'teste'),
(4, 'Perturbação Antissocial da Personalidade', 'teste', 'teste', 'teste', 'teste'),
(5, 'Perturbação Borderline da Personalidade', 'teste', 'teste', 'teste', 'teste'),
(6, 'Perturbação Histriónica da Personalidade', 'teste', 'teste', 'teste', 'teste'),
(7, 'Perturbação Narcísica da Personalidade', 'teste', 'teste', 'teste', 'teste'),
(8, 'Perturbação Evitante da Personalidade', 'teste', 'teste', 'teste', 'teste'),
(9, 'Perturbação Dependente da Personalidade', 'teste', 'teste', 'teste', 'teste'),
(10, 'Perturbação Obsessivo-Compulsiva da Personalidade', 'teste', 'teste', 'teste', 'teste');

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
-- Estrutura da tabela `ted_talks`
--

CREATE TABLE `ted_talks` (
  `ted_talks_id` int(11) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `tempo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ted_talks`
--

INSERT INTO `ted_talks` (`ted_talks_id`, `autor`, `titulo`, `data`, `tempo`) VALUES
(1, 'Andrew Solomon', 'Depression, the secret we share', 'Outubro 2013', '29:07 min');

-- --------------------------------------------------------

--
-- Estrutura da tabela `texto_artigo`
--

CREATE TABLE `texto_artigo` (
  `texto_artigo_id` int(11) NOT NULL,
  `conteudo_artigo_id` int(11) NOT NULL,
  `texto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `texto_artigo`
--

INSERT INTO `texto_artigo` (`texto_artigo_id`, `conteudo_artigo_id`, `texto`) VALUES
(1, 1, '1 Generalized anxiety disorder (GAD) is a specific type of anxiety disorder. Most people worry at times about\r\n            their health, job, money, or family, but people with GAD experience anxiety about these things and more, in\r\n            a way that is persistent, excessive, and intrusive. [1]\r\n\r\nEverybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental '),
(2, 2, '2 Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.\r\n\r\n                 '),
(3, 3, '3 Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.\r\n\r\n                 ');

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
-- Índices para tabela `10_factos`
--
ALTER TABLE `10_factos`
  ADD PRIMARY KEY (`10_factos_id`),
  ADD KEY `fk_perturbacoes_id_factos` (`perturbacoes_id`);

--
-- Índices para tabela `artigos`
--
ALTER TABLE `artigos`
  ADD PRIMARY KEY (`artigo_id`),
  ADD KEY `fk_juncao_perturbacoes_id` (`juncao_perturbacoes_id`),
  ADD KEY `FK_juncao_pert_pers_id` (`juncao_pert_pers_id`);

--
-- Índices para tabela `conteudo_artigo`
--
ALTER TABLE `conteudo_artigo`
  ADD PRIMARY KEY (`conteudo_artigo_id`),
  ADD KEY `fk_artigo_id` (`artigo_id`);

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
-- Índices para tabela `juncao_pert_personalidade`
--
ALTER TABLE `juncao_pert_personalidade`
  ADD PRIMARY KEY (`juncao_pert_pers_id`),
  ADD KEY `FK_perturbacoes_personalidade_id` (`perturbacoes_personalidade_id`),
  ADD KEY `FK_grupos_perturbacoes_id2` (`grupos_perturbacoes_id`),
  ADD KEY `FK_perturbacoes_id2` (`perturbacoes_id`);

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
-- Índices para tabela `perturbacoes_personalidade`
--
ALTER TABLE `perturbacoes_personalidade`
  ADD PRIMARY KEY (`perturbacoes_personalidade_id`);

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
-- Índices para tabela `ted_talks`
--
ALTER TABLE `ted_talks`
  ADD PRIMARY KEY (`ted_talks_id`);

--
-- Índices para tabela `texto_artigo`
--
ALTER TABLE `texto_artigo`
  ADD PRIMARY KEY (`texto_artigo_id`),
  ADD KEY `fk_conteudo_artigo_id` (`conteudo_artigo_id`);

--
-- Índices para tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`utilizador_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `10_factos`
--
ALTER TABLE `10_factos`
  MODIFY `10_factos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `artigos`
--
ALTER TABLE `artigos`
  MODIFY `artigo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `conteudo_artigo`
--
ALTER TABLE `conteudo_artigo`
  MODIFY `conteudo_artigo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `grupos_perturbacoes`
--
ALTER TABLE `grupos_perturbacoes`
  MODIFY `grupos_perturbacoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `juncao_perturbacoes`
--
ALTER TABLE `juncao_perturbacoes`
  MODIFY `juncao_perturbacoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `juncao_pert_personalidade`
--
ALTER TABLE `juncao_pert_personalidade`
  MODIFY `juncao_pert_pers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `perturbacoes`
--
ALTER TABLE `perturbacoes`
  MODIFY `perturbacoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `perturbacoes_personalidade`
--
ALTER TABLE `perturbacoes_personalidade`
  MODIFY `perturbacoes_personalidade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT de tabela `ted_talks`
--
ALTER TABLE `ted_talks`
  MODIFY `ted_talks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `texto_artigo`
--
ALTER TABLE `texto_artigo`
  MODIFY `texto_artigo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `utilizador_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `10_factos`
--
ALTER TABLE `10_factos`
  ADD CONSTRAINT `fk_perturbacoes_id_factos` FOREIGN KEY (`perturbacoes_id`) REFERENCES `perturbacoes` (`perturbacoes_id`);

--
-- Limitadores para a tabela `artigos`
--
ALTER TABLE `artigos`
  ADD CONSTRAINT `FK_juncao_pert_pers_id` FOREIGN KEY (`juncao_pert_pers_id`) REFERENCES `juncao_pert_personalidade` (`juncao_pert_pers_id`),
  ADD CONSTRAINT `fk_juncao_perturbacoes_id` FOREIGN KEY (`juncao_perturbacoes_id`) REFERENCES `juncao_perturbacoes` (`juncao_perturbacoes_id`);

--
-- Limitadores para a tabela `conteudo_artigo`
--
ALTER TABLE `conteudo_artigo`
  ADD CONSTRAINT `fk_artigo_id` FOREIGN KEY (`artigo_id`) REFERENCES `artigos` (`artigo_id`);

--
-- Limitadores para a tabela `juncao_perturbacoes`
--
ALTER TABLE `juncao_perturbacoes`
  ADD CONSTRAINT `fk_grupos_perturbacoes_id` FOREIGN KEY (`grupos_perturbacoes_id`) REFERENCES `grupos_perturbacoes` (`grupos_perturbacoes_id`),
  ADD CONSTRAINT `fk_perturbacoes_id` FOREIGN KEY (`perturbacoes_id`) REFERENCES `perturbacoes` (`perturbacoes_id`);

--
-- Limitadores para a tabela `juncao_pert_personalidade`
--
ALTER TABLE `juncao_pert_personalidade`
  ADD CONSTRAINT `FK_grupos_perturbacoes_id2` FOREIGN KEY (`grupos_perturbacoes_id`) REFERENCES `grupos_perturbacoes` (`grupos_perturbacoes_id`),
  ADD CONSTRAINT `FK_perturbacoes_id2` FOREIGN KEY (`perturbacoes_id`) REFERENCES `perturbacoes` (`perturbacoes_id`),
  ADD CONSTRAINT `FK_perturbacoes_personalidade_id` FOREIGN KEY (`perturbacoes_personalidade_id`) REFERENCES `perturbacoes_personalidade` (`perturbacoes_personalidade_id`);

--
-- Limitadores para a tabela `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `fk_quiz_emocao_id` FOREIGN KEY (`quiz_emocao_id`) REFERENCES `quiz_emocao` (`quiz_emocao_id`),
  ADD CONSTRAINT `fk_quiz_empatia_id` FOREIGN KEY (`quiz_empatia_id`) REFERENCES `quiz_empatia` (`quiz_empatia_id`),
  ADD CONSTRAINT `fk_quiz_energia_id` FOREIGN KEY (`quiz_energia_id`) REFERENCES `quiz_energia` (`quiz_energia_id`),
  ADD CONSTRAINT `fk_quiz_preocupacao_id` FOREIGN KEY (`quiz_preocupacao_id`) REFERENCES `quiz_preocupacao` (`quiz_preocupacao_id`),
  ADD CONSTRAINT `fk_utilizador_id` FOREIGN KEY (`utilizador_id`) REFERENCES `utilizadores` (`utilizador_id`);

--
-- Limitadores para a tabela `texto_artigo`
--
ALTER TABLE `texto_artigo`
  ADD CONSTRAINT `fk_conteudo_artigo_id` FOREIGN KEY (`conteudo_artigo_id`) REFERENCES `conteudo_artigo` (`conteudo_artigo_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
