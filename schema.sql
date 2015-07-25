-- Qicheng 2015-07-21

-- --------------------------------
-- Create database cards
-- --------------------------------
CREATE DATABASE IF NOT EXISTS cards DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE cards;

-- ---------------------------
-- 0. Create table ci_sessions
-- ---------------------------
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
  `data` blob NOT NULL,
  PRIMARY KEY (id),
  KEY `ci_sessions_timestamp` (`timestamp`)
);

-- ------------------------
-- 1. Create table employee
-- ------------------------
CREATE TABLE IF NOT EXISTS employee (
  EId INT UNSIGNED UNIQUE NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  password VARCHAR(64) NOT NULL,
  email VARCHAR(64) UNIQUE NOT NULL,
  role VARCHAR(10) NOT NULL,
  date_added DATETIME,
  date_modified DATETIME,

  PRIMARY KEY (EId)

) ENGINE = InnoDB;

INSERT INTO employee (name, password, email, role)
VALUES
  ('admin', 'c7f5867734c1bb80892e13302d96a222e2ef25e8e0657c9d4b20e37b83e5f0af', 'bjc55311@encs.concordia.ca', 'Manager'),
  ('John Smith', 'c7f5867734c1bb80892e13302d96a222e2ef25e8e0657c9d4b20e37b83e5f0af', 'john.smith@johnsmithporsche.com', 'Manager');


-- ------------------------
-- 2. Create table car
-- ------------------------