-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 06/04/2018 às 02:40
-- Versão do servidor: 10.1.31-MariaDB
-- Versão do PHP: 7.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u277696104_work`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `associados`
--

CREATE TABLE `associados` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dataNasc` varchar(30) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `endereco` varchar(300) NOT NULL,
  `ex` varchar(1) NOT NULL,
  `dataAdm` varchar(30) NOT NULL,
  `mensalidades` varchar(12) NOT NULL,
  `perfil` varchar(100) NOT NULL,
  `nomeMae` varchar(200) NOT NULL,
  `nomePai` varchar(200) NOT NULL,
  `dataMae` varchar(30) NOT NULL,
  `dataPai` varchar(30) NOT NULL,
  `telefoneMae` varchar(30) NOT NULL,
  `telefonePai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `associados`
--

INSERT INTO `associados` (`id`, `nome`, `login`, `senha`, `cargo`, `email`, `dataNasc`, `telefone`, `endereco`, `ex`, `dataAdm`, `mensalidades`, `perfil`, `nomeMae`, `nomePai`, `dataMae`, `dataPai`, `telefoneMae`, `telefonePai`) VALUES
(7, 'Antonio Erisvan Alves Junior', 'eris.junior', '3ec9bf632c4cfacc08156e63052c9dfe', 'Presidente', 'erisvan.junior.a@gmail.com', '07/11/2001', '(84)9.9466-1363', 'Rua Dr. Jose Torquato, Centro - 1010', 'n', 'Janeiro de 2016', '111111111000', 'c08b414285ec3b9f215b8414d0979275.jpg', 'Francisca Ferreira de AraÃºjo Alves', 'Antonio Erisvan Alves', '29/03/1968', '26/10/1967', '(84)9.9710-3625', '(84)9.9116-9467'),
(9, 'Flávia Rafaela Diógenes Ferreira', 'flaviarafaelad', 'a240966d9045a296cf0cdfd07c638cdd', 'Secretário', 'flavia.rafinha_10@hotmail.com', '27/02/2002', '(84)9.9450-5987', 'Rua Chico Mizael - Treze de Maio - 143', 'n', 'Fevereiro de 2016', '111111000000', '5faa093e812c7ba3bd8382bf2356c992.jpg', 'Cosma Diógenes Ferreira', 'José Ferreira Sobrinho', '09/10/1968', '17/06', '(84)9.9124-9248', '(84)9.9493-8300'),
(10, 'Eduardo Aquino', 'dudu', '95c79be95ca76e343be412d45ef1a701', 'Past-President G.2015-16', 'dudufaquino@gmail.com', '04/04/1999', '(84)9.9178-9643', 'Rua Dep. Hesiquio Fernandes', 's', 'Abril de 2015', '000000000000', '90f5930b68454174761a8fbe91f3f2b8.jpg', 'Efigenia Aquino', 'Francisco Hipolito', '29/07/1973', '10/09/1965', '(84)9.9991-9921', '(84)9.9499-1351');

-- --------------------------------------------------------

--
-- Estrutura para tabela `avisos`
--

CREATE TABLE `avisos` (
  `id` int(11) NOT NULL,
  `aviso` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `caixa`
--

CREATE TABLE `caixa` (
  `id` int(11) NOT NULL,
  `valor` double NOT NULL,
  `data` date NOT NULL,
  `origem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `caixa`
--

INSERT INTO `caixa` (`id`, `valor`, `data`, `origem`) VALUES
(11, 30, '2018-04-05', 'Doações'),
(12, -12.5, '2018-04-04', 'Perdi');

-- --------------------------------------------------------

--
-- Estrutura para tabela `dividas`
--

CREATE TABLE `dividas` (
  `id` int(11) NOT NULL,
  `idP` int(11) NOT NULL,
  `valor` double NOT NULL,
  `origem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `dividas`
--

INSERT INTO `dividas` (`id`, `idP`, `valor`, `origem`) VALUES
(3, 7, 10, 'Mens'),
(4, 7, 20, 'Quadro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `gestao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `registros`
--

INSERT INTO `registros` (`id`, `gestao`, `tipo`, `nome`) VALUES
(5, 'G.17.18', 'Projetos', 'CriativIdade.docx');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `associados`
--
ALTER TABLE `associados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `avisos`
--
ALTER TABLE `avisos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `caixa`
--
ALTER TABLE `caixa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `dividas`
--
ALTER TABLE `dividas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `associados`
--
ALTER TABLE `associados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `avisos`
--
ALTER TABLE `avisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `caixa`
--
ALTER TABLE `caixa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `dividas`
--
ALTER TABLE `dividas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
