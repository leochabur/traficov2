-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.59


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema traficov2
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ traficov2;
USE traficov2;

--
-- Table structure for table `traficov2`.`security_estructuras`
--

DROP TABLE IF EXISTS `security_estructuras`;
CREATE TABLE `security_estructuras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estructura` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B6F3B4DF5A21401F` (`estructura`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`security_estructuras`
--

/*!40000 ALTER TABLE `security_estructuras` DISABLE KEYS */;
INSERT INTO `security_estructuras` (`id`,`estructura`) VALUES 
 (1,'Operacion Campana'),
 (4,'Operacion Giles'),
 (3,'Operacion Olavarria'),
 (5,'Operacion Rojas'),
 (2,'Operacion SUR');
/*!40000 ALTER TABLE `security_estructuras` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`security_usuario_estructuras`
--

DROP TABLE IF EXISTS `security_usuario_estructuras`;
CREATE TABLE `security_usuario_estructuras` (
  `usuario_id` int(11) NOT NULL,
  `estructura_id` int(11) NOT NULL,
  PRIMARY KEY (`usuario_id`,`estructura_id`),
  KEY `IDX_7DCFEA13DB38439E` (`usuario_id`),
  KEY `IDX_7DCFEA13CD2B7E7C` (`estructura_id`),
  CONSTRAINT `FK_7DCFEA13CD2B7E7C` FOREIGN KEY (`estructura_id`) REFERENCES `security_estructuras` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_7DCFEA13DB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `security_usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`security_usuario_estructuras`
--

/*!40000 ALTER TABLE `security_usuario_estructuras` DISABLE KEYS */;
INSERT INTO `security_usuario_estructuras` (`usuario_id`,`estructura_id`) VALUES 
 (2,1),
 (2,2),
 (2,3),
 (2,4),
 (2,5);
/*!40000 ALTER TABLE `security_usuario_estructuras` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`security_usuarios`
--

DROP TABLE IF EXISTS `security_usuarios`;
CREATE TABLE `security_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:json_array)',
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`security_usuarios`
--

/*!40000 ALTER TABLE `security_usuarios` DISABLE KEYS */;
INSERT INTO `security_usuarios` (`id`,`username`,`password`,`activo`,`roles`,`apellido`,`nombre`) VALUES 
 (2,'leochabur','$2y$13$fSn7Ftx.uv8plJwG0GtKPemOcEpaDeC5EZBq2Rs20YArJq6bfhgS.',1,'[\"ROLE_USER\"]','Chabur','Leonardo');
/*!40000 ALTER TABLE `security_usuarios` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_opciones_tipo_hab_unidad`
--

DROP TABLE IF EXISTS `seg_vial_opciones_tipo_hab_unidad`;
CREATE TABLE `seg_vial_opciones_tipo_hab_unidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_86CFECE7702D1D47` (`tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_opciones_tipo_hab_unidad`
--

/*!40000 ALTER TABLE `seg_vial_opciones_tipo_hab_unidad` DISABLE KEYS */;
INSERT INTO `seg_vial_opciones_tipo_hab_unidad` (`id`,`tipo`) VALUES 
 (1,'CNRT');
/*!40000 ALTER TABLE `seg_vial_opciones_tipo_hab_unidad` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_opciones_tipo_motor`
--

DROP TABLE IF EXISTS `seg_vial_opciones_tipo_motor`;
CREATE TABLE `seg_vial_opciones_tipo_motor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_933D4758702D1D47` (`tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_opciones_tipo_motor`
--

/*!40000 ALTER TABLE `seg_vial_opciones_tipo_motor` DISABLE KEYS */;
INSERT INTO `seg_vial_opciones_tipo_motor` (`id`,`tipo`) VALUES 
 (1,'Delantero'),
 (2,'Tracero');
