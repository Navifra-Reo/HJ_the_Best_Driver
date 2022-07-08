create database webadmin;
create user webadmin@localhost identified by 'webadmin2022!';
grant all privileges on webadmin.* to webadmin@localhost;
flush privileges;
use webadmin;

create table users(
 idx int auto_increment primary key,
 email varchar(128) unique not null,
 password char(128) not null
);

insert into users (email, password) values ("admin@admin.net", "1324");


create table freeboard(
 idx int auto_increment primary key,
 uIdx int unsigned not null,
 title varchar(128) not null,
 contents text not null,
 upPath varchar(256) default "",
 upName varchar(256) default "",
 regDt datetime default CURRENT_TIMESTAMP(),
 hit int unsigned default 0
);

create table notice(
 idx int auto_increment primary key,
 uIdx int unsigned not null,
 title varchar(128) not null,
 contents text not null,
 upPath varchar(256) default "",
 upName varchar(256) default "",
 regDt datetime default CURRENT_TIMESTAMP(),
 hit int unsigned default 0
);

create table pds(
 idx int auto_increment primary key,
 uIdx int unsigned not null,
 title varchar(128) not null,
 contents text not null,
 upPath varchar(256) default "",
 upName varchar(256) default "",
 regDt datetime default CURRENT_TIMESTAMP(),
 hit int unsigned default 0
);
