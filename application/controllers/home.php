<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: qichenglao
 * Date: 2015-07-20
 * Time: 5:34 PM
 */


class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('employee_id') == false) {
            $this->logout();
        }

    }

    public function index()
    {
        $this->load->view('home/inc/header_view');
        $this->load->view('home/home_view');
        $this->load->view('home/inc/footer_view');
    }

    public function logout()
    {
        //session_destroy();
        $this->session->sess_destroy();
        redirect('/');
    }

    public function test()
    {
        echo 1;
        //$q = $this->db->get('employee');
        $q = $this->db->get_where('employee', ['eid' => 1]);
        print_r($q->result());
    }


}