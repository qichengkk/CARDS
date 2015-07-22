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
        $this->load->model('employee_model');

    }

    public function assert()
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


    public function login()
    {
        $this->output->set_content_type('application_json');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('pwd', 'Password', 'required');

        if($this->form_validation->run() == false) {
            $this->output->set_output(json_encode(['result' => 0, 'error' => $this->form_validation->error_array()]));
            return false;
        }

        $email = $this->input->post('email');
        $pwd = $this->input->post('pwd');

        $result = $this->employee_model->get([
            'email' => $email,
            'password' => hash('sha256', $pwd. SALT)
        ]);

        if($result) {
            $this->session->set_userdata(['employee_id' => $result[0]['EId']]);
            $this->output->set_output(json_encode(['result' => 1]));
            return false;
        }

        //echo validation_errors();
        //$this->output->set_output(json_encode(['result' => 0]));
        //$this->form_validation->set_message('Password', 'does not match');

        $this->output->set_output(json_encode(['result' => 0, 'error' => ['The Login does not match.']]));


        //die;
        /*$this->session->set_userdata([
            'employee_id' => 1
        ]);
        print_r($this->session->all_userdata());*/


    }

    public function register()
    {
        $this->output->set_content_type('application_json');

        $this->form_validation->set_rules('name', 'Name', 'required|max_length[16]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[employee.email]');
        $this->form_validation->set_rules('pwd', 'Password', 'required|min_length[4]');

        if($this->form_validation->run() == false) {
            $this->output->set_output(json_encode(['result' => 0, 'error' => $this->form_validation->error_array()]));
            return false;
        }

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $pwd = $this->input->post('pwd');
        $role= $this->input->post('role');

        $employee_id = $this->employee_model->insert([
            'name' => $name,
            'password' => hash('sha256', $pwd. SALT),
            'email' => $email,
            'role' => $role
        ]);

        if($employee_id) {
            $this->output->set_output(json_encode(['result' => 1]));
            return false;
        }

        $this->output->set_output(json_encode(['result' => 0, 'error' => 'Employee not created.']));

    }


    /*public function test_get()
    {
        $data = $this->employee_model->get(1);
        print_r($data);

    }*/


}