-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.19 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para dungeonsgeek
CREATE DATABASE IF NOT EXISTS `dungeonsgeek` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dungeonsgeek`;

-- Volcando estructura para tabla dungeonsgeek.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `IdProducto` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(50) NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `Precio` double(150,5) NOT NULL,
  `Stock` int(11) NOT NULL,
  `foto` varchar(400) NOT NULL,
  PRIMARY KEY (`IdProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla dungeonsgeek.productos: ~8 rows (aproximadamente)
DELETE FROM `productos`;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`IdProducto`, `Titulo`, `Tipo`, `Precio`, `Stock`, `foto`) VALUES
	(1, 'Titanfall 2', 'Videojuego', 420.00000, 150, 'img/titanfall2.jpg'),
	(2, 'Battlefield 1 Revolution', 'Videojuego', 420.00000, 200, 'img/battlefield1rev.jpg'),
	(3, 'Project Cars 2 Collector\'s Edition', 'Videojuego', 1250.00000, 65, 'img/PC2_Collectors_2.jpg'),
	(4, 'Need For Speed Payback', 'Videojuego', 420.00000, 100, 'img/NFSPayback.jpg'),
	(5, 'Dark Souls Game Of The Year Edition', 'Videojuego', 460.00000, 100, 'img/DSIIIGOTYX1.jpg'),
	(6, 'Rise Of The Tomb Raider 20 Year Celebration', 'Videojuego', 400.00000, 200, 'img/Riseofthetombraider.jpg'),
	(7, 'Ark Survival Evolved Explorer\'s Edition', 'Videojuego', 460.00000, 200, 'img/ArkExplorersedition.jpg'),
	(8, 'Fifa 18 Ronaldo Edition', 'Videojuego', 520.00000, 300, 'img/Fifa18RonaldoEdition.jpg');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla dungeonsgeek.reserva
CREATE TABLE IF NOT EXISTS `reserva` (
  `IdProducto` int(11) NOT NULL,
  `CodReserva` int(11) NOT NULL,
  `CodUsuario` int(11) NOT NULL,
  `Precio` double(105,5) unsigned NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`CodReserva`),
  KEY `FK_reserva_usuarios` (`CodUsuario`),
  KEY `FK_reserva_producto` (`IdProducto`),
  CONSTRAINT `FK_reserva_producto` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`IdProducto`),
  CONSTRAINT `FK_reserva_usuarios` FOREIGN KEY (`CodUsuario`) REFERENCES `usuarios` (`CodUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla dungeonsgeek.reserva: ~0 rows (aproximadamente)
DELETE FROM `reserva`;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;

-- Volcando estructura para tabla dungeonsgeek.tipo
CREATE TABLE IF NOT EXISTS `tipo` (
  `IdTipo` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(50) NOT NULL DEFAULT '0',
  KEY `IdTipo` (`IdTipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla dungeonsgeek.tipo: ~2 rows (aproximadamente)
DELETE FROM `tipo`;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` (`IdTipo`, `Tipo`) VALUES
	(1, 'Admin'),
	(2, 'Cliente');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;

-- Volcando estructura para tabla dungeonsgeek.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `CodUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL DEFAULT '0',
  `APaterno` varchar(50) NOT NULL DEFAULT '0',
  `Email` varchar(100) NOT NULL DEFAULT '0',
  `Telefono` int(10) NOT NULL DEFAULT '0',
  `FechaNacimiento` date NOT NULL,
  `Ciudad` varchar(80) NOT NULL DEFAULT '0',
  `CI` int(11) NOT NULL DEFAULT '0',
  `Password` varchar(50) NOT NULL DEFAULT '0',
  `tipo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`CodUsuario`),
  UNIQUE KEY `Email` (`Email`),
  KEY `tipo` (`tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla dungeonsgeek.usuarios: ~0 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
