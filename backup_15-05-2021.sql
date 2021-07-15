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
-- Table structure for table `traficov2`.`perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`perfil`
--

/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`rrhh_propietario`
--

DROP TABLE IF EXISTS `rrhh_propietario`;
CREATE TABLE `rrhh_propietario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razonSocial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cuit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`rrhh_propietario`
--

/*!40000 ALTER TABLE `rrhh_propietario` DISABLE KEYS */;
INSERT INTO `rrhh_propietario` (`id`,`razonSocial`,`cuit`) VALUES 
 (6,'empresa santa rita sociedad resp. limit.','30709869514');
/*!40000 ALTER TABLE `rrhh_propietario` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`rrhh_tipo_licencia`
--

DROP TABLE IF EXISTS `rrhh_tipo_licencia`;
CREATE TABLE `rrhh_tipo_licencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_48FC04B5702D1D47` (`tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`rrhh_tipo_licencia`
--

/*!40000 ALTER TABLE `rrhh_tipo_licencia` DISABLE KEYS */;
INSERT INTO `rrhh_tipo_licencia` (`id`,`tipo`) VALUES 
 (1,'Licencia Municipal'),
 (2,'Licencia Provincial');
/*!40000 ALTER TABLE `rrhh_tipo_licencia` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`rrhhopciones_tipo_vencimiento_estructura`
--

DROP TABLE IF EXISTS `rrhhopciones_tipo_vencimiento_estructura`;
CREATE TABLE `rrhhopciones_tipo_vencimiento_estructura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `antelacion` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`rrhhopciones_tipo_vencimiento_estructura`
--

/*!40000 ALTER TABLE `rrhhopciones_tipo_vencimiento_estructura` DISABLE KEYS */;
/*!40000 ALTER TABLE `rrhhopciones_tipo_vencimiento_estructura` ENABLE KEYS */;


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
-- Table structure for table `traficov2`.`security_perfiles`
--

DROP TABLE IF EXISTS `security_perfiles`;
CREATE TABLE `security_perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`security_perfiles`
--

/*!40000 ALTER TABLE `security_perfiles` DISABLE KEYS */;
INSERT INTO `security_perfiles` (`id`,`perfil`) VALUES 
 (1,'PERFIL_SEGVIAL');
/*!40000 ALTER TABLE `security_perfiles` ENABLE KEYS */;


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
 (2,5),
 (3,1);
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
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` enum('ROLE_SUPER_ADMIN','ROLE_OPERADOR','ROLE_RESPONSABLE_TRAFICO','ROLE_RESPONSABLE_DIAGRAMACION') COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6D9D0020B052C3AA` (`id_perfil`),
  CONSTRAINT `FK_6D9D0020B052C3AA` FOREIGN KEY (`id_perfil`) REFERENCES `security_perfiles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`security_usuarios`
--

/*!40000 ALTER TABLE `security_usuarios` DISABLE KEYS */;
INSERT INTO `security_usuarios` (`id`,`username`,`password`,`activo`,`apellido`,`nombre`,`roles`,`id_perfil`) VALUES 
 (2,'leochabur','$2y$13$fSn7Ftx.uv8plJwG0GtKPemOcEpaDeC5EZBq2Rs20YArJq6bfhgS.',1,'Chabur','Leonardo','ROLE_SUPER_ADMIN',1),
 (3,'admin','$2y$13$pZ5BawqzDzBgqwWCox0lu.3W7CBRhAJjhMKH.eIJjcLdOcjxZdC02',1,'administrador','administrador','ROLE_SUPER_ADMIN',1);
