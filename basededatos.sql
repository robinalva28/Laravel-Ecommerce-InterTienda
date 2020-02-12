use ecommerce;

CREATE TABLE usuarios (
  id int(4) NOT NULL auto_increment,
  nombre varchar(25) NOT NULL,
  email varchar(50) NOT NULL,
  pass varchar(100) NOT NULL,
  avatar varchar(30),
  validado boolean,
  PRIMARY KEY(id));
  
INSERT INTO usuarios(id,nombre,email,pass, validado) 
values (default, 'Robinson' , 'robison@gmail.com', '12345',0);
  
