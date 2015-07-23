<?php
defined('BASEPATH') OR exit('No direct script access allowed');

######## problem to be solved: employee/login can be accessed public????
/**
 * Created by PhpStorm.
 * User: qichenglao
 * Date: 2015-07-20
 * Time: 5:34 PM
 */


class Employee extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

    }

    private function assert()
    {
        $employee_id = $this->session->userdata('employee_id');
        if(!$employee_id) {
            redirect('/');
        }
    }

    public function index()
    {
        $this->assert();
        $this->load->view('home/inc/header_view');
        $this->load->view('employee/employee_view');
        $this->load->view('home/inc/footer_view');
    }

    public function add()
    {
        $this->assert();
        $this->load->view('home/inc/header_view');
        $this->load->view('employee/add_employee_view');
        $this->load->view('home/inc/footer_view');

    }

    public function update()
    {
        $this->assert();
        $this->load->view('home/inc/header_view');
        $this->load->view('employee/update_employee_view');
        $this->load->view('home/inc/footer_view');

    }




    /*public function test_get()
    {
        $data = $this->employee_model->get(1);
        print_r($data);

    }*/


}