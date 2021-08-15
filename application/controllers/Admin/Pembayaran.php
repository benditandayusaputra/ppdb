<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        not_auth_check();
        $this->load->model('m_pembayaran', 'pembayaran');
    }

    public function index()
    {
        $data = [
            'title'         => 'Konfirmasi Pembayaran',
            'pembayaran'    => $this->pembayaran->index(),
            'view'          => 'admin/pembayaran/index'
        ];
        $this->load->view('template_admin/app.php', $data);
    }

    public function konfirm($id)
    {
        $this->pembayaran->update($id, ['konfirm' => 1]);
        $this->session->set_flashdata('success', 'Konfirmasi Pembayaran Berhasil');
        redirect(site_url('admin/pembayaran'), 'refresh');
    }
}

/* End of file Pembayaran.php */
