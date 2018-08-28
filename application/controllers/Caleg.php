<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caleg extends CI_Controller {

	public function __construct(){

		parent::__construct();
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('upload');
        $this->load->model('Caleg_model');
		date_default_timezone_set('Asia/Jakarta');
		error_reporting(0);
        ini_set('display_error','off');
		
	}

	public function caleg_add(){

        if(!$this->session->userdata('pass_relawan')){
			redirect('login');
			
		} else {

			$data_update =  array(  'id_caleg' => '',
									'nama_caleg' => $this->input->post('nama_caleg'),
									'partai' => $this->input->post('partai'),
									// 'tgl_registrasi' => date("d F Y , g:i a"),
								);

			$this->Caleg_model->add_caleg($data_update);

			if ($this->db->affected_rows()) {
				# code...
				$this->session->set_flashdata('add_success', "<div class=\"alert alert-success\" id=\"alert\">Berhasil Tambah Data   !! </div>");

				redirect(base_url().'caleg_data');

			}else{

				$this->session->set_flashdata('add_success', "<div class=\"alert alert-danger\" id=\"alert\">Gagal Tambah Data   !! </div>");

				redirect(base_url().'caleg_data');
			}
		}
	}
	
	public function relawan_add(){

        if(!$this->session->userdata('pass_relawan')){
			
			redirect('login');

		} else {

			$data_add = array('id_relawan' => '',
							'id_caleg' => $this->input->post('id_caleg'),
							'nama_relawan' => $this->input->post('nama_relawan'),
							'email' => $this->input->post('email'),
							'password' => $this->input->post('pass'),
							'status' => 1
			);

			$this->Caleg_model->relawan_add($data_add);

			if ($this->db->affected_rows()) {
				# code...
				$this->session->set_flashdata('add_success', "<div class=\"alert alert-success\" id=\"alert\">Berhasil Tambah Data   !! </div>");

				redirect(base_url().'relawan_caleg');

			}else{

				$this->session->set_flashdata('add_success', "<div class=\"alert alert-danger\" id=\"alert\">Gagal Tambah Data   !! </div>");

				redirect(base_url().'relawan_caleg');
			}


		}

	}
}
