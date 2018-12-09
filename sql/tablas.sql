
CREATE TABLE IF NOT EXISTS estado (
 clave INT(11) NOT NULL PRIMARY KEY,
 descripcion VARCHAR (60) NOT NULL
);
CREATE TABLE IF NOT EXISTS municipio (
 clave INT(11) NOT NULL PRIMARY KEY,
 descripcion VARCHAR (60) NOT NULL,
 id_estado INT(11) NOT NULL REFERENCES estado (clave)
);

CREATE TABLE IF NOT EXISTS familia_linguistica (
 id INT(11) NOT NULL PRIMARY KEY,
 descripcion VARCHAR (60) NOT NULL
);
CREATE TABLE IF NOT EXISTS agrupacion_linguistica (
 id INT(11) NOT NULL PRIMARY KEY,
 descripcion VARCHAR (60) NOT NULL,
 id_familia_linguistica INT(11) NOT NULL REFERENCES familia_linguistica (id)
);
CREATE TABLE IF NOT EXISTS variante_linguistica (
 id INT(11) NOT NULL PRIMARY KEY,
 descripcion VARCHAR (60),
 id_agrupacion_linguistica INT(11) NOT NULL REFERENCES agrupacion_linguistica (id)
);


CREATE TABLE IF NOT EXISTS localidad (
 clave INT(11) NOT NULL PRIMARY KEY,
 descripcion VARCHAR (60) NOT NULL,
 id_municipio INT(11) NOT NULL REFERENCES municipio (clave),
 id_variante_linguistica INT(11) NOT NULL REFERENCES variante_linguistica (id)
);


CREATE TABLE IF NOT EXISTS clasificacion (
 id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
 descripcion VARCHAR (60) NOT NULL
);



CREATE TABLE IF NOT EXISTS significado (
 id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
 escritura VARCHAR (60)
);

CREATE TABLE IF NOT EXISTS palabras (
 id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
 escritura VARCHAR (60),
 pronunciacion VARCHAR (60),
 id_localidad INT(11) NOT NULL REFERENCES localidad (id),
 id_clasificacion INT(11) NOT NULL REFERENCES clasificacion (id),
 id_significado INT(11) NOT NULL REFERENCES significado (id) 
);






--Consultas

SELECT p.id,p.escritura,p.pronunciacion,s.escritura FROM palabras as p inner join significado as s on p.id_significado=s.id;

SELECT p.id,p.escritura,p.pronunciacion,s.escritura, l.descripcion FROM palabras as p inner join significado as s on p.id_significado=s.id inner join localidad as l on p.id_localidad=l.clave;
-- 
SELECT p.id,p.escritura,p.pronunciacion,s.escritura as significado, l.descripcion as localidad ,c.descripcion as clasificacion FROM palabras as p inner join significado as s on p.id_significado=s.id inner join localidad as l on p.id_localidad=l.clave inner join clasificacion as c on p.id_clasificacion=c.id;





