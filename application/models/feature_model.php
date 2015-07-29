<?php

/*
 * User: holth
 * Date: 2015-07-28
 */

class Feature_model extends CI_Model
{

	public function get($id = null)
	{	
		if ($id === null) {
			$query = $this->db->get('feature');
		} else if (is_array($id)) {
			$query = $this->db->get_where('feature', $id);
		} else {
			$query = $this->db->get_where('feature', ['id' => $id]);
		}

		return $query->result_array();
	}

	public function get_by_car_id($VIN)
	{
		$query = $this->db->get_where('feature', ['car_id' => $VIN]);
		return $query->result_array();
	}

	public function insert($data)
	{
		$this->db->insert('feature', $data);
		return $this->db->insert_id();
	}

	public function update($data, $id)
	{
	    $this->db->where(['id' => $id]);
	    $this->db->update('feature', $data);
	    return $this->db->affected_rows();
	}

	public function delete($id)
	{
		$this->db->delete('feature', ['id' => $id]);
		return $this->db->affected_rows();
	}

}

?>