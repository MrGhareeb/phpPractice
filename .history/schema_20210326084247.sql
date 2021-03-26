--create schema
create schema blogApp;
--USER_TYPE table
create table USER_TYPE
(
	user_type_id int auto_increment,
	user_type_name varchar2(50) not null
);
--Users table
create table USERS
(
	user_id int auto_increment,
	f_name varchar2(50) not null,
	l_name varchar2(50) not null,
	email varchar2(100) not null,
	password varchar2(256) not null,
	constraint USERS_pk
		primary key (uid)
);

create unique index USERS_email_uindex
	on USERS (email);
