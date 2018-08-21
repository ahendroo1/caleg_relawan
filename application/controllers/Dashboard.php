<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Question');
        $this->load->helper('url');
        $this->load->library('upload');
	
	}

	public function primary($halaman = 'dashboard'){

		if (file_exists(APPPATH."views/".$halaman.'.php')) {
		
			$data['list_question'] = $this->Question->list_question();
			
            $this->load->view($halaman, $data);

        } else {

            show_404();

        }
	}
}
