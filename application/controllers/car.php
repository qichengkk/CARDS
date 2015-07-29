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
		if ($this->session->userdata('role') != "Salesman" && $this->session->userdata('role') != "Manager") {
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

	private function _load_form_helper()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		// Validation display style
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		// Validation rules
		$this->form_validation->set_rules('VIN', 'VIN', 'required');
		$this->form_validation->set_rules('model_id', 'Model', 'required');
		$this->form_validation->set_rules('year', 'Year', 'required');
		$this->form_validation->set_rules('mileage', 'Mileage', 'required');
		$this->form_validation->set_rules('color', 'Color', 'required');
	}

	private function _get_car_input()
	{
		return array(
				'VIN' 						=> $this->input->post('VIN'),
				'model_id' 				=> $this->input->post('model_id'),
				'year' 						=> $this->input->post('year'),
				'mileage' 				=> $this->input->post('mileage'),
				'color' 					=> $this->input->post('color'),
				'estimated_price' => $this->input->post('estimated_price'),
				'description' 		=> $this->input->post('description')
			);
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
		$this->_require_salesman();
		$this->_load_form_helper();

		if ($this->form_validation->run() == false) {

			$data['makes'] = $this->make_model->get();
			$data['models'] = $this->model_model->get();

			$this->load->view('home/inc/header_view');
			$this->load->view('car/add', $data);
			$this->load->view('home/inc/footer_view');
			
		} else {

			$data = $this->_get_car_input();

			$this->car_model->insert($data);
			redirect('/car/');

		}
	}

	public function show($VIN)
	{
		$this->_require_login();

		$data['car'] = $this->car_model->get($VIN)[0];
		$data['model'] = $this->model_model->get($data['car']['model_id'])[0];
		$data['make'] = $this->make_model->get($data['model']['make_id'])[0];

		$this->load->view('home/inc/header_view');
		$this->load->view('car/show', $data);
		$this->load->view('home/inc/footer_view');
	}

	public function update($VIN)
	{
		$this->_require_manager(); 	// Only manager can edit
		$this->_load_form_helper();

		$data['cars'] = $this->car_model->get($VIN);

		if ($this->form_validation->run() == false) {
			$this->load->view('home/inc/header_view');
			$this->load->view('car/update', $data);
			$this->load->view('home/inc/footer_view');
		} else {
			$data = $this->_get_car_input();

			$this->car_model->update($data, $VIN);

			redirect('car');
		}
	}

	public function delete()
	{
		$VIN = $this->input->get('VIN');

		$this->car_model->delete($VIN);

		// Delete pictures

		redirect('car');
	}
}