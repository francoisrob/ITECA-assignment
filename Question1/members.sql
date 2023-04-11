CREATE DATABASE IF NOT EXISTS gym;

USE gym;

CREATE TABLE
  IF NOT EXISTS `members` (
    `member_id` int NOT NULL AUTO_INCREMENT,
    `first_name` varchar(50) NOT NULL,
    `last_name` varchar(50) NOT NULL,
    `phone_number` varchar(50) NOT NULL,
    `email` varchar(50) NOT NULL,
    `password` varchar(50) NOT NULL,
    `fitness_goals` varchar(50) NOT NULL,
    `workout_schedule` varchar(50) NOT NULL,
    `fitness_level` varchar(50) NOT NULL,
    PRIMARY KEY (`member_id`),
    UNIQUE KEY `email` (`email`)
  );

INSERT INTO
  members (
    first_name,
    last_name,
    phone_number,
    email,
    password,
    fitness_goals,
    workout_schedule,
    fitness_level
  )
VALUES
  (
    'John',
    'Doe',
    '1234567890',
    'johndoe@example.com',
    'password',
    'Lose weight',
    'Monday, Wednesday, Friday',
    'Intermediate'
  ),
  (
    'Bob',
    'Ross',
    '0987654321',
    'bobross@email.com',
    'password',
    'Gain muscle',
    'Tuesday, Thursday, Saturday',
    'Beginner'
  ),
  (
    'Reanu',
    'Keeves',
    '1234567890',
    'rkeeves@fmail.com',
    'dogs',
    'Gain muscle',
    'Monday, Wednesday, Friday',
    'Advanced'
  );

SELECT
  *
FROM
  members
WHERE
  email = 'johndoe@example.com'
  AND password = 'password';