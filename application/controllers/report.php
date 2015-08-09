<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * User: holth
 * Date: 2015-08-07
 */

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('report_model');
    }

	public function index()
	{
        //---------------for charts and graphs-------------------------------------
		$data['sales'] = $this->report_model->get_sales_stat();
        $data['profit'] = $this->report_model->get_profit_stat();
        $data['clients'] = $this->report_model->get_clients_stat();
        $data['employees'] = $this->report_model->get_employees_stat();


        //----------------single values only---------------------------------------
        $data['car_inventory'] = $this->report_model->get_car_number("purchased");
        $data['car_sold'] = $this->report_model->get_car_number("sold");
        $data['overall_profit'] = $this->report_model->get_overall_profit();;

        $data['client_num'] = $this->report_model->get_client_number();
        $data['employee_num'] = $this->report_model->get_employee_number();

        //print_r($data['sales']); return;
        $this->load->view('home/inc/header_view');
        $this->load->view('report/index', $data);
        $this->load->view('home/inc/footer_view');
	}





}

