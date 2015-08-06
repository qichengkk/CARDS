<?php

/*
 * User: holth
 * Date: 2015-07-28
 */

class Car_model extends CI_Model
{

	public function get($VIN = null)
	{
		$this->db->order_by('date_added', 'DESC');
		
		if ($VIN === null) {
			$query = $this->db->get('car');
		} else if (is_array($VIN)) {
			$query = $this->db->get_where('car', $VIN);
		} else {
			$query = $this->db->get_where('car', ['VIN' => $VIN]);
		}

		return $query->result_array();
	}

	public function get_all()
	{
		$query = $this->db->query("
				SELECT
					c.VIN AS VIN, c.year AS year, c.mileage AS mileage, c.color AS color, c.estimated_price AS estimated_price, c.description AS description,
					m.name AS model, m.serie AS serie, m.type AS type,
					ma.name AS make,
					f.engine AS engine, f.transmission AS transmission, f.cruise_control AS cruise_control, f.powertrain AS powertrain, f.city_fuel_consumption AS cfc, f.hw_fuel_consumption AS hfc, f.air_conditioner AS ac, f.interior AS interior, f.sunroof AS sunroof, f.satellite_radio AS radio, f.airbags AS airbags,
					t.type AS transaction, t.client_id AS client_id, t.price AS price, t.tax AS tax, t.employee_id AS employee_id, t.document AS document, t.date_added AS date,
					cl.name AS client_name, cl.address AS client_address, cl.phone AS client_phone, cl.country AS client_country,
					e.name AS employee_name
				FROM car AS c
					LEFT JOIN model AS m ON m.id = c.model_id
					LEFT JOIN make AS ma ON ma.id = m.make_id
					LEFT JOIN feature AS f ON f.car_id = c.VIN
					LEFT JOIN (
							SELECT t1.*
							FROM transaction AS t1
								JOIN (
										SELECT max(id) AS id, car_id
										FROM transaction
										GROUP BY car_id
									) AS t2 ON t1.id = t2.id
						) AS t ON t.car_id = c.VIN
					LEFT JOIN client AS cl ON cl.CId = t.client_id
					LEFT JOIN employee AS e ON e.EId = t.employee_id
				ORDER BY t.date_added ASC
			");

		return $query->result_array();
	}

	public function get_all_inventory()
	{
		$query = $this->db->query("
				SELECT
					c.VIN AS VIN, c.year AS year, c.mileage AS mileage, c.color AS color, c.estimated_price AS estimated_price, c.description AS description,
					m.name AS model, m.serie AS serie, m.type AS type,
					ma.name AS make,
					f.engine AS engine, f.transmission AS transmission, f.cruise_control AS cruise_control, f.powertrain AS powertrain, f.city_fuel_consumption AS cfc, f.hw_fuel_consumption AS hfc, f.air_conditioner AS ac, f.interior AS interior, f.sunroof AS sunroof, f.satellite_radio AS radio, f.airbags AS airbags,
					t.type AS transaction, t.client_id AS client_id, t.price AS price, t.tax AS tax, t.employee_id AS employee_id, t.document AS document, t.date_added AS date,
					cl.name AS client_name, cl.address AS client_address, cl.phone AS client_phone, cl.country AS client_country,
					e.name AS employee_name
				FROM car AS c
					LEFT JOIN model AS m ON m.id = c.model_id
					LEFT JOIN make AS ma ON ma.id = m.make_id
					LEFT JOIN feature AS f ON f.car_id = c.VIN
					LEFT JOIN (
							SELECT t1.*
							FROM transaction AS t1
								JOIN (
										SELECT max(id) AS id, car_id
										FROM transaction
										GROUP BY car_id
									) AS t2 ON t1.id = t2.id
						) AS t ON t.car_id = c.VIN
					LEFT JOIN client AS cl ON cl.CId = t.client_id
					LEFT JOIN employee AS e ON e.EId = t.employee_id
				WHERE t.type = 'purchased'
				ORDER BY t.date_added ASC
			");

		return $query->result_array();
	}

	public function get_all_sold()
	{
		$query = $this->db->query("
				SELECT
					c.VIN AS VIN, c.year AS year, c.mileage AS mileage, c.color AS color, c.estimated_price AS estimated_price, c.description AS description,
					m.name AS model, m.serie AS serie, m.type AS type,
					ma.name AS make,
					f.engine AS engine, f.transmission AS transmission, f.cruise_control AS cruise_control, f.powertrain AS powertrain, f.city_fuel_consumption AS cfc, f.hw_fuel_consumption AS hfc, f.air_conditioner AS ac, f.interior AS interior, f.sunroof AS sunroof, f.satellite_radio AS radio, f.airbags AS airbags,
					t.type AS transaction, t.client_id AS client_id, t.price AS price, t.tax AS tax, t.employee_id AS employee_id, t.document AS document, t.date_added AS date,
					cl.name AS client_name, cl.address AS client_address, cl.phone AS client_phone, cl.country AS client_country,
					e.name AS employee_name
				FROM car AS c
					LEFT JOIN model AS m ON m.id = c.model_id
					LEFT JOIN make AS ma ON ma.id = m.make_id
					LEFT JOIN feature AS f ON f.car_id = c.VIN
					LEFT JOIN (
							SELECT t1.*
							FROM transaction AS t1
								JOIN (
										SELECT max(id) AS id, car_id
										FROM transaction
										GROUP BY car_id
									) AS t2 ON t1.id = t2.id
						) AS t ON t.car_id = c.VIN
					LEFT JOIN client AS cl ON cl.CId = t.client_id
					LEFT JOIN employee AS e ON e.EId = t.employee_id
				WHERE t.type = 'sold' OR t.type = 'in-transit' OR t.type = 'delivered'
				ORDER BY t.date_added ASC
			");

		return $query->result_array();
	}

	public function get_all_delivered()
	{
		$query = $this->db->query("
				SELECT
					c.VIN AS VIN, c.year AS year, c.mileage AS mileage, c.color AS color, c.estimated_price AS estimated_price, c.description AS description,
					m.name AS model, m.serie AS serie, m.type AS type,
					ma.name AS make,
					f.engine AS engine, f.transmission AS transmission, f.cruise_control AS cruise_control, f.powertrain AS powertrain, f.city_fuel_consumption AS cfc, f.hw_fuel_consumption AS hfc, f.air_conditioner AS ac, f.interior AS interior, f.sunroof AS sunroof, f.satellite_radio AS radio, f.airbags AS airbags,
					t.type AS transaction, t.client_id AS client_id, t.price AS price, t.tax AS tax, t.employee_id AS employee_id, t.document AS document, t.date_added AS date,
					cl.name AS client_name, cl.address AS client_address, cl.phone AS client_phone, cl.country AS client_country,
					e.name AS employee_name
				FROM car AS c
					LEFT JOIN model AS m ON m.id = c.model_id
					LEFT JOIN make AS ma ON ma.id = m.make_id
					LEFT JOIN feature AS f ON f.car_id = c.VIN
					LEFT JOIN (
							SELECT t1.*
							FROM transaction AS t1
								JOIN (
										SELECT max(id) AS id, car_id
										FROM transaction
										GROUP BY car_id
									) AS t2 ON t1.id = t2.id
						) AS t ON t.car_id = c.VIN
					LEFT JOIN client AS cl ON cl.CId = t.client_id
					LEFT JOIN employee AS e ON e.EId = t.employee_id
				WHERE t.type = 'delivered'
				ORDER BY t.date_added ASC
			");

		return $query->result_array();
	}

	public function insert($data)
	{
		$this->db->insert('car', $data);
		return $this->db->insert_id();
	}

	public function update($data, $VIN)
	{
	    $this->db->where(['VIN' => $VIN]);
	    $this->db->update('car', $data);
	    return $this->db->affected_rows();
	}

	public function delete($VIN)
	{
		$this->db->delete('car', ['VIN' => $VIN]);
		return $this->db->affected_rows();
	}

}

?>