<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct(){

		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Question');
		
	}

	public function index(){
		
		$data['list_question'] = $this->Question->list_question();
		$this->load->view('welcome_message', $data);

	}

	public function model(){
		
	}
}
