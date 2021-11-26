-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Nov-2021 às 00:34
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pegturismo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `destino` varchar(255) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`nome`, `email`, `cpf`, `celular`, `destino`, `data`) VALUES
('Felipe', 'felipe123@gmail.com', '123.456.789-12', '(19) 99999-9999', 'Angra dos Reis', '2021-09-10'),
('Thiago Antonio', 'thiago123@gmail.com', '523.456.781-22', '(19) 99999-9999', 'Furnas', '2021-01-16'),
('Jose Abreu', 'jose123@gmail.com', '556.487.982-17', '(19) 99999-9999', 'Ilha Bela', '2021-12-25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `data_viagem`
--

CREATE TABLE `data_viagem` (
  `id` int(11) NOT NULL,
  `nome` varchar(11) DEFAULT NULL,
  `cod_destino` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `data_viagem`
--

INSERT INTO `data_viagem` (`id`, `nome`, `cod_destino`) VALUES
(2, '2021-12-25', 'Ilha Bela'),
(3, '2021-09-18', 'Angra dos Reis'),
(4, '2021-09-25', 'Angra dos Reis'),
(5, '2021-09-10', 'Angra dos Reis'),
(6, '2021-09-01', 'Angra dos Reis'),
(7, '2021-01-10', 'Furnas'),
(8, '2021-01-12', 'Furnas'),
(9, '2021-01-15', 'Furnas'),
(10, '2021-01-16', 'Furnas'),
(11, '2021-01-18', 'Furnas'),
(12, '2021-01-20', 'Furnas'),
(13, '2021-11-30', 'Furnas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `destino`
--

CREATE TABLE `destino` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `destino`
--

INSERT INTO `destino` (`id`, `nome`) VALUES
(1, 'Ilha Bela'),
(2, 'Angra dos Reis'),
(3, 'Furnas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Felipe Reis', 'felipe@gmail.com', '$2y$10$kmcoAN5QnSGbkeD9xv3souglBIbn8Xy.6bQKchG1jowuoDt04cgxK');

-- --------------------------------------------------------

--
-- Estrutura da tabela `viagens`
--

CREATE TABLE `viagens` (
  `pais` varchar(50) NOT NULL,
  `data_viagem` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `viagens`
--

INSERT INTO `viagens` (`pais`, `data_viagem`) VALUES
('Arraial', '11/07/2021'),
('Arraial', '11/07/2021'),
('Ilha Bela', '02/10/2022');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `data_viagem`
--
ALTER TABLE `data_viagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_data_destino` (`cod_destino`);

--
-- Índices para tabela `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `data_viagem`
--
ALTER TABLE `data_viagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `destino`
--
ALTER TABLE `destino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
