-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Jun-2024 às 20:49
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
(3, 3, 'Habilidades sociais na agorafobia e fobia social.', '2008', 'Levitan, M., Rangé, B., & Nardi, A. E. ', 'artigo3.jpg', 's transtornos ansiosos são freqüentemente associados ao déficit de habilidades sociais (HS). A fobia social é o quadro mais relacionado a esse déficit, enquanto a agorafobia é desconsiderada. O objetivo deste artigo é investigar essa associação por meio de uma revisão da literatura.', 'Levitan, M., Rangé, B., & Nardi, A. E. (2008). Habilidades sociais na agorafobia e fobia social. Psicologia: Teoria e Pesquisa, 24, 95-99.'),
(4, 5, 'Intervenção psicológica em situações de pânico.', '1991', 'Costa, M. E. ', 'artigo4.jpg', 'Muitas vezes, o cliente não acredita na possibilidade de funcionar sem o medicamento, assumindo um estatuto de doente que dificulta a reestruturação da sua aulo-estima. Assim, sempre que a perturbação de pânico tem um fundo biológico caracterizado p0r ataques de pânico sem quaisquer factores desencadeadores, a medicação seria a reSp0Sta ideal. ', 'Costa, M. E. (1991). Intervenção psicológica em situações de pânico.'),
(5, 1, 'O tratamento da perturbação de ansiedade social', '2004', 'Rodebaugh, T. L., Holaway, R. M., & Heimberg, R. G.', 'artigo5.jpg', 'dd', 'Rodebaugh, T. L., Holaway, R. M., & Heimberg, R. G. (2004). The treatment of social anxiety disorder. Clinical Psychology Review, 24(7), 883-908.'),
(6, 1, '“Quero ficar sozinho, mas não me quero sentir sozinho”', '2022', 'Kim, S. S., Liu, M., Qiao, A., & Miller, L. C. ', 'artigo6.jpg', 'ss', 'Kim, S. S., Liu, M., Qiao, A., & Miller, L. C. (2022). “I Want to Be Alone, but I Don’t Want to Be Lonely”: Uncertainty Management Regarding Social Situations among College Students with Social Anxiety Disorder. Health Communication, 37(13), 1650-1660.'),
(7, 2, 'Perturbação de ansiedade generalizada', '2015', 'Stein, M. B., & Sareen, J. ', 'artigo7.jpg', 'dd', 'Stein, M. B., & Sareen, J. (2015). Generalized anxiety disorder. New England Journal of Medicine, 373(21), 2059-2068'),
(8, 2, 'Visão geral da perturbação de ansiedade generalizada: epidemiologia, apresentação e curso', '2009', 'Weisberg, R. B.', 'artigo8.jpg', 'd', 'Weisberg, R. B. (2009). Overview of generalized anxiety disorder: epidemiology, presentation, and course. Journal of clinical psychiatry, 70(Suppl 2), 4-9.'),
(9, 3, 'Agorafobia: uma revisão da posição e dos critérios classificatórios diagnósticos', '2010', 'Wittchen, H. U., Gloster, A. T., Beesdo‐Baum, K., Fava, G. A., & Craske, M. G.', 'artigo9.jpg', 'd', 'Wittchen, H. U., Gloster, A. T., Beesdo‐Baum, K., Fava, G. A., & Craske, M. G. (2010). Agoraphobia: a review of the diagnostic classificatory position and criteria. Depression and Anxiety, 27(2), 113-133.'),
(10, 4, 'Fobia específica: uma revisão da fobia específica do DSM-IV e recomendações preliminares para o DSM-V', '2010', 'LeBeau, R. T., Glenn, D., Liao, B., Wittchen, H. U., Beesdo‐Baum, K., Ollendick, T., & Craske, M. G.', 'artigo10.jpg', 'd', 'LeBeau, R. T., Glenn, D., Liao, B., Wittchen, H. U., Beesdo‐Baum, K., Ollendick, T., & Craske, M. G. (2010). Specific phobia: a review of DSM‐IV specific phobia and preliminary recommendations for DSM‐V. Depression and anxiety, 27(2), 148-167.'),
(11, 4, 'Quão específica é a fobia específica?', '2011', 'Lueken, U., Kruschwitz, J. D., Muehlhan, M., Siegert, J., Hoyer, J., & Wittchen, H. U. ', 'artigo11.jpg', 'd', 'Lueken, U., Kruschwitz, J. D., Muehlhan, M., Siegert, J., Hoyer, J., & Wittchen, H. U. (2011). How specific is specific phobia? Different neural response patterns in two subtypes of specific phobia. NeuroImage, 56(1), 363-372.'),
(12, 5, 'Prevenção da perturbação de pânico', '2001', 'Gardenswartz, C. A., & Craske, M. G. ', 'artigo12.jpg', 'd', 'Gardenswartz, C. A., & Craske, M. G. (2001). Prevention of panic disorder. Behavior Therapy, 32(4), 725-737.'),
(13, 8, 'O peso das perturbações depressivas', '2005', 'Gusmão, R. M., Xavier, M., Heitor, M. J., Bento, A., & de Almeida, J. C. ', 'artigo13.jpg', 'd', 'Gusmão, R. M., Xavier, M., Heitor, M. J., Bento, A., & de Almeida, J. C. (2005). O peso das perturbações depressivas: aspectos epidemiológicos globais e necessidades de informação em Portugal. Acta Médica Portuguesa, 18(2), 129-46.'),
(14, 6, 'Perturbação de insónia: estado da ciência e desafios para o futuro', '2022', 'Riemann et al.', 'artigo14.jpg', 'd', 'Riemann, D., Benz, F., Dressle, R. J., Espie, C. A., Johann, A. F., Blanken, T. F., ... & Van Someren, E. J. (2022). Insomnia disorder: State of the science and challenges for the future. Journal of sleep research, 31(4), e13604.'),
(15, 6, 'Como tratar os doentes com insónia crónica?', '2006', 'Clemente, V. ', 'artigo15.jpg', 'd', 'Clemente, V. (2006). Como tratar os doentes com insónia crónica? O contributo da Psicologia Clínica. Revista Portuguesa de Medicina Geral e Familiar, 22(5), 635-44.'),
(16, 7, 'Hipersonolência idiopática: estudo de 77 casos', '2007', 'Anderson, K. N., Pilsworth, S., Sharples, L. D., Smith, I. E., & Shneerson, J. M. ', 'artigo16.jpg', 'd', 'Anderson, K. N., Pilsworth, S., Sharples, L. D., Smith, I. E., & Shneerson, J. M. (2007). Idiopathic hypersomnia: a study of 77 cases. Sleep, 30(10), 1274-1281'),
(17, 10, 'Repercussões do acesso às redes sociais em pessoas com diagnóstico de anorexia nervosa', '2021', 'de Moraes, R. B., dos Santos, M. A., & Leonidas, C. ', 'artigo17.jpg', 'd', 'de Moraes, R. B., dos Santos, M. A., & Leonidas, C. (2021). Repercussões do acesso às redes sociais em pessoas com diagnóstico de anorexia nervosa. Estudos e Pesquisas em Psicologia, 21(3), 1178-1199.'),
(18, 11, 'Medicação e psicoterapia no tratamento da bulimia nervosa', '1997', 'Walsh et al.', 'artigo18.jpg', 'd', 'Walsh, B. T., Wilson, G. T., Loeb, K. L., Devlin, M. J., Pike, K. M., Roose, S. P., ... & Waternaux, C. (1997). Medication and psychotherapy in the treatment of bulimia nervosa. American Journal of Psychiatry, 154(4), 523-531.'),
(19, 12, 'Como Parar de Devorar os Problemas?', '2022', 'Cordeiro, C., Saraiva, R., Côrte-Real, B., & Carvalho, M. ', 'artigo19.jpg', 'd', 'Cordeiro, C., Saraiva, R., Côrte-Real, B., & Carvalho, M. (2022). Como Parar de Devorar os Problemas? Estado de Arte sobre as Intervenções na Perturbação de Ingestão Alimentar Compulsiva. Revista Portuguesa de Psiquiatria e Saúde Mental, 8(3), 114-119.'),
(20, 13, 'Perturbação obsessivo-compulsiva em estudantes do ensino superior', '2018', 'Rodrigues, P. F., Ribeiro, L., Gonçalves, D., & Pinto, A. ', 'artigo20.jpg', 'a', 'Rodrigues, P. F., Ribeiro, L., Gonçalves, D., & Pinto, A. (2018). Perturbação obsessivo-compulsiva em estudantes do ensino superior: relação com a personalidade, satisfação com a vida e depressão.'),
(21, 13, 'Reconhecendo e abordando o impacto da COVID-19 na perturbação obsessivo-compulsivo', '2020', 'Shafran, R., Coughtrey, A., & Whittal, M. ', 'artigo21.jpg', 'd', 'Shafran, R., Coughtrey, A., & Whittal, M. (2020). Recognising and addressing the impact of COVID-19 on obsessive-compulsive disorder. The Lancet Psychiatry, 7(7), 570-572.'),
(22, 17, 'Avaliação da taxa de ocorrência na população adulta portuguesa', '2003', 'De Albuquerque, A., Soares, C., De Jesus, P. M., & Alves, C. ', 'artigo22.jpg', 'd', 'De Albuquerque, A., Soares, C., De Jesus, P. M., & Alves, C. (2003). Perturbação pós-traumática do stress (PTSD). Avaliação da taxa de ocorrência na população adulta portuguesa. Acta médica portuguesa, 16(5), 309-20.'),
(23, 18, 'Distress e perturbações de adaptação', '2015', 'Cabral, A. S., & Paredes, T. ', 'artigo23.jpg', 'd', 'Cabral, A. S., & Paredes, T. (2015). Distress e perturbações de adaptação. Temas Fundamentais em Psico-Oncologia, 195-204.'),
(24, 14, 'Estás a olhar para mim?', '2009', 'Carroll, A. ', 'artigo24.jpg', 'd', 'Carroll, A. (2009). Are you looking at me? Understanding and managing paranoid personality disorder. Advances in psychiatric treatment, 15(1), 40-48.'),
(25, 14, 'Alexitimia e perturbação de personalidade esquizóide são diagnósticos sinônimos?', '2013', 'Coolidge, F. L., Estey, A. J., Segal, D. L., & Marle, P. D.', 'artigo25.jpg', 'd', 'Coolidge, F. L., Estey, A. J., Segal, D. L., & Marle, P. D. (2013). Are alexithymia and schizoid personality disorder synonymous diagnoses?. Comprehensive psychiatry, 54(2), 141-148.'),
(26, 14, 'Trauma psicológico e perturbação de personalidade esquizotípica', '2008', 'Berenbaum et al.', 'artigo26.jpg', 'd', 'Berenbaum, H., Thompson, R. J., Milanak, M. E., Boden, M. T., & Bredemeier, K. (2008). Psychological trauma and schizotypal personality disorder. Journal of abnormal psychology, 117(3), 502.'),
(27, 15, 'Quais são os antecedentes adolescentes da perturbação de personalidade antissocial?', '2002', 'Loeber, R., Burke, J. D., & Lahey, B. B. ', 'artigo27.jpg', 'd', 'Loeber, R., Burke, J. D., & Lahey, B. B. (2002). What are adolescent antecedents to antisocial personality disorder?. Criminal Behaviour and Mental Health, 12(1), 24-36.'),
(28, 15, 'Processamento de emoções em perturbações de personalidade borderline', '1997', 'Levine, D., Marziali, E., & Hood, J. ', 'artigo28.jpg', 'd', 'Levine, D., Marziali, E., & Hood, J. (1997). Emotion processing in borderline personality disorders. The Journal of nervous and mental disease, 185(4), 240-246.'),
(29, 15, 'Psicopatia, género e papéis de género', '1996', 'Hamburger, M. E., Lilienfeld, S. O., & Hogben, M. ', 'artigo29.jpg', 'd', 'Hamburger, M. E., Lilienfeld, S. O., & Hogben, M. (1996). Psychopathy, gender, and gender roles: Implications for antisocial and histrionic personality disorders. Journal of Personality Disorders, 10(1), 41-55.'),
(30, 16, 'Perturbação de personalidade evitante: percepções atuais', '2018', 'Lampe, L., & Malhi, G. S. ', 'artigo30.jpg', 'd', 'Lampe, L., & Malhi, G. S. (2018). Avoidant personality disorder: current insights. Psychology research and behavior management, 55-66.'),
(31, 16, 'Perturbação de personalidade dependente', '2020', 'Simonelli, A., & Parolin, M.', 'artigo31.jpg', 'd', 'Simonelli, A., & Parolin, M. (2020). Dependent personality disorder. In Encyclopedia of Personality and Individual Differences (pp. 1048-1059). Cham: Springer International Publishing.'),
(32, 16, ' Perturbação de personalidade obsessivo-compulsivo', '2005', 'Mancebo, M. C., Eisen, J. L., Grant, J. E., & Rasmussen, S. A.', 'artigo32.jpg', 'd', 'Mancebo, M. C., Eisen, J. L., Grant, J. E., & Rasmussen, S. A. (2005). Obsessive compulsive personality disorder and obsessive compulsive disorder: clinical characteristics, diagnostic difficulties, and treatment. Annals of Clinical Psychiatry, 17(4), 197-204.');

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
(15, 4, 'Conclusão', 'Em virtude do que foi mencionado, a perturbação de pânico é caraterizada por episódios intensos de medo ou desconforto, acompanhados por repertório de sintomas físicos e emocionais. Esses episódios podem ocorrer inesperadamente ou ser desencadeados por gatilhos específicos. Existem vários modelos explicativos e terapêuticos que abordam a perturbação de pânico de diferentes perspetivas e ainda que possam diferir nas suas abordagens fornecem insights valiosos sobre a complexidade da perturbação assim como várias opções de tratamento que podem ser adaptadas a cada pessoa. '),
(16, 5, 'Introdução', 'A ansiedade social é uma perturbação caraterizada pelo medo intenso e persistente  de situações sociais ou de desempenho onde a pessoa teme ser julgada, criticada ou rejeitadas pelos outros. Esta perturbação pode prejudicar os relacionamentos, o trabalho, a saúde mental e consequentemente a qualidade de vida e, por isso, é crucial estabelecer-se guias de tratamento adequadas para melhorar a vida das pessoas afetadas, providenciando suporte e prevenindo complicações, permitindo, também, reduzir o estigma em volta da saúde mental (Rodebaught et al., 2004).'),
(17, 5, 'Terapia de Exposição', 'Este tipo de terapia, fundamental na terapia cognitivo-comportamental (TCC) tem como objetivo enfrentar situações temidas para promover mudanças nos sintomas afetivos e comportamentais. Este processo cria uma nova aprendizagem que compete, mas não substitui completamente, a resposta de medo original. O cliente e o terapeuta desenvolvem uma hierarquia de situações temidas, praticando exposições progressivas que vão das menos às mais ansiosas. É crucial que o cliente permaneça plenamente envolvido na situação temida, evitando estratégias de evitação subtil que possam minimizar a eficácia do tratamento (Rodebaught et al., 2004).'),
(18, 5, 'Conclusões', 'As evidências mostram avanços significativos em tratamentos psicossociais e farmacológicos para a perturbação de ansiedade social. Contudo, há uma lacuna na compreensão de quais tratamentos funcionam melhor para quais indivíduos. Mesmo os tratamentos mais eficazes algumas vezes não respondem e, por isso, diferentes abordagens, como a Terapia Comportamental Dialética e a Terapia Cognitiva Baseada em Mindfulness, são de interesse crescente (Rodebaught et al., 2004). '),
(19, 6, 'Introdução', 'Os autores destacam que a ansiedade social é um problema comum no grupo demográfico dos estudantes universitários e que pode afetar negativamente a qualidade de vida e o desempenho académico dos mesmos. Além disso, introduzem o conceito de incerteza em situações sociais e sugerem que os estudantes com ansiedade social enfrentam um dilema entre desejar solidão para evitar a incerteza social e desejar conexões sociais para evitar a solidão. Essa introdução estabelece as bases para o estudo, mostrando a importância de investigar como os estudantes universitários com ansiedade social lidam com a incerteza em situações sociais (Kim et al., 2022).'),
(20, 6, 'Método e Resultados', 'Para este estudo, os investigadores recolheram dados de estudantes universitários através de questionários específicos projetados para avaliar diferentes aspetos da ansiedade social e do comportamento em situações sociais. Os participantes foram divididos em dois grupos sendo um de estudantes com ansiedade social e outro de estudantes sem esse diagnóstico. Em seguida, os investigadores analisaram as respostas dos participantes para entender a sua propensão a evitar situações sociais e a procurar conexões sociais, bem como as estratégias que empregavam para lidar com a incerteza em situações sociais (Kim et al., 2022). Os resultados revelaram que os estudantes com ansiedade social apresentavam uma tendência maior de evitar situações sociais, como forma de reduzir a incerteza associada a essas interações. No entanto, paradoxalmente, esses mesmos estudantes também expressaram um forte desejo por conexões sociais para evitar a solidão. Além disso, os investigadores observaram que os participantes com ansiedade social utilizavam várias estratégias para lidar com a incerteza em situações sociais, como evitar tais situações, procurar mais informações sobre elas e procurar apoio social de amigos ou familiares (Kim et al., 2022). '),
(21, 6, 'Conclusão', 'Em virtude do que foi mencionado, os investigadores reiteram que os estudantes universitários com ansiedade social enfrentam um dilema entre desejar solidão para evitar a incerteza social e desejar conexões sociais para evitar a solidão. Este conflito interno pode levar a estratégias contraditórias de enfrentamento, como evitar situações sociais, ao mesmo tempo em que anseiam por conexões sociais. Os investigadores também enfatizam a importância de abordagens terapêuticas que possam ajudar os indivíduos a gerenciar a incerteza social e desenvolver habilidades sociais para melhorar sua qualidade de vida. Isto é especialmente relevante para estudantes universitários, onde a vida social desempenha um papel significativo no seu bem-estar geral e desempenho académico (Kim et al., 2022).'),
(22, 7, 'Introdução', 'A Perturbação de Ansiedade Generalizada (PAG) é caracterizada por preocupações crónicas e persistentes que abrangem uma variedade de áreas da vida, como família, saúde e futuro. Essas preocupações são excessivas, difíceis de controlar e geralmente estão acompanhadas por sintomas psicológicos e físicos inespecíficos. Os fatores de risco estabelecidos para a PAG incluem ser do sexo feminino, ter baixa estatura socioeconómica e ter sido exposto a adversidades na infância, como abuso físico ou sexual, negligência e problemas familiares como violência, alcoolismo e uso de drogas (Stein & Sareen, 2015). '),
(23, 7, 'Tratamentos', 'O tratamento farmacológico da PAG é eficaz na redução dos sintomas, na diminuição da incapacidade e na melhoria da qualidade de vida relacionada à saúde. Estudos apoiam a eficácia da maioria dos antidepressivos e benzodiazepínicos no tratamento da PAG. Os Inibidores Seletivos da Recaptação da Serotonina (ISRS) e os Inibidores da Recaptação da Serotonina-Norepinefrina (SNRIs) são geralmente considerados como tratamentos farmacológicos de primeira linha para a PAG. As benzodiazepinas como Diazepam ou Clonazepam (ambos de ação prolongada) também são eficazes no tratamento da PAG, no entanto, devido a preocupações com o uso indevido e dependência, alguns médicos relutam em prescrevê-los. A maioria das diretrizes recomenda que as benzodiazepinas sejam usadas apenas a curto prazo (3 a 6 meses), o que é inconsistente com a natureza crônica típica da PAG. Estas não devem ser usadas em conjunto com medicamentos opióides devido ao risco de interações medicamentosas, e, por isso, o seu uso deve ser minimizado em idosos, nos quais os riscos, como quedas, são suscetíveis de superar os benefícios (Stein & Sareen, 2015).  Outro tipo de terapia, como a terapia cognitivo-comportamental (TCC), pode ser considerada um tratamento de primeira linha para a PAG. A estrutura da terapia cognitivo-comportamental postula que pacientes com PAG tendem a superestimar o nível de perigo nos ambientes, têm dificuldade com a incerteza e subestimam a sua capacidade de lidar com a situação. A TCC envolve a reestruturação cognitiva para ajudar os pacientes a entenderem que as suas preocupações são infundadas e a terapia de exposição para permitir que os pacientes aprendam que o seu comportamento de preocupação e evitação são maleáveis, além do treino de relaxamento (Stein & Sareen, 2015).'),
(24, 8, 'Introdução e Epidemiologia', 'A Perturbação de Ansiedade Generalizada (PAG) é uma perturbação de ansiedade comum e crónica que afeta uma parcela significativa da população. A prevalência da PAG é mais alta em mulheres do que em homens e a incidência varia em diferentes grupos populacionais, mas é prevalente em todos os grupos demográficos. Fatores como a idade, a etnia e condições socioeconómicas podem influenciar a prevalência (Weisberg, 2009).'),
(25, 8, 'Apresentação Clínica', 'Os sintomas principais da PAG incluem preocupação excessiva e persistente sobre diversos aspetos da vida, como saúde, finanças, família e trabalho. Além da preocupação, os pacientes com PAG também experienciam sintomas físicos, como tensão muscular, fadiga, irritabilidade, problemas de sono e dificuldade de concentração. A gravidade dos sintomas varia de pessoa para pessoa e pode interferir significativamente nas atividades diárias e na qualidade de vida (Weisberg, 2009). A PAG frequentemente coexiste com outras perturbações mentais, como depressão, perturbação de pânico e outras perturbações de ansiedade e, a presença de comorbidades pode complicar o quadro clínico e influenciar o tratamento e o prognóstico da perturbação. O curso geralmente é crónico e recorrente com uma taxa de remissão relativamente baixa, além disso ao longo do tempo tende a ter períodos de remissão intercalados por uma recorrência de sintomas e pode ser influenciado por fatores genéticos, ambientais e psicossociais. No que concerne aos fatores de risco, um histórico familiar de perturbações ansiosas aumenta o risco de desenvolver PAG, além de stressores ambientais como eventos traumáticos ou adversidades na infância. Fatores biológicos como disfunções no sistema nervoso central e desequilíbrios químicos no cérebro, também podem contribuir para o desenvolvimento da PAG (Weisberg, 2009).'),
(26, 9, 'Evolução Histórica do Diagnóstico de Agorafobia', 'No decorrer dos anos a agorafobia tem ganho cada vez mais relevância, destacando-se a compreensão e a classificação da perturbação ao longo do tempo. Do que era considerado uma manifestação da perturbação de pânico à distinção gradualmente estabelecida entre os dois, atualmente a agorafobia é definida pelo medo intendo e persistente de situações ou locais onde a saída possa ser difícil ou embaraçosa ou onde a ajuda possa não estar disponível em caso de emergência, por exemplo espaços públicos, multidões, entre outros (Wittchen et al., 2010). '),
(27, 9, 'Desafios na avaliação e Diagnóstico', 'Ainda que seja vastamente estudada, a agorafobia apresenta um conjunto de dificuldades associadas à avaliação da perturbação, como a complexidade dos sintomas e a sobreposição com outras perturbações de ansiedade como a perturbação de pânico e, por isso, é importante uma abordagem cuidadosa e abrangente na avaliação clínica, que leve em consideração a história do paciente, sintomas específicos e possíveis fatores contribuintes, como história de trauma ou comorbidades psiquiátricas (Wittchen et al., 2010).'),
(28, 9, 'Tratamento na Agorafobia', 'Existem diferentes abordagens terapêuticas para o tratamento da agorafobia, incluindo intervenções farmacológicas e psicoterapêuticas e por isso é necessária uma discussão sobre a eficácia relativa aos diferentes modos de tratamento e a importância de uma abordagem multidisciplinar, que possa incluir psicólogos, psiquiatras, e outros profissionais de saúde mental. É inquestionável a necessidade de se personalizar o tratamento de acordo com as necessidades individuais de cada paciente, levando em consideração fatores como a gravidade dos sintomas, a presença de comorbidades e as preferências do paciente (Wittchen et al., 2010).'),
(29, 10, 'Introdução', 'O objetivo principal deste artigo é analisar criticamente o diagnóstico de fobia específica no Manual Diagnóstico e Estatístico de Transtornos Mentais (DSM-IV) e propor recomendações preliminares para sua inclusão no DSM-V, para isso os autores começam por destacar a relevância clínica e epidemiológica da fobia específica. Sendo esta uma das perturbações de ansiedade mais comuns e impactantes em termos de prejuízo funcional e qualidade de vida, a fobia específica apresenta um conjunto de critérios e sintomatologia, incluindo a presença de medo intenso e persistente de um objeto ou situação específica, resultando na evitação desse objeto ou situação, e reconhecendo que o medo é irracional ou excessivo (LeBeau et al., 2010).'),
(30, 10, 'Fobia Específica vs. Medo Normativo', 'A distinção entre fobia específica e medo normal é fundamental para compreender a natureza clínica das fobias específicas. O medo é uma resposta emocional normal e adaptativa a situações percebidas como perigosas ou ameaçadoras. Por exemplo, é comum sentir medo ao encarar uma situação de perigo iminente, como estar em num local perigoso ou próximo a um animal agressivo. Esse tipo de medo é considerado normal e até mesmo útil, pois pode ajudar na sobrevivência, promovendo ações de proteção ou evitação do perigo. Por outro lado, a fobia específica é caracterizada por um medo excessivo e irracional de um objeto ou situação particular que, em circunstâncias normais, não representaria uma ameaça significativa. Esse medo é desproporcional à realidade e pode levar a uma evitação persistente do objeto ou situação temida, mesmo que isso cause prejuízos significativos na vida da pessoa (LeBeau et al., 2010).'),
(31, 10, 'Variedade de estímulos fóbicos', 'A variedade de estímulos fóbicos possíveis é uma característica importante das fobias específicas. Uma fobia específica pode-se manifestar em relação a uma ampla gama de objetos, situações ou circunstâncias. Alguns exemplos comuns incluem: animais como cães, aranhas, cobras, ratos, insetos, entre outros, ambientes naturais como alturas (acrofobia), tempestades (ancraofobia), água (hidrofobia) ou escuridão (nictofobia), situações específicas como voar (aerofobia), estar em espaços fechados (claustrofobia), estar em locais públicos lotados (agorafobia), usar elevadores (fobia de elevadores), entre outras, outros objetos inanimados como agulhas (belonofobia), sangue (hematofobia), dentistas (odontofobia), entre outros e situações sociais como falar em público (glossofobia), interagir com estranhos (antropofobia) ou comer em público (cibofobia). Esta lista não é exaustiva e a variedade de estímulos fóbicos possíveis é vasta, refletindo a diversidade de experiências e perceções individuais. Cada pessoa pode desenvolver uma fobia específica única em relação a um objeto, situação ou circunstância particular, e a natureza da fobia pode variar em termos de intensidade e impacto funcional (LeBeau et al., 2010).'),
(32, 11, 'Introdução', 'Este artigo investiga as diferentes respostas neurais entre dois subtipos de fobia específica, no caso fobia a aranhas e fobia a injeção-sangue-ferida (ISF), através da ressonância magnética funcional (fMRI) para medir a atividade cerebral enquanto os indivíduos eram expostos a estímulos específicos das suas fobias, como imagens, e a estímulos neutros (Lueken et al., 2011).'),
(33, 11, 'Resultados', 'Ao nível da ativação neural, indivíduos com aracnofobia mostraram uma ativação significativa na amígdala, região do cérebro associada ao processamento emocional e à resposta ao medo, enquanto indivíduos com fobia de ISF apresentaram uma ativação diferente, envolvendo o córtex insular e regiões relacionadas ao processamento da dor e a respostas autonômicas.  Os padrões de ativação neural foram distintamente diferentes entre os dois subtipos de fobia específica, sugerindo que diferentes mecanismos neurais subjacentes estão envolvidos em cada tipo de fobia (Lueken et al., 2011). Assim, conclui-se que os subtipos de fobia específica, como aracnofobia e fobia de ISF, não são apenas psicologicamente diferentes, mas também apresentam diferenças neurais distintas, sendo que estas descobertas têm implicações importantes para a compreensão dos mecanismos neurais das fobias e para o desenvolvimento de intervenções específicas e eficazes para diferentes tipos de fobia. Destas implicações consideram-se a identificação de diferentes padrões neurais, que pode ajudar no desenvolvimento de tratamentos mais direcionados, como terapias de exposição personalizadas ou intervenções farmacológicas específicas para cada tipo de fobia e a especificidade dos subtipos de fobia na pesquisa e no tratamento, sublinhando que uma abordagem única para todos os tipos de fobia pode não ser a mais eficaz (Lueken et al., 2011).'),
(34, 12, 'Conceito de Perturbação de Pânico', 'A perturbação de pânico é caracterizada por ataques de pânico recorrentes e inesperados, acompanhados por preocupação persistente sobre futuros ataques ou mudanças significativas no comportamento para evitar ataques. Esta perturbação  Tem uma elevada prevalência e muitas vezes é acompanhada de outras perturbações subjacentes como a depressão ou o abuso de substâncias e por isso, a prevenção é essencial não apenas para melhorar a qualidade de vida dos indivíduos, mas também para reduzir o estigma econômico e social associado à doença.'),
(35, 12, 'Evidências de Eficácia e Limitações', 'O artigo apresenta uma revisão das evidências científicas que suportam a eficácia das várias estratégias de prevenção. Além disso, estudos mostram que intervenções baseadas na TCC são eficazes na redução da frequência e intensidade dos ataques de pânico e na melhoria da funcionalidade geral dos pacientes.  Ainda assim é apresentado um conjunto de limitações como desafios na implementação de programas de prevenção, incluindo a necessidade de recursos adequados, treino de profissionais e adesão dos participantes. '),
(36, 12, 'Conclusão', 'Embora existam desafios significativos, a prevenção da perturbação de pânico é uma área promissora que pode beneficiar inquestionavelmente indivíduos e a sociedade como um todo, através duma metodologia integrada que combine intervenções psicossociais e farmacológicas, além de políticas públicas que promovam a consciencialização e o acesso a programas de prevenção.'),
(37, 13, 'Introdução', 'A Depressão é um grave problema de saúde pública nos países industrializados desde 1996. A patologia mental tem um impacto significativo tanto para o indivíduo como para a comunidade. Antes, a gravidade das doenças era medida principalmente pela mortalidade, com pouco foco na morbidade. No entanto, o projeto GBD - Global Burden of Diseases - mudou esse panorama ao considerar tanto a mortalidade quanto a morbidade de várias patologias. Este projeto, apoiado pelo Banco Mundial e pela Organização Mundial de Saúde, visa avaliar o verdadeiro peso de 107 patologias, incluindo a depressão, através de dados epidemiológicos relacionados à incidência, prevalência, duração, gravidade, incapacidade associada, entre outros indicadores (Gusmão et al., 2005).'),
(38, 13, 'A depressão', 'O conhecimento associado às perturbações depressivas, ainda que amplo e bem explicado, contrapõe-se com a informação sobre a utilização de serviços, o acesso aos cuidados e até mesmo o seu tratamento pelos médicos. Os resultados do estudo apontam, no que concerne à prevalência em cuidados de saúde primários, que clínicos gerais efetivamente reconhecem esta perturbação e registam-na, ainda que o seu reconhecimento seja bastante inferior ao que realmente é observado por profissionais na área. Ainda assim, reconhece-se que grande parte das perturbações emocionais e dos doentes a elas associadas, ocupem uma parte considerável no que respeita ao trabalho de médicos de clínica geral e medicina familiar e outros médicos não especialistas. No que respeita à prevalência no hospital geral e ambulatório, a depressão ocupa, também, um espaço significativo em doentes com outras patologias diversas como diabetes, enfarte do miocárdio ou esclerose múltipla. Quanto à utilização dos serviços de psiquiatria a prevalência oscila, sendo que casos mais graves e por isso com maior necessidade de tratamento especializado e personalizado não ultrapassam a prevalência anualmente estabelecida. Ainda assim e oscilando de país para país, doentes assistidos por serviços de psiquiatria ou especializados em saúde mental resultam numa prevalência variável e muito baixo, muito explicado pelas várias lacunas não respondidas pelos guias de tratamento das pessoas. No que concerne às tendências temporais, esta tem sido alvo de estudos sistemáticos, ainda assim, é passível de assumir que a evolução temporal da frequências das perturbações depressivas afeta tanto pessoas do sexo masculino como feminino, ainda que esta última tenha maior taxas de incidência. Ainda assim, estudos mais recentes apontam um aumento crescente da prevalência em jovens, sobretudo do sexo masculino (Gusmão et al., 2005). '),
(39, 13, 'Fatores de Risco associados à depressão', 'Pessoas com antecedentes familiares ou pessoais de depressão correm um rsico maior de desenvolver um episódio depressivo, além disso, a depressão é cerca de duas vezes mais frequente em mulheres, independentemente dos contextos de saúde. Pessoas divorciadas, viúvas ou separadas, sobretudo homens, apresentam maior risco de depressão. Acontecimentos de vida negativos como experiências de perda, sobretudo perda parental precoce, estão associadas a um maior risco. Outro fator a ter em conta é o período pós-natal, sendo o risco duplicado para mulheres (Gusmão et al., 2005). '),
(40, 14, 'A insónia', 'Com o crescente avanço da ciência, o estudo da insónia tem sido mais conciso e a destacar desafios futuros nessa área. Com insónia falamos de um problema que inúmeras pessoas padecem, sendo esta uma condição prevalente e debilitante que impacta significativamente a saúde e a qualidade de vida dos indivíduos. A insónia é definida como uma dificuldade persistente para iniciar ou manter o sono, ou uma má qualidade do sono, resultando em prejuízos durante o dia. Afeta uma grande parte da população global, com variações de prevalência dependendo de fatores demográficos e metodologias de estudo. Sendo ela multifatorial, envolve uma combinação de fatores biológicos, psicológicos e sociais. Além disso apresenta inúmeros fatores de risco, entre eles: predisposição genética, stress, condições médicas e psiquiátricas, além de fatores comportamentais e ambientais (Riemann et al., 2022). Subjacente à insónia podem estar mecanismos neurobiológicos, como anormalidades em sistemas de neurotransmissores (como GABA e orexina) e regiões do cérebro responsáveis pelo ciclo sono-vigília, mecanismos psicofisiológicos como o aumento da ativação fisiológica e cognitiva durante a noite, frequentemente associado à preocupação e à ruminação ou mecanismos circadianos como o desalinhamento entre o ritmo circadiano interno e o ciclo sono-vigília externo (Riemann et al., 2022).'),
(41, 14, 'Diagnóstico e Tratamento', 'A avaliação da insónia envolve uma abordagem multidimensional, incluindo a história clínica detalhada como história do sono e fatores psicossociais, diários do sono e actigrafia para a monitorização objetiva dos padrões de sono e polissonografia que é utilizada, sobretudo, para excluir outros problemas de sono (Riemann et al., 2022). No que concerne aos tratamentos da insónia, a terapia cognitivo-comportamental (TCC) é considerada o tratamento de primeira linha, envolvendo técnicas para modificar pensamentos e comportamentos disfuncionais relacionados ao sono. a farmacoterapia também costuma ser prescrita, incluindo medicamentos como benzodiazepinas, agonistas dos recetores de melatonina e outros hipnóticos, ainda assim, esta metodologia de tratamento deve ser usada com cautela devido aos potenciais efeitos colaterais e risco de dependência. Existe também a hipótese de tratamentos alternativos como meditação e intervenções baseadas em mindfulness (Riemann et al., 2022). '),
(42, 15, 'A insónia crónica', 'A insónia crônica é um distúrbio comum do sono que afeta significativamente a qualidade de vida dos pacientes e é caracterizada por dificuldades em iniciar ou manter o sono, acordar cedo demais ou um sono não restaurador, ocorrendo pelo menos três vezes por semana durante um mês ou mais. O tratamento neste tipo de perturbação é crucial uma vez que fatores psicológicos são considerados como contributos para a manutenção do problema e por isso, a intervenção psicológica pode ser um complemento eficaz ao tratamento médico, proporcionando estratégias para modificar comportamentos e pensamentos disfuncionais relacionados ao sono (Clemente, 2006).'),
(43, 15, 'Intervenções Psicológicas', 'Uma das intervenções frequentemente utilizada e usado como tratamento de primeira linha é a terapia cognitivo-comportamental (TCC) além da educação sobre o sono permitindo informar os pacientes como funciona o ciclo circadiano e as consequências da privação de sono, o controlo de estímulos como estabelecer associações positivas entre a cama e o sono, limitar o tempo passado na cama para aumentar a eficácia do sono e promover hábitos saudáveis de sono, como manter um horário regular de sono e evitar substâncias que interferem no sono. As terapias de relaxamento também são bastante utilizadas, por exemplo em técnicas de relaxamento progressivo, ensinando ao paciente a relaxar gradualmente os músculos e reduzir a tensão física, o treino de respiração, sobretudo profunda, para promover um estado de relaxamento e o biofeedback, através de dispositivos, ajudando o paciente a aprender a controlar as funções fisiológicas como a frequência cardíaca e a tensão muscular (Clemente, 2006).'),
(44, 16, 'Introdução', 'Este estudo investiga as características clínicas, os aspetos polissonográficos e os resultados dos tratamentos de 77 pacientes com hipersónia idiopática (HI) através de avaliações clínicas, estudos do sono, testes de latência múltipla do sono (MSLT) e respostas aos tratamentos. '),
(45, 16, 'Principais Descobertas', 'Clinicamente, a hipersónia idiopática apresenta-se, frequentemente, com sintomas como sonolência diurna excessiva e dificuldade em despertar após longos períodos de sono. Muitos pacientes relataram sintomas de sono não reparador e dificuldade em manter a vigília durante o dia. Os estudos de sono mostraram que a maioria dos pacientes tinha um sono noturno normal ou prolongado e o MSLT revelou latências de sono reduzidas, mas sem os múltiplos inícios de sono REM típicos da narcolepsia. Os tratamentos incluíram estimulantes como modafinil e anfetaminas, que mostraram eficácia variável e a abordagem terapêutica foi adaptada individualmente, considerando a resposta e a tolerância dos pacientes aos medicamentos.'),
(46, 16, 'Conclusão', 'O estudo destaca que a hipersónia idiopática é uma condição distinta com características clínicas e polissonográficas específicas, diferindo significativamente da narcolepsia. A manutenção da HI pode ser desafiador devido à variabilidade na resposta ao tratamento, exigindo uma abordagem personalizada para otimizar os resultados para os pacientes.'),
(47, 17, 'Introdução', 'Com o avanço da tecnologia, as redes sociais foram uma crescente na vida de diversas pessoas, muito por motivos positivos, mas também acarretando aspetos negativos, por isso, é importante estudar como as plataformas de mídia social influenciam os comportamentos, perceções e tratamento de pessoas, no caso, diagnosticadas com anorexia nervosa e por isso afetando o comportamento alimentar, a autoimagem e a adesão ao tratamento. A investigação utiliza uma abordagem qualitativa, com entrevistas semiestruturadas realizadas com pacientes diagnosticados com anorexia nervosa, selecionados em clínicas especializadas em perturbações alimentares. As entrevistas abordaram temas como o uso das redes sociais, influências percebidas, e as consequências desse uso na autoimagem e no comportamento alimentar (Moraes et al., 2021).'),
(48, 17, 'Resultados', 'Os resultados revelam que as redes sociais desempenham um papel significativo na vida dos participantes. Alguns dos principais pontos identificados incluem a comparação social em que muitos participantes relataram que a exposição constante a imagens idealizadas nas redes sociais intensificava a comparação social, contribuindo para uma pioria na percepção de sua própria imagem corporal, a presença de grupos e comunidades que promovem comportamentos pró-anorexia foi identificada como um fator prejudicial, oferecendo suporte para práticas alimentares inadequadas e desestimulando a procura por tratamento e a influência de perfis de \"influencers\" que promovem dietas extremas e corpos magros foi destacada como um fator que exacerba os sintomas da anorexia nervosa. Em contrapartida, alguns participantes mencionaram que encontraram recursos de apoio para a recuperação em certas comunidades online, indicando que as redes sociais também podem ser uma ferramenta positiva quando usadas de forma adequada (Moraes et al., 2021).'),
(49, 17, 'Conclusão', 'A ambivalência das redes sociais representa um desafio no tratamento da anorexia nervosa, enfatizando a necessidade de uma abordagem crítica e consciente ao utilizar essas plataformas, tanto por pacientes quanto por profissionais de saúde. Além disso, é de ressaltar a importância de regulamentar conteúdos que podem ser prejudiciais e promover espaços que incentivem comportamentos saudáveis e suporte emocional (Moraes et al., 2021).'),
(50, 18, 'A Bulimia Nervosa', 'A bulimia nervosa é uma perturbação alimentar caracterizada por episódios recorrentes de compulsão alimentar seguidos por comportamentos compensatórios inadequados para evitar o ganho de peso. Esses comportamentos incluem o vómito autoinduzido, uso excessivo de laxantes, jejum e exercício físico excessivo. Esta perturbação faz-se acompanhar de sintomas físicos e psicológicos como a desidratação, problemas gastrointestinais, problemas dentários devido ao ácido do vómito, distúrbios menstruais, entre outros. O tratamento é crucial uma vez que, sem este, a bulimia nervosa pode levar a complicações graves de saúde, inclusive ser fatal.  Este artigo estuda a bulimia nervosa como uma perturbação alimentar grave e procura identificar tratamentos eficazes como a medicação, psicoterapia e a combinação entre ambos para melhorar o resultado dos pacientes. Para isso foi realizado um estudo com um total de 120 mulheres divididas aleatoriamente em quatro grupos de tratamento (placebo, medicação antidepressiva, terapia cognitivo-comportamental (TCC) e combinação de tratamento farmacológico com psicoterapia). A duração do tratamento foi de 16 semanas, e os participantes foram avaliados quanto à frequência dos episódios de bulimia, sintomas depressivos e outros aspetos psicopatológicos antes, durante e após o tratamento (Walsh et al., 1997).'),
(51, 18, 'Resultados', 'Os principais resultados do estudo foram os seguintes: no grupo de placebo houve uma pequena redução nos episódios bulímicos, mas os resultados não foram significativos. No grupo cujo tratamento eram antidepressivos (fluoxetina), os pacientes mostraram uma redução significativa na frequência dos episódios bulímicos e nos sintomas depressivos em comparação com o grupo placebo. No grupo da TCC, conclui-se que a terapia foi altamente eficaz na redução dos episódios bulímicos, mostrando uma melhora significativa nos sintomas. Finalmente, no grupo da combinação farmacológica com psicoterapêutica, foi apresentado maior redução na frequência dos episódios bulímicos e nos sintomas depressivos, indicando que a combinação de medicação e terapia foi a abordagem mais eficaz, concluindo então que, ainda que a fluoxetina e a TCC são tratamentos eficazes para a bulimia nervosa, a combinação de ambos é mais benéfica, sendo que a medicação pode ajudar a reduzir sintomas depressivos e a compulsão alimentar, enquanto a TCC aborda os padrões de pensamento e comportamento que sustentam a bulimia (Walsh et al., 1997).'),
(52, 19, 'A Ingestão Alimentar Compulsiva', 'A perturbação de ingestão alimentar compulsiva (PIAC) é uma condição psiquiátrica caracterizada por episódios recorrentes de ingestão compulsiva de grandes quantidades de alimentos, acompanhada por uma sensação de perda de controlo, estando associada a sérios problemas de saúde física e mental, incluindo obesidade, diabetes, depressão e ansiedade. Para estudar os métodos de tratamento disponíveis para esta perturbação, os investigadores realizaram uma procura abrangente nas bases de dados científicas para identificar estudos relevantes publicados até 2022 e, assim, analisar os resultados de intervenções farmacológicas, psicoterapêuticas e multidisciplinares (Cordeiro et al., 2022).'),
(53, 19, 'Intervenções', 'Os investigadores discutiram várias abordagens farmacológicas, incluindo o uso de antidepressivos, anticonvulsivantes e medicamentos para perda de peso. Entre os antidepressivos, os inibidores seletivos da recaptação de serotonina (ISRS) como a fluoxetina mostraram eficácia moderada. Os anticonvulsivantes, como o topiramato, também foram mencionados como potencialmente úteis, mas com efeitos colaterais significativos. Medicamentos para perda de peso, como a lisdexanfetamina, têm mostrado alguma eficácia, mas são necessários mais estudos para confirmar a sua segurança e eficácia a longo prazo. No que concerne às intervenções psicoterapêuticas, esta é destacada como a intervenção mais bem estudada e eficaz uma vez que a terapia cognitivo-comportamental (TCC) visa modificar os padrões de pensamento e comportamento que contribuem para a ingestão compulsiva. As intervenções multidisciplinares combinam intervenções farmacológicas e psicoterapêuticas com suporte nutricional e atividades físicas, programas que envolvem uma equipa de profissionais de saúde, incluindo psiquiatras, psicólogos, nutricionistas entre outros, têm mostrado ser mais eficazes no tratamento da PIAC (Cordeiro et al., 2022).'),
(54, 19, 'Conclusão', 'Os autores concluem que é necessário existir mais pesquisas para determinar as intervenções mais eficazes e para desenvolver guias de tratamento baseadas em evidências. Ainda que existam várias intervenções promissoras para o tratamento da PIAC, nenhuma se mostrou universalmente eficaz, sendo recomendado uma abordagem personalizada, considerando as características individuais de cada paciente (Cordeiro et al., 2022).'),
(55, 20, 'Introdução', 'Este artigo visa investigar a prevalência de sintomas da Perturbação Obsessivo-Compulsiva (POC) em estudantes universitários e como esses sintomas se relacionam com traços de personalidade, satisfação com a vida e níveis de depressão, para isso o estudo foi conduzido com uma amostra de estudantes universitários que completaram um questionário que incluía: o Inventário de Sintomas Obsessivo-Compulsivos de Yale-Brown (Y-BOCS) para avaliar a severidade dos sintomas de POC, o Inventário de Personalidade Neo-Five Factor (NEO-FFI) para medir traços de personalidade, a Escala de Satisfação com a Vida (SWLS) para avaliar o nível de satisfação dos participantes com suas vidas e o Inventário de Depressão de Beck (BDI) para medir os níveis de depressão (Rodrigues et al., 2018).'),
(56, 20, 'Resultados', 'Os resultados principais do estudo indicaram que, um número significativo de estudantes apresentou sintomas de POC, sugerindo que esta condição é relativamente comum nesta população, os sintomas obsessivo-compulsivos estavam positivamente correlacionados com o neuroticismo e negativamente correlacionados com a extroversão e a agradabilidade, sugerindo que estudantes com altos níveis de neuroticismo e baixos níveis de extroversão e agradabilidade são mais propensos a apresentar sintomas de POC. Houve uma correlação negativa entre sintomas obsessivo-compulsivos e satisfação com a vida, indicando que estudantes com mais sintomas de POC tendem a ser menos satisfeitos com suas vidas e, sintomas de POC foram positivamente correlacionados com níveis mais altos de depressão, sugerindo uma forte relação entre POC e depressão nessa amostra de estudantes (Rodrigues et al., 2018).');
INSERT INTO `conteudo_artigo` (`conteudo_artigo_id`, `artigo_id`, `ponto`, `texto`) VALUES
(57, 20, 'Conclusão', 'Os investigadores afirmam que os resultados deste estudo são congruentes com a literatura já existente e que existe uma elevada comorbilidade entre a POC e a depressão, bem como uma relação significativa entre a POC e determinados traços de personalidade. Além disso, a insatisfação com a vida entre estudantes com POC pode ser entendida à luz da interferência dos sintomas obsessivo-compulsivos nas atividades diárias e no bem-estar geral. Os autores chamam, ainda, a atenção às instituições de ensino superior que devem estar atentas à saúde mental dos alunos, oferecendo apoio psicológico e estratégias para aqueles que sofrem de POC, especialmente considerando a interação entre a POC, depressão e satisfação com a vida (Rodrigues et al., 2018).'),
(58, 21, 'Introdução', 'A pandemia de covid-19, com as suas medidas de contenção e aumento do foco de higiene criou um ambiente que exacerba os sintomas da Perturbação Obsessivo-Compulsiva (POC), destacando o medo da contaminação e as recomendações para a sucessiva lavagem das mãos e distanciamento social, intensificando as obsessões e compulsões relacionadas à limpeza e ao contágio, comuns em pacientes com POC. A pandemia veio, não só, validar esses medos, como tornar difícil distinguir comportamentos apropriados e excessivos. Face a isto a terapia cognitivo-comportamental (TCC) e a terapia de exposição com prevenção de resposta (EPR) precisaram de ser ajustadas para não contradizer as diretrizes de saúde pública. Estratégias como a importância de os profissionais de saúde mental manterem um comunicação clara sobre as diferenças entre medidas de seguranças realistas e compulsões irracionais são cruciais, bem como a teleterapia e a necessidade de treinar os terapeutas para os novos desafios impostos pela pandemia (Shafran et al., 2020). '),
(59, 21, 'Recomendações', 'Os investigadores fornecem um conjunto de recomendações práticas para ajudar pacientes diagnosticados com POC durante a pandemia, como: fornecer informações precisas e atualizadas para ajudar os pacientes a entenderem as medidas de segurança recomendadas e a diferença entre precauções razoáveis e comportamentos compulsivos, garantir que os pacientes tenham acesso contínuo a tratamentos, seja através de telemedicina ou consultas presenciais quando possível, adaptar as técnicas de TCC e EPR para o contexto da pandemia, focando em reduzir a ansiedade de forma segura e manter uma comunicação aberta entre pacientes e terapeutas para abordar medos e ansiedades específicos relacionados à COVID-19, concluindo assim que, com adaptações adequadas e suporte contínuo é possível mitigar os impactos associados à pandemia de covid-19 (Shafran et al., 2020).'),
(60, 22, 'A Perturbação de Stress Pós-Traumático', 'A Perturbação Pós-Traumática do Stress (PTSD), é uma perturbação mental que pode ocorrer após a exposição a eventos traumáticos e vem acompanhada de sintomas como reviver o trauma, evitar lembranças do evento, alterações negativas no pensamento e humor, e reatividade aumentada. Este estudo avaliou a prevalência da PTSD numa amostra da população adulta portuguesa, aplicando questionários padronizados e validados internacionalmente para a deteção de PTSD, incluindo escalas de auto-relato e entrevistas estruturadas para garantir uma avaliação precisa e confiável. A recolha de dados foi conduzida por profissionais treinados, garantindo a consistência na aplicação dos questionários e a confidencialidade das respostas (Albuquerque et al., 2003).'),
(61, 22, 'Resultados e Conclusões', 'Os resultados indicam que a prevalência de PTSD na população adulta portuguesa é significativa, mostrando a percentagem de indivíduos afetados, bem como variações de acordo com diferentes grupos demográficos (idade, gênero, etc.). Foram também identificados fatores associados à ocorrência de PTSD, incluindo a exposição a eventos traumáticos específicos, histórico de saúde mental, e características sociodemográficas, bem como uma descrição detalhada dos sintomas mais comuns observados entre os participantes diagnosticados com PTSD e o impacto da mesma na vida diária destas pessoas. Estas percentagens foram comparadas com outros países, discutindo possíveis razões para semelhanças e diferenças observadas, além disso é clarificada uma necessidade de maior atenção e recursos para o diagnóstico e tratamento do PTSD bem como recomendações feitas para a implementação de programas de intervenção e apoio (Albuquerque et al., 2003).'),
(62, 23, 'Distress e Adaptação', 'O \"distress\" é um termo usado para descrever uma ampla gama de reações emocionais e sociais negativas relacionadas ao stress, neste caso associado ao cancro. Este artigo explora os diferentes aspetos do distress, incluindo os seus sintomas, causas e impacto na qualidade de vida dos pacientes. Além disso, o artigo aborda as perturbações de adaptação, que são reações emocionais mal adaptativas a situações stressantes, como o diagnóstico e tratamento do cancro. Essas perturbações podem incluir ansiedade, depressão, medo da recorrência, entre outros sintomas psicológicos (Cabral & Paredes, 2015).'),
(63, 23, 'Recomendações e Conclusão', 'As investigadoras fornecem uma análise detalhada das estratégias de avaliação e intervenção para lidar com o distress e as perturbações de adaptação em pacientes com doenças oncológicas, destacando a importância da abordagem multidisciplinar, que envolve profissionais de saúde mental, médicos, enfermeiros e assistentes sociais, para fornecer suporte abrangente aos pacientes. Além disso enfatizam a necessidade de uma comunicação eficaz entre os profissionais de saúde e os pacientes, a fim de identificar precocemente os sintomas de distress e perturbações de adaptação e fornecer o tratamento adequado (Cabral & Paredes, 2015).'),
(64, 24, 'A Perturbação Paranóide da Personalidade', 'A Perturbação Paranóide da Personalidade (PPP) é descrita como uma condição caracterizada por desconfiança generalizada e suspeita dos outros, sem justificativa adequada, interpretando as ações dos outros como maliciosas e dificuldade em confiar nos outros, resultando em relações interpessoais problemáticas e isolamento social. Pessoas com PPP acreditam que os outros estão a tentar enganá-las ou prejudicá-las, são altamente sensíveis a críticas e geralmente interpretam comentários inofensivos como insultos ou ataques, têm dificuldade em mudar as suas crenças, mesmo diante de evidências contrárias, tendem a levar as coisas muito a sério e têm dificuldades em relaxar ou se divertir e a desconfiança constante leva ao isolamento e a problemas significativos nas relações pessoais e profissionais (Carroll, 2009).'),
(65, 24, 'Causas e Tratamento', 'As causas da PPP são complexas e multifatoriais, incluindo fatores genéticos, biológicos e ambientais, bem como potenciais experiências de infância, como abuso ou negligência, aumentando o risco de desenvolver a perturbação. Tratar este tipo de perturbação é especialmente desafiador uma vez que existe uma elevada desconfiança dos pacientes em relação aos profissionais de saúde, ainda assim, a terapia cognitivo-comportamental (TCC) é frequentemente utilizada para ajudar os pacientes a reconhecer e modificar padrões de pensamento distorcidos, podem também ser introduzidos medicamentos antipsicóticos ou antidepressivos para o alívio de determinados sintomas e terapias de grupo e familiares, úteis para melhorar as habilidades interpessoais e fornecer apoio aos familiares. A construção de uma relação terapêutica de confiança é essencial, e os terapeutas devem ser consistentes, honestos e transparentes nas suas interações (Carroll, 2009).'),
(66, 25, 'Alexitimia e Perturbação Esquizóide da Personalidade', 'Alexitimia é caracterizada pela dificuldade em identificar e descrever emoções, bem como por um pensamento orientado externamente. A Perturbação Esquizóide da Personalidade (PEP), por sua vez, envolve um padrão persistente de distanciamento das relações sociais e uma gama restrita de expressões emocionais em contextos interpessoais. Dada a sobreposição nos sintomas, os autores do artigo exploram se estes conceitos são realmente distintos ou se podem ser vistos como sinônimos. Para isso foi utilizada uma amostra de 1526 adultos que responderam a questionários como: o Inventário de Personalidade para DSM-IV (PDI-IV) e a Escala de Alexitimia de Toronto (TAS-20) (Coolidge et al., 2013). '),
(67, 25, 'Resultados e Conclusões', 'Os resultados mostraram que a pontuação média para a PEP foi significativamente correlacionada com as pontuações de alexitimia, especialmente nas subescalas de dificuldade em identificar sentimentos e dificuldade em descrever sentimentos. No entanto, a análise fatorial revelou que os itens das duas escalas carregavam em fatores distintos, sugerindo que, embora relacionadas, a alexitimia e a PEP não são idênticos. A sobreposição pode ser explicada pelo facto de que ambas as condições envolverem défices na compreensão e expressão das emoções. No entanto, as diferenças nos fatores subjacentes sugerem que ambas representam construtos separados, ainda que relacionados. Esta distinção é inquestionável para o diagnóstico e tratamento, uma vez que cada condição pode necessitar de abordagens terapêuticas diferentes (Coolidge et al., 2013).'),
(68, 26, 'Introdução', 'O artigo explora a relação entre trauma psicológico e a Perturbação Esquizotípica da Personalidade  (PEP), sendo esta última caraterizada por um padrão de desconforto social, cognições e perceções distorcidas, e comportamento excêntrico. O objetivo deste estudo é perceber se a exposição a eventos traumáticos está associada ao desenvolvimento de características esquizotípicas. Para isso os investigadores utilizaram uma amostra de participantes de diferentes contextos e foram utilizados questionários como: o Schizotypal Personality Questionnaire (SPQ) para medir os traços de personalidade esquizotípica, e o Traumatic Life Events Questionnaire (TLEQ) para avaliar as experiências traumáticas (Berenbaum et al., 2008). '),
(69, 26, 'Resultados e Conclusões', 'Os resultados indicaram uma correlação significativa entre a exposição a traumas psicológicos e a presença de traços de personalidade esquizotípicos e por isso conclui-se que eventos traumáticos que envolvem abuso emocional ou físico, negligência, ou violência doméstica relatam uma associação forte com características de PEP. Além disso, indivíduos que relataram traumas apresentaram maiores níveis de dissociação e cognições distorcidas, que são componentes centrais da PEP. A gravidade e a frequência dos eventos traumáticos também foram fatores importantes, com traumas mais severos e frequentes associados a níveis mais elevados de traços esquizotípicos (Berenbaum et al., 2008). Em virtude do que foi mencionado, o trauma psicológico pode atuar como um fator de risco significativo para o desenvolvimento de traços esquizotípicos, possivelmente através de mecanismos como a dissociação e a distorção das cognições. Este reconhecimento permite melhorar as abordagens terapêuticas destacando a importância de abordar experiências traumáticas no tratamento de pacientes com PEP (Berenbaum et al., 2008).'),
(70, 27, 'Introdução', 'Neste artigo os autores pretendem investigar os antecedentes da Perturbação Antissocial da Personalidade (PAP) na fase da adolescência, enfatizando a importância de identificar fatores precoces que possam prever a manifestação da PAP na vida adulta, com o objetivo de desenvolver intervenções preventivas. Para isso foi realizada uma revisão sistemática da literatura existente sobre o desenvolvimento de comportamentos antissociais e fatores de risco associados (Loeber et al., 2002). '),
(71, 27, 'Principais Descobertas', 'Crianças que exibem comportamentos antissociais persistentes desde a infância têm maior probabilidade de desenvolver PAP, sendo que a persistência desses comportamentos é um forte indicador de risco, enquanto comportamentos antissociais que começam na adolescência, mas não persistem, são menos preditivos. Crianças com temperamento difícil e alta impulsividade estão em maior risco e com baixo QI e dificuldades académicas estão altamente associadas a um maior risco de desenvolver esta perturbação enquanto adultos. Um ambiente familiar desfavorável também é considerado um precedente, como abuso, negligência ou desorganização familiar, além disso, pais com comportamento antissocial ou abuso de substâncias aumentam o risco nos filhos de desenvolver PAP mais tarde. Adolescentes que se associam a pares delinquentes têm maior probabilidade de desenvolver PAP, que também está associada a um baixo estatuto socioeconómico e viver em áreas de elevada criminalidade (Loeber et al., 2002).  Em virtude do que foi mencionado, a presença de múltiplos fatores de risco aumenta a probabilidade de desenvolvimento de PAP. Os autores enfatizam a importância de intervenções precoces e abrangentes que visem não apenas o indivíduo, mas também a família e o contexto social, podendo assim tornarem-se eficazes na prevenção e desenvolvimento da perturbação (Loeber et al., 2002).'),
(72, 28, 'Perturbação Borderline da Personalidade', 'A Perturbação Borderline da Personalidade (PBP) é caracterizada sobretudo por instabilidade emocional, relacionamentos interpessoais turbulentos e uma autoimagem distorcida. Posto isto, o objetivo do estudo passa por perceber se os pacientes com diagnóstico de PBP têm dificuldades específicas no processamento emocional em comparação com indivíduos sem a perturbação. Para isso foram utilizados uma variedade de métodos, incluindo questionários e testes psicológicos, para avaliar a capacidade dos participantes de reconhecer e responder a diferentes estímulos emocionais (Levine et al., 1997). '),
(73, 28, 'Resultados e Conclusões', 'Os resultados revelaram diferenças significativas no processamento emocional entre os grupos com PBP e os grupos sem a perturbação. Os pacientes com PBP exibiram maior dificuldade em reconhecer e regular emoções, além de demonstrarem respostas emocionais mais intensas e instáveis, contribuindo para a sintomatologia, como a impulsividade e o comportamento autolesivo. Os investigadores destacaram ainda que este tipo de implicações clínicas deve ser considerado em terapia e por isso focada no desenvolvimento de habilidades de regulação emocional (Levine et al., 1997).'),
(74, 29, 'Psicopatia e Perturbação Histriónica da Personalidade', 'A psicopática é caraterizada por traços como falta de empatia, manipulação e comportamento impulsivo, podendo ser influenciada por fatores sociais, por exemplo questões de género. Por sua vez, a Perturbação Histriónica da Personalidade (PHP) é caracterizada por emoções e comportamentos dramáticos e excessivamente atenciosos, procurando constantemente chamar a atenção para si próprio. Posto isto, o objetivo principal deste estudo é perceber a relação entre psicopatia, e papéis de género, e como esses se relacionam com as perturbações de personalidade antissocial e histriónica. Para isso os autores fizeram uma revisão de literatura de como o género pode moldar o desenvolvimento e a expressão da psicopatia de maneiras específicas para homens e mulheres e como essas diferenças podem influenciar a manifestação de traços psicopáticos e estar ligadas a perturbações de personalidade antissocial e histriónica (Hamburger et al., 1996).'),
(75, 29, 'Resultados e Conclusões', 'Os resultados sugerem que, embora a psicopatia possa ser mais comumente associada aos homens, as mulheres também podem exibir traços psicopáticos, embora de maneira diferente e por isso, as expectativas sociais de género podem influenciar a expressão desses traços em ambos os sexos e afetar o diagnóstico e tratamento de perturbações de personalidade. Ou seja, é importante considerar as influências sociais, como as normas de género, ao examinar perturbações de personalidade sugerindo uma compreensão mais aprofundada dessas influências e levando a abordagens mais eficazes no diagnóstico e tratamento dessas perturbações (Hamburger et al., 1996).'),
(76, 30, 'A Perturbação Evitante da Personalidade', 'A Perturbação Evitante da Personalidade (PEP) é definida por um padrão de inibição social, sentimentos de inadequação e hipersensibilidade à avaliação negativa e por isso é caraterizado como uma perturbação crónica e debilitante. Estas pessoas geralmente evitam atividades sociais e profissionais que envolvam contacto interpessoal significativo devido ao medo de críticas, desaprovação ou rejeição (Lampe & Malhi, 2018). '),
(77, 30, 'Caraterísticas Clínicas', 'A PEP é uma perturbação relativamente comum e com uma prevalência de cerca de 2 e 5% da população em geral. É por isso altamente comórbidas com outras perturbações, como de ansiedade ou depressão. A etiologia da PEP é multifatorial e por isso envolvendo tanto fatores genéticos, como a hereditariedade, ou ambientais como experiências de rejeição ou críticas na infância. A neurobiologia afirma que a PEP pode estar associada a áreas do cérebro envolvidas no processamento de emoções e respostas ao medo, como a amígdala e o córtex pré-frontal (Lampe & Malhi, 2018).'),
(78, 30, 'Abordagens Terapêuticas', 'A terapia cognitivo-comportamental (TCC) é a abordagem terapêutica mais bem documentada e eficaz para a PEP, focada em modificar padrões de pensamento distorcidos e comportamentos evitativos, além de desenvolver habilidades sociais. Embora não haja medicamentos especificamente aprovados para a PEP, antidepressivos, especialmente inibidores seletivos da recaptação de serotonina (ISRS), podem ser úteis para tratar sintomas comórbidos de depressão e ansiedade. Além destas, abordagens como a terapia psicodinâmica e a terapia de grupo também podem ser benéficas, ajudando os pacientes a explorar as raízes emocionais dos seus medos e a desenvolver conexões sociais num ambiente seguro e estruturado (Lampe & Malhi, 2018).'),
(79, 31, 'A Perturbação Dependente da Personalidade', 'A Perturbação Dependente da Personalidade (PDP) é caracterizada por uma necessidade excessiva de cuidado por parte dos outros, resultando num comportamento submisso e apegado. Indivíduos com esta perturbação têm, muitas vezes, dificuldade em tomar decisões diárias sem uma quantidade excessiva de conselhos e garantias de outras pessoas (Simonelli & Parolin, 2020).'),
(80, 31, 'Impacto e Consequências', 'O desenvolvimento desta perturbação pode ser influenciado por uma combinação de fatores genéticos, ambientais e de desenvolvimento, sendo sugerido por vários estudos o papel das experiências da infância como ter pais sobreprotetores ou controladores ou um apego inseguro enquanto criança. A PDP pode ter um impacto significativo na vida do indivíduo, afetando as suas relações interpessoais e a sua capacidade de funcionar de forma independente, podendo levar a um comportamento excessivamente dependente que pode sobrecarregar amigos e parceiros e levar a conflitos e ruturas, dificuldades em tomar decisões independentes e assumir responsabilidades, prejudicando o desempenho no trabalho e oportunidades de carreira e ainda a coexistência com outras perturbações (Simonelli & Parolin, 2020). '),
(81, 31, 'Tratamento', 'O tratamento para esta perturbação envolve, geralmente, psicoterapia, com foco na terapia cognitivo-comportamental (TCC) para ajudar os indivíduos a desenvolver habilidades de enfrentamento mais adaptativas e a aumentar a sua independência, proporcionando um ambiente seguro e de apoio para explorar medos e ansiedades relacionados à independência. Em casos específicos a prescrição de fármacos pode ser necessária para atenuar sintomas de ansiedade ou depressão (Simonelli & Parolin, 2020).  O prognóstico para pessoas diagnosticadas com PDP pode variar, mas com tratamento adequado, muitos são capazes de fazer progressos significativos na construção de uma vida mais independente e satisfatória. No entanto, a cronicidade e a gravidade dos sintomas podem afetar o curso e a resposta ao tratamento (Simonelli & Parolin, 2020).'),
(82, 32, 'Perturbação Obsessivo-Compulsiva vs. Perturbação Obsessivo-Compulsiva da Personalidade', 'Apesar de compartilharem algumas caraterísticas, a Perturbação Obsessivo-Compulsiva (POC) e a Perturbação Obsessivo-Compulsiva da Personalidade (POCP) são bastante diferentes e é importante compreender essas diferenças nos padrões de comportamento para se realizar um bom diagnóstico e um bom guia de tratamento. A POC é caraterizada por obsessões (pensamentos, impulsos ou imagens repetitivas e indesejadas) e compulsões (comportamentos repetitivos ou atos mentais que uma pessoa sente que deve realizar) e os sintomas causam um sofrimento significativo e interferem na vida diária. Por sua vez, a POCP é caraterizada por um padrão pervasivo de preocupação com ordem, perfeccionismo e controlo mental e interpessoal, à custa de flexibilidade, abertura e eficiência, sendo que as pessoas com esta perturbação podem não perceber que o seu comportamento é problemático. A sobreposição de sintomas entre a POC e a POCP pode dificultar o diagnóstico diferencial uma vez que, pacientes com POC podem apresentar características obsessivas semelhantes às da POCP, como a preocupação com detalhes e a rigidez, mas os comportamentos da POC são geralmente egodistónicos (em conflito com o self), enquanto os comportamentos da POCP são egossintónicos (percebidos como parte do self) (Mancebo et al., 2005)'),
(83, 32, 'Tratamento e Evidências', 'O tratamento de primeira linha para a POC inclui a terapia cognitivo-comportamental (TCC) com foco na exposição e prevenção de resposta (EPR), e medicamentos como inibidores seletivos de recaptação de serotonina (ISRSs). Na POCP o tratamento é mais desafiador devido à natureza egossintónica dos sintomas, ainda assim pode incluir a TCC na flexibilidade cognitiva e comportamental, assim como terapia psicodinâmica. A terapia medicamentosa pode ser usada, mas não é tão eficaz como na POC (Mancebo et al., 2005). Os autores deste artigo realizaram uma revisão de literatura que mostram a prevalência da co-ocorrência da POC e da POCP, indicando que uma percentagem significativa de pacientes com POC também atende aos critérios para POCP, complicando o tratamento, pois os pacientes podem ter dificuldades em aceitar a necessidade de mudança (característica da POCP) ao mesmo tempo que experimentam ansiedade intensa (característica da POC) (Mancebo et al., 2005).');

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
(1, 1, 'O que é a personalidade?', 'A personalidade é um conjunto de características que cada pessoa tem e que corresponde a padrões de comportamentos, de emoções e de conhecimentos do mundo que a rodeia (cognitivos). Por outras palavras, é a forma habitual de pensar, sentir e agir de cada um. Alguns exemplos de características de personalidade que facilmente reconhecemos nos outros ou em nós são, por exemplo, ser extrovertido, organizado, pessimista, criativo ou desconfiado.'),
(2, 1, 'O que é uma perturbação da personalidade?', 'Uma perturbação da personalidade é uma maneira de pensar, sentir e agir que representa um desvio extremo em relação aos padrões sociais e culturais. Por isso a pessoa tem dificuldade em relacionar-se com os outros e em adaptar-se a situações do dia-a-dia, tornando-se pouco funcional. Isso traz quase sempre sofrimento — tanto ao próprio, como aos que estão à sua volta. As perturbações de personalidade não são raras: podem afetar até 15% da população.'),
(3, 1, 'Mas ter alguns destes traços significa que se tem uma perturbação?', 'Não. Quase toda a gente tem algum destes traços de personalidade, sem que isso signifique que tem uma perturbação.'),
(4, 2, 'O que é a saúde mental?', 'Estima-se que uma em cada cinco pessoas em Portugal tenha uma doença mental. A depressão é a que mais afeta os portugueses. As \"doenças invisíveis\" são muitas vezes a razão pela qual as pessoas são vítimas de olhares e comentários discriminatórios de colegas, amigos e familiares.'),
(5, 2, 'Os sinais de alerta', 'Isolamento, alienação, apatia, preocupação, medo e tristeza, cansaço, ansiedade e agressividade são palavras que podem estar associadas a perturbações da saúde mental.'),
(6, 2, 'Que tratamento deve ser feito?', 'Existem várias formas de tratar doentes com perturbações mentais. A escolha do tratamento e a sua duração são definidos por um profissional especializado e vão sempre depender do quadro clínico de cada paciente.'),
(7, 3, 'A quem e onde pedir ajuda?', 'As perturbações mentais resultam de muitos fatores que têm a sua base física no cérebro. Já sabemos que podem afetar todos, em toda a parte. E sabemos também que podem ser tratadas eficazmente.\r\n\r\nÉ, por isso, fundamental manter-se informado e estar atento e, aos primeiros sinais de alerta, pedir ajuda.'),
(8, 3, 'Que tratamento deve ser feito?', 'Existem várias formas de tratar doentes com perturbações mentais. A escolha do tratamento e a sua duração são definidos por um profissional especializado e vão sempre depender do quadro clínico de cada paciente.'),
(9, 4, 'Os traumas e as consequências', '\"Grande parte poderá ter comportamentos desviantes, como dificuldade em estabelecer limites e regras. Depois há outros que têm outras condicionantes do ponto de vista mental, com questões associadas a depressão ou do foro da personalidade, questões um bocadinho mais pesadas que implicam a necessidade de psicofarmacologia\"'),
(10, 4, 'Sinais de alerta: quando é preciso pedir ajuda', 'Os sinais de alerta nem sempre são fáceis de identificar, em especial nos mais novos. Os pais e a comunidade escolar devem estar atentos.\r\n\r\nHá crianças que \"não têm a capacidade de verbalizar, apenas se manifestam pelo choro ou outro tipo de mal-estar\", por isso, \"quando a criança está sempre a chorar, e parece não haver nada que a console, é preciso estar atento\"'),
(11, 4, 'Os pais ansiosos e \"super cuidadosos\"', '\"Muitas vezes é como se estivessemos a remar contra a maré. Estamos a tentar que a criança ou jovem interiorize e assuma determinadas rotinas e em casa isso é tudo alterado e nada é compreendido. Os pais são a maior referência que as crianças têm. Se os próprios pais não acreditam ou não estão sensibilizados para um determinado problema, o natural é que a criança também duvide que haja outras pessoas que queiram genuinamente ajudá-la\".'),
(12, 5, 'O que é a solidão?', 'A solidão é um sentimento provocado pela falta de contacto com outras pessoas — ou com as pessoas com quem gostaríamos de estar mais frequentemente. É também uma sensação que pode estar relacionada com a ideia de se estar isolado e pode interferir com a nossa qualidade de vida.'),
(13, 5, 'Há vários tipos de solidão?', 'Sim. Os especialistas referem geralmente dois tipos de solidão: uma solidão social, caracterizada por menos relações com família, amigos e colegas do que aquelas que gostaríamos de ter, e uma solidão emocional, quando não temos relacionamentos de intimidade que permitam partilhas intensas.'),
(14, 5, 'Como é que a solidão afeta a saúde mental?', 'A solidão prolongada tem um impacto muito significativo na saúde e pode ser um fator de risco para desenvolver uma doença mental. Um relatório publicado em 2023 pelo cirurgião-geral dos EUA [a autoridade máxima operacional de saúde pública do país, equivalente à Direção-Geral de Saúde em Portugal], refere que probabilidade de desenvolver depressão é mais do dobro entre pessoas que relatam sentir-se sozinhas com frequência, em comparação com aquelas que raramente ou nunca se sentem sós.'),
(15, 6, 'Quando faz sentido procurar ajuda?', 'Para Fernando Mesquita, psicólogo clínico e terapeuta sexual, a intervenção de um sexólogo é indicada em casos de disfunções sexuais ou para casais com dificuldades como “discrepância no desejo e expectativas, insatisfação sexual, situações de trauma sexual, dificuldades de comunicação ou intimidade, mudanças nos padrões de comportamento sexual e problemas relacionados com eventos de vida significativos, bem como com a orientação sexual e identidade de género”.'),
(16, 6, 'Como é que a saúde mental e a sexualidade se influenciam?', 'Influenciam-se mutuamente: ter uma perturbação mental, como depressão ou ansiedade, pode afetar a sexualidade, mas os problemas sexuais também podem ter um impacto na saúde mental, agravando outras doenças ou contribuindo para o seu desenvolvimento.\r\n\r\nTomando como exemplo a depressão, Fernando Mesquita refere que “frequentemente está associada a alterações na resposta sexual, como dificuldades na excitação, orgasmo e desejo”, sendo que, além disso “alguns medicamentos para a depressão apresentam efeitos colaterais que afetam a função sexual”.\r\n\r\nPor outro lado, a influência da sexualidade na saúde mental é muitas vezes subestimada e “pessoas que enfrentam desafios na esfera sexual, como disfunções sexuais ou insatisfação, podem experimentar um aumento de stress, ansiedade ou mesmo depressão”.');

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
(4, 'Atividades de Alongamento', 'alongamento.png', 'Mindfulness é definida como uma forma específica de atenção plena – concentração no momento atual, intencional, e sem julgamento. Significa estar plenamente em contato com a vivência do momento, sem estar absorvido por elaMindfulness é definida como uma forma específica de atenção plena – concentração no momento atual, intencional, e sem julgamento. Significa estar plenamente em contato com a vivência do momento, sem estar absorvido por ela\r\n\r\n\r\n\r\n\r\n');

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
(1, 4, 'Rodar a cabeça', 'alongamento1.webp', '', 'https://greatist.com/fitness/daily-stretching-routine#Your-15-minute-daily-stretching-routine'),
(2, 4, 'Rodar os ombros', 'alongamento2.webp', '', ''),
(3, 4, 'Alongamento de braços e abdominais', 'alongamento3.webp', '', ''),
(4, 3, 'Gato-Vaca (Marjaryasana-Bitilasana)', 'yoga1.webp', '', 'https://www.yogajournal.com/practice/yoga-sequences/beginner-sequence-to-root-ground-your-practice/'),
(5, 3, 'Posição de criança (Balasana)', 'yoga2.webp', '', ''),
(6, 3, 'Posição de montanha (Tadasana)', 'yoga3.webp', '', ''),
(7, 2, 'Ver um filme ou série', 'teste2.png', '', 'https://saudemental.p5.pt/profile/bem-estar/module/atividades-de-bem-estar'),
(8, 2, 'Assistir/acompanhar algum desporto', 'teste2.png', '', ''),
(29, 1, 'Mindfulness – Atenção à Respiração', '', 0x4d696e6466756c6e65737320e28093204174656ec3a7c3a36f20c3a02052657370697261c3a7c3a36f2e6d7033, 'https://saudemental.p5.pt/profile/relaxamento/module/relaxamento'),
(30, 1, 'Mindfulness – Body Scan', '', 0x4d696e6466756c6e65737320e2809320426f6479205363616e2e6d7033, ''),
(32, 1, 'Mindfulness – Explorar Sensações e Pensamentos Difíceis', '', 0x4d696e6466756c6e65737320e28093204578706c6f7261722053656e7361c3a7c3b5657320652050656e73616d656e746f7320446966c3ad636569732e6d7033, ''),
(33, 1, 'Relaxamento Muscular Progressivo', '', 0x52656c6178616d656e746f204d757363756c61722050726f677265737369766f2e6d7033, ''),
(34, 1, 'Respiração Diafragmática', '', 0x52657370697261c3a7c3a36f20446961667261676dc3a1746963612e6d7033, '');

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
(18, 'Perturbação de Ajustamento', 'teste', 'teste', 'teste', 'teste', '');

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
-- Estrutura da tabela `lembrete`
--