/*!40000 ALTER TABLE `security_usuarios` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_eventos_estado_evento`
--

DROP TABLE IF EXISTS `seg_vial_eventos_estado_evento`;
CREATE TABLE `seg_vial_eventos_estado_evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_840EDAB0265DE1E3` (`estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_eventos_estado_evento`
--

/*!40000 ALTER TABLE `seg_vial_eventos_estado_evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `seg_vial_eventos_estado_evento` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_eventos_evento`
--

DROP TABLE IF EXISTS `seg_vial_eventos_evento`;
CREATE TABLE `seg_vial_eventos_evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prefijo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `hora` time NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eventtype` int(11) NOT NULL,
  `id_ubicacion_evento` int(11) DEFAULT NULL,
  `id_estructura` int(11) DEFAULT NULL,
  `id_usuario_alta` int(11) DEFAULT NULL,
  `id_usuario_baja` int(11) DEFAULT NULL,
  `eliminado` tinyint(1) NOT NULL,
  `fechaAlta` datetime NOT NULL,
  `fechaBaja` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3F86E828E35572E0` (`id_ubicacion_evento`),
  KEY `IDX_3F86E828FFABC0C8` (`id_estructura`),
  KEY `IDX_3F86E828D84E9F60` (`id_usuario_alta`),
  KEY `IDX_3F86E82816629C02` (`id_usuario_baja`),
  CONSTRAINT `FK_3F86E82816629C02` FOREIGN KEY (`id_usuario_baja`) REFERENCES `security_usuarios` (`id`),
  CONSTRAINT `FK_3F86E828D84E9F60` FOREIGN KEY (`id_usuario_alta`) REFERENCES `security_usuarios` (`id`),
  CONSTRAINT `FK_3F86E828E35572E0` FOREIGN KEY (`id_ubicacion_evento`) REFERENCES `seg_vial_eventos_ubicacion_evento` (`id`),
  CONSTRAINT `FK_3F86E828FFABC0C8` FOREIGN KEY (`id_estructura`) REFERENCES `security_estructuras` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_eventos_evento`
--

/*!40000 ALTER TABLE `seg_vial_eventos_evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `seg_vial_eventos_evento` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_eventos_infraccion`
--

DROP TABLE IF EXISTS `seg_vial_eventos_infraccion`;
CREATE TABLE `seg_vial_eventos_infraccion` (
  `id` int(11) NOT NULL,
  `id_tipo_infraccion` int(11) DEFAULT NULL,
  `numeroActa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pagoVoluntario` tinyint(1) NOT NULL,
  `vencimiento` datetime NOT NULL,
  `pagoTotal` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AB48D7C774B2F673` (`id_tipo_infraccion`),
  CONSTRAINT `FK_AB48D7C7BF396750` FOREIGN KEY (`id`) REFERENCES `seg_vial_eventos_evento` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_AB48D7C774B2F673` FOREIGN KEY (`id_tipo_infraccion`) REFERENCES `seg_vialeventos_tipo_infraccion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_eventos_infraccion`
--

/*!40000 ALTER TABLE `seg_vial_eventos_infraccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `seg_vial_eventos_infraccion` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_eventos_suceso`
--

DROP TABLE IF EXISTS `seg_vial_eventos_suceso`;
CREATE TABLE `seg_vial_eventos_suceso` (
  `id` int(11) NOT NULL,
  `id_tipo_suceso` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CBD655843E7D8D46` (`id_tipo_suceso`),
  CONSTRAINT `FK_CBD65584BF396750` FOREIGN KEY (`id`) REFERENCES `seg_vial_eventos_evento` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_CBD655843E7D8D46` FOREIGN KEY (`id_tipo_suceso`) REFERENCES `seg_vial_eventos_tipo_suceso` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_eventos_suceso`
--

/*!40000 ALTER TABLE `seg_vial_eventos_suceso` DISABLE KEYS */;
/*!40000 ALTER TABLE `seg_vial_eventos_suceso` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_eventos_tipo_suceso`
--

DROP TABLE IF EXISTS `seg_vial_eventos_tipo_suceso`;
CREATE TABLE `seg_vial_eventos_tipo_suceso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_eventos_tipo_suceso`
--

/*!40000 ALTER TABLE `seg_vial_eventos_tipo_suceso` DISABLE KEYS */;
/*!40000 ALTER TABLE `seg_vial_eventos_tipo_suceso` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_eventos_ubicacion_evento`
--

DROP TABLE IF EXISTS `seg_vial_eventos_ubicacion_evento`;
CREATE TABLE `seg_vial_eventos_ubicacion_evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ciudad` int(11) DEFAULT NULL,
  `calle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `interseccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latitud` double NOT NULL,
  `longitud` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_66408C33A8B1B073` (`id_ciudad`),
  CONSTRAINT `FK_66408C33A8B1B073` FOREIGN KEY (`id_ciudad`) REFERENCES `ventas_ciudad` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_eventos_ubicacion_evento`
--

/*!40000 ALTER TABLE `seg_vial_eventos_ubicacion_evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `seg_vial_eventos_ubicacion_evento` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_habilitaciones_unidades`
--

DROP TABLE IF EXISTS `seg_vial_habilitaciones_unidades`;
CREATE TABLE `seg_vial_habilitaciones_unidades` (
  `id_unidad` int(11) NOT NULL,
  `id_tipo_habilitacion` int(11) NOT NULL,
  PRIMARY KEY (`id_unidad`,`id_tipo_habilitacion`),
  KEY `IDX_1D43CCFAD5D165C2` (`id_unidad`),
  KEY `IDX_1D43CCFA28167E59` (`id_tipo_habilitacion`),
  CONSTRAINT `FK_1D43CCFA28167E59` FOREIGN KEY (`id_tipo_habilitacion`) REFERENCES `seg_vial_opciones_tipo_hab_unidad` (`id`),
  CONSTRAINT `FK_1D43CCFAD5D165C2` FOREIGN KEY (`id_unidad`) REFERENCES `seg_vial_unidades` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_habilitaciones_unidades`
--

/*!40000 ALTER TABLE `seg_vial_habilitaciones_unidades` DISABLE KEYS */;
INSERT INTO `seg_vial_habilitaciones_unidades` (`id_unidad`,`id_tipo_habilitacion`) VALUES 
 (3,1),
 (4,2);
