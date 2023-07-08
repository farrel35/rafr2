<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{
    public function register($data)
    {
        $this->db->insert('tb_pelanggan', $data);
    }

    public function get_allPelanggan()
    {
        $this->db->select('*');
        $this->db->from('tb_pelanggan');
        return $this->db->get()->result();
    }

    public function get_akun($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('tb_pelanggan');
        $this->db->where('id_pelanggan', $id_pelanggan);

        return $this->db->get()->row();
    }

    public function edit($data)
    {
        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->update('tb_pelanggan', $data);
    }
}

/* End of file M_pelanggan.php */
