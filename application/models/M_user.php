<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

    private $table = 'tb_user';

    public function index()
    {
        return $this->db->get($this->table)->result();
    }

    public function siswa()
    {
        return $this->db->get_where($this->table, ['role_id' => 2])->result();
    }

    public function detail($id)
    {
        $this->db->join('tb_pendaftaran', 'tb_pendaftaran.id = tb_user.pendaftaran_id', 'left');
        return $this->db->get_where($this->table, ['tb_user.id' => $id])->row();
    }
}

/* End of file M_user.php */
