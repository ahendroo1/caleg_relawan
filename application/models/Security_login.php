<?php if (! defined('BASEPATH')) exit('No direct script access allowed') ;

class Security_login extends CI_Model {

	public function login_editor(){
		$data_login = $this->session->userdata('pass_relawan');
		if (isset($data_login)) {
		 	# code...
		 	redirect('/');
		}
	}

	public function logout_editor(){

		$data = $this->session->userdata('pass_relawan');

		if (empty($data)) {
		 	# code...
			$this->session->sess_destroy();

		 	redirect('login');
		} 
	}

	
}
