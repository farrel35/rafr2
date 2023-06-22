<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
   public function total_Barang()
   {
      return $this->db->get('tb_barang')->num_rows();
   }

   public function total_PesananMasuk()
   {
      $this->db->where('(status_bayar=0 OR status_bayar=1 AND status_order=0)');

      return $this->db->get('tb_transaksi')->num_rows();
   }

   public function total_PesananDiproses()
   {
      $this->db->where('(status_order=1)');

      return $this->db->get('tb_transaksi')->num_rows();
   }

   public function total_PesananDikirim()
   {
      $this->db->where('(status_order=2)');

      return $this->db->get('tb_transaksi')->num_rows();
   }

   public function total_PesananSelesai()
   {
      $this->db->where('(status_order=3)');

      return $this->db->get('tb_transaksi')->num_rows();
   }

   public function total_Kategori()
   {
      return $this->db->get('tb_kategori')->num_rows();
   }

   public function total_Pelanggan()
   {
      return $this->db->get('tb_pelanggan')->num_rows();
   }

   public function detail($id_transaksi)
   {
      $this->db->select('*');
      $this->db->from('tb_transaksi');
      $this->db->where('tb_transaksi.id_transaksi', $id_transaksi);

      return $this->db->get()->result();
   }

   public function detail_pesanan($id_transaksi)
   {
      $this->db->select('*');
      $this->db->from('tb_detail_transaksi');
      $this->db->join('tb_transaksi', 'tb_transaksi.no_order = tb_detail_transaksi.no_order', 'left');
      $this->db->join('tb_barang', 'tb_barang.id_barang = tb_detail_transaksi.id_barang', 'left');
      $this->db->where('tb_transaksi.id_transaksi', $id_transaksi);

      return $this->db->get()->result();
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
