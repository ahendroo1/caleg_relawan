<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('upload');
        $this->load->model('Question');
        $this->load->model('Caleg_model');
		date_default_timezone_set('Asia/Jakarta');
		error_reporting(0);
        ini_set('display_error','off');
		
	}

	public function questions_add(){

        if(!$this->session->userdata('pass_relawan')){

            redirect('login');

		} else {

			$data_add =  array(  'id_question' => '',
							     'question' => $this->input->post('que')
									// 'tgl_registrasi' => date("d F Y , g:i a"),
                                );

            $this->Question->add_questions($data_add);
            
			if ($this->db->affected_rows()) {
				# code...
				$this->session->set_flashdata('add_success', "<div class=\"alert alert-success\" id=\"alert\">Berhasil Tambah Data   !! </div>");
				redirect(base_url().'questions');

			}else{

				$this->session->set_flashdata('add_success', "<div class=\"alert alert-danger\" id=\"alert\">Gagal Tambah Data   !! </div>");
				redirect(base_url().'questions');
			}
		}
    }

    public function save_ans(){
        
    
        if(!$this->session->userdata('pass_relawan') && $this->session->userdata('id_relawan') && $this->session->userdata('id_caleg') ){

            redirect('login');

		} else {

            $ans = $this->input->post('ans');
            $data = $this->Question->data_questions();

            $arr_no = 0;
            foreach($data->result() as $row){
                // echo $row->question ;
                // $survei_array = array_push($row->question) ;
                $survei_array[$arr_no++] = $row->id_question ;
            }
            // echo $survei_array[1];

            
            $this->db->select('RIGHT(tb_answer.id_answer,4) as kode', FALSE);
            $this->db->order_by('id_answer','DESC');
            $this->db->limit(1);
            $query = $this->db->get('tb_answer');

            if ($query->num_rows() <> 0 ) {
                # code...
                $data = $query->row();
                $kode = intval($data->kode) + 1;

            }else{

                $kode = 1 ;
            }

            $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
            $id_ans = time().date('dmYgi')."0".$kodemax ;

            // $id_ans = date('dmYgi').time();
            // $id_ans = date('dmYgi').time().$kode_jadi_index;

            $data_answer = array(

                'id_answer' => $id_ans,
                'id_caleg' => $this->session->userdata('id_caleg'),
                'id_relawan' => $this->session->userdata('id_relawan'),
                'tgl_answer' => date('d F Y, g:i a')

            );

            // echo $survei_array ;
            for ($i=0; $i < count($survei_array) && $i < count($ans); $i++ ) {
                # code...
                $this->db->insert('tb_survei', array('id_survei' => '',

                                                'id_relawan' => $this->session->userdata('id_relawan'),
                                                'id_caleg' => $this->session->userdata('id_caleg'),
                                                'id_answer' =>  $id_ans,
                                                'id_question' => $survei_array[$i],
                                                'answer' => $ans[$i],
                                                'time' => date('d F Y, g:i a')
                                            )
                );
            }

            $this->Question->add_answer($data_answer);

			if ($this->db->affected_rows()) {
				# code...
				$this->session->set_flashdata('add_success', "<div class=\"alert alert-success\" id=\"alert\">Berhasil Tambah Data   !! </div>");

				redirect(base_url().'survei');

			}else{

				$this->session->set_flashdata('add_success', "<div class=\"alert alert-danger\" id=\"alert\">Gagal Tambah Data   !! </div>");
				redirect(base_url().'survei');
			}
		}
    }

    public function survei($id_ans){
        
        if(!$id_ans){
            redirect(base_url().'/survei_data');
        }

        $data['detail_survei'] = $this->Question->detail_survei($id_ans);

        $this->load->view('survei_detail', $data);

    }   

}
