<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * User: holth
 * Date: 2015-08-05
 */

class Transaction extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaction_model');
		$this->load->model('car_model');
		$this->load->model('client_model');
		$this->load->model('country_model');

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

	private function _load_form_helper()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		// Validation display style
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		// Rules
		$this->form_validation->set_rules('sell_price', 'Price', 'required');
		$this->form_validation->set_rules('userfile', 'Proof of delivery', 'required');
	}

	private function _load_customer_validation()
	{
		$this->form_validation->set_rules('client_name', 'Customer name', 'required');
		$this->form_validation->set_rules('client_address', 'Customer address', 'required');
		$this->form_validation->set_rules('client_phone', 'Customer phone', 'required');
		$this->form_validation->set_rules('client_country', 'Customer country', 'required');
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

	public function sell($VIN)
	{
		$this->_require_salesman();
		$this->_load_form_helper();
		if ($this->input->post('client_id') == 'X') {
			$this->_load_customer_validation();
		}

		if ($this->form_validation->run() == false) { 
			$data['car'] = $this->car_model->get($VIN)[0];
			$data['clients'] = $this->client_model->get();
			$data['countries'] = $this->country_model->get();

			$this->load->view('home/inc/header_view');
			$this->load->view('transaction/sell', $data);
			$this->load->view('home/inc/footer_view');
		} else {

			if ($this->input->post('client_id') == "X") {
				$data['client'] = $this->_get_client_input();
				$client_id = $this->client_model->insert($data['client']);
			} else {
				$client_id = $this->post->input('client_id');
			}

			$price = $this->input->post('sell_price') + $this->input->post('additional_fees');
			$tax = 0.15 * $price;

			$data['transaction'] = array(
					'type' 			=> 'sold',
					'car_id' 		=> $VIN,
					'client_id' => $client_id,
					'price' 		=> $price,
					'tax' 			=> $tax,
					'employee_id' => $this->session->userdata('employee_id')
				);

			$this->transaction_model->insert($data['transaction']);

			redirect('/home/');
		}

	}

	public function for_delivery($VIN)
	{
		$this->_require_login();
		$data['car'] = $this->car_model->get($VIN)[0];
		$data['transaction'] = array(
				'type' => 'in-transit',
				'car_id' => $VIN,
				'client_id' => $data['car']['client_id'],
				'employee_id' => $this->session->userdata('employee_id')
			);
		$this->transaction_model->insert($data['transaction']);
		redirect('/home/');
	}

	public function delivered($VIN)
	{
		$this->_require_login();

		$data['car'] = $this->car_model->get($VIN)[0];
		$data['transaction'] = array(
					'type' => 'delivered',
					'car_id' => $VIN,
					'client_id' => $data['car']['client_id'],
					'employee_id' => $this->session->userdata('employee_id')
				);

		$data['transaction_id'] = $this->transaction_model->insert($data['transaction']);

		$this->load->view('home/inc/header_view');
		$this->load->view('transaction/delivered', $data);
		$this->load->view('home/inc/footer_view');

	}

	public function attach_proof_of_delivery($id)
	{
		if (empty($_FILES['userfile']['name'])) {
				// User did NOT attach a file!
				redirect('/home/');
			} else {
				// User attached a file!
				if ($this->_attach_document()) {
					// File is uploaded successfully!
					// Get file data
					$file = $this->upload->data();
					$this->transaction_model->update(['document' => $file['file_name']], $id);
					redirect('/home/');
				} else {
					echo "Oops, something went wrong! The file you attached cannot be uploaded.";
				}
			}
	}

	public function delete($id)
	{
		$this->transaction_model->delete($id);
		redirect('home');
	}
	
	public function _attach_document()
	{
		$config =  array(
      'upload_path'     => './uploads/transaction/',
      'allowed_types' 		=> 'gif|jpg|png|pdf|txt|doc|docx|xls|xlsx',
      'overwrite'       => FALSE
    );

    $this->load->library('upload', $config);

		if ($this->upload->do_upload()) {
			return true;
		} else {
			return false;
		}
	}
}