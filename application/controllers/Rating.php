<?php


defined('BASEPATH') OR exit('No direct script access allowed');

// application/controllers/Reviews.php

class Rating extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_rating'); // Load model untuk operasi database terkait ulasan
    }

    public function submit() {
        $item_id = $this->input->post('item_id'); // Menambahkan item ID dari input POST
        $nama_pelanggan = $this->input->post('nama_pelanggan'); // Menambahkan item ID dari input POST
        $star = $this->input->post('star');
        $review = $this->input->post('review');
    
        // Lakukan validasi dan sanitasi input jika diperlukan
    
        // Simpan rating, ulasan, dan item ID ke database menggunakan model
        $this->m_rating->submit_review($item_id, $nama_pelanggan, $star, $review);
        
    }
    
}



