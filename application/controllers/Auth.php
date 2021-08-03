<?php  

class Auth extends CI_Controller{
	public function index(){
		$data['title'] = 'Login';
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('password','Password','required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('template_auth/header', $data);
			$this->load->view('auth/login');
			$this->load->view('template_auth/footer');
		}
		else{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$user = $this->db->get_where('tb_user',['email' => $email])->row_array();
			if ($user) {
				if (password_verify($password, $user['password'])) {
					if($user['status'] == 1){
						$data = [
							'email' => $user['email'],
							'role_id' => $user['role_id']
						];
						$this->session->set_userdata($data);

						if($user['role_id'] == 1){
							redirect('Admin/Dashboard');
						}
						else{
							redirect('Pendaftaran/Dashboard');
						}
					}
					else{
						$this->session->set_flashdata('user','<div class="alert alert-danger alert-dismissible fade show" role="alert">Akun Belum Di ACtivasi Oleh Admin
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
						redirect('Auth');					}
				}
				else{
				$this->session->set_flashdata('user','<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Salah
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
				redirect('Auth');
				}
			}
			else{
			$this->session->set_flashdata('user','<div class="alert alert-danger alert-dismissible fade show" role="alert">Email Belum terdaftar
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Auth');
			}
		}
	}


	public function registrasi(){
		$data['title'] = 'Pendaftaran Siswa';
		$this->form_validation->set_rules('nama','Nama','required|trim',[
			'required' => 'Tidak Boleh Kosong',
		]);
		$this->form_validation->set_rules('tempat','Tempat','required|trim');
		$this->form_validation->set_rules('tgl','Tanggal Lahir','required');
		$this->form_validation->set_rules('agama','Agama','required|trim');
		$this->form_validation->set_rules('no_hp','No Telepon','required|trim|max_length[13]');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[tb_user.email]');
		$this->form_validation->set_rules('password','Password','required|trim|max_length[8]|min_length[6]');
		if ($this->form_validation->run() == false) {
			$this->load->view('template_auth/header', $data);
			$this->load->view('auth/registrasi');
			$this->load->view('template_auth/footer');
		}
		else{
			$nama 	= $this->input->post('nama');
			$tempat = $this->input->post('tempat');
			$tgl 	= $this->input->post('tgl');
			$jk 	= $this->input->post('jk');
			// var_dump($jk);die;
			$agama 	= $this->input->post('agama');
			$no_hp 	= $this->input->post('no_hp');
			$alamat = $this->input->post('alamat');

			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$gambar = $_FILES['bayar']['name'];
			if ($gambar) {
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/bukti_pendaftaran/';

				$this->load->library('upload' ,$config);

				if (!$this->upload->do_upload('bayar')) {
					$this->session->set_flashdata('bukti','<div class="alert alert-warning alert-dismissible fade show" role="alert">
					  <strong>Upload Bukti Pembayaran Gagal</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
					redirect('Auth/registrasi');
				}
				else{
					$bukti = $this->upload->data('file_name');
				}

				$data = [
					'nama' 			=> $nama,
					'jenis_kelamin' => $jk,
					'tempat_lahir' 	=> $tempat,
					'tanggal_lahir' => $tgl,
					'agama' 		=> $agama,
					'no_telpon' 	=> $no_hp,
					'alamat' 		=> $alamat,
					'bukti_pembayaran' => $bukti,
					'status' 		=> 0
				];

				// input data pendaftaran
				$this->M_pendaftaran->insert($data, 'tb_pendaftaran');
				// var_dump($data);die;

				// input table user
				$data = [
					'nama' => $nama,
					'email' => $email,
					'password' => password_hash($password, PASSWORD_DEFAULT),
					'role_id' => 2,
					'status' => 0
				];	
				$this->M_pendaftaran->insert($data, 'tb_user');
				$this->session->set_flashdata('user','<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat Anda Berhasil Daftar Tunggu Untuk Activasi Oleh Admin
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
				redirect('Auth');

			}
			else{
				$this->session->set_flashdata('bukti','<div class="alert alert-danger" role="alert">
				  <h4 class="alert-heading">Warning!</h4>
				  <p>Bukti Pembayaran Harus Di Isi</p>
				  <hr>
				  <p class="mb-0">Karena Itu Akan Menjadi Syarat Untuk Pendaftaran</p>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				  <br>
				</div>');
				redirect('Auth/registrasi');
			}
		}
	}

	public function logout(){
		$this->session->unset_userdata('email');
		redirect('Auth');
	}
}


?>