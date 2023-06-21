<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    public function simpan_transaksi($data)
    {
        $this->db->insert('tb_transaksi', $data);
    }

    public function simpan_detail_transaksi($data_detail)
    {
        $this->db->insert('tb_detail_transaksi', $data_detail);
    }

    public function belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=0');
        $this->db->order_by('id_transaksi', 'desc');

        return $this->db->get()->result();
    }

    public function diproses()
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=1');
        $this->db->order_by('id_transaksi', 'desc');

        return $this->db->get()->result();
    }

    public function dikirim()
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=2');
        $this->db->order_by('id_transaksi', 'desc');

        return $this->db->get()->result();
    }

    public function selesai()
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=3');
        $this->db->order_by('id_transaksi', 'desc');

        return $this->db->get()->result();
    }

    public function detail_pesanan($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('id_transaksi', $id_transaksi);

        return $this->db->get()->row();
    }

    public function rekening()
    {
        $this->db->select('*');
        $this->db->from('tb_rekening');
        
        return $this->db->get()->result();
    }

    public function upload_buktibayar($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('tb_transaksi', $data);
    }
}