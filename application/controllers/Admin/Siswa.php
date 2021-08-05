<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        not_auth_check();
    }

    // List all your items
    public function index()
    {
        $data = [
            'siswa' => $this->M_user->siswa(),
            'view'  => 'siswa/index'
        ];
    }

    // Add a new item
    public function add()
    {
    }

    //Update one item
    public function update($id)
    {
    }

    //Delete one item
    public function delete($id)
    {
    }
}

/* End of file Siswa.php */
