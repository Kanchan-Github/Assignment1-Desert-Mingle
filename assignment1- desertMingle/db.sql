-- Drop the existing Database if exists
DROP DATABASE IF EXISTS ITECH3108_3034274_A1;
-- Create a new database for storing data
CREATE DATABASE ITECH3108_3034274_A1 CHARACTER SET utf8 COLLATE utf8_general_ci;
-- Switch to it
USE ITECH3108_3034274_A1;
 
GRANT SELECT, INSERT, UPDATE, DELETE
ON ITECH3108_3034274_A1.*
TO 'root'@'localhost'
IDENTIFIED BY ''; -- Password

-- DDL to create the tables
CREATE TABLE User (
    user_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    password VARCHAR(255),
    profile VARCHAR(30) NOT NULL,
    photo_url VARCHAR(30) NOT NULL
);

CREATE TABLE Dessert (
    dessert_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(10) NOT NULL
);

CREATE TABLE Likes (
    user_id INT(10) NOT NULL ,
    dessert_id INT(10) NOT NULL,
    PRIMARY KEY (user_id , dessert_id),
    FOREIGN KEY (user_id) REFERENCES User(user_id),
    FOREIGN KEY (dessert_id) REFERENCES Dessert(dessert_id)
);
CREATE TABLE Messages (
    message_id INT(10),
	from_user_id INT(10),
    to_user_id INT(10),
    datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    text VARCHAR(255),
    PRIMARY KEY (message_id),
    FOREIGN KEY (from_user_id) REFERENCES User(user_id),
    FOREIGN KEY (to_user_id) REFERENCES User(user_id)
);

-- DML to create data

--User
INSERT INTO User 
    (name, email, password)
VALUES
('30344274', 'kkanxhan.sth.11@gmail.com', '$2y$10$123472443030000999999uHDLKr5JAAbT7wZC8f9cgmN2el5UVKii'),   
('tutor', '', '$2y$10$123472443030000999999uHDLKr5JAAbT7wZC8f9cgmN2el5UVKii'),
('tom', 'kanchanshrestha1007@gmail.com', '$2y$10$123472443030000999999uHDLKr5JAAbT7wZC8f9cgmN2el5UVKii'),
('jerry', 'jerry@gmail.com', '$2y$10$123472443030000999999uHDLKr5JAAbT7wZC8f9cgmN2el5UVKii'),
('harley', 'harley@gmail.com', '$2y$10$123472443030000999999uHDLKr5JAAbT7wZC8f9cgmN2el5UVKii');

INSERT INTO Dessert
    (id, title)
VALUES
    (1, 'ice-cream'),
    (2, 'cake'),
    (3, 'cream'),
    (4, 'chocolate'),
    (5, 'caramel');

