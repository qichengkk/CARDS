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
            $query = $this->db->get_where('employee', ['EId' => $employee_id]);
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