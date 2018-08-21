<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Question');
		$this->load->model('Model_login');
		
	}

	public function in(){

        if ($this->input->post('password')) {
			# code...
			$user = $this->input->post('username');
			$pass = $this->input->post('password');

            $this->Model_login->login($user,$pass);
            
		} else {

            redirect('login');
        }
    }
    
    public function out() {
		$this->session->sess_destroy();
		redirect('login');
    }
}
