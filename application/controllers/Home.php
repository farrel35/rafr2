<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
        $this->load->model('m_rating');
    }

    public function index()
    {
        $data = array(
            'title' => 'Home',
            'barang' => $this->m_home->get_allData(),
            'isi' => 'v_home'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function kategori($id_kategori)
    {
        $kategori = $this->m_home->kategori($id_kategori);
        $data = array(
            'title' => 'Kategori Barang : ' . $kategori->nama_kategori,
            'barang' => $this->m_home->get_allData_Barang($id_kategori),
            'isi' => 'v_kategori_barang'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function detail_barang($id_barang)
    {
        $data = array(
            'title' => 'Detail Barang',
            'image' => $this->m_home->get_Image($id_barang),
            'barang' => $this->m_home->get_detailBarang($id_barang),
            'rating' => $this->m_rating->get_ratings($id_barang),
            'isi' => 'v_detail_barang'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
}

/* End of file Controllername.php */
