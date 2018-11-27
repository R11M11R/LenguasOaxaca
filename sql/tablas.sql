CREATE TABLE Estado (
  clave INT(11) NOT NULL PRIMARY KEY,
  descripcion VARCHAR (60)
);
CREATE TABLE Municipio (
  clave INT(11) NOT NULL PRIMARY KEY,
  descripcion VARCHAR (60)
);
CREATE TABLE Localidad (
  clave INT(11) NOT NULL PRIMARY KEY,
  descripcion VARCHAR (60)
);

CREATE TABLE FamiliaLinguistica (
  id INT(11) NOT NULL PRIMARY KEY,
  descripcion VARCHAR (60)
);

CREATE TABLE AgrupacionLinguistica (
  id INT(11) NOT NULL PRIMARY KEY,
  descripcion VARCHAR (60)
);

CREATE TABLE VarianteLinguistica (
  id INT(11) NOT NULL PRIMARY KEY,
  descripcion VARCHAR (60),
  id_FamiliaLinguistica INT(11) NOT NULL REFERENCES FamiliaLinguistica (id),
  id_AgrupacionLinguistica INT(11) NOT NULL REFERENCES AgrupacionLinguistica (id)
);

CREATE TABLE Idioma (
  id INT(11) NOT NULL PRIMARY KEY,
  escritura VARCHAR (60),
  pronunciacion VARCHAR (60), --Ruta del audio
  id_localidad INT(11) NOT NULL REFERENCES Localidad (id),
  id_VarianteLinguistica INT(11) NOT NULL REFERENCES VarianteLinguistica (id)  
);





