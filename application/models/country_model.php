<?php

/*
 * User: holth
 * Date: 2015-08-06
 */

class Country_model extends CI_Model
{

	public function get()
	{
		$query = $this->db->get('country');
		return $query->result_array();
	}

}

?>