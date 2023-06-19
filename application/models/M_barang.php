<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {

    public function get_allData(){
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori', 'left');
        $this->db->order_by('id_barang', 'asce');
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tb_barang', $data);
        
    }

    public function edit($data)
    {
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->update('tb_barang', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->delete('tb_barang', $data);
    }
}