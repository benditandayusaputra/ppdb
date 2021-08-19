<?php

class Pengumuman extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		not_auth_check();
		$this->load->model('m_pembayaran', 'pembayaran');
	}

	public function index()
	{
		if (isset($_FILES["bukti_pembayaran"]['name'])) {
			$config['file_name'] = date('YmdHis') . $_FILES["bukti_pembayaran"]['name'];
			$config['upload_path'] = './assets/img/bukti_pendaftaran/';
			$config['allowed_types'] = 'jpg|png|jpeg|JPG|JPEG|PNG';
			$config['max_size']  = '2048';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('bukti_pembayaran')) {
				$error = $this->upload->display_errors();
				$check = $this->checkKelengkapanBiodata();
				$data = [
					'title'	=> 'Pengumuman',
					'bayar'	=> $this->m_pendaftaran->check_bayar(),
					'check'	=> $check,
					'view' 	=> 'pendaftaran/pengumuman',
					'error'	=> $error
				];
				$this->load->view('pendaftaran/template/app', $data);
			} else {
				$user = $this->m_user->byEmail($this->session->userdata('email'));
				$dataUp = [
					'user_id'				=> $user->id,
					'jenis_pembayaran_id'	=> 1,
					'foto_bukti'			=> $this->upload->data('file_name'),
					'jumlah'				=> $this->input->post('jumlah')
				];
				$dataU = [
					'bukti_pembayaran'		=> $this->upload->data('file_name')
				];
				$this->pembayaran->insert($dataUp);
				$this->m_pendaftaran->update(['id' => $user->pendaftaran_id], $dataU);
				$this->session->set_flashdata('success', 'Upload Bukti Pembayaran Berhasil');
				redirect(site_url('pendaftaran/pengumuman'), 'refresh');
			}
		}
		$check = $this->checkKelengkapanBiodata();
		$data = [
			'title'	=> 'Pengumuman',
			'bayar'	=> $this->m_pendaftaran->check_bayar(),
			'check' => $check,
			'view' 	=> 'pendaftaran/pengumuman'
		];
		$this->load->view('pendaftaran/template/app', $data);
	}

	private function checkKelengkapanBiodata()
	{
		$user = $this->m_user->checkBiodata();
		if (in_array(null, $user) || in_array("", $user)) {
			return true;
		} else {
			return false;
		}
	}
}
