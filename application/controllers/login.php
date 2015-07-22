<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: qichenglao
 * Date: 2015-07-20
 * Time: 5:34 PM
 */


class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $employee_id = $this->session->userdata('employee_id');
        if($employee_id) {
            redirect('home');
        }

    }


    public function index()
    {
        $this->load->view('login/inc/header_view');
        $this->load->view('login/login_view');
        $this->load->view('login/inc/footer_view');
    }


//    public function code()
//    {
//        $this->load->library("encrypt");
//        //$this->encrypt->
//        echo hash('sha256', 'admin'. SALT);
//    }



    public function test()
    {
        echo 1;
        //$q = $this->db->get('employee');
        $q = $this->db->get_where('employee', ['eid' => 1]);
        print_r($q->result());
    }


}