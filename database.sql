DROP DATABASE IF EXISTS phpcrud;

CREATE DATABASE phpcrud;

USE phpcrud;

DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50)
);