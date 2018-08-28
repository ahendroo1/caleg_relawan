<?php if (! defined('BASEPATH')) exit('No direct script access allowed') ;
class Question extends CI_Model {

	public function data_questions(){
		$this->db->order_by('id_question','DESC');
		return $this->db->get('tb_question');
	}

	public function add_questions($data){
		return $this->db->insert('tb_question', $data);
	}

	public function add_answer($data){
		return $this->db->insert('tb_answer', $data);
	}

	// public function show_survei(){

	// 	$this->db->select('tb_survei.id_survei,tb_survei.id_relawan, tb_survei.id_caleg, tb_survei.id_answer,tb_survei.id_question, tb_survei.answer, tb_survei.time');
	// 	// $this->db->select('tb_relawan.id_relawan, tb_relawan.id_caleg, tb_relawan.nama_relawan, tb_relawan.username');
	// 	$this->db->from('tb_');
	// 	$this->db->join('tb_caleg', 'tb_caleg.id_caleg=tb_relawan.id_relawan');
	// 	// $this->db->join('tb_category', 'tb_product.category_id=tb_category.category_id');
	// 	// $this->db->where('tb_category.category_id',$category_id);    
	// 	$this->db->order_by('tb_relawan.id_relawan', 'DESC');

	// }

	public function show_answer(){

		$this->db->select('tb_answer.id_answer,tb_answer.id_caleg, tb_answer.id_relawan, tb_answer.tgl_answer');
		$this->db->select('tb_relawan.id_relawan, tb_relawan.nama_relawan, tb_relawan.email');
		$this->db->select('tb_caleg.nama_caleg');
		$this->db->from('tb_answer');
		$this->db->join('tb_caleg', 'tb_caleg.id_caleg=tb_answer.id_caleg');
		$this->db->join('tb_relawan', 'tb_relawan.id_relawan=tb_answer.id_relawan');
		// $this->db->join('tb_relawan', 'tb_relawan.id_relawan=tb_answer.id_relawan');
		
		// $this->db->join('tb_category', 'tb_product.category_id=tb_category.category_id');
		// $this->db->where('tb_category.category_id',$category_id);

		$this->db->order_by('tb_answer.id_answer', 'DESC');
		return $this->db->get();
		
	}

	public function detail_survei($id_ans){

		$this->db->select('tb_survei.id_survei, tb_survei.id_relawan, tb_survei.id_caleg, tb_survei.id_answer, tb_survei.id_question, tb_survei.answer, tb_survei.time');
		$this->db->select('tb_question.id_question, tb_question.question');
		$this->db->from('tb_survei');
		$this->db->join('tb_question', 'tb_question.id_question=tb_survei.id_question');
		// $this->db->join('tb_relawan', 'tb_relawan.id_relawan=tb_answer.id_relawan');
		// $this->db->join('tb_category', 'tb_product.category_id=tb_category.category_id');
		$this->db->like('tb_survei.id_answer',$id_ans);
		$this->db->order_by('tb_survei.id_question', 'DESC');
		return $this->db->get();

	}

}
