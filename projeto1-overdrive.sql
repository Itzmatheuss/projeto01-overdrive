-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/12/2023 às 16:34
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
(4, 'Cajueiros Pereira LTDA', 'Caju\'s', '131.313.13/0001-13', 'Natal, Rn', '(13)13131-3131', 'Caju e Castanha'),
(5, 'MaçaInc', 'Maça', '123.123.32/0001-13', 'Los Altos, USA', '(71)89498-4984', 'Estevão Empregos');

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
  `carro` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `fkempresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
-- ADMIN - 111.111.111-11 senha:1234
-- COMUM - 222.222.222--22 senha:1234

INSERT INTO `usuarios` (`id_user`, `nome`, `cpf`, `cnh`, `senha`, `telefone`, `endereco`, `carro`, `admin`, `fkempresa`) VALUES
(1, 'Matheus Santos', '111.111.111-11', '111111111', '$2y$10$nvI0pcZEtc7pZeQvNoaWTe0YQeg79mQxwxANbL1HHU2UeCVCVL58i', '(19)99847-4456', 'Conchal City', 'Marea Turbo', 1, 1),
(2, 'Gabrielle Santos', '222.222.222-22', '222222222', '$2y$10$JP.pDGQzFjrA1QG.hy8snu3WWQ7UjxpWZXCyhjK2j.hNnhOJ3AdL6', '(19)22222-2222', 'Bonito, MS', 'Monza', 0, 2),
(3, 'Armando', '247.243.657-22', '247243645', '$2y$10$Q0Hvu.Wp7GHuq2pXB3p7B.y5ES8dFJ4rOPb8yzwMpOcUcFxSjmO0S', '(19)24724-365', 'Palmas, TO', 'Lada', 0, 4),
(4, 'Diego Negreto', '193.020.830-80', '193020845', '$2y$10$9PVx5wGdIB0dnnbQRqSntefFJStZzpkvidsei2hpRUSXVVkZabB5C', '(19)30208-3080', 'Araras, Sp', 'Punto', 1, 1),
(5, 'Jéssica Alves', '208.036.556-81', '208036545', '$2y$10$Knd77rRiC45lH/P/caGY0efwYTrvV0Pa8ZgSxk5moDhsVxKzY2wkC', '(19)20803-655', 'Rio Branco, AC', 'Jeep', 0, 4),
(6, 'Maria José', '729.374.510-98', '027604515', '$2y$10$kRGSyF5JUx6SK/vC/dVjy.eB6S3RDq9Sk2.LjOwpTfFnwrfglV1Mu', '(19)98894-8945', 'Salvador, BA', 'Azera', 0, 3),
(7, 'Brenda Sabrina Assis', '657.177.472-09', '657177445', '$2y$10$HuZg4sjSQ3tIzYALQ0IlkuF2PJRWJFpZ/IJ7QBRamNIAfbf3gYAra', '(65)71774-7209', 'Lagoa Nova, Natal', 'Polo', 0, 2),
(8, 'Benedito Felipe', '129.219.268-22', '129219245', '$2y$10$YNG81UqbfI5gpK5BJUF7E.ZXsefhpI9h7h7kBF14vkKEj7fSVwEI6', '(12)92192-6822', 'Carapicuíba,SP', 'T-Cross', 0, 3),
(9, 'André Nakir', '592.220.504-87', '592220554', '$2y$10$UCVH55aJkv0KbwmWesEAjuRLqu/61ko.Ukh4mo4bm85.XJLXc7/GS', '(59)22205-0487', 'Canoas, Rs', 'Corolla', 0, 1),
(10, 'Mateus Pianca', '160.910.868-04', '160910845', '$2y$10$d4gwmf46h.zSZrhrWQQ38uUSpslrOITd1yaLz6J/P19JuBoAJc49O', '(16)09108-6804', 'Araras, Sp', 'Golf', 0, 1),
(12, 'Josefa Raquel', '319.325.015-50', '319325054', '$2y$10$lXHaEc1fyspg6eQJBwPw9uj1nN1N.x7GeTWw9krKcvMTpmP8.SEqK', '(21)31932-5015', 'Cariaciaca,ES', 'Honda Civic', 0, 3),
(13, 'Lúcia Maria', '027.312.214-29', '027312245', '$2y$10$Jb7ZJl3nBDQOP2KOmwDmpuO2KLqmGW6D6UoiHqDz7ouS/9Cnj72Ua', '(02)73122-1429', 'Dourado,MS', 'Focus', 0, 2),
(14, 'Sarah Benedita', '346.101.723-05', '346101745', '$2y$10$A0D7I.if9kW860Rfkg.ZTOgWYNznIwpnc220mHdq.1OmvPYxxVv5i', '(34)61017-2305', 'Goiânia,GO', 'Up', 0, 4),
(15, 'Fernando Pedro', '601.476.098-95', '601476078', '$2y$10$RcZXJqqOjApCKRrcRje1buaxgUVXKSRM.fjAj7r0vsrpUKygI54ie', '(60)14760-9895', 'Ponta Grossa, PR', 'Saveiro', 0, 5),
(16, 'André Araújo', '619.621.481-06', '619621466', '$2y$10$I.Z.jd5bwvVDAb3X5uhgqetG6nbWCvp3LqyWk5IXTIZ9C/ZoxgdoG', '(61)96214-8106', 'Pajuçara, RN', 'Kadett', 0, 4),
(17, 'Bryan ', '555.555.555-55', '555555555', '$2y$10$pUBTZCyNYkcZMkfLpRyRWezeraAhr92hUCcsWAjSBDkIhgHm/x1JG', '(55)55555-5555', 'Araras, Sp', 'Onyx', 0, 1),
(18, 'Yasmin Marlene', '368.725.234-50', '368725287', '$2y$10$oBpCK9JePsjD2BLxILfUBefJ6F5Rmwip6/jzdmApJHhgjZyROys8q', '(36)87252-3450', 'Piaui', 'Hb20', 0, 3),
(19, 'Paulo Eduardo', '168.298.281-55', '168298287', '$2y$10$qP0ZnD6jlXDmadXtXMXAsuQp5FbXWamrVKWYMY8E8T5soB0aYFvYO', '(16)82982-8155', 'Salvador, BA', 'Nivus', 0, 1),
(20, 'Elaine Isabela', '731.637.077-77', '731637087', '$2y$10$kaRLH1gYtTJedDTnw8tgs.W.6KadGXwVrlt4s9Sv83YjctwOopSJq', '(73)16370-7777', 'São Luís,MA', 'Pulse', 0, 4),
(21, 'Alice Gabriela', '067.716.398-35', '067716387', '$2y$10$OHdsVt9BGGHspuz26EO8aOJsZSylMet/yH2gTbf425eqICOoOKm5i', '(06)77163-9835', 'Arapiraca,AL', 'Fusion', 0, 1),
(22, 'Cauã Severino', '187.732.724-77', '187732787', '$2y$10$h4GDgeecPG8mZ/SB7Omo0.6/N0GjUPVit9K0QNqeOjWhgtE2OeQw.', '(18)77327-2477', 'Jaraguá do Sul,SC', 'Corolla', 0, 3),
(23, 'Cauã Raimundo', '607.770.852-67', '607770866', '$2y$10$0nK.e9nBld5TW7r0n1k26.7ZPf/O.s6Koj4F/WCpvMr82nC2TeKzW', '(60)77708-5267', 'Varginha,MG', 'Focus', 0, 2),
(24, 'Emanuelly Marina', '952.949.313-46', '952949337', '$2y$10$Ly.m7Yjm2LO.iumkvJjRheZv4X27PLEUALChWuYQev56Wqqswci/W', '(95)29493-1346', 'Nova Iguaçu,RJ', 'Prisma', 0, 2),
(25, 'Antônia Alessandra', '671.324.141-78', '671324191', '$2y$10$2zfFE5kO6WZqsYP0gOdrmu00j4nocq5USd2TPS8CVEUht4oTvJk1u', '(67)13241-4178', 'Brasília,DF', 'Camaro', 0, 5),
(26, 'Valentina Raquel', '532.465.782-49', '532465747', '$2y$10$D/QzaUEylBJ0T9Bb2WV5LudwqkHPWvY/hbowNR4/kei/d74lNKB0a', '(53)24657-8249', 'Boa Vista, RR', 'Dodge Ram', 0, 4),
(27, 'Rosângela Mariana', '811.637.324-2', '811637324', '$2y$10$m4qygnt2DAyXf3Abwl5rlefjzOKoMrww2LaQHWiHlNr4/m17SlrlW', '(81)16373-2421', 'Rio de Janeiro,RJ', 'Yaris', 0, 4),
(28, 'Severino Cauê', '100.084.639-30', '100084639', '$2y$10$iV27Gx65DT3suFbuoCO.K.Ytv/kpK4cDKWRPUBIXrVtlDoLdaxc.e', '(10)00846-3930', 'Marabá,PA', 'Astra', 0, 5),
(29, 'Fabiana Marcela', '802.442.274-38', '802442274', '$2y$10$Pgp5uCKnmj6pMdJn1sdeNOozoVKIy4WDpBfU1H1CqrI8.z/rUKPvy', '(80)24422-7438', 'Navegantes,SC', 'Vectra', 0, 5);

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
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
