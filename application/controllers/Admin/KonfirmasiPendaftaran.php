<?php  

class KonfirmasiPendaftaran extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		not_auth_check();
	}
	
	public function index(){
		$data['title'] = 'Konfirmasi Pendaftaran';
		$data['c_siswa'] = $this->M_pendaftaran->get('tb_pendaftaran');
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('template_admin/topbar', $data);
		$this->load->view('admin/konfirmasipendaftaran/index', $data);
		$this->load->view('template_admin/footer');
	}
}
