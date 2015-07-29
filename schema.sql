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


INSERT INTO employee (name, password, email, role, date_added, date_modified)
VALUES
  ('admin', 'c7f5867734c1bb80892e13302d96a222e2ef25e8e0657c9d4b20e37b83e5f0af', 'bjc55311@encs.concordia.ca', 'Manager', NOW(), NOW()),
  ('Qicheng Lao', 'c7f5867734c1bb80892e13302d96a222e2ef25e8e0657c9d4b20e37b83e5f0af', 'qi_lao@encs.concordia.ca', 'Salesman', NOW(), NOW()),
  ('Gaganpreet Singh Sodhi', 'c7f5867734c1bb80892e13302d96a222e2ef25e8e0657c9d4b20e37b83e5f0af', 'g_sodh@encs.concordia.ca', 'Salesman', NOW(), NOW()),
  ('Dagoberto Ramirez Gaxiola', 'c7f5867734c1bb80892e13302d96a222e2ef25e8e0657c9d4b20e37b83e5f0af', 'dago_g@encs.concordia.ca', 'Salesman', NOW(), NOW()),
  ('Lee Ho', 'c7f5867734c1bb80892e13302d96a222e2ef25e8e0657c9d4b20e37b83e5f0af', 'le_ho@encs.concordia.ca', 'Driver', NOW(), NOW()),
  ('Amritpal Singh', 'c7f5867734c1bb80892e13302d96a222e2ef25e8e0657c9d4b20e37b83e5f0af', 'amri_s@encs.concordia.ca', 'Driver', NOW(), NOW());


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
-- 4. Create table car
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
-- 5. Create table features
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



-- ----------------------------
-- 6. Create table country
-- country(name, cut_off_year)
-- ----------------------------
CREATE TABLE IF NOT EXISTS country (
  name VARCHAR(50) UNIQUE NOT NULL,
  cut_off_year INT UNSIGNED NOT NULL,

  PRIMARY KEY(name)
) ENGINE = InnoDB;

INSERT INTO country (name, cut_off_year)
VALUES ('Canada', 100), ('USA', 10), ('Mexico', 15);


-- ------------------------
-- 7. Create table client
-- client(id, name, type(showroom, auction, person, port), address, country, phone, date_added, date_modified)
-- ------------------------
CREATE TABLE IF NOT EXISTS client (
  CId INT UNSIGNED UNIQUE NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  type VARCHAR(10) NOT NULL,
  address VARCHAR(100) NOT NULL,
  country VARCHAR(50) NOT NULL DEFAULT 'Canada',
  phone VARCHAR(24) NOT NULL,
  date_added DATETIME,
  date_modified DATETIME,

  PRIMARY KEY (CId),
  FOREIGN KEY(country) REFERENCES country(name) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE = InnoDB;

INSERT INTO client (name, type, address, country, phone, date_added, date_modified)
VALUES
  ('Palais des congrès de Montréal', 'showroom', '201, avenue Viger West, Montreal', 'Canada', '514-123-4567', NOW(), NOW()),
  ('CANADIAN INTERNATIONAL AUTOSHOW', 'showroom', '85 RENFREW DRIVE MARKHAM ONTARIO', 'Canada', '905-940-2800', NOW(), NOW()),
  ('ADESA Montreal', 'auction', '300 Albert Mondou St. Eustache, QC', 'Canada', '450-472-4400', NOW(), NOW());


