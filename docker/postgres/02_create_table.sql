\c todos;

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

CREATE TABLE todos (
    id serial,
    title text,
    completed boolean,
    created_at TIMESTAMP NULL
);

CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name varchar(20) NOT NULL,
    password varchar(40) NOT NULL,
    created_at TIMESTAMP NOT NULL
);
