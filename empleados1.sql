/*En el caso de empleados-departamentos 1:1*/
CREATE DATABASE empleados1n;

USE empleados1n;

CREATE TABLE empleado 
(dni VARCHAR(9),
nombre_e VARCHAR(40),
fecha_nac DATE,
nombre_d VARCHAR(40));

CREATE TABLE departamento 
(nombre_d VARCHAR(40));

/*MODIFICAMOS PARA AÑADIR PK, FK*/
ALTER TABLE empleado ADD CONSTRAINT
pk_dni PRIMARY KEY (dni);

ALTER TABLE departamento ADD CONSTRAINT 
pk_nombre_d PRIMARY KEY (nombre_d);

/*references dice de que tabla y campo viene esa fk*/
ALTER TABLE empleado ADD CONSTRAINT
fk_nombre_d FOREIGN KEY (nombre_d) REFERENCES departamento(nombre_d);