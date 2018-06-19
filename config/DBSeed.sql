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
Create table Hint(
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
content TEXT not null
);
insert into Hint VALUES(null,'JeffPassword');
 insert into Hint VALUEs(null,'Admin');
INSERT INTO User VALUES(null,'Jeff','$2y$10$Yn2Qkm6u/3H.9Qb7oM.fDuQaVhmAg291SNXW3jNH79CUp2ROlhgs6');
INSERT INTO User VALUES(null,'Admin','$2y$10$UOWzqjo2RkKCmE4sFDxvPugMyRXMWtunwIk9UY7kiqWfDe8gO3wbO');
INSERT INTO Item VALUES(null, 'Pick Le Rick', 'daaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa b','110.png');
INSERT INTO Item VALUES(null,'The FitnessGram™ Pacer Test','The FitnessGram™ Pacer Test is a multistage aerobic capacity test that progressively gets more difficult as it continues. The 20 meter pacer test will begin in 30 seconds. Line up at the start. The running speed starts slowly, but gets faster each minute after you hear this signal. [beep] A single lap should be completed each time you hear this sound. [ding] Remember to run in a straight line, and run as long as possible. The second time you fail to complete a lap before the sound, your test is over. The test will begin on the word start. On your mark, get ready, start.','Finesse.jpg');
INSERT INTO Item VALUES(null,'Zelda from Link','Its Link from Zelda','hqdefault.jpg');
INSERT INTO ITEM VALUES(null,'👍','👍👍👍👍👍👍👍👍👍👍👍','Kids.jpg');
INSERT INTO ITEM VALUES(null,'Roj','Its Roj Boj','Roj.PNG');
INSERT INTO Item VALUES(null,'Diggerman','Le Diggerman','1516367007514_mobile__0_1_964_334_c105390a0808766d8d2d0f210f7e9a2d[1].png');
INSERT INTO Item VALUES(null,'John Scarce','Double Upload','ScarceIsThicc.jpg');
