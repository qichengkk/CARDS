<?php
/**
 * Created by PhpStorm.
 * User: qichenglao
 * Date: 2015-07-29
 * Time: 12:46 PM
 */

class Client extends CI_Controller {

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

    private function _require_manager_sales()
    {
        $this->_require_login();
        if($this->session->userdata('role') != "Manager" && $this->session->userdata('role') != "Salesman") {
            redirect('/home');
        }
    }


    public function index()
    {
        $this->_require_manager_sales();

        $this->load->view('home/inc/header_view');
        $this->load->view('client/client_view');
        $this->load->view('home/inc/footer_view');
    }

/*    public function add()
    {
        $this->_require_manager_sales();

        $this->load->view('home/inc/header_view');
        $this->load->view('employee/add_employee_view');
        $this->load->view('home/inc/footer_view');

    }

    public function show($employee_id)
    {
        $this->_require_manager_sales();

        $this->load->model('employee_model');
        $result = $this->employee_model->get($employee_id);

        // set profile image with gravatar
        $grav_url = $this->get_gravatar($result[0]['email'], 540);

        $data = array(
            'id_show' => $employee_id,
            'name_show' => $result[0]['name'],
            'email_show' => $result[0]['email'],
            'role_show' => $result[0]['role'],
            'date_added_show' => $result[0]['date_added'],
            'date_modified_show' => $result[0]['date_modified'],
            'image_url' => $grav_url
        );

        $this->load->view('home/inc/header_view');
        $this->load->view('employee/show_employee_view', $data);
        $this->load->view('home/inc/footer_view');

    }


    public function update($employee_id)
    {
        $this->_require_manager_sales();

        if($this->session->userdata('role') != "Manager" && $this->session->userdata('employee_id') != $employee_id) {
            redirect('/home');
        }

        $this->load->model('employee_model');
        $result = $this->employee_model->get($employee_id);

        // set profile image with gravatar
        $grav_url = $this->get_gravatar($result[0]['email'], 540);

        $data = array(
            'id_update' => $employee_id,
            'name_update' => $result[0]['name'],
            'email_update' => $result[0]['email'],
            'role_update' => $result[0]['role'],
            'image_url' => $grav_url
        );

        $this->load->view('home/inc/header_view');
        //$this->load->view('employee/update_employee_view', ['id_update' => $employee_id]);
        $this->load->view('employee/update_employee_view', $data);
        $this->load->view('home/inc/footer_view');


    }*/


}