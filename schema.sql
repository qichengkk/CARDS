-- Qicheng 2015-07-21

-- --------------------------------
-- 0. Create database cards
-- --------------------------------
CREATE DATABASE IF NOT EXISTS cards DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE cards;

-- ------------------------
-- 1. Create table employee
-- ------------------------
CREATE TABLE IF NOT EXISTS employee (
  EId INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  password VARCHAR(64) NOT NULL,
  email VARCHAR(64) NOT NULL,
  role VARCHAR(10) NOT NULL,
  date_added DATETIME,
  date_modified DATETIME,

  PRIMARY KEY (EId)

) ENGINE = InnoDB;

INSERT INTO employee (name, password, email, role)
VALUES
  ('admin', 'c7f5867734c1bb80892e13302d96a222e2ef25e8e0657c9d4b20e37b83e5f0af', 'bjc55311@encs.concordia.ca', 'Manager'),
  ('John Smith', 'c7f5867734c1bb80892e13302d96a222e2ef25e8e0657c9d4b20e37b83e5f0af', 'john.smith@johnsmitporsche.com', 'Manager');


-- ------------------------
-- 2. Create table car
-- ------------------------