CREATE TABLE `lembrete` (
  `lembrete_id` int(11) NOT NULL,
  `utilizador_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `mensagem` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lembrete`
--

INSERT INTO `lembrete` (`lembrete_id`, `utilizador_id`, `data`, `horario`, `mensagem`) VALUES
(27, 18, '2024-06-07', '14:52:00', 'teste');

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
(27, 1035944128, 1703689423, 'ola'),
(28, 1035944128, 1703689423, 'ola'),
(29, 1414583001, 1703689423, 'ola, tudo bem?'),
(30, 1703689423, 1414583001, 'ola, comigo sim e contigo?'),
(31, 1703689423, 1414583001, 'também');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `noticias_id` int(11) NOT NULL,
  `titulo` varchar(1000) NOT NULL,
  `data_publicacao` date NOT NULL,
  `autor` varchar(1000) NOT NULL,
  `img_noticia` mediumtext NOT NULL,
  `conteudo_texto` varchar(1000) NOT NULL,
  `fonte` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`noticias_id`, `titulo`, `data_publicacao`, `autor`, `img_noticia`, `conteudo_texto`, `fonte`) VALUES
(1, 'O que são perturbações da personalidade?', '2024-04-20', 'Sofia Teixeira', 'noticia1.webp', 'Há dez tipos de personalidade que a medicina considera uma perturbação, quer pelo desvio em relação aos padrões habituais, quer pelo sofrimento que provocam à pessoa e aos que estão à volta.', 'https://observador.pt/explicadores/o-que-sao-perturbacoes-da-personalidade-oito-respostas-sobre-pessoas-diferentes-do-habitual-e-o-sofrimento-que-tem-e-provocam-nos-outros/'),
(2, 'Vamos falar de saúde mental', '2020-10-09', 'Sandra Varandas, Bárbara Ferreira e Inês M. Borges', 'noticia2.webp', 'Porque é importante e muitas vezes desvalorizada. Porque devemos cuidar dela. E porque sem ela surgem as perturbações mentais que afetam a vida de milhões de pessoas no mundo.\r\nA doença mental não acontece só aos outros. De acordo com a Organização Mundial da Saúde, uma em cada quatro pessoas será afetada por uma perturbação mental em determinada fase da vida.', 'https://sicnoticias.pt/especiais/saude-mental/2020-10-09-Vamos-falar-de-saude-mental-481aafab'),
(3, 'Saúde mental: deixar de sofrer em silêncio', '2020-10-13', 'Sandra Varandas e Bárbara Ferreira', 'noticia3.webp', 'Pedir ajuda aos amigos, aos familiares, ao médico de família ou ao psicólogo é o grande passo para a recuperação.\r\nA doença mental não acontece só aos outros. De acordo com a Organização Mundial da Saúde, uma em cada quatro pessoas será afetada por uma perturbação mental em determinada fase da vida.', 'https://sicnoticias.pt/especiais/saude-mental/2020-10-13-Saude-mental-deixar-de-sofrer-em-silencio-46db9dc6'),
(4, 'Como está a saúde mental das crianças e dos jovens?', '2020-10-10', 'Rita Rogado, Sandra Varandas e Diogo Sentieiro', 'noticia4.webp', 'Vinte por cento das crianças e dos adolescentes têm, pelo menos, uma perturbação mental, de acordo com a Organização Mundial de Saúde. Em Portugal, quase 31% dos jovens têm sintomas depressivos, a maioria moderados ou graves. Os psicólogos dizem que estes números são preocupantes, mas os sinais de alerta nem sempre são fáceis de identificar, por isso os pais e a comunidade escolar devem estar atentos.', 'https://sicnoticias.pt/especiais/saude-mental/2020-10-10-Como-esta-a-saude-mental-das-criancas-e-dos-jovens--617b2917'),
(5, 'Como é que a solidão afeta a nossa saúde mental?', '2024-02-25', 'Sofia Teixeira', 'noticia5.webp', 'Stress, depressão, ansiedade, adição ou baixa autoestima são algumas possíveis consequências da solidão.', 'https://observador.pt/explicadores/sentir-solidao-e-o-mesmo-que-estar-sozinho-nove-perguntas-sobre-um-sentimento-que-afeta-a-saude-mental-e-pode-provocar-varias-doencas/'),
(6, 'O sexo afeta a saúde mental? Deve procurar ajuda?', '2024-05-12', 'Sofia Teixeira', 'noticia6.webp', 'Os problemas sexuais têm quase sempre impacto na saúde mental. E as perturbações mentais podem afetar a sexualidade. Tanto num caso como no outro, um terapeuta sexual pode ajudar.', 'https://observador.pt/explicadores/o-sexo-afeta-a-saude-mental-e-quando-deve-procurar-ajuda-10-respostas-sobre-disfuncao-sexual/');

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
(1, 'Em que consiste o Portal de Saúde Mental', 'O Portal de Saúde Mental consiste em fornecer por meio de fontes credíveis, informações e recursos que possam ajudar as pessoas a melhorarem o seu bem-estar mental.'),
(2, 'Quais serviços são oferecidos?', 'O Portal de Saúde Mental é um website meramente informativo, prestador de informações e não de serviços. Em momento algum será feito qualquer tipo de diagnóstico adjacente a qualquer problema existente.'),
(3, 'O que fazer perante sintomas de perturbação mental?', 'Perante a ocorrência de um ou vários sinais/sintomas mais graves deve-se procurar ajuda de um profissional de saúde. Alguns dos comportamentos citados podem ser normais e enquadrarem-se na capacidade de adaptação psicossocial à vida e às circunstâncias. No entanto, se forem continuados e persistentes, devem ser reportados a um profissional de saúde dos cuidados de saúde primários (Centro de Saúde / Unidade de Saúde Familiar)'),
(4, 'O que posso fazer para melhorar a minha saúde mental?', 'A título de exemplo, destaca-se recorrer a atividades prazerosas, como a leitura, o ouvir música, o exercício físico, que despoletam sensação de bem-estar, tranquilidade e conforto; ter um estilo de vida saudável, no que diz respeito a padrões de alimentação, sono e atividade física; desfrutar de uma rede de relações positivas, seja em contexto familiar, ou de amigos.');

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
(2, 'Perturbações do Sono', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'pert-sono.png', 'https://i.ibb.co/CJDnQW2/pert-sono-circle.png', 'banner-sono.png', 'testesono'),
(3, 'Perturbações de Humor', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'pert-humor.png', 'https://i.ibb.co/3r3SSyx/pert-humor-circle.png', 'banner-humor.png', 'testehumor'),
(4, 'Perturbações Alimentares', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'pert-aliment.png', 'https://i.ibb.co/2djRPxt/pert-aliment-circle.png', 'banner-aliment.png', ''),
(5, 'Perturbações Obsessivo-Compulsivas', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'pert-obscomp.png', NULL, 'banner-obscomp.png', ''),
(6, 'Perturbações de Personalidade', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'pert-perso.png', NULL, 'banner-pers.png', ''),
(7, 'Perturbações relacionadas com Trauma e Fatores de stress', 'Everybody deals Everybody deals with anxiety from time to time, but when everyday feelings of nervousness turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable anxiety disorder. If you\'re struggling with an anxiety disorder like social anxiety or generalized anxie', 'pert-stress.png', NULL, 'banner-stress.png', '');

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
(164, 18, 1),
(165, 18, 2),
(166, 18, 2),
(167, 18, 2),
(168, 18, 2),
(169, 18, 2),
(171, 26, 2),
(172, 26, 2),
(173, 26, 2),
(174, 26, 2),
(175, 26, 2),
(176, 26, 2),
(177, 26, 2),
(178, 26, 2),
(179, 26, 2),
(180, 26, 2),
(181, 26, 2),
(182, 26, 2),
(183, 26, 2),
(184, 26, 2),
(185, 26, 2),
(186, 26, 1),
(187, 26, 2),
(188, 26, 1),
(189, 26, 1),
(190, 26, 2);

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
(1, 'O quão empática/o és?', 'empatia.png', 'É uma pessoa empática? Já lhe disseram que é “muito sensível” ou precisa de se fortalecer? Sente-se exausto e ansioso depois de estar no meio de uma multidão ou perto de certas pessoas? Tem sensibilidade à luz, som e cheiros? Demora mais a relaxar depois de um longo dia de trabalho?', 'Nas pessoas empáticas, acredita-se que o sistema de neurônios-espelho do cérebro – um grupo especializado de células responsáveis ​​pela compaixão – seja hiperativo. Como resultado, as pessoas empáticas podem absorver as energias de outras pessoas (positivas e negativas) nos seus próprios corpos. Às vezes pode até ser difícil saber se estamos a sentir as próprias emoções ou as de outra pessoa. Existem diferentes tipos de sensibilidades que as pessoas empáticas podem experimentar. As pessoas empáticas físicas, por exemplo, estão especialmente sintonizados com os sintomas físicos de outras pessoas e absorvem-nos nos seus próprios corpos. as pessoas empáticas emocionais captam as emoções das pessoas e tornam-se uma esponja para os seus sentimentos. As pessoas empáticas alimentares estão sintonizadas com a energia dos alimentos e podem até sentir sensibilidade a certos alimentos. Ter empatia traz benefícios, como maior intuição, compaixão, criatividade e uma conexão mais profunda com outra', 'Orloff, J. (2017). The empath\'s survival guide: Life strategies for sensitive people. Sounds True.'),
(2, 'O quão preocupada/o és?', 'preocupado.png', 'Our world is in the midst of an emotional meltdown. As a psychiatrist, I’ve seen that many people are addicted to the adrenaline rush of anxiety, known as the “fight or flight” response, and they don’t know how to defuse it. An example of this is obsessively watching the news about natural disasters, trauma, economic stress and violence, and then not being able to turn bad news off. Also, people are prone to “techno-despair” — a term I coined in my book, “Emotional Freedom.” This is a state of high anxiety that results from information overload and Internet addiction. Being addicted to worry can lead to insomnia, nightmares, restless sleep and ongoing angst. Take this quiz to determine the role that worry is playing in your life.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. In metus vulputate eu scelerisque. Libero id faucibus nisl tincidunt eget nullam non. At elementum eu facilisis sed odio morbi. Et malesuada fames ac turpis. At imperdiet dui accumsan sit. Quisque id diam vel quam. Vitae congue eu consequat ac felis donec et odio pellentesque. Enim lobortis scelerisque fermentum dui faucibus in ornare quam viverra. Tristique senectus et netus et malesuada fames. Diam quam nulla porttitor massa. Consectetur lorem donec massa sapien faucibus. Nisi est sit amet facilisis magna etiam tempor. Aliquam faucibus purus in massa tempor nec feugiat nisl pretium. Dictum fusce ut placerat orci nulla pellentesque dignissim enim. Venenatis urna cursus eget nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore m', 'Orloff, J. (2015). Emotional Freedom: Liberati delle emozioni negative e trasforma la tua vita. MyLife.'),
(3, 'Tens uma energia positiva', 'energia.png', 'Relationships are always an energy exchange. Positive attitudes accentuate wellness. Negative attitudes impair it. Take this quiz to determine your positivity score and the energy impact you have on yourself and others.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. In metus vulputate eu scelerisque. Libero id faucibus nisl tincidunt eget nullam non. At elementum eu facilisis sed odio morbi. Et malesuada fames ac turpis. At imperdiet dui accumsan sit. Quisque id diam vel quam. Vitae congue eu consequat ac felis donec et odio pellentesque. Enim lobortis scelerisque fermentum dui faucibus in ornare quam viverra. Tristique senectus et netus et malesuada fames. Diam quam nulla porttitor massa. Consectetur lorem donec massa sapien faucibus. Nisi est sit amet facilisis magna etiam tempor. Aliquam faucibus purus in massa tempor nec feugiat nisl pretium. Dictum fusce ut placerat orci nulla pellentesque dignissim enim. Venenatis urna cursus eget nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore m', ''),
(4, 'O quão livre és, emocionalmente?', 'livre.png', 'É capaz de cultivar emoções positivas e compaixão sem que os pensamentos negativos dominem a sua vida?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. In metus vulputate eu scelerisque. Libero id faucibus nisl tincidunt eget nullam non. At elementum eu facilisis sed odio morbi. Et malesuada fames ac turpis. At imperdiet dui accumsan sit. Quisque id diam vel quam. Vitae congue eu consequat ac felis donec et odio pellentesque. Enim lobortis scelerisque fermentum dui faucibus in ornare quam viverra. Tristique senectus et netus et malesuada fames. Diam quam nulla porttitor massa. Consectetur lorem donec massa sapien faucibus. Nisi est sit amet facilisis magna etiam tempor. Aliquam faucibus purus in massa tempor nec feugiat nisl pretium. Dictum fusce ut placerat orci nulla pellentesque dignissim enim. Venenatis urna cursus eget nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore m', '');

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
(1, 2, 'Preocupaste com muitas coisas todos os dias?', 'Sim', 'Não'),
(2, 2, 'Torno os problemas maiores, e não menores?', 'Sim', 'Não'),
(3, 2, 'Preocupo-me com coisas com as quais ninguém ao meu redor se preocupa?', 'Sim', 'Não'),
(4, 2, 'Preocupo-me mesmo em momentos felizes?', 'Sim', 'Não'),
(5, 2, 'Acho que não consigo parar de me preocupar, embora tente?', 'Sim', 'Não'),
(6, 2, 'Quando uma preocupação é resolvida, concentro-me imediatamente em outra?', 'Sim', 'Não'),
(7, 1, 'Fui rotulado como “excessivamente sensível”, tímido ou introvertido?', 'Sim', 'Não'),
(8, 1, 'Fico frequentemente sobrecarregado ou ansioso?', 'Sim', 'Não'),
(9, 1, 'Discussões ou gritos deixam-me doente?', 'Sim', 'Não'),
(10, 1, 'Muitas vezes sinto que não me encaixo?', 'Sim', 'Não'),
(11, 1, 'Estou esgotado pelas multidões e preciso de um tempo sozinho para me reanimar?', 'Sim', 'Não'),
(12, 1, 'Sou superestimulado por ruídos, odores ou pessoas que falam sem parar?', 'Sim', 'Não'),
(13, 1, 'Tenho sensibilidades químicas ou não tolero roupas que arranham?', 'Sim', 'Não'),
(14, 1, 'Prefiro levar o meu próprio carro para poder sair mais cedo se precisar?', 'Sim', 'Não'),
(15, 1, 'Como demais para lidar com o stress?', 'Sim', 'Não'),
(16, 1, 'Tenho medo de ser sufocado por relacionamentos íntimos?', 'Sim', 'Não'),
(17, 1, 'Assusto-me facilmente?', 'Sim', 'Não'),
(18, 1, 'Reajo fortemente à cafeína ou aos medicamentos?', 'Sim', 'Não'),
(19, 1, 'Tenho um limiar de dor baixo?', 'Sim', 'Não'),
(20, 1, 'Tenho tendência a isolar-me socialmente?', 'Sim', 'Não'),
(21, 1, 'Absorvo o stress, as emoções ou os sintomas de outras pessoas?', 'Sim', 'Não'),
(22, 1, 'Fico sobrecarregado com a multitarefa e prefiro fazer uma coisa de cada vez?', 'Sim', 'Não'),
(23, 1, 'Reabasteço-me na natureza?', 'Sim', 'Não'),
(24, 1, 'Preciso de muito tempo para me recuperar depois de estar com pessoas difíceis?', 'Sim', 'Não'),
(25, 1, 'Sinto-me melhor nas cidades pequenas ou no campo, do que nas grandes cidades?', 'Sim', 'Não'),
(26, 1, 'Prefiro interações individuais ou pequenos grupos em vez de grandes reuniões?', 'Sim', 'Não');

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
(1, 2, 1, 'És mais um guerreiro que preocupado.'),
(2, 2, 2, 'A preocupação desempenha um papel moderado na tua vida.'),
(3, 2, 4, 'A preocupação desempenha um papel importante na tua vida.'),
(4, 2, 6, 'A preocupação desempenha um papel muito importante na tua vida.'),
(5, 1, 1, 'Sentes parcialmente, empatia.'),
(6, 1, 6, 'Tens tendências empáticas moderadas.'),
(7, 1, 11, 'Tens fortes tendências empáticas.'),
(8, 1, 16, 'Tens toda a empatia.');

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
  `comportamento_alternativo` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `registos`
