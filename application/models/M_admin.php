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

    public function data_Setting()
    {
      $this->db->select('*');
      $this->db->from('tb_setting');
      $this->db->where('id', 1);

      return $this->db->get()->row();
    }

    public function edit($data)
    {
      $this->db->where('id', $data['id']);
      $this->db->update('tb_setting', $data);
    }
}
