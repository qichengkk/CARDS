<?php
/**
 * Created by PhpStorm.
 * User: qichenglao
 * Date: 2015-07-21
 * Time: 2:58 PM
 */

class Employee_model extends CI_Model
{
    /**
     *
     * @useage
     * Signle:  $this->employee_model->get(2);
     * All:     $this->employee_model->get();
     *
     */
    public function get($employee_id = null)
    {

        if($employee_id === null) {
            $query = $this->db->get('employee');
        } else if(is_array($employee_id)) {
            $query = $this->db->get_where('employee', $employee_id);
        }
        else {
            $query = $this->db->get_where('employee', ['eid' => $employee_id]);
        }

        return $query->result_array();


    }

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

    public function update()
    {

    }

    public function delete()
    {

    }
}