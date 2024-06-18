-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/06/2024 às 02:35
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetoi`
--

-- --------------------------------------------------------

--
-- Estrutura para view `horarios_barbeiros`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `horarios_barbeiros`  AS SELECT `horarios`.`id_barbeiro` AS `id_barbeiro`, `barbeiros`.`nome` AS `barbeiro`, `horarios`.`id_cliente` AS `id_cliente`, `clientes`.`nome` AS `cliente`, `horarios`.`corte` AS `corte`, `horarios`.`data` AS `data`, `horarios`.`hora` AS `hora` FROM ((`horarios` join `clientes` on(`horarios`.`id_cliente` = `clientes`.`id_cliente`)) join `barbeiros` on(`barbeiros`.`id_barbeiro` = `horarios`.`id_barbeiro`)) WHERE `horarios`.`data` >= curdate() ;

--
-- VIEW `horarios_barbeiros`
-- Dados: Nenhum
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