/*!40000 ALTER TABLE `seg_vial_opciones_tipo_motor` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_opciones_tipo_suspension`
--

DROP TABLE IF EXISTS `seg_vial_opciones_tipo_suspension`;
CREATE TABLE `seg_vial_opciones_tipo_suspension` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6BB51FE6702D1D47` (`tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_opciones_tipo_suspension`
--

/*!40000 ALTER TABLE `seg_vial_opciones_tipo_suspension` DISABLE KEYS */;
INSERT INTO `seg_vial_opciones_tipo_suspension` (`id`,`tipo`) VALUES 
 (1,'Elastiquero'),
 (2,'Neumatica');
/*!40000 ALTER TABLE `seg_vial_opciones_tipo_suspension` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_opciones_tipo_unidad`
--

DROP TABLE IF EXISTS `seg_vial_opciones_tipo_unidad`;
CREATE TABLE `seg_vial_opciones_tipo_unidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E0D2263A702D1D47` (`tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_opciones_tipo_unidad`
--

/*!40000 ALTER TABLE `seg_vial_opciones_tipo_unidad` DISABLE KEYS */;
INSERT INTO `seg_vial_opciones_tipo_unidad` (`id`,`tipo`) VALUES 
 (1,'Combi'),
 (2,'Doble Piso'),
 (3,'Minibus'),
 (4,'Piso Simple'),
 (5,'Urbano');
/*!40000 ALTER TABLE `seg_vial_opciones_tipo_unidad` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`trafico_frecuencia_turnos`
--

DROP TABLE IF EXISTS `trafico_frecuencia_turnos`;
CREATE TABLE `trafico_frecuencia_turnos` (
  `id_turno` int(11) NOT NULL,
  `id_frecuencia` int(11) NOT NULL,
  PRIMARY KEY (`id_turno`,`id_frecuencia`),
  KEY `IDX_926FC8D59122652` (`id_turno`),
  KEY `IDX_926FC8D573269F44` (`id_frecuencia`),
  CONSTRAINT `FK_926FC8D573269F44` FOREIGN KEY (`id_frecuencia`) REFERENCES `trafico_opciones_frecuencia_turno` (`id`),
  CONSTRAINT `FK_926FC8D59122652` FOREIGN KEY (`id_turno`) REFERENCES `trafico_turnos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`trafico_frecuencia_turnos`
--

/*!40000 ALTER TABLE `trafico_frecuencia_turnos` DISABLE KEYS */;
INSERT INTO `trafico_frecuencia_turnos` (`id_turno`,`id_frecuencia`) VALUES 
 (1,1),
 (1,2),
 (1,3),
 (1,4),
 (1,5),
 (1,6),
 (1,7),
 (2,3),
 (3,1),
 (4,1),
 (4,2),
 (4,3),
 (4,4),
 (4,5),
 (4,6),
 (4,7),
 (5,1),
 (5,2),
 (5,3),
 (5,4),
 (5,5),
 (5,6),
 (5,7);
/*!40000 ALTER TABLE `trafico_frecuencia_turnos` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`trafico_opciones_frecuencia_servicio`
--

DROP TABLE IF EXISTS `trafico_opciones_frecuencia_servicio`;
CREATE TABLE `trafico_opciones_frecuencia_servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frecuencia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A7389A18D6AC1F93` (`frecuencia`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`trafico_opciones_frecuencia_servicio`
--

/*!40000 ALTER TABLE `trafico_opciones_frecuencia_servicio` DISABLE KEYS */;
INSERT INTO `trafico_opciones_frecuencia_servicio` (`id`,`frecuencia`) VALUES 
 (3,'Eventual'),
 (1,'Regular'),
 (2,'Temporario');
/*!40000 ALTER TABLE `trafico_opciones_frecuencia_servicio` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`trafico_opciones_frecuencia_turno`
--

DROP TABLE IF EXISTS `trafico_opciones_frecuencia_turno`;
CREATE TABLE `trafico_opciones_frecuencia_turno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diaSemana` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_4F9898163A909126` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`trafico_opciones_frecuencia_turno`
--

/*!40000 ALTER TABLE `trafico_opciones_frecuencia_turno` DISABLE KEYS */;
INSERT INTO `trafico_opciones_frecuencia_turno` (`id`,`nombre`,`diaSemana`) VALUES 
 (1,'Domingo',1),
 (2,'Lunes',2),
 (3,'Martes',3),
 (4,'Miercoles',4),
 (5,'Jueves',5),
 (6,'Viernes',6),
 (7,'Sabado',7);
