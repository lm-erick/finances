-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jul-2021 às 01:30
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `finance`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bancos`
--

CREATE TABLE `bancos` (
  `id_banco` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `cod_banco` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `bancos`
--

INSERT INTO `bancos` (`id_banco`, `name`, `cod_banco`) VALUES
(4, 'Caixa', '250'),
(5, 'Bradesco', '25463');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nome`) VALUES
(2, 'mercados'),
(3, 'testew3'),
(4, 'Combustivel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `id_conta` int(11) NOT NULL,
  `saldo` decimal(10,0) NOT NULL,
  `id_banco` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `agencia` varchar(10) NOT NULL,
  `conta_corrente` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contas`
--

INSERT INTO `contas` (`id_conta`, `saldo`, `id_banco`, `descricao`, `tipo`, `agencia`, `conta_corrente`) VALUES
(1, '2123', 4, 'test', 'contacorrente', '2222', '222'),
(2, '222', 4, 'teste', 'contacorrente', '2222', '22222'),
(3, '20000', 3, 'teste', 'contacorrente', '33232', '234234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fluxos`
--

CREATE TABLE `fluxos` (
  `id_fluxo` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `data_vencimento` date NOT NULL,
  `status` int(11) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `id_conta` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `name` varchar(150) NOT NULL,
  `login` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`name`, `login`, `senha`, `id_user`) VALUES
('Erick', 'erick.luan.monteiro@gmail.com', '123', 1),
('TESTE', 'TESTE', 'TESTE', 3),
('teste', 'teste4', 'teste', 4),
('teste', 'teste5', 'websix123', 5),
('teste', 'teste6', 'teste', 6),
('', 'teste7', 'teste', 7),
('', 'teste8', 'websix123', 8),
('', 'websix', 'websix123', 9),
('Pedro Perreira', 'pedrinho', '123', 10);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`id_banco`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`id_conta`);

--
-- Índices para tabela `fluxos`
--
ALTER TABLE `fluxos`
  ADD PRIMARY KEY (`id_fluxo`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id_banco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `contas`
--
ALTER TABLE `contas`
  MODIFY `id_conta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `fluxos`
--
ALTER TABLE `fluxos`
  MODIFY `id_fluxo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
