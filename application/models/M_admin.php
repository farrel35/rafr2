<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function total_Barang()
    {
       return $this->db->get('tb_barang')->num_rows();
    }

    public function total_Kategori()
    {
       return $this->db->get('tb_kategori')->num_rows();
    }
}
