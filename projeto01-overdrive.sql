-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/12/2023 às 17:44
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
  `nome` varchar(255) NOT NULL,
  `nome_fantasia` varchar(255) NOT NULL,
  `cnpj` varchar(30) NOT NULL,
  `endereco` varchar(155) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `responsavel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nome`, `nome_fantasia`, `cnpj`, `endereco`, `telefone`, `responsavel`) VALUES
(1, 'Overdrive Softwares e Consultoria', 'Overdrive', '331.431.14/0001-40', 'Araras, Sp', '(19)94543-233', 'Claudio/Rafael'),
(2, 'EcoLifeLTDA', 'EcoLife', '010.101.01/0001-01', 'Manaus, AM', '(19)01010-1010', 'Curupira'),
(3, 'MetalPesado LTDA', 'Peso Metal', '020.202.02/0202-02', 'Boa Vista, RR', '(02)02020-2020', 'Chico Bento'),
(4, 'Cajueiros Pereira LTDA', 'Caju\'s', '131.313.13/0001-13', 'Natal, Rn', '(13)13131-3131', 'Caju e Castanha');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `cnh` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `carro` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `fkempresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nome`, `cpf`, `cnh`, `senha`, `telefone`, `endereco`, `empresa`, `carro`, `admin`, `fkempresa`) VALUES
(1, 'Matheus Santos', '111.111.111-11', '111111111', '$2y$10$nvI0pcZEtc7pZeQvNoaWTe0YQeg79mQxwxANbL1HHU2UeCVCVL58i', '(19)99847-4456', 'Conchal City', 'Overdrive', 'Marea Turbo', 1, 1),
(2, 'Gabrielle Santos', '222.222.222-22', '222222222', '$2y$10$JP.pDGQzFjrA1QG.hy8snu3WWQ7UjxpWZXCyhjK2j.hNnhOJ3AdL6', '(19)22222-2222', 'Bonito, MS', 'EcoLife', 'Monza', 0, 2),
(3, 'Armando', '247.243.657-22', '2472436', '$2y$10$Q0Hvu.Wp7GHuq2pXB3p7B.y5ES8dFJ4rOPb8yzwMpOcUcFxSjmO0S', '(19)24724-365', 'Palmas, TO', 'Caju\'s', 'Lada', 0, 4),
(4, 'Diego Negreto', '193.020.830-80', '1930208', '$2y$10$9PVx5wGdIB0dnnbQRqSntefFJStZzpkvidsei2hpRUSXVVkZabB5C', '(19)30208-3080', 'Araras, Sp', 'Overdrive', 'Punto', 1, 1),
(5, 'Jéssica Alves', '208.036.556-81', '2080365', '$2y$10$Knd77rRiC45lH/P/caGY0efwYTrvV0Pa8ZgSxk5moDhsVxKzY2wkC', '(19)20803-655', 'Rio Branco, AC', 'Caju\'s', 'Jeep', 0, 4),
(6, 'Maria José', '729.374.510-98', '027604515', '$2y$10$kRGSyF5JUx6SK/vC/dVjy.eB6S3RDq9Sk2.LjOwpTfFnwrfglV1Mu', '(19)98894-8945', 'Salvador, BA', 'Peso Metal', 'Azera', 0, 3),
(7, 'Brenda Sabrina Assis', '657.177.472-09', '6571774', '$2y$10$HuZg4sjSQ3tIzYALQ0IlkuF2PJRWJFpZ/IJ7QBRamNIAfbf3gYAra', '(65)71774-7209', 'Lagoa Nova, Natal', 'EcoLife', 'Polo', 0, 2),
(8, 'Benedito Felipe', '129.219.268-22', '1292192', '$2y$10$YNG81UqbfI5gpK5BJUF7E.ZXsefhpI9h7h7kBF14vkKEj7fSVwEI6', '(12)92192-6822', 'Carapicuíba,SP', 'Peso Metal', 'T-Cross', 0, 3),
(9, 'André Nakir', '592.220.504-87', '5922205', '$2y$10$UCVH55aJkv0KbwmWesEAjuRLqu/61ko.Ukh4mo4bm85.XJLXc7/GS', '(59)22205-0487', 'Canoas, Rs', 'Overdrive', 'Corolla', 0, 1),
(10, 'Mateus Pianca', '160.910.868-04', '1609108', '$2y$10$d4gwmf46h.zSZrhrWQQ38uUSpslrOITd1yaLz6J/P19JuBoAJc49O', '(16)09108-6804', 'Araras, Sp', 'Caju\'s', 'Golf', 0, 4),
(12, 'Josefa Raquel', '319.325.015-50', '3193250', '$2y$10$lXHaEc1fyspg6eQJBwPw9uj1nN1N.x7GeTWw9krKcvMTpmP8.SEqK', '(21)31932-5015', 'Cariaciaca,ES', 'Peso Metal', 'Honda Civic', 0, 3),
(13, 'Lúcia Maria', '027.312.214-29', '0273122', '$2y$10$Jb7ZJl3nBDQOP2KOmwDmpuO2KLqmGW6D6UoiHqDz7ouS/9Cnj72Ua', '(02)73122-1429', 'Dourado,MS', 'EcoLife', 'Focus', 0, 2),
(14, 'Sarah Benedita', '346.101.723-05', '3461017', '$2y$10$A0D7I.if9kW860Rfkg.ZTOgWYNznIwpnc220mHdq.1OmvPYxxVv5i', '(34)61017-2305', 'Goiânia,GO', 'Caju\'s', 'Up', 0, 4),
(15, 'Fernando Pedro', '601.476.098-95', '6014760', '$2y$10$RcZXJqqOjApCKRrcRje1buaxgUVXKSRM.fjAj7r0vsrpUKygI54ie', '(60)14760-9895', 'Ponta Grossa, PR', 'Peso Metal', 'Saveiro', 0, 3);

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
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `usuarios_ibfk_1` (`fkempresa`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`fkempresa`) REFERENCES `empresas` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
