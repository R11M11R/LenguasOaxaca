


-- Volcando estructura de base de datos para lenguas
CREATE DATABASE IF NOT EXISTS `lenguas` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `lenguas`;

-- Volcando estructura para tabla lenguas.agrupacion_linguistica
CREATE TABLE IF NOT EXISTS `agrupacion_linguistica` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `id_familia_linguistica` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lenguas.agrupacion_linguistica: ~0 rows (aproximadamente)
DELETE FROM `agrupacion_linguistica`;
/*!40000 ALTER TABLE `agrupacion_linguistica` DISABLE KEYS */;
/*!40000 ALTER TABLE `agrupacion_linguistica` ENABLE KEYS */;

-- Volcando estructura para tabla lenguas.clasificacion
CREATE TABLE IF NOT EXISTS `clasificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lenguas.clasificacion: ~0 rows (aproximadamente)
DELETE FROM `clasificacion`;
/*!40000 ALTER TABLE `clasificacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `clasificacion` ENABLE KEYS */;

-- Volcando estructura para tabla lenguas.estado
CREATE TABLE IF NOT EXISTS `estado` (
  `clave` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  PRIMARY KEY (`clave`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lenguas.estado: ~0 rows (aproximadamente)
DELETE FROM `estado`;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;

-- Volcando estructura para tabla lenguas.familia_linguistica
CREATE TABLE IF NOT EXISTS `familia_linguistica` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lenguas.familia_linguistica: ~0 rows (aproximadamente)
DELETE FROM `familia_linguistica`;
/*!40000 ALTER TABLE `familia_linguistica` DISABLE KEYS */;
/*!40000 ALTER TABLE `familia_linguistica` ENABLE KEYS */;

-- Volcando estructura para tabla lenguas.imagen
CREATE TABLE IF NOT EXISTS `imagen` (
  `idimagen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  PRIMARY KEY (`idimagen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lenguas.imagen: ~0 rows (aproximadamente)
DELETE FROM `imagen`;
/*!40000 ALTER TABLE `imagen` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagen` ENABLE KEYS */;

-- Volcando estructura para tabla lenguas.localidad
CREATE TABLE IF NOT EXISTS `localidad` (
  `clave` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `id_variante_linguistica` int(11) NOT NULL,
  PRIMARY KEY (`clave`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lenguas.localidad: ~0 rows (aproximadamente)
DELETE FROM `localidad`;
/*!40000 ALTER TABLE `localidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `localidad` ENABLE KEYS */;

-- Volcando estructura para tabla lenguas.municipio
CREATE TABLE IF NOT EXISTS `municipio` (
  `clave` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`clave`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lenguas.municipio: ~0 rows (aproximadamente)
DELETE FROM `municipio`;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;

-- Volcando estructura para tabla lenguas.palabras
CREATE TABLE IF NOT EXISTS `palabras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `escritura` varchar(60) DEFAULT NULL,
  `pronunciacion` varchar(60) DEFAULT NULL,
  `id_localidad` int(11) NOT NULL,
  `id_clasificacion` int(11) NOT NULL,
  `id_significado` int(11) NOT NULL,
  `id_imagen` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lenguas.palabras: ~0 rows (aproximadamente)
DELETE FROM `palabras`;
/*!40000 ALTER TABLE `palabras` DISABLE KEYS */;
/*!40000 ALTER TABLE `palabras` ENABLE KEYS */;

-- Volcando estructura para tabla lenguas.significado
CREATE TABLE IF NOT EXISTS `significado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `escritura` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lenguas.significado: ~0 rows (aproximadamente)
DELETE FROM `significado`;
/*!40000 ALTER TABLE `significado` DISABLE KEYS */;
/*!40000 ALTER TABLE `significado` ENABLE KEYS */;

-- Volcando estructura para tabla lenguas.variante_linguistica
CREATE TABLE IF NOT EXISTS `variante_linguistica` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  `id_agrupacion_linguistica` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lenguas.variante_linguistica: ~0 rows (aproximadamente)
DELETE FROM `variante_linguistica`;
/*!40000 ALTER TABLE `variante_linguistica` DISABLE KEYS */;
/*!40000 ALTER TABLE `variante_linguistica` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;





--Consultas

SELECT p.id,p.escritura,p.pronunciacion,s.escritura FROM palabras as p inner join significado as s on p.id_significado=s.id;

SELECT p.id,p.escritura,p.pronunciacion,s.escritura, l.descripcion FROM palabras as p inner join significado as s on p.id_significado=s.id inner join localidad as l on p.id_localidad=l.clave;
-- 
SELECT p.id,p.escritura,p.pronunciacion,s.escritura as significado, l.descripcion as localidad ,c.descripcion as clasificacion FROM palabras as p inner join significado as s on p.id_significado=s.id inner join localidad as l on p.id_localidad=l.clave inner join clasificacion as c on p.id_clasificacion=c.id;





