<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Caleg_model extends CI_Model {

	public function add_caleg($data){

		return $this->db->insert('tb_caleg', $data);
	
	}	
}
