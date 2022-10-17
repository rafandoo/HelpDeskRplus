-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Out-2022 às 03:21
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `helpdesk_rplus`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `states`
--

INSERT INTO `states` (`id`, `name`, `abbreviation`, `created_at`, `updated_at`) VALUES
(1, 'Acre', 'AC', '2022-10-17 01:07:16', '2022-10-17 01:07:16'),
(2, 'Alagoas', 'AL', '2022-10-17 01:07:16', '2022-10-17 01:07:16'),
(3, 'Amapá', 'AP', '2022-10-17 01:07:16', '2022-10-17 01:07:16'),
(4, 'Amazonas', 'AM', '2022-10-17 01:07:16', '2022-10-17 01:07:16'),
(5, 'Bahia', 'BA', '2022-10-17 01:07:16', '2022-10-17 01:07:16'),
(6, 'Ceará', 'CE', '2022-10-17 01:07:16', '2022-10-17 01:07:16'),
(7, 'Distrito Federal', 'DF', '2022-10-17 01:07:16', '2022-10-17 01:07:16'),
(8, 'Espírito Santo', 'ES', '2022-10-17 01:07:16', '2022-10-17 01:07:16'),
(9, 'Goiás', 'GO', '2022-10-17 01:07:16', '2022-10-17 01:07:16'),
(10, 'Maranhão', 'MA', '2022-10-17 01:07:16', '2022-10-17 01:07:16'),
(11, 'Mato Grosso', 'MT', '2022-10-17 01:07:16', '2022-10-17 01:07:16'),
(12, 'Mato Grosso do Sul', 'MS', '2022-10-17 01:07:16', '2022-10-17 01:07:16'),
(13, 'Minas Gerais', 'MG', '2022-10-17 01:07:16', '2022-10-17 01:07:16'),
(14, 'Pará', 'PA', '2022-10-17 01:07:16', '2022-10-17 01:07:16'),
(15, 'Paraíba', 'PB', '2022-10-17 01:07:16', '2022-10-17 01:07:16'),
(16, 'Paraná', 'PR', '2022-10-17 01:07:16', '2022-10-17 01:07:16'),
(17, 'Pernambuco', 'PE', '2022-10-17 01:07:16', '2022-10-17 01:07:16'),
(18, 'Piauí', 'PI', '2022-10-17 01:07:16', '2022-10-17 01:07:16'),
(19, 'Rio de Janeiro', 'RJ', '2022-10-17 01:07:17', '2022-10-17 01:07:17'),
(20, 'Rio Grande do Norte', 'RN', '2022-10-17 01:07:17', '2022-10-17 01:07:17'),
(21, 'Rio Grande do Sul', 'RS', '2022-10-17 01:07:17', '2022-10-17 01:07:17'),
(22, 'Rondônia', 'RO', '2022-10-17 01:07:17', '2022-10-17 01:07:17'),
(23, 'Roraima', 'RR', '2022-10-17 01:07:17', '2022-10-17 01:07:17'),
(24, 'Santa Catarina', 'SC', '2022-10-17 01:07:17', '2022-10-17 01:07:17'),
(25, 'São Paulo', 'SP', '2022-10-17 01:07:17', '2022-10-17 01:07:17'),
(26, 'Sergipe', 'SE', '2022-10-17 01:07:17', '2022-10-17 01:07:17'),
(27, 'Tocantins', 'TO', '2022-10-17 01:07:17', '2022-10-17 01:07:17');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
