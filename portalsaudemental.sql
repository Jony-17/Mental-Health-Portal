-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Maio-2024 às 14:32
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
  `juncao_perturbacoes_id` int(11) DEFAULT NULL,
  `titulo` varchar(1000) NOT NULL,
  `data_publicacao` mediumtext NOT NULL,
  `autor` mediumtext NOT NULL,
  `img_artigo` mediumtext NOT NULL,
  `conteudo_texto` varchar(2000) DEFAULT NULL,
  `fonte` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `artigos`
--

INSERT INTO `artigos` (`artigo_id`, `juncao_perturbacoes_id`, `titulo`, `data_publicacao`, `autor`, `img_artigo`, `conteudo_texto`, `fonte`) VALUES
(1, 1, 'Ansiedade social: Da timidez à fobia social.', '2000', 'Gouveia, J. P. ', 'artigo1.jpg', 'O medo é uma emoção simples que pode estar ligada a qualquer situação específica. Esta emoção não deve ser considerada de forma depreciativa, pois pode ajudar a defender o indivíduo de ocorrências perigosas. É útil, por exemplo, alguém ter medo de atravessar uma rua com muito trânsito e observar primeiro se passam carros, pois esta atitude pode evitar que seja atropelado. Neste sentido podemos referir que o medo é uma emoção adaptativa. Contudo, há situações, em que o medo deixa de ser adaptativo. É o que acontece no caso das fobias', 'Gouveia, J. P. (2000). Ansiedade social: Da timidez à fobia social.'),
(2, 9, 'OLHANDO A PERTURBAÇÃO BIPOLAR.', '2006', 'da Fonseca, S. C. L. ', 'artigo2.jpg', 'É com frequência que os nossos doentes fazem inúmeras perguntas sobre a doença mental, especialmente na preparação do regresso a casa, assistindo-se por vezes com um sentimento de impotência e solidão, às duvidas e inquietações que sentem os familiares do doente mental.', 'da Fonseca, S. C. L. OLHANDO A PERTURBAÇÃO BIPOLAR.'),
(3, 3, 'Habilidades sociais na agorafobia e fobia social. Psicologia: Teoria e Pesquisa', '2008', 'Levitan, M., Rangé, B., & Nardi, A. E. ', 'artigo3.jpg', 's transtornos ansiosos são freqüentemente associados ao déficit de habilidades sociais (HS). A fobia social é o quadro mais relacionado a esse déficit, enquanto a agorafobia é desconsiderada. O objetivo deste artigo é investigar essa associação por meio de uma revisão da literatura.', 'Levitan, M., Rangé, B., & Nardi, A. E. (2008). Habilidades sociais na agorafobia e fobia social. Psicologia: Teoria e Pesquisa, 24, 95-99.'),
(4, 5, 'Intervenção psicológica em situações de pânico.', '1991', 'Costa, M. E. ', 'artigo4.jpg', 'Muitas vezes, o cliente não acredita na possibilidade de funcionar sem o medicamento, assumindo um estatuto de doente que dificulta a reestruturação da sua aulo-estima. Assim, sempre que a perturbação de pânico tem um fundo biológico caracterizado p0r ataques de pânico sem quaisquer factores desencadeadores, a medicação seria a reSp0Sta ideal. ', 'Costa, M. E. (1991). Intervenção psicológica em situações de pânico.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conteudo_artigo`
--

CREATE TABLE `conteudo_artigo` (
  `conteudo_artigo_id` int(11) NOT NULL,
  `artigo_id` int(11) NOT NULL,
  `ponto` varchar(255) DEFAULT NULL,
  `texto` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `conteudo_artigo`
--

INSERT INTO `conteudo_artigo` (`conteudo_artigo_id`, `artigo_id`, `ponto`, `texto`) VALUES
(1, 1, 'Introdução', 'Nos últimos anos o conceito de ansiedade ou fobia social tem-se tornado cada vez mais emergente, tanto a nível internacional como internacional. Esta procura crescente a muito se deve à elevada prevalência e comorbilidade que é experienciada pelo indivíduo, sobretudo enquanto criança e adolescente, afetando desde a vida escolar como profissional e afetiva (Gouveia, 2000).'),
(2, 1, 'A sobregeneralização da doença', 'Ainda que haja uma procura constante de informação relativamente à doença, está, ainda, presente o subdiagnóstico de profissionais não ligados à saúde mental, considerando a ansiedade social como um traço de personalidade ao invés de uma perturbação que necessita de um tratamento especializado. No geral, um número significativo de pessoas pouco sabe sobre esta perturbação, sendo cada vez mais emergente a consciencialização sobre a mesma entre a população em geral bem como os profissionais de saúde (Gouveia, 2000).'),
(3, 1, 'Conceito', 'A resposta ansiosa faz parte do ser-humano, podendo ela ser adaptativa ou desadaptativa. Condições mais leves não impedem o funcionamento social, ainda assim, numa crescente parte dos indivíduos, a presença deste tipo de ansiedade e os sintomas que a ela se acarretam chegam mesmo a interferir significativamente com o funcionamento obrigando o individuo a evitar determinadas situações. Por outras palavras pode-se dizer que “o medo de avaliação negativa e de parecer ridículo ou inadequado causa tanto desconforto que limita severamente a vida diária” (Gouveia, 2000).  No que diz respeito à prevalência, as discrepâncias que surgem nas amostras da população geral em tantos outros estudos podem ser justificadas pelas estratégias que são adotadas para lidar com esta perturbação, grande parte das vezes influenciada pelos papéis sociais. Ainda assim, as mulheres tendem a apresentar uma maior prevalência de ansiedade social em comparação com os homens que, por sua vez, tendem mais a procurar tratamento que as mulheres (Gouveia, 2000).'),
(4, 1, 'Avaliação e Tratamento', 'No que concerne à avaliação da perturbação de ansiedade social podem-se considerar, por exemplo, entrevistas clínicas estruturadas utilizadas para a avaliar a presença de critérios de diagnóstico segundo o DSM, questionários de autorrelato que permitem identificar a intensidade em que a ansiedade social é sentida, observação do comportamento em situações sociais reais ou simuladas e o relato de terceiros como amigos ou familiares. Ao nível do tratamento, por norma é considerado um conjunto de estratégias como a terapia cognitivo-comportamental, a exposição gradual e o treino de habilidades sociais e, em casos mais graves, a combinação de medicamentos como antidepressivos ou benzodiazepinas (Gouveia, 2000).'),
(5, 2, 'Introdução', 'A perturbação bipolar é uma condição de saúde mental caracterizada por mudanças extremas de humor, que vão desde episódios de mania ou hipomania até episódios de depressão. Antigamente, as perturbações de humor eram vistas sobretudo como estados de desequilíbrio do humor no corpo humano, enfatizando a depressão como um estado de melancolia e a bipolaridade como um estado de euforia. Com o passar dos anos foi-se refinando esta caraterização distinguindo-se como diferentes formas de psicose, sendo que, no decorrer do século XX houve um ponto de viragem na compreensão e tratamento da perturbação bipolar e no desenvolvimento de terapias psicológicas que complementassem o tratamento médico. Atualmente a pesquisa é contínua e procura aprofundar a compreensão da perturbação bipolar tendo em conta vários fatores como a genética, e fatores neurobiológicos e ambientais, além de que uma abordagem multidisciplinar para o tratamento combinando medicamentos com terapia psicológica (Fonseca, 2006).'),
(6, 2, 'Caraterização da Perturbação Bipolar', 'Tradicionalmente, a perturbação bipolar era caraterizada por uma doença psiquiátrica com variações acentuadas de humor. Supõe-se que a origem das crises de mudança do humor está na transmissão de impulsos nervosos para o cérebro, tornando a pessoa mais propensa ao stress (Fonseca, 2006) A perturbação bipolar é uma condição de saúde mental caraterizada por mudanças extremas de humor que podem variar entre episódios de mania ou hipomania e episódios depressivos. Durante os episódios de mania, a pessoa pode experienciar um estado de humor elevado ou irritável, com algumas caraterísticas típicas como sentimentos de euforia ou extrema felicidade, pensamento acelerado, fala rápida ou comportamento impulsivo e diminuição da necessidade do sono. Os episódios de hipomania, ainda que semelhantes aos de mania são considerados menos graves, incluindo  as mesmas caraterísticas da anterior mas mais leves e como menos interferência no funcionamento social e ocupacional da pessoa. Por sua vez, nos episódios depressivos a pessoa experiencia uma enorme tristeza, falta de energia, sentimentos de desesperança e culpa, maior dificuldade em concentrar-se e tomar decisões, alterações no sono e no apetite e peso e pensamentos suicidas ou de morte (Fonseca, 2006). A gravidade destes episódios varia de pessoa para pessoa e ao longo do tempo, sendo que algumas pessoas podem experienciar episódios mais frequentes e graves e outras podem ter longos períodos de estabilidade. Além disso estes ciclos variam em duração, intensidade e frequência entre os indivíduos. Esta perturbação pode ter um impacto significativo na vida da pessoa uma vez que durante os episódios o funcionamento pode ser gravemente prejudicado afetando a qualidade de vida no geral. '),
(7, 2, 'Tratamento da Perturbação Bipolar', 'O tratamento da perturbação bipolar depende de dois grandes fatores: as fases agudas da perturbação e a prevenção das crises e por isso o tratamento envolve, geralmente, uma abordagem multidisciplinar que combina medicamentos, terapia psicológica e suporte social. No que concerne aos medicamentos, são privilegiados os medicamentos estabilizadores de humor (ex:. lítio) bem como medicamentos anticonvulsivantes (ex:. Valproato) e antipsicóticos (ex:. olanzapina), permitindo estabilizar o humor e prevenir episódios de mania e depressão (Fonseca, 2006).  A terapia eletroconvulsiva (TEC) é uma intervenção médica utilizada no tratamento de perturbações mentais mais graves sobretudo quando os sintomas não respondem a outras formas típicas de tratamento e quando há um sério risco de suicídio (Fonseca, 2006). Este tipo de terapia envolve a aplicação controlada de choques elétricos no cérebro, induzindo uma convulsão e por isso afetando a atividade cerebral e os neurotransmissores de forma a aliviar os sintomas. Ainda que apresente resultados a quem é aplicada, este tipo de terapia é pouco utilizada, grande parte das vezes devido aos mitos e ideias erradas em torno dela (Fonseca, 2006). Ao nível da terapia psicológica é de salientar a terapia cognitivo-comportamental, podendo ajudar os indivíduos a identificar padrões de pensamento disfuncionais e desenvolver habilidades para melhorar o funcionamento social e interpessoal. Outra forma de terapia seria a terapia de grupo que se apresenta muito eficaz permitindo que as pessoas convivam com outras que possuem a mesma perturbação e assim receber conselhos práticos e úteis para conviver com a doença (Fonseca, 2006).  Cada tratamento deve ser personalizado e de acordo com as necessidades de cada paciente, tendo em consideração a severidade dos sintomas, a presença de outras condições médicas e preferências pessoais. Para ser eficaz o tratamento deve ser multidisciplinar e abordar, não apenas os sintomas, mas também o bem-estar geral da pessoa.'),
(8, 2, 'Conclusão', 'É de extrema importância reconhecer que a perturbação bipolar é uma das perturbações mais complexas e multifacetadas do DSM e o tratamento eficaz, por norma, envolve uma abordagem abrangente que pode incluir não apenas a medicação, como outros tipos de terapias e suporte social. O acompanhamento médico regular é inquestionável, assim como a adesão ao tratamento a fim de melhorar a qualidade de vida. '),
(9, 3, 'Introdução', 'Entende-se por habilidades sociais comportamentos que “permitem ao individuo lidar adequadamente com situações interpessoais” (Levitan et al., 2008) e dividem-se em categorias molares como aceitar e fazer elogios ou iniciar conversas e categorias moleculares como o contacto visual, os gestos e a postura (Levitan et al., 2008). Ainda que bastante diferentes, a agorafobia e a ansiedade social podem coexistir em determinados indivíduos. '),
(10, 3, 'Definições', 'A agorafobia carateriza-se, sobretudo, pelo medo intenso e o consequente evitamento de situações ou lugares onde a pessoa sente que não consegue sair ou pedir ajuda em caso de ansiedade, por exemplo multidões ou transportes públicos. Por sua vez a ansiedade social carateriza-se pelo medo intenso de situações sociais em que o indivíduo teme ser avaliado negativamente ou humilhado e rejeitado (Levitan et al., 2008).  Ambas as perturbações se cruzam ao nível de sintomas experienciando um medo significativo e o evitamento de determinadas situações, ainda que os triggers sejam diferentes. Ao nível da comorbilidade é comum que pessoas com agorafobia ou ansiedade social desenvolvam perturbações de pânico e, ambas as perturbações, podem causar um sofrimento significativo e interferir na vida diária das mesmas (Levitan et al., 2008).  As principais diferenças entre estas perturbações são, sobretudo, os triggers, na agorafobia o medo é centrado em situações onde a fuga possa ser difícil e na ansiedade social o medo é centrado em situações sociais e de desemprenho e no tipo de situações que são evitadas, no caso da agorafobia são lugares onde as pessoas sentem que não conseguirão sair facilmente e no caso da ansiedade social é a evitação de interações sociais onde temem ser julgadas (Levitan et al., 2008).'),
(11, 3, 'Modelos Explicativos', 'Os primeiros modelos sugeriam que as pessoas com quadros de ansiedade social apresentavam um conjunto de comportamentos inadequados devido a falhas de aprendizagem levando-as a não se adaptarem aos costumes sociais. Os modelos atuais, sendo mais complexos, sugerem que as pessoas socialmente ansiosas antecipam negativamente as interações sociais o que consequentemente dá asas a crenças de rejeição e comportamentos hipervigilantes e de evitamento(Levitan et al., 2008).'),
(12, 3, 'Conclusão', 'Posto isto, a agorafobia e a ansiedade social são perturbações de ansiedade que podem co-ocorrer e partilhar caraterísticas de evitamento e medo significativo ainda que os gatilhos sejam diferentes. Compreender as diferenças entre ambas é crucial para um boa diagnóstico e guias de tratamento eficazes. '),
(13, 4, 'Introdução', 'A perturbação de pânico é caraterizada por episódios súbitos e intensos de medo ou desconforto extremo. Estes episódios podem ocorrer inesperadamente, sem um trigger, ou podem ser desencadeados por situações específicas. Além dos vários sintomas físicos associados como as palpitações cardíacas, tremores ou falta de ar, também podem ser acompanhados por sintomas emocionais como o medo de morrer ou de perder o controlo (Costa, 1991).   Frequentemente, a perturbação de pânico co-existe com outras perturbações como de ansiedade, depressivas ou do sono, mas também pode co-existir com outras condições médicas como doenças cardíacas, da tiróidea ou doenças respiratórias. '),
(14, 4, 'Modelos Explicativos e Terapêuticos', 'O modelo biológico enfatiza que os ataques de pânico são causados por disfunções em determinadas áreas do cérebro ou desequilíbrios químicos relacionados aos neurotransmissores. Os principais elementos deste modelo focam-se na genética, na ativação excessiva do sistema nervoso autónomo, em potenciais anormalidades na atividade do sistema límbico e na hiperventilação e sensibilidade aumentada às sensações físicas internas. Neste modelo, o tratamento passa, sobretudo, pela intervenção medicamentosa, através de inibidores seletivos de recaptação de serotonina e noradrenalina e benzodiazepínicos (Costa, 1991). O modelo psicofisiológico da perturbação de pânico sugere que os ataques consequentes da mesma são o resultado de uma interação complexa entre fatores psicológicos e fisiológicos, destacando como os pensamentos, sentimentos e emoções se influenciam mutuamente. Os principais elementos deste modelo passam pela reatividade do sistema nervoso autónomo, a sensibilização aumentada das sensações físicas internas, as vulnerabilidades psicológicas como a presença de crenças irracionais, a aprendizagem e condicionamento ao longo do tempo e a resposta ao stress. A intervenção neste modelo passa pela educação sobre a perturbação, fornecendo informações detalhadas e cientificamente validadas aos pacientes, técnicas de relaxamento como a respiração profunda ou o mindfulness, a reestruturação cognitiva desafiando os pensamentos irracionais, a exposição gradual às sensações físicas temidas, o treino de habilidades de enfrentamento e a monitorização e prevenção de recaídas (Costa, 1991). O modelo cognitivo aponta que o foco da perturbação de pânico está nos pensamentos e crenças irracionais que desencadeiam interpretações erróneas de sensações físicas normais. Os principais elementos deste modelo focam-se na interpretação catastrófica, na sensibilidade aumentada às sensações físicas, nas crenças irracionais e na evitação de situações temidas. Neste modelo a intervenção passa pela terapia cognitivo-comportamental através da reestruturação cognitiva, educação sobre a perturbação e técnicas de relaxamento (Costa, 1991). O modelo psicodinâmico, ainda que menos usual e menos eficiente, enfatiza que na perturbação de pânico, os ataques de pânico são vistos como manifestações de conflitos inconscientes e processos psicológicos profundos. Os principais elementos deste modelo são os conflitos internos inconscientes muitas vezes relacionados com experiencias traumáticas, os mecanismos de defesa como a negação ou repressão e o simbolismo atribuído aos ataques de pânico como conflitos internos ou necessidades não satisfeitas. A intervenção passa pela psicoterapia psicodinâmica, a exploração da história pessoal, o trabalho de processamento emocional e a exploração de fantasias e símbolos (Costa, 1991). '),
(15, 4, 'Conclusão', 'Em virtude do que foi mencionado, a perturbação de pânico é caraterizada por episódios intensos de medo ou desconforto, acompanhados por repertório de sintomas físicos e emocionais. Esses episódios podem ocorrer inesperadamente ou ser desencadeados por gatilhos específicos. Existem vários modelos explicativos e terapêuticos que abordam a perturbação de pânico de diferentes perspetivas e ainda que possam diferir nas suas abordagens fornecem insights valiosos sobre a complexidade da perturbação assim como várias opções de tratamento que podem ser adaptadas a cada pessoa. ');

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
(1, 1, 'ee1', 'aaa'),
(8, 7, 'ponto1', 'texto1');

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
(1, 'Atividades de Relaxamento', 'relaxamento.png', 'Mindfulness é definida como uma forma específica de atenção plena – concentração no momento atual, intencional, e sem julgamento. Significa estar plenamente em contato com a vivência do momento, sem estar absorvido por elaMindfulness é definida como uma forma específica de atenção plena – concentração no momento atual, intencional, e sem julgamento. Significa estar plenamente em contato com a vivência do momento, sem estar absorvido por ela'),
(2, 'Atividades de Bem-estar', 'bem-estar.png', 'Mindfulness é definida como uma forma específica de atenção plena – concentração no momento atual, intencional, e sem julgamento. Significa estar plenamente em contato com a vivência do momento, sem estar absorvido por elaMindfulness é definida como uma forma específica de atenção plena – concentração no momento atual, intencional, e sem julgamento. Significa estar plenamente em contato com a vivência do momento, sem estar absorvido por ela'),
(3, 'Atividades de Yoga', 'yoga.png', 'Mindfulness é definida como uma forma específica de atenção plena – concentração no momento atual, intencional, e sem julgamento. Significa estar plenamente em contato com a vivência do momento, sem estar absorvido por elaMindfulness é definida como uma forma específica de atenção plena – concentração no momento atual, intencional, e sem julgamento. Significa estar plenamente em contato com a vivência do momento, sem estar absorvido por ela\r\n\r\n\r\n\r\n\r\n'),
(4, 'Atividades de Alongamento', 'alongamento.png', 'Mindfulness é definida como uma forma específica de atenção plena – concentração no momento atual, intencional, e sem julgamento. Significa estar plenamente em contato com a vivência do momento, sem estar absorvido por elaMindfulness é definida como uma forma específica de atenção plena – concentração no momento atual, intencional, e sem julgamento. Significa estar plenamente em contato com a vivência do momento, sem estar absorvido por ela\r\n\r\n\r\n\r\n\r\n'),
(15, 'testeeee', 'teste2.png', 'testeeeee'),
(16, 'teste', '', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicios_mindfulness_ex`
--

CREATE TABLE `exercicios_mindfulness_ex` (
  `exercicios_mindfulness_ex_id` int(11) NOT NULL,
  `exercicios_mindfulness_id` int(11) NOT NULL,
  `titulo` varchar(1000) DEFAULT NULL,
  `img` mediumtext DEFAULT NULL,
  `audio` blob NOT NULL,
  `fonte` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `exercicios_mindfulness_ex`
--

INSERT INTO `exercicios_mindfulness_ex` (`exercicios_mindfulness_ex_id`, `exercicios_mindfulness_id`, `titulo`, `img`, `audio`, `fonte`) VALUES
(1, 4, 'Rodar a cabeça', 'alongamento1.webp', '', 'ex4'),
(2, 4, 'Rodar os ombros', 'alongamento2.webp', '', ''),
(3, 4, 'Alongamento de braços e abdominais', 'alongamento3.webp', '', ''),
(4, 3, 'Gato-Vaca (Marjaryasana-Bitilasana)', 'yoga1.webp', '', ''),
(5, 3, 'Posição de criança (Balasana)', 'yoga2.webp', '', ''),
(6, 3, 'Posição de montanha (Tadasana)', 'yoga3.webp', '', ''),
(7, 2, 'Ver um filme ou série', 'teste2.png', '', ''),
(8, 2, 'Assistir/acompanhar algum desporto', 'teste2.png', '', ''),
(29, 1, 'Mindfulness – Atenção à Respiração', '', '', 'ex1'),
(30, 1, 'Mindfulness – Body Scan', '', 0x4d696e6466756c6e65737320e2809320426f6479205363616e2e6d7033, ''),
(32, 1, 'Mindfulness – Explorar Sensações e Pensamentos Difíceis', '', 0x4d696e6466756c6e65737320e28093204578706c6f7261722053656e7361c3a7c3b5657320652050656e73616d656e746f7320446966c3ad636569732e6d7033, ''),
(33, 1, 'Relaxamento Muscular Progressivo', '', 0x52656c6178616d656e746f204d757363756c61722050726f677265737369766f2e6d7033, ''),
(34, 1, 'Respiração Diafragmática', '', 0x52657370697261c3a7c3a36f20446961667261676dc3a1746963612e6d7033, ''),
(35, 15, 'testeeeee', '', 0x52657370697261c3a7c3a36f20446961667261676dc3a1746963612e6d7033, ''),
(37, 16, 'teste', '', '', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `factos_10`
--

CREATE TABLE `factos_10` (
  `10_factos_id` int(11) NOT NULL,
  `perturbacoes_id` int(11) NOT NULL,
  `nº` int(11) NOT NULL,
  `factos` text NOT NULL,
  `descricao` text NOT NULL,
  `fonte` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `factos_10`
--

INSERT INTO `factos_10` (`10_factos_id`, `perturbacoes_id`, `nº`, `factos`, `descricao`, `fonte`) VALUES
(1, 1, 1, 'Symptoms', 'While symptoms anxiety can be debilitating, with proper treatment—including medication and psychotherapy—people can learn to manage their symptoms and live a more productive life.', 'teste1'),
(2, 1, 2, 'Introdução', 'While symptoms anxiety can be debilitating, with proper treatment—including medication and psychotherapy—people.', ''),
(3, 1, 3, 'Testeteste', 'TestetesteTestetesteTestetesteTestetesteTesteteste', ''),
(4, 1, 4, 'Teste4', 'TesteTesteTesteTesteTesteTesteTeste', 'teste2'),
(5, 1, 5, 'Teste5', 'TesteTesteTesteTesteTesteTesteTeste', ''),
(6, 1, 6, 'Teste6', 'TesteTesteTesteTesteTesteTesteTeste', ''),
(7, 1, 7, 'Teste7', 'TesteTesteTesteTesteTesteTesteTeste', ''),
(8, 1, 8, 'Teste8', 'TesteTesteTesteTesteTesteTesteTeste', 'teste3'),
(9, 1, 9, 'Teste9', 'TesteTesteTesteTesteTesteTesteTeste', ''),
(10, 1, 10, 'Teste10', 'TesteTesteTesteTesteTesteTesteTeste', '');

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
  `ajuda_texto` mediumtext DEFAULT NULL,
  `fonte` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grupos_perturbacoes`
--

INSERT INTO `grupos_perturbacoes` (`grupos_perturbacoes_id`, `nome`, `texto`, `sintomas_texto`, `prevalencias_texto`, `ajuda_texto`, `fonte`) VALUES
(1, 'Ansiedade Social', 'Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety, know that you are not alone. The National Institutes of Mental Health estimate that nearly one-third of US adults will deal with an anxiety disorder at some point in their lives.1 Any Anxiety Disorder, National Institutes of Mental Health Since anxiety is a common mental health condition (and is a condition that can be debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety screening.2 \n\n', 'Generalized anxiety disorder (GAD) is a specific type of anxiety disorder. Most people worry at times about their health, job, money, or family, but people with GAD experience anxiety about these things and more, in a way that is persistent, excessive, and intrusive. [1]\n\nOften, people with GAD struggle to relax and have trouble concentrating on tasks. They may experience physical symptoms including restlessness, sweating, difficulty swallowing, and using the restroom a lot.\n\nAccording to mental health experts, nearly 3% of all U.S. adults have experienced GAD in the last year and it is estimated that up to 9% experience GAD at some point in their lives. Considering that anxiety is a common mental health condition, the United States Preventative Services Task Force recommends that all adults under the age of 65 should be routinely screened for anxiety. [2]', 'teste', 'Generalized anxiety disorder (GAD) is a specific type of anxiety disorder. Most people worry at times about their health, job, money, or family, but people with GAD experience anxiety about these things and more, in a way that is persistent, excessive, and intrusive. [1]\n\nOften, people with GAD struggle to relax and have trouble concentrating on tasks. They may experience physical symptoms including restlessness, sweating, difficulty swallowing, and using the restroom a lot.\n\nAccording to mental health experts, nearly 3% of all U.S. adults have experienced GAD in the last year and it is estimated that up to 9% experience GAD at some point in their lives. Considering that anxiety is a common mental health condition, the United States Preventative Services Task Force recommends that all adults under the age of 65 should be routinely screened for anxiety. [2]', 'testeansiedadesocial'),
(2, 'Ansiedade Generalizada', 'teste', 'teste', 'teste', 'teste', ''),
(3, 'Agorafobia', 'teste', 'teste', 'teste', 'teste', 'testeagorafobia'),
(4, 'Fobia específica', 'teste', 'teste', 'teste', 'teste', ''),
(5, 'Perturbação de pânico', 'teste', 'teste', 'teste', 'teste', ''),
(6, 'Perturbação de Insónia', 'teste', 'teste', 'teste', 'teste', ''),
(7, 'Hipersonolência', 'teste', 'teste', 'teste', 'teste', ''),
(8, 'Perturbação Depressiva Major', 'teste', 'teste', 'teste', 'teste', ''),
(9, 'Perturbação Bipolar', 'teste', 'teste', 'teste', 'teste', ''),
(10, 'Anorexia Nervosa', 'teste', 'teste', 'teste', 'teste', ''),
(11, 'Bulimia Nervosa', 'teste', 'teste', 'teste', 'teste', ''),
(12, 'Perturbação de Ingestão Alimentar Compulsiva', 'teste', 'teste', 'teste', 'teste', ''),
(13, 'Perturbações Obsessivo-Compulsivas', 'teste', 'teste', 'teste', 'teste', ''),
(14, 'Grupo A', 'teste', NULL, NULL, NULL, 'testegrupoa'),
(15, 'Grupo B', 'teste', NULL, NULL, NULL, ''),
(16, 'Grupo C', 'teste', NULL, NULL, NULL, ''),
(17, 'Perturbação de Stress Pós-Traumático', 'teste', 'teste', 'teste', 'teste', ''),
(18, 'Perturbação de Ajustamento', 'teste', 'teste', 'teste', 'teste', ''),
(22, 'testeeeee', 'testeeeee', 'testeeeee', 'testeeeee', 'testeeeee', '');

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
(25, 13, 22);

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
  `conteudo_texto` varchar(1000) NOT NULL,
  `fonte` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`noticias_id`, `titulo`, `data_publicacao`, `autor`, `img_noticia`, `conteudo_texto`, `fonte`) VALUES
(1, 'Dar uma casa a doentes mentais que vivem na rua', '13 de abril de 2024', 'Observador', 'noticia1.webp', 'testetestetestetestetestetestetestetestetesteteste', 'fonte1'),
(2, 'O que são perturbações da personalidade?', '20 de abril de 2024', 'Observador', 'noticia2.webp', 'testetestetestetestetestetestetestetestetesteteste', 'fonte2'),
(3, 'O projeto que ajuda a prevenir o suicídio juvenil', '30 de março de 2024', 'Observador', 'noticia3.webp', 'testetestetestetestetestetestetestetestetesteteste', ''),
(4, 'O projeto que ajuda o suicídio juvenil', '30 de março de 2024', 'Observador', 'noticia4.webp', 'testetestetestetestetestetestetestetestetesteteste', ''),
(5, 'O po que o juvenil', '30 de março de 2024', 'Observador', 'noticia1.webp', 'testetestetestetestetestetestetestetestetesteteste', ''),
(6, 'O po que ajuda o juvenil', '30 de março de 2024', 'Observador', 'noticia1.webp', 'testetestetestetestetestetestetestetestetesteteste', ''),
(7, 'O po que o juvenil', '30 de março de 2024', 'Observador', 'noticia1.webp', 'testetestetestetestetestetestetestetestetesteteste', '');

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
(4, 'teste2', 'teste2');

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
  `banner_perturbacao` mediumtext NOT NULL,
  `fonte` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perturbacoes`
--

INSERT INTO `perturbacoes` (`perturbacoes_id`, `nome`, `texto`, `img_perturbacao`, `img_perturbacao_circ`, `banner_perturbacao`, `fonte`) VALUES
(1, 'Perturbações de Ansiedade', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety, know that you are not alone. The National Institutes of Mental Health estimate that nearly one-third of US adults will deal with an anxiety disorder at some point in their lives.1 Any Anxiety Disorder, National Institutes of Mental Health Since anxiety is a common mental health condition (and is a condition that can be debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety screening.2 Treatment options like therapy, medication, self-care strategies, and lifestyle changes can help you manage your anxiety and help you live your best life at home, at work, and in your relationships.\n\nwith anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxiety, know that you are not alone. The National Institutes of Mental Health estimate that nearly one-third of US adults will deal with an anxiety disorder at some point in their lives.1 Any Anxiety Disorder, National Institutes of Mental Health Since anxiety is a common mental health condition (and is a condition that can be debilitating), it\'s recommended that all adults under the age of 65 receive routine anxiety screening.2 Treatment options like therapy, medication, self-care strategies, and lifestyle changes can help you manage your anxiety and help you live your best life at home, at work, and in your relationships.\n\n', 'pert-ansie.png', 'https://i.ibb.co/pWP0R34/pert-ansie-circle.png', 'banner-ans.png', 'testeansiedade'),
(2, 'Perturbações do Sono - Vigília', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'pert-sono.png', 'https://i.ibb.co/CJDnQW2/pert-sono-circle.png', 'banner-sono.png', 'testesono'),
(3, 'Perturbações de Humor', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'pert-humor.png', 'https://i.ibb.co/3r3SSyx/pert-humor-circle.png', 'banner-humor.png', ''),
(4, 'Perturbações Alimentares', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'pert-aliment.png', 'https://i.ibb.co/2djRPxt/pert-aliment-circle.png', 'banner-aliment.png', ''),
(5, 'Perturbações Obsessivo-Compulsivas', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'pert-obscomp.png', NULL, 'banner-obscomp.png', ''),
(6, 'Perturbações de Personalidade', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'pert-perso.png', NULL, 'banner-pers.png', ''),
(7, 'Perturbações relacionadas com Trauma e Fatores de stress', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'pert-stress.png', NULL, 'banner-stress.png', ''),
(13, 'testeperteee', 'testeperteee', 'pert-aliment.png', NULL, 'teste.avif', 'd');

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
  `ajuda_texto` mediumtext NOT NULL,
  `fonte` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perturbacoes_personalidade`
--

INSERT INTO `perturbacoes_personalidade` (`perturbacoes_personalidade_id`, `nome`, `texto`, `sintomas_texto`, `prevalencias_texto`, `ajuda_texto`, `fonte`) VALUES
(1, 'Perturbação Paranóide da Personalidade', 'teste', 'teste', 'teste', 'teste', 'testeppp'),
(2, 'Perturbação Esquizóide da Personalidade', 'teste', 'teste', 'teste', 'teste', 'testepep'),
(3, 'Perturbação Esquizotípica de Personalidade', 'teste', 'teste', 'teste', 'teste', ''),
(4, 'Perturbação Antissocial da Personalidade', 'teste', 'teste', 'teste', 'teste', ''),
(5, 'Perturbação Borderline da Personalidade', 'teste', 'teste', 'teste', 'teste', ''),
(6, 'Perturbação Histriónica da Personalidade', 'teste', 'teste', 'teste', 'teste', ''),
(7, 'Perturbação Narcísica da Personalidade', 'teste', 'teste', 'teste', 'teste', ''),
(8, 'Perturbação Evitante da Personalidade', 'teste', 'teste', 'teste', 'teste', ''),
(9, 'Perturbação Dependente da Personalidade', 'teste', 'teste', 'teste', 'teste', ''),
(10, 'Perturbação Obsessivo-Compulsiva da Personalidade', 'teste', 'teste', 'teste', 'teste', ''),
(12, 'testeeee', 'testeeee', 'testeeee', 'testeeee', 'testeeee', '');

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
(162, 18, 1),
(163, 18, 23);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quiz_nome`
--

CREATE TABLE `quiz_nome` (
  `quiz_nome_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `img_quiz` mediumtext NOT NULL,
  `explicacao_quiz` varchar(1000) NOT NULL,
  `texto_informacao` varchar(1000) NOT NULL,
  `fonte` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `quiz_nome`
--

INSERT INTO `quiz_nome` (`quiz_nome_id`, `nome`, `img_quiz`, `explicacao_quiz`, `texto_informacao`, `fonte`) VALUES
(1, 'O quão empática/o és?', 'empatia.png', 'É uma pessoa empática? Já lhe disseram que é “muito sensível” ou precisa de se fortalecer? Sente-se exausto e ansioso depois de estar no meio de uma multidão ou perto de certas pessoas? Tem sensibilidade à luz, som e cheiros? Demora mais a relaxar depois de um longo dia de trabalho?', 'Nas pessoas empáticas, acredita-se que o sistema de neurônios-espelho do cérebro – um grupo especializado de células responsáveis ​​pela compaixão – seja hiperativo. Como resultado, as pessoas empáticas podem absorver as energias de outras pessoas (positivas e negativas) nos seus próprios corpos. Às vezes pode até ser difícil saber se estamos a sentir as próprias emoções ou as de outra pessoa. Existem diferentes tipos de sensibilidades que as pessoas empáticas podem experimentar. As pessoas empáticas físicas, por exemplo, estão especialmente sintonizados com os sintomas físicos de outras pessoas e absorvem-nos nos seus próprios corpos. as pessoas empáticas emocionais captam as emoções das pessoas e tornam-se uma esponja para os seus sentimentos. As pessoas empáticas alimentares estão sintonizadas com a energia dos alimentos e podem até sentir sensibilidade a certos alimentos. Ter empatia traz benefícios, como maior intuição, compaixão, criatividade e uma conexão mais profunda com outra', 'fontequiz1'),
(2, 'O quão preocupada/o és?', 'preocupado.png', 'Our world is in the midst of an emotional meltdown. As a psychiatrist, I’ve seen that many people are addicted to the adrenaline rush of anxiety, known as the “fight or flight” response, and they don’t know how to defuse it. An example of this is obsessively watching the news about natural disasters, trauma, economic stress and violence, and then not being able to turn bad news off. Also, people are prone to “techno-despair” — a term I coined in my book, “Emotional Freedom.” This is a state of high anxiety that results from information overload and Internet addiction. Being addicted to worry can lead to insomnia, nightmares, restless sleep and ongoing angst. Take this quiz to determine the role that worry is playing in your life.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. In metus vulputate eu scelerisque. Libero id faucibus nisl tincidunt eget nullam non. At elementum eu facilisis sed odio morbi. Et malesuada fames ac turpis. At imperdiet dui accumsan sit. Quisque id diam vel quam. Vitae congue eu consequat ac felis donec et odio pellentesque. Enim lobortis scelerisque fermentum dui faucibus in ornare quam viverra. Tristique senectus et netus et malesuada fames. Diam quam nulla porttitor massa. Consectetur lorem donec massa sapien faucibus. Nisi est sit amet facilisis magna etiam tempor. Aliquam faucibus purus in massa tempor nec feugiat nisl pretium. Dictum fusce ut placerat orci nulla pellentesque dignissim enim. Venenatis urna cursus eget nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore m', ''),
(3, 'Tens uma energia positiva', 'energia.png', 'Relationships are always an energy exchange. Positive attitudes accentuate wellness. Negative attitudes impair it. Take this quiz to determine your positivity score and the energy impact you have on yourself and others.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. In metus vulputate eu scelerisque. Libero id faucibus nisl tincidunt eget nullam non. At elementum eu facilisis sed odio morbi. Et malesuada fames ac turpis. At imperdiet dui accumsan sit. Quisque id diam vel quam. Vitae congue eu consequat ac felis donec et odio pellentesque. Enim lobortis scelerisque fermentum dui faucibus in ornare quam viverra. Tristique senectus et netus et malesuada fames. Diam quam nulla porttitor massa. Consectetur lorem donec massa sapien faucibus. Nisi est sit amet facilisis magna etiam tempor. Aliquam faucibus purus in massa tempor nec feugiat nisl pretium. Dictum fusce ut placerat orci nulla pellentesque dignissim enim. Venenatis urna cursus eget nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore m', ''),
(4, 'O quão livre és, emocionalmente?', 'livre.png', 'É capaz de cultivar emoções positivas e compaixão sem que os pensamentos negativos dominem a sua vida?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. In metus vulputate eu scelerisque. Libero id faucibus nisl tincidunt eget nullam non. At elementum eu facilisis sed odio morbi. Et malesuada fames ac turpis. At imperdiet dui accumsan sit. Quisque id diam vel quam. Vitae congue eu consequat ac felis donec et odio pellentesque. Enim lobortis scelerisque fermentum dui faucibus in ornare quam viverra. Tristique senectus et netus et malesuada fames. Diam quam nulla porttitor massa. Consectetur lorem donec massa sapien faucibus. Nisi est sit amet facilisis magna etiam tempor. Aliquam faucibus purus in massa tempor nec feugiat nisl pretium. Dictum fusce ut placerat orci nulla pellentesque dignissim enim. Venenatis urna cursus eget nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore m', ''),
(23, 'teste1', 'teste2.png', 'teste1', 'teste1', 'fontequiz2');

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
(17, 23, 'testequestao', 'teste1a', 'teste2b');

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
(2, 1, 1, 'És uma pessoa parcialmente empática'),
(3, 1, 1, 'És uma pessoa parcialmente empática'),
(4, 1, 1, 'És uma pessoa parcialmente empática'),
(5, 2, 1, 'teste1'),
(6, 2, 2, 'teste2'),
(19, 23, 1, 'testeresposta1');

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
(1, 'Andrew Solomon', 'Depression, the secret we share', 'Outubro 2013', '29:07 min', 'ted-talk1.jpg', 'https://www.ted.com/talks/andrew_solomon_depression_the_secret_we_share?referrer=playlist-the_struggle_of_mental_health&autoplay=true'),
(2, 'Kevin Breel', 'Confessions of a depressed comic', 'Maio 2013', '10:46 min', 'ted-talk2.jpg', 'https://www.ted.com/talks/kevin_breel_confessions_of_a_depressed_comic?referrer=playlist-the_struggle_of_mental_health&autoplay=true'),
(3, 'Mariano Sigman', 'Your words may predict your future mental health', 'Fevereiro 2016', '12:04 min', 'ted-talk3.jpg', 'https://www.ted.com/talks/mariano_sigman_your_words_may_predict_your_future_mental_health'),
(4, 'Hailey Hardcastle', 'Why students should have mental health days', 'Janeiro 2020', '07:15 min', 'ted-talk4.jpg', 'https://www.ted.com/talks/hailey_hardcastle_why_students_should_have_mental_health_days');

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
  MODIFY `artigo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `conteudo_artigo`
--
ALTER TABLE `conteudo_artigo`
  MODIFY `conteudo_artigo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `conteudo_noticia`
--
ALTER TABLE `conteudo_noticia`
  MODIFY `conteudo_noticia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `exercicios_mindfulness`
--
ALTER TABLE `exercicios_mindfulness`
  MODIFY `exercicios_mindfulness_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `exercicios_mindfulness_ex`
--
ALTER TABLE `exercicios_mindfulness_ex`
  MODIFY `exercicios_mindfulness_ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `factos_10`
--
ALTER TABLE `factos_10`
  MODIFY `10_factos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `grupos_perturbacoes`
--
ALTER TABLE `grupos_perturbacoes`
  MODIFY `grupos_perturbacoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `juncao_perturbacoes`
--
ALTER TABLE `juncao_perturbacoes`
  MODIFY `juncao_perturbacoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `juncao_pert_personalidade`
--
ALTER TABLE `juncao_pert_personalidade`
  MODIFY `juncao_pert_pers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `noticias_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `perguntas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `perturbacoes`
--
ALTER TABLE `perturbacoes`
  MODIFY `perturbacoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `perturbacoes_personalidade`
--
ALTER TABLE `perturbacoes_personalidade`
  MODIFY `perturbacoes_personalidade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT de tabela `quiz_nome`
--
ALTER TABLE `quiz_nome`
  MODIFY `quiz_nome_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `quiz_questoes`
--
ALTER TABLE `quiz_questoes`
  MODIFY `quiz_questoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `quiz_respostas`
--
ALTER TABLE `quiz_respostas`
  MODIFY `quiz_respostas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `registos`
--
ALTER TABLE `registos`
  MODIFY `registos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `ted_talks`
--
ALTER TABLE `ted_talks`
  MODIFY `ted_talks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  ADD CONSTRAINT `fk_grupos_perturbacoes_perturbacoes` FOREIGN KEY (`grupos_perturbacoes_id`) REFERENCES `grupos_perturbacoes` (`grupos_perturbacoes_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_perturbacoes_id` FOREIGN KEY (`perturbacoes_id`) REFERENCES `perturbacoes` (`perturbacoes_id`),
  ADD CONSTRAINT `fk_perturbacoes_perturbacoes` FOREIGN KEY (`perturbacoes_id`) REFERENCES `perturbacoes` (`perturbacoes_id`) ON DELETE CASCADE;

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
