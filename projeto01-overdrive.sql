-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/11/2023 às 18:53
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
-- Banco de dados: `projeto01-overdrive`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL,
  `nome` varchar(115) NOT NULL,
  `nome_fantasia` varchar(115) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `endereco` varchar(115) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `responsavel` varchar(115) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nome`, `nome_fantasia`, `cnpj`, `endereco`, `telefone`, `responsavel`) VALUES
(1, 'Overdrive Softwares e Consultoria', 'Overdrive', '73.739.457/0001-96', 'Araras, São Paulo', '(19)98571-2127', 'Claudio'),
(2, 'Vida saudavel', 'Ecolife', '18.001.890/0001-11', 'R. da Prosperidade, 493-315 - Alvorada, Manaus', '(19)99999-9999', 'Curupira');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `senha` varchar(115) NOT NULL,
  `cnh` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(115) NOT NULL,
  `carro` varchar(115) NOT NULL,
  `empresa` varchar(115) NOT NULL,
  `admin` enum('S','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabela de Usuarios';

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nome`, `cpf`, `senha`, `cnh`, `telefone`, `endereco`, `carro`, `empresa`, `admin`) VALUES
(1, 'Matheus', '111.111.111-11', '1234', '80153146646', '(19)11111-1111', 'Rua dos Bobos,nº 0', 'Monza Tubarão', 'Overdrive', 'S');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
