use ecommerce;
CREATE USER 'root'@'localhost' IDENTIFIED BY 'rob';
GRANT ALL PRIVILEGES ON ecommerce. * TO 'root'@'localhost';
FLUSH PRIVILEGES;
CREATE TABLE usuario (
  usId int(5) NOT NULL auto_increment,
  usNombre varchar(15) NOT NULL,
  usApellido varchar(15) NOT NULL,
  usEmail varchar(50) NOT NULL,
  usPassword varchar(100) NOT NULL,
  usCelular numeric(15) NOT NULL,
  usAvatar varchar(30) NOT NULL,
  usValidado boolean,
  PRIMARY KEY(usId));
  
CREATE TABLE empresa (
	emId int(5) NOT null auto_increment,
    emCuil varchar(12),
    emNombre varchar(20),
    primary key(emId)
);

CREATE TABLE producto (
prId int(4)auto_increment Not Null,
prNombre varchar(15) not null,
prMarca varchar(15) not null,
prModelo varchar(15),
prDescripcion varchar(30) not null,
prPrecio numeric(10)not null,
primary key(prId)
);
  
  
INSERT INTO usuarios(id,nombre,email,pass, validado) 
values (default, 'Robinson' , 'robison@gmail.com', '12345',0);
  
