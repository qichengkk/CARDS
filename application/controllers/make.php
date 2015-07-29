<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * User: holth
 * Date: 2015-07-26
 */

class Make extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('make_model');
	}

	private function _require_login()
	{
		if ($this->session->userdata('employee_id') == false) {
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

	/*
	 * Helper function provided by CodeIgniter
	 * to be load when forms are used!
	 */
	private function _load_form_helper()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_rules('name', 'Name', 'required');
	}

	public function index()
	{
		$this->_require_manager();

		$data['make'] = $this->make_model->get();

		$this->load->view('home/inc/header_view');
		$this->load->view('make/index', $data);
		$this->load->view('home/inc/footer_view');
	}

	public function add()
	{
		$this->_require_manager();

		$this->_load_form_helper();

		if ($this->form_validation->run() == false) {
			$this->load->view('home/inc/header_view');
			$this->load->view('make/add');
			$this->load->view('home/inc/footer_view');
		} else {
			$data = array('name' => $this->input->post('name'));
			$this->make_model->insert($data);
			redirect('/make/');
		}
	}

	public function delete()
	{
		$make_id = $this->input->get('id');
		$this->make_model->delete($make_id);
		redirect('/make/');
	}

}

?>