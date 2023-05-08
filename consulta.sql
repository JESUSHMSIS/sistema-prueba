CREATE DATABASE psiquiatric1;
USE psiquiatric1;


create table trastorno_fobia(
	cod_fob INT auto_increment PRIMARY KEY NOT NULL,
	sintomas varchar(500) not null,
	nombre varchar(100) not null,
	descripcion varchar(200) not null
);

create table especialista(
	cod_esp varchar(10) not null primary key,
	nombre varchar(100) not null,
	app varchar(100) not null,
	apm varchar(100) not null,
	ci int not null,
	fecha_nac date not null,
	passEsp varchar(30),
  nivel int not null
);

create table medicacion(
	cod_medicacion INT auto_increment PRIMARY KEY NOT NULL,
	medicamento varchar(150) NOT NULL,
	cant_sem int not null,
	duracion varchar(10) not null,
	diario int not null,
	int_tiempo varchar(20) not null
	
);

CREATE TABLE  simulacion(
        cod_simulacion INT PRIMARY KEY NOT NULL,
        nombre  VARCHAR(10) NOT NULL,
        descripcion  VARCHAR(150) NOT NULL,
        tipo_de_simulacion  VARCHAR(20) NOT NULL,
	tiempo_simulacion DECIMAL(8.2) NOT NULL
);

CREATE TABLE paciente (
        cod_pac VARCHAR(10) PRIMARY KEY NOT NULL,
        nombres VARCHAR(100) NOT NULL,
        app VARCHAR(100) NOT NULL,
        apm VARCHAR(100) NOT NULL,
        ci INT NOT NULL,
        fecha_nac DATE NOT NULL,
	passPac VARCHAR(30) NOT NULL,
  nivel int not null
);

create table admin(
cod_admin varchar(10) PRIMARY KEY NOT NULL,
nombre varchar(100) NOT NULL,
app varchar(100) NOT NULL,
apm varchar(100) NOT NULL,
ci int NOT NULL,
fecha_nac date NOT NULL,
passAdmin varchar(30) NOT NULL,
nivel int not null
);


CREATE TABLE tratamiento (
        cod_tratamiento INT PRIMARY KEY NOT NULL,
        cod_simulacion INT NOT NULL,
        cod_medicacion INT NOT NULL,
        CONSTRAINT fk_codsim FOREIGN KEY (cod_simulacion) REFERENCES SIMULACION (cod_simulacion),
        CONSTRAINT fk_codmed FOREIGN KEY (cod_medicacion) REFERENCES MEDICACION (cod_medicacion)
);

CREATE TABLE detalle_pac_fob(
    cod_detalle varchar(8) not null primary key,
    cod_pac varchar(10) not null,
    cod_fob int not null,
    foreign key(cod_pac) references paciente(cod_pac),
    foreign key(cod_fob) references trastorno_fobia(cod_fob)
);

CREATE TABLE evaluacion(
cod_evaluacion int auto_increment PRIMARY KEY,
observaciones VARCHAR(500) NOT NULL,
estado VARCHAR(5) NOT NULL,

cod_tratamiento INT NOT NULL,
foreign key(cod_tratamiento) references tratamiento(cod_tratamiento),

cod_simulacion int not null,
foreign key(cod_simulacion) references simulacion(cod_simulacion),

cod_medicacion int null,
foreign key(cod_medicacion) references medicacion(cod_medicacion),

cod_pac varchar(10) not null,
foreign key(cod_pac) references paciente(cod_pac),

cod_fob int not null,
foreign key(cod_fob) references trastorno_fobia(cod_fob),

cod_esp varchar(10),
foreign key(cod_esp) references especialista(cod_esp)
);

CREATE TABLE historial(
cod_historial int auto_increment not null primary key,
cod_pac varchar(10) not null,
foreign key(cod_pac) references paciente(cod_pac),

cod_esp varchar(10) not null,
foreign key(cod_esp) references especialista(cod_esp),

cod_fob int not null,
foreign key(cod_fob) references trastorno_fobia(cod_fob),

cod_tratamiento int not null,
foreign key(cod_tratamiento) references tratamiento(cod_tratamiento),

cod_simulacion int not null,
foreign key(cod_simulacion) references simulacion(cod_simulacion),

cod_medicacion int null,
foreign key(cod_medicacion) references medicacion(cod_medicacion),

cod_evaluacion int not null,
foreign key(cod_evaluacion) references evaluacion(cod_evaluacion)
);

CREATE TABLE usuarios(
  num_usu INT auto_increment PRIMARY KEY,
  cod_usu VARCHAR(10),
  ci int,
  nivel int not null,
  password VARCHAR(30)
);


create table cita (
cod_cita INT auto_increment PRIMARY KEY NOT NULL,
asunto varchar(500) NOT NULL,
fechaProxima date NOT NULL,
fechaAct datetime NOT NULL,
lugar varchar(200)NOT NULL,
cod_pac varchar(10) not null,
foreign key(cod_pac) references paciente(cod_pac),
cod_esp varchar(10),
foreign key(cod_esp) references especialista(cod_esp)
);

--insertar valores///////////////////////////////////////////////////////////////////////////////
INSERT INTO paciente VALUES 
  ('Pa13182612', 'Sonia', 'Torrez', 'Monroy', 13182612, '1995-12-15', '11111', 3),
  ('Pa4009488', 'Juan', 'López', 'Gómez', '7654321', '1988-05-20', 'passwordx', 3);
INSERT INTO especialista VALUES 
  ('E1354612', 'Somar', 'Torrez', 'Monroy', 1325242, '1995-12-15', 'gato', 2),
  ('E4009411', 'Julio', 'López', 'Gómez', '765254', '1988-05-20', 'coco', 2);

INSERT INTO admin VALUES 
  ('A1', 'Administrador', 'primero', 'Unico', 1234567, '1995-12-15', '000000', 1);
  
INSERT INTO usuarios(cod_usu, ci, password, nivel)
SELECT cod_esp, ci, passEsp, nivel FROM especialista;

INSERT INTO usuarios(cod_usu, ci, password, nivel)
SELECT cod_pac, ci, passPac, nivel FROM paciente;

INSERT INTO usuarios (cod_usu, ci, password, nivel)
SELECT cod_admin, ci, passAdmin, nivel password FROM admin;

select * from usuarios;