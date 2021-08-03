<?php  

class Pengumuman extends CI_Controller{
	public function index(){
		if (!$this->session->userdata('email')) {
			redirect('Auth');
		}
		$data['user'] = $this->M_pendaftaran->tampil_user();
		// var_dump($data['user']);die;
		$data['title'] = 'Pengumuman';
		$this->load->view('pendaftaran/template/header', $data);
		$this->load->view('pendaftaran/template/sidebar');
		$this->load->view('pendaftaran/template/topbar', $data);
		$this->load->view('pendaftaran/pengumuman', $data);
		$this->load->view('pendaftaran/template/footer');
	}
}

?>