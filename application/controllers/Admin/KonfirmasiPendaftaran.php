<?php

class KonfirmasiPendaftaran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		not_auth_check();
	}

	public function index()
	{
		$data = [
			'title' 	=> 'Konfirmasi Pendaftaran',
			'c_siswa' 	=> $this->m_user->cs_siswa(),
			'view'  	=> 'admin/konfirmasipendaftaran/index'
		];
		$this->load->view('template_admin/app.php', $data);
	}

	public function detail($id)
	{
		$data = [
			'title' => 'Detail User',
			'user'  => $this->user->detail($id),
			'view'  => 'admin/konfirmasipendaftaran/detail'
		];
		$this->load->view('template_admin/app', $data);
	}

	public function active_user($id)
	{
		$this->m_user->update($id, ['status' => 1]);
		$this->session->set_flashdata('success', 'Konfirmasi User Berhasil');
		redirect(site_url('admin/konfirmasipendaftaran'), 'refresh');
	}
}
