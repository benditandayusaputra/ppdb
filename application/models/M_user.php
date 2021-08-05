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
        $this->db->join('tb_pendaftaran', 'tb_pendaftaran.id = tb_user.pendaftaran_id', 'right');
        $this->db->join('tb_jurusan', 'tb_jurusan.id = tb_user.kelas_id', 'left');
        $this->db->join('tb_kelas', 'tb_kelas.id = tb_user.kelas_id', 'left');
        return $this->db->get_where($this->table, ['tb_user.id' => $id])->row();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function edit($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function update($id, $data)
    {
        $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function delete($id)
    {
        $this->db->delete($this->table, ['id' => $id]);
    }

    public function login($email)
    {
        return $this->db->get_where($this->table, ['email' => $email])->row_array();
    }
}

/* End of file M_user.php */
