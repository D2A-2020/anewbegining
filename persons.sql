-- drop schema aNewBigening;
create schema if not exists aNewBigining;
use aNewBigining;

create table if not exists Person(
	id int primary key AUTO_INCREMENT,
    ci int  unique key not null,
    `name`  varchar(16) not null,
    surname varchar(16)  not null,
    `password` varchar(50) unique key not null,
    email varchar(50) not null,
    civilStatus varchar(16) default null,
    sex  varchar(10) default null,
    birth date default null,
    phone varchar(12) default null,
    nationality varchar(20)  default null,
    healthCard boolean default null, 
    carLicense  boolean default null,
    active boolean default true
    -- boolean is tinyint(1)
);

create table if not exists Common(
   id int primary key not null,
	constraint foreign key(id) references Person(id)
);

create table if not exists `Admin`(
    id int primary key not null,
    constraint foreign key(id) references Person(id)
);

insert into Person(ci,`name`, surname, `password`, email) 
values(55618820, "david", "de los santos", "mateAmargo", "davidadriansantoslopez@gmail.com");
insert into Admin values(1);
insert into Person(ci,`name`, surname, `password`, email) 
values(14479530, "carolina", "lopez", "mateAmarguito", "davidadriansantoslopez@gmail.com");
insert into Common values(2);
insert into Person(ci,`name`, surname, `password`, email) 
values(14479531, "carolina", "fontana", "mateAmarguito1", "davidadriansantoslopez@gmail.com");
insert into Common values(3);
insert into Person(ci,`name`, surname, `password`, email) 
values(14479532, "soledad", "ramirez", "mateAmarguito2", "davidadriansantoslopez@gmail.com");
insert into Common
values(4);
insert into Person(ci,`name`, surname, `password`, email) 
values(14479533, "maria", "la del barrio", "mateAmarguito3","davidadriansantoslopez@gmail.com");
insert into Common values(5);
insert into Person(ci,`name`, surname, `password`, email) 
values(14479534, "mafalda", "ortiga", "mateAmarguito4", "davidadriansantoslopez@gmail.com");
insert into Common values(6);
insert into Person(ci,`name`, surname, `password`, email) values(14479535, "Jose", "artigas", "mateAmarguito5", "davidadriansantoslopez@gmail.com");
insert into Common values(7);
