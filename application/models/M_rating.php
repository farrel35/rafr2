<?php

defined('BASEPATH') or exit('No direct script access allowed');

// application/models/Review_model.php

class M_rating extends CI_Model
{

   public function submit_review($item_id, $nama_pelanggan, $star, $review)
   {
      $data = array(
         'id_barang' => $item_id,
         'nama_pelanggan' => $nama_pelanggan,
         'star' => $star,
         'review' => $review
      );

      // Simpan data rating dan ulasan ke tabel database
      $this->db->insert('tb_rating', $data);
   }

   public function get_ratings($item_id)
   {
      $this->db->select('*');
      $this->db->from('tb_rating');
      $this->db->where('id_barang', $item_id);
      $query = $this->db->get();
      return $query->result(); // Mengembalikan hasil query sebagai objek
   }
   public function get_average_rating($item_id)
   {
      $this->db->select_avg('star', 'avg_rating');
      $this->db->from('tb_rating');
      $this->db->where('id_barang', $item_id);
      $query = $this->db->get();
      $result = $query->row();

      return $result->avg_rating;
   }
}
