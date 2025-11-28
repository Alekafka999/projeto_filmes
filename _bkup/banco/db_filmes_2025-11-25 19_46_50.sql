-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_filmes
CREATE DATABASE IF NOT EXISTS `db_filmes` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `db_filmes`;

-- Copiando estrutura para tabela db_filmes.tb_categorias
CREATE TABLE IF NOT EXISTS `tb_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) NOT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT 1,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_filmes.tb_categorias: ~7 rows (aproximadamente)
INSERT INTO `tb_categorias` (`id`, `categoria`, `ativo`, `data_cadastro`) VALUES
	(1, 'Fantasia', 1, '2025-11-19 21:46:22'),
	(2, 'Aventura', 1, '2025-11-19 21:46:22'),
	(3, 'Romance', 1, '2025-11-19 21:46:22'),
	(4, 'Drama', 1, '2025-11-19 21:46:22'),
	(5, 'Comédia', 1, '2025-11-19 21:46:22'),
	(6, 'Terror', 1, '2025-11-19 21:46:22'),
	(7, 'Animação', 1, '2025-11-19 22:14:40');

-- Copiando estrutura para tabela db_filmes.tb_filmes
CREATE TABLE IF NOT EXISTS `tb_filmes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `diretor` varchar(45) NOT NULL,
  `ano` year(4) NOT NULL,
  `duracao` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tb_filmes_tb_categorias_idx` (`id_categoria`),
  CONSTRAINT `fk_tb_filmes_tb_categorias` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_filmes.tb_filmes: ~5 rows (aproximadamente)
INSERT INTO `tb_filmes` (`id`, `nome`, `diretor`, `ano`, `duracao`, `data_cadastro`, `id_categoria`) VALUES
	(1, 'O Senhor dos Anéis', 'Peter Jackson', '2001', 178, '2025-11-19 20:21:34', 1),
	(2, 'O Hobbit', 'Peter Jackson', '2012', 169, '2025-11-19 20:25:38', 1),
	(3, 'Percy Jackson', 'Columbus', '2010', 118, '2025-11-19 20:30:03', 1),
	(4, 'Harry Potter: e a pedra filosofal', 'Columbus', '2001', 152, '2025-11-19 20:32:33', 1),
	(5, 'Star Wars: Uma Nova Esperança', 'George Lucas', '1977', 121, '2025-11-19 20:35:28', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