/*!40000 ALTER TABLE `trafico_opciones_frecuencia_turno` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`trafico_opciones_sentido_servicio`
--

DROP TABLE IF EXISTS `trafico_opciones_sentido_servicio`;
CREATE TABLE `trafico_opciones_sentido_servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_F86102A0702D1D47` (`tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`trafico_opciones_sentido_servicio`
--

/*!40000 ALTER TABLE `trafico_opciones_sentido_servicio` DISABLE KEYS */;
INSERT INTO `trafico_opciones_sentido_servicio` (`id`,`tipo`) VALUES 
 (4,'Back Up'),
 (1,'Entrada'),
 (3,'Rondin'),
 (2,'Salida');
/*!40000 ALTER TABLE `trafico_opciones_sentido_servicio` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`trafico_opciones_tipo_servicio`
--

DROP TABLE IF EXISTS `trafico_opciones_tipo_servicio`;
CREATE TABLE `trafico_opciones_tipo_servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_79F00BEA702D1D47` (`tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`trafico_opciones_tipo_servicio`
--

/*!40000 ALTER TABLE `trafico_opciones_tipo_servicio` DISABLE KEYS */;
INSERT INTO `trafico_opciones_tipo_servicio` (`id`,`tipo`) VALUES 
 (1,'Administracion'),
 (3,'Over Time'),
 (2,'Produccion');
/*!40000 ALTER TABLE `trafico_opciones_tipo_servicio` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`trafico_opciones_turno_cliente`
--

DROP TABLE IF EXISTS `trafico_opciones_turno_cliente`;
CREATE TABLE `trafico_opciones_turno_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `turno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A2AF31C8E7976762` (`turno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`trafico_opciones_turno_cliente`
--

/*!40000 ALTER TABLE `trafico_opciones_turno_cliente` DISABLE KEYS */;
INSERT INTO `trafico_opciones_turno_cliente` (`id`,`turno`) VALUES 
 (1,'Mañana'),
 (3,'Noche'),
 (2,'Tarde');
