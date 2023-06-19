-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.28 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para diariodigital
CREATE DATABASE IF NOT EXISTS `diariodigital` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `diariodigital`;

-- Copiando estrutura para tabela diariodigital.anotacoes
CREATE TABLE IF NOT EXISTS `anotacoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `grenciamento` varchar(45) NOT NULL,
  `usuario_id` int NOT NULL,
  `usuario_nick` varchar(45) NOT NULL,
  PRIMARY KEY (`id`,`grenciamento`),
  KEY `fk_Anotacoes_usuario_idx` (`usuario_id`,`usuario_nick`),
  CONSTRAINT `fk_Anotacoes_usuario` FOREIGN KEY (`usuario_id`, `usuario_nick`) REFERENCES `usuario` (`id`, `nick`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela diariodigital.feedback
CREATE TABLE IF NOT EXISTS `feedback` (
  `idFeedback` int NOT NULL,
  `feed` text NOT NULL,
  `usuario_id` int NOT NULL,
  `usuario_nick` varchar(45) NOT NULL,
  PRIMARY KEY (`idFeedback`),
  KEY `fk_Feedback_usuario1_idx` (`usuario_id`,`usuario_nick`),
  CONSTRAINT `fk_Feedback_usuario1` FOREIGN KEY (`usuario_id`, `usuario_nick`) REFERENCES `usuario` (`id`, `nick`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela diariodigital.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nick` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`id`,`nick`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
