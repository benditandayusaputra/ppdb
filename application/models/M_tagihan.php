<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_tagihan extends CI_Model
{

    private $table = 'tb_tagihan';

    public function index()
    {
        $this->db->select('tb_tagihan.*, tb_jenis_pembayaran.jenis');
        $this->db->join('tb_jenis_pembayaran', 'tb_jenis_pembayaran.id = tb_tagihan.jenis_pembayaran_id', 'left');
        return $this->db->get($this->table)->result();
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
}

/* End of file M_tagihan.php */
