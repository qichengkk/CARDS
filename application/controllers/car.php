<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * User: holth
 * Date: 2015-07-28
 */

class Car extends CI_Controller
{
	private $colors = array(
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
		$this->load->model('feature_model');
		$this->load->model('client_model');
		$this->load->model('transaction_model');
		$this->load->model('employee_model');
	}

	private function _require_login()
	{
		if ($this->session->userdata('employee_id') == false) {
			redirect('/');
		}
	}

	private function _require_driver()
	{
		$this->_require_login();
		if ($this->session->userdata('role') != "Driver") {
			redirect('/home');
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

	private function _load_supplier_validation()
	{
		$this->form_validation->set_rules('client_name', 'Supplier name', 'required');
		$this->form_validation->set_rules('client_address', 'Supplier address', 'required');
		$this->form_validation->set_rules('client_phone', 'Supplier phone', 'required');
		$this->form_validation->set_rules('client_country', 'Supplier country', 'required');
	}

	private function _load_customer_validation()
	{
		$this->form_validation->set_rules('client_name', 'Customer name', 'required');
		$this->form_validation->set_rules('client_address', 'Customer address', 'required');
		$this->form_validation->set_rules('client_phone', 'Customer phone', 'required');
		$this->form_validation->set_rules('client_country', 'Customer country', 'required');
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

	private function _get_feature_input()
	{
		return array(
				'engine' 					=> $this->input->post('engine'),
				'transmission' 		=> $this->input->post('transmission'),
				'powertrain' 			=> $this->input->post('powertrain'),
				'city_fuel_consumption' => $this->input->post('city_fuel_consumption'),
				'hw_fuel_consumption' 	=> $this->input->post('hw_fuel_consumption'),
				'cruise_control' 	=> $this->input->post('cruise_control'),
				'air_conditioner' => $this->input->post('air_conditioner'),
				'airbags' 				=> $this->input->post('airbags'),
				'satellite_radio' => $this->input->post('satellite_radio'),
				'sunroof' 				=> $this->input->post('sunroof'),
				'interior' 				=> $this->input->post('interior')
			);
	}

	private function _get_client_input()
	{
		return array(
				'name' 		=> $this->input->post('client_name'),
				'type' 		=> $this->input->post('client_type'),
				'address' => $this->input->post('client_address'),
				'country' => $this->input->post('client_country'),
				'phone' 	=> $this->input->post('client_phone')
			);
	}

	public function index()
	{
		$this->_require_manager();

		$data['cars'] = $this->car_model->get_all();

		$this->load->view('home/inc/header_view');
		$this->load->view('car/index', $data);
		$this->load->view('home/inc/footer_view');
	}

	public function inventory()
	{
		$this->_require_salesman();

		$data['cars'] = $this->car_model->get_all_inventory();

		$this->load->view('home/inc/header_view');
		$this->load->view('car/inventory', $data);
		$this->load->view('home/inc/footer_view');
	}

	public function sold()
	{
		$this->_require_login();

		$data['cars'] = $this->car_model->get_all_sold();

		$this->load->view('home/inc/header_view');
		$this->load->view('car/sold', $data);
		$this->load->view('home/inc/footer_view');
	}

	public function delivered()
	{
		$this->_require_driver();

		$data['cars'] = $this->car_model->get_all_delivered();

		$this->load->view('home/inc/header_view');
		$this->load->view('car/delivered', $data);
		$this->load->view('home/inc/footer_view');
	}

	public function add()
	{
		$this->_require_salesman();
		$this->_load_form_helper();
		if ($this->input->post('client_id') == 'X') {
			$this->_load_supplier_validation();
		}

		if ($this->form_validation->run() == false) {

			$data['makes'] = $this->make_model->get();
			$data['models'] = $this->model_model->get();
			$data['colors'] = $this->colors;
			$data['clients'] = $this->client_model->get();

			$this->load->view('home/inc/header_view');
			$this->load->view('car/add', $data);
			$this->load->view('home/inc/footer_view');
			
		} else {

			$data['car'] = $this->_get_car_input();
			$data['feature'] = $this->_get_feature_input();
			$data['feature']['car_id'] = $data['car']['VIN'];

			$this->car_model->insert($data['car']);
			$this->feature_model->insert($data['feature']);

			if ($this->input->post('client_id') == "X") {
				$data['client'] = $this->_get_client_input();
				$client_id = $this->client_model->insert($data['client']);
			} else {
				$client_id = $this->post->input('client_id');
			}

			$data['transaction'] = array(
					'type' 			=> 'purchase',
					'car_id' 		=> $data['car']['VIN'],
					'client_id' => $client_id,
					'price' 		=> $this->input->post('purchase_price'),
					'employee_id' => $this->session->userdata('employee_id')
				);

			$this->transaction_model->insert($data['transaction']);

			redirect('/car/show/'.$data['car']['VIN']);

		}
	}

	public function show($VIN)
	{
		$this->_require_login();

		$data['car'] = $this->car_model->get($VIN)[0];
		$data['model'] = $this->model_model->get($data['car']['model_id'])[0];
		$data['make'] = $this->make_model->get($data['model']['make_id'])[0];
		$data['feature'] = $this->feature_model->get_by_car_id($VIN)[0];
		$data['transactions'] = $this->transaction_model->get_by_car_id($VIN);

		$this->load->view('home/inc/header_view');
		$this->load->view('car/show', $data);
		$this->load->view('home/inc/footer_view');
	}

	public function update($VIN)
	{
		$this->_require_manager(); 	// Only manager can edit
		$this->_load_form_helper();

		$data['car'] = $this->car_model->get($VIN)[0];
		$data['feature'] = $this->feature_model->get_by_car_id($VIN)[0];
		$data['colors'] = $this->colors;

		if ($this->form_validation->run() == false) {
			$this->load->view('home/inc/header_view');
			$this->load->view('car/update', $data);
			$this->load->view('home/inc/footer_view');
		} else {
			$data['car'] = $this->_get_car_input();

			$feature = $this->feature_model->get_by_car_id($VIN)[0];
			$data['feature'] = $this->_get_feature_input();

			$this->car_model->update($data['car'], $VIN);
			$this->feature_model->update($data['feature'], $feature['id']);

			redirect('car/show/'.$VIN);
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