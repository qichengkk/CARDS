<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * User: holth
 * Date: 2015-08-07
 */

class Report extends CI_Controller
{

	public function index()
	{
		$this->load->view('home/inc/header_view');
		$this->load->view('report/index');
		$this->load->view('home/inc/footer_view');
	}

}

?>