/*!40000 ALTER TABLE `trafico_opciones_turno_cliente` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`trafico_servicios`
--

DROP TABLE IF EXISTS `trafico_servicios`;
CREATE TABLE `trafico_servicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `id_orgien` int(11) DEFAULT NULL,
  `id_origen` int(11) DEFAULT NULL,
  `id_frecuencia` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latitudOrigen` decimal(15,13) NOT NULL,
  `longitudOrigen` decimal(15,13) NOT NULL,
  `latitudDestino` decimal(15,13) NOT NULL,
  `longitudDestino` decimal(15,13) NOT NULL,
  `requiereUnidadHabilitada` tinyint(1) NOT NULL,
  `admiteFletero` tinyint(1) NOT NULL,
  `cierreAutomatico` tinyint(1) NOT NULL,
  `id_sentido` int(11) DEFAULT NULL,
  `id_tipo_servicio` int(11) DEFAULT NULL,
  `id_tipo_habilitacion` int(11) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `id_estructura` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_72A1911B2A813255` (`id_cliente`),
  KEY `IDX_72A1911BBE32F6C6` (`id_orgien`),
  KEY `IDX_72A1911B5473ACFF` (`id_origen`),
  KEY `IDX_72A1911B73269F44` (`id_frecuencia`),
  KEY `IDX_72A1911B9F8DFE73` (`id_sentido`),
  KEY `IDX_72A1911BA36B7986` (`id_tipo_servicio`),
  KEY `IDX_72A1911B28167E59` (`id_tipo_habilitacion`),
  KEY `IDX_72A1911BFFABC0C8` (`id_estructura`),
  CONSTRAINT `FK_72A1911B28167E59` FOREIGN KEY (`id_tipo_habilitacion`) REFERENCES `seg_vial_opciones_tipo_hab_unidad` (`id`),
  CONSTRAINT `FK_72A1911B2A813255` FOREIGN KEY (`id_cliente`) REFERENCES `ventas_clientes` (`id`),
  CONSTRAINT `FK_72A1911B5473ACFF` FOREIGN KEY (`id_origen`) REFERENCES `ventas_ciudad` (`id`),
  CONSTRAINT `FK_72A1911B73269F44` FOREIGN KEY (`id_frecuencia`) REFERENCES `trafico_opciones_frecuencia_servicio` (`id`),
  CONSTRAINT `FK_72A1911B9F8DFE73` FOREIGN KEY (`id_sentido`) REFERENCES `trafico_opciones_sentido_servicio` (`id`),
  CONSTRAINT `FK_72A1911BA36B7986` FOREIGN KEY (`id_tipo_servicio`) REFERENCES `trafico_opciones_tipo_servicio` (`id`),
  CONSTRAINT `FK_72A1911BBE32F6C6` FOREIGN KEY (`id_orgien`) REFERENCES `ventas_ciudad` (`id`),
  CONSTRAINT `FK_72A1911BFFABC0C8` FOREIGN KEY (`id_estructura`) REFERENCES `security_estructuras` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`trafico_servicios`
--

/*!40000 ALTER TABLE `trafico_servicios` DISABLE KEYS */;
INSERT INTO `trafico_servicios` (`id`,`id_cliente`,`id_orgien`,`id_origen`,`id_frecuencia`,`nombre`,`latitudOrigen`,`longitudOrigen`,`latitudDestino`,`longitudDestino`,`requiereUnidadHabilitada`,`admiteFletero`,`cierreAutomatico`,`id_sentido`,`id_tipo_servicio`,`id_tipo_habilitacion`,`activo`,`id_estructura`) VALUES 
 (1,1,1,1,3,'ZARATE ALGO','-56.2300000000000','-45.3500000000000','-45.2400000000000','-33.4300000000000',1,1,1,4,1,1,1,1),
 (2,1,1,1,3,'zarate centro','-56.2342343240000','-45.3454353340000','-45.2423423400000','-33.4323243200000',0,1,0,1,1,NULL,1,1),
 (3,1,1,1,3,'zarate san lorenzo','-56.2342343244320','-45.3454353342340','-45.2423423423430','-33.4323243223430',0,0,1,2,2,NULL,1,1),
 (4,2,1,1,3,'zarate produccion','-56.2342343244320','-45.3454353342340','-45.2423423423430','-33.4323243223430',1,1,1,4,1,1,1,1),
 (5,1,1,1,3,'zarate san lorenzo','-56.2342343244320','-45.3454353342340','-45.2423423423430','-33.4323243223430',1,1,1,4,1,1,1,1);
/*!40000 ALTER TABLE `trafico_servicios` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`trafico_tipo_unidad_turnos`
--

DROP TABLE IF EXISTS `trafico_tipo_unidad_turnos`;
CREATE TABLE `trafico_tipo_unidad_turnos` (
  `id_turno` int(11) NOT NULL,
  `idd_tipo_unidad` int(11) NOT NULL,
  PRIMARY KEY (`id_turno`,`idd_tipo_unidad`),
  KEY `IDX_901C53109122652` (`id_turno`),
  KEY `IDX_901C5310FB93B337` (`idd_tipo_unidad`),
  CONSTRAINT `FK_901C5310FB93B337` FOREIGN KEY (`idd_tipo_unidad`) REFERENCES `seg_vial_opciones_tipo_unidad` (`id`),
  CONSTRAINT `FK_901C53109122652` FOREIGN KEY (`id_turno`) REFERENCES `trafico_turnos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`trafico_tipo_unidad_turnos`
--

/*!40000 ALTER TABLE `trafico_tipo_unidad_turnos` DISABLE KEYS */;
INSERT INTO `trafico_tipo_unidad_turnos` (`id_turno`,`idd_tipo_unidad`) VALUES 
 (1,1),
 (2,5),
 (3,2),
 (4,2),
 (5,4);
