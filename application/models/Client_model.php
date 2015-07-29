<?php
/**
 * Created by PhpStorm.
 * User: qichenglao
 * Date: 2015-07-29
 * Time: 3:56 PM
 */

class Client_model extends CI_Model
{
    /**
     *
     * @useage
     * Signle:  $this->client_model->get(2);
     * All:     $this->client_model->get();
     *
     */
    public function get($client_id = null)
    {

        if($client_id === null) {
            $query = $this->db->get('client');
        } else if(is_array($client_id)) {
            $query = $this->db->get_where('client', $client_id);
        }
        else {
            $query = $this->db->get_where('client', ['CId' => $client_id]);
        }

        return $query->result_array();


    }

//----------------------------- to do ----------------------------------------------------------------
    /**
     *
     * @parameter array $data
     *
     * @usage $result = $this->employee_model->insert(['name' => 'John']);
     *
     */
    public function insert($data)
    {
        $this->db->insert('employee', $data);
        return $this->db->insert_id();

    }

    /**
     *
     * @parameter array $data
     *
     * @usage $result = $this->employee_model->update(['name' => 'Peggy'], 3);
     *
     */
    public function update($data, $employee_id)
    {
        $this->db->where(['EId' => $employee_id]);
        $this->db->update('employee', $data);
        return $this->db->affected_rows();
    }

    /**
     *
     * @parameter type employee_id
     *
     * @usage $result = $this->employee_model->delete(1);
     *
     */
    public function delete($employee_id)
    {
        $this->db->delete('employee', ['EId' => $employee_id]);
        return $this->db->affected_rows();
    }


}