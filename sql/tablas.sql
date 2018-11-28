CREATE TABLE estado (
  clave INT(11) NOT NULL PRIMARY KEY,
  descripcion VARCHAR (60)
);
CREATE TABLE municipio (
  clave INT(11) NOT NULL PRIMARY KEY,
  descripcion VARCHAR (60),
  id_estado INT(11) NOT NULL REFERENCES estado (clave)
);
CREATE TABLE localidad (
  clave INT(11) NOT NULL PRIMARY KEY,
  descripcion VARCHAR (60),
  id_municipio INT(11) NOT NULL REFERENCES municipio (clave)
);

CREATE TABLE familia_linguistica (
  id INT(11) NOT NULL PRIMARY KEY,
  descripcion VARCHAR (60)
);

CREATE TABLE variante_linguistica (
  id INT(11) NOT NULL PRIMARY KEY,
  descripcion VARCHAR (60)
);

CREATE TABLE agrupacion_linguistica (
  id INT(11) NOT NULL PRIMARY KEY,
  descripcion VARCHAR (60),
  id_localidad INT(11) NOT NULL REFERENCES localidad (clave),
  id_familia_linguistica INT(11) NOT NULL REFERENCES familia_linguistica (id),
  id__variante_linguistica INT(11) NOT NULL REFERENCES variante_linguistica (id)
);

CREATE TABLE tipo (
  id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  titulo VARCHAR (60),
  tipo VARCHAR (60),
  clasificacion VARCHAR (60)
);

CREATE TABLE palabras (
  id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  escritura VARCHAR (60),
  pronunciacion VARCHAR (60), 
  significado VARCHAR (60), 
  id_localidad INT(11) NOT NULL REFERENCES localidad (id),
  id_tipo INT(11) NOT NULL REFERENCES tipo (id)  
);