/*!40000 ALTER TABLE `seg_vial_habilitaciones_unidades` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_opciones_tipo_hab_unidad`
--

DROP TABLE IF EXISTS `seg_vial_opciones_tipo_hab_unidad`;
CREATE TABLE `seg_vial_opciones_tipo_hab_unidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_86CFECE7702D1D47` (`tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_opciones_tipo_hab_unidad`
--

/*!40000 ALTER TABLE `seg_vial_opciones_tipo_hab_unidad` DISABLE KEYS */;
INSERT INTO `seg_vial_opciones_tipo_hab_unidad` (`id`,`tipo`) VALUES 
 (1,'CNRT'),
 (2,'Provincia');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_opciones_tipo_motor`
--

/*!40000 ALTER TABLE `seg_vial_opciones_tipo_motor` DISABLE KEYS */;
INSERT INTO `seg_vial_opciones_tipo_motor` (`id`,`tipo`) VALUES 
 (3,'Al Diome'),
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_opciones_tipo_suspension`
--

/*!40000 ALTER TABLE `seg_vial_opciones_tipo_suspension` DISABLE KEYS */;
INSERT INTO `seg_vial_opciones_tipo_suspension` (`id`,`tipo`) VALUES 
 (1,'Elastiquero'),
 (3,'Mista'),
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_opciones_tipo_unidad`
--

/*!40000 ALTER TABLE `seg_vial_opciones_tipo_unidad` DISABLE KEYS */;
INSERT INTO `seg_vial_opciones_tipo_unidad` (`id`,`tipo`) VALUES 
 (6,'Articulado'),
 (1,'Combi'),
 (2,'Doble Piso'),
 (3,'Minibus'),
 (4,'Piso Simple'),
 (5,'Urbano');
/*!40000 ALTER TABLE `seg_vial_opciones_tipo_unidad` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_peajes_estacion_peaje`
--

