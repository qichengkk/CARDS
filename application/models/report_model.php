<?php
/**
 * Created by PhpStorm.
 * User: qichenglao
 * Date: 2015-08-08
 * Time: 7:47 PM
 */

class Report_model extends CI_Model
{

    private $months = array(
        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
    );

    /**
     *
     * @useage
     *
     *
     */
    public function get_car_number($status)
    {
        $query = $this->db->query("
            SELECT count(*) AS num
            FROM (
                    SELECT t1.*
                    FROM transaction AS t1
                    JOIN (
                            SELECT max(id) AS id, car_id
                            FROM transaction
                            GROUP BY car_id
                    ) AS t2 ON t1.id = t2.id
            ) AS t
            WHERE t.type = '".$status."'");

        $result = $query->result_array();

        //print_r($result[0]['num']);
        return $result[0]['num'];

    }

    public function get_overall_profit()
    {
        /*
        $query = $this->db->query("
            SELECT sum(r1.income - r2.outcome) AS overall_profit
            FROM (
              SELECT (8 - floor(DATEDIFF(last_day(NOW()), date_added) / 30)) % 12 AS month, sum(price) as income
              FROM transaction
              WHERE type = 'sold'
              GROUP BY (8 - floor(DATEDIFF(last_day(NOW()), date_added) / 30)) % 12) as r1

              NATURAL JOIN

              (SELECT (8 - floor(DATEDIFF(last_day(NOW()), date_added) / 30)) % 12 AS month, sum(price) as outcome
              FROM transaction
              WHERE type = 'purchased'
              GROUP BY (8 - floor(DATEDIFF(last_day(NOW()), date_added) / 30)) % 12) as r2");
        */

        $query = $this->db->query("
            SELECT sum(t1.price - t2.price) AS overall_profit
            FROM
              (SELECT car_id, price, date_added FROM transaction WHERE type = 'sold') AS t1
              LEFT JOIN (SELECT car_id, price FROM transaction WHERE type = 'purchased') AS t2 ON t2.car_id = t1.car_id
          ");

        $result = $query->result_array();

        return $result[0]['overall_profit'];

    }

    public function get_sales_stat()
    {
        //------------------------sales----------------------------------------------------------

        //$current_month = (new DateTime())->format('n');

        $query = $this->db->query("
            SELECT (8 - floor(DATEDIFF(last_day(NOW()), date_added) / 30)) % 12 AS month, count(*) AS num
            FROM transaction
            WHERE type = 'sold'
            GROUP BY (8 - floor(DATEDIFF(last_day(NOW()), date_added) / 30)) % 12");

        $result = $query->result_array();

        foreach ($result as &$r) :
            $r['month'] = $this->months[$r['month'] - 1];
        endforeach;

        return $result;

    }

    public function get_profit_stat()
    {
        //------------------------profit-----------------------------------------------------------
        /*
        $query = $this->db->query("
            SELECT r1.month AS month, (r1.income - r2.outcome) AS profit
            FROM (
              SELECT (8 - floor(DATEDIFF(last_day(NOW()), date_added) / 30)) % 12 AS month, sum(price) as income
              FROM transaction
              WHERE type = 'sold'
              GROUP BY (8 - floor(DATEDIFF(last_day(NOW()), date_added) / 30)) % 12) as r1

              NATURAL JOIN

              (SELECT (8 - floor(DATEDIFF(last_day(NOW()), date_added) / 30)) % 12 AS month, sum(price) as outcome
              FROM transaction
              WHERE type = 'purchased'
              GROUP BY (8 - floor(DATEDIFF(last_day(NOW()), date_added) / 30)) % 12) as r2");
        */
        $query = $this->db->query("
            SELECT (8 - floor(DATEDIFF(last_day(NOW()), t1.date_added) / 30)) % 12 AS month, sum(t1.price - t2.price) AS profit
            FROM
              (SELECT car_id, price, date_added FROM transaction WHERE type = 'sold') AS t1
              LEFT JOIN (SELECT car_id, price FROM transaction WHERE type = 'purchased') AS t2 ON t2.car_id = t1.car_id
            GROUP BY ((8 - floor(DATEDIFF(last_day(NOW()), t1.date_added) / 30)) % 12)
          ");


        $result = $query->result_array();

        foreach ($result as &$r) :
            $r['month'] = $this->months[$r['month'] - 1];
        endforeach;

        return $result;

    }

    public function get_client_number()
    {
        $query = $this->db->query("
            SELECT count(*) as num
            FROM client");

        $result= $query->result_array();

        return $result[0]['num'];
    }

    public function get_clients_stat()
    {
        $query = $this->db->query("
            SELECT country, count(*) AS num
            FROM client
            GROUP BY country");

        $result = $query->result_array();

        return $result;
    }


    public function get_employee_number()
    {
        $query = $this->db->query("
            SELECT count(*) as num
            FROM employee");

        $result= $query->result_array();

        return $result[0]['num'];
    }

    public function get_employees_stat()
    {
        $query = $this->db->query("
            SELECT role, count(*) AS num
            FROM employee
            GROUP BY role");

        $result = $query->result_array();

        return $result;
    }



}