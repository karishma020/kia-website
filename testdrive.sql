CREATE DATABASE kia;

USE kia;

CREATE TABLE test_drives (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  phone VARCHAR(20),
  model VARCHAR(50),
  date DATE
);