/*!40000 ALTER TABLE `trafico_tipo_unidad_turnos` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`trafico_tipos_motor_por_servicio`
--

DROP TABLE IF EXISTS `trafico_tipos_motor_por_servicio`;
CREATE TABLE `trafico_tipos_motor_por_servicio` (
  `id_servicio` int(11) NOT NULL,
  `id_tipo_motor` int(11) NOT NULL,
  PRIMARY KEY (`id_servicio`,`id_tipo_motor`),
  KEY `IDX_6C4C5B6C9B5D1EBF` (`id_servicio`),
  KEY `IDX_6C4C5B6C68651E5F` (`id_tipo_motor`),
  CONSTRAINT `FK_6C4C5B6C68651E5F` FOREIGN KEY (`id_tipo_motor`) REFERENCES `seg_vial_opciones_tipo_motor` (`id`),
  CONSTRAINT `FK_6C4C5B6C9B5D1EBF` FOREIGN KEY (`id_servicio`) REFERENCES `trafico_servicios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`trafico_tipos_motor_por_servicio`
--

/*!40000 ALTER TABLE `trafico_tipos_motor_por_servicio` DISABLE KEYS */;
INSERT INTO `trafico_tipos_motor_por_servicio` (`id_servicio`,`id_tipo_motor`) VALUES 
 (1,1),
 (1,2),
 (2,2),
 (3,2),
 (4,1),
 (4,2),
 (5,1);
/*!40000 ALTER TABLE `trafico_tipos_motor_por_servicio` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`trafico_tipos_suspension_por_servicio`
--

DROP TABLE IF EXISTS `trafico_tipos_suspension_por_servicio`;
CREATE TABLE `trafico_tipos_suspension_por_servicio` (
  `id_servicio` int(11) NOT NULL,
  `id_tipo_suspension` int(11) NOT NULL,
  PRIMARY KEY (`id_servicio`,`id_tipo_suspension`),
  KEY `IDX_C19BA4B79B5D1EBF` (`id_servicio`),
  KEY `IDX_C19BA4B7FA77C4A0` (`id_tipo_suspension`),
  CONSTRAINT `FK_C19BA4B79B5D1EBF` FOREIGN KEY (`id_servicio`) REFERENCES `trafico_servicios` (`id`),
  CONSTRAINT `FK_C19BA4B7FA77C4A0` FOREIGN KEY (`id_tipo_suspension`) REFERENCES `seg_vial_opciones_tipo_suspension` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`trafico_tipos_suspension_por_servicio`
--

/*!40000 ALTER TABLE `trafico_tipos_suspension_por_servicio` DISABLE KEYS */;
INSERT INTO `trafico_tipos_suspension_por_servicio` (`id_servicio`,`id_tipo_suspension`) VALUES 
 (1,1),
 (1,2),
 (2,2),
 (3,2),
 (4,1),
 (4,2),
 (5,2);
/*!40000 ALTER TABLE `trafico_tipos_suspension_por_servicio` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`trafico_tipos_unidad_por_servicio`
--

DROP TABLE IF EXISTS `trafico_tipos_unidad_por_servicio`;
CREATE TABLE `trafico_tipos_unidad_por_servicio` (
  `id_servicio` int(11) NOT NULL,
  `id_tipo_unidad` int(11) NOT NULL,
  PRIMARY KEY (`id_servicio`,`id_tipo_unidad`),
  KEY `IDX_54697F749B5D1EBF` (`id_servicio`),
  KEY `IDX_54697F747E4DEBC0` (`id_tipo_unidad`),
  CONSTRAINT `FK_54697F747E4DEBC0` FOREIGN KEY (`id_tipo_unidad`) REFERENCES `seg_vial_opciones_tipo_unidad` (`id`),
  CONSTRAINT `FK_54697F749B5D1EBF` FOREIGN KEY (`id_servicio`) REFERENCES `trafico_servicios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`trafico_tipos_unidad_por_servicio`
--

/*!40000 ALTER TABLE `trafico_tipos_unidad_por_servicio` DISABLE KEYS */;
INSERT INTO `trafico_tipos_unidad_por_servicio` (`id_servicio`,`id_tipo_unidad`) VALUES 
 (1,1),
 (1,2),
 (1,3),
 (1,4),
 (1,5),
 (2,2),
 (3,2),
 (4,1),
 (4,2),
 (4,3),
 (4,4),
 (4,5),
 (5,3);
