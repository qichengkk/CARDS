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

    private function _require_salesman()
    {
        $this->_require_login();
        if ($this->session->userdata('role') != "Salesman" && $this->session->userdata('role') != "Manager") {
            redirect('/home');
        }
    }

    /*private function _require_manager()
    {
        $this->_require_login();
        if($this->session->userdata('role') != "Manager") {
            redirect('/home');
        }
    }*/


    public function index()
    {
        $this->_require_salesman();

        $this->load->view('home/inc/header_view');
        $this->load->view('client/client_view');
        $this->load->view('home/inc/footer_view');
    }

    public function add()
    {
        $this->_require_salesman();

        $this->load->model('country_model');
        $data['countries'] = $this->country_model->get();

        $this->load->view('home/inc/header_view');
        $this->load->view('client/add_client_view', $data);
        $this->load->view('home/inc/footer_view');

    }




    public function show($client_id)
    {
        $this->_require_salesman();

        $this->load->model('client_model');
        $result = $this->client_model->get($client_id);


        $data = array(
            'id' => $result[0]['CId'],
            'name' => $result[0]['name'],
            'type' => $result[0]['type'],
            'address' => $result[0]['address'],
            'country' => $result[0]['country'],
            'phone' => $result[0]['phone'],
        );

        if($data['country'] == "Canada")
            $data['cut_off_year'] = "Unlimited";
        else {
            $this->load->model('country_model');
            $data['cut_off_year'] = $this->country_model->get($data['country'])[0]['cut_off_year'];
        }
        
        $this->load->view('home/inc/header_view');
        $this->load->view('client/show_client_view', $data);
        $this->load->view('home/inc/footer_view');

    }


    public function update($client_id)
    {
        $this->_require_salesman();

        $this->load->model('client_model');
        $result = $this->client_model->get($client_id);

        $data = array(
            'id_update' => $result[0]['CId'],
            'name_update' => $result[0]['name'],
            'type_update' => $result[0]['type'],
            'address_update' => $result[0]['address'],
            'country_update' => $result[0]['country'],
            'phone_update' => $result[0]['phone'],
        );

        $this->load->model('country_model');
        $data['countries'] = $this->country_model->get();


        $this->load->view('home/inc/header_view');
        $this->load->view('client/update_client_view', $data);
        $this->load->view('home/inc/footer_view');


    }


}