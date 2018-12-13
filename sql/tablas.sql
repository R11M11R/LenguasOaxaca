

-- Volcando estructura de base de datos para lenguas
DROP DATABASE IF EXISTS `lenguas`;
CREATE DATABASE IF NOT EXISTS `lenguas` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `lenguas`;

-- Volcando estructura para tabla lenguas.agrupacion_linguistica
DROP TABLE IF EXISTS `agrupacion_linguistica`;
CREATE TABLE IF NOT EXISTS `agrupacion_linguistica` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `id_familia_linguistica` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Volcando estructura para tabla lenguas.clasificacion
DROP TABLE IF EXISTS `clasificacion`;
CREATE TABLE IF NOT EXISTS `clasificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Volcando estructura para tabla lenguas.estado
DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `clave` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  PRIMARY KEY (`clave`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Volcando estructura para tabla lenguas.familia_linguistica
DROP TABLE IF EXISTS `familia_linguistica`;
CREATE TABLE IF NOT EXISTS `familia_linguistica` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- Volcando estructura para tabla lenguas.localidad
DROP TABLE IF EXISTS `localidad`;
CREATE TABLE IF NOT EXISTS `localidad` (
  `clave` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `id_variante_linguistica` int(11) NOT NULL,
  PRIMARY KEY (`clave`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando estructura para tabla lenguas.municipio
DROP TABLE IF EXISTS `municipio`;
CREATE TABLE IF NOT EXISTS `municipio` (
  `clave` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`clave`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Volcando estructura para tabla lenguas.palabras
DROP TABLE IF EXISTS `palabras`;
CREATE TABLE IF NOT EXISTS `palabras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `escritura` varchar(60) DEFAULT NULL,
  `pronunciacion` varchar(60) DEFAULT NULL,
  `ruta_imagen` varchar(100) NOT NULL,
  `id_localidad` int(11) NOT NULL,
  `id_clasificacion` int(11) NOT NULL,
  `id_significado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Volcando estructura para tabla lenguas.significado
DROP TABLE IF EXISTS `significado`;
CREATE TABLE IF NOT EXISTS `significado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `escritura` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- Volcando estructura para tabla lenguas.variante_linguistica
DROP TABLE IF EXISTS `variante_linguistica`;
CREATE TABLE IF NOT EXISTS `variante_linguistica` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  `id_agrupacion_linguistica` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;








--Consultas

SELECT p.id,p.escritura,p.pronunciacion,s.escritura FROM palabras as p inner join significado as s on p.id_significado=s.id;

SELECT p.id,p.escritura,p.pronunciacion,s.escritura, l.descripcion FROM palabras as p inner join significado as s on p.id_significado=s.id inner join localidad as l on p.id_localidad=l.clave;
-- 
SELECT p.id,p.escritura,p.pronunciacion,s.escritura as significado, l.descripcion as localidad ,c.descripcion as clasificacion FROM palabras as p inner join significado as s on p.id_significado=s.id inner join localidad as l on p.id_localidad=l.clave inner join clasificacion as c on p.id_clasificacion=c.id;





