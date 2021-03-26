--create schema
create schema blogApp;
--Users table
create table USERS
(
	uid int auto_increment,
	f_name varchar2(50) not null,
	l_name varchar2(50) not null,
	email varchar2(100) not null,
	password varchar2(256) not null,
	constraint USERS_pk
		primary key (uid)
);

create unique index USERS_email_uindex
	on USERS (email);
