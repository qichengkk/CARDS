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

    private function _require_login()
    {
        if($this->session->userdata('employee_id') == false) {
            redirect('/');
        }
    }

    private function _require_manager()
    {
        $this->_require_login();
        if($this->session->userdata('role') != "Manager") {
            redirect('/home');
        }
    }


    public function index()
    {
        $this->_require_manager();

        $this->load->view('home/inc/header_view');
        $this->load->view('employee/employee_view');
        $this->load->view('home/inc/footer_view');
    }

    public function add()
    {
        $this->_require_manager();

        $this->load->view('home/inc/header_view');
        $this->load->view('employee/add_employee_view');
        $this->load->view('home/inc/footer_view');

    }

    public function update($employee_id = null)
    {
        $this->_require_login();

        $this->load->model('employee_model');
        $result = $this->employee_model->get($employee_id);

        $data = array(
            'id_update' => $employee_id,
            'name_update' => $result[0]['name'],
            'email_update' => $result[0]['email'],
            'role_update' => $result[0]['role']
        );

        $this->load->view('home/inc/header_view');
        //$this->load->view('employee/update_employee_view', ['id_update' => $employee_id]);
        $this->load->view('employee/update_employee_view', $data);
        $this->load->view('home/inc/footer_view');


    }




    /*public function test_get()
    {
        $data = $this->employee_model->get(1);
        print_r($data);

    }*/


}