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
-- Table structure for table `traficov2`.`perfil_campo_informe`
--

DROP TABLE IF EXISTS `perfil_campo_informe`;
CREATE TABLE `perfil_campo_informe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_informe` int(11) DEFAULT NULL,
  `campo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orden` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9E108123A0E848A9` (`id_informe`),
  CONSTRAINT `FK_9E108123A0E848A9` FOREIGN KEY (`id_informe`) REFERENCES `perfil_definicion_informe` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`perfil_campo_informe`
--

/*!40000 ALTER TABLE `perfil_campo_informe` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfil_campo_informe` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`perfil_definicion_informe`
--

DROP TABLE IF EXISTS `perfil_definicion_informe`;
CREATE TABLE `perfil_definicion_informe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3D6C1246FCF8192D` (`id_usuario`),
  CONSTRAINT `FK_3D6C1246FCF8192D` FOREIGN KEY (`id_usuario`) REFERENCES `security_usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`perfil_definicion_informe`
--

/*!40000 ALTER TABLE `perfil_definicion_informe` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfil_definicion_informe` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`revisions`
--

DROP TABLE IF EXISTS `revisions`;
CREATE TABLE `revisions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` datetime NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`revisions`
--

/*!40000 ALTER TABLE `revisions` DISABLE KEYS */;
/*!40000 ALTER TABLE `revisions` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`rrhh_opciones_tipo_vencimiento`
--

DROP TABLE IF EXISTS `rrhh_opciones_tipo_vencimiento`;
CREATE TABLE `rrhh_opciones_tipo_vencimiento` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_F79A96D6BF396750` FOREIGN KEY (`id`) REFERENCES `seg_vial_opciones_tipo_vto_abstract` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`rrhh_opciones_tipo_vencimiento`
--

/*!40000 ALTER TABLE `rrhh_opciones_tipo_vencimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `rrhh_opciones_tipo_vencimiento` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`rrhh_personal`
--

DROP TABLE IF EXISTS `rrhh_personal`;
CREATE TABLE `rrhh_personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `legajo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`rrhh_personal`
--

/*!40000 ALTER TABLE `rrhh_personal` DISABLE KEYS */;
INSERT INTO `rrhh_personal` (`id`,`apellido`,`nombre`,`legajo`) VALUES 
 (1,'Chabur','Leo',1),
 (2,'Chabur','Morena',2),
 (3,'Zudaire','Lorena',3),
 (4,'Alcuaz','Sebastian',4);
/*!40000 ALTER TABLE `rrhh_personal` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`security_perfiles`
--

/*!40000 ALTER TABLE `security_perfiles` DISABLE KEYS */;
INSERT INTO `security_perfiles` (`id`,`perfil`) VALUES 
 (1,'PERFIL_SEGVIAL'),
 (2,'PERFIL_DIAGRAMACION'),
 (3,'PERFIL_SEG_VIAL');
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
  `descripcion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `eventtype` int(11) NOT NULL,
  `id_ubicacion_evento` int(11) DEFAULT NULL,
  `id_estructura` int(11) DEFAULT NULL,
  `id_usuario_alta` int(11) DEFAULT NULL,
  `id_usuario_baja` int(11) DEFAULT NULL,
  `eliminado` tinyint(1) NOT NULL,
  `fechaAlta` datetime NOT NULL,
  `fechaBaja` datetime DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_unidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_3F86E828E35572E0` (`id_ubicacion_evento`),
  KEY `IDX_3F86E828FFABC0C8` (`id_estructura`),
  KEY `IDX_3F86E828D84E9F60` (`id_usuario_alta`),
  KEY `IDX_3F86E82816629C02` (`id_usuario_baja`),
  KEY `IDX_3F86E8282A813255` (`id_cliente`),
  KEY `IDX_3F86E828D5D165C2` (`id_unidad`),
  CONSTRAINT `FK_3F86E82816629C02` FOREIGN KEY (`id_usuario_baja`) REFERENCES `security_usuarios` (`id`),
  CONSTRAINT `FK_3F86E8282A813255` FOREIGN KEY (`id_cliente`) REFERENCES `ventas_clientes` (`id`),
  CONSTRAINT `FK_3F86E828D5D165C2` FOREIGN KEY (`id_unidad`) REFERENCES `seg_vial_unidades` (`id`),
  CONSTRAINT `FK_3F86E828D84E9F60` FOREIGN KEY (`id_usuario_alta`) REFERENCES `security_usuarios` (`id`),
  CONSTRAINT `FK_3F86E828E35572E0` FOREIGN KEY (`id_ubicacion_evento`) REFERENCES `seg_vial_eventos_ubicacion_evento` (`id`),
  CONSTRAINT `FK_3F86E828FFABC0C8` FOREIGN KEY (`id_estructura`) REFERENCES `security_estructuras` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_eventos_evento`
--

/*!40000 ALTER TABLE `seg_vial_eventos_evento` DISABLE KEYS */;
INSERT INTO `seg_vial_eventos_evento` (`id`,`prefijo`,`numero`,`fecha`,`hora`,`descripcion`,`eventtype`,`id_ubicacion_evento`,`id_estructura`,`id_usuario_alta`,`id_usuario_baja`,`eliminado`,`fechaAlta`,`fechaBaja`,`id_cliente`,`id_unidad`) VALUES 
 (1,'INF',1,'2021-05-27 00:00:00','00:00:00','se comio la curva',3,5,1,2,NULL,0,'2021-05-27 22:02:09',NULL,1,1);
/*!40000 ALTER TABLE `seg_vial_eventos_evento` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_eventos_infraccion`
--

