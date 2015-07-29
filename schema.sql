-- Qicheng 2015-07-21

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
  date_added DATETIME,
  date_modified DATETIME,

  PRIMARY KEY (EId)

) ENGINE = InnoDB;

-- TODO: Need to change 'date_added' to TIMESTAMP

INSERT INTO employee (name, password, email, role)
VALUES
  ('admin', 'c7f5867734c1bb80892e13302d96a222e2ef25e8e0657c9d4b20e37b83e5f0af', 'bjc55311@encs.concordia.ca', 'Manager'),
  ('John Smith', 'c7f5867734c1bb80892e13302d96a222e2ef25e8e0657c9d4b20e37b83e5f0af', 'john.smith@johnsmithporsche.com', 'Manager');

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

INSERT INTO make (name)
VALUES ('Porsche');

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
  date_added TIMESTAMP,
  date_modified DATETIME,

  PRIMARY KEY(id),
  FOREIGN KEY(make_id) REFERENCES make(id) ON DELETE CASCADE
) ENGINE = InnoDB;

INSERT INTO model (make_id, name, serie, type, from_year, to_year)
VALUES
  ('1', 'Boxster', '', 'Roadster', '1996', '2017'),
  ('1', 'Boxster', 'S', 'Roadster', '1996', '2017'),
  ('1', 'Boxster', 'GTS', 'Roadster', '1996', '2017'),
  ('1', 'Cayman', '', 'Coupe', '2006', '2017'),
  ('1', 'Cayman', 'S', 'Coupe', '2006', '2017'),
  ('1', 'Cayman', 'GTS', 'Coupe', '2006', '2017'),
  ('1', 'Cayman', 'GT4', 'Coupe', '2006', '2017'),
  ('1', '911 Carrera', '', 'Coupe', '1964', '2017'),
  ('1', '911 Carrera', 'S', 'Coupe', '1964', '2017'),
  ('1', '911 Carrera', 'GTS', 'Coupe', '1964', '2017'),
  ('1', 'Panamera', '', 'Coupe', '1999', '2017'),
  ('1', 'Panamera', '4', 'Coupe', '1999', '2017'),
  ('1', 'Panamera', 'S', 'Coupe', '1999', '2017'),
  ('1', 'Panamera', '4S', 'Coupe', '1999', '2017'),
  ('1', 'Panamera', 'GTS', 'Coupe', '1999', '2017');

INSERT INTO model (make_id, name, serie, type, from_year, to_year)
VALUES
  ('1', 'Cayenne', '', 'SUV', '2002', '2017'),
  ('1', 'Cayenne', 'S', 'SUV', '2002', '2017'),
  ('1', 'Cayenne', 'GTS', 'SUV', '2002', '2017');

ALTER TABLE model ADD image VARCHAR(255);
-- TODO: Include 'image' in CREATE TABLE for final version.

-- -------------------
-- 3. Create table car
-- -------------------
CREATE TABLE IF NOT EXISTS car (
  VIN CHAR(17) NOT NULL,
  model_id INT NOT NULL,
  year YEAR(4) NOT NULL,
  mileage INT NOT NULL,
  color VARCHAR(50) NOT NULL,
  estimated_price INT,
  description VARCHAR(255),
  date_added TIMESTAMP,
  date_modified DATETIME,

  PRIMARY KEY (VIN)
) ENGINE = InnoDB;

ALTER TABLE car MODIFY COLUMN model_id INT UNSIGNED NOT NULL;
ALTER TABLE car ADD FOREIGN KEY (model_id) REFERENCES model(id);
ALTER TABLE car MODIFY COLUMN estimated_price DECIMAL(12, 2) NOT NULL;
-- TODO: Include this in CREATE TABLE for final version.

INSERT INTO car (VIN, model_id, year, mileage, color, estimated_price, description)
VALUES ('2P4GH5539NR525672', 12, 2012, 24910, 'Black', 101900.00, 'New Pirelli P-Zero tires on custom after-market wheels, orignal wheels also included. Meticulously maintained and collection worthy.');

-- ------------------------
-- 4. Create table features
-- ------------------------
CREATE TABLE IF NOT EXISTS feature (
  id INT UNSIGNED UNIQUE NOT NULL AUTO_INCREMENT,
  car_id CHAR(17) NOT NULL,
  engine VARCHAR(50),
  transmission VARCHAR(100),
  cruise_control TINYINT(1) DEFAULT 0,
  powertrain VARCHAR(50),
  city_fuel_consumption VARCHAR(50),
  hw_fuel_consumption VARCHAR(50),
  air_conditioner TINYINT(1) DEFAULT 0,
  interior VARCHAR(255),
  sunroof TINYINT(1) DEFAULT 0,
  satellite_radio TINYINT(1) DEFAULT 0,
  airbags TINYINT(1) DEFAULT 0,

  PRIMARY KEY (id),
  FOREIGN KEY(car_id) REFERENCES car(VIN) ON DELETE CASCADE
) ENGINE = InnoDB;

INSERT INTO feature (car_id, engine, transmission, powertrain, air_conditioner, interior, sunroof, satellite_radio, airbags)
VALUES
  ('2P4GH5539NR525672', '3.8L Flat-6', '7-Speed DCT', 'RWD', 1, 'Leather', 0, 0, 1);

ALTER TABLE feature ADD date_added TIMESTAMP;
ALTER TABLE feature ADD date_modified DATETIME;

ALTER TABLE feature MODIFY COLUMN city_fuel_consumption DECIMAL(3, 1);
ALTER TABLE feature MODIFY COLUMN hw_fuel_consumption DECIMAL(3, 1);