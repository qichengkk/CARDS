<?php

/*
 * User: holth
 * Date: 2015-08-04
 */

class Transaction_model extends CI_Model
{

	public function get($id = null)
	{	
		if ($id === null) {
			$query = $this->db->get('transaction');
		} else if (is_array($id)) {
			$query = $this->db->get_where('transaction', $id);
		} else {
			$query = $this->db->get_where('transaction', ['id' => $id]);
		}

		return $query->result_array();
	}

	public function get_by_car_id($VIN)
	{
		$query = $this->db->get_where('transaction', ['car_id' => $VIN]);

		return $query->result_array();
	}

	public function insert($data)
	{
		$this->db->insert('transaction', $data);
		return $this->db->insert_id();
	}

	public function update($data, $id)
	{
	    $this->db->where(['id' => $id]);
	    $this->db->update('transaction', $data);
	    return $this->db->affected_rows();
	}

	public function delete($id)
	{
		$this->db->delete('transaction', ['id' => $id]);
		return $this->db->affected_rows();
	}

}