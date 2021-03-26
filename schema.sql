/*create schema*/
create schema blogApp;
/*use schema*/
use blogApp;

/*USER_TYPE table*/
create table USERS_TYPE (
    user_type_id int auto_increment not null primary key,
    user_type_name varchar(50) not null
);

/*Users table*/
create table USERS (
    user_id int auto_increment,
    f_name varchar(50) not null,
    l_name varchar(50) not null,
    email varchar(100) not null,
    user_pass varchar(256) not null,
    user_type_id int not null default 2,
    /*primary key constraint*/
    constraint USERS_pk primary key (user_id),
    /*foreign key constraint*/
    constraint fk_users_user_type foreign key(user_type_id) references users_type(user_type_id)
);
create unique index users_email_uindex on USERS(email);

/*POSTS table*/
create table POSTS (
    post_id int not null auto_increment,
    post_title varchar(100) not null,
    post_body varchar(100) not null,
    created_by int not null,
    post_img varchar(1000) null,
    post_time_stamp datetime default current_timestamp not null,
    /*primary key constraint*/
    constraint POST_pk primary key (post_id),
    /*foreign key constraint*/
    constraint fk_created_by foreign key (created_by) references USERS(user_id)
);

/*COMMENTS TABLE*/
create table COMMENTS (
    comment_id int not null auto_increment,
    comment_body varchar(400) not null,
    created_by int not null,
    post_id int not null,
    comment_time_stamp timestamp default current_timestamp not null,
    /*primary key constraint*/
    constraint COMMENT_pk primary key (comment_id),
    /*foreign key constraint*/
    constraint fk_comments_created_by foreign key (created_by) references USERS(user_id),
    constraint fk_comments_post_id foreign key (post_id) references POSTS(post_id)
);

/*sample data*/

/*insert into users_type*/
insert into USERS_TYPE values (1,'admin');
insert into USERS_TYPE values (2,'normal');

/*insert into users*/
INSERT INTO USERS ( f_name, l_name, email, user_pass, user_type_id) VALUES ('asd', 'asd', 'asd@asd.com', '$2y$10$E0wYxCtMPPS2BtrEdvDnDeuw48E2c9vKIZoSx0ZRR7GeslzgRsgie', 2);
INSERT INTO USERS ( f_name, l_name, email, user_pass, user_type_id) VALUES ('the', 'admin', 'admin@admin.com', '$2y$10$l.GAbpUa2g7j6frph3yteOmCjOk2ek1Ao0w686ultdisFNR/C.cSW', 1);

/*insert into posts*/
insert into POSTS(post_title, post_body, created_by) VALUES ('first post','this is the first post I have created',2);
insert into POSTS(post_title, post_body, created_by, post_img) VALUES ('WELCOME','welcome to the blogapp website',2,'http://localhost/dbp2%20practice/assets/img/photo.jpeg');

/*insert into comments*/
insert into COMMENTS(comment_body, created_by, post_id) VALUES ('this is my first comment',1,1);


