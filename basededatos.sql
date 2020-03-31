

drop database ecomerce;

create database ecomerce;

/*ÉSTA SENTENCIA ME SOLUCIONÓ UN ERROR AL INTENTAR ACCEDER DESDE EL LARAVEL LA BD*/
/*CREATE USER 'root'@'localhost' IDENTIFIED BY 'rob';
GRANT ALL PRIVILEGES ON ecomerce. * TO 'root'@'localhost';
FLUSH PRIVILEGES;*/
/*HABILITAR USUARIO ADMINISTRADOR luego de haberlo creado con email = admin@admin.com*/
/*UPDATE usuarios
SET
    isAdmin = true,
    validado = true
WHERE
    email = 'admin@admin.com';	*/

use ecomerce;

/*CREAMOS LA TABLA CATEGORIAS*/
create table categorias(
	catId 			int auto_increment primary key,
	catNombre 		varchar(40),
	catDescripcion  varchar(50),
	catImagen       varchar(100)

);

/*CREACION DE LA TABLA MARCAS*/
create table marcas(
	marId			int auto_increment primary key,
    marNombre		varchar(40)
);


/*CREACION DE LA TABLA CARRITOS*/
create table carritos(
	carId			int primary key not null unique,
    carIdProducto	int not null,
    carCantidadPrd  int not null
);

/*CREACION DE LA TABLA EMPRESAS*/
create table empresas(
	empId			int auto_increment primary key,
    empCuil			varchar(15) not null,
    empNombre		varchar(40)
);

/*CREACION DE TABLA USUARIOS*/
create table usuarios(
	created_at DATE,
	updated_at date,
	usrId				int auto_increment primary key,
    nombre			varchar(40),
    apellido			varchar(40),
    email varchar(40),
    celular			varchar(40),
    fechaNacimiento	date,
    usrIdEmpresa		int,
    cuilEmpresa      varchar(15),
    password			varchar(150),
    avatar			varchar(100),
    remember_token VARCHAR(100) NULL,
    validado boolean,/*por agregar*/
    isAdmin boolean,
    foreign key (usrIdEmpresa) references empresas(empId)
);

/*CREACION DE LA TABLA PRODUCTOS*/
create table productos(
	prdId			int auto_increment primary key,
    prdNombre		varchar(40),
    prdDescripcion	varchar(200),
    prdPrecio		float,
    prdIdCategoria	int,
    prdIdMarca		int,
    prdIdUsuario	int,
    prdImagen		varchar(100),
    prdStock        int,
    eliminado       boolean,
    foreign key (prdIdCategoria) references categorias(catId),
    foreign key (prdIdMarca) references marcas(marId),
    foreign key (prdIdUsuario) references usuarios(usrId)

);

drop table carritos;

create table carritos(
	carId				int auto_increment primary key not null unique,
    carIdProducto		int not null,
    carUsuarios_usrId	int not null,
    carCantidadPrd      int not null,
    foreign key (carUsuarios_usrId) references usuarios(usrId)
);
/*CREACIOS DE TABLA INTERMEDIA VENTAS PRODUCTOS-USUARIOS*/
create table ventas(
    created_at DATE,
	updated_at date,
	venId			int auto_increment primary key,
    venIdProducto	int,
    venStock      int,
    venIdVendedor	int,
    venIdComprador    int,
    foreign key (venIdProducto) references productos(prdId),
    foreign key (venIdVendedor) references usuarios(usrId),
    foreign key (venIdComprador) references usuarios(usrId)
);

/*CREACIÓN DE VARIAS MARCAS*/

insert into marcas(marNombre) value('Samsung');
insert into marcas(marNombre) value('Xiaomi');
insert into marcas(marNombre) value('Apple');
insert into marcas(marNombre) value('Oster');
insert into marcas(marNombre) value('Patrick');
insert into marcas(marNombre) value('Quicksilver');
insert into marcas(marNombre) value('Zara');
insert into marcas(marNombre) value('JBL');
insert into marcas(marNombre) value('Adidas');
insert into marcas(marNombre) value('Otras marcas');

/*CREACION DE VARIAS CATEGORIAS*/
insert into categorias(catNombre, catDescripcion, catImagen)
    values('Tecnología', 'Cualquier equipo tecnológico que quieras comprar', 'cateroria_tecnologia.png');
insert into categorias(catNombre, catDescripcion, catImagen)
  values('Vestimenta', 'Cualquier ropa o calzado que quieras comprar', 'cateroria_vestimenta.png');
insert into categorias(catNombre, catDescripcion, catImagen)
    values('Hogar', 'Todo para el hogar', 'otros_01.png'
);
insert into categorias(catNombre, catDescripcion, catImagen)
    values('Otros + Servicios', 'Otros productos mas servicios ofrecidos', 'cateroria_otros.png'
);










