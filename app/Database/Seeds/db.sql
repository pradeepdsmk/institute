/*
setup db and user using mysql admin account such as root
*/
create database if not exists institute;

create user institutedbuser@localhost identified by ;

grant all privileges on institute.* to 'institutedbuser'@'localhost';

exit;


/*
Now login into mysql as institutedbuer and setup tables as below
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

create table students (
	studentid int not null auto_increment,
    name varchar(80) not null,
    fatherhusbandname varchar(80) not null,
    permanentaddress varchar(255),
    communicationaddress varchar(255),
    gender tinyint,
    dateofbirth date,
    educationqualification varchar(30),
    tchnicalqualifiation varchar(30),
    course varchar(30),
    collegeschoolname varchar(100),
    referencefrom varchar(50),
    contactnumber varchar(14),
    emailid varchar(100),
    facebook varchar(100),
    joiningdate date,
    admittedby varchar(50),
    createdon timestamp not null default current_timestamp(),
    lastupdatedon timestamp not null default current_timestamp(),
    primary key(studentid)
);

create table feepayments (
	feepaymentid int not null auto_increment,
    studentid int not null,
    amount int not null,
    paidon date not null,
    receivedby varchar(50),
    createdon timestamp not null default current_timestamp(),
    lastupdatedon timestamp not null default current_timestamp(),
    primary key(feepaymentid)
);

