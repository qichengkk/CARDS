<?php
/**
 * Created by PhpStorm.
 * User: qichenglao
 * Date: 2015-08-05
 * Time: 10:07 PM
 */
class Country_model extends CI_Model
{
    /**
     *
     * @useage
     * Signle:  $this->country_model->get(2);
     * All:     $this->country_model->get();
     *
     */
    public function get($country_name = null)
    {
        if ($country_name === null) {
            $query = $this->db->get('country');
        } else if (is_array($country_name)) {
            $query = $this->db->get_where('country', $country_name);
        } else {
            $query = $this->db->get_where('country', ['name' => $country_name]);
        }
        return $query->result_array();
    }
    public function insert($data)
    {
        $this->db->insert('country', $data);
        return $this->db->insert_id();
    }
    public function delete($country_name)
    {
        $this->db->delete('country', ['name' => $country_name]);
        return $this->db->affected_rows();
    }
}