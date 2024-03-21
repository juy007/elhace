<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setadmin extends CI_Controller {

	public function index()
	{
		$this->session->set_userdata('pageLoginAdmin', 'TRUE');
		redirect(base_url().'administrator/login','refresh');
	}

}

/* End of file Setadmin.php */
/* Location: ./application/controllers/Setadmin.php */