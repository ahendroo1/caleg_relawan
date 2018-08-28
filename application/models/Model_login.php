<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function login($user,$pass){

		$inipass = md5($pass);
		$this->db->where('email', $user);
		$this->db->where('password', $inipass);
		$this->db->where('status', 1);
		
		$query = $this->db->get('tb_relawan');

		if ($query->num_rows()>0) {
		 	# code...
		 	foreach ($query->result() as $roww) {
		 		# code...
				 $sessiondata = array(	'id_relawan' => $roww->id_relawan,
										'id_caleg' => $roww->id_caleg,
										'nama_relawan' => $roww->nama_caleg,
										'email' => $roww->username,
										'pass_relawan' => $roww->password,
		 							);

		 		$this->session->set_userdata($sessiondata);
		 		redirect('dashboard');
		 	}

		 }else{

		 	$this->session->set_flashdata('gagal-login', '<h5 style="color:white;
									                                background-color: #fa98aa;
									                                border-color: #c23321;
									                                border-radius: 3px;
									                                margin: 0 0 20px 0;
									                                padding: 15px 30px 15px 15px;
									                                border-left: 5px solid #c23321;"><i class="fa fa-bell"><div class="notify"><span class="heartbit"></span><span class="point"></span></div></i> Email dan Password Salah</h5>');

		 	$this->session->set_flashdata('user', $user);
		 	$this->session->set_flashdata('pass', $pass);

		 	redirect('login');
		 }
	}
	
}
