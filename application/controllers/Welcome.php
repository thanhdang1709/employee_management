<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
        parent::__construct();
		if (!$this->session->has_userdata('user_id')) {
            redirect('Auth/index');
        }
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
}
