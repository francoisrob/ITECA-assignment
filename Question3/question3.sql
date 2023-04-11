CREATE DATABASE IF NOT EXISTS comicon;
USE comicon;
DROP TABLE IF EXISTS members;
CREATE TABLE IF NOT EXISTS `members` (
    member_id int NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    email varchar(50) NOT NULL,
    age int NOT NULL,
    address varchar(255) NOT NULL,
    gender varchar(10) NOT NULL,
    favourite_character varchar(255) NOT NULL,
    PRIMARY KEY (member_id)
);

INSERT INTO members (name, email, age, address, gender, favourite_character)
VALUES ('John Doe', 'example@mail.om', '12', '7 main street', 'male', 'batman')