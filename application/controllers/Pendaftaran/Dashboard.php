<?php  

class Dashboard extends CI_Controller{
	public function index(){
		if (!$this->session->userdata('email')) {
			redirect('Auth');
		}
		$data['user'] = $this->M_pendaftaran->tampil_user();
		// var_dump($data['user']);die;
		$data['title'] = 'Dashboard';
		$this->load->view('pendaftaran/template/header', $data);
		$this->load->view('pendaftaran/template/sidebar');
		$this->load->view('pendaftaran/template/topbar', $data);
		$this->load->view('pendaftaran/calon_siswa/Dashboard', $data);
		$this->load->view('pendaftaran/template/footer');
	}

}


?>