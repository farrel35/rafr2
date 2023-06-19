<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_imagebarang extends CI_Model
{

    public function get_allData()
    {
        $this->db->select('tb_barang.*, COUNT(tb_image.id_barang) as total_image');
        $this->db->from('tb_barang');
        $this->db->join('tb_image', 'tb_image.id_barang = tb_barang.id_barang', 'left');
        $this->db->group_by('tb_barang.id_barang');
        $this->db->order_by('tb_barang.id_barang', 'desc');

        return $this->db->get()->result();
    }

    public function get_Data($id_image)
    {
        $this->db->select('*');
        $this->db->from('tb_image');
        $this->db->where('id_image', $id_image);

        return $this->db->get()->row();
    }

    public function get_Image($id_barang)
    {
        $this->db->select('*');
        $this->db->from('tb_image');
        $this->db->where('id_barang', $id_barang);

        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tb_image', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_image', $data['id_image']);
        $this->db->delete('tb_image', $data);
    }
}
