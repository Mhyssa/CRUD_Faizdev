DROP DATABASE IF EXISTS crud_faizdev;

CREATE DATABASE crud_faizdev;

USE crud_faizdev;

-- Création de la table des Catégories
CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

INSERT INTO `users` (`user_id`,`user_name`,`email`) 
VALUES (NULL,'dev','dev@gmail.com');
