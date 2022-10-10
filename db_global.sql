-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 21-Set-2017 às 07:52
-- Versão do servidor: 5.6.37
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `idbrasco_global`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acesso`
--

CREATE TABLE `acesso` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `addr` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `data` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `acesso`
--

INSERT INTO `acesso` (`id`, `nome`, `addr`, `data`) VALUES
(1, 'MASTER', '179.233.167.93', '2017-08-25 15:35:49'),
(2, 'MASTER', '189.40.82.12', '2017-08-25 17:43:37'),
(3, 'MASTER', '189.40.82.209', '2017-08-25 18:51:31'),
(4, 'MASTER', '189.40.81.133', '2017-08-28 07:23:18'),
(5, 'MASTER', '189.40.80.34', '2017-08-30 13:28:49'),
(6, 'MASTER', '189.40.80.34', '2017-08-30 13:47:28'),
(7, 'Regional Nilópolis', '189.40.80.34', '2017-08-30 13:49:47'),
(8, 'MASTER', '179.233.167.93', '2017-09-01 09:53:18'),
(9, 'MASTER', '179.157.150.13', '2017-09-14 08:43:25'),
(10, 'MASTER', '179.157.150.13', '2017-09-14 08:55:00'),
(11, 'MASTER', '179.157.150.13', '2017-09-14 09:47:47'),
(12, 'MASTER', '179.157.150.13', '2017-09-14 10:01:13'),
(13, 'MASTER', '179.157.150.13', '2017-09-14 10:13:15'),
(14, 'MASTER', '179.157.150.13', '2017-09-15 09:52:16'),
(15, 'MASTER', '186.212.179.37', '2017-09-15 11:09:59'),
(16, 'MASTER', '179.157.150.13', '2017-09-18 08:17:25'),
(17, 'MASTER', '179.157.150.13', '2017-09-18 08:51:46'),
(18, 'MASTER', '179.157.150.13', '2017-09-18 08:56:23'),
(19, 'MASTER', '179.157.150.13', '2017-09-18 09:34:25'),
(20, 'MASTER', '179.157.150.13', '2017-09-18 10:30:39'),
(21, 'MASTER', '179.157.150.13', '2017-09-18 11:05:41'),
(22, 'Regional Nilópolis', '179.157.150.13', '2017-09-18 11:06:28'),
(23, 'MASTER', '179.157.150.13', '2017-09-18 11:35:44'),
(24, 'MASTER', '179.157.150.13', '2017-09-18 11:37:07'),
(25, 'MASTER', '179.157.150.13', '2017-09-18 11:38:52'),
(26, 'Regional Nilópolis', '179.157.150.13', '2017-09-18 11:44:35'),
(27, 'MASTER', '179.157.150.13', '2017-09-18 11:53:05'),
(28, 'MASTER', '179.157.150.13', '2017-09-20 10:57:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `associado`
--

CREATE TABLE `associado` (
  `idAssociado` int(11) NOT NULL,
  `nome` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultor`
--

