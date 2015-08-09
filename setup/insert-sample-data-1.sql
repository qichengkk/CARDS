-- COMP5531, Files & Databses
-- --------------------------
-- by Amritpal Singh, Dagoberto Ramirez, 
-- Gagan Sodhi, Lee Ho & Qi Cheng Lao
-- -------------
-- on 2015-08-04
-- -------------

-- --------
-- Employee
-- --------
INSERT INTO employee (name, password, email, role)
VALUES
  ('admin', 'c7f5867734c1bb80892e13302d96a222e2ef25e8e0657c9d4b20e37b83e5f0af', 'bjc55311@encs.concordia.ca', 'Manager'),
  ('Qicheng Lao', 'c7f5867734c1bb80892e13302d96a222e2ef25e8e0657c9d4b20e37b83e5f0af', 'qi_lao@encs.concordia.ca', 'Manager'),
  ('Gaganpreet Singh Sodhi', 'c7f5867734c1bb80892e13302d96a222e2ef25e8e0657c9d4b20e37b83e5f0af', 'g_sodh@encs.concordia.ca', 'Salesman'),
  ('Dagoberto Ramirez Gaxiola', 'c7f5867734c1bb80892e13302d96a222e2ef25e8e0657c9d4b20e37b83e5f0af', 'dago_g@encs.concordia.ca', 'Salesman'),
  ('Lee Ho', 'c7f5867734c1bb80892e13302d96a222e2ef25e8e0657c9d4b20e37b83e5f0af', 'le_ho@encs.concordia.ca', 'Driver'),
  ('Amritpal Singh', 'c7f5867734c1bb80892e13302d96a222e2ef25e8e0657c9d4b20e37b83e5f0af', 'amri_s@encs.concordia.ca', 'Driver');

-- ----
-- Make
-- ----
INSERT INTO make (name)
VALUES ('Porsche'), ('Audi'), ('Volkswagen');

-- -----
-- Model
-- -----
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
  ('1', 'Panamera', '', 'Sedan', '1999', '2017'),
  ('1', 'Panamera', '4', 'Sedan', '1999', '2017'),
  ('1', 'Panamera', 'S', 'Sedan', '1999', '2017'),
  ('1', 'Panamera', '4S', 'Sedan', '1999', '2017'),
  ('1', 'Panamera', 'GTS', 'Sedan', '1999', '2017'),
  ('1', 'Cayenne', '', 'SUV', '2002', '2017'),
  ('1', 'Cayenne', 'S', 'SUV', '2002', '2017'),
  ('1', 'Cayenne', 'GTS', 'SUV', '2002', '2017');

-- -------
-- Country
-- -------
INSERT INTO country (name, cut_off_year)
VALUES
	('Canada', 0), ('USA', 15), 
	('China', 15), ('Germany', 15), 
	('Japan', 15), ('Mexico', 15);

-- ------
-- Client
-- ------
INSERT INTO client (name, type, address, country, phone)
VALUES
  ('Palais des congrès de Montréal', 'Showroom', '201, avenue Viger West, Montreal, QC', 'Canada', '514-123-4567'),
  ('CANADIAN INTERNATIONAL AUTOSHOW', 'Showroom', '85 RENFREW DRIVE MARKHAM ONTARIO', 'Canada', '905-940-2800'),
  ('ADESA Montreal', 'Auction', '300 Albert Mondou St. Eustache, QC', 'Canada', '450-472-4400'),
  ('Weissach Performance', 'Dealer', '1757 W 2nd Ave, Vancouver, BC', 'Canada', '604-738-3911'),
  ('Porsche Centre Edmonton', 'Dealer', '17007 111 Avenue Northwest, Edmonton, AB T5S 0J5', 'Canada', '1-877-629-1492');

-- ---
-- Car
-- ---
INSERT INTO car (VIN, model_id, year, mileage, color, estimated_price, description, date_added)
VALUES
	('1P4GH5539NR525672', 12, 2012, 24910, 'Black', 101900.00, 'New Pirelli P-Zero tires on custom after-market wheels, orignal wheels also included. Meticulously maintained and collection worthy.', '2015-08-01 00:00:00'),
	('1GTV2UEH3EZ156199', 3, 2011, 19800, 'Red', 36110.00, '','2015-08-01 00:00:00'),
	('1P4GH5539NR738621', 10, 2012, 137291, 'Jet Black', 119999.00, 'New Pirelli P-Zero tires on custom after-market wheels, orignal wheels also included. Meticulously maintained and collection worthy.', '2015-08-01 00:00:00'),
	('1LNHL2GC5BR785426', 10, 2009, 137291, 'Silver Metalic', 30771.00, 'NOUVEL ARRIVAGE! PORSCHE CAYENNE GTS 2009 AUTOMATIQUE! COMME NEUF! MOTEUR V-8 DE 4.8L. DÉVELOPPANT 405 CHEVAUX!', '2015-08-01 00:00:00');

-- -------
-- Feature
-- -------
INSERT INTO feature (car_id, engine, transmission, powertrain, air_conditioner, interior, sunroof, satellite_radio, airbags, date_added)
VALUES
	('1P4GH5539NR525672', '3.8L Flat-6', '7-Speed DCT', 'RWD', 1, '', 0, 0, 1, '2015-08-01 00:00:00'),
	('1GTV2UEH3EZ156199', '3.8L Flat-6', '7-Speed DCT', 'RWD', 1, '', 0, 0, 1, '2015-08-01 00:00:00'),
	('1P4GH5539NR738621', '3.8L Flat-6', '7-Speed DCT', 'RWD', 1, '', 0, 0, 1, '2015-08-01 00:00:00'),
	('1LNHL2GC5BR785426', '3.8L Flat-6', '7-Speed DCT', 'RWD', 1, '', 0, 0, 1, '2015-08-01 00:00:00');

-- -----------
-- Transaction
-- -----------
INSERT INTO transaction(type, car_id, client_id, price, employee_id, date_added)
VALUES
	('purchased', '1P4GH5539NR525672', 5, 87990.00, 2, '2015-08-01 00:00:00'),
	('sold', '1P4GH5539NR525672', 3, 99500.00, 3, '2015-08-02 14:32:00'),
	('in-transit', '1P4GH5539NR525672', 3, NULL, 5, '2015-08-02 21:10:00'),
	('delivered', '1P4GH5539NR525672', 3, NULL, 5, '2015-08-03 18:00:00'),

	('purchased', '1GTV2UEH3EZ156199', 4, 27000.00, 2, '2015-08-01 00:00:00'),
	('sold', '1GTV2UEH3EZ156199', 1, 35800.00, 3, '2015-08-02 17:59:00'),
	('in-transit', '1GTV2UEH3EZ156199', 1, NULL, 6, '2015-08-03 14:10:00'),

	('purchased', '1P4GH5539NR738621', 4, 95250.00, 2, '2015-08-01 00:00:00'),
	('sold', '1P4GH5539NR738621', 2, 115800.00, 3, '2015-08-03 13:07:00'),

	('purchased', '1LNHL2GC5BR785426', 5, 95250.00, 2, '2015-08-01 00:00:00');

-- Proof of delivery attached
UPDATE transaction SET document='1P4GH5539NR525672-POD.txt' WHERE id=4;