<?php

/*
 * User: holth
 * Date: 2015-07-28
 */

class Car_model extends CI_Model
{

	public function get($VIN = null)
	{
		if ($VIN === null) {
			$query = $this->db->get('car');
		} else if (is_array($car_id)) {
			$query = $this->db->get_where('car', $VIN);
		} else {
			$query = $this->db->get_where('car', ['VIN' => $VIN]);
		}

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