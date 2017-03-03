-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 02/03/2017 às 13:09
-- Versão do servidor: 5.7.17-0ubuntu0.16.10.1
-- Versão do PHP: 7.0.15-0ubuntu0.16.10.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `startdemand`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tsPreparaPedido`
--

CREATE TABLE `tsPreparaPedido` (
  `idPreparaPedido` int(11) NOT NULL,
  `cpCodPedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tsUsuario`
--

CREATE TABLE `tsUsuario` (
  `idUsuario` int(11) NOT NULL,
  `cpNome` varchar(100) NOT NULL,
  `cpSenha` varchar(41) NOT NULL,
  `cpStatus` varchar(1) NOT NULL DEFAULT 'A',
  `cpNivelAcesso` char(1) NOT NULL DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tsUsuario`
--

INSERT INTO `tsUsuario` (`idUsuario`, `cpNome`, `cpSenha`, `cpStatus`, `cpNivelAcesso`) VALUES
(1, 'Fabio', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'A', 'C');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tuAcrescimo`
--

CREATE TABLE `tuAcrescimo` (
  `idAcrescimo` int(11) NOT NULL,
  `cpAcrescimo` varchar(100) NOT NULL,
  `cpQtdAcrescimo` float NOT NULL,
  `cpValorBaseAcrescimo` float NOT NULL,
  `cpValorAcrescimo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tuPedido`
--

CREATE TABLE `tuPedido` (
  `idPedido` int(11) NOT NULL,
  `cptuProduto_idProduto` int(11) NOT NULL,
  `cpCodPedido` int(3) UNSIGNED ZEROFILL NOT NULL,
  `tuAcrescimo_idAcrescimo` int(11) NOT NULL,
  `cpQtdProduto` int(5) NOT NULL,
  `cpComplementoUm` varchar(100) NOT NULL,
  `cpComplementoDois` varchar(100) NOT NULL,
  `cpAcrescimo` varchar(100) NOT NULL,
  `cpQtdAcrescimo` int(5) NOT NULL,
  `cpValorAcrescimo` varchar(100) NOT NULL,
  `cpValorTotalPedido` float NOT NULL,
  `cpStatusPedido` char(1) NOT NULL DEFAULT 'A',
  `cpObservacaoPedido` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tuPedido`
--

INSERT INTO `tuPedido` (`idPedido`, `cptuProduto_idProduto`, `cpCodPedido`, `tuAcrescimo_idAcrescimo`, `cpQtdProduto`, `cpComplementoUm`, `cpComplementoDois`, `cpAcrescimo`, `cpQtdAcrescimo`, `cpValorAcrescimo`, `cpValorTotalPedido`, `cpStatusPedido`, `cpObservacaoPedido`) VALUES
(1, 16, 000, 0, 1, 'Banana', 'Morando', 'Ovo maltine', 2, '20.02', 30.02, 'A', 'ok'),
(3, 14, 000, 0, 4, 'Pessego', 'Morando', 'Bombom', 2, '1.01', 68.06, 'A', 'ok'),
(4, 14, 000, 0, 2, 'Banana', 'Kiwi', 'Bombom', 3, '3.0300000000000002', 27.05, 'A', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tuProduto`
--

CREATE TABLE `tuProduto` (
  `idProduto` int(11) NOT NULL,
  `cpNomeProduto` varchar(255) NOT NULL,
  `cpQtdProduto` int(4) NOT NULL,
  `cpTipoProduto` varchar(100) NOT NULL,
  `cpValorProduto` float NOT NULL,
  `cpTipoObservacao` varchar(45) NOT NULL,
  `cpStatusPedido` char(1) NOT NULL DEFAULT 'A',
  `cpObservacaoProduto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tuProduto`
--

INSERT INTO `tuProduto` (`idProduto`, `cpNomeProduto`, `cpQtdProduto`, `cpTipoProduto`, `cpValorProduto`, `cpTipoObservacao`, `cpStatusPedido`, `cpObservacaoProduto`) VALUES
(13, 'Bombom', 1, 'Industrializado', 1.1, 'Acrescimo', 'A', 'acrescimo'),
(14, 'Acai 300ml', 1, 'Industrializado', 12.1, 'Produto', 'A', '300 ml'),
(15, 'Ovo maltine', 1, 'Industrializado', 10.1, 'Acrescimo', 'A', ''),
(16, 'Vitamina', 1, 'Caseiro', 10, 'Produto', 'A', 'Vitamina de aÃ§ai'),
(17, 'Creme avelÃ¢', 1, 'Industrializado', 3, 'Acrescimo', 'A', 'creme de avelÃ£ nuttella'),
(18, 'Nuttella', 1, 'Industrializado', 10, 'Acrescimo', 'A', 'acrescimo'),
(19, 'Sorvete', 1, 'Caseiro', 16, 'Produto', 'A', 'Sorvete napolitano'),
(20, 'AÃ§ai 500ml', 1, 'Industrializado', 16, 'Produto', 'A', ''),
(22, 'Acai 10L', 1, 'Industrializado', 100, 'Produto', 'A', '');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tsPreparaPedido`
--
ALTER TABLE `tsPreparaPedido`
  ADD PRIMARY KEY (`idPreparaPedido`);

--
-- Índices de tabela `tsUsuario`
--
ALTER TABLE `tsUsuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Índices de tabela `tuAcrescimo`
--
ALTER TABLE `tuAcrescimo`
  ADD PRIMARY KEY (`idAcrescimo`);

--
-- Índices de tabela `tuPedido`
--
ALTER TABLE `tuPedido`
  ADD PRIMARY KEY (`idPedido`);

--
-- Índices de tabela `tuProduto`
--
ALTER TABLE `tuProduto`
  ADD PRIMARY KEY (`idProduto`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tsPreparaPedido`
--
ALTER TABLE `tsPreparaPedido`
  MODIFY `idPreparaPedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tsUsuario`
--
ALTER TABLE `tsUsuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `tuAcrescimo`
--
ALTER TABLE `tuAcrescimo`
  MODIFY `idAcrescimo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tuPedido`
--
ALTER TABLE `tuPedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `tuProduto`
--
ALTER TABLE `tuProduto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
