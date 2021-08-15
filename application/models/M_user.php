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

    public function cs_siswa()
    {
        return $this->db->get_where($this->table, ['role_id' => 2, 'status' => 0])->result();
    }

    public function checkKode()
    {
        $this->db->select('tb_user.id as user_id, tb_user.email, tb_pendaftaran.*');
        $this->db->join('tb_pendaftaran', 'tb_pendaftaran.id = tb_user.pendaftaran_id', 'left');
        return $this->db->get_where($this->table, ['email' => $this->session->userdata('email')])->row();
    }

    public function byEmail($email)
    {
        return $this->db->get_where($this->table, ['email' => $email])->row();
    }

    public function byId($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function byEmailDaftar()
    {
        $user = $this->byEmail($this->session->userdata('email'));
        if ($user->orang_tua_id == 0) {
            $this->db->select('tb_user.id as user_id, tb_user.email, tb_pendaftaran.*, tb_jurusan.nama_jurusan');
            $this->db->join('tb_pendaftaran', 'tb_pendaftaran.id = tb_user.pendaftaran_id', 'left');
            $this->db->join('tb_jurusan', 'tb_jurusan.id = tb_user.kelas_id', 'left');
        } else {
            $this->db->select('tb_user.id as user_id, tb_user.email, tb_pendaftaran.*, tb_orang_tua.nama_ortu, tb_orang_tua.pendidikan, tb_orang_tua.pekerjaan, tb_jurusan.nama_jurusan');
            $this->db->join('tb_pendaftaran', 'tb_pendaftaran.id = tb_user.pendaftaran_id', 'left');
            $this->db->join('tb_jurusan', 'tb_jurusan.id = tb_user.kelas_id', 'left');
            $this->db->join('tb_orang_tua', 'tb_orang_tua.id = tb_user.orang_tua_id', 'left');
        }
        return $this->db->get_where($this->table, ['email' => $this->session->userdata('email')])->row();
    }

    public function detail($id)
    {
        $user = $this->byId($id);
        if ($user->orang_tua_id === 0) {
            $this->db->select('tb_user.id as user_id, tb_user.orang_tua_id, tb_user.email, tb_pendaftaran.*, tb_jurusan.nama_jurusan');
            $this->db->join('tb_pendaftaran', 'tb_pendaftaran.id = tb_user.pendaftaran_id', 'left');
            $this->db->join('tb_jurusan', 'tb_jurusan.id = tb_user.kelas_id', 'left');
        } else {
            $this->db->select('tb_user.id as user_id, tb_user.orang_tua_id, tb_user.email, tb_pendaftaran.*, tb_orang_tua.nama_ortu, tb_orang_tua.pendidikan, tb_orang_tua.pekerjaan, tb_jurusan.nama_jurusan');
            $this->db->join('tb_pendaftaran', 'tb_pendaftaran.id = tb_user.pendaftaran_id', 'left');
            $this->db->join('tb_jurusan', 'tb_jurusan.id = tb_user.kelas_id', 'left');
            $this->db->join('tb_orang_tua', 'tb_orang_tua.id = tb_user.orang_tua_id', 'left');
        }
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
