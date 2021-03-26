/*create schema*/
create schema blogApp;
/*use schema*/
use blogApp;

/*USER_TYPE table*/
create table USER_TYPE (
    user_type_id int auto_increment not null primary key,
    user_type_name varchar(50) not null
);

/*Users table*/
create table USERS (
    user_id int auto_increment,
    f_name varchar(50) not null,
    l_name varchar(50) not null,
    email varchar(50) not null,
    user_pass varchar(50) not null,
    user_type_id int not null,
    /*primary key constraint*/
    constraint USERS_pk primary key (user_id),
    /*foreign key constraint*/
    constraint fk_user_type foreign key(user_type_id) references user_type(user_type_id)
);
create unique index USERS_email_uindex on USERS (email);

/*POSTS table*/
create table POSTS (
    post_id int not null,
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
    comment_id int not null,
    comment_body varchar(100) not null,
    created_by int not null,
    comment_time_stamp timestamp default current_timestamp null,
    /*primary key constraint*/
    constraint COMMENT_pk primary key (comment_id),
    /*foreign key constraint*/
    constraint fk_created_by foreign key (created_by) references USERS(user_id)
);