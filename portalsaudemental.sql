-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Maio-2024 às 11:43
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.3.31

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
  `juncao_perturbacoes_id` int(11) DEFAULT NULL,
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

INSERT INTO `artigos` (`artigo_id`, `juncao_perturbacoes_id`, `titulo`, `descricao`, `data_publicacao`, `autor`, `img_artigo`, `conteudo_texto`) VALUES
(1, 1, 'O que é a saúde mental?', 'Estima-se que uma em cada cinco pessoas em Portugal tenha uma doença mental.', '09 de outubro de 2020', 'Sandra Varandas, Bárbara Ferreira e Inês M. Borges', 'https://images.impresa.pt/sicnot/2020-10-02-livro-saude-mental-2/original/mw-720', 'Everybody deals with anxiety als with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietfrom time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n        Everybody deals with anxiety als with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietals with anxietfrom time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n        '),
(2, 2, 'Como está a saúde mental?', 'Pedir ajuda aos amigos, aos familiares, ao médico de família ou ao psicólogo é o grande passo para a recuperação.', '13 de outubro de 2020', 'Sandra Varandas e Bárbara Ferreira', 'https://images.impresa.pt/sicnot/2020-09-27-saude-mental--2-.jpg/original/mw-720', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(3, 3, 'A sociedade está preparada? ', 'A SIC Notícias falou com o psicoterapeuta Pedro Brás sobre o consumo de antidepressivos e ansiolíticos em Portugal.', '11 de outubro de 2020', 'Bárbara Ferreira', 'https://images.impresa.pt/sicnot/2020-10-09-cerebro-1/original/mw-720', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(4, 4, 'Como está a saúde mental das crianças e dos jovens?', 'Vinte por cento das crianças e dos adolescentes têm, pelo menos, uma perturbação mental, de acordo com a Organização Mundial de Saúde.', '10 de outubro de 2020', 'Rita Rogado, Sandra Varandas e Diogo Sentieiro', 'https://images.impresa.pt/sicnot/2020-10-08-Copy-of-Copy-of-Copy-of-Copy-of-Copy-of-Copy-of-Copy-of-Untitled-Design.png/original/mw-720', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(5, 5, 'A sociedade está preparada para lidar com a doença mental?', 'Estima-se que 20% da população portuguesa sofra ou venha a sofrer de uma doença mental.', '10 de outubro de 2020', 'Bárbara Ferreira', 'https://images.impresa.pt/sicnot/2020-10-01-puzzle-saude-mental-7d99260e-1/original/mw-720', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(6, 6, 'Como é a saúde mental?', 'Mais de um quinto dos portugueses tem uma perturbação mental.', '10 de outubro de 2020', 'Rita Rogado', 'https://images.impresa.pt/sicnot/2020-10-10-saude-mental.png/original/mw-720', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(7, 7, 'A vida nunca mais foi a mesma desde aquela noite mental', '\"Quis contar a minha história ao pormenor por vários motivos: não por ser um drama razoavelmente bom, mas porque não quero que outros se sintam sozinhos nesta difícil jornada.\"', '11 de outubro de 2020', 'SIC Notícias', 'https://images.impresa.pt/sicnot/2020-10-10-Saude-mental.jpg/original/mw-720', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(8, 8, 'Uma história, uma caixa azul e um pássaro para falar de saúde mental a crianças e adolescentes ', 'Uma equipa de psicólogos e terapeutas ocupacionais do Hospital de São João visita as escolas da Maia, do Porto e de Valongo para combater preconceitos ligados à saúde mental.', '16 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3878:2585:nowe:0:0/rs:fill:640/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/03/16102359/1-igor-martins-portaabertasaudemental-01-069-1.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(9, 9, 'O que é a terapia de casal? E para que serve?', 'Discussões e diferenças de opinião fazem parte da vida de qualquer casal. Se são difíceis de ultrapassar ou não há boa comunicação, a terapia pode ajudar. A recuperar ou a preparar um final saudável.', '16 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:4096:2731:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/03/08152454/gettyimages-1204607778-scaled.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(10, 10, 'Este coro ajuda a tratar a doença ', 'No Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:2000:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/02/19174904/igor-martins-hospitalmagalhaeslemos-16-025.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(11, 11, 'coro ajuda a tratar a doença ', 'No Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:2000:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/02/19174904/igor-martins-hospitalmagalhaeslemos-16-025.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(12, 12, 'ajuda a tratar a doença ', 'No Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:2000:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/02/19174904/igor-martins-hospitalmagalhaeslemos-16-025.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(13, 13, 'Este coro a', 'No Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:2000:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/02/19174904/igor-martins-hospitalmagalhaeslemos-16-025.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(14, 14, 'Este coro aju ', 'No Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:2000:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/02/19174904/igor-martins-hospitalmagalhaeslemos-16-025.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(15, 15, 'Este coro ajunça ', 'No Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:2000:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/02/19174904/igor-martins-hospitalmagalhaeslemos-16-025.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(16, 16, 'Este a tratar a doença ', 'No Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:2000:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/02/19174904/igor-martins-hospitalmagalhaeslemos-16-025.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(17, 17, 'Este ', 'No Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:2000:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/02/19174904/igor-martins-hospitalmagalhaeslemos-16-025.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(18, 18, 'Este coro ajud', 'No Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:2000:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/02/19174904/igor-martins-hospitalmagalhaeslemos-16-025.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(19, 18, 'Testetesteteste', 'TNo Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:2000:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/02/19174904/igor-martins-hospitalmagalhaeslemos-16-025.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(20, 1, 'TesteEQEQEQ', 'TNo Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://images.impresa.pt/sicnot/2020-09-27-saude-mental--2-.jpg/original/mw-720', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(21, 2, 'plplpl', 'TNo Hospital de Magalhães Lemos, no Porto, há um grupo coral de pessoas com esquizofrenia, depressão e psicoses que encontra na música uma terapia complementar para lidar com a doença mental.', '2 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:2000:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/02/19174904/igor-martins-hospitalmagalhaeslemos-16-025.jpg', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness\r\n                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable\r\n                            anxiety disorder.\r\n\r\n                            If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety,\r\n                            know that you are not alone. The National Institutes of Mental Health estimate that nearly\r\n                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1\r\n                            Any Anxiety Disorder, National Institutes of Mental Health\r\n\r\n                            Since anxiety is a common mental health condition (and is a condition that can be\r\n                            debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety\r\n                            screening.2\r\n\r\n                  '),
(37, 22, 'teste', 'teste', 'teste', 'teste', 'teste', 'teste'),
(38, 22, 'testeteste', 'testeteste', 'testeteste', 'testeteste', 'teste2.png', 'testeteste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudo_artigo`
--

CREATE TABLE `conteudo_artigo` (
  `conteudo_artigo_id` int(11) NOT NULL,
  `artigo_id` int(11) NOT NULL,
  `ponto` varchar(255) DEFAULT NULL,
  `texto` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `conteudo_artigo`
--

INSERT INTO `conteudo_artigo` (`conteudo_artigo_id`, `artigo_id`, `ponto`, `texto`) VALUES
(1, 1, 'Introdução', '1 Generalized anxiety disorder (GAD) is a specific type of anxiety disorder. Most people worry at times about'),
(2, 1, 'Desenvolvimento', '2 Generalized anxiety disorder (GAD) is a specific type of anxiety disorder. Most people worry at times about'),
(3, 1, 'Conclusão', '3 Generalized anxiety disorder (GAD) is a specific type of anxiety disorder. Most people worry at times about'),
(4, 2, 'Conteúdo', '1 Generalized anxiety disorder (GAD) is a specific type of anxiety disorder. Most people worry at times about'),
(9, 37, 'teste1', 'teste1'),
(10, 37, 'teste3', 'teste3'),
(11, 37, 'teste2', 'teste2'),
(12, 38, 'testeteste', 'testeteste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudo_noticia`
--

CREATE TABLE `conteudo_noticia` (
  `conteudo_noticia_id` int(11) NOT NULL,
  `noticias_id` int(11) NOT NULL,
  `ponto` varchar(255) NOT NULL,
  `texto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `conteudo_noticia`
--

INSERT INTO `conteudo_noticia` (`conteudo_noticia_id`, `noticias_id`, `ponto`, `texto`) VALUES
(1, 1, 'ee', 'aaa'),
(5, 10, 'teste4', 'teste4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicios_mindfulness`
--

CREATE TABLE `exercicios_mindfulness` (
  `exercicios_mindfulness_id` int(11) NOT NULL,
  `nome` varchar(1000) NOT NULL,
  `banner` mediumtext NOT NULL,
  `definicao` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `exercicios_mindfulness`
--

INSERT INTO `exercicios_mindfulness` (`exercicios_mindfulness_id`, `nome`, `banner`, `definicao`) VALUES
(1, 'Atividades de Relaxamento', 'https://i.ibb.co/4FDYwt9/relaxamento.png', 'Mindfulness é definida como uma forma específica de atenção plena – concentração no momento atual, intencional, e sem julgamento. Significa estar plenamente em contato com a vivência do momento, sem estar absorvido por elaMindfulness é definida como uma forma específica de atenção plena – concentração no momento atual, intencional, e sem julgamento. Significa estar plenamente em contato com a vivência do momento, sem estar absorvido por ela\r\n\r\n\r\n\r\n\r\n'),
(2, 'Atividades de Bem-estar', 'https://i.ibb.co/zRH5m9C/bem-estar.png', 'Mindfulness é definida como uma forma específica de atenção plena – concentração no momento atual, intencional, e sem julgamento. Significa estar plenamente em contato com a vivência do momento, sem estar absorvido por elaMindfulness é definida como uma forma específica de atenção plena – concentração no momento atual, intencional, e sem julgamento. Significa estar plenamente em contato com a vivência do momento, sem estar absorvido por ela\r\n\r\n\r\n\r\n\r\n'),
(3, 'Atividades de Yoga', 'https://i.ibb.co/gSH4dYj/yoga.png', 'Mindfulness é definida como uma forma específica de atenção plena – concentração no momento atual, intencional, e sem julgamento. Significa estar plenamente em contato com a vivência do momento, sem estar absorvido por elaMindfulness é definida como uma forma específica de atenção plena – concentração no momento atual, intencional, e sem julgamento. Significa estar plenamente em contato com a vivência do momento, sem estar absorvido por ela\r\n\r\n\r\n\r\n\r\n'),
(4, 'Atividades de Alogamento', 'https://i.ibb.co/KXJ2dcb/alongamento.png', 'Mindfulness é definida como uma forma específica de atenção plena – concentração no momento atual, intencional, e sem julgamento. Significa estar plenamente em contato com a vivência do momento, sem estar absorvido por elaMindfulness é definida como uma forma específica de atenção plena – concentração no momento atual, intencional, e sem julgamento. Significa estar plenamente em contato com a vivência do momento, sem estar absorvido por ela\r\n\r\n\r\n\r\n\r\n'),
(7, 'teste2', 'teste2', 'teste2'),
(8, 'testeee', 'testeee', 'testeee'),
(9, 'teste3', 'teste3', 'teste3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicios_mindfulness_ex`
--

CREATE TABLE `exercicios_mindfulness_ex` (
  `exercicios_mindfulness_ex_id` int(11) NOT NULL,
  `exercicios_mindfulness_id` int(11) NOT NULL,
  `titulo` varchar(1000) DEFAULT NULL,
  `img` mediumtext DEFAULT NULL,
  `audio` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `exercicios_mindfulness_ex`
--

INSERT INTO `exercicios_mindfulness_ex` (`exercicios_mindfulness_ex_id`, `exercicios_mindfulness_id`, `titulo`, `img`, `audio`) VALUES
(1, 4, 'Rodar a cabeça', 'https://media.post.rvohealth.io/wp-content/uploads/sites/2/2021/01/GRT-2.03.HeadRolls.gif', ''),
(2, 4, 'Rodar os ombros', 'https://media.post.rvohealth.io/wp-content/uploads/sites/2/2021/10/GRT-03.04.ShoulderRoll.gif', ''),
(3, 4, 'Alongamento de braços e abdominais', 'https://media.post.rvohealth.io/wp-content/uploads/sites/2/2021/12/GRT-04.02.ArmsAndAbsStretch.gif', ''),
(4, 3, 'Gato-Vaca (Marjaryasana-Bitilasana)', 'https://cdn.yogajournal.com/wp-content/uploads/2022/06/Childs-Pose_Andrew-Clark.jpg?width=730', ''),
(5, 3, 'Posição de criança (Balasana)', 'https://cdn.yogajournal.com/wp-content/uploads/2021/11/Downward-Facing-Dog-Pose-Mod-1_Andrew-Clark_1.jpg?width=730', ''),
(6, 3, 'Posição de montanha (Tadasana)', 'https://cdn.yogajournal.com/wp-content/uploads/2021/11/Chair-Pose_Andrew-Clark.jpg?width=730', ''),
(7, 2, 'Ver um filme ou série', 'https://i.ibb.co/ZYPHszF/teste2.png', ''),
(8, 2, 'Assistir/acompanhar algum desporto', 'https://i.ibb.co/ZYPHszF/teste2.png', ''),
(9, 1, 'Mindfulness – Atenção à Respiração', '', ''),
(10, 1, 'Mindfulness – Body Scan', '', ''),
(11, 1, 'Mindfulness – Explorar Sensações e Pensamentos Difíceis', '', ''),
(12, 1, 'Relaxamento Muscular Progressivo', '', ''),
(13, 1, 'Respiração Diafragmática', '', ''),
(14, 7, 'teste2', 'teste2', ''),
(24, 9, 'teste3', 'teste3', ''),
(25, 8, 'testeee', 'testeee', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `factos_10`
--

CREATE TABLE `factos_10` (
  `10_factos_id` int(11) NOT NULL,
  `perturbacoes_id` int(11) NOT NULL,
  `nº` int(11) NOT NULL,
  `factos` text NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `factos_10`
--

INSERT INTO `factos_10` (`10_factos_id`, `perturbacoes_id`, `nº`, `factos`, `descricao`) VALUES
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
-- Estrutura da tabela `grupos_perturbacoes`
--

CREATE TABLE `grupos_perturbacoes` (
  `grupos_perturbacoes_id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `texto` mediumtext NOT NULL,
  `sintomas_texto` mediumtext DEFAULT NULL,
  `prevalencias_texto` mediumtext DEFAULT NULL,
  `ajuda_texto` mediumtext DEFAULT NULL
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
(14, 'Grupo A', 'teste', NULL, NULL, NULL),
(15, 'Grupo B', 'teste', NULL, NULL, NULL),
(16, 'Grupo C', 'teste', NULL, NULL, NULL),
(17, 'Perturbação de Stress Pós-Traumático', 'teste', 'teste', 'teste', 'teste'),
(18, 'Perturbação de Ajustamento', 'teste', 'teste', 'teste', 'teste'),
(20, 'testegrupo', 'testegrupo', 'testegrupo', 'testegrupo', 'testegrupo');

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
(18, 7, 18),
(22, 9, 20),
(23, 6, 20);

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
(10, 10, 16, 6),
(15, 11, 20, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lembrete`
--

CREATE TABLE `lembrete` (
  `lembrete_id` int(11) NOT NULL,
  `utilizador_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `mensagem` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(25, 1703689423, 1703689628, 'também, obg por perguntares'),
(26, 1035944128, 1703689423, 'ol'),
(27, 1035944128, 1703689423, 'ola');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `noticias_id` int(11) NOT NULL,
  `titulo` varchar(1000) NOT NULL,
  `data_publicacao` varchar(1000) NOT NULL,
  `autor` varchar(1000) NOT NULL,
  `img_noticia` mediumtext NOT NULL,
  `conteudo_texto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`noticias_id`, `titulo`, `data_publicacao`, `autor`, `img_noticia`, `conteudo_texto`) VALUES
(1, 'Dar uma casa a doentes mentais que vivem na rua', '13 de abril de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:2500:1667:nowe:0:0/rs:fill:1440/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/04/11124230/154a2870.jpg', 'testetestetestetestetestetestetestetestetesteteste'),
(2, 'O que são perturbações da personalidade?', '20 de abril de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:2302:1302:nowe:0:0/rs:fill:560/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/04/19202213/istock-1125680650.jpg', 'testetestetestetestetestetestetestetestetesteteste'),
(3, 'O projeto que ajuda a prevenir o suicídio juvenil', '30 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:1683:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/03/29192448/sa-contigo-a9a06604-27-03-2024.jpg', 'testetestetestetestetestetestetestetestetesteteste'),
(4, 'O projeto que ajuda o suicídio juvenil', '30 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:2121:1414:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/03/22132437/istock-1491758415.jpg', 'testetestetestetestetestetestetestetestetesteteste'),
(5, 'O po que ajuda o suicídio juvenil', '30 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:4096:2731:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/03/08152454/gettyimages-1204607778-scaled.jpg', 'testetestetestetestetestetestetestetestetesteteste'),
(6, 'O po que ajuda o juvenil', '30 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:1683:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/03/29192448/sa-contigo-a9a06604-27-03-2024.jpg', 'testetestetestetestetestetestetestetestetesteteste'),
(7, 'O po que o juvenil', '30 de março de 2024', 'Observador', 'https://bordalo.observador.pt/v2/q:84/c:3000:1683:nowe:0:0/rs:fill:300/f:webp/plain/https://s3.observador.pt/wp-content/uploads/2024/03/29192448/sa-contigo-a9a06604-27-03-2024.jpg', 'testetestetestetestetestetestetestetestetesteteste'),
(10, 'teste3', 'teste3', 'teste3', 'teste2.png', 'teste3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `perguntas_id` int(11) NOT NULL,
  `pergunta` varchar(1000) NOT NULL,
  `resposta` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`perguntas_id`, `pergunta`, `resposta`) VALUES
(1, 'Pergunta 1', 'Resposta à pergunta 1'),
(2, 'Pergunta 2', 'Resposta à pergunta 2'),
(3, 'Pergunta 3', 'Resposta à pergunta 3'),
(4, 'teste', 'teste'),
(5, 'teste2', 'teste2'),
(6, 'teste3', 'teste3'),
(7, 'teste4', 'teste4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perturbacoes`
--

CREATE TABLE `perturbacoes` (
  `perturbacoes_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `texto` mediumtext NOT NULL,
  `img_perturbacao` mediumtext DEFAULT NULL,
  `img_perturbacao_circ` mediumtext DEFAULT NULL,
  `banner_perturbacao` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perturbacoes`
--

INSERT INTO `perturbacoes` (`perturbacoes_id`, `nome`, `texto`, `img_perturbacao`, `img_perturbacao_circ`, `banner_perturbacao`) VALUES
(1, 'Perturbações de Ansiedade', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety, know that you are not alone. The National Institutes of Mental Health estimate that nearly one-third of US adults will deal with an anxiety disorder at some point in their lives.1 Any Anxiety Disorder, National Institutes of Mental Health Since anxiety is a common mental health condition (and is a condition that can be debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety screening.2 Treatment options like therapy, medication, self-care strategies, and lifestyle changes can help you manage your anxiety and help you live your best life at home, at work, and in your relationships.\n\nwith anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety, know that you are not alone. The National Institutes of Mental Health estimate that nearly one-third of US adults will deal with an anxiety disorder at some point in their lives.1 Any Anxiety Disorder, National Institutes of Mental Health Since anxiety is a common mental health condition (and is a condition that can be debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety screening.2 Treatment options like therapy, medication, self-care strategies, and lifestyle changes can help you manage your anxiety and help you live your best life at home, at work, and in your relationships.\n\n', 'https://i.ibb.co/dc26MBN/pert-ansie.png', 'https://i.ibb.co/pWP0R34/pert-ansie-circle.png', 'https://images.unsplash.com/photo-1607214368910-d7b795724be4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(2, 'Perturbações do Sono - Vigília', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'https://i.ibb.co/tBQHpFF/pert-sono.png', 'https://i.ibb.co/CJDnQW2/pert-sono-circle.png', 'https://images.unsplash.com/photo-1712955685153-1b9c8edd071f?q=80&w=1403&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(3, 'Perturbações de Humor', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'https://i.ibb.co/3dMTsNb/pert-humor.png', 'https://i.ibb.co/3r3SSyx/pert-humor-circle.png', 'https://images.unsplash.com/photo-1607214368910-d7b795724be4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(4, 'Perturbações Alimentares', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'https://i.ibb.co/Mp1bqy7/pert-aliment.png', 'https://i.ibb.co/2djRPxt/pert-aliment-circle.png', 'https://images.unsplash.com/photo-1607214368910-d7b795724be4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(5, 'Perturbações Obsessivo-Compulsivas', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'https://i.ibb.co/s2gQVVf/pert-obscomp.png', NULL, 'https://images.unsplash.com/photo-1607214368910-d7b795724be4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(6, 'Perturbações de Personalidade', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'https://i.ibb.co/4NyWkFy/pert-perso.png', NULL, 'https://images.unsplash.com/photo-1607214368910-d7b795724be4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(7, 'Perturbações relacionadas com Trauma e Fatores de stress', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'https://i.ibb.co/wpVRfkR/pert-stress.png', NULL, 'https://images.unsplash.com/photo-1607214368910-d7b795724be4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(9, 'teste', 'teste', 'teste', NULL, 'teste');

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
(10, 'Perturbação Obsessivo-Compulsiva da Personalidade', 'teste', 'teste', 'teste', 'teste'),
(11, 'teste', 'teste', 'teste', 'teste', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `quizzes`
--

CREATE TABLE `quizzes` (
  `quiz_id` int(11) NOT NULL,
  `utilizador_id` int(11) NOT NULL,
  `quiz_nome_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `quizzes`
--

INSERT INTO `quizzes` (`quiz_id`, `utilizador_id`, `quiz_nome_id`) VALUES
(88, 18, 1),
(93, 18, 1),
(94, 18, 1),
(95, 18, 2),
(96, 18, 1),
(97, 18, 1),
(98, 18, 2),
(99, 18, 3),
(100, 18, 2),
(101, 18, 4),
(102, 18, 4),
(103, 18, 4),
(104, 18, 4),
(105, 18, 4),
(106, 18, 4),
(107, 18, 4),
(108, 18, 4),
(109, 18, 4),
(110, 18, 4),
(111, 18, 4),
(112, 18, 4),
(113, 18, 4),
(114, 18, 4),
(115, 18, 4),
(116, 18, 4),
(117, 18, 4),
(118, 18, 4),
(119, 18, 4),
(120, 18, 4),
(121, 18, 4),
(122, 18, 4),
(123, 18, 4),
(124, 18, 4),
(125, 18, 4),
(126, 18, 4),
(127, 18, 4),
(128, 18, 4),
(129, 18, 4),
(130, 18, 4),
(131, 18, 4),
(132, 18, 4),
(133, 18, 4),
(134, 18, 4),
(135, 18, 4),
(136, 18, 4),
(137, 18, 4),
(138, 18, 4),
(139, 18, 4),
(140, 18, 4),
(141, 18, 4),
(142, 18, 4),
(143, 18, 4),
(144, 18, 4),
(145, 18, 4),
(146, 18, 4),
(147, 18, 4),
(148, 18, 4),
(149, 18, 4),
(150, 18, 4),
(151, 18, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quiz_nome`
--

CREATE TABLE `quiz_nome` (
  `quiz_nome_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `img_quiz` mediumtext NOT NULL,
  `explicacao_quiz` varchar(1000) NOT NULL,
  `texto_informacao` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `quiz_nome`
--

INSERT INTO `quiz_nome` (`quiz_nome_id`, `nome`, `img_quiz`, `explicacao_quiz`, `texto_informacao`) VALUES
(1, 'O quão empática/o és?', 'https://i.ibb.co/ChyjGkG/empatia.png', 'É uma pessoa empática? Já lhe disseram que é “muito sensível” ou precisa de se fortalecer? Sente-se exausto e ansioso depois de estar no meio de uma multidão ou perto de certas pessoas? Tem sensibilidade à luz, som e cheiros? Demora mais a relaxar depois de um longo dia de trabalho?', 'Nas pessoas empáticas, acredita-se que o sistema de neurônios-espelho do cérebro – um grupo especializado de células responsáveis ​​pela compaixão – seja hiperativo. Como resultado, as pessoas empáticas podem absorver as energias de outras pessoas (positivas e negativas) nos seus próprios corpos. Às vezes pode até ser difícil saber se estamos a sentir as próprias emoções ou as de outra pessoa. Existem diferentes tipos de sensibilidades que as pessoas empáticas podem experimentar. As pessoas empáticas físicas, por exemplo, estão especialmente sintonizados com os sintomas físicos de outras pessoas e absorvem-nos nos seus próprios corpos. as pessoas empáticas emocionais captam as emoções das pessoas e tornam-se uma esponja para os seus sentimentos. As pessoas empáticas alimentares estão sintonizadas com a energia dos alimentos e podem até sentir sensibilidade a certos alimentos. Ter empatia traz benefícios, como maior intuição, compaixão, criatividade e uma conexão mais profunda com outra'),
(2, 'O quão preocupada/o és?', 'https://i.ibb.co/FBKQ2H2/preocupado.png', 'Our world is in the midst of an emotional meltdown. As a psychiatrist, I’ve seen that many people are addicted to the adrenaline rush of anxiety, known as the “fight or flight” response, and they don’t know how to defuse it. An example of this is obsessively watching the news about natural disasters, trauma, economic stress and violence, and then not being able to turn bad news off. Also, people are prone to “techno-despair” — a term I coined in my book, “Emotional Freedom.” This is a state of high anxiety that results from information overload and Internet addiction. Being addicted to worry can lead to insomnia, nightmares, restless sleep and ongoing angst. Take this quiz to determine the role that worry is playing in your life.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. In metus vulputate eu scelerisque. Libero id faucibus nisl tincidunt eget nullam non. At elementum eu facilisis sed odio morbi. Et malesuada fames ac turpis. At imperdiet dui accumsan sit. Quisque id diam vel quam. Vitae congue eu consequat ac felis donec et odio pellentesque. Enim lobortis scelerisque fermentum dui faucibus in ornare quam viverra. Tristique senectus et netus et malesuada fames. Diam quam nulla porttitor massa. Consectetur lorem donec massa sapien faucibus. Nisi est sit amet facilisis magna etiam tempor. Aliquam faucibus purus in massa tempor nec feugiat nisl pretium. Dictum fusce ut placerat orci nulla pellentesque dignissim enim. Venenatis urna cursus eget nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore m'),
(3, 'Tens uma energia positiva', 'https://i.ibb.co/420s44t/energia.png', 'Relationships are always an energy exchange. Positive attitudes accentuate wellness. Negative attitudes impair it. Take this quiz to determine your positivity score and the energy impact you have on yourself and others.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. In metus vulputate eu scelerisque. Libero id faucibus nisl tincidunt eget nullam non. At elementum eu facilisis sed odio morbi. Et malesuada fames ac turpis. At imperdiet dui accumsan sit. Quisque id diam vel quam. Vitae congue eu consequat ac felis donec et odio pellentesque. Enim lobortis scelerisque fermentum dui faucibus in ornare quam viverra. Tristique senectus et netus et malesuada fames. Diam quam nulla porttitor massa. Consectetur lorem donec massa sapien faucibus. Nisi est sit amet facilisis magna etiam tempor. Aliquam faucibus purus in massa tempor nec feugiat nisl pretium. Dictum fusce ut placerat orci nulla pellentesque dignissim enim. Venenatis urna cursus eget nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore m'),
(4, 'O quão livre és, emocionalmente?', 'https://i.ibb.co/wwcwfh2/livre.png', 'É capaz de cultivar emoções positivas e compaixão sem que os pensamentos negativos dominem a sua vida?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. In metus vulputate eu scelerisque. Libero id faucibus nisl tincidunt eget nullam non. At elementum eu facilisis sed odio morbi. Et malesuada fames ac turpis. At imperdiet dui accumsan sit. Quisque id diam vel quam. Vitae congue eu consequat ac felis donec et odio pellentesque. Enim lobortis scelerisque fermentum dui faucibus in ornare quam viverra. Tristique senectus et netus et malesuada fames. Diam quam nulla porttitor massa. Consectetur lorem donec massa sapien faucibus. Nisi est sit amet facilisis magna etiam tempor. Aliquam faucibus purus in massa tempor nec feugiat nisl pretium. Dictum fusce ut placerat orci nulla pellentesque dignissim enim. Venenatis urna cursus eget nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore m'),
(10, 'teste3', 'Captura de ecrã 2024-05-08 111416.png', 'teste3', 'teste3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `quiz_questoes`
--

CREATE TABLE `quiz_questoes` (
  `quiz_questoes_id` int(11) NOT NULL,
  `quiz_nome_id` int(11) NOT NULL,
  `questao` varchar(1000) NOT NULL,
  `opcao_a` text NOT NULL,
  `opcao_b` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `quiz_questoes`
--

INSERT INTO `quiz_questoes` (`quiz_questoes_id`, `quiz_nome_id`, `questao`, `opcao_a`, `opcao_b`) VALUES
(1, 2, 'Preocupo-me com muitas coisas todos os dias', 'Sim', 'Nao'),
(2, 2, 'Fico frequentemente sobrecarregado ou ansioso', 'Sim', 'Nao'),
(3, 1, 'Fui rotulado como excessivamente sensivel, timido ou introvertido', 'Sim', 'Nao'),
(4, 2, 'Emanas um sentimento de apoio e compaixão pelos outros?', 'Sim', 'Não'),
(7, 10, 'teste3', 'Sim', 'Não');

-- --------------------------------------------------------

--
-- Estrutura da tabela `quiz_respostas`
--

CREATE TABLE `quiz_respostas` (
  `quiz_respostas_id` int(11) NOT NULL,
  `quiz_nome_id` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `respostas` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `quiz_respostas`
--

INSERT INTO `quiz_respostas` (`quiz_respostas_id`, `quiz_nome_id`, `qtd`, `respostas`) VALUES
(1, 1, 1, 'És uma pessoa parcialmente empática'),
(2, 1, 2, 'És uma pessoa com tendências empáticas moderadas'),
(3, 1, 3, 'És uma pessoa com tendências empáticas fortes'),
(4, 1, 4, 'És uma pessoa com mesmo muita empatia'),
(5, 2, 1, 'teste1'),
(6, 2, 2, 'teste2'),
(9, 10, 1, 'teste3teste3teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registos`
--

CREATE TABLE `registos` (
  `registos_id` int(11) NOT NULL,
  `utilizador_id` int(11) NOT NULL,
  `pensamento` varchar(1000) DEFAULT NULL,
  `comportamento` varchar(1000) DEFAULT NULL,
  `sentimentos` varchar(1000) DEFAULT NULL,
  `quando` varchar(1000) DEFAULT NULL,
  `pensamento_alternativo` varchar(1000) DEFAULT NULL,
  `comportamento_alternativo` varchar(1000) DEFAULT NULL,
  `nota` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `registos`
--

INSERT INTO `registos` (`registos_id`, `utilizador_id`, `pensamento`, `comportamento`, `sentimentos`, `quando`, `pensamento_alternativo`, `comportamento_alternativo`, `nota`) VALUES
(28, 26, 'teste', 'teste', 'teste', 'teste', 'teste', 'teste', NULL),
(29, 18, 'teste', 'teste', 'teste', 'teste', 'teste', 'teste2', NULL),
(30, 18, 'testeteste', 'testeteste', 'testeteste', 'testeteste', 'testeteste', 'testeteste', NULL),
(31, 18, 'testetesteteste', 'testetesteteste', 'testetesteteste', 'testetesteteste', 'testetesteteste', 'testetesteteste', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ted_talks`
--

CREATE TABLE `ted_talks` (
  `ted_talks_id` int(11) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `tempo` varchar(255) NOT NULL,
  `img_ted_talks` mediumtext NOT NULL,
  `link` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ted_talks`
--

INSERT INTO `ted_talks` (`ted_talks_id`, `autor`, `titulo`, `data`, `tempo`, `img_ted_talks`, `link`) VALUES
(1, 'Andrew Solomon', 'Depression, the secret we share', 'Outubro 2013', '29:07 min', 'https://pi.tedcdn.com/r/talkstar-photos.s3.amazonaws.com/uploads/511d507d-746c-4db3-8992-f01d802ca695/AndrewSolomon_2013X-embed.jpg?u%5Br%5D=2&u%5Bs%5D=0.5&u%5Ba%5D=0.8&u%5Bt%5D=0.03&quality=80&w=640', 'https://www.ted.com/talks/andrew_solomon_depression_the_secret_we_share?referrer=playlist-the_struggle_of_mental_health&autoplay=true'),
(2, 'Kevin Breel', 'Confessions of a depressed comic', 'Maio 2013', '10:46 min', 'https://pi.tedcdn.com/r/talkstar-photos.s3.amazonaws.com/uploads/0db75cad-bcb2-4e5e-8922-93fc63160e7e/KevinBreel_2013X-embed.jpg?u%5Br%5D=2&u%5Bs%5D=0.5&u%5Ba%5D=0.8&u%5Bt%5D=0.03&quality=80&w=640', 'https://www.ted.com/talks/kevin_breel_confessions_of_a_depressed_comic?referrer=playlist-the_struggle_of_mental_health&autoplay=true'),
(3, 'Mariano Sigman', 'Your words may predict your future mental health', 'Fevereiro 2016', '12:04 min', 'https://pi.tedcdn.com/r/talkstar-photos.s3.amazonaws.com/uploads/27207208-0909-4f78-b182-31cb0100898f/MarianoSigman_2016-embed.jpg?h=200', 'https://www.ted.com/talks/mariano_sigman_your_words_may_predict_your_future_mental_health'),
(4, 'Hailey Hardcastle', 'Why students should have mental health days', 'Janeiro 2020', '07:15 min', 'https://pi.tedcdn.com/r/talkstar-photos.s3.amazonaws.com/uploads/8e62b9ec-121d-4c8d-abcc-1613b9c4cff3/HaileyHardcastle_2020X-embed.jpg?h=200', 'https://www.ted.com/talks/hailey_hardcastle_why_students_should_have_mental_health_days');

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
(18, 1703689423, 'João', 'teste@gmail.com', '$2y$10$c9VNDLhd/qGIVewjjY63.OPp7RPHuxseY2ZbFO9xwDIyv7L4z6qgK', 1, 'user.png', 0, '2024-03-11 15:13:13'),
(26, 1703689628, 'Fernando', 'teste2@gmail.com', '$2y$10$yAkDfepI6ubbkl0tHBluPOO6FOdJ6N6ODgi0/JZp8GZ6IwUfFrgzu', 3, 'user.png', 0, '2024-03-12 10:26:14'),
(27, 1035944128, 'Miguel', 'teste3@gmail.com', '$2y$10$i2zHS8WBb0bgvZDzkSgE7./3LGOfUa2lGKJjhli9sOEmzlCk8fwRu', 1, 'pin booking.jpg', 0, '2024-03-12 16:38:55');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `artigos`
--
ALTER TABLE `artigos`
  ADD PRIMARY KEY (`artigo_id`),
  ADD KEY `fk_juncao_perturbacoes_id` (`juncao_perturbacoes_id`);

--
-- Índices para tabela `conteudo_artigo`
--
ALTER TABLE `conteudo_artigo`
  ADD PRIMARY KEY (`conteudo_artigo_id`),
  ADD KEY `fk_artigo_id` (`artigo_id`);

--
-- Índices para tabela `conteudo_noticia`
--
ALTER TABLE `conteudo_noticia`
  ADD PRIMARY KEY (`conteudo_noticia_id`),
  ADD KEY `FK_noticias_id` (`noticias_id`);

--
-- Índices para tabela `exercicios_mindfulness`
--
ALTER TABLE `exercicios_mindfulness`
  ADD PRIMARY KEY (`exercicios_mindfulness_id`);

--
-- Índices para tabela `exercicios_mindfulness_ex`
--
ALTER TABLE `exercicios_mindfulness_ex`
  ADD PRIMARY KEY (`exercicios_mindfulness_ex_id`),
  ADD KEY `FK_exercicios_mindfulness_id` (`exercicios_mindfulness_id`);

--
-- Índices para tabela `factos_10`
--
ALTER TABLE `factos_10`
  ADD PRIMARY KEY (`10_factos_id`),
  ADD KEY `fk_perturbacoes_id_factos` (`perturbacoes_id`);

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
-- Índices para tabela `lembrete`
--
ALTER TABLE `lembrete`
  ADD PRIMARY KEY (`lembrete_id`),
  ADD KEY `FK_utilizador_id3` (`utilizador_id`);

--
-- Índices para tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`msg_id`);

--
-- Índices para tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`noticias_id`);

--
-- Índices para tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`perguntas_id`);

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
  ADD KEY `FK_quiz_nome_id` (`quiz_nome_id`);

--
-- Índices para tabela `quiz_nome`
--
ALTER TABLE `quiz_nome`
  ADD PRIMARY KEY (`quiz_nome_id`);

--
-- Índices para tabela `quiz_questoes`
--
ALTER TABLE `quiz_questoes`
  ADD PRIMARY KEY (`quiz_questoes_id`),
  ADD KEY `FK_quiz_questao` (`quiz_nome_id`);

--
-- Índices para tabela `quiz_respostas`
--
ALTER TABLE `quiz_respostas`
  ADD PRIMARY KEY (`quiz_respostas_id`),
  ADD KEY `FK_quiz_nome_id2` (`quiz_nome_id`);

--
-- Índices para tabela `registos`
--
ALTER TABLE `registos`
  ADD PRIMARY KEY (`registos_id`),
  ADD KEY `FK_utilizador_id2` (`utilizador_id`);

--
-- Índices para tabela `ted_talks`
--
ALTER TABLE `ted_talks`
  ADD PRIMARY KEY (`ted_talks_id`);

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
  MODIFY `artigo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `conteudo_artigo`
--
ALTER TABLE `conteudo_artigo`
  MODIFY `conteudo_artigo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `conteudo_noticia`
--
ALTER TABLE `conteudo_noticia`
  MODIFY `conteudo_noticia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `exercicios_mindfulness`
--
ALTER TABLE `exercicios_mindfulness`
  MODIFY `exercicios_mindfulness_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `exercicios_mindfulness_ex`
--
ALTER TABLE `exercicios_mindfulness_ex`
  MODIFY `exercicios_mindfulness_ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `factos_10`
--
ALTER TABLE `factos_10`
  MODIFY `10_factos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `grupos_perturbacoes`
--
ALTER TABLE `grupos_perturbacoes`
  MODIFY `grupos_perturbacoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `juncao_perturbacoes`
--
ALTER TABLE `juncao_perturbacoes`
  MODIFY `juncao_perturbacoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `juncao_pert_personalidade`
--
ALTER TABLE `juncao_pert_personalidade`
  MODIFY `juncao_pert_pers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `lembrete`
--
ALTER TABLE `lembrete`
  MODIFY `lembrete_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `noticias_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `perguntas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `perturbacoes`
--
ALTER TABLE `perturbacoes`
  MODIFY `perturbacoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `perturbacoes_personalidade`
--
ALTER TABLE `perturbacoes_personalidade`
  MODIFY `perturbacoes_personalidade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT de tabela `quiz_nome`
--
ALTER TABLE `quiz_nome`
  MODIFY `quiz_nome_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `quiz_questoes`
--
ALTER TABLE `quiz_questoes`
  MODIFY `quiz_questoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `quiz_respostas`
--
ALTER TABLE `quiz_respostas`
  MODIFY `quiz_respostas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `registos`
--
ALTER TABLE `registos`
  MODIFY `registos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `ted_talks`
--
ALTER TABLE `ted_talks`
  MODIFY `ted_talks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `utilizador_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `artigos`
--
ALTER TABLE `artigos`
  ADD CONSTRAINT `fk_juncao_perturbacoes_id` FOREIGN KEY (`juncao_perturbacoes_id`) REFERENCES `juncao_perturbacoes` (`juncao_perturbacoes_id`);

--
-- Limitadores para a tabela `conteudo_artigo`
--
ALTER TABLE `conteudo_artigo`
  ADD CONSTRAINT `fk_artigo_id` FOREIGN KEY (`artigo_id`) REFERENCES `artigos` (`artigo_id`);

--
-- Limitadores para a tabela `conteudo_noticia`
--
ALTER TABLE `conteudo_noticia`
  ADD CONSTRAINT `FK_noticias_id` FOREIGN KEY (`noticias_id`) REFERENCES `noticias` (`noticias_id`);

--
-- Limitadores para a tabela `exercicios_mindfulness_ex`
--
ALTER TABLE `exercicios_mindfulness_ex`
  ADD CONSTRAINT `FK_exercicios_mindfulness_id` FOREIGN KEY (`exercicios_mindfulness_id`) REFERENCES `exercicios_mindfulness` (`exercicios_mindfulness_id`);

--
-- Limitadores para a tabela `factos_10`
--
ALTER TABLE `factos_10`
  ADD CONSTRAINT `fk_perturbacoes_id_factos` FOREIGN KEY (`perturbacoes_id`) REFERENCES `perturbacoes` (`perturbacoes_id`);

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
-- Limitadores para a tabela `lembrete`
--
ALTER TABLE `lembrete`
  ADD CONSTRAINT `FK_utilizador_id3` FOREIGN KEY (`utilizador_id`) REFERENCES `utilizadores` (`utilizador_id`);

--
-- Limitadores para a tabela `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `FK_quiz_nome_id` FOREIGN KEY (`quiz_nome_id`) REFERENCES `quiz_nome` (`quiz_nome_id`),
  ADD CONSTRAINT `fk_utilizador_id` FOREIGN KEY (`utilizador_id`) REFERENCES `utilizadores` (`utilizador_id`);

--
-- Limitadores para a tabela `quiz_questoes`
--
ALTER TABLE `quiz_questoes`
  ADD CONSTRAINT `FK_quiz_questao` FOREIGN KEY (`quiz_nome_id`) REFERENCES `quiz_nome` (`quiz_nome_id`);

--
-- Limitadores para a tabela `quiz_respostas`
--
ALTER TABLE `quiz_respostas`
  ADD CONSTRAINT `FK_quiz_nome_id2` FOREIGN KEY (`quiz_nome_id`) REFERENCES `quiz_nome` (`quiz_nome_id`);

--
-- Limitadores para a tabela `registos`
--
ALTER TABLE `registos`
  ADD CONSTRAINT `FK_utilizador_id2` FOREIGN KEY (`utilizador_id`) REFERENCES `utilizadores` (`utilizador_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
