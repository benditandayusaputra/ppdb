<?php 

class M_pendaftaran extends CI_Model{
	public function tampil_user(){
		return $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
	}
	public function get($table){
		return $this->db->get($table)->result();
	}
	public function get_where($where,$table){
		return $this->db->get_where($table,$where)->row_array();
	}
	public function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function insert($data,$table){
		$this->db->insert($table,$data);
	}


	// public function join_pendaftaran(){
	// 	$this->db->select('*');
	// 	$this->db->from('tb_user');
	// 	$this->db->join('tb_pendaftaran','tb_pendaftaran.id_pendaftaran = tb_user.id_pendaftaran');
	// 	$this->db->where('id_pendaftaran');
	// 	$query = $this->db->get();
	// 	return $query->row_array();
	// }
}

?>