CREATE DATABASE TradePlatfromServerDB;
SET NAMES 'cp1251';
USE TradePlatfromServerDB;

CREATE TABLE Users
(
USERID int unsigned not null auto_increment primary key,
USERLOGIN varchar(32) not null,
USERPASSWORD varchar(32) not null,
USERNICKNAME varchar(32) not null,
USEREMAIL varchar(32) not null,
USERREGISTERDATE varchar(32),
USERNAME varchar(32),
USERSECONDNAME varchar(32),
USERTHIRDNAME varchar(32),
USERBIRTHDAY DATETIME,
USERCITY varchar(256),
USERTELEPHONE varchar(64),
USERHOMEPAGE varchar(64),
USERCOUNTRY varchar(64) not null references Countrys(COUNTRYID),
USERROLE varchar(64) not null references UserRoles(ROLEID),
USERAVATARURL varchar(128)
);

CREATE TABLE Countrys
(
COUNTRYID int unsigned not null auto_increment primary key,
COUNTRYNAME varchar(64) not null,
COUNTRYICON varchar(128)
);

CREATE TABLE UserRoles
(
ROLEID int unsigned not null auto_increment primary key,
ROLENAME varchar(64) not null,
ROLEICON varchar(128)
);