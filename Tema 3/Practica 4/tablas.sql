# creamos la nueva base de datos
CREATE DATABASE fotovoltaica;
USE fotovoltaica;

create table  MODULO( 
CODIGO smallint unsigned not null auto_increment, 
NOMBRE varchar(25) not null, 
DESCRIPCION		text, 
TENSION	float, 
CORRIENTE float, 
PRIMARY KEY(CODIGO) 
) ENGINE=INNODB;

create table  CAMPANIA(
CODIGO		smallint unsigned	not null auto_increment,
MODULO		smallint unsigned not null,
NOMBRE		varchar(25) not null,
FECHAINI  date, 
FECHAFIN	date,
PRIMARY KEY(CODIGO),
INDEX(MODULO),
FOREIGN KEY (MODULO) REFERENCES MODULO(CODIGO)
) ENGINE=INNODB;
