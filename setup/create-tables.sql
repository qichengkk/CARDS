-- COMP5531, Files & Databses
-- --------------------------
-- by Amritpal Singh, Dagoberto Ramirez, 
-- Gagan Sodhi, Lee Ho & Qi Cheng Lao
-- -------------
-- on 2015-08-04
-- -------------

-- ---------------------
-- Create database cards
-- ---------------------
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
  date_added TIMESTAMP,
  date_modified DATETIME,

  PRIMARY KEY (EId)

) ENGINE = InnoDB;

-- --------------------
-- 2. Create table make
-- --------------------
CREATE TABLE IF NOT EXISTS make (
  id INT UNSIGNED UNIQUE NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  date_added TIMESTAMP,
  date_modified DATETIME,

  PRIMARY KEY (id)

) ENGINE = InnoDB;

-- ---------------------
-- 3. Create table model
-- ---------------------
CREATE TABLE IF NOT EXISTS model (
  id INT UNSIGNED UNIQUE NOT NULL AUTO_INCREMENT,
  make_id INT UNSIGNED,
  name VARCHAR(50) NOT NULL,
  serie VARCHAR(50),
  type VARCHAR(50),
  from_year YEAR(4) NOT NULL,
  to_year YEAR(4) NOT NULL,
  image VARCHAR(255),
  date_added TIMESTAMP,
  date_modified DATETIME,

  PRIMARY KEY(id),
  FOREIGN KEY(make_id) REFERENCES make(id) ON DELETE CASCADE

) ENGINE = InnoDB;

-- -------------------
-- 4. Create table car
-- -------------------
CREATE TABLE IF NOT EXISTS car (
  VIN CHAR(17) NOT NULL,
  model_id INT UNSIGNED NOT NULL,
  year YEAR(4) NOT NULL,
  mileage INT NOT NULL,
  color VARCHAR(50) NOT NULL,
  estimated_price DECIMAL(12, 2) NOT NULL,
  description VARCHAR(255),
  date_added TIMESTAMP,
  date_modified DATETIME,

  PRIMARY KEY (VIN),
  FOREIGN KEY (model_id) REFERENCES model(id)

) ENGINE = InnoDB;

-- ------------------------
-- 5. Create table features
-- ------------------------
CREATE TABLE IF NOT EXISTS feature (
  id INT UNSIGNED UNIQUE NOT NULL AUTO_INCREMENT,
  car_id CHAR(17) NOT NULL,
  engine VARCHAR(50),
  transmission VARCHAR(100),
  cruise_control TINYINT(1) DEFAULT 0,
  powertrain VARCHAR(50),
  city_fuel_consumption DECIMAL(3,1),
  hw_fuel_consumption DECIMAL(3,1),
  air_conditioner TINYINT(1) DEFAULT 0,
  interior VARCHAR(255),
  sunroof TINYINT(1) DEFAULT 0,
  satellite_radio TINYINT(1) DEFAULT 0,
  airbags TINYINT(1) DEFAULT 0,
  date_added TIMESTAMP,
  date_modified DATETIME,

  PRIMARY KEY (id),
  FOREIGN KEY(car_id) REFERENCES car(VIN) ON DELETE CASCADE

) ENGINE = InnoDB;

-- -----------------------
-- 6. Create table country
-- -----------------------
CREATE TABLE IF NOT EXISTS country (
  name VARCHAR(50) UNIQUE NOT NULL,
  cut_off_year INT UNSIGNED NOT NULL,

  PRIMARY KEY(name)

) ENGINE = InnoDB;

-- ----------------------
-- 7. Create table client
-- ----------------------
CREATE TABLE IF NOT EXISTS client (
  CId INT UNSIGNED UNIQUE NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  type VARCHAR(10) NOT NULL,
  address VARCHAR(100) NOT NULL,
  country VARCHAR(50) NOT NULL DEFAULT 'Canada',
  phone VARCHAR(24) NOT NULL,
  date_added TIMESTAMP,
  date_modified DATETIME,

  PRIMARY KEY (CId),
  FOREIGN KEY(country) REFERENCES country(name) ON DELETE CASCADE

) ENGINE = InnoDB;

-- ---------------------------
-- 8. Create table transaction
-- ---------------------------
CREATE TABLE IF NOT EXISTS transaction (
  id INT UNSIGNED UNIQUE NOT NULL AUTO_INCREMENT,
  type VARCHAR(50) NOT NULL,
  car_id CHAR(17) NOT NULL,
  client_id INT UNSIGNED NOT NULL,
  price DECIMAL(12, 2),
  tax DECIMAL(12, 2),
  employee_id INT UNSIGNED NOT NULL,
  document VARCHAR(255),
  date_added TIMESTAMP,
  date_modified DATETIME,

  PRIMARY KEY (id),
  FOREIGN KEY (car_id) REFERENCES car(VIN) ON DELETE CASCADE,
  FOREIGN KEY (client_id) REFERENCES client(CId),
  FOREIGN KEY (employee_id) REFERENCES employee(Eid)

) ENGINE = InnoDB;

-- ---
-- EOF