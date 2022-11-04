-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `comics`;
CREATE TABLE `comics` (
  `CodComic` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(100) NOT NULL,
  `Precio` double(150,5) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Compañia` varchar(20) NOT NULL,
  PRIMARY KEY (`CodComic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `reserva`;
CREATE TABLE `reserva` (
  `CodJuego` int(11) NOT NULL,
  `CodComic` int(11) NOT NULL,
  `CodReserva` int(11) NOT NULL AUTO_INCREMENT,
  `CodUsuario` int(11) NOT NULL,
  `Precio` double(150,5) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`CodReserva`),
  KEY `Juego` (`CodJuego`),
  KEY `Comic` (`CodComic`),
  KEY `Usuario` (`CodUsuario`),
  CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`CodJuego`) REFERENCES `reserva` (`CodJuego`),
  CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`CodComic`) REFERENCES `reserva` (`CodComic`),
  CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`CodUsuario`) REFERENCES `reserva` (`CodUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `CodUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Apaterno` varchar(50) NOT NULL,
  `AMaterno` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefono` int(10) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Ciudad` varchar(60) NOT NULL,
  `CI` int(11) NOT NULL,
  `Password` varchar(60) NOT NULL,
  PRIMARY KEY (`CodUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `videojuegos`;
CREATE TABLE `videojuegos` (
  `CodJuego` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Precio` double(150,5) NOT NULL,
  `Stock` int(11) NOT NULL,
  PRIMARY KEY (`CodJuego`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2017-11-06 22:00:43
