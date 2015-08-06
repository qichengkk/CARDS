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
	}

	public function sell($VIN)
	{

	}

	public function for_delivery($VIN)
	{

	}

	public function delivered($VIN)
	{

	}

	public function delete($id)
	{
		$this->transaction_model->delete($id);
		redirect('home');
	}
}