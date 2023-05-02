create database prueba;
use prueba ;

CREATE TABLE usuarios (
  id INT(11) NOT NULL AUTO_INCREMENT,
  usuario VARCHAR(50) NOT NULL,
  contrasena VARCHAR(50) NOT NULL,
  nivel VARCHAR(50) NOT NULL,
  PRIMARY KEY (id)
);

-- Tabla de pacientes
CREATE TABLE pacientes (
  id_paciente INT(11) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  fecha_nacimiento DATE NOT NULL,
  genero ENUM('M', 'F') NOT NULL,
  direccion VARCHAR(100) NOT NULL,
  telefono VARCHAR(20) NOT NULL,
  correo VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_paciente)
);

-- Tabla de historial
CREATE TABLE historial (
  id_historial INT(11) NOT NULL AUTO_INCREMENT,
  id_paciente INT(11) NOT NULL,
  id_usuario INT(11) NOT NULL,
  fecha DATE NOT NULL,
  diagnostico TEXT,
  tratamiento TEXT,
  medicamentos TEXT,
  notas_progreso TEXT,
  PRIMARY KEY (id_historial),
  FOREIGN KEY (id_paciente) REFERENCES pacientes(id_paciente) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE ON UPDATE CASCADE
);
INSERT INTO usuarios (usuario, contrasena, nivel) VALUES ('admin', '123456', 'administrador');
INSERT INTO usuarios (usuario, contrasena, nivel) VALUES ('especialista', 'abcdef', 'especialista psiquiátrico');
INSERT INTO usuarios (usuario, contrasena, nivel) VALUES ('paciente', 'qwerty', 'paciente');




select * from usuarios;
SELECT * FROM pacientes;

INSERT INTO pacientes (nombre, apellido, fecha_nacimiento, genero, direccion, telefono, correo)
VALUES ('Paco', 'Pepe', '2000-01-01', 'M', 'Calle Mentira 123', '555-1234', 'Paco.perez@example.com');


INSERT INTO historial (id_paciente, id_usuario, fecha, diagnostico, tratamiento, medicamentos, notas_progreso) 
VALUES (1, 2, '2023-05-02', 'Dolor de cabeza', 'Tomar ibuprofeno', 'Ibuprofeno 400mg', 'El dolor ha disminuido un poco');

SELECT * from historial;