DROP TABLE IF EXISTS `seg_vial_peajes_estacion_peaje`;
CREATE TABLE `seg_vial_peajes_estacion_peaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estructura` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latitud` double DEFAULT NULL,
  `longitud` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DB59E455FFABC0C8` (`id_estructura`),
  CONSTRAINT `FK_DB59E455FFABC0C8` FOREIGN KEY (`id_estructura`) REFERENCES `security_estructuras` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_peajes_estacion_peaje`
--

/*!40000 ALTER TABLE `seg_vial_peajes_estacion_peaje` DISABLE KEYS */;
INSERT INTO `seg_vial_peajes_estacion_peaje` (`id`,`id_estructura`,`nombre`,`latitud`,`longitud`) VALUES 
 (1,1,'Dock SUD',NULL,NULL),
 (2,1,'hudson',NULL,NULL);
/*!40000 ALTER TABLE `seg_vial_peajes_estacion_peaje` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_peajes_tarifa_peaje`
--

DROP TABLE IF EXISTS `seg_vial_peajes_tarifa_peaje`;
CREATE TABLE `seg_vial_peajes_tarifa_peaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_unidad` int(11) DEFAULT NULL,
  `id_estacion_peaje` int(11) DEFAULT NULL,
  `tarifaNormal` double NOT NULL,
  `tarifaTelepase` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_85D950137E4DEBC0` (`id_tipo_unidad`),
  KEY `IDX_85D95013AEF421AE` (`id_estacion_peaje`),
  CONSTRAINT `FK_85D95013AEF421AE` FOREIGN KEY (`id_estacion_peaje`) REFERENCES `seg_vial_peajes_estacion_peaje` (`id`),
  CONSTRAINT `FK_85D950137E4DEBC0` FOREIGN KEY (`id_tipo_unidad`) REFERENCES `seg_vial_opciones_tipo_unidad` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_peajes_tarifa_peaje`
--

/*!40000 ALTER TABLE `seg_vial_peajes_tarifa_peaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `seg_vial_peajes_tarifa_peaje` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_unidades`
--

DROP TABLE IF EXISTS `seg_vial_unidades`;
CREATE TABLE `seg_vial_unidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_propietario` int(11) DEFAULT NULL,
  `id_tipo_unidad` int(11) DEFAULT NULL,
  `id_tipo_motor` int(11) DEFAULT NULL,
  `interno` int(11) NOT NULL,
  `chasisMarca` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chasisModelo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chasisNumero` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `carroceriaMarca` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `carroceriaModelo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capacidadReal` int(11) DEFAULT NULL,
  `capacidadCNRT` int(11) DEFAULT NULL,
  `motorMarca` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motorNumero` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `consumo` double DEFAULT NULL,
  `audioVideo` tinyint(1) DEFAULT NULL,
  `banio` tinyint(1) DEFAULT NULL,
  `bar` tinyint(1) DEFAULT NULL,
  `dominioAnterior` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dominioNuevo` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechaInscripcion` date DEFAULT NULL,
  `anioModelo` int(11) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ploteo` tinyint(1) DEFAULT NULL,
  `carteleraElectronica` tinyint(1) DEFAULT NULL,
  `capacidadTanque` int(11) DEFAULT NULL,
  `cantidadTanques` int(11) DEFAULT NULL,
  `pcABordo` tinyint(1) DEFAULT NULL,
  `id_calidad_unidad` int(11) DEFAULT NULL,
  `id_radicacion` int(11) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `confirmado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2C4BBC85A719F507` (`id_propietario`),
  KEY `IDX_2C4BBC857E4DEBC0` (`id_tipo_unidad`),
  KEY `IDX_2C4BBC8568651E5F` (`id_tipo_motor`),
  KEY `IDX_2C4BBC8599C993A2` (`id_calidad_unidad`),
  KEY `IDX_2C4BBC85B9E33FE8` (`id_radicacion`),
  CONSTRAINT `FK_2C4BBC8568651E5F` FOREIGN KEY (`id_tipo_motor`) REFERENCES `seg_vial_opciones_tipo_motor` (`id`),
  CONSTRAINT `FK_2C4BBC857E4DEBC0` FOREIGN KEY (`id_tipo_unidad`) REFERENCES `seg_vial_opciones_tipo_unidad` (`id`),
  CONSTRAINT `FK_2C4BBC8599C993A2` FOREIGN KEY (`id_calidad_unidad`) REFERENCES `seg_vialopciones_calidad_unidad` (`id`),
  CONSTRAINT `FK_2C4BBC85A719F507` FOREIGN KEY (`id_propietario`) REFERENCES `rrhh_propietario` (`id`),
  CONSTRAINT `FK_2C4BBC85B9E33FE8` FOREIGN KEY (`id_radicacion`) REFERENCES `ventas_provincia` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_unidades`
--

/*!40000 ALTER TABLE `seg_vial_unidades` DISABLE KEYS */;
INSERT INTO `seg_vial_unidades` (`id`,`id_propietario`,`id_tipo_unidad`,`id_tipo_motor`,`interno`,`chasisMarca`,`chasisModelo`,`chasisNumero`,`carroceriaMarca`,`carroceriaModelo`,`capacidadReal`,`capacidadCNRT`,`motorMarca`,`motorNumero`,`consumo`,`audioVideo`,`banio`,`bar`,`dominioAnterior`,`dominioNuevo`,`fechaInscripcion`,`anioModelo`,`color`,`ploteo`,`carteleraElectronica`,`capacidadTanque`,`cantidadTanques`,`pcABordo`,`id_calidad_unidad`,`id_radicacion`,`activo`,`confirmado`) VALUES 
 (1,6,1,NULL,2023,'Mercedes benz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AC761UV',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0),
 (3,6,5,1,120,'Mercedes benz','of 1517','jfskdfhjkshfjks','metalpar','tronador',43,NULL,'mercedes benz','fsdgsgsgsg',29,0,0,0,NULL,'AB579OA','2019-09-27',2018,NULL,1,1,256,1,1,NULL,2,1,0),
 (4,6,5,3,103,'agrale','ma 15.0','werwerewrwrwr','metalpar','tronador',43,NULL,'mwm','qweqewqewqewqe',33,0,0,0,'KCS291',NULL,'2020-06-25',2011,'gis',1,1,245,1,1,3,2,1,1);
