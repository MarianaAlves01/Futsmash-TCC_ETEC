-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Dez-2021 às 01:16
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bancoteste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` text NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `size`, `quantity`) VALUES
(5, 28, 42, 'M', 2),
(6, 27, 35, 'G', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `cat_slug` varchar(150) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(6, 'Santos', 'santos'),
(7, 'Corinthians', 'corinthians'),
(8, 'Palmeiras', 'palmeiras'),
(9, 'Sao Paulo', 'sao-paulo'),
(10, 'Atletico Mineiro', 'atletico-mineiro'),
(11, 'Cruzeiro', 'cruzeiro'),
(12, 'Gremio', 'gremio'),
(13, 'Internacional', 'internacional'),
(14, 'Flamengo', 'flamengo'),
(15, 'Vasco', 'vasco');

-- --------------------------------------------------------

--
-- Estrutura da tabela `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` tinytext NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `size`, `quantity`) VALUES
(21, 1, 35, 'G', 2),
(22, 2, 34, 'GG', 5),
(23, 3, 31, 'M', 2),
(24, 3, 38, 'P', 2),
(25, 3, 40, 'P', 2),
(26, 3, 32, 'G', 3),
(27, 4, 48, 'M', 1),
(28, 4, 43, 'M', 1),
(29, 4, 49, 'GG', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `sizes` varchar(255) NOT NULL DEFAULT 'P,M,G,GG',
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL,
  `featured` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `sizes`, `slug`, `price`, `photo`, `date_view`, `counter`, `featured`, `deleted`) VALUES
(30, 8, 'Camiseta I Palmeiras 2021', '<p>Composi&ccedil;&atilde;o: 100%&nbsp;Poli&eacute;ster</p>\r\n\r\n<p>Escudo: Estampado</p>\r\n\r\n<p>Origem: Nacional</p>\r\n\r\n<p>Manga: Curta</p>\r\n\r\n<p>Gola: V</p>\r\n\r\n<p>Dimens&otilde;es aproximadas (altura x largura):</p>\r\n\r\n<p>P - 70 x 50 cm</p>\r\n\r\n<p>M - 72 x 52 cm</p>\r\n\r\n<p>G - 74 x 54 cm</p>\r\n', 'P,M,G,GG', 'camiseta-i-palmeiras-2021', 15, 'camiseta-i-palmeiras-2021_1622382657.jpg', '2021-12-01', 2, 0, 0),
(31, 8, 'Camiseta II Palmeiras 2021', '<p>Composi&ccedil;&atilde;o: 100%</p>\r\n\r\n<p>Escudo: Estampado</p>\r\n\r\n<p>Origem: Nacional</p>\r\n\r\n<p>Manga: Curta</p>\r\n\r\n<p>Gola: V</p>\r\n\r\n<p>Dimens&otilde;es aproximadas (altura x largura):</p>\r\n\r\n<p>P - 70 x 50 cm</p>\r\n\r\n<p>M - 72 x 52 cm</p>\r\n\r\n<p>G - 74 x 54 cm</p>\r\n', 'P,M,G,GG', 'camiseta-ii-palmeiras-2021', 15, 'camiseta-ii-palmeiras-2021_1622382716.jpg', '2021-12-03', 1, 0, 0),
(32, 7, 'Camiseta I Corinthians 2021', '<p>Composi&ccedil;&atilde;o: 100%&nbsp;Poli&eacute;ster</p>\r\n\r\n<p>Escudo: Estampado</p>\r\n\r\n<p>Origem: Nacional</p>\r\n\r\n<p>Manga: Curta</p>\r\n\r\n<p>Gola: V</p>\r\n\r\n<p>Dimens&otilde;es aproximadas (altura x largura):</p>\r\n\r\n<p>P - 70 x 50 cm</p>\r\n\r\n<p>M - 72 x 52 cm</p>\r\n\r\n<p>G - 74 x 54 cm</p>\r\n', 'P,M,G,GG', 'camiseta-i-corinthians-2021', 15, 'camiseta-i-corinthians-2021_1622382641.jpg', '2021-12-03', 1, 0, 0),
(33, 7, 'Camiseta II Corinthians 2021', '<p>Composi&ccedil;&atilde;o: 100%&nbsp;Poli&eacute;ster</p>\r\n\r\n<p>Escudo: Estampado</p>\r\n\r\n<p>Origem: Nacional</p>\r\n\r\n<p>Manga: Curta</p>\r\n\r\n<p>Gola: V</p>\r\n\r\n<p>Dimens&otilde;es aproximadas (altura x largura):</p>\r\n\r\n<p>P - 70 x 50 cm</p>\r\n\r\n<p>M - 72 x 52 cm</p>\r\n\r\n<p>G - 74 x 54 cm</p>\r\n', 'P,M,G,GG', 'camiseta-ii-corinthians-2021', 15, 'camiseta-ii-corinthians-2021_1622382701.jpg', '2021-11-16', 1, 0, 0),
(34, 9, 'Camiseta I SÃ£o Paulo 2021', '<p>Composi&ccedil;&atilde;o: 100%&nbsp;Poli&eacute;ster</p>\r\n\r\n<p>Escudo: Estampado</p>\r\n\r\n<p>Origem: Nacional</p>\r\n\r\n<p>Manga: Curta</p>\r\n\r\n<p>Gola: V</p>\r\n\r\n<p>Dimens&otilde;es aproximadas (altura x largura):</p>\r\n\r\n<p>P - 70 x 50 cm</p>\r\n\r\n<p>M - 72 x 52 cm</p>\r\n\r\n<p>G - 74 x 54 cm</p>\r\n', 'P,M,G,GG', 'camiseta-i-sao-paulo-2021', 15, 'camiseta-i-sao-paulo-2021_1622382684.jpg', '2021-12-03', 1, 0, 0),
(35, 9, 'Camiseta II SÃ£o Paulo 2021', '<p>Composi&ccedil;&atilde;o: 100%</p>\r\n\r\n<p>Escudo: Estampado</p>\r\n\r\n<p>Origem: Nacional</p>\r\n\r\n<p>Manga: Curta</p>\r\n\r\n<p>Gola: V</p>\r\n\r\n<p>Dimens&otilde;es aproximadas (altura x largura):</p>\r\n\r\n<p>P - 70 x 50 cm</p>\r\n\r\n<p>M - 72 x 52 cm</p>\r\n\r\n<p>G - 74 x 54 cm</p>\r\n', 'P,M,G,GG', 'camiseta-ii-sao-paulo-2021', 15, 'camiseta-ii-sao-paulo-2021_1622382749.jpg', '2021-12-04', 2, 0, 0),
(36, 6, 'Camiseta I Santos 2021', '<p>Composi&ccedil;&atilde;o: 100%&nbsp;Poli&eacute;ster</p>\r\n\r\n<p>Escudo: Estampado</p>\r\n\r\n<p>Origem: Nacional</p>\r\n\r\n<p>Manga: Curta</p>\r\n\r\n<p>Gola: V</p>\r\n\r\n<p>Dimens&otilde;es aproximadas (altura x largura):</p>\r\n\r\n<p>P - 70 x 50 cm</p>\r\n\r\n<p>M - 72 x 52 cm</p>\r\n\r\n<p>G - 74 x 54 cm</p>\r\n', 'P,M,G,GG', 'camiseta-i-santos-2021', 15, 'camiseta-i-santos-2021_1622382670.jpg', '2021-11-16', 1, 0, 0),
(37, 6, 'Camiseta II Santos 2021', '<p>Composi&ccedil;&atilde;o: 100%</p>\r\n\r\n<p>Escudo: Estampado</p>\r\n\r\n<p>Origem: Nacional</p>\r\n\r\n<p>Manga: Curta</p>\r\n\r\n<p>Gola: V</p>\r\n\r\n<p>Dimens&otilde;es aproximadas (altura x largura):</p>\r\n\r\n<p>P - 70 x 50 cm</p>\r\n\r\n<p>M - 72 x 52 cm</p>\r\n\r\n<p>G - 74 x 54 cm</p>\r\n', 'P,M,G,GG', 'camiseta-ii-santos-2021', 15, 'camiseta-ii-santos-2021_1622382738.jpg', '2021-11-16', 1, 0, 0),
(38, 14, 'Camiseta I Flamengo 2021', '<p>Composi&ccedil;&atilde;o: 100%&nbsp;Poli&eacute;ster</p>\r\n\r\n<p>Escudo: Estampado</p>\r\n\r\n<p>Origem: Nacional</p>\r\n\r\n<p>Manga: Curta</p>\r\n\r\n<p>Gola: V</p>\r\n\r\n<p>Dimens&otilde;es aproximadas (altura x largura):</p>\r\n\r\n<p>P - 70 x 50 cm</p>\r\n\r\n<p>M - 72 x 52 cm</p>\r\n\r\n<p>G - 74 x 54 cm</p>\r\n', 'P,M,G,GG', 'camiseta-i-flamengo-2021', 15, 'camiseta-i-flamengo-2021.jpg', '2021-12-04', 1, 0, 0),
(39, 14, 'Camiseta II Flamengo 2021', '<p>Composi&ccedil;&atilde;o: 100%</p>\r\n\r\n<p>Escudo: Estampado</p>\r\n\r\n<p>Origem: Nacional</p>\r\n\r\n<p>Manga: Curta</p>\r\n\r\n<p>Gola: V</p>\r\n\r\n<p>Dimens&otilde;es aproximadas (altura x largura):</p>\r\n\r\n<p>P - 70 x 50 cm</p>\r\n\r\n<p>M - 72 x 52 cm</p>\r\n\r\n<p>G - 74 x 54 cm</p>\r\n', 'P,M,G,GG', 'camiseta-ii-flamengo-2021', 15, 'camiseta-ii-flamengo-2021.jpg', '2021-11-09', 1, 0, 0),
(40, 13, 'Camiseta I Internacional 2021', '<p>Composi&ccedil;&atilde;o: 100%&nbsp;Poli&eacute;ster</p>\r\n\r\n<p>Escudo: Estampado</p>\r\n\r\n<p>Origem: Nacional</p>\r\n\r\n<p>Manga: Curta</p>\r\n\r\n<p>Gola: V</p>\r\n\r\n<p>Dimens&otilde;es aproximadas (altura x largura):</p>\r\n\r\n<p>P - 70 x 50 cm</p>\r\n\r\n<p>M - 72 x 52 cm</p>\r\n\r\n<p>G - 74 x 54 cm</p>\r\n', 'P,M,G,GG', 'camiseta-i-internacional-2021', 15, 'camiseta-i-internacional-2021.jpg', '2021-11-29', 1, 0, 0),
(41, 13, 'Camiseta II Internacional 2021', '<p>Composi&ccedil;&atilde;o: 100%</p>\r\n\r\n<p>Escudo: Estampado</p>\r\n\r\n<p>Origem: Nacional</p>\r\n\r\n<p>Manga: Curta</p>\r\n\r\n<p>Gola: V</p>\r\n\r\n<p>Dimens&otilde;es aproximadas (altura x largura):</p>\r\n\r\n<p>P - 70 x 50 cm</p>\r\n\r\n<p>M - 72 x 52 cm</p>\r\n\r\n<p>G - 74 x 54 cm</p>\r\n', 'P,M,G,GG', 'camiseta-ii-internacional-2021', 15, 'camiseta-ii-internacional-2021.jpg', '0000-00-00', 0, 0, 0),
(42, 15, 'Camiseta I Vasco 2021', '<p>Composi&ccedil;&atilde;o: 100%&nbsp;Poli&eacute;ster</p>\r\n\r\n<p>Escudo: Estampado</p>\r\n\r\n<p>Origem: Nacional</p>\r\n\r\n<p>Manga: Curta</p>\r\n\r\n<p>Gola: V</p>\r\n\r\n<p>Dimens&otilde;es aproximadas (altura x largura):</p>\r\n\r\n<p>P - 70 x 50 cm</p>\r\n\r\n<p>M - 72 x 52 cm</p>\r\n\r\n<p>G - 74 x 54 cm</p>\r\n', 'P,M,G,GG', 'camiseta-i-vasco-2021', 15, 'camiseta-i-vasco-2021.jpg', '2021-12-03', 1, 0, 0),
(43, 15, 'Camiseta II Vasco 2021', '<p>Composi&ccedil;&atilde;o: 100%&nbsp;Poli&eacute;ster</p>  <p>Escudo: Estampado</p>  <p>Origem: Nacional</p>  <p>Manga: Curta</p>  <p>Gola: V</p>  <p>Dimens&otilde;es aproximadas (altura x largura):</p>  <p>P - 70 x 50 cm</p>  <p>M - 72 x 52 cm</p>  <p>G - 74 x 54 cm</p>', 'P,M,G,GG', 'camiseta-ii-vasco-2021', 15, 'camiseta-ii-vasco-2021.jpg', '2021-11-29', 1, 0, 0),
(44, 10, 'Camiseta I AtlÃ©tico Mineiro 2021', '<p>Composi&ccedil;&atilde;o: 100% Poli&eacute;ster</p>\r\n\r\n<p>Escudo: Estampado</p>\r\n\r\n<p>Origem: Nacional</p>\r\n\r\n<p>Manga: Curta</p>\r\n\r\n<p>Gola: V</p>\r\n\r\n<p>Dimens&otilde;es aproximadas (altura x largura):</p>\r\n\r\n<p>P - 70 x 50 cm</p>\r\n\r\n<p>M - 72 x 52 cm</p>\r\n\r\n<p>G - 74 x 54 cm</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'P,M,G,GG', 'camiseta-i-atletico-mineiro-2021', 15, 'camiseta-i-atletico-mineiro-2021.jpg', '2021-11-07', 1, 0, 1),
(45, 10, 'Camiseta II AtlÃ©tico Mineiro 2021', '<p>Composi&ccedil;&atilde;o: 100%&nbsp;Poli&eacute;ster</p>\r\n\r\n<p>Escudo: Estampado</p>\r\n\r\n<p>Origem: Nacional</p>\r\n\r\n<p>Manga: Curta</p>\r\n\r\n<p>Gola: V</p>\r\n\r\n<p>Dimens&otilde;es aproximadas (altura x largura):</p>\r\n\r\n<p>P - 70 x 50 cm</p>\r\n\r\n<p>M - 72 x 52 cm</p>\r\n\r\n<p>G - 74 x 54 cm</p>\r\n', 'P,M,G,GG', 'camiseta-ii-atletico-mineiro-2021', 15, 'camiseta-ii-atletico-mineiro-2021.jpg', '0000-00-00', 0, 0, 0),
(46, 11, 'Camiseta I Cruzeiro 2021', '<p>Composi&ccedil;&atilde;o: 100%&nbsp;Poli&eacute;ster</p>\r\n\r\n<p>Escudo: Estampado</p>\r\n\r\n<p>Origem: Nacional</p>\r\n\r\n<p>Manga: Curta</p>\r\n\r\n<p>Gola: V</p>\r\n\r\n<p>Dimens&otilde;es aproximadas (altura x largura):</p>\r\n\r\n<p>P - 70 x 50 cm</p>\r\n\r\n<p>M - 72 x 52 cm</p>\r\n\r\n<p>G - 74 x 54 cm</p>\r\n', 'P,M,G,GG', 'camiseta-i-cruzeiro-2021', 15, 'camiseta-i-cruzeiro-2021.jpg', '2021-12-03', 1, 0, 0),
(47, 11, 'Camiseta II Cruzeiro 2021', '<p>Composi&ccedil;&atilde;o: 100%&nbsp;Poli&eacute;ster</p>\r\n\r\n<p>Escudo: Estampado</p>\r\n\r\n<p>Origem: Nacional</p>\r\n\r\n<p>Manga: Curta</p>\r\n\r\n<p>Gola: V</p>\r\n\r\n<p>Dimens&otilde;es aproximadas (altura x largura):</p>\r\n\r\n<p>P - 70 x 50 cm</p>\r\n\r\n<p>M - 72 x 52 cm</p>\r\n\r\n<p>G - 74 x 54 cm</p>\r\n', 'P,M,G,GG', 'camiseta-ii-cruzeiro-2021', 15, 'camiseta-ii-cruzeiro-2021.jpg', '2021-12-01', 4, 0, 0),
(48, 12, 'Camiseta I GrÃªmio 2021', '<p>Composi&ccedil;&atilde;o: 100%&nbsp;Poli&eacute;ster</p>\r\n\r\n<p>Escudo: Estampado</p>\r\n\r\n<p>Origem: Nacional</p>\r\n\r\n<p>Manga: Curta</p>\r\n\r\n<p>Gola: V</p>\r\n\r\n<p>Dimens&otilde;es aproximadas (altura x largura):</p>\r\n\r\n<p>P - 70 x 50 cm</p>\r\n\r\n<p>M - 72 x 52 cm</p>\r\n\r\n<p>G - 74 x 54 cm</p>\r\n', 'P,M,G,GG', 'camiseta-i-gremio-2021', 15, 'camiseta-i-gremio-2021.jpg', '2021-12-01', 1, 0, 0),
(49, 12, 'Camiseta II GrÃªmio 2021', '<p>Composi&ccedil;&atilde;o: 100%</p>\r\n\r\n<p>Escudo: Estampado</p>\r\n\r\n<p>Origem: Nacional</p>\r\n\r\n<p>Manga: Curta</p>\r\n\r\n<p>Gola: V</p>\r\n\r\n<p>Dimens&otilde;es aproximadas (altura x largura):</p>\r\n\r\n<p>P - 70 x 50 cm</p>\r\n\r\n<p>M - 72 x 52 cm</p>\r\n\r\n<p>G - 74 x 54 cm</p>\r\n', 'P,M,G,GG', 'camiseta-ii-gremio-2021', 15, 'camiseta-ii-gremio-2021.jpg', '2021-12-03', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `pay_id`, `sales_date`) VALUES
(1, 27, 'PAY-1RT494832H294925RLLZ7TZA', '2021-12-01'),
(2, 27, 'PAY-21700797GV667562HLLZ7ZVY', '2021-12-03'),
(3, 28, 'PAY-1RT232432H294925RLLA6TCE', '2021-12-02'),
(4, 28, 'PAY-1RT122132H294925RLLA6TDF', '2021-12-05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `city` varchar(60) NOT NULL,
  `district` varchar(60) NOT NULL,
  `cep` int(10) NOT NULL,
  `address` text NOT NULL,
  `uf` varchar(2) NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `city`, `district`, `cep`, `address`, `uf`, `contact_info`, `status`, `created_on`) VALUES
(1, 'admin@admin.com', '$2y$10$X7PMbKf6Hl/QjoH5iX44u.rMZWTrfeMnf97rJMQYl7QbpfmRFG/Wi', 1, 'ADM', '01', '', '', 0, '', '', '', 1, '2021-01-25'),
(27, 'mariana@gmail.com', '$2y$10$ssHY5W68Cy1mb57chZVxuuXp16ByXP108TIcSCbejUfPutZClxNKq', 0, 'Mariana', 'Alves', 'Aparecida', 'SÃ£o Geraldo', 12570000, 'Rua Nair Monteiro Pacheco, 24', 'SP', '(12) 98898-5988', 1, '2021-05-30'),
(28, 'lianda@gmail.com', '$2y$10$PnnIjWf7kq1GT.kq2VY/FeB75LEL7beH3Kds4LyreDBVohh6gA33u', 0, 'Lianda', 'Calixto', 'Roseira', 'Vila Roma', 12580000, 'Rua Joaquim Pereira MÃ¡ximo, 111', 'SP', '(12) 99604-6760', 1, '2021-07-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
