-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 16-Fev-2023 às 23:39
-- Versão do servidor: 10.5.16-MariaDB
-- versão do PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id20316756_footcards_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogadores`
--

CREATE TABLE `jogadores` (
  `id` int(11) NOT NULL,
  `nome_jogador` varchar(100) NOT NULL,
  `jogos` int(11) NOT NULL,
  `vitorias` int(11) NOT NULL,
  `gols` int(11) NOT NULL,
  `ano_nascimento` int(11) NOT NULL,
  `valor_carta` int(11) DEFAULT NULL,
  `nome_arquivo` varchar(1000) DEFAULT NULL,
  `caminho_arquivo` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `jogadores`
--

INSERT INTO `jogadores` (`id`, `nome_jogador`, `jogos`, `vitorias`, `gols`, `ano_nascimento`, `valor_carta`, `nome_arquivo`, `caminho_arquivo`) VALUES
(36, 'Ibrahimovic', 1010, 743, 550, 1981, 3100, 'ibrahimovic_nega_saxda_do_milan.jpg_327023302 - Editado.png', 'files/63e5759a2352d.png'),
(37, 'Ronaldo(Legend)', 980, 753, 414, 1976, 70000, 'ronaldo.png', 'files/63e580afccb6c.png'),
(38, 'Lewandowski', 1324, 634, 540, 1988, 14500, 'lewandowski.jpg', 'files/63ed5cea1b4a1.jpg'),
(39, 'Hulk', 870, 540, 372, 1986, 20400, 'hulk.jpg', 'files/63ed5d2129ba4.jpg'),
(40, 'Romário (Legend)', 1230, 766, 788, 1966, 63500, 'romario_legend.jpg', 'files/63ed5d7ebca23.jpg'),
(41, 'Cristiano Ronaldo', 1134, 643, 780, 1985, 43600, 'cr7.jpg', 'files/63ed5dac27ba0.jpg'),
(42, 'Paulo Baier (Legend)', 1120, 870, 650, 1974, 9999999, 'paulobaier_legend.jpg', 'files/63ed5dd9b87d2.jpg'),
(43, 'Obina', 768, 230, 250, 1983, 10400, 'obina_legend.jpg', 'files/63ed5e03a345d.jpg'),
(44, 'Messi', 1320, 768, 690, 1987, 83200, 'messi_legend.jpg', 'files/63ed5e32966e4.jpg'),
(45, 'Neymar Jr.', 987, 596, 634, 1992, 53400, 'neymar.jpg', 'files/63ed5e66bf2af.jpg'),
(46, 'Gabigol', 453, 230, 213, 1996, 8760, 'gabigol.jpg', 'files/63ed5eb07e6cd.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `loja_das_cartas`
--

CREATE TABLE `loja_das_cartas` (
  `id` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `id_carta` int(11) NOT NULL,
  `valor_carta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `credits` float DEFAULT NULL,
  `nome_completo` varchar(50) DEFAULT NULL,
  `last_sort` date DEFAULT NULL,
  `nome_arquivouser` varchar(100) DEFAULT NULL,
  `caminho_arquivouser` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `senha`, `credits`, `nome_completo`, `last_sort`, `nome_arquivouser`, `caminho_arquivouser`) VALUES
(20, 'juva015', '123', 1923, 'Lucas Guilherme', '2023-02-15', 'download.jpg', 'files/63e2ef08ea610.jpg'),
(24, 'juanbraço20', '12345', 0, 'Juan Braço Cabuloso', '2023-02-15', 'icon_trunfo.png', 'files/63e4260d0db85.png'),
(34, 'geremias157', '123', NULL, 'Lucas Guilherme', NULL, 'download.jpg', 'files/63e2d1e3bb4e3.jpg'),
(36, 'gabileleu12', '123', NULL, 'Gabriel Fernandes', NULL, 'cruzeiro.png', 'files/63e57da192571.png'),
(37, 'adm', '133', 219300, 'CEO Leandro', '2023-02-16', 'neymar.jpg', 'files/63e6b8b6ef526.jpg'),
(40, 'horing12', '1234', 0, 'Paulo Horing', '2023-02-15', 'rooney.jpg', 'files/63ed60420292c.jpg'),
(41, 'caralho22', '123', NULL, 'caralho', '2023-02-15', NULL, NULL),
(42, 'bibi2', '123', NULL, 'Gabriel Fernandes de Oliveira', NULL, NULL, NULL),
(43, 'ias2', '123', NULL, 'Lebre Fortunata', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_cartas`
--

CREATE TABLE `usuario_cartas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_carta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario_cartas`
--

INSERT INTO `usuario_cartas` (`id`, `id_usuario`, `id_carta`) VALUES
(5, 36, 36),
(6, 36, 37),
(30, 20, 36),
(31, 20, 36),
(32, 20, 36),
(33, 20, 36),
(37, 37, 36),
(38, 37, 37),
(39, 20, 37),
(40, 24, 36),
(42, 40, 44),
(43, 41, 36),
(44, 37, 38);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `jogadores`
--
ALTER TABLE `jogadores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `loja_das_cartas`
--
ALTER TABLE `loja_das_cartas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario_fk` (`id`),
  ADD KEY `id_carta_fk` (`id`),
  ADD KEY `id_vendedor` (`id_vendedor`),
  ADD KEY `loja_das_cartasfk3` (`id_carta`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario_cartas`
--
ALTER TABLE `usuario_cartas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario_fk` (`id_usuario`),
  ADD KEY `id_carta_fk` (`id_carta`) USING BTREE;

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `jogadores`
--
ALTER TABLE `jogadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `loja_das_cartas`
--
ALTER TABLE `loja_das_cartas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `usuario_cartas`
--
ALTER TABLE `usuario_cartas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `loja_das_cartas`
--
ALTER TABLE `loja_das_cartas`
  ADD CONSTRAINT `loja_das_cartas_ibfk_1` FOREIGN KEY (`id_vendedor`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `loja_das_cartasfk3` FOREIGN KEY (`id_carta`) REFERENCES `jogadores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario_cartas`
--
ALTER TABLE `usuario_cartas`
  ADD CONSTRAINT `usuario_cartas_ibfk_1` FOREIGN KEY (`id_carta`) REFERENCES `jogadores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_cartas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