/*!40000 ALTER TABLE `trafico_tipos_unidad_por_servicio` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`trafico_turnos`
--

DROP TABLE IF EXISTS `trafico_turnos`;
CREATE TABLE `trafico_turnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_servicio` int(11) DEFAULT NULL,
  `id_turno` int(11) DEFAULT NULL,
  `horaInicial` time NOT NULL,
  `horaFinal` time NOT NULL,
  `kmRecorrido` int(11) NOT NULL,
  `duracion` time NOT NULL,
  `numeroPaxSolicitado` int(11) NOT NULL,
  `id_turno_asociado` int(11) DEFAULT NULL,
  `antiguedad` int(11) NOT NULL,
  `requiereBanio` tinyint(1) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6E9BB063CA475572` (`id_turno_asociado`),
  KEY `IDX_6E9BB0639B5D1EBF` (`id_servicio`),
  KEY `IDX_6E9BB0639122652` (`id_turno`),
  CONSTRAINT `FK_6E9BB0639122652` FOREIGN KEY (`id_turno`) REFERENCES `trafico_opciones_turno_cliente` (`id`),
  CONSTRAINT `FK_6E9BB0639B5D1EBF` FOREIGN KEY (`id_servicio`) REFERENCES `trafico_servicios` (`id`),
  CONSTRAINT `FK_6E9BB063CA475572` FOREIGN KEY (`id_turno_asociado`) REFERENCES `trafico_turnos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`trafico_turnos`
--

/*!40000 ALTER TABLE `trafico_turnos` DISABLE KEYS */;
INSERT INTO `trafico_turnos` (`id`,`id_servicio`,`id_turno`,`horaInicial`,`horaFinal`,`kmRecorrido`,`duracion`,`numeroPaxSolicitado`,`id_turno_asociado`,`antiguedad`,`requiereBanio`,`activo`) VALUES 
 (1,5,1,'22:22:00','23:33:00',222,'01:33:00',34,NULL,0,NULL,1),
 (2,5,3,'23:44:00','21:12:00',333,'12:22:00',33,NULL,14,0,1),
 (3,5,3,'03:33:00','04:44:00',34343,'04:44:00',3,NULL,10,1,1),
 (4,1,1,'11:11:00','12:22:00',234,'01:21:00',45,NULL,0,NULL,1),
 (5,1,2,'10:03:00','12:00:00',100,'02:00:00',33,NULL,10,NULL,1);
/*!40000 ALTER TABLE `trafico_turnos` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`ventas_ciudad`
--

DROP TABLE IF EXISTS `ventas_ciudad`;
CREATE TABLE `ventas_ciudad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_provincia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DB8A58E853AF4E34` (`id_provincia`),
  CONSTRAINT `FK_DB8A58E853AF4E34` FOREIGN KEY (`id_provincia`) REFERENCES `ventas_provincia` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`ventas_ciudad`
--

/*!40000 ALTER TABLE `ventas_ciudad` DISABLE KEYS */;
INSERT INTO `ventas_ciudad` (`id`,`nombre`,`id_provincia`) VALUES 
 (1,'Zarate',2);
