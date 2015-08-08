<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * User: holth
 * Date: 2015-08-07
 */

class Report extends CI_Controller
{
    private $months = array(
        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaction_model');
        $this->load->model('car_model');
        $this->load->model('client_model');
        $this->load->model('employee_model');
    }

	public function index()
	{
		$this->sales_profit();
	}

    public function sales_profit()
    {
        //------------------------sales----------------------------------------------------------

        //$current_month = (new DateTime())->format('n');

        $query = $this->db->query("
            SELECT (8 - floor(DATEDIFF(last_day(NOW()), date_added) / 30)) % 12 AS month, count(*) AS num
            FROM transaction
            WHERE type = 'sold'
            GROUP BY (8 - floor(DATEDIFF(last_day(NOW()), date_added) / 30)) % 12");

        $result = $query->result_array();
        $max_num = 0;

        foreach ($result as &$m) :
            $m['month'] = $this->months[$m['month'] - 1];
            if($m['num'] > $max_num) {
                $max_num = $m['num'];
            }
        endforeach;

        $data['sales'] = $result;
        $data['max_num'] = $max_num;
        //print_r(($data)); return;

        //------------------------profit-----------------------------------------------------------
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


        $result = $query->result_array();
        $max_p = 0;
        foreach ($result as &$m) :
            $m['month'] = $this->months[$m['month'] - 1];
            if($m['profit'] > $max_p) {
                $max_p = $m['profit'];
            }
        endforeach;

        $data['profit'] = $result;
        $data['max_p'] = $max_p;

        //print_r($data);return;

        $this->load->view('home/inc/header_view');
        $this->load->view('report/index', $data);
        $this->load->view('home/inc/footer_view');


    }

    public function employee_performance()
    {

    }

}

