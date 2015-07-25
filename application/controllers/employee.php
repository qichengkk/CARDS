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

    public function show($employee_id)
    {
        $this->_require_manager();

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
        $this->_require_login();

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


    }

    /**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     *
     * @param string $email The email address
     * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
     * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
     * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
     * @param boole $img True to return a complete IMG tag False for just the URL
     * @param array $atts Optional, additional key/value attributes to include in the IMG tag
     * @return String containing either just a URL or a complete image tag
     * @source http://gravatar.com/site/implement/images/php/
     */
    private function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
        $url = 'http://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }




    /*public function test_get()
    {
        $data = $this->employee_model->get(1);
        print_r($data);

    }*/


}