/*!40000 ALTER TABLE `ventas_ciudad` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`ventas_clientes`
--

DROP TABLE IF EXISTS `ventas_clientes`;
CREATE TABLE `ventas_clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razonSocial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombreFantasia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prefijo` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `domicilioFiscal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cuit` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `responsabilidad` enum('INSC','NOINSC','MONO','EXC') COLLATE utf8_unicode_ci DEFAULT NULL,
  `condicionPago` int(11) NOT NULL,
  `tipo_factura` enum('A','B','C','M') COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_ajuste` enum('POL','APC','FADEEAC') COLLATE utf8_unicode_ci DEFAULT NULL,
  `frecuenca_ajuste` enum('CUAT','SEM','AN','LIB') COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombreContacto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefonoContacto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celularContacto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mailContacto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cargoContacto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_3C41A1E27D68FC36` (`prefijo`),
  UNIQUE KEY `UNIQ_3C41A1E2B9BA4881` (`cuit`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`ventas_clientes`
--

/*!40000 ALTER TABLE `ventas_clientes` DISABLE KEYS */;
INSERT INTO `ventas_clientes` (`id`,`razonSocial`,`nombreFantasia`,`prefijo`,`domicilioFiscal`,`cuit`,`responsabilidad`,`condicionPago`,`tipo_factura`,`tipo_ajuste`,`frecuenca_ajuste`,`nombreContacto`,`telefonoContacto`,`celularContacto`,`mailContacto`,`cargoContacto`,`activo`) VALUES 
 (1,'toyota sa','tasa','tyt','zarate','30-70986951-1','INSC',7,NULL,'POL','CUAT',NULL,NULL,NULL,NULL,NULL,1),
 (2,'PAPELERA DEL PLATA','PAPELERA DEL PLATENTES SA','PDP','ZARATE','30-21233652-0','NOINSC',0,NULL,'FADEEAC','SEM','CHABUR LEONARDO','02223 444640','LEO','LEO@GMAIL.com','CAPANGA',1);
/*!40000 ALTER TABLE `ventas_clientes` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`ventas_provincia`
--

DROP TABLE IF EXISTS `ventas_provincia`;
CREATE TABLE `ventas_provincia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_854589963A909126` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`ventas_provincia`
--

/*!40000 ALTER TABLE `ventas_provincia` DISABLE KEYS */;
INSERT INTO `ventas_provincia` (`id`,`nombre`) VALUES 
 (2,'Buenos Aires'),
 (1,'CABA'),
 (3,'Catamarca'),
 (4,'Chaco'),
 (13,'Chubut'),
 (20,'Cordoba'),
 (23,'Corrientes'),
 (6,'Entre Rios'),
 (22,'Formosa'),
 (7,'Jujuy'),
 (16,'La Pampa'),
 (18,'La Rioja'),
 (9,'Mendoza'),
 (5,'Misiones'),
 (10,'Neuquen'),
 (11,'Rio Negro'),
 (14,'Salta'),
 (17,'San Luis'),
 (12,'Santa Cruz'),
 (15,'Santa Fe'),
 (21,'Santiago del Estero'),
 (24,'Tierra del Fuego'),
 (19,'Tucuman');
/*!40000 ALTER TABLE `ventas_provincia` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`ventas_ubicacion_estructura`
--

DROP TABLE IF EXISTS `ventas_ubicacion_estructura`;
CREATE TABLE `ventas_ubicacion_estructura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ciudad` int(11) DEFAULT NULL,
  `id_estructura` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `latitud` double NOT NULL,
  `longitud` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C7163158A8B1B073` (`id_ciudad`),
  KEY `IDX_C7163158FFABC0C8` (`id_estructura`),
  KEY `IDX_C71631582A813255` (`id_cliente`),
  CONSTRAINT `FK_C71631582A813255` FOREIGN KEY (`id_cliente`) REFERENCES `ventas_clientes` (`id`),
  CONSTRAINT `FK_C7163158A8B1B073` FOREIGN KEY (`id_ciudad`) REFERENCES `ventas_ciudad` (`id`),
  CONSTRAINT `FK_C7163158FFABC0C8` FOREIGN KEY (`id_estructura`) REFERENCES `security_estructuras` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`ventas_ubicacion_estructura`
--

/*!40000 ALTER TABLE `ventas_ubicacion_estructura` DISABLE KEYS */;
INSERT INTO `ventas_ubicacion_estructura` (`id`,`id_ciudad`,`id_estructura`,`id_cliente`,`latitud`,`longitud`) VALUES 
 (1,1,1,2,35,456),
 (2,1,2,2,34,55),
 (3,1,3,2,55,44),
 (4,1,1,1,-35,-115);
/*!40000 ALTER TABLE `ventas_ubicacion_estructura` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
