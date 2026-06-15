-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Tempo de geração: 15/06/2026 às 11:42
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
(1, 'André Carlos do Nascimento', '2009-05-21', 'andre@gmail.com', 'm', 1, 0, 0, 0, 0),
(2, 'Ana Cássia Araújo', '2011-02-18', 'anac@ymail.com', 'm', 3, 0, 0, 0, 0),
(3, 'Ana Gabriela  Becker', '2000-02-15', 'ana@becker.com.br', 't', 2, 0, 0, 0, 0),
(4, 'Bruna Gabriela Fontoura', '2009-04-11', 'bruna@gabriela.com', 'm', 1, 0, 0, 0, 0),
(5, 'Gabriel Henrique Moreira da Silva', '2007-10-15', 'gabrielhenriquems@gmail.com', 't', 3, 1, 0, 1, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
