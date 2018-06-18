DROP DATABASE IF EXISTS M183;
CREATE DATABASE M183;
USE M183;
CREATE TABLE User(
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
username VARCHAR(16) NOT NULL,
password varchar(420) NOT NULL
);
CREATE TABLE Item(
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
title varchar(32) not null,
description text not null,
image varchar(256) not null
);

INSERT INTO User VALUES(null,'Jeff','$2y$10$Yn2Qkm6u/3H.9Qb7oM.fDuQaVhmAg291SNXW3jNH79CUp2ROlhgs6');--JeffPassword
