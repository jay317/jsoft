<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
	if($this->session->userdata("username"))
		{
			redirect('mainController/dashboard');
		}
		$this->load->view('login');
	}
}
