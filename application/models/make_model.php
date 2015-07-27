<?php

/*
 * User: holth
 * Date: 2015-07-26
 */

class Make_model extends CI_Model
{

	public function get($make_id = null)
	{
		if ($make_id === null) {
			$query = $this->db->get('make');
		} else if (is_array($make_id)) {
			$query = $this->db->get_where('make', $make_id);
		} else {
			$query = $this->db->get_where('make', ['id' => $make_id]);
		}

		return $query->result_array();
	}

	public function insert($data)
	{
		$this->db->insert('make', $data);
		return $this->db->insert_id();
	}

	public function delete($make_id)
	{
		$this->db->delete('make', ['id' => $make_id]);
		return $this->db->affected_rows();
	}

}

?>