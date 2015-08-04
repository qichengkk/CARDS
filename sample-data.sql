-- Sample for CARDS
-- ----------------
-- COMP5531, Files & Databses
-- by Amritpal Singh, Dagoberto Ramirez, 
-- Gagan Sodhi, Lee Ho & Qi Cheng Lao
-- on 2015-08-04
-- ----------------

-- Car Table
-- ---------
-- VIN: 						use this website www.randomvin.com.
-- model_id: 				you must input the model id based on 
-- 									what's already in the database, see bellow.
-- estimated_price: the list price of the car.
-- description: 		use some meaning full description similar 
-- 									to those used on car sale website.
-- ---------
-- Visit the following website for inspiration: AutoTrader.ca, AutoHebdo.net, ...
-- Here a sample SQL code:
INSERT INTO car (VIN, model_id, year, mileage, color, estimated_price, description)
VALUES ('2P4GH5539NR525672', 12, 2012, 24910, 'Black', 101900.00, 'New Pirelli P-Zero tires on custom after-market wheels, orignal wheels also included. Meticulously maintained and collection worthy.');

/* ****
The the list of model for porsche, please use the  id!
+----+-------------+-------+----------+-----------+---------+
| id | name        | serie | type     | from_year | to_year |
+----+-------------+-------+----------+-----------+---------+
|  3 | Boxster     |       | Roadster |      1996 |    2017 |
|  4 | Boxster     | S     | Roadster |      1996 |    2017 |
|  5 | Boxster     | GTS   | Roadster |      1996 |    2017 |
|  6 | Cayman      |       | Coupe    |      2006 |    2017 |
|  7 | Cayman      | S     | Coupe    |      2006 |    2017 |
|  8 | Cayman      | GTS   | Coupe    |      2006 |    2017 |
|  9 | Cayman      | GT4   | Coupe    |      2006 |    2017 |
| 10 | 911 Carrera |       | Coupe    |      1964 |    2017 |
| 11 | 911 Carrera | S     | Coupe    |      1964 |    2017 |
| 12 | 911 Carrera | GTS   | Coupe    |      1964 |    2017 |
| 13 | Panamera    |       | Coupe    |      1999 |    2017 |
| 14 | Panamera    | 4     | Coupe    |      1999 |    2017 |
| 15 | Panamera    | S     | Coupe    |      1999 |    2017 |
| 16 | Panamera    | 4S    | Coupe    |      1999 |    2017 |
| 17 | Panamera    | GTS   | Coupe    |      1999 |    2017 |
| 20 | Macan       | S     | SUV      |      2014 |    2017 |
| 21 | Macan       | Turbo | SUV      |      2014 |    2017 |
| 22 | Cayenne     |       | SUV      |      2002 |    2017 |
| 23 | Cayenne     | S     | SUV      |      2002 |    2017 |
| 24 | Cayenne     | GTS   | SUV      |      2002 |    2017 |
+----+-------------+-------+----------+-----------+---------+

* Note: "from_year" is the year when this model is available in the market. "to_year" is the year when the model is discontinued.

* If you want to add a Model on in this list, feel free to do so! Please use the following command to insert the a new Model.

INSERT INTO model (make_id, name, serie, type, from_year, to_year)
VALUES
  ('1', 'Boxster', '', 'Roadster', '1996', '2017');
*/


-- Client Table
-- ------------
-- type: 		must be {'auction', 'showroom', 'dealer', 'owner'}
-- ------------
-- Here a sample SQL code:
INSERT INTO client (name, type, address, country, phone, date_added, date_modified)
VALUES
  ('Palais des congrès de Montréal', 'showroom', '201, avenue Viger West, Montreal', 'Canada', '514-123-4567', NOW(), NOW()),