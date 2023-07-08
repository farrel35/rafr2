<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_pesanan_masuk');
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'total_barang' => $this->m_admin->total_Barang(),
            'total_pesanan_masuk' => $this->m_admin->total_PesananMasuk(),
            'total_pesanan_diproses' => $this->m_admin->total_PesananDiproses(),
            'total_pesanan_dikirim' => $this->m_admin->total_PesananDikirim(),
            'total_pesanan_selesai' => $this->m_admin->total_PesananSelesai(),
            'total_pelanggan' => $this->m_admin->total_Pelanggan(),
            'total_kategori' => $this->m_admin->total_Kategori(),
            'isi' => 'v_admin'
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function setting()
    {
        $this->form_validation->set_rules(
            'nama_toko',
            'Nama Toko',
            'required',
            array(
                'required' => '%s Harus diisi!'
            )
        );

        $this->form_validation->set_rules(
            'kota',
            'Kota',
            'required',
            array(
                'required' => '%s Harus diisi!'
            )
        );

        $this->form_validation->set_rules(
            'alamat_toko',
            'Alamat Toko',
            'required',
            array(
                'required' => '%s Harus diisi!'
            )
        );
        $this->form_validation->set_rules(
            'no_telepon',
            'No Telepon',
            'required',
            array(
                'required' => '%s Harus diisi!'
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Setting',
                'setting' => $this->m_admin->data_Setting(),
                'isi' => 'v_setting'
            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
        } else {
            $data = array(
                'id' => 1,
                'lokasi' => $this->input->post('kota'),
                'nama_toko' => $this->input->post('nama_toko'),
                'alamat_toko' => $this->input->post('alamat_toko'),
                'no_telepon' => $this->input->post('no_telepon'),
            );
            $this->m_admin->edit($data);
            $this->session->set_flashdata('pesan', 'Setting berhasil diedit');
            redirect('admin/setting');
        }
    }

    public function rekening()
    {
        $data = array(
            'title' => 'Rekening',
            'rekening' => $this->m_admin->rekening(),
            'isi' => 'v_rekening'
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function pesanan_masuk()
    {
        $data = array(
            'title' => 'Pesanan',
            'pesanan' => $this->m_pesanan_masuk->pesanan(),
            'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
            'pesanan_dikirim' => $this->m_pesanan_masuk->pesanan_dikirim(),
            'pesanan_selesai' => $this->m_pesanan_masuk->pesanan_selesai(),
            'isi' => 'v_pesanan_masuk'
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function detail_pesanan($id_transaksi)
    {
        $data = array(
            'title' => 'Detail Pesanan',
            'detail' => $this->m_admin->detail($id_transaksi),
            'detail_pesanan' => $this->m_admin->detail_pesanan($id_transaksi),
            'setting' => $this->m_admin->data_Setting(),
            'isi' => 'v_detail_pesanan'
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function proses($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => '1',
        );

        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan berhasil diproses');
        redirect('admin/pesanan_masuk');
    }

    public function kirim($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'no_resi' => $this->input->post('no_resi'),
            'status_order' => '2',
        );

        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan berhasil dikirim');
        redirect('admin/pesanan_masuk');
    }

    public function add_rekening()
    {
        $data = array(
            'nama_bank' => $this->input->post('nama_bank'),
            'no_rekening' => $this->input->post('no_rekening'),
            'atas_nama' => $this->input->post('atas_nama'),
        );
        $this->m_admin->add_rekening($data);
        $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan');
        redirect('admin/rekening');
    }

    public function edit_rekening($id_rekening = NULL)
    {
        $data = array(
            'id_rekening' => $id_rekening,
            'nama_bank' => $this->input->post('nama_bank'),
            'no_rekening' => $this->input->post('no_rekening'),
            'atas_nama' => $this->input->post('atas_nama'),
        );
        $this->m_admin->edit_rekening($data);
        $this->session->set_flashdata('pesan', 'Data berhasil diedit');
        redirect('admin/rekening');
    }

    public function delete_rekening($id_rekening = NULL)
    {
        $data = array('id_rekening' => $id_rekening);
        $this->m_admin->delete_rekening($data);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
        redirect('admin/rekening');
    }
}

/* End of file Controllername.php */