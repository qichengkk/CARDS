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

    public function get_car_by_client($client_id)
    {
        $query = $this->db->query("
            SELECT t.type AS type, c.vin, c.year, make.name AS make_name, model.name, model.serie, t.date_added
            FROM transaction AS t, car AS c, model, make
            WHERE (t.type = 'purchased' OR t.type = 'sold') AND t.client_id = '".$client_id."'
                    AND c.VIN = t.car_id AND c.model_id = model.id AND model_id = make.id");

        $result = $query->result_array();

        //print_r($result); return;

        return $result;
    }

    /**
     *
     * @parameter array $data
     *
     * @usage $result = $this->client_model->insert(['name' => 'John']);
     *
     */
    public function insert($data)
    {
        $this->db->insert('client', $data);
        return $this->db->insert_id();

    }

    /**
     *
     * @parameter array $data
     *
     * @usage $result = $this->client_model->update(['name' => 'Peggy'], 3);
     *
     */
    public function update($data, $client_id)
    {
        $this->db->where(['CId' => $client_id]);
        $this->db->update('client', $data);
        return $this->db->affected_rows();
    }

    /**
     *
     * @parameter type client_id
     *
     * @usage $result = $this->client_model->delete(1);
     *
     */
    public function delete($client_id)
    {
        $this->db->delete('client', ['CId' => $client_id]);
        return $this->db->affected_rows();
    }


}
