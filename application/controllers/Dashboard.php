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
		$this->load->model('Caleg_model');

	}

	public function primary($halaman = 'dashboard'){

		if (file_exists(APPPATH."views/".$halaman.'.php')) {
		
			$data['list_caleg'] = $this->Caleg_model->data_caleg();
			$data['list_questions'] = $this->Question->data_questions();
			$data['list_relawan'] = $this->Caleg_model->data_relawan();
			$data['list_answer'] = $this->Question->show_answer();

            $this->load->view($halaman, $data);

        } else {

            show_404();

        }
	}
}
