<?php  

class Biodata extends CI_Controller{
	public function index(){
		if (!$this->session->userdata('email')) {
			redirect('Auth');
		}
		$data['user'] = $this->M_pendaftaran->tampil_user();
		// $data['join'] = $this->M_pendaftaran->join_pendaftaran();
		// var_dump($data['join']);die;
		$data['title'] = 'Biodata Siswa';
		$this->load->view('pendaftaran/template/header', $data);
		$this->load->view('pendaftaran/template/sidebar');
		$this->load->view('pendaftaran/template/topbar');
		$this->load->view('pendaftaran/biodata/index', $data);
		$this->load->view('pendaftaran/template/footer');
	}
}


?>