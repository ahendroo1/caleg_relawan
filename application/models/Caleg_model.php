<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Caleg_model extends CI_Model {

	public function add_caleg($data){

		return $this->db->insert('tb_caleg', $data);
	}
	
	public function data_caleg(){
		$this->db->order_by('id_caleg','DESC');
		// $this->db->limit(15);
		return $this->db->get('tb_caleg');
	}

	public function relawan_add($data){
		return $this->db->insert('tb_relawan', $data);
	}

	// public function data_relawan(){
	// 	$this->db->order_by('id_relawan','DESC');
	// 	// $this->db->limit(15);
	// 	return $this->db->get('tb_relawan');
	// }
	
	public function data_relawan(){
		$this->db->select('tb_caleg.id_caleg,tb_caleg.nama_caleg, tb_relawan.id_relawan, tb_relawan.nama_relawan,tb_relawan.email, tb_relawan.password');
		// $this->db->select('tb_relawan.id_relawan, tb_relawan.id_caleg, tb_relawan.nama_relawan, tb_relawan.username');
		$this->db->from('tb_relawan');
		$this->db->join('tb_caleg', 'tb_caleg.id_caleg=tb_relawan.id_relawan');

		// $this->db->join('tb_category', 'tb_product.category_id=tb_category.category_id');
		// $this->db->where('tb_category.category_id',$category_id);    

		$this->db->order_by('tb_relawan.id_relawan', 'DESC');

		return $this->db->get();
			
	}
}