/*!40000 ALTER TABLE `seg_vial_unidades` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vialeventos_tipo_infraccion`
--

DROP TABLE IF EXISTS `seg_vialeventos_tipo_infraccion`;
CREATE TABLE `seg_vialeventos_tipo_infraccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vialeventos_tipo_infraccion`
--

/*!40000 ALTER TABLE `seg_vialeventos_tipo_infraccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `seg_vialeventos_tipo_infraccion` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vialopciones_calidad_unidad`
--

DROP TABLE IF EXISTS `seg_vialopciones_calidad_unidad`;
CREATE TABLE `seg_vialopciones_calidad_unidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vialopciones_calidad_unidad`
--

/*!40000 ALTER TABLE `seg_vialopciones_calidad_unidad` DISABLE KEYS */;
INSERT INTO `seg_vialopciones_calidad_unidad` (`id`,`calidad`) VALUES 
 (1,'Semi cama mix'),
 (2,'Cama'),
 (3,'Comun');
/*!40000 ALTER TABLE `seg_vialopciones_calidad_unidad` ENABLE KEYS */;


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
  UNIQUE KEY `UNIQ_42C736883A909126` (`nombre`)
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
 (1,1,1,1,3,'ZARATE ALGO','-56.2340000000000','-45.3503445667800','-45.2400000000000','-33.4302222222200',1,1,1,4,1,1,1,1),
 (2,1,1,1,3,'zarate centro','-56.2340000000000','-45.3450000000000','-45.2420000000000','-33.4320000000000',0,1,0,1,1,NULL,1,1),
 (3,1,1,1,3,'zarate san lorenzo','-56.2342343244320','-45.3454353342340','-45.2423423423430','-33.4323243223430',0,0,1,2,2,NULL,1,1),
 (4,2,1,1,3,'zarate produccion','-56.2341111111110','-45.3453412312320','-45.2420000000000','-33.4320000000000',1,1,1,4,1,1,1,1),
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
  CONSTRAINT `FK_901C53109122652` FOREIGN KEY (`id_turno`) REFERENCES `trafico_turnos` (`id`),
  CONSTRAINT `FK_901C5310FB93B337` FOREIGN KEY (`idd_tipo_unidad`) REFERENCES `seg_vial_opciones_tipo_unidad` (`id`)
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
  `id_estructura` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DB8A58E853AF4E34` (`id_provincia`),
  KEY `IDX_DB8A58E8FFABC0C8` (`id_estructura`),
  CONSTRAINT `FK_DB8A58E8FFABC0C8` FOREIGN KEY (`id_estructura`) REFERENCES `security_estructuras` (`id`),
  CONSTRAINT `FK_DB8A58E853AF4E34` FOREIGN KEY (`id_provincia`) REFERENCES `ventas_provincia` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`ventas_ciudad`
--

/*!40000 ALTER TABLE `ventas_ciudad` DISABLE KEYS */;
INSERT INTO `ventas_ciudad` (`id`,`nombre`,`id_provincia`,`id_estructura`) VALUES 
 (1,'Zarate',2,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`ventas_clientes`
--

/*!40000 ALTER TABLE `ventas_clientes` DISABLE KEYS */;
INSERT INTO `ventas_clientes` (`id`,`razonSocial`,`nombreFantasia`,`prefijo`,`domicilioFiscal`,`cuit`,`responsabilidad`,`condicionPago`,`tipo_factura`,`tipo_ajuste`,`frecuenca_ajuste`,`nombreContacto`,`telefonoContacto`,`celularContacto`,`mailContacto`,`cargoContacto`,`activo`) VALUES 
 (1,'toyota sa','tasa','tyt','zarate','30-70986951-1','INSC',7,NULL,'POL','CUAT',NULL,NULL,NULL,NULL,NULL,0),
 (2,'PAPELERA DEL PLATA','PAPELERA DEL PLATENTES SA','PDP','ZARATE','30-21233652-0','NOINSC',0,NULL,'FADEEAC','SEM','CHABUR LEONARDO','02223 444640','LEO','LEO@GMAIL.com','CAPANGA',0),
 (4,'miralejos sacifia','sapucai','sap','ruta 210 km 69','15-32655662-2','INSC',123,NULL,'POL','CUAT','CHABUR LEONARDO','02223 444640','LEO','LEO@GMAIL.com','CAPANGA',0);
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
  `latitud` decimal(15,12) NOT NULL,
  `longitud` decimal(15,12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C7163158A8B1B073` (`id_ciudad`),
  KEY `IDX_C7163158FFABC0C8` (`id_estructura`),
  KEY `IDX_C71631582A813255` (`id_cliente`),
  CONSTRAINT `FK_C71631582A813255` FOREIGN KEY (`id_cliente`) REFERENCES `ventas_clientes` (`id`),
  CONSTRAINT `FK_C7163158A8B1B073` FOREIGN KEY (`id_ciudad`) REFERENCES `ventas_ciudad` (`id`),
  CONSTRAINT `FK_C7163158FFABC0C8` FOREIGN KEY (`id_estructura`) REFERENCES `security_estructuras` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`ventas_ubicacion_estructura`
--

/*!40000 ALTER TABLE `ventas_ubicacion_estructura` DISABLE KEYS */;
INSERT INTO `ventas_ubicacion_estructura` (`id`,`id_ciudad`,`id_estructura`,`id_cliente`,`latitud`,`longitud`) VALUES 
 (1,1,1,2,'35.000000000000','456.000000000000'),
 (2,1,2,2,'34.000000000000','55.000000000000'),
 (3,1,3,2,'55.000000000000','44.000000000000'),
 (4,1,1,1,'-35.000000000000','-115.000000000000'),
 (5,1,4,4,'-35.343000000000','-78.133000000000'),
 (6,1,1,4,'-34.343000000000','-89.234000000000'),
 (7,1,1,4,'-36.367000000000','-36.365000000000');
/*!40000 ALTER TABLE `ventas_ubicacion_estructura` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
