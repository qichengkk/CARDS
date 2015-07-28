<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * User: holth
 * Date: 2015-07-28
 */

class Car extends CI_Controller
{
	protected $colors = array(
		'Black', 'Jet Black',
		'Blue', 'Blue Metalic', 'Dark Blue Metalic',
		'Mahogany',
		'Pearl',
		'Red',
		'Silver', 'Silver Metalic',
		'Yellow', 'Racing Yellow',
		'White'
	);

	public function __construct()
	{
		parent::__construct();
		$this->load->model('make_model');
		$this->load->model('model_model');
		$this->load->model('car_model');
	}

	private function _require_login()
	{
		if ($this->session->userdata('employee_id') == false) {
			redirect('/');
		}
	}

	private function _require_salesman()
	{
		$this->_require_login();
		if ($this->session->userdata('role') != "Salesman" || $this->session->userdata('role') != "Manager") {
			redirect('/home');
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
		$this->_require_login();

		$data['cars'] = $this->car_model->get();
		# TOTO: different get by employee role!

		$this->load->view('home/inc/header_view');
		$this->load->view('car/index', $data);
		$this->load->view('home/inc/footer_view');
	}

	public function add()
	{
		//$this->_require_salesman();

		if ($this->form_validation->run() == false) {

			$data['makes'] = $this->make_model->get();
			$data['models'] = $this->model_model->get();

		$this->load->view('home/inc/header_view');
		$this->load->view('car/add', $data);
		$this->load->view('home/inc/footer_view');
			
		} else {

		}
	}
}