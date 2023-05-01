create database prueba;
use prueba ;

CREATE TABLE usuarios (
  id INT(11) NOT NULL AUTO_INCREMENT,
  usuario VARCHAR(50) NOT NULL,
  contrasena VARCHAR(50) NOT NULL,
  nivel VARCHAR(50) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO usuarios (usuario, contrasena, nivel) VALUES ('admin', '123456', 'administrador');
INSERT INTO usuarios (usuario, contrasena, nivel) VALUES ('especialista', 'abcdef', 'especialista psiquiátrico');
INSERT INTO usuarios (usuario, contrasena, nivel) VALUES ('paciente', 'qwerty', 'paciente');


select * from usuarios;