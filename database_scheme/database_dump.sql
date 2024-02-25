-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/02/2024 às 13:27
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `church`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cells`
--

CREATE TABLE `cells` (
  `cell_id` int(11) NOT NULL,
  `cell_name` varchar(50) NOT NULL,
  `created_date` int(11) NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cells`
--

INSERT INTO `cells` (`cell_id`, `cell_name`, `created_date`, `created_by`) VALUES
(3, 'Primeira Célula', 1703325198, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `account_type` tinyint(1) NOT NULL,
  `cell_member` int(11) NOT NULL COMMENT 'O ID da célula que ele faz parte, seja como membro ou líder. Definição de membro ou líder é feita pela coluna account_type',
  `register_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`userid`, `name`, `email`, `password`, `phone`, `birthday`, `gender`, `account_type`, `cell_member`, `register_date`) VALUES
(1, 'Victor Maciel de Souza', 'vtbolado17@gmail.com', '$2y$10$JYe7uBQwTKmFuLVy3SDvQeGpIDo3J.pxNzjR6tp70TBaNw5.aqnbu', '55 21 96487-1475', '2222-02-22', 1, 3, 3, 1703252570),
(2, 'Victor Teste', 'vtTeste', '$2y$10$JYe7uBQwTKmFuLVy3SDvQeGpIDo3J.pxNzjR6tp70TBaNw5.aqnbu', NULL, NULL, NULL, 2, 3, 0),
(3, 'Victor Admin', 'vtAdmin', '$2y$10$JYe7uBQwTKmFuLVy3SDvQeGpIDo3J.pxNzjR6tp70TBaNw5.aqnbu', NULL, NULL, NULL, 1, 0, 0),
(4, 'Victor M', 'victor.maciel.souza23@gmail.com', '$2y$10$JYe7uBQwTKmFuLVy3SDvQeGpIDo3J.pxNzjR6tp70TBaNw5.aqnbu', '', '0000-00-00', 0, 0, 0, 1704045989);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cells`
--
ALTER TABLE `cells`
  ADD PRIMARY KEY (`cell_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cells`
--
ALTER TABLE `cells`
  MODIFY `cell_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
