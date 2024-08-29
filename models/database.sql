/* Create database todo */
CREATE DATABASE todo;

/* Use database todo */
USE todo;

/* Create table Users */
CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT, /* user id */
    username VARCHAR(255) NOT NULL, /* username */
    password VARCHAR(60) NOT NULL, /* password hash, 60 characters */
    PRIMARY KEY (id) /* user primary key */
);

/* Create table ToDos */
CREATE TABLE todos (
    id INT NOT NULL AUTO_INCREMENT, /* todo id */
    title VARCHAR(255) NOT NULL,  /* todo title */
    description VARCHAR(1024) NOT NULL, /* todo description */
    status TINYINT UNSIGNED NOT NULL, /* todo status: 0 -> pending  1 -> in progress  2 -> finished   3 -> deleted*/
    user_id INT NOT NULL, /* assigned user id */
    PRIMARY KEY (id), /* todo primary key */
    FOREIGN KEY (user_id) REFERENCES users(id) /* user foreign key */
);