--

INSERT INTO `registos` (`registos_id`, `utilizador_id`, `pensamento`, `comportamento`, `sentimentos`, `quando`, `pensamento_alternativo`, `comportamento_alternativo`) VALUES
(28, 26, 'teste', 'teste', 'teste', 'teste', 'teste', 'teste'),
(29, 18, 'teste', 'teste', 'teste', 'teste', 'teste', 'teste'),
(30, 18, 'testeteste', 'testeteste', 'testeteste', 'testeteste', 'testeteste', 'testeteste'),
(31, 18, 'testetesteteste', 'testetesteteste', 'testetesteteste', 'testetesteteste', 'testetesteteste', 'testetesteteste');

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
(18, 1703689423, 'João', 'teste@gmail.com', '$2y$10$kwCyuAC0eey9XxnY42SVUOjeKklJ6f5Uuonqv5ooCxfN9bXKH9i6S', 1, 'indexbackup.jpg', 0, '2024-03-11 15:13:13'),
(26, 1703689628, 'Fernando', 'teste2@gmail.com', '$2y$10$BtzRpzU0Unz8aQhV0zGGU.Oc88YY8ZytRY0b4XDUK13bfFNDhmfL6', 3, 'user.png', 0, '2024-03-12 10:26:14'),
(27, 1035944128, 'Miguel', 'teste3@gmail.com', '$2y$10$i2zHS8WBb0bgvZDzkSgE7./3LGOfUa2lGKJjhli9sOEmzlCk8fwRu', 1, 'pin booking.jpg', 0, '2024-03-12 16:38:55'),
(29, 1414583001, 'teste', 'teste5@gmail.com', '$2y$10$go0lJUIIBajXpaszNN1n6O0Q0IIe08B5vLaTfuua1rOMLXvpFAUQi', 3, '', 0, '2024-05-21 17:21:48');

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
  MODIFY `artigo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `conteudo_artigo`
--
ALTER TABLE `conteudo_artigo`
  MODIFY `conteudo_artigo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de tabela `conteudo_noticia`
--
ALTER TABLE `conteudo_noticia`
  MODIFY `conteudo_noticia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `lembrete_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `noticias_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT de tabela `quiz_nome`
--
ALTER TABLE `quiz_nome`
  MODIFY `quiz_nome_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `quiz_questoes`
--
ALTER TABLE `quiz_questoes`
  MODIFY `quiz_questoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `quiz_respostas`
--
ALTER TABLE `quiz_respostas`
  MODIFY `quiz_respostas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `utilizador_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
