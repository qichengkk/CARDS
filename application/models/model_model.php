<?php

/*
 * User: holth
 * Date: 2015-07-26
 */

class Model_model extends CI_Model
{

	public function get($model_id = null)
	{
		$this->db->order_by('name', 'ASC');
		
		if ($model_id === null) {
			$query = $this->db->get('model');
		} else if (is_array($model_id)) {
			$query = $this->db->get_where('model', $model_id);
		} else {
			$query = $this->db->get_where('model', ['id' => $model_id]);
		}

		return $query->result_array();
	}

	public function insert($data)
	{
		$this->db->insert('model', $data);
		return $this->db->insert_id();
	}

	public function update($data, $model_id)
	{
	    $this->db->where(['id' => $model_id]);
	    $this->db->update('model', $data);
	    return $this->db->affected_rows();
	}

	public function delete($model_id)
	{
		$this->db->delete('model', ['id' => $model_id]);
		return $this->db->affected_rows();
	}

}

?>