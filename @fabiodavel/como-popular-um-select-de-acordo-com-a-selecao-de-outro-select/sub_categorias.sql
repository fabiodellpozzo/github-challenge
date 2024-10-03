-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 03/10/2024 às 14:55
-- Versão do servidor: 8.3.0
-- Versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `popular_select_com_subcategorias`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `sub_categorias`
--

DROP TABLE IF EXISTS `sub_categorias`;
CREATE TABLE IF NOT EXISTS `sub_categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria_id` int NOT NULL,
  `nome` text NOT NULL,
  `created` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `sub_categorias`
--

INSERT INTO `sub_categorias` (`id`, `categoria_id`, `nome`, `created`) VALUES
(1, 2, 'Smartphone', '2024-10-03 14:51:05'),
(2, 2, 'Iphone', '2024-10-03 14:51:05'),
(3, 2, 'Acessórios para celular', '2024-10-03 14:51:40'),
(4, 2, 'Peças para Celular', '2024-10-03 14:51:51'),
(5, 1, 'Cafeteira', '2024-10-03 14:52:56'),
(6, 1, 'Aspirador de Pó', '2024-10-03 14:52:56'),
(7, 4, 'Armário', '2024-10-03 14:53:23'),
(8, 4, 'Cama', '2024-10-03 14:53:36'),
(9, 4, 'Colchão', '2024-10-03 14:54:06'),
(10, 4, 'Sofá', '2024-10-03 14:54:06'),
(11, 3, 'Notebook', '2024-10-03 14:54:31'),
(12, 3, 'Computador Game', '2024-10-03 14:54:47'),
(13, 3, 'Tablet', '2024-10-03 14:55:14'),
(14, 3, 'Acessório e periféricos', '2024-10-03 14:55:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
