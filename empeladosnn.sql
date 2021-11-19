/*En el caso de empleados-departamentos n:n*/

CREATE DATABASE empleadosnn;
USE empleadosnn;
CREATE TABLE empleado
(dni  VARCHAR(9),
 nombre_e VARCHAR(40),
 fec_nac DATE);
CREATE TABLE departamento
(nombre_d VARCHAR(40));
CREATE TABLE emple_depart
(dni  VARCHAR(9),nombre_d VARCHAR(40), fecha_ini date, fecha_fin date);
ALTER TABLE empleado ADD CONSTRAINT pk_dni
PRIMARY KEY (dni);
ALTER TABLE departamento ADD CONSTRAINT pk_nombre_d
PRIMARY KEY (nombre_d);
ALTER TABLE emple_depart ADD CONSTRAINT pk_dni_nombre_d
PRIMARY KEY (dni,nombre_d,fecha_ini);
ALTER TABLE emple_depart ADD CONSTRAINT fk_dni
FOREIGN KEY (dni) REFERENCES empleado(dni);
ALTER TABLE emple_depart ADD CONSTRAINT fk_nombre_d
FOREIGN KEY (nombre_d) REFERENCES departamento(nombre_d);

/*Damos de alta un departamento, porque para luego meter un departamento en un empleado tiene que estar creado.*/
INSERT INTO departamento (nombre_d) VALUES ("CONTABILIDAD");

INSERT INTO empleado (dni,nombre_e,fec_nac) 
VALUES ("12345678A","Juan Pablo Gonzalez","01-01-21");