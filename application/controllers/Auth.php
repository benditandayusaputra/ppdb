<?php

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_jurusan', 'jurusan');
	}

	public function index()
	{
		auth_check();
		$data['title'] = 'Login';
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
			'required'	=> '%s Harus Diisi!',
			'valid_email' => 'Yang Anda Masukan Bukan Email!'

		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required'	=> '%s Harus Diisi!',
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('template_auth/header', $data);
			$this->load->view('auth/login');
			$this->load->view('template_auth/footer');
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
			if ($user) {
				if (password_verify($password, $user['password'])) {
					if ($user['status'] == 1) {
						$data = [
							'email' => $user['email'],
							'role_id' => $user['role_id']
						];
						$this->session->set_userdata($data);

						if ($user['role_id'] == 1) {
							redirect(site_url('admin/dashboard'));
						} else {
							redirect(site_url('pendaftaran/dashboard'));
						}
					} else {
						$this->session->set_flashdata('error', 'Akun Belum Di ACtivasi Oleh Admin Silahkan Hubungi Admin');
						redirect(site_url('auth'));
					}
				} else {
					$this->session->set_flashdata('error', 'Password Salah');
					redirect(site_url('auth'));
				}
			} else {
				$this->session->set_flashdata('error', 'Email Belum terdaftar');
				redirect(site_url('auth'));
			}
		}
	}


	public function registrasi()
	{
		auth_check();
		$this->form_validation->set_message([
			'required'		=> '%s Harus Diisi',
			'is_unique' 	=> '%s Sudah Ada',
			'min_length'	=> '%s Harus Lebih dari 6 karakter',
			'valid_email'	=> 'Yang Anda Masukan Bukan email'
		]);
		$this->form_validation->set_rules('tempat', 'Tempat', 'required|trim');
		$this->form_validation->set_rules('tgl', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required|trim');
		$this->form_validation->set_rules('no_hp', 'No Telepon', 'required|trim|max_length[13]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[konfir_password]');
		$this->form_validation->set_rules('konfir_password', 'Konfirmasi Password', 'required|trim|min_length[6]|matches[password]');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Pendaftaran Siswa';
			$data['view'] = 'auth/registrasi';
			$data['jurusan'] = $this->jurusan->index();
			$this->load->view('template_auth/auth', $data);
		} else {
			$nama 	= $this->input->post('nama');
			$tempat = $this->input->post('tempat');
			$tgl 	= $this->input->post('tgl');
			$jk 	= $this->input->post('jk');
			$agama 	= $this->input->post('agama');
			$no_hp 	= $this->input->post('no_hp');
			$alamat = $this->input->post('alamat');

			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$data = [
				'nama' 			=> $nama,
				'jenis_kelamin' => $jk,
				'tempat_lahir' 	=> $tempat,
				'tanggal_lahir' => $tgl,
				'agama' 		=> $agama,
				'no_telpon' 	=> $no_hp,
				'alamat' 		=> $alamat,
				'kode_siswa'	=> strtoupper(random_string('alnum', 10)),
				'status' 		=> 0
			];

			$this->m_pendaftaran->insert($data);
			unset($data['kode_siswa']);
			$register = $this->m_pendaftaran->register($data);
			$user = [
				'pendaftaran_id' => $register->id,
				'jurusan_id' => $this->input->post('jurusan_id'),
				'nama' => $nama,
				'email' => $email,
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'role_id' => 2,
				'status' => 0
			];
			$this->m_user->insert($user);
			$this->session->set_flashdata('kode_siswa', $register->kode_siswa);
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		redirect('auth');
	}

	public function ok()
	{
		$gambar = $_FILES['bayar']['name'];
		if ($gambar) {
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['upload_path'] = './assets/img/bukti_pendaftaran/';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('bayar')) {
				$this->session->set_flashdata('bukti', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					  <strong>Upload Bukti Pembayaran Gagal</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
				redirect('auth/registrasi');
			} else {
				$bukti = $this->upload->data('file_name');
			}
		}
	}
}
