<?php if (! defined('BASEPATH')) exit('No direct script access allowed') ;
class Question extends CI_Model {
	public function list_question(){

		return $this->db->get('tb_question');
	
	}	
}
