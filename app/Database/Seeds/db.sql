/*
setup db and user using mysql admin account such as root
*/
create database if not exists institute;

create user institutedbuser@localhost identified by ;

grant all privileges on institute.* to 'institutedbuser'@'localhost';

exit;


/*
Now login into mysql as institutedbuer 
*/

use institute;

create table users (
    userid int not null auto_increment,
    username varchar(50) not null,
    password varchar(255) not null,
    createdon timestamp not null default current_timestamp(),
    lastupdatedon timestamp not null default current_timestamp(),
    primary key(userid)
);

