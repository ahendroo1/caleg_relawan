<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caleg extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Question');
		$this->load->model('Model_login');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->model('Caleg_model');
        ini_set('display_error','off');
		
	}

	public function caleg_add(){

        if(!$this->session->userdata('pass_relawan')){
            redirect('login');
        } 

        $this->load->library('upload');

        // date_default_timezone_set('Asia/Jakarta');
		// $nmfile = time();
        // $config['upload_path'] = './assets/img_upload/';
        // $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        // $config['max_size'] = '999999999999999999999';
		// $config['file_name'] = $nmfile; 

		$config['upload_path']          = './assets/img_upload/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 1000000;
		// $config['file_name'] = $nmfile; 
		$this->upload->initialize($config);

		// $this->load->library('upload', $config);
        
            if ($this->upload->do_upload('filefoto')){

                $gbr = $this->upload->data();
				$data_update =  array(  'id_caleg' => '',
										'nama_caleg' => $this->input->post('nama_caleg'),
		    						  	'partai' => $this->input->post('partai'),
		    						  	// 'tgl_registrasi' => date("d F Y , g:i a"),
	                                 	'img_url' => base_url().'assets/img_upload/'.$gbr['file_name']
		    						);

				$this->Caleg_model->add_caleg($data_update);

				if ($this->db->affected_rows()) {
	                # code...
	                 $this->session->set_flashdata('add_success', "<div class=\"alert alert-success\" id=\"alert\">Berhasil Tambah Foto   !! </div>");

		            redirect(base_url().'caleg_data');

	            }else{

	                $this->session->set_flashdata('add_success', "<div class=\"alert alert-danger\" id=\"alert\">Gagal Tambah Foto   !! </div>");

		            redirect(base_url().'caleg_data');
	            }

	        }else{

                $this->session->set_flashdata('add_success', "<div class=\"alert alert-danger\" id=\"alert\">Gagal Tambah Foto 1   !! </div>");

                redirect(base_url().'caleg_data');

	        }

    }
    
    public function out() {
        
    }
}