CREATE TABLE `consultor` (
  `idConsultor` int(11) NOT NULL,
  `nome` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `regional` varchar(50) CHARACTER SET utf8 NOT NULL,
  `equipe` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `consultor`
--

INSERT INTO `consultor` (`idConsultor`, `nome`, `regional`, `equipe`) VALUES
(1, 'MARCELO NASCIMENTO', 'NOVA IGUAÇU', 'ÁGUIA'),
(2, 'MARCIO ARTUR', 'ITAGUAÍ', 'TISSUNAMI'),
(4, 'TATIANA GOMES', 'NILÓPOLIS', 'PUPILOS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instalador`
--

CREATE TABLE `instalador` (
  `idInstalador` int(11) NOT NULL,
  `nome` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `placa`
--

CREATE TABLE `placa` (
  `idPlaca` int(11) NOT NULL,
  `placa` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `placa`
--

INSERT INTO `placa` (`idPlaca`, `placa`) VALUES
(1, 'LQZ7702');

-- --------------------------------------------------------

--
-- Estrutura da tabela `producao`
--

CREATE TABLE `producao` (
  `idProducao` int(11) NOT NULL,
  `idConsultor` int(11) DEFAULT NULL,
  `associado` text,
  `veiculo` text,
  `placa` text,
  `dataProposta` date NOT NULL,
  `dataRecebimento` date NOT NULL,
  `substituicao` text,
  `migracao` text,
  `vistoria` text,
  `pendencia` text,
  `obsProducao` text,
  `rastreador` text,
  `dataInstalacao` date NOT NULL,
  `localInstalacao` text,
  `equipamento` text,
  `instalador` text,
  `corte` text,
  `ship` text,
  `obsInstalacao` text,
  `datacadA` date NOT NULL,
  `horacadA` time NOT NULL,
  `datacadB` date NOT NULL,
  `horacadB` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `producao`
--

INSERT INTO `producao` (`idProducao`, `idConsultor`, `associado`, `veiculo`, `placa`, `dataProposta`, `dataRecebimento`, `substituicao`, `migracao`, `vistoria`, `pendencia`, `obsProducao`, `rastreador`, `dataInstalacao`, `localInstalacao`, `equipamento`, `instalador`, `corte`, `ship`, `obsInstalacao`, `datacadA`, `horacadA`, `datacadB`, `horacadB`) VALUES
(2, 1, 'Vivian Martins Soares', 'Chevrolet Spin', 'LQZ7702', '2017-08-25', '2017-08-25', 'Não', 'Não', 'Sim', 'Não', 'Não Há', 'Instalado', '2017-09-15', '', 'XPT45678', '', 'Não', 'CLARO', 'NÃO HÁ', '0000-00-00', '00:00:00', '2017-09-18', '15:12:00'),
(3, 4, 'Ana Lucia', 'Spin', 'lqz7703', '2017-09-18', '2017-09-19', 'Não', 'Não', 'Sim', 'Não', 'Não', 'Instalado', '2017-09-19', 'Base', 'XPT45678', '', 'Não', 'TIM', 'Não', '2017-09-18', '15:44:00', '2017-09-18', '16:22:00'),
(4, 1, 'Denilson', 'Chevrloet', 'AAA1234', '2017-09-18', '2017-09-18', 'Sim', 'Não', 'Sim', 'Não', 'Não', 'Instalado', '2017-09-18', 'Base', 'XPT45678', '', 'Não', 'OI', 'Não', '2017-09-18', '16:24:00', '2017-09-18', '16:26:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `IDUsuario` int(3) UNSIGNED NOT NULL,
  `Nome` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `login` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `senha` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `nivel` int(2) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`IDUsuario`, `Nome`, `login`, `senha`, `email`, `nivel`, `status`) VALUES
(2, 'Usuario', 'user', 'ca674010c2852f794580bcf913df466c80b0074beba0bed40cafcf8b4f247a78', '', 2, 1),
(1, 'MASTER', 'master', '17849c0b6f809220c887061ebde4e9e93f06b4e0b5f043927b5eba74f4e94885', '', 1, 1),
(3, 'Denilson Soares', 'denilson', 'c715c8a1d720fdacb6939004bdb1f487df2159efcdab1433f345b97a31ac60f6', 'demarso@gmail.com', 1, 1),
(8, 'Regional Nilópolis', 'nilopolis', 'c530bfcaba42ac9377ecb4ad7e77d78da7c7418e9ca60fd77fb6dda410b965e1', '', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acesso`
--
ALTER TABLE `acesso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `associado`
--
ALTER TABLE `associado`
  ADD PRIMARY KEY (`idAssociado`);

--
-- Indexes for table `consultor`
--
ALTER TABLE `consultor`
  ADD PRIMARY KEY (`idConsultor`);

--
-- Indexes for table `instalador`
--
ALTER TABLE `instalador`
  ADD PRIMARY KEY (`idInstalador`);

--
-- Indexes for table `placa`
--
ALTER TABLE `placa`
  ADD PRIMARY KEY (`idPlaca`);

--
-- Indexes for table `producao`
--
ALTER TABLE `producao`
  ADD PRIMARY KEY (`idProducao`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acesso`
--
ALTER TABLE `acesso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `associado`
--
ALTER TABLE `associado`
  MODIFY `idAssociado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `consultor`
--
ALTER TABLE `consultor`
  MODIFY `idConsultor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `instalador`
--
ALTER TABLE `instalador`
  MODIFY `idInstalador` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `placa`
--
ALTER TABLE `placa`
  MODIFY `idPlaca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `producao`
--
ALTER TABLE `producao`
  MODIFY `idProducao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDUsuario` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;