DROP TABLE IF EXISTS `seg_vial_eventos_infraccion`;
CREATE TABLE `seg_vial_eventos_infraccion` (
  `id` int(11) NOT NULL,
  `id_tipo_infraccion` int(11) DEFAULT NULL,
  `numeroActa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vencimiento` date NOT NULL,
  `montoInicial` double NOT NULL,
  `notificado` tinyint(1) NOT NULL,
  `descontada` tinyint(1) NOT NULL,
  `aceptada` tinyint(1) NOT NULL,
  `fecha_pago` date DEFAULT NULL,
  `monto_abonado` double NOT NULL,
  `cuotas` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AB48D7C774B2F673` (`id_tipo_infraccion`),
  CONSTRAINT `FK_AB48D7C774B2F673` FOREIGN KEY (`id_tipo_infraccion`) REFERENCES `seg_vialeventos_tipo_infraccion` (`id`),
  CONSTRAINT `FK_AB48D7C7BF396750` FOREIGN KEY (`id`) REFERENCES `seg_vial_eventos_evento` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_eventos_infraccion`
--

/*!40000 ALTER TABLE `seg_vial_eventos_infraccion` DISABLE KEYS */;
INSERT INTO `seg_vial_eventos_infraccion` (`id`,`id_tipo_infraccion`,`numeroActa`,`vencimiento`,`montoInicial`,`notificado`,`descontada`,`aceptada`,`fecha_pago`,`monto_abonado`,`cuotas`) VALUES 
 (1,1,'13123123','2021-05-30',0,0,0,0,'2021-05-27',0,0);
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
  CONSTRAINT `FK_CBD655843E7D8D46` FOREIGN KEY (`id_tipo_suceso`) REFERENCES `seg_vial_eventos_tipo_suceso` (`id`),
  CONSTRAINT `FK_CBD65584BF396750` FOREIGN KEY (`id`) REFERENCES `seg_vial_eventos_evento` (`id`) ON DELETE CASCADE
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
-- Table structure for table `traficov2`.`seg_vial_eventos_tripulacion_evento`
--

DROP TABLE IF EXISTS `seg_vial_eventos_tripulacion_evento`;
CREATE TABLE `seg_vial_eventos_tripulacion_evento` (
  `id_evento` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  PRIMARY KEY (`id_evento`,`id_personal`),
  KEY `IDX_4CD37B5261B1BEE8` (`id_evento`),
  KEY `IDX_4CD37B52A1518111` (`id_personal`),
  CONSTRAINT `FK_4CD37B5261B1BEE8` FOREIGN KEY (`id_evento`) REFERENCES `seg_vial_eventos_evento` (`id`),
  CONSTRAINT `FK_4CD37B52A1518111` FOREIGN KEY (`id_personal`) REFERENCES `rrhh_personal` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_eventos_tripulacion_evento`
--

/*!40000 ALTER TABLE `seg_vial_eventos_tripulacion_evento` DISABLE KEYS */;
INSERT INTO `seg_vial_eventos_tripulacion_evento` (`id_evento`,`id_personal`) VALUES 
 (1,1),
 (1,2),
 (1,3),
 (1,4);
/*!40000 ALTER TABLE `seg_vial_eventos_tripulacion_evento` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_eventos_ubicacion_evento`
--

/*!40000 ALTER TABLE `seg_vial_eventos_ubicacion_evento` DISABLE KEYS */;
INSERT INTO `seg_vial_eventos_ubicacion_evento` (`id`,`id_ciudad`,`calle`,`interseccion`,`latitud`,`longitud`) VALUES 
 (5,1,'asdsad','asdsads',-34.109225,-59.897286);
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
/*!40000 ALTER TABLE `seg_vial_habilitaciones_unidades` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_opciones_marca_chasis`
--

DROP TABLE IF EXISTS `seg_vial_opciones_marca_chasis`;
CREATE TABLE `seg_vial_opciones_marca_chasis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_F3F7350C70A0113` (`marca`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_opciones_marca_chasis`
--

/*!40000 ALTER TABLE `seg_vial_opciones_marca_chasis` DISABLE KEYS */;
INSERT INTO `seg_vial_opciones_marca_chasis` (`id`,`marca`) VALUES 
 (1,'Mercedes Benz');
/*!40000 ALTER TABLE `seg_vial_opciones_marca_chasis` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_opciones_tipo_hab_unidad`
--

DROP TABLE IF EXISTS `seg_vial_opciones_tipo_hab_unidad`;
CREATE TABLE `seg_vial_opciones_tipo_hab_unidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_opciones_tipo_hab_unidad`
--

/*!40000 ALTER TABLE `seg_vial_opciones_tipo_hab_unidad` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_opciones_tipo_unidad`
--

/*!40000 ALTER TABLE `seg_vial_opciones_tipo_unidad` DISABLE KEYS */;
INSERT INTO `seg_vial_opciones_tipo_unidad` (`id`,`tipo`) VALUES 
 (6,'Articulado'),
 (15,'asdasdasd'),
 (8,'Automovil'),
 (10,'Bicicleta'),
 (1,'Combi'),
 (2,'Doble Piso'),
 (13,'Equino'),
 (14,'mencleta'),
 (3,'Minibus'),
 (11,'monopatin'),
 (12,'Motoneta'),
 (9,'Pick Up'),
 (4,'Piso Simple'),
 (5,'Urbano'),
 (7,'Utilitario');
/*!40000 ALTER TABLE `seg_vial_opciones_tipo_unidad` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_opciones_tipo_vto_abstract`
--

DROP TABLE IF EXISTS `seg_vial_opciones_tipo_vto_abstract`;
CREATE TABLE `seg_vial_opciones_tipo_vto_abstract` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `tpotype` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_opciones_tipo_vto_abstract`
--

/*!40000 ALTER TABLE `seg_vial_opciones_tipo_vto_abstract` DISABLE KEYS */;
INSERT INTO `seg_vial_opciones_tipo_vto_abstract` (`id`,`tipo`,`activo`,`tpotype`) VALUES 
 (1,'VTV Provincia',1,3),
 (2,'VTV Nacion',1,3),
 (3,'Cedula Verde',1,4),
 (4,'Titulo Automotor',1,4);
/*!40000 ALTER TABLE `seg_vial_opciones_tipo_vto_abstract` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_opciones_tipo_vto_documento_adjunto`
--

DROP TABLE IF EXISTS `seg_vial_opciones_tipo_vto_documento_adjunto`;
CREATE TABLE `seg_vial_opciones_tipo_vto_documento_adjunto` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_6A0FED10BF396750` FOREIGN KEY (`id`) REFERENCES `seg_vial_opciones_tipo_vto_abstract` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_opciones_tipo_vto_documento_adjunto`
--

/*!40000 ALTER TABLE `seg_vial_opciones_tipo_vto_documento_adjunto` DISABLE KEYS */;
INSERT INTO `seg_vial_opciones_tipo_vto_documento_adjunto` (`id`) VALUES 
 (3),
 (4);
/*!40000 ALTER TABLE `seg_vial_opciones_tipo_vto_documento_adjunto` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_opciones_tipo_vto_unidad`
--

DROP TABLE IF EXISTS `seg_vial_opciones_tipo_vto_unidad`;
CREATE TABLE `seg_vial_opciones_tipo_vto_unidad` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_C2FA4F53BF396750` FOREIGN KEY (`id`) REFERENCES `seg_vial_opciones_tipo_vto_abstract` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_opciones_tipo_vto_unidad`
--

/*!40000 ALTER TABLE `seg_vial_opciones_tipo_vto_unidad` DISABLE KEYS */;
INSERT INTO `seg_vial_opciones_tipo_vto_unidad` (`id`) VALUES 
 (1),
 (2);
/*!40000 ALTER TABLE `seg_vial_opciones_tipo_vto_unidad` ENABLE KEYS */;


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
  CONSTRAINT `FK_85D950137E4DEBC0` FOREIGN KEY (`id_tipo_unidad`) REFERENCES `seg_vial_opciones_tipo_unidad` (`id`),
  CONSTRAINT `FK_85D95013AEF421AE` FOREIGN KEY (`id_estacion_peaje`) REFERENCES `seg_vial_peajes_estacion_peaje` (`id`)
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
  `dominio` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `id_str_habitual` int(11) DEFAULT NULL,
  `id_str_actual` int(11) DEFAULT NULL,
  `id_marca_chasis` int(11) DEFAULT NULL,
  `id_op_resp` int(11) DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2C4BBC85A719F507` (`id_propietario`),
  KEY `IDX_2C4BBC857E4DEBC0` (`id_tipo_unidad`),
  KEY `IDX_2C4BBC8568651E5F` (`id_tipo_motor`),
  KEY `IDX_2C4BBC8599C993A2` (`id_calidad_unidad`),
  KEY `IDX_2C4BBC85B9E33FE8` (`id_radicacion`),
  KEY `IDX_2C4BBC856B38B7BD` (`id_str_habitual`),
  KEY `IDX_2C4BBC855E6670D7` (`id_str_actual`),
  KEY `IDX_2C4BBC85AE01B1C3` (`id_marca_chasis`),
  KEY `IDX_2C4BBC855453250C` (`id_op_resp`),
  CONSTRAINT `FK_2C4BBC855453250C` FOREIGN KEY (`id_op_resp`) REFERENCES `rrhh_propietario` (`id`),
  CONSTRAINT `FK_2C4BBC855E6670D7` FOREIGN KEY (`id_str_actual`) REFERENCES `security_estructuras` (`id`),
  CONSTRAINT `FK_2C4BBC8568651E5F` FOREIGN KEY (`id_tipo_motor`) REFERENCES `seg_vial_opciones_tipo_motor` (`id`),
  CONSTRAINT `FK_2C4BBC856B38B7BD` FOREIGN KEY (`id_str_habitual`) REFERENCES `security_estructuras` (`id`),
  CONSTRAINT `FK_2C4BBC857E4DEBC0` FOREIGN KEY (`id_tipo_unidad`) REFERENCES `seg_vial_opciones_tipo_unidad` (`id`),
  CONSTRAINT `FK_2C4BBC8599C993A2` FOREIGN KEY (`id_calidad_unidad`) REFERENCES `seg_vialopciones_calidad_unidad` (`id`),
  CONSTRAINT `FK_2C4BBC85A719F507` FOREIGN KEY (`id_propietario`) REFERENCES `rrhh_propietario` (`id`),
  CONSTRAINT `FK_2C4BBC85AE01B1C3` FOREIGN KEY (`id_marca_chasis`) REFERENCES `seg_vial_opciones_marca_chasis` (`id`),
  CONSTRAINT `FK_2C4BBC85B9E33FE8` FOREIGN KEY (`id_radicacion`) REFERENCES `ventas_provincia` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_unidades`
--

/*!40000 ALTER TABLE `seg_vial_unidades` DISABLE KEYS */;
INSERT INTO `seg_vial_unidades` (`id`,`id_propietario`,`id_tipo_unidad`,`id_tipo_motor`,`interno`,`chasisModelo`,`chasisNumero`,`carroceriaMarca`,`carroceriaModelo`,`capacidadReal`,`capacidadCNRT`,`motorMarca`,`motorNumero`,`consumo`,`audioVideo`,`banio`,`bar`,`dominio`,`fechaInscripcion`,`anioModelo`,`color`,`ploteo`,`carteleraElectronica`,`capacidadTanque`,`cantidadTanques`,`pcABordo`,`id_calidad_unidad`,`id_radicacion`,`activo`,`confirmado`,`id_str_habitual`,`id_str_actual`,`id_marca_chasis`,`id_op_resp`,`imagen`) VALUES 
 (1,6,1,3,2023,'om30','9088djj','metalpar','aries',24,46,'mercedes benz','ab2376',29,0,0,0,'ac761uv','2019-02-07',2018,NULL,0,0,250,1,0,1,2,1,0,1,1,1,6,NULL),
 (3,6,5,1,120,'of 1517','jfskdfhjkshfjks','metalpar','tronador',43,45,'mercedes benz','fsdgsgsgsg',29,0,0,0,'ab372xl','2019-09-27',2018,NULL,1,1,256,1,1,1,2,1,1,1,1,1,6,NULL),
 (4,6,1,3,103,'ma 15.0','werwerewrwrwr','metalpar tronador','tronador y rayos',43,1,'mwm','qweqewqewqewqe',33,1,0,1,'ae203yj','2020-06-25',2016,'gis',1,1,245,1,1,3,2,1,1,2,1,1,6,'uploads/activos/internos/103-6/6111becd5a8f0.jpeg'),
 (5,6,6,NULL,2025,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ac761uv',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0,1,NULL,NULL,6,NULL);
INSERT INTO `seg_vial_unidades` (`id`,`id_propietario`,`id_tipo_unidad`,`id_tipo_motor`,`interno`,`chasisModelo`,`chasisNumero`,`carroceriaMarca`,`carroceriaModelo`,`capacidadReal`,`capacidadCNRT`,`motorMarca`,`motorNumero`,`consumo`,`audioVideo`,`banio`,`bar`,`dominio`,`fechaInscripcion`,`anioModelo`,`color`,`ploteo`,`carteleraElectronica`,`capacidadTanque`,`cantidadTanques`,`pcABordo`,`id_calidad_unidad`,`id_radicacion`,`activo`,`confirmado`,`id_str_habitual`,`id_str_actual`,`id_marca_chasis`,`id_op_resp`,`imagen`) VALUES 
 (6,6,2,3,296,'om30','jfskdfhjkshfjks','metalpar','tronador',46,45,'zccasdasd','fa78yas8a8d',33,0,1,1,'PLH973t','2021-07-15',2021,NULL,0,0,650,2,0,1,2,1,0,1,1,1,6,'uploads/activos/internos/296-6/60e98d98a3a25.jpeg'),
 (7,6,6,3,2028,'of 1517','9088djj','saldivia','aries',46,45,NULL,NULL,NULL,1,1,1,'ac761uv','2021-07-08',2013,NULL,0,0,650,2,0,1,2,1,0,1,1,1,6,NULL),
 (8,6,6,3,2029,'ot 17220','9088djj','saldivia','tronador',2,2,'mercedes benz',NULL,NULL,0,0,0,'ab372xl','2021-07-08',4,NULL,0,0,10,4,0,1,2,1,0,1,1,1,6,NULL),
 (9,6,6,3,2100,'of 1517','9088djj','metalpar','aries',2,2,'mercedes benz','fsdgsgsgsg',29,1,1,1,'ab372xl','2021-07-29',2,NULL,0,0,1,1,0,1,2,1,0,5,5,1,6,'uploads/activos/internos/2100-6/1625656194507-60e840b7914b1.jpeg');
INSERT INTO `seg_vial_unidades` (`id`,`id_propietario`,`id_tipo_unidad`,`id_tipo_motor`,`interno`,`chasisModelo`,`chasisNumero`,`carroceriaMarca`,`carroceriaModelo`,`capacidadReal`,`capacidadCNRT`,`motorMarca`,`motorNumero`,`consumo`,`audioVideo`,`banio`,`bar`,`dominio`,`fechaInscripcion`,`anioModelo`,`color`,`ploteo`,`carteleraElectronica`,`capacidadTanque`,`cantidadTanques`,`pcABordo`,`id_calidad_unidad`,`id_radicacion`,`activo`,`confirmado`,`id_str_habitual`,`id_str_actual`,`id_marca_chasis`,`id_op_resp`,`imagen`) VALUES 
 (10,6,6,3,2500,'ot 17220','9088djj','saldivia','aries',2,3,'mercedes benz','fsdgsgsgsg',29,0,0,0,'ae203yj','2021-07-28',3,NULL,0,0,2,3,0,1,2,1,0,1,1,1,6,'E:\\proyectos\\trafico2.0/web/uploads/internos/2500-6/rtcsnapshot7514438939672646345-60e790312c0ee.jpeg'),
 (11,6,6,3,1369,'of 1517','9088djj','saldivia','aries',2,3,'mercedes benz','fsdgsgsgsg',29,0,0,0,'ac768wf','2021-07-08',3,'rojo',1,1,4,4,1,1,2,1,0,1,1,1,6,'E:\\proyectos\\trafico2.0/web/uploads/internos\\1369-6\\screenshot_20190715195755-60e794b04c47b.jpeg'),
 (12,6,12,2,124,'of 1517 lp','9088djjasdas','saldivia rosario','tronador mta bis',44,40,'mercedes bens','1234567',22,0,0,0,'nyd123','2021-07-02',2021,'anaranjadito',1,0,22,1,0,2,13,1,0,4,5,1,6,'uploads/activos/internos/124-6/6106fede76b2a.png');
/*!40000 ALTER TABLE `seg_vial_unidades` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_unidades_audit`
--

DROP TABLE IF EXISTS `seg_vial_unidades_audit`;
CREATE TABLE `seg_vial_unidades_audit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `object_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discriminator` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_hash` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diffs` longtext COLLATE utf8_unicode_ci,
  `blame_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blame_user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blame_user_fqdn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blame_user_firewall` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `type_e71d7ed1e5deda5c9f231729185415e5_idx` (`type`),
  KEY `object_id_e71d7ed1e5deda5c9f231729185415e5_idx` (`object_id`(191)),
  KEY `discriminator_e71d7ed1e5deda5c9f231729185415e5_idx` (`discriminator`(191)),
  KEY `transaction_hash_e71d7ed1e5deda5c9f231729185415e5_idx` (`transaction_hash`),
  KEY `blame_id_e71d7ed1e5deda5c9f231729185415e5_idx` (`blame_id`(191)),
  KEY `created_at_e71d7ed1e5deda5c9f231729185415e5_idx` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_unidades_audit`
--

/*!40000 ALTER TABLE `seg_vial_unidades_audit` DISABLE KEYS */;
INSERT INTO `seg_vial_unidades_audit` (`id`,`type`,`object_id`,`discriminator`,`transaction_hash`,`diffs`,`blame_id`,`blame_user`,`blame_user_fqdn`,`blame_user_firewall`,`ip`,`created_at`) VALUES 
 (1,'update','4',NULL,'6f39fb2f663e165cbd2dc4ad5da80b5dd5dc40d6','{\"carroceriaMarca\":{\"new\":\"metalpar tronador\",\"old\":\"metalpar\"}}','2','leochabur','DH\\Auditor\\User\\User','main','127.0.0.1','2021-07-17 12:54:54'),
 (2,'update','11',NULL,'352b3d369e235f14c672c21ba70111c5ce5d0679','{\"color\":{\"new\":\"rojo\",\"old\":null}}','2','leochabur','DH\\Auditor\\User\\User',NULL,NULL,'2021-07-17 12:56:39'),
 (3,'update','12',NULL,'f3617e3cca1d4d6d83ab6fc26d5c1912209a7308','{\"ploteo\":{\"new\":false,\"old\":true}}','2','leochabur','DH\\Auditor\\User\\User','main','127.0.0.1','2021-07-17 13:01:44'),
 (4,'update','11',NULL,'0fe24337b0446bddf341cb7d1894420acdd4ef32','{\"ploteo\":{\"new\":true,\"old\":false},\"carteleraElectronica\":{\"new\":true,\"old\":false},\"pcABordo\":{\"new\":true,\"old\":false}}','2','leochabur','DH\\Auditor\\User\\User','main','127.0.0.1','2021-07-17 13:02:09'),
 (5,'update','4',NULL,'b2bec93549ac8f388eba4daf369db4c079a5227b','{\"estructuraHabitual\":{\"new\":{\"id\":5,\"class\":\"AppBundle\\\\Entity\\\\Estructura\",\"label\":\"Operacion Rojas\",\"table\":\"security_estructuras\"},\"old\":{\"id\":1,\"class\":\"AppBundle\\\\Entity\\\\Estructura\",\"label\":\"Operacion Campana\",\"table\":\"security_estructuras\"}}}','2','leochabur','DH\\Auditor\\User\\User','main','127.0.0.1','2021-07-17 14:44:10');
INSERT INTO `seg_vial_unidades_audit` (`id`,`type`,`object_id`,`discriminator`,`transaction_hash`,`diffs`,`blame_id`,`blame_user`,`blame_user_fqdn`,`blame_user_firewall`,`ip`,`created_at`) VALUES 
 (6,'update','4',NULL,'4a6fc71c5d6dff352ad59b4bae30541d61e6e5e9','{\"tipoUnidad\":{\"new\":{\"id\":1,\"class\":\"GestionBundle\\\\Entity\\\\segVial\\\\opciones\\\\TipoUnidad\",\"label\":\"COMBI\",\"table\":\"seg_vial_opciones_tipo_unidad\"},\"old\":{\"id\":5,\"class\":\"GestionBundle\\\\Entity\\\\segVial\\\\opciones\\\\TipoUnidad\",\"label\":\"URBANO\",\"table\":\"seg_vial_opciones_tipo_unidad\"}}}','2','leochabur','DH\\Auditor\\User\\User','main','127.0.0.1','2021-07-17 23:43:47'),
 (7,'update','4',NULL,'00f15231a94a07a519537e47eb28830984359ce5','{\"dominio\":{\"new\":\"ae203yj\",\"old\":\"KCS293\"}}','2','leochabur','DH\\Auditor\\User\\User','main','127.0.0.1','2021-07-17 23:44:39'),
 (8,'update','6',NULL,'f7db70d5c5cb7412943eb56c5d4fdaf7ae504215','{\"dominio\":{\"new\":\"PLH973t\",\"old\":\"plh973\"}}','2','leochabur','DH\\Auditor\\User\\User','main','127.0.0.1','2021-07-18 11:47:18'),
 (9,'update','4',NULL,'a287c35a969e8eab8436304962f6f9fa52cb9df4','{\"estructuraHabitual\":{\"new\":{\"id\":4,\"class\":\"AppBundle\\\\Entity\\\\Estructura\",\"label\":\"Operacion Giles\",\"table\":\"security_estructuras\"},\"old\":{\"id\":5,\"class\":\"AppBundle\\\\Entity\\\\Estructura\",\"label\":\"Operacion Rojas\",\"table\":\"security_estructuras\"}}}','2','leochabur','DH\\Auditor\\User\\User','main','127.0.0.1','2021-07-18 11:48:38');
INSERT INTO `seg_vial_unidades_audit` (`id`,`type`,`object_id`,`discriminator`,`transaction_hash`,`diffs`,`blame_id`,`blame_user`,`blame_user_fqdn`,`blame_user_firewall`,`ip`,`created_at`) VALUES 
 (10,'update','4',NULL,'a1318ebddcde7ddfc0cb734a3c58aac875281cb4','{\"carroceriaModelo\":{\"new\":\"tronador y rayos\",\"old\":\"tronador\"}}','2','leochabur','DH\\Auditor\\User\\User','main','127.0.0.1','2021-07-18 08:52:11'),
 (11,'update','4',NULL,'8f983c1843902b6ce9ec3b1bdb0ae710bbdbd545','{\"anioModelo\":{\"new\":2016,\"old\":2011}}','2','leochabur','DH\\Auditor\\User\\User','main','127.0.0.1','2021-07-18 08:52:32'),
 (12,'update','4',NULL,'5642a72b9e54300f9dacd773328316cd80b48191','{\"audioVideo\":{\"new\":true,\"old\":false},\"bar\":{\"new\":true,\"old\":false},\"estructuraHabitual\":{\"new\":{\"id\":2,\"class\":\"AppBundle\\\\Entity\\\\Estructura\",\"label\":\"Operacion SUR\",\"table\":\"security_estructuras\"},\"old\":{\"id\":4,\"class\":\"AppBundle\\\\Entity\\\\Estructura\",\"label\":\"Operacion Giles\",\"table\":\"security_estructuras\"}}}','2','leochabur','DH\\Auditor\\User\\User','main','127.0.0.1','2021-07-31 10:44:11'),
 (13,'update','12',NULL,'d339e86c1ec9d5a770b10a0809b77b99b4613a9a','{\"estructuraHabitual\":{\"new\":{\"id\":5,\"class\":\"AppBundle\\\\Entity\\\\Estructura\",\"label\":\"Operacion Rojas\",\"table\":\"security_estructuras\"},\"old\":{\"id\":1,\"class\":\"AppBundle\\\\Entity\\\\Estructura\",\"label\":\"Operacion Campana\",\"table\":\"security_estructuras\"}}}','3','admin','DH\\Auditor\\User\\User','main','127.0.0.1','2021-07-31 11:37:08');
INSERT INTO `seg_vial_unidades_audit` (`id`,`type`,`object_id`,`discriminator`,`transaction_hash`,`diffs`,`blame_id`,`blame_user`,`blame_user_fqdn`,`blame_user_firewall`,`ip`,`created_at`) VALUES 
 (14,'update','12',NULL,'cc8481cf8628407549bf93b93bb4d1cd0a0befd4','{\"carroceriaModelo\":{\"new\":\"tronador mta\",\"old\":\"tronador\"},\"capacidadReal\":{\"new\":44,\"old\":34},\"anioModelo\":{\"new\":2020,\"old\":2023},\"estructuraActual\":{\"new\":{\"id\":5,\"class\":\"AppBundle\\\\Entity\\\\Estructura\",\"label\":\"Operacion Rojas\",\"table\":\"security_estructuras\"},\"old\":{\"id\":1,\"class\":\"AppBundle\\\\Entity\\\\Estructura\",\"label\":\"Operacion Campana\",\"table\":\"security_estructuras\"}}}','2','leochabur','DH\\Auditor\\User\\User','main','127.0.0.1','2021-07-31 12:06:16'),
 (15,'update','12',NULL,'7b168a416e72861ab8154cca46a283a640b529b1','{\"tipoUnidad\":{\"new\":{\"id\":12,\"class\":\"GestionBundle\\\\Entity\\\\segVial\\\\opciones\\\\TipoUnidad\",\"label\":\"MOTONETA\",\"table\":\"seg_vial_opciones_tipo_unidad\"},\"old\":{\"id\":6,\"class\":\"GestionBundle\\\\Entity\\\\segVial\\\\opciones\\\\TipoUnidad\",\"label\":\"ARTICULADO\",\"table\":\"seg_vial_opciones_tipo_unidad\"}}}','2','leochabur','DH\\Auditor\\User\\User','main','127.0.0.1','2021-07-31 15:49:28'),
 (16,'update','12',NULL,'a2cfed35e746742a152271020756a1f21699119a','{\"chasisModelo\":{\"new\":\"of 1517 lp\",\"old\":\"of 1517\"},\"chasisNumero\":{\"new\":\"9088djjasdas\",\"old\":\"9088djj\"},\"carroceriaMarca\":{\"new\":\"saldivia rosario\",\"old\":\"saldivia\"},\"carroceriaModelo\":{\"new\":\"tronador mta bis\",\"old\":\"tronador mta\"},\"capacidadCNRT\":{\"new\":40,\"old\":43},\"motorMarca\":{\"new\":\"mercedes bens\",\"old\":\"mercedes benz\"},\"motorNumero\":{\"new\":\"1234567\",\"old\":\"fsdgsgsgsg\"},\"consumo\":{\"new\":22,\"old\":34},\"audioVideo\":{\"new\":false,\"old\":true},\"banio\":{\"new\":false,\"old\":true},\"bar\":{\"new\":false,\"old\":true},\"fechaInscripcion\":{\"new\":\"2021-07-02\",\"old\":\"2021-07-08\"},\"anioModelo\":{\"new\":2019,\"old\":2020},\"color\":{\"new\":\"anaranjadito\",\"old\":\"anaranjado\"},\"ploteo\":{\"new\":true,\"old\":false},\"carteleraElectronica\":{\"new\":false,\"old\":true},\"capacidadTanque\":{\"new\":22,\"old\":34},\"cantidadTanques\":{\"new\":1,\"old\":2},\"pcABordo\":{\"new\":false,\"old\":true},\"tipoMotor\":{\"new\":{\"id\":2,\"class\":\"GestionBundle\\\\Entity\\\\segVial\\\\opciones\\\\TipoMotor\",\"label\":\"TRACERO\",\"table\":\"seg_vial_opciones_tipo_motor\"},\"old\":{\"id\":3,\"class\":\"GestionBundle\\\\Entity\\\\segVial\\\\opciones\\\\TipoMotor\",\"label\":\"AL DIOME\",\"table\":\"seg_vial_opciones_tipo_motor\"}},\"calidadUnidad\":{\"new\":{\"id\":2,\"class\":\"GestionBundle\\\\Entity\\\\segVial\\\\opciones\\\\CalidadUnidad\",\"label\":\"CAMA\",\"table\":\"seg_vialopciones_calidad_unidad\"},\"old\":{\"id\":1,\"class\":\"GestionBundle\\\\Entity\\\\segVial\\\\opciones\\\\CalidadUnidad\",\"label\":\"SEMI CAMA MIX\",\"table\":\"seg_vialopciones_calidad_unidad\"}},\"radicacion\":{\"new\":{\"id\":13,\"class\":\"GestionBundle\\\\Entity\\\\ventas\\\\Provincia\",\"label\":\"Chubut\",\"table\":\"ventas_provincia\"},\"old\":{\"id\":2,\"class\":\"GestionBundle\\\\Entity\\\\ventas\\\\Provincia\",\"label\":\"Buenos Aires\",\"table\":\"ventas_provincia\"}}}','2','leochabur','DH\\Auditor\\User\\User','main','127.0.0.1','2021-07-31 15:52:21');
INSERT INTO `seg_vial_unidades_audit` (`id`,`type`,`object_id`,`discriminator`,`transaction_hash`,`diffs`,`blame_id`,`blame_user`,`blame_user_fqdn`,`blame_user_firewall`,`ip`,`created_at`) VALUES 
 (17,'update','12',NULL,'1f31e9d5efb16550db9dc78a6fbeee6cc53e7c1f','{\"imagen\":{\"new\":\"uploads\\/activos\\/internos\\/124-6\\/6106fede76b2a.png\",\"old\":\"uploads\\/activos\\/internos\\/124-6\\/60f0c0fe2648d.jpeg\"}}','2','leochabur','DH\\Auditor\\User\\User','main','127.0.0.1','2021-08-01 17:06:54'),
 (18,'update','12',NULL,'6b151c83d2418d68d63e91cdfc038bcc598f8cfb','{\"anioModelo\":{\"new\":2021,\"old\":2019}}','2','leochabur','DH\\Auditor\\User\\User','main','127.0.0.1','2021-08-01 17:07:54'),
 (19,'update','12',NULL,'78f89156ba8e90118eb9fbc5276c61febc7b3a96','{\"estructuraHabitual\":{\"new\":{\"id\":4,\"class\":\"AppBundle\\\\Entity\\\\Estructura\",\"label\":\"Operacion Giles\",\"table\":\"security_estructuras\"},\"old\":{\"id\":5,\"class\":\"AppBundle\\\\Entity\\\\Estructura\",\"label\":\"Operacion Rojas\",\"table\":\"security_estructuras\"}}}','2','leochabur','DH\\Auditor\\User\\User','main','127.0.0.1','2021-08-01 17:08:33'),
 (20,'update','4',NULL,'ba4afec86adf12b57e3e10265cc049db66ad44cd','{\"imagen\":{\"new\":\"uploads\\/activos\\/internos\\/103-6\\/6111becd5a8f0.jpeg\",\"old\":\"uploads\\/activos\\/internos\\/103-6\\/60f1f7a74aa3f.jpeg\"}}','2','leochabur','DH\\Auditor\\User\\User','main','127.0.0.1','2021-08-09 20:48:29');
/*!40000 ALTER TABLE `seg_vial_unidades_audit` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vial_unidades_tipos_vencimientos`
--

DROP TABLE IF EXISTS `seg_vial_unidades_tipos_vencimientos`;
CREATE TABLE `seg_vial_unidades_tipos_vencimientos` (
  `id_unidad` int(11) NOT NULL,
  `id_tipo_vto` int(11) NOT NULL,
  PRIMARY KEY (`id_unidad`,`id_tipo_vto`),
  KEY `IDX_E3E71E35D5D165C2` (`id_unidad`),
  KEY `IDX_E3E71E3546C183D0` (`id_tipo_vto`),
  CONSTRAINT `FK_E3E71E3546C183D0` FOREIGN KEY (`id_tipo_vto`) REFERENCES `seg_vial_opciones_tipo_vto_unidad` (`id`),
  CONSTRAINT `FK_E3E71E35D5D165C2` FOREIGN KEY (`id_unidad`) REFERENCES `seg_vial_unidades` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vial_unidades_tipos_vencimientos`
--

/*!40000 ALTER TABLE `seg_vial_unidades_tipos_vencimientos` DISABLE KEYS */;
INSERT INTO `seg_vial_unidades_tipos_vencimientos` (`id_unidad`,`id_tipo_vto`) VALUES 
 (4,2);
/*!40000 ALTER TABLE `seg_vial_unidades_tipos_vencimientos` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`seg_vialeventos_tipo_infraccion`
--

DROP TABLE IF EXISTS `seg_vialeventos_tipo_infraccion`;
CREATE TABLE `seg_vialeventos_tipo_infraccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vialeventos_tipo_infraccion`
--

/*!40000 ALTER TABLE `seg_vialeventos_tipo_infraccion` DISABLE KEYS */;
INSERT INTO `seg_vialeventos_tipo_infraccion` (`id`,`tipo`) VALUES 
 (1,'Exceso velocidad'),
 (2,'conducir sin cinturon'),
 (3,'conducir ebrio'),
 (4,'conducir dado vuelta');
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
-- Table structure for table `traficov2`.`seg_vialopciones_marca_chasis`
--

DROP TABLE IF EXISTS `seg_vialopciones_marca_chasis`;
CREATE TABLE `seg_vialopciones_marca_chasis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D708E7ED70A0113` (`marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`seg_vialopciones_marca_chasis`
--

/*!40000 ALTER TABLE `seg_vialopciones_marca_chasis` DISABLE KEYS */;
/*!40000 ALTER TABLE `seg_vialopciones_marca_chasis` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`system_documentos_adjuntos`
--

DROP TABLE IF EXISTS `system_documentos_adjuntos`;
CREATE TABLE `system_documentos_adjuntos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `id_unidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AC3E78BEFB0D0145` (`id_tipo`),
  KEY `IDX_AC3E78BED5D165C2` (`id_unidad`),
  CONSTRAINT `FK_AC3E78BED5D165C2` FOREIGN KEY (`id_unidad`) REFERENCES `seg_vial_unidades` (`id`),
  CONSTRAINT `FK_AC3E78BEFB0D0145` FOREIGN KEY (`id_tipo`) REFERENCES `seg_vial_opciones_tipo_vto_documento_adjunto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`system_documentos_adjuntos`
--

/*!40000 ALTER TABLE `system_documentos_adjuntos` DISABLE KEYS */;
INSERT INTO `system_documentos_adjuntos` (`id`,`imagen`,`id_tipo`,`id_unidad`) VALUES 
 (11,'uploads/activos/internos/103-6/documentos/611460d9ce6af.jpeg',3,4),
 (12,'uploads/activos/internos/103-6/documentos/611460e45ec2f.jpeg',4,4);
/*!40000 ALTER TABLE `system_documentos_adjuntos` ENABLE KEYS */;


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`trafico_servicios`
--

/*!40000 ALTER TABLE `trafico_servicios` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`trafico_turnos`
--

/*!40000 ALTER TABLE `trafico_turnos` DISABLE KEYS */;
/*!40000 ALTER TABLE `trafico_turnos` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`ventas_ciudad`
--

DROP TABLE IF EXISTS `ventas_ciudad`;
CREATE TABLE `ventas_ciudad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_provincia` int(11) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `latitud` decimal(15,12) NOT NULL,
  `longitud` decimal(15,12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DB8A58E853AF4E34` (`id_provincia`),
  CONSTRAINT `FK_DB8A58E853AF4E34` FOREIGN KEY (`id_provincia`) REFERENCES `ventas_provincia` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`ventas_ciudad`
--

/*!40000 ALTER TABLE `ventas_ciudad` DISABLE KEYS */;
INSERT INTO `ventas_ciudad` (`id`,`nombre`,`id_provincia`,`activo`,`latitud`,`longitud`) VALUES 
 (1,'Zarate',2,1,'0.000000000000','0.000000000000'),
 (2,'Campana',2,1,'0.000000000000','0.000000000000'),
 (3,'Azul',2,1,'0.000000000000','0.000000000000'),
 (4,'Longchamp',2,1,'0.000000000000','0.000000000000'),
 (5,'Brandsen',2,1,'-33.890631000000','-59.490792000000'),
 (6,'loma verde',2,1,'-33.506742000000','-58.793160000000'),
 (7,'Ranchos',2,1,'-34.127416000000','-59.298531000000'),
 (8,'La Plata',2,1,'-34.928424000000','-57.952706000000'),
 (9,'colon',6,1,'-32.228754000000','-58.139473000000'),
 (10,'Jeppener',2,1,'-33.831332000000','-59.628121000000');
/*!40000 ALTER TABLE `ventas_ciudad` ENABLE KEYS */;


--
-- Table structure for table `traficov2`.`ventas_ciudades_estructuras`
--

DROP TABLE IF EXISTS `ventas_ciudades_estructuras`;
CREATE TABLE `ventas_ciudades_estructuras` (
  `id_ciudad` int(11) NOT NULL,
  `id_estructura` int(11) NOT NULL,
  PRIMARY KEY (`id_ciudad`,`id_estructura`),
  KEY `IDX_A43F6D79A8B1B073` (`id_ciudad`),
  KEY `IDX_A43F6D79FFABC0C8` (`id_estructura`),
  CONSTRAINT `FK_A43F6D79A8B1B073` FOREIGN KEY (`id_ciudad`) REFERENCES `ventas_ciudad` (`id`),
  CONSTRAINT `FK_A43F6D79FFABC0C8` FOREIGN KEY (`id_estructura`) REFERENCES `security_estructuras` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`ventas_ciudades_estructuras`
--

/*!40000 ALTER TABLE `ventas_ciudades_estructuras` DISABLE KEYS */;
INSERT INTO `ventas_ciudades_estructuras` (`id_ciudad`,`id_estructura`) VALUES 
 (1,1),
 (1,2),
 (1,3),
 (1,4),
 (1,5),
 (4,1),
 (4,2),
 (4,3),
 (4,4),
 (4,5),
 (5,1),
 (5,3),
 (5,4),
 (6,1),
 (6,3),
 (6,4),
 (6,5),
 (7,1),
 (7,3),
 (7,4),
 (8,1),
 (8,3),
 (8,4),
 (8,5),
 (9,1),
 (9,3),
 (9,4),
 (9,5),
 (10,1),
 (10,2),
 (10,3),
 (10,4),
 (10,5);
/*!40000 ALTER TABLE `ventas_ciudades_estructuras` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`ventas_clientes`
--

/*!40000 ALTER TABLE `ventas_clientes` DISABLE KEYS */;
INSERT INTO `ventas_clientes` (`id`,`razonSocial`,`nombreFantasia`,`prefijo`,`domicilioFiscal`,`cuit`,`responsabilidad`,`condicionPago`,`tipo_factura`,`tipo_ajuste`,`frecuenca_ajuste`,`nombreContacto`,`telefonoContacto`,`celularContacto`,`mailContacto`,`cargoContacto`,`activo`) VALUES 
 (1,'toyota sa','tasa','tyt','zarate','30-70986951-1','INSC',7,'A','APC','LIB',NULL,NULL,NULL,NULL,NULL,0),
 (2,'PAPELERA DEL PLATA','PAPELERA DEL PLATENTES SA','PDP','ZARATE','30-21233652-0','NOINSC',0,NULL,'FADEEAC','SEM','CHABUR LEONARDO','02223 444640','LEO','LEO@GMAIL.com','CAPANGA',0),
 (4,'miralejos sacifia','sapucai domselaar','sap','ruta 210 km 69','15-32655662-2','INSC',123,NULL,'POL','CUAT','CHABUR LEONARDO','02223 444640','LEO','LEO@GMAIL.com','CAPANGA',0),
 (7,'empresa de transporte santa rita srl','santa','sta','123213213','13-12321321-3','INSC',1233,'A','POL','CUAT',NULL,NULL,NULL,NULL,NULL,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traficov2`.`ventas_ubicacion_estructura`
--

/*!40000 ALTER TABLE `ventas_ubicacion_estructura` DISABLE KEYS */;
INSERT INTO `ventas_ubicacion_estructura` (`id`,`id_ciudad`,`id_estructura`,`id_cliente`,`latitud`,`longitud`) VALUES 
 (1,1,1,2,'35.000000000000','456.000000000000'),
 (2,1,2,2,'34.000000000000','55.000000000000'),
 (3,1,3,2,'55.000000000000','44.000000000000'),
 (4,1,1,1,'-34.173000000000','-59.018000000000'),
 (5,1,4,4,'-35.343000000000','-78.133000000000'),
 (6,1,1,4,'-20.553000000000','23.879000000000'),
 (7,1,1,4,'-33.977000000000','-60.524000000000'),
 (8,1,1,4,'-34.282000000000','-60.117000000000'),
 (9,1,1,7,'12.312300000000','12.312321300000');
/*!40000 ALTER TABLE `ventas_ubicacion_estructura` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
