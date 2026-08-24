-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Tempo de geração: 24/08/2026 às 12:01
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `prog_internet`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nascimento` date NOT NULL,
  `email` varchar(45) NOT NULL,
  `turno` char(1) NOT NULL,
  `curso` int NOT NULL,
  `programacao` int NOT NULL,
  `banco_dados` int NOT NULL,
  `redes` int NOT NULL,
  `eng_software` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `nascimento`, `email`, `turno`, `curso`, `programacao`, `banco_dados`, `redes`, `eng_software`) VALUES
(1, 'Ana Carolina', '2007-03-15', 'ana.carolina@email.com', 'm', 1, 8, 7, 9, 8),
(2, 'Bruno Henrique', '2006-11-22', 'bruno.henrique@email.com', 't', 2, 6, 8, 7, 6),
(3, 'Carlos Eduardo', '2005-07-10', 'carlos.eduardo@email.com', 'm', 1, 9, 9, 8, 10),
(4, 'Daniela Souza', '2008-01-28', 'daniela.souza@email.com', 't', 3, 7, 6, 8, 7),
(5, 'Eduardo Martins', '2006-05-19', 'eduardo.martins@email.com', 'm', 2, 5, 7, 6, 8),
(6, 'Fernanda Lima', '2007-09-03', 'fernanda.lima@email.com', 't', 1, 10, 9, 9, 9),
(7, 'Gabriel Santos', '2005-12-14', 'gabriel.santos@email.com', 'm', 3, 6, 5, 7, 6),
(8, 'Juliana Alves', '2008-04-11', 'juliana.alves@email.com', 't', 2, 8, 8, 9, 7),
(9, 'Lucas Oliveira', '2006-08-30', 'lucas.oliveira@email.com', 'm', 1, 7, 9, 6, 8),
(10, 'Mariana Costa', '2007-02-17', 'mariana.costa@email.com', 't', 3, 9, 8, 10, 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`) VALUES
(1, 'Téc. em Informática'),
(2, 'Téc. Agropecuária'),
(3, 'Téc. em Administração');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
