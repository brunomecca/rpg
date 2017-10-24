-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Out-2017 às 18:52
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mundoaventurado`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_usuarios`
--

CREATE TABLE `admin_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `admin_usuarios`
--

INSERT INTO `admin_usuarios` (`id`, `nome`, `senha`) VALUES
(1, 'brunormecca', 'doidona357');

-- --------------------------------------------------------

--
-- Estrutura da tabela `game_usuarios`
--

CREATE TABLE `game_usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `newsletter` int(11) NOT NULL,
  `termos` int(11) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `game_usuarios`
--

INSERT INTO `game_usuarios` (`id`, `usuario`, `foto`, `email`, `newsletter`, `termos`, `senha`, `nome`) VALUES
(1, 'aplanke', 'pic1.jpg', 'brunogmecca@gmail.com', 1, 1, 'ae', 'Bruno Mecca');

-- --------------------------------------------------------

--
-- Estrutura da tabela `main_comentarios`
--

CREATE TABLE `main_comentarios` (
  `id` int(11) NOT NULL,
  `id_post` varchar(100) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `comentario` text NOT NULL,
  `data` varchar(300) NOT NULL,
  `status` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `main_comentarios`
--

INSERT INTO `main_comentarios` (`id`, `id_post`, `usuario`, `comentario`, `data`, `status`) VALUES
(85, '164', '1', 'aeee', '16 de setembro de 2017', 'sim'),
(84, '164', '1', 'aeee', 's?bado, 16 de setembro de 2017', 'nao'),
(83, '164', '1', 'aeee', 's?bado, 16 de setembro de 2017', 'nao'),
(82, '164', '1', 'aeee', 's?bado, 16 de setembro de 2017', 'nao'),
(81, '164', '1', 'aeee', 's?bado, 16 de setembro de 2017', 'nao'),
(80, '164', '1', 'aeee', 's?bado, 16 de setembro de 2017', 'nao'),
(79, '164', '1', 'aeee', 'Saturday, 16 de September de 2017', 'nao'),
(78, '164', '1', 'aeee', 's?bado, 16 de setembro de 2017', 'nao'),
(77, '164', '1', 'aeee', 's?bado, 16 de setembro de 2017', 'nao'),
(76, '164', '1', 'aeee', 's?bado, 16 de setembro de 2017', 'nao'),
(75, '164', '1', 'aeee', 's?bado, 16 de setembro de 2017', 'nao'),
(86, '164', '2', 'ae agora sim', '16 de setembro de 2017', 'sim'),
(87, '164', '1', 'Ae porraaaa', '08 de outubro de 2017', 'nao'),
(88, '165', '1', 'Aee', '10 de outubro de 2017', 'nao'),
(89, '165', '1', 'Teste aula', '10 de outubro de 2017', 'sim'),
(90, '165', '1', 'daszccx', '10 de outubro de 2017', 'nao'),
(91, '165', '1', 'zx', '10 de outubro de 2017', 'nao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `main_contato`
--

CREATE TABLE `main_contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mensagem` varchar(60) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `main_contato`
--

INSERT INTO `main_contato` (`id`, `nome`, `email`, `mensagem`, `usuario`) VALUES
(1, 'bruno mecca', 'brunogmecca@gmail.com', 'aaaa', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `main_postagens`
--

CREATE TABLE `main_postagens` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `conteudo` text NOT NULL,
  `foto` varchar(300) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `data` varchar(200) NOT NULL,
  `views` int(11) NOT NULL,
  `descricao` varchar(800) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `main_postagens`
--

INSERT INTO `main_postagens` (`id`, `titulo`, `conteudo`, `foto`, `categoria`, `data`, `views`, `descricao`) VALUES
(152, 'Dasdasd', '<p>AERNAERBJH ikfua udw duwuh ASDUHH DASUH DASUH DHUASMK CXZMK CMKOEI OQWEI QWOEI QWOEI QOWEI QWOEJ QWMKE NCJBCF DSUFJ SKDFM SDFU FJSD KFM SDKFN SDUIFH JSDIFM SDKFN SDJFMN S</p>', 'MzUIZCyrRNwShbxaBteH', 'Sadasd', '28/10/2014', 16, ''),
(151, 'A mais estranha fita de segurança que já vi', '<p>Achei essa creepypasta enquanto estava procurando algo assustador para ler. N&atilde;o achei muito assustador, mas &eacute; muito boa e o final &eacute; ainda mais! Quando acabei de ler resolvi fazer a tradu&ccedil;&atilde;o e postar aqui no site. Espero que gostem</p><br>\n<p><strong>A mais estranha fita de seguran&ccedil;a que j&aacute; vi.</strong></p>\n<p>Eu trabalho em um posto de gasolina na zona rural da Pensilv&acirc;nia. &Eacute; um trabalho chato, mas &eacute; muito f&aacute;cil e me pagam bem. Algumas semanas atr&aacute;s, um cara come&ccedil;ou a trabalhar, o nome dele era Jeremy.</p>\n<p>Jeremy &eacute; estranho. Ele tem cerca de 25 ou 26 anos, e ele quase n&atilde;o fala, mas ele tem a risada mais apavorante que eu j&aacute; ouvi. Meu chefe e eu notamos isso, mas nunca foi um problema, ent&atilde;o n&atilde;o h&aacute; muito que possamos fazer. Os clientes nunca reclamaram, e ele sempre fez seu trabalho muito bem, at&eacute; algumas semanas atr&aacute;s, que &eacute; quando as coisas come&ccedil;aram a faltar. Roubos de empregados pode ser um problema a qualquer empresa que vende bens de consumo, e n&atilde;o h&aacute; apenas uma pessoa trabalhando em um momento no posto de gasolina (que &eacute; um lugar bastante pequeno). Cerca de duas semanas atr&aacute;s, meu chefe come&ccedil;ou a perceber que est&aacute;vamos com pouco &oacute;leo de motor. Na primeira, faltavam alguns recipientes de cada vez, em seguida, prateleiras inteiras e caixas da sala. Em breve, os embarques inteiros teria ido ao dia seguinte. Chegamos a eles, e seria sempre logo ap&oacute;s mudan&ccedil;as de Jeremy. Meu chefe tem verificado as fitas da c&acirc;mera de seguran&ccedil;a de cada noite que Jeremy trabalhou, mas ele nunca poderia peg&aacute;-lo em flagrante. Jeremy trancava no fechamento, em seguida, o &oacute;leo de motor sumia na manh&atilde; que aparecia..</p>\n<p>Meu chefe geralmente leva a fitas para casa com ele para tentar pegar Jeremy roubando, mas a sua filha tinha um jogo de softball na noite passada, ent&atilde;o ele me pediu para assistir a fita para ele. Ele se ofereceu para me pagar horas extras, ent&atilde;o obviamente eu levei essa oferta. H&aacute; tr&ecirc;s c&acirc;meras, ent&atilde;o ele me deu tr&ecirc;s fitas diferentes para verificar. Eu imaginei que seria uma longa noite, mas eu estou tentando viajar nas f&eacute;rias, ent&atilde;o eu realmente precisava do dinheiro. Peguei as fitas, coloquei-as em um velho videocassete e me sentei.</p>\n<p>Dois dias atr&aacute;s (a &uacute;ltima vez que ele trabalhou), Jeremy come&ccedil;ou &agrave;s 04h00min. Tudo parecia muito normal no in&iacute;cio. Ele contou o dinheiro da gaveta, e esperou por um cliente. A primeira pessoa que veio foi a Sra. Templeton (o tempo no v&iacute;deo era 04:03), um cliente normal. Ela pegou os cigarros e um jornal, e pagou com uma nota de vinte. Nada incomum l&aacute;. O pr&oacute;ximo cliente era um cara da &aacute;rea chamado Ron. Ele dirige uma moto, geralmente vem em todos os dias. Ele encheu o tanque, pegou um saco de beef jerky, pagou com seu cart&atilde;o de cr&eacute;dito, e, em seguida, saiu. Depois entrou um cara com um chap&eacute;u de cowboy. Eu nunca tinha visto ele antes, mas n&oacute;s ganhamos muitos de estranhos que passam, assim como em qualquer posto de gasolina. Ele pegou quarenta d&oacute;lares de combust&iacute;vel diesel, pago com uma nota de cem d&oacute;lares, e prosseguiu o seu caminho. Sentei-me para tr&aacute;s e suspirei. A &uacute;nica coisa mais chata do que fazer este trabalho &eacute; ver algu&eacute;m fazer isso.</p>\n<p>A oferta do meu chefe foi o suficiente para me manter assistindo. Tudo parecia muito normal. Eu tinha a sensa&ccedil;&atilde;o de que, se Jeremy estava roubando o &oacute;leo do motor, ele sabia que est&aacute;vamos desconfiados dele at&eacute; agora. Eu n&atilde;o esperava que ele fosse burro o suficiente para nos deixar peg&aacute;-lo na c&acirc;mera.</p>\n<p>&Agrave;s 05h03min, a Sra. Templeton voltou, ela deve ter esquecido alguma coisa. Mas ela n&atilde;o fez nada demais. Ela comprou o mesmo ma&ccedil;o de cigarros, como antes, o mesmo jornal. Ela pagou com mais vinte. Isso &eacute; estranho, eu pensei, mas novamente, ela est&aacute; um pouco distra&iacute;da. Eu pensei que Jeremy deveria ter dito a ela que j&aacute; tem seus cigarros, mas n&atilde;o &eacute; contra as regras &nbsp;vender &agrave; algu&eacute;m a mesma coisa duas vezes. Foi quando Ron veio novamente. Ele comprou outro tanque de gasolina (para sua moto novamente, mais tarde eu verifiquei a c&acirc;mera ao ar livre, porque eu pensei que talvez ele tivesse outro carro que ele queria encher) e &eacute; o mesmo pacote de charque. Ele pagou com seu cart&atilde;o de cr&eacute;dito novamente.</p>\n<p>N&atilde;o &eacute; grande coisa, eu percebi que isso era apenas uma coincid&ecirc;ncia estranha. Sra. Templeton &eacute; esquecida e Ron provavelmente possui mais de uma Harley. &Eacute; quando o cara no chap&eacute;u de cowboy voltou para dentro eu senti um arrepio na espinha. \"N&atilde;o pegue diesel, n&atilde;o pegue diesel\", eu encontrei-me sussurrando para mim mesmo na sala vazia... Mas ele fez. Ele pegou quarenta d&oacute;lares de combust&iacute;vel diesel e pagou com outra nota de cem d&oacute;lares. Cada movimento que ele fez foi id&ecirc;ntica a sua primeira visita, at&eacute; a maneira como ele co&ccedil;ou o nariz, antes que ele saiu. Ou esse cara &eacute; rico, dono de uma grande quantidade de caminh&otilde;es, e acabou de se mudar para a cidade, ou algo realmente bizarro estava acontecendo. Eu continuei assistindo.</p>\n<p>Cada cliente para a pr&oacute;xima hora era a mesma de antes. Cada um. Eu estava seriamente assustado, e em seguida, &agrave;s 6:03, a Sra. Templeton voltou para dentro. Ela comprou os cigarros e jornais de novo, e pagou com uma nota de vinte novamente. Eu s&oacute; assisti mais meia hora antes de come&ccedil;ar o avan&ccedil;o r&aacute;pido atrav&eacute;s do resto. Era tudo a mesma coisa. Cada cliente viria exatamente ao mesmo tempo, exatamente uma hora de intervalo.</p>\n<p>Agora eu sei o que voc&ecirc; est&aacute; pensando. Esse filho da puta sorrateiro Jeremy tinha mexido com as fitas. Ele havia executado um loop de sua primeira hora de neg&oacute;cios mais e mais. Esse n&atilde;o foi o caso. H&aacute; janelas ao redor da &aacute;rea, registro o dinheiro que a c&acirc;mara cobre, e vi a luz do sol desaparecer com o tempo correu por diante. A rotina de Jeremy n&atilde;o mudou, ele varreu, limpou, reabasteceu e fez todos os seus deveres exatamente como voc&ecirc; esperaria. Mas os mesmos clientes iam chegando.</p>\n<p>Eu estava em p&acirc;nico neste momento. Algo estava muito errado com o que eu estava vendo, e eu n&atilde;o tinha nenhuma explica&ccedil;&atilde;o para isso. Eu saltei para frente quando ele trancou e caminhou at&eacute; seu carro. Ele n&atilde;o havia roubado nada, mas eu continuei assistindo, s&oacute; para ter certeza.</p>\n<p>Exatamente &agrave;s 00h03min, de repente, o rosto de Jeremy aparece na c&acirc;mera. Eu n&atilde;o quero dizer que ele moveu a cabe&ccedil;a em vista, quero dizer que em um segundo a loja estava vazia, e no pr&oacute;ximo segundo seu rosto era tudo o que eu podia ver. Ele n&atilde;o estava olhando para a c&acirc;mera, ele estava olhando para mim, eu tinha certeza disso. Eu gritei e se atrapalhei com o controle remoto. No momento em que eu o peguei, ele se foi. Um quadro que ele estava l&aacute;, o pr&oacute;ximo ele n&atilde;o estava. Minhas m&atilde;os tremiam como um louco, mas eu peguei outra fita. A outra c&acirc;mara interior mostra a &aacute;rea de volta, pelo registro de dinheiro, e eu gostaria de ser capaz de ver como ele se levantou para colocar o rosto na c&acirc;mera como essa. Eu pulei na frente de 00h03min, mas n&atilde;o havia nada. Eu teria sido capaz de v&ecirc;-lo de p&eacute; sobre uma cadeira ou algo nessa fita, mas ele n&atilde;o estava l&aacute;. Eu n&atilde;o o vi entrar na loja depois que ele a deixou. &Eacute; como se ele n&atilde;o estava realmente l&aacute;. Ele n&atilde;o sabe o c&oacute;digo de seguran&ccedil;a, e nenhum alarme foi disparado naquela noite depois de ter sido trancado.</p>\n<p>O que eu vi, no entanto, era que &agrave;s 00h03min, o &oacute;leo do motor desapareceu da prateleira. Tudo isso. Mesmo que o rosto de Jeremy, um segundo apareceu e no pr&oacute;ximo n&atilde;o. Tirei a fita do v&iacute;deo e fui para a cama, mas eu n&atilde;o consegui dormir em momento algum. Meu corpo est&aacute; exausto agora, mas minha mente est&aacute; confusa. Essa fita foi, sem d&uacute;vida, a mais apavorante coisa que eu j&aacute; vi na minha vida.</p>\n<p>Eu trabalho em poucas horas. Meu chefe me pediu para trazer as fitas de volta e deix&aacute;-lo saber &nbsp;o que eu encontrei, mas na verdade, o que diabos &eacute; que eu vou dizer? Jeremy trabalha no turno da noite, hoje &agrave; noite, logo depois de mim, e que o plano &eacute; para o meu chefe vir pouco antes de eu sair e falar com ele comigo. Eu n&atilde;o tenho nenhuma ideia do que eu vou fazer. Acho que vou ter que mostrar para meu chefe as fitas, mas eu n&atilde;o quero v&ecirc;-las com ele. Eu nunca mais quero ver algo assim novamente. Eu n&atilde;o consigo tirar a imagem de Jeremy da cabe&ccedil;a, vejo-o apenas sorrindo diretamente para a c&acirc;mera , era o olhar mais apavorante que eu j&aacute; vi na cara de um ser humano.</p>\n<p>De qualquer forma, vou tentar novamente para obter algum &uacute;ltimo minuto antes de dormir, eu tenho que entrar e lidar com isso. Eu vou deixar voc&ecirc;s saberem o que acontece...</p>\n<p>UPDATE (02h49min): Estou escrevendo por via do meu celular, me desculpo agora se tiver algum erro. Meu chefe acabou de assistir a &uacute;ltima das fitas. Eu disse a ele o que esperar, mas voc&ecirc; realmente n&atilde;o pode preparar algu&eacute;m para algo como isso. Ele est&aacute; se cagando de medo (e eu tamb&eacute;m ainda estou) e Jeremy dever&aacute; entrar as quatro. N&oacute;s temos pouco mais de uma hora para encarar tudo isso juntos, mas nenhum de n&oacute;s sabe o que dizer a ele. Ele &eacute; apenas um cara fodido que gosta de roubar o &oacute;leo do motor e assustar a merda de pessoas? Ou ele &eacute; outra coisa? Eu n&atilde;o sei se isso &eacute; loucura, mas ser&aacute; que algu&eacute;m acha que ele poderia ter alguma coisa a ver com a volta do tempo? Meu chefe disse que nunca notou nada parecido nas outras fitas, mas a maneira como ele apareceu em um presente que me fez pensar que ele sabia que eu estaria assistindo. &Eacute; como se ele quisesse-me para ver o que ele poderia fazer. Como se ele estivesse mostrando ou algo assim. A maneira como ele sorriu para a c&acirc;mera era como uma crian&ccedil;a mostrando-lhe um castelo de areia que acabou de construir ou algo assim. Eu n&atilde;o sei, eu provavelmente pare&ccedil;o louco. Eu com certeza me sinto parte disso. Eu vou falar com o meu chefe um pouco mais. N&oacute;s temos que nos acalmar-se e descobrir como lidar com isso. Vou atualizar novamente hoje &agrave; noite, mas eu tenho um mau pressentimento sobre como isso vai acontecer.</p>\n<p>UPDATE (04h33min): N&atilde;o h&aacute; sinal de Jeremy. Tentei ligar para ele, mas o telefone foi desligado. N&oacute;s estamos chamando a pol&iacute;cia.</p>\n<p>UPDATE (05h33min): N&atilde;o h&aacute; sinal de Jeremy. Tentei ligar para ele, mas o telefone foi desligado. N&oacute;s estamos chamando a pol&iacute;cia.</p>\n<p>UPDATE (18h33min): N&atilde;o h&aacute; sinal de Jeremy. Tentei ligar para ele, mas o telefone foi desligado. N&oacute;s estamos chamando a pol&iacute;cia.</p>\n<p>UPDATE (19h33min): N&atilde;o h&aacute; sinal de Jeremy. Tentei ligar para ele, mas o telefone foi desligado. N&oacute;s estamos chamando a pol&iacute;cia.</p>\n<p>UPDATE (20h33min): N&atilde;o h&aacute; sinal de Jeremy. Tentei ligar para ele, mas o telefone foi desligado. N&oacute;s estamos chamando a pol&iacute;cia.</p>\n<p>UPDATE (22h58min): Puta merda. Puta merda santa puta merda. Eu cheguei em casa e vi minhas atualiza&ccedil;&otilde;es anteriores. As coisas fazem menos sentido agora do que nunca. Aqui est&aacute; o que eu posso te dizer. Fui trabalhar e Jeremy nunca apareceu, meu chefe e eu decidi chamar a pol&iacute;cia, como voc&ecirc; est&aacute; bem ciente. Quando eu peguei o telefone para ligar, o sol saiu. Aparentemente eu apaguei por exatamente cinco horas, porque quando eu olhei para o rel&oacute;gio, era 09h33min. Acho que ficou preso no la&ccedil;o do tempo de Jeremy, e ent&atilde;o eu apaguei, se isso faz sentido. Mas isso &eacute; quando as coisas ficaram realmente estranhas.</p>\n<p>Meu chefe estava ao meu lado quando eu apaguei, pronto para colaborar com a minha hist&oacute;ria para a pol&iacute;cia. Quando voltei a mim, o telefone estava na minha m&atilde;o, mas ele estava desligado. Meu chefe ainda estava l&aacute;, mas ele n&atilde;o estava se movendo. Ele estava de p&eacute;, mas congelado. Olhei para o rel&oacute;gio de novo e ele n&atilde;o estava se movendo. Era exatamente 09:33. O rel&oacute;gio no registro (tela do computador) n&atilde;o estava se movendo tamb&eacute;m. Meu telefone foi congelado. Houve at&eacute; um cliente no balc&atilde;o, esperando meu patr&atilde;o para lev&aacute;-lo cigarros. Eu estou apostando que seria seu quinto pacote do dia.</p>\n<p>N&atilde;o trave, n&atilde;o apague as luzes, e desculpe-me, eu n&atilde;o pegar as fitas de seguran&ccedil;a para fazer o upload na internet. Acredite em mim, isso era a &uacute;ltima coisa em minha mente. O posto de gasolina est&aacute; em uma estrada principal e os carros estavam estacionados ao longo dela, exceto que eles n&atilde;o estavam estacionados, eles estavam parados. As pessoas dentro dos carros estavam sentadas im&oacute;veis como est&aacute;tuas de cera. Eu entrei no meu carro e rezei para que ele iria ligar. Felizmente ele fez.</p>\n<p>Cerca de meio caminho de casa, o tempo come&ccedil;ou a fluir novamente. A est&aacute;tica do r&aacute;dio se transformou em m&uacute;sica, como &eacute; suposto de ser, e de que eu poderia dizer, ouvindo a conversa entre as m&uacute;sicas do r&aacute;dio, ningu&eacute;m percebeu que o tempo parou, ou o que fosse. Eu era o &uacute;nico. Bem, eu tenho certeza que Jeremy percebeu bem. Eu ainda n&atilde;o tenho ideia de onde ele est&aacute; ou o que est&aacute; fazendo. Eu estou me escondendo no meu quarto e irei chamar a pol&iacute;cia novamente pela manh&atilde;. Estou com medo pela minha vida neste momento. Vou atualizar amanh&atilde;, se eu puder.</p>\n<p>FINAL UPDATE (10h33min): Eu finalmente ca&iacute; no sono na noite passada em torno de 4h. Eu n&atilde;o tenho nenhuma ideia de como eu fiz isso, eu acho que a exaust&atilde;o finalmente obteve o melhor de mim. Esta manh&atilde;, eu acordei com o meu telefone tocando, era meu chefe. Ele estava me chamando desde as 6h. Ele acordou quando o tempo voltou ontem &agrave; noite e imediatamente chamou a pol&iacute;cia. Eles vieram para ver o que estava errado e ele disse-lhes tudo. A pol&iacute;cia aqui s&atilde;o todos rapazes que n&atilde;o trabalham h&aacute; muito tempo, eles estavam mais preocupados com o &oacute;leo de motor faltando do que qualquer coisa, mas meu chefe imaginou que ele iria lev&aacute;-lo, desde que ele teve a sua aten&ccedil;&atilde;o. Eles decidiram ir &agrave; procura de Jeremy.</p>\n<p>N&oacute;s mantemos os registros de todos os nossos empregados em arquivo, e uma vez que Jeremy come&ccedil;ou a trabalhar aqui h&aacute; muito pouco tempo, a dele era f&aacute;cil de encontrar. Eles checaram o endere&ccedil;o dele e fomos para at&eacute; l&aacute;. Voc&ecirc; n&atilde;o vai acreditar no que eles encontraram.</p>\n<p>O endere&ccedil;o Jeremy listado sobre o seu pedido foi um lote vazio. Ou, pelo menos agora ele &eacute;. Costumava haver uma casa l&aacute;, mas foi incendiada em 1993. Sendo uma cidade pequena, quase todo mundo se lembra do fogo naquele dia. Uma fam&iacute;lia de quatro pessoas morava l&aacute;. H&aacute; rumores de que eles tinham um filho distante que eles nunca realmente falaram, mas eu n&atilde;o posso dizer com certeza se isso &eacute; verdade. O que posso dizer &eacute; que na verdade &eacute; que depois de uma investiga&ccedil;&atilde;o de seguros, o fogo foi classificado como um inc&ecirc;ndio criminoso. Toda a casa foi embebida em &oacute;leo e incendiaram com um coquetel molotov. Toda a fam&iacute;lia estava dormindo quando aconteceu, nenhum deles sobreviveu.</p>\n<p>Eles nunca pegaram o cara que fez isso. H&aacute; rumores de que quando eles tentaram entrar em contato com o filho distante, ningu&eacute;m poderia encontr&aacute;-lo.</p>\n<p>De qualquer forma, meu chefe me chamou e me disse isso, e eu me apavorei. Ent&atilde;o ele me pediu para ir ao posto de gasolina. \"O que voc&ecirc; est&aacute; louco?\" Eu disse, mas ele me garantiu que os policiais estavam l&aacute; com ele. Em seguida, ele me falou uma coisa que realmente me surpreendeu: o FBI tamb&eacute;m estava na cidade e eles estavam indo falar comigo, ent&atilde;o eu poderia muito bem ir at&eacute; l&aacute;. Era 07h15min e eu queria ir para a cama, mas achei que n&atilde;o seria capaz de dormir muito mais. De qualquer maneira, eu me deitei.</p>\n<p>Quatro homens de terno me cumprimentaram e disseram-me para se sentar. Repassei tudo duas ou tr&ecirc;s vezes at&eacute; que eles tiveram todos os detalhes do que aconteceu. Eu disse a eles sobre Jeremy, a fita de seguran&ccedil;a, ontem &agrave; noite no trabalho. Tudo. Finalmente, depois que eu terminei, um dos agentes disse: \"Oh Cristo, n&oacute;s temos outra quest&atilde;o em nossas m&atilde;os.\" Ent&atilde;o eles me fizeram assinar um monte de pap&eacute;is dizendo que eu n&atilde;o iria contar a ningu&eacute;m sobre o que aconteceu, por isso n&atilde;o posso dizer muito mais. Eu posso estar infringindo a lei apenas por postar isso.</p>\n<p>&nbsp;</p>\n<p>Ent&atilde;o agora eu estou em casa. Eu n&atilde;o sei o que fazer comigo mesmo. Acredito que as palavras do agente ir&aacute; me atormentar pelo resto de minha vida.</p>\n<p>De qualquer forma, eu tenho que ir. Tenho algumas coisas para fazer hoje, e ent&atilde;o eu tenho que ir trabalhar para pegar algumas fitas. Meu chefe e eu achamos que esse cara novo, Jeremy, fica roubando o &oacute;leo do motor e eu tenho que assistir as imagens de seguran&ccedil;a para ver se eu posso peg&aacute;-lo fazendo isso. Eu tenho coisas melhores para fazer, mas meu chefe est&aacute; me pagando horas extras, e eu estou tentando viajar nas f&eacute;rias. Deve ser muito simples: o &oacute;leo sempre desaparece logo ap&oacute;s seus turnos. Acho que vou apenas assistir as fitas, e peg&aacute;-lo no ato, deve ser isso.</p>', 'K2EZ6H7WqpcXR5ziSjD8', 'Contos', '28/10/2014', 22, ''),
(157, 'Aee teste 1', '<p>aaaa</p>', '156.jpg', 'Kkkk de boas', '15/09/2017', 0, ''),
(149, 'A mais estranha fita de segurança que já vi', '<p align=\"center\">Achei essa creepypasta enquanto estava procurando algo assustador para ler. N&atilde;o achei muito assustador, mas &eacute; muito boa e o final &eacute; ainda mais! Quando acabei de ler resolvi fazer a tradu&ccedil;&atilde;o e postar aqui no site. Espero que gostem.</p>\n<p align=\"center\"><strong>A mais estranha fita de seguran&ccedil;a que j&aacute; vi.</strong></p>\n<p>Eu trabalho em um posto de gasolina na zona rural da Pensilv&acirc;nia. &Eacute; um trabalho chato, mas &eacute; muito f&aacute;cil e me pagam bem. Algumas semanas atr&aacute;s, um cara come&ccedil;ou a trabalhar, o nome dele era Jeremy.</p>\n<p>Jeremy &eacute; estranho. Ele tem cerca de 25 ou 26 anos, e ele quase n&atilde;o fala, mas ele tem a risada mais apavorante que eu j&aacute; ouvi. Meu chefe e eu notamos isso, mas nunca foi um problema, ent&atilde;o n&atilde;o h&aacute; muito que possamos fazer. Os clientes nunca reclamaram, e ele sempre fez seu trabalho muito bem, at&eacute; algumas semanas atr&aacute;s, que &eacute; quando as coisas come&ccedil;aram a faltar. Roubos de empregados pode ser um problema a qualquer empresa que vende bens de consumo, e n&atilde;o h&aacute; apenas uma pessoa trabalhando em um momento no posto de gasolina (que &eacute; um lugar bastante pequeno). Cerca de duas semanas atr&aacute;s, meu chefe come&ccedil;ou a perceber que est&aacute;vamos com pouco &oacute;leo de motor. Na primeira, faltavam alguns recipientes de cada vez, em seguida, prateleiras inteiras e caixas da sala. Em breve, os embarques inteiros teria ido ao dia seguinte. Chegamos a eles, e seria sempre logo ap&oacute;s mudan&ccedil;as de Jeremy. Meu chefe tem verificado as fitas da c&acirc;mera de seguran&ccedil;a de cada noite que Jeremy trabalhou, mas ele nunca poderia peg&aacute;-lo em flagrante. Jeremy trancava no fechamento, em seguida, o &oacute;leo de motor sumia na manh&atilde; que aparecia..</p>\n<p>Meu chefe geralmente leva a fitas para casa com ele para tentar pegar Jeremy roubando, mas a sua filha tinha um jogo de softball na noite passada, ent&atilde;o ele me pediu para assistir a fita para ele. Ele se ofereceu para me pagar horas extras, ent&atilde;o obviamente eu levei essa oferta. H&aacute; tr&ecirc;s c&acirc;meras, ent&atilde;o ele me deu tr&ecirc;s fitas diferentes para verificar. Eu imaginei que seria uma longa noite, mas eu estou tentando viajar nas f&eacute;rias, ent&atilde;o eu realmente precisava do dinheiro. Peguei as fitas, coloquei-as em um velho videocassete e me sentei.</p>\n<p>Dois dias atr&aacute;s (a &uacute;ltima vez que ele trabalhou), Jeremy come&ccedil;ou &agrave;s 04h00min. Tudo parecia muito normal no in&iacute;cio. Ele contou o dinheiro da gaveta, e esperou por um cliente. A primeira pessoa que veio foi a Sra. Templeton (o tempo no v&iacute;deo era 04:03), um cliente normal. Ela pegou os cigarros e um jornal, e pagou com uma nota de vinte. Nada incomum l&aacute;. O pr&oacute;ximo cliente era um cara da &aacute;rea chamado Ron. Ele dirige uma moto, geralmente vem em todos os dias. Ele encheu o tanque, pegou um saco de beef jerky, pagou com seu cart&atilde;o de cr&eacute;dito, e, em seguida, saiu. Depois entrou um cara com um chap&eacute;u de cowboy. Eu nunca tinha visto ele antes, mas n&oacute;s ganhamos muitos de estranhos que passam, assim como em qualquer posto de gasolina. Ele pegou quarenta d&oacute;lares de combust&iacute;vel diesel, pago com uma nota de cem d&oacute;lares, e prosseguiu o seu caminho. Sentei-me para tr&aacute;s e suspirei. A &uacute;nica coisa mais chata do que fazer este trabalho &eacute; ver algu&eacute;m fazer isso.</p>\n<p>A oferta do meu chefe foi o suficiente para me manter assistindo. Tudo parecia muito normal. Eu tinha a sensa&ccedil;&atilde;o de que, se Jeremy estava roubando o &oacute;leo do motor, ele sabia que est&aacute;vamos desconfiados dele at&eacute; agora. Eu n&atilde;o esperava que ele fosse burro o suficiente para nos deixar peg&aacute;-lo na c&acirc;mera.</p>\n<p>&Agrave;s 05h03min, a Sra. Templeton voltou, ela deve ter esquecido alguma coisa. Mas ela n&atilde;o fez nada demais. Ela comprou o mesmo ma&ccedil;o de cigarros, como antes, o mesmo jornal. Ela pagou com mais vinte. Isso &eacute; estranho, eu pensei, mas novamente, ela est&aacute; um pouco distra&iacute;da. Eu pensei que Jeremy deveria ter dito a ela que j&aacute; tem seus cigarros, mas n&atilde;o &eacute; contra as regras &nbsp;vender &agrave; algu&eacute;m a mesma coisa duas vezes. Foi quando Ron veio novamente. Ele comprou outro tanque de gasolina (para sua moto novamente, mais tarde eu verifiquei a c&acirc;mera ao ar livre, porque eu pensei que talvez ele tivesse outro carro que ele queria encher) e &eacute; o mesmo pacote de charque. Ele pagou com seu cart&atilde;o de cr&eacute;dito novamente.</p>\n<p>N&atilde;o &eacute; grande coisa, eu percebi que isso era apenas uma coincid&ecirc;ncia estranha. Sra. Templeton &eacute; esquecida e Ron provavelmente possui mais de uma Harley. &Eacute; quando o cara no chap&eacute;u de cowboy voltou para dentro eu senti um arrepio na espinha. \"N&atilde;o pegue diesel, n&atilde;o pegue diesel\", eu encontrei-me sussurrando para mim mesmo na sala vazia... Mas ele fez. Ele pegou quarenta d&oacute;lares de combust&iacute;vel diesel e pagou com outra nota de cem d&oacute;lares. Cada movimento que ele fez foi id&ecirc;ntica a sua primeira visita, at&eacute; a maneira como ele co&ccedil;ou o nariz, antes que ele saiu. Ou esse cara &eacute; rico, dono de uma grande quantidade de caminh&otilde;es, e acabou de se mudar para a cidade, ou algo realmente bizarro estava acontecendo. Eu continuei assistindo.</p>\n<p>Cada cliente para a pr&oacute;xima hora era a mesma de antes. Cada um. Eu estava seriamente assustado, e em seguida, &agrave;s 6:03, a Sra. Templeton voltou para dentro. Ela comprou os cigarros e jornais de novo, e pagou com uma nota de vinte novamente. Eu s&oacute; assisti mais meia hora antes de come&ccedil;ar o avan&ccedil;o r&aacute;pido atrav&eacute;s do resto. Era tudo a mesma coisa. Cada cliente viria exatamente ao mesmo tempo, exatamente uma hora de intervalo.</p>\n<p>Agora eu sei o que voc&ecirc; est&aacute; pensando. Esse filho da puta sorrateiro Jeremy tinha mexido com as fitas. Ele havia executado um loop de sua primeira hora de neg&oacute;cios mais e mais. Esse n&atilde;o foi o caso. H&aacute; janelas ao redor da &aacute;rea, registro o dinheiro que a c&acirc;mara cobre, e vi a luz do sol desaparecer com o tempo correu por diante. A rotina de Jeremy n&atilde;o mudou, ele varreu, limpou, reabasteceu e fez todos os seus deveres exatamente como voc&ecirc; esperaria. Mas os mesmos clientes iam chegando.</p>\n<p>Eu estava em p&acirc;nico neste momento. Algo estava muito errado com o que eu estava vendo, e eu n&atilde;o tinha nenhuma explica&ccedil;&atilde;o para isso. Eu saltei para frente quando ele trancou e caminhou at&eacute; seu carro. Ele n&atilde;o havia roubado nada, mas eu continuei assistindo, s&oacute; para ter certeza.</p>\n<p>Exatamente &agrave;s 00h03min, de repente, o rosto de Jeremy aparece na c&acirc;mera. Eu n&atilde;o quero dizer que ele moveu a cabe&ccedil;a em vista, quero dizer que em um segundo a loja estava vazia, e no pr&oacute;ximo segundo seu rosto era tudo o que eu podia ver. Ele n&atilde;o estava olhando para a c&acirc;mera, ele estava olhando para mim, eu tinha certeza disso. Eu gritei e se atrapalhei com o controle remoto. No momento em que eu o peguei, ele se foi. Um quadro que ele estava l&aacute;, o pr&oacute;ximo ele n&atilde;o estava. Minhas m&atilde;os tremiam como um louco, mas eu peguei outra fita. A outra c&acirc;mara interior mostra a &aacute;rea de volta, pelo registro de dinheiro, e eu gostaria de ser capaz de ver como ele se levantou para colocar o rosto na c&acirc;mera como essa. Eu pulei na frente de 00h03min, mas n&atilde;o havia nada. Eu teria sido capaz de v&ecirc;-lo de p&eacute; sobre uma cadeira ou algo nessa fita, mas ele n&atilde;o estava l&aacute;. Eu n&atilde;o o vi entrar na loja depois que ele a deixou. &Eacute; como se ele n&atilde;o estava realmente l&aacute;. Ele n&atilde;o sabe o c&oacute;digo de seguran&ccedil;a, e nenhum alarme foi disparado naquela noite depois de ter sido trancado.</p>\n<p>O que eu vi, no entanto, era que &agrave;s 00h03min, o &oacute;leo do motor desapareceu da prateleira. Tudo isso. Mesmo que o rosto de Jeremy, um segundo apareceu e no pr&oacute;ximo n&atilde;o. Tirei a fita do v&iacute;deo e fui para a cama, mas eu n&atilde;o consegui dormir em momento algum. Meu corpo est&aacute; exausto agora, mas minha mente est&aacute; confusa. Essa fita foi, sem d&uacute;vida, a mais apavorante coisa que eu j&aacute; vi na minha vida.</p>\n<p>Eu trabalho em poucas horas. Meu chefe me pediu para trazer as fitas de volta e deix&aacute;-lo saber &nbsp;o que eu encontrei, mas na verdade, o que diabos &eacute; que eu vou dizer? Jeremy trabalha no turno da noite, hoje &agrave; noite, logo depois de mim, e que o plano &eacute; para o meu chefe vir pouco antes de eu sair e falar com ele comigo. Eu n&atilde;o tenho nenhuma ideia do que eu vou fazer. Acho que vou ter que mostrar para meu chefe as fitas, mas eu n&atilde;o quero v&ecirc;-las com ele. Eu nunca mais quero ver algo assim novamente. Eu n&atilde;o consigo tirar a imagem de Jeremy da cabe&ccedil;a, vejo-o apenas sorrindo diretamente para a c&acirc;mera , era o olhar mais apavorante que eu j&aacute; vi na cara de um ser humano.</p>\n<p>De qualquer forma, vou tentar novamente para obter algum &uacute;ltimo minuto antes de dormir, eu tenho que entrar e lidar com isso. Eu vou deixar voc&ecirc;s saberem o que acontece...</p>\n<p>UPDATE (02h49min): Estou escrevendo por via do meu celular, me desculpo agora se tiver algum erro. Meu chefe acabou de assistir a &uacute;ltima das fitas. Eu disse a ele o que esperar, mas voc&ecirc; realmente n&atilde;o pode preparar algu&eacute;m para algo como isso. Ele est&aacute; se cagando de medo (e eu tamb&eacute;m ainda estou) e Jeremy dever&aacute; entrar as quatro. N&oacute;s temos pouco mais de uma hora para encarar tudo isso juntos, mas nenhum de n&oacute;s sabe o que dizer a ele. Ele &eacute; apenas um cara fodido que gosta de roubar o &oacute;leo do motor e assustar a merda de pessoas? Ou ele &eacute; outra coisa? Eu n&atilde;o sei se isso &eacute; loucura, mas ser&aacute; que algu&eacute;m acha que ele poderia ter alguma coisa a ver com a volta do tempo? Meu chefe disse que nunca notou nada parecido nas outras fitas, mas a maneira como ele apareceu em um presente que me fez pensar que ele sabia que eu estaria assistindo. &Eacute; como se ele quisesse-me para ver o que ele poderia fazer. Como se ele estivesse mostrando ou algo assim. A maneira como ele sorriu para a c&acirc;mera era como uma crian&ccedil;a mostrando-lhe um castelo de areia que acabou de construir ou algo assim. Eu n&atilde;o sei, eu provavelmente pare&ccedil;o louco. Eu com certeza me sinto parte disso. Eu vou falar com o meu chefe um pouco mais. N&oacute;s temos que nos acalmar-se e descobrir como lidar com isso. Vou atualizar novamente hoje &agrave; noite, mas eu tenho um mau pressentimento sobre como isso vai acontecer.</p>\n<p>UPDATE (04h33min): N&atilde;o h&aacute; sinal de Jeremy. Tentei ligar para ele, mas o telefone foi desligado. N&oacute;s estamos chamando a pol&iacute;cia.</p>\n<p>UPDATE (05h33min): N&atilde;o h&aacute; sinal de Jeremy. Tentei ligar para ele, mas o telefone foi desligado. N&oacute;s estamos chamando a pol&iacute;cia.</p>\n<p>UPDATE (18h33min): N&atilde;o h&aacute; sinal de Jeremy. Tentei ligar para ele, mas o telefone foi desligado. N&oacute;s estamos chamando a pol&iacute;cia.</p>\n<p>UPDATE (19h33min): N&atilde;o h&aacute; sinal de Jeremy. Tentei ligar para ele, mas o telefone foi desligado. N&oacute;s estamos chamando a pol&iacute;cia.</p>\n<p>UPDATE (20h33min): N&atilde;o h&aacute; sinal de Jeremy. Tentei ligar para ele, mas o telefone foi desligado. N&oacute;s estamos chamando a pol&iacute;cia.</p>\n<p>UPDATE (22h58min): Puta merda. Puta merda santa puta merda. Eu cheguei em casa e vi minhas atualiza&ccedil;&otilde;es anteriores. As coisas fazem menos sentido agora do que nunca. Aqui est&aacute; o que eu posso te dizer. Fui trabalhar e Jeremy nunca apareceu, meu chefe e eu decidi chamar a pol&iacute;cia, como voc&ecirc; est&aacute; bem ciente. Quando eu peguei o telefone para ligar, o sol saiu. Aparentemente eu apaguei por exatamente cinco horas, porque quando eu olhei para o rel&oacute;gio, era 09h33min. Acho que ficou preso no la&ccedil;o do tempo de Jeremy, e ent&atilde;o eu apaguei, se isso faz sentido. Mas isso &eacute; quando as coisas ficaram realmente estranhas.</p>\n<p>Meu chefe estava ao meu lado quando eu apaguei, pronto para colaborar com a minha hist&oacute;ria para a pol&iacute;cia. Quando voltei a mim, o telefone estava na minha m&atilde;o, mas ele estava desligado. Meu chefe ainda estava l&aacute;, mas ele n&atilde;o estava se movendo. Ele estava de p&eacute;, mas congelado. Olhei para o rel&oacute;gio de novo e ele n&atilde;o estava se movendo. Era exatamente 09:33. O rel&oacute;gio no registro (tela do computador) n&atilde;o estava se movendo tamb&eacute;m. Meu telefone foi congelado. Houve at&eacute; um cliente no balc&atilde;o, esperando meu patr&atilde;o para lev&aacute;-lo cigarros. Eu estou apostando que seria seu quinto pacote do dia.</p>\n<p>N&atilde;o trave, n&atilde;o apague as luzes, e desculpe-me, eu n&atilde;o pegar as fitas de seguran&ccedil;a para fazer o upload na internet. Acredite em mim, isso era a &uacute;ltima coisa em minha mente. O posto de gasolina est&aacute; em uma estrada principal e os carros estavam estacionados ao longo dela, exceto que eles n&atilde;o estavam estacionados, eles estavam parados. As pessoas dentro dos carros estavam sentadas im&oacute;veis como est&aacute;tuas de cera. Eu entrei no meu carro e rezei para que ele iria ligar. Felizmente ele fez.</p>\n<p>Cerca de meio caminho de casa, o tempo come&ccedil;ou a fluir novamente. A est&aacute;tica do r&aacute;dio se transformou em m&uacute;sica, como &eacute; suposto de ser, e de que eu poderia dizer, ouvindo a conversa entre as m&uacute;sicas do r&aacute;dio, ningu&eacute;m percebeu que o tempo parou, ou o que fosse. Eu era o &uacute;nico. Bem, eu tenho certeza que Jeremy percebeu bem. Eu ainda n&atilde;o tenho ideia de onde ele est&aacute; ou o que est&aacute; fazendo. Eu estou me escondendo no meu quarto e irei chamar a pol&iacute;cia novamente pela manh&atilde;. Estou com medo pela minha vida neste momento. Vou atualizar amanh&atilde;, se eu puder.</p>\n<p>FINAL UPDATE (10h33min): Eu finalmente ca&iacute; no sono na noite passada em torno de 4h. Eu n&atilde;o tenho nenhuma ideia de como eu fiz isso, eu acho que a exaust&atilde;o finalmente obteve o melhor de mim. Esta manh&atilde;, eu acordei com o meu telefone tocando, era meu chefe. Ele estava me chamando desde as 6h. Ele acordou quando o tempo voltou ontem &agrave; noite e imediatamente chamou a pol&iacute;cia. Eles vieram para ver o que estava errado e ele disse-lhes tudo. A pol&iacute;cia aqui s&atilde;o todos rapazes que n&atilde;o trabalham h&aacute; muito tempo, eles estavam mais preocupados com o &oacute;leo de motor faltando do que qualquer coisa, mas meu chefe imaginou que ele iria lev&aacute;-lo, desde que ele teve a sua aten&ccedil;&atilde;o. Eles decidiram ir &agrave; procura de Jeremy.</p>\n<p>N&oacute;s mantemos os registros de todos os nossos empregados em arquivo, e uma vez que Jeremy come&ccedil;ou a trabalhar aqui h&aacute; muito pouco tempo, a dele era f&aacute;cil de encontrar. Eles checaram o endere&ccedil;o dele e fomos para at&eacute; l&aacute;. Voc&ecirc; n&atilde;o vai acreditar no que eles encontraram.</p>\n<p>O endere&ccedil;o Jeremy listado sobre o seu pedido foi um lote vazio. Ou, pelo menos agora ele &eacute;. Costumava haver uma casa l&aacute;, mas foi incendiada em 1993. Sendo uma cidade pequena, quase todo mundo se lembra do fogo naquele dia. Uma fam&iacute;lia de quatro pessoas morava l&aacute;. H&aacute; rumores de que eles tinham um filho distante que eles nunca realmente falaram, mas eu n&atilde;o posso dizer com certeza se isso &eacute; verdade. O que posso dizer &eacute; que na verdade &eacute; que depois de uma investiga&ccedil;&atilde;o de seguros, o fogo foi classificado como um inc&ecirc;ndio criminoso. Toda a casa foi embebida em &oacute;leo e incendiaram com um coquetel molotov. Toda a fam&iacute;lia estava dormindo quando aconteceu, nenhum deles sobreviveu.</p>\n<p>Eles nunca pegaram o cara que fez isso. H&aacute; rumores de que quando eles tentaram entrar em contato com o filho distante, ningu&eacute;m poderia encontr&aacute;-lo.</p>\n<p>De qualquer forma, meu chefe me chamou e me disse isso, e eu me apavorei. Ent&atilde;o ele me pediu para ir ao posto de gasolina. \"O que voc&ecirc; est&aacute; louco?\" Eu disse, mas ele me garantiu que os policiais estavam l&aacute; com ele. Em seguida, ele me falou uma coisa que realmente me surpreendeu: o FBI tamb&eacute;m estava na cidade e eles estavam indo falar comigo, ent&atilde;o eu poderia muito bem ir at&eacute; l&aacute;. Era 07h15min e eu queria ir para a cama, mas achei que n&atilde;o seria capaz de dormir muito mais. De qualquer maneira, eu me deitei.</p>\n<p>Quatro homens de terno me cumprimentaram e disseram-me para se sentar. Repassei tudo duas ou tr&ecirc;s vezes at&eacute; que eles tiveram todos os detalhes do que aconteceu. Eu disse a eles sobre Jeremy, a fita de seguran&ccedil;a, ontem &agrave; noite no trabalho. Tudo. Finalmente, depois que eu terminei, um dos agentes disse: \"Oh Cristo, n&oacute;s temos outra quest&atilde;o em nossas m&atilde;os.\" Ent&atilde;o eles me fizeram assinar um monte de pap&eacute;is dizendo que eu n&atilde;o iria contar a ningu&eacute;m sobre o que aconteceu, por isso n&atilde;o posso dizer muito mais. Eu posso estar infringindo a lei apenas por postar isso.</p>\n<p>&nbsp;</p>\n<p>Ent&atilde;o agora eu estou em casa. Eu n&atilde;o sei o que fazer comigo mesmo. Acredito que as palavras do agente ir&aacute; me atormentar pelo resto de minha vida.</p>\n<p>De qualquer forma, eu tenho que ir. Tenho algumas coisas para fazer hoje, e ent&atilde;o eu tenho que ir trabalhar para pegar algumas fitas. Meu chefe e eu achamos que esse cara novo, Jeremy, fica roubando o &oacute;leo do motor e eu tenho que assistir as imagens de seguran&ccedil;a para ver se eu posso peg&aacute;-lo fazendo isso. Eu tenho coisas melhores para fazer, mas meu chefe est&aacute; me pagando horas extras, e eu estou tentando viajar nas f&eacute;rias. Deve ser muito simples: o &oacute;leo sempre desaparece logo ap&oacute;s seus turnos. Acho que vou apenas assistir as fitas, e peg&aacute;-lo no ato, deve ser isso.</p>', 'g4b9o.jpg', 'Contos', '28/10/2014', 2, ''),
(153, 'Mais estranha fita de seguran&ccedil;a que j&aacute; vi', '<p>dasdas</p>', 'PrAIRQNEwJcTW3ZuXvmK', 'Contos', '29/10/2014', 52, ''),
(154, 'Cadastrar Postagem', '<p>dasdas</p>', 'CJ72fpGzxnuZBvQYw3la', 'LOL', '29/10/2014', 9, ''),
(155, 'Ae', '<p>AE</p>', 'GeKxCqHYSzvIdTfyP79B', 'Ae', '29/10/2014', 9, 'Existem muitas variações disponíveis de passagens de Lorem Ipsum, mas a maioria sofreu algum tipo de alteração, seja por inserção de passagens com humor, ou palavras aleatórias que não parecem nem um pouco convincentes. Se você pretende usar uma passagem de Lorem Ipsum, precisa ter certeza de que não há algo embaraçoso escrito escondido no meio do texto. Todos os geradores de Lorem Ipsum na internet tendem a repetir pedaços predefinidos conforme necessário, fazendo deste o primeiro gerador de Lorem Ipsum autêntico da internet. Ele usa um dicionário com mais de 200 palavras em Latim combinado com um punhado de modelos de estrutura de frases para gerar um Lorem Ipsum com aparência razoável, livre de repetições, inserções de humor, palavras não características, etc.'),
(158, 'Aee teste 1', '<p>aaaa</p>', '158.jpg', 'Kkkk de boas', '15/09/2017', 0, ''),
(159, 'Aee teste 1', '<p>aaaa</p>', '159.jpg', 'Kkkk de boas', '15/09/2017', 0, ''),
(160, 'Aee teste 1', '<p>aaaa</p>', '160.jpg', 'Kkkk de boas', '15/09/2017', 0, ''),
(161, 'Aee teste 1', '<p>aaaa</p>', '161.jpg', 'Kkkk de boas', '15/09/2017', 0, ''),
(162, 'Aee teste 1', '<p>aaaa</p>', '162.jpg', 'Kkkk de boas', '15/09/2017', 0, ''),
(163, 'Adsadas', '<p>cxzcxz</p>', '163.jpg', 'Dsadas', '15/09/2017', 0, ''),
(164, 'Este é um post de teste', '<p>Aeeee</p>', '164.jpg', 'A categoria não importa', '15/09/2017', 0, ''),
(165, 'Teste 2', '<p>dsadasdasdas</p>', '165.jpg', 'Teeste', '26/09/2017', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_usuarios`
--
ALTER TABLE `admin_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_usuarios`
--
ALTER TABLE `game_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_comentarios`
--
ALTER TABLE `main_comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_contato`
--
ALTER TABLE `main_contato`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_postagens`
--
ALTER TABLE `main_postagens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_usuarios`
--
ALTER TABLE `admin_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `game_usuarios`
--
ALTER TABLE `game_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `main_comentarios`
--
ALTER TABLE `main_comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `main_contato`
--
ALTER TABLE `main_contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `main_postagens`
--
ALTER TABLE `main_postagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
