<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_saya extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
        $this->load->model('m_pesanan_masuk');
        $this->load->model('m_admin');
    }

    public function index()
    {
        $this->pelanggan_login->proteksi_halaman();
        $data = array(
            'title' => 'Pesanan Saya',
            'belum_bayar' => $this->m_transaksi->belum_bayar(),
            'diproses' => $this->m_transaksi->diproses(),
            'dikirim' => $this->m_transaksi->dikirim(),
            'selesai' => $this->m_transaksi->selesai(),
            'isi' => 'v_pesanan_saya'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function detail_pesanan($id_transaksi)
    {
        $data = array(
            'title' => 'Detail Pesanan',
            'detail' => $this->m_admin->detail($id_transaksi),
            'detail_pesanan' => $this->m_admin->detail_pesanan($id_transaksi),
            'setting' => $this->m_admin->data_Setting(),
            'isi' => 'v_detail_pesanan_saya'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function bayar($id_transaksi)
    {
        $this->form_validation->set_rules(
            'nama_bank',
            'Nama Bank',
            'required',
            array(
                'required' => '%s Harus diisi!'
            )
        );

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/image_buktibayar/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = 'bukti_bayar';
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Pembayaran',
                    'pesanan' => $this->m_transaksi->detail_pesanan($id_transaksi),
                    'rekening' => $this->m_transaksi->rekening(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'v_bayar'
                );
                $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
            } else {
                $upload_data    = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/image_buktibayar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_transaksi' => $id_transaksi,
                    'nama_bank' => $this->input->post('nama_bank'),
                    'atas_nama' => $this->input->post('atas_nama'),
                    'no_rekening' => $this->input->post('no_rekening'),
                    'status_bayar' => '1',
                    'bukti_bayar' => $upload_data['uploads']['file_name'],
                );
                $this->m_transaksi->upload_buktibayar($data);
                $this->session->set_flashdata('pesan', 'Bukti pembayaran berhasil diupload');
                redirect('pesanan_saya');
            }
        }
        $data = array(
            'title' => 'Pembayaran',
            'pesanan' => $this->m_transaksi->detail_pesanan($id_transaksi),
            'rekening' => $this->m_transaksi->rekening(),
            'isi' => 'v_bayar'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function diterima($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => '3',
        );

        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan telah diterima');
        redirect('pesanan_saya');
    }

    public function delete($id_transaksi, $no_order)
    {
        $decodedNoOrder = urldecode($no_order);
        $data = array(
            'id_transaksi' => $id_transaksi,
            'no_order' => $decodedNoOrder
        );

        $this->m_transaksi->delete($data);
        $this->session->set_flashdata('pesan', 'Pesanan berhasil dihapus');
        redirect('pesanan_saya');
    }
}
