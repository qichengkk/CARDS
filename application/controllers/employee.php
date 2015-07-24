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

    public function update($id_update = null)
    {
        $this->_require_login();

        //$data = array('foo' => 'Hello', 'bar' => 'world');
        //$this->load->view('main_view', $data);

        $this->load->view('home/inc/header_view');
        $this->load->view('employee/update_employee_view', ['id_update' => $id_update]);
        $this->load->view('home/inc/footer_view');


    }




    /*public function test_get()
    {
        $data = $this->employee_model->get(1);
        print_r($data);

    }*/


}