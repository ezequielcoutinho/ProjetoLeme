-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 24-Out-2021 às 21:00
-- Versão do servidor: 8.0.25-0ubuntu0.20.04.1
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_leme`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `data_nasc` datetime NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `ativo` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `data_nasc`, `telefone`, `ativo`) VALUES
(30, 'Ezequiel Coutinho Da Silva', '070.000.000-00', '1989-12-05 00:00:00', '(41) 99858-2390', 1),
(31, 'Manuela Fonseca Coutinho', '050.000.000-00', '2000-01-30 00:00:00', '(41) 00000-0000', 1),
(32, 'Juliane Coroline Da Silva', '040.000.000-00', '2001-11-10 00:00:00', '(41) 77777-7777', 1),
(33, 'Bruna Mayara Fonseca Coutinho', '030.000.000-00', '1989-10-25 00:00:00', '(41) 22222-2222', 0),
(34, 'Alex Alxandre Siqueira', '010.000.000-00', '1980-01-10 00:00:00', '(41) 55555-5555', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int NOT NULL,
  `produto` varchar(255) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `data` datetime NOT NULL,
  `cliente_id` int NOT NULL,
  `pedido_status_id` int NOT NULL,
  `ativo` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `produto`, `valor`, `data`, `cliente_id`, `pedido_status_id`, `ativo`) VALUES
(25, 'e-CPF', '280.00', '2021-10-24 19:16:57', 31, 2, 1),
(26, 'e-CNPJ', '185.00', '2021-10-24 19:17:29', 30, 1, 1),
(27, 'DANFe', '155.40', '2021-10-24 19:19:35', 32, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos_imagens`
--

CREATE TABLE `pedidos_imagens` (
  `id` int NOT NULL,
  `pedido_id` int NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `capa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `pedidos_imagens`
--

INSERT INTO `pedidos_imagens` (`id`, `pedido_id`, `imagen`, `capa`) VALUES
(1, 27, '2.png', '05.png'),
(2, 26, '1.png', '5.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_status`
--

CREATE TABLE `pedido_status` (
  `id` int NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `pedido_status`
--

INSERT INTO `pedido_status` (`id`, `descricao`) VALUES
(1, 'Em analise'),
(2, 'Aprovado'),
(3, 'Cancelado');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedidos_clientes_idx` (`cliente_id`),
  ADD KEY `fk_pedidos_pedido_status1_idx` (`pedido_status_id`);

--
-- Índices para tabela `pedidos_imagens`
--
ALTER TABLE `pedidos_imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedidos_imagens_pedidos1_idx` (`pedido_id`);

--
-- Índices para tabela `pedido_status`
--
ALTER TABLE `pedido_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `pedidos_imagens`
--
ALTER TABLE `pedidos_imagens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `pedido_status`
--
ALTER TABLE `pedido_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_clientes` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_pedidos_pedido_status1` FOREIGN KEY (`pedido_status_id`) REFERENCES `pedido_status` (`id`);

--
-- Limitadores para a tabela `pedidos_imagens`
--
ALTER TABLE `pedidos_imagens`
  ADD CONSTRAINT `fk_pedidos_imagens_pedidos1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
