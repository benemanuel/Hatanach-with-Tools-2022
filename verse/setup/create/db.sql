drop DATABASE IF EXISTS verses;
CREATE DATABASE verses DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

;CREATE USER 'tanach_user'@'localhost' IDENTIFIED WITH mysql_native_password BY 'GoFigureThisOutOnYourOwn';
CREATE USER 'tanach_user'@'localhost' IDENTIFIED BY password 'GoFigureThisOutOnYourOwn';
set password for 'tanach_user'@'localhost' = Password('GoFigureThisOutOnYourOwn');

USE verses;

DROP TABLE IF EXISTS `verse`;

CREATE TABLE verse (
 id INT NOT NULL PRIMARY KEY,
 verse TEXT NOT NULL DEFAULT "",
 book INT NOT NULL DEFAULT 0,
 fullbook VARCHAR (12) NOT NULL DEFAULT "",
 shortbook VARCHAR (6) NOT NULL DEFAULT "",
 hebbook VARCHAR (13) NOT NULL DEFAULT "",
 ch INT NOT NULL DEFAULT 0,
 vr INT NOT NULL DEFAULT 0,
 last_updated DATETIME NOT NULL DEFAULT NOW() ON UPDATE NOW()
);

SHOW tables;

DESCRIBE verse;

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, INDEX, DROP, ALTER, CREATE TEMPORARY TABLES, LOCK TABLES ON verses.* TO 'tanach_user'@'localhost';
GRANT FILE ON *.* TO 'tanach_user'@'localhost';


