-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 22/05/2017 às 21:40
-- Versão do servidor: 5.7.18-0ubuntu0.16.10.1
-- Versão do PHP: 7.0.15-0ubuntu0.16.10.4

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
-- Estrutura para tabela `teContas`
--

CREATE TABLE `teContas` (
  `idContas` int(11) NOT NULL,
  `cpStatusConta` char(1) NOT NULL DEFAULT 'A',
  `cpTipoConta` char(1) NOT NULL,
  `cpClassificacaoConta` varchar(10) NOT NULL,
  `cpValorConta` float NOT NULL,
  `cpObservacaoConta` text NOT NULL,
  `cpDataCadastroConta` datetime NOT NULL,
  `cpDataVencimentoConta` varchar(20) NOT NULL,
  `cpUsuario` varchar(20) DEFAULT NULL,
  `cpAlteracaoUltimoUsuario` varchar(20) DEFAULT NULL,
  `cpDataUltimaAlteracao` datetime DEFAULT NULL,
  `cpUsuarioFechamentoConta` varchar(20) DEFAULT NULL,
  `cpDataFechamentoConta` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `teContas`
--

INSERT INTO `teContas` (`idContas`, `cpStatusConta`, `cpTipoConta`, `cpClassificacaoConta`, `cpValorConta`, `cpObservacaoConta`, `cpDataCadastroConta`, `cpDataVencimentoConta`, `cpUsuario`, `cpAlteracaoUltimoUsuario`, `cpDataUltimaAlteracao`, `cpUsuarioFechamentoConta`, `cpDataFechamentoConta`) VALUES
(23, 'F', 'P', 'Luz', 232.23, '', '2017-04-09 23:04:37', '10/04/2017', 'Fabio', NULL, NULL, 'Fabio', '2017-04-09 23:04:54'),
(24, 'F', 'P', 'Agua', 310.23, '', '2017-04-09 23:25:18', '11/04/2017', 'Fabio', 'Fabio', '2017-04-09 23:44:34', 'Fabio', '2017-04-09 23:46:36'),
(25, 'F', 'R', 'Agua', 123.33, '', '2017-04-09 23:39:10', '10/04/2017', 'Fabio', NULL, NULL, 'Fabio', '2017-04-09 23:39:26'),
(26, 'F', 'R', 'Outro', 231.33, 'Venda de hd', '2017-04-10 00:00:06', '11/04/2017', 'Fabio', NULL, NULL, 'Fabio', '2017-04-10 00:29:05'),
(27, 'F', 'P', 'Luz', 230.23, '', '2017-04-10 00:04:38', '12/04/2017', 'Fabio', 'Fabio', '2017-04-10 00:05:13', 'Fabio', '2017-04-10 00:32:12'),
(28, 'F', 'P', 'Luz', 321.33, '', '2017-04-10 00:39:52', '12/04/2017', 'Fabio', NULL, NULL, 'Fabio', '2017-04-11 00:20:06'),
(29, 'F', 'R', 'Luz', 100.3, '', '2017-04-12 16:19:50', '12/04/2017', 'Fabio', 'Fabio', '2017-04-12 16:20:52', 'Amanda', '2017-04-12 16:21:50'),
(30, 'F', 'P', 'Internet', 202.2, '', '2017-04-12 16:23:01', '13/04/2017', 'Amanda', NULL, NULL, 'Fabio', '2017-04-13 00:17:53'),
(31, 'F', 'R', 'Outro', 10.1, '', '2017-04-12 16:23:41', '12/04/2017', 'Amanda', NULL, NULL, 'Amanda', '2017-04-12 16:28:04'),
(32, 'F', 'P', 'Luz', 123.12, '', '2017-04-19 10:01:40', '19/04/2017', 'Fabio', NULL, NULL, 'Fabio', '2017-04-19 10:24:23'),
(33, 'F', 'P', 'Luz', 213.54, '', '2017-04-19 11:22:35', '20/04/2017', 'Fabio', 'Fabio', '2017-04-19 11:23:17', 'Fabio', '2017-04-20 00:02:52'),
(34, 'F', 'R', 'Outro', 100, 'Pagamento fiado do jonata', '2017-04-21 11:49:13', '21/04/2017', 'Amanda', NULL, NULL, 'Fabio', '2017-04-21 11:50:35'),
(35, 'F', 'P', 'Luz', 123.33, '', '2017-04-21 11:52:28', '22/04/2017', 'Jonata', NULL, NULL, 'Fabio', '2017-04-21 21:13:29'),
(36, 'F', 'R', 'Outro', 252.22, 'NetFlix', '2017-04-21 20:02:11', '21/04/2017', 'Fabio', NULL, NULL, 'Fabio', '2017-04-21 20:04:10'),
(37, 'F', 'R', 'Agua', 154.52, '', '2017-04-21 20:03:37', '21/04/2017', 'Fabio', NULL, NULL, 'Fabio', '2017-04-21 20:04:19'),
(38, 'F', 'P', 'Agua', 232.21, '', '2017-04-21 21:12:12', '21/04/2017', 'Fabio', NULL, NULL, 'Fabio', '2017-04-21 21:13:05'),
(39, 'A', 'P', 'Luz', 121.31, '', '2017-05-02 09:38:48', '02/05/2017', 'Fabio', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `teFinanceiro`
--

CREATE TABLE `teFinanceiro` (
  `idFinanceiro` int(11) NOT NULL,
  `cpStatusFinanceiro` char(1) NOT NULL DEFAULT 'A',
  `cpValorTotal` float NOT NULL,
  `cpValorLiquidoTotal` float NOT NULL,
  `cpDataCompra` date DEFAULT NULL,
  `cpDataLancamento` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `teFinanceiro`
--

INSERT INTO `teFinanceiro` (`idFinanceiro`, `cpStatusFinanceiro`, `cpValorTotal`, `cpValorLiquidoTotal`, `cpDataCompra`, `cpDataLancamento`) VALUES
(37, 'F', 151.8, 148.1, '2017-04-21', '2017-04-21 16:59:07'),
(38, 'C', 59.7, 57.378, '2017-04-21', '2017-04-21 17:20:23'),
(39, 'F', 65.7, 65.7, '2017-04-24', '2017-04-24 23:58:41'),
(40, 'F', 68.7, 68.7, '2017-04-25', '2017-04-25 12:00:20'),
(41, 'F', 50.7, 49.19, '2017-04-26', '2017-04-26 22:59:52'),
(42, 'F', 24.6, 23.3, '2017-05-01', '2017-05-01 21:15:48'),
(43, 'F', 12.3, 11.6, '2017-05-02', '2017-05-02 09:34:40');

-- --------------------------------------------------------

--
-- Estrutura para tabela `teTaxasJuros`
--

CREATE TABLE `teTaxasJuros` (
  `idTaxaJuros` int(11) NOT NULL,
  `cpFormaPagamentoTaxa` char(2) NOT NULL DEFAULT 'D',
  `cpPlanoPagSeguro` int(2) NOT NULL DEFAULT '14',
  `cpBandeiraCartaoTaxa` varchar(10) NOT NULL DEFAULT 'Nenhuma',
  `cpPorcentagemTaxa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `teTaxasJuros`
--

INSERT INTO `teTaxasJuros` (`idTaxaJuros`, `cpFormaPagamentoTaxa`, `cpPlanoPagSeguro`, `cpBandeiraCartaoTaxa`, `cpPorcentagemTaxa`) VALUES
(6, 'CC', 0, 'Visa', 1.01),
(7, 'CD', 0, 'Master', 2.1),
(9, 'PS', 14, '', 4.99),
(13, 'PS', 30, '', 3.99),
(14, 'CD', 0, 'Cielo', 2.99),
(18, 'CD', 0, 'Visa', 2.31),
(20, 'CC', 0, 'Cielo', 3.69),
(21, 'CC', 0, 'Master', 3.24);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tsPreparaProduto`
--

CREATE TABLE `tsPreparaProduto` (
  `idPreparaProduto` int(11) NOT NULL,
  `tuProduto_idProduto` int(11) NOT NULL,
  `cpQtdProduto` int(5) NOT NULL,
  `cpComplementoUm` varchar(100) NOT NULL,
  `cpComplementoDois` varchar(100) NOT NULL,
  `cpCodPedido` int(3) UNSIGNED ZEROFILL NOT NULL DEFAULT '000',
  `cpValorBaseProduto` float NOT NULL,
  `cpValorTotalProduto` float NOT NULL,
  `cpFormaPagamento` char(2) NOT NULL DEFAULT 'D',
  `cpQtdParcela` int(2) DEFAULT NULL,
  `cpValorParcela` float DEFAULT NULL,
  `cpPlanoPagSeguroPedido` int(2) NOT NULL,
  `cpBandeiraCartaoPedido` varchar(10) NOT NULL,
  `cpPorcentagemJurosPedido` float DEFAULT NULL,
  `cpValorTaxaJurosPedido` float DEFAULT NULL,
  `cpValorTotalLiquidoPedido` float NOT NULL,
  `cpObservacaoPedido` text NOT NULL
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
  `cpNivelAcesso` char(1) NOT NULL DEFAULT 'C',
  `cpDataCadastro` datetime DEFAULT NULL,
  `cpAlteracaoUsuario` varchar(20) DEFAULT NULL,
  `cpDataAlteracaoUsuario` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tsUsuario`
--

INSERT INTO `tsUsuario` (`idUsuario`, `cpNome`, `cpSenha`, `cpStatus`, `cpNivelAcesso`, `cpDataCadastro`, `cpAlteracaoUsuario`, `cpDataAlteracaoUsuario`) VALUES
(3, 'Fabio', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'A', 'A', '2017-04-10 18:21:47', '', NULL),
(4, 'Amanda', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'B', 'S', '2017-04-10 18:23:25', 'Jonata', '2017-04-21 11:53:28'),
(16, 'Jose', 'c55c508614dd2a3e2ca2a00250dc33fb924a7244', 'A', 'C', '2017-04-21 20:52:17', NULL, NULL),
(17, 'Ana', '66aa1cb9a469f74f6057878a4dcaaf9dbabd9529', 'A', 'C', '2017-04-21 21:04:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tuAcrescimo`
--

CREATE TABLE `tuAcrescimo` (
  `idAcrescimo` int(11) NOT NULL,
  `cpStatusAcrescimo` char(1) NOT NULL DEFAULT 'A',
  `cpSituacaoAcrescimo` char(1) NOT NULL DEFAULT 'A',
  `tuPedido_idPedido` int(11) DEFAULT NULL,
  `tuPedido_cpCodPedido` int(3) UNSIGNED ZEROFILL NOT NULL DEFAULT '000',
  `cpAcrescimo` varchar(100) NOT NULL,
  `cpQtdAcrescimo` int(2) NOT NULL,
  `cpValorBaseAcrescimo` float NOT NULL,
  `cpTipoAcrescimo` char(1) NOT NULL,
  `cpFormaPagamentoAcrescimo` char(2) NOT NULL DEFAULT 'D',
  `cpBandeiraCartao` varchar(10) NOT NULL,
  `cpQtdParcelaAcrescimo` int(2) DEFAULT NULL,
  `cpValorParcelaAcrescimo` float DEFAULT NULL,
  `cpValorTotalAcrescimo` float NOT NULL,
  `cpDataCompraAcrescimo` datetime DEFAULT NULL,
  `cpObservacaoAcrescimo` text NOT NULL,
  `cpPorcentagemTaxa` float DEFAULT NULL,
  `cpValorTaxaJuros` float DEFAULT NULL,
  `cpValorTotalLiquido` float DEFAULT NULL,
  `cpDataBaixa` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tuAcrescimo`
--

INSERT INTO `tuAcrescimo` (`idAcrescimo`, `cpStatusAcrescimo`, `cpSituacaoAcrescimo`, `tuPedido_idPedido`, `tuPedido_cpCodPedido`, `cpAcrescimo`, `cpQtdAcrescimo`, `cpValorBaseAcrescimo`, `cpTipoAcrescimo`, `cpFormaPagamentoAcrescimo`, `cpBandeiraCartao`, `cpQtdParcelaAcrescimo`, `cpValorParcelaAcrescimo`, `cpValorTotalAcrescimo`, `cpDataCompraAcrescimo`, `cpObservacaoAcrescimo`, `cpPorcentagemTaxa`, `cpValorTaxaJuros`, `cpValorTotalLiquido`, `cpDataBaixa`) VALUES
(31, 'F', 'B', 17, 001, 'Bombom', 1, 1.1, 'P', 'PD', 'PD', 0, 0, 1.1, '2017-04-26 22:10:54', '', 0, 0, 0, NULL),
(32, 'F', 'B', 17, 001, 'Bombom', 1, 1.1, 'P', 'PD', 'PD', 0, 0, 1.1, '2017-04-26 22:13:56', '', 0, 0, 0, NULL),
(33, 'F', 'B', 18, 002, 'Bombom', 1, 1.1, 'P', 'PD', 'PD', 0, 0, 1.1, '2017-04-26 22:33:05', '', 0, 0, 0, NULL),
(34, 'F', 'B', 19, 002, 'Bombom', 1, 1.1, 'P', 'PD', 'PD', 0, 0, 1.1, '2017-04-26 22:34:22', '', 0, 0, 0, NULL),
(35, 'F', 'B', 19, 002, 'Bombom', 1, 1.1, 'P', 'PD', 'PD', 0, 0, 1.1, '2017-04-26 22:58:47', '', 0, 0, 0, NULL),
(36, 'F', 'B', 19, 002, 'Bombom', 2, 1.1, 'P', 'PD', 'PD', 0, 0, 2.2, '2017-04-26 22:59:04', '', 0, 0, 0, NULL),
(37, 'F', 'B', NULL, 002, 'Bombom', 1, 1.1, 'N', 'D', 'Dinheiro', 0, 0, 1.1, '2017-04-26 23:03:07', '', 0, 0, 1.1, '2017-04-26 23:03:22'),
(38, 'F', 'B', NULL, 002, 'Bombom', 3, 1.1, 'N', 'D', 'Dinheiro', 0, 0, 3.3, '2017-04-26 23:03:48', '', 0, 0, 3.3, '2017-04-26 23:04:41'),
(39, 'F', 'A', 22, 001, 'Nuttela', 3, 12.33, 'P', 'PD', 'PD', 0, 0, 36.99, '2017-05-02 09:37:10', '', 0, 0, 0, NULL),
(40, 'F', 'A', 22, 001, 'Bombom', 1, 1.1, 'P', 'PD', 'PD', 0, 0, 1.1, '2017-05-02 09:37:30', '', 0, 0, 0, NULL),
(41, 'A', 'A', NULL, 002, 'Nuttela', 2, 12.33, 'N', 'D', 'Dinheiro', 0, 0, 24.66, '2017-05-04 23:21:24', '', 0, 0, 24.66, NULL),
(42, 'A', 'A', NULL, 002, 'Bombom', 1, 1.1, 'N', 'D', 'Dinheiro', 0, 0, 1.1, '2017-05-04 23:24:54', '', 0, 0, 1.1, NULL),
(43, 'A', 'A', NULL, 001, 'Soverte', 1, 2.12, 'N', 'D', 'Dinheiro', 0, 0, 2.12, '2017-05-04 23:36:08', '', 0, 0, 2.12, NULL),
(44, 'A', 'A', NULL, 002, 'Bombom', 2, 1.1, 'N', 'PS', 'PagSeguro', 0, 0, 2.2, '2017-05-19 00:14:55', '', 4.99, 0.1, 2.09, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tuPedido`
--

CREATE TABLE `tuPedido` (
  `idPedido` int(11) NOT NULL,
  `cpStatusPedido` char(1) NOT NULL DEFAULT 'A',
  `tuProduto_idProduto` int(11) NOT NULL,
  `tsPreparaProduto_idPreparaProduto` int(11) DEFAULT NULL,
  `cpCodPedido` int(3) UNSIGNED ZEROFILL NOT NULL,
  `cpQtdProduto` int(5) NOT NULL,
  `cpComplementoUm` varchar(100) NOT NULL,
  `cpComplementoDois` varchar(100) NOT NULL,
  `cpSituacaoPedido` char(1) NOT NULL DEFAULT 'A',
  `cpHoraPedido` date DEFAULT NULL,
  `cpFormaPagamento` char(2) NOT NULL DEFAULT 'D',
  `cpValorTotalProduto` float NOT NULL,
  `cpQtdParcela` int(2) DEFAULT NULL,
  `cpValorParcela` float DEFAULT NULL,
  `cpValorTotalPedido` float NOT NULL,
  `cpPlanoPagSeguroPedido` int(2) NOT NULL,
  `cpBandeiraCartaoPedido` varchar(10) NOT NULL,
  `cpPorcentagemJurosPedido` float DEFAULT NULL,
  `cpValorTaxaJurosPedido` float DEFAULT NULL,
  `cpValorTotalLiquidoPedido` float NOT NULL,
  `cpDataBaixa` datetime DEFAULT NULL,
  `cpUsuarioBaixa` varchar(20) DEFAULT NULL,
  `cpObservacaoPedido` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tuPedido`
--

INSERT INTO `tuPedido` (`idPedido`, `cpStatusPedido`, `tuProduto_idProduto`, `tsPreparaProduto_idPreparaProduto`, `cpCodPedido`, `cpQtdProduto`, `cpComplementoUm`, `cpComplementoDois`, `cpSituacaoPedido`, `cpHoraPedido`, `cpFormaPagamento`, `cpValorTotalProduto`, `cpQtdParcela`, `cpValorParcela`, `cpValorTotalPedido`, `cpPlanoPagSeguroPedido`, `cpBandeiraCartaoPedido`, `cpPorcentagemJurosPedido`, `cpValorTaxaJurosPedido`, `cpValorTotalLiquidoPedido`, `cpDataBaixa`, `cpUsuarioBaixa`, `cpObservacaoPedido`) VALUES
(17, 'F', 29, 7, 001, 2, 'Banana', 'Banana', 'B', '2017-04-26', 'CC', 12.6, 2, 7.95, 15.9, 0, '0', 2.1, 0.04, 15.8, '2017-04-26 22:59:55', 'Fabio', ''),
(18, 'F', 26, 8, 002, 1, 'Banana', 'Chocolate preto', 'B', '2017-04-26', 'PS', 12.3, 0, 0, 13.4, 14, 'PagSeguro', 4.99, 0.664, 12.79, '2017-04-26 22:59:52', 'Fabio', ''),
(19, 'F', 29, 9, 002, 2, 'Banana', 'Chocolate branco', 'B', '2017-04-26', 'PS', 12.6, 0, 0, 17, 14, 'PagSeguro', 4.99, 0.82, 16.2, '2017-04-26 22:59:57', 'Fabio', ''),
(20, 'F', 26, NULL, 001, 2, 'Banana', 'Pessego', 'B', '2017-05-01', 'PS', 24.6, 0, 0, 24.6, 14, 'PagSeguro', 4.99, 1.22, 23.3, '2017-05-01 21:15:48', 'Fabio', ''),
(21, 'F', 26, NULL, 002, 1, 'Pessego', 'Morando', 'B', '2017-05-02', 'PS', 12.3, 0, 0, 12.3, 14, 'PagSeguro', 4.99, 0.61, 11.6, '2017-05-02 09:34:40', 'Fabio', ''),
(22, 'F', 26, 1, 001, 3, 'Banana', 'Morando', 'A', '2017-05-02', 'D', 36.9, 0, 0, 74.99, 0, '0', 0, 0, 74.9, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tuPreparaAcrescimo`
--

CREATE TABLE `tuPreparaAcrescimo` (
  `idPreparaAcrescimo` int(11) NOT NULL,
  `tuPedido_cpCodPedido` int(3) UNSIGNED ZEROFILL NOT NULL,
  `cpAcrescimo` varchar(100) NOT NULL,
  `cpQtdAcrescimo` float NOT NULL,
  `cpValorBaseAcrescimo` float NOT NULL,
  `cpValorTotalAcrescimo` float NOT NULL,
  `cpObservacaoAcrescimo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `cpClassificacaoProduto` varchar(45) NOT NULL,
  `cpStatusPedido` char(1) NOT NULL DEFAULT 'A',
  `cpObservacaoProduto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tuProduto`
--

INSERT INTO `tuProduto` (`idProduto`, `cpNomeProduto`, `cpQtdProduto`, `cpTipoProduto`, `cpValorProduto`, `cpClassificacaoProduto`, `cpStatusPedido`, `cpObservacaoProduto`) VALUES
(26, 'AÃ§ai500ml', 1, 'Industrializado', 12.3, 'Principal', 'A', ''),
(27, 'Bombom', 1, 'Industrializado', 1.1, 'Acrescimo', 'A', ''),
(29, 'AÃ§ai 300 ml', 1, 'Industrializado', 6.3, 'Principal', 'A', ''),
(30, 'Nuttela', 1, 'Industrializado', 12.33, 'Acrescimo', 'A', ''),
(31, 'Soverte', 1, 'Industrializado', 2.12, 'Acrescimo', 'A', ''),
(32, 'Leite em pÃ³', 1, 'Industrializado', 1.2, 'Acrescimo', 'A', ''),
(33, 'Ovo maltine', 1, 'Industrializado', 1.2, 'Acrescimo', 'A', ''),
(34, 'Granola', 1, 'Industrializado', 1.9, 'Acrescimo', 'A', '');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `teContas`
--
ALTER TABLE `teContas`
  ADD PRIMARY KEY (`idContas`);

--
-- Índices de tabela `teFinanceiro`
--
ALTER TABLE `teFinanceiro`
  ADD PRIMARY KEY (`idFinanceiro`);

--
-- Índices de tabela `teTaxasJuros`
--
ALTER TABLE `teTaxasJuros`
  ADD PRIMARY KEY (`idTaxaJuros`);

--
-- Índices de tabela `tsPreparaProduto`
--
ALTER TABLE `tsPreparaProduto`
  ADD PRIMARY KEY (`idPreparaProduto`);

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
-- Índices de tabela `tuPreparaAcrescimo`
--
ALTER TABLE `tuPreparaAcrescimo`
  ADD PRIMARY KEY (`idPreparaAcrescimo`);

--
-- Índices de tabela `tuProduto`
--
ALTER TABLE `tuProduto`
  ADD PRIMARY KEY (`idProduto`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `teContas`
--
ALTER TABLE `teContas`
  MODIFY `idContas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de tabela `teFinanceiro`
--
ALTER TABLE `teFinanceiro`
  MODIFY `idFinanceiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de tabela `teTaxasJuros`
--
ALTER TABLE `teTaxasJuros`
  MODIFY `idTaxaJuros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de tabela `tsPreparaProduto`
--
ALTER TABLE `tsPreparaProduto`
  MODIFY `idPreparaProduto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tsUsuario`
--
ALTER TABLE `tsUsuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de tabela `tuAcrescimo`
--
ALTER TABLE `tuAcrescimo`
  MODIFY `idAcrescimo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT de tabela `tuPedido`
--
ALTER TABLE `tuPedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de tabela `tuPreparaAcrescimo`
--
ALTER TABLE `tuPreparaAcrescimo`
  MODIFY `idPreparaAcrescimo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tuProduto`
--
ALTER TABLE `tuProduto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
