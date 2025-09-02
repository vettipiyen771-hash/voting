CREATE DATABASE aadhaar_db;
USE aadhaar_db;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  aadhaar VARCHAR(12) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);
