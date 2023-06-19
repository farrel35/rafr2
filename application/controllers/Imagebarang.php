<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Imagebarang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_imagebarang');
        $this->load->model('m_barang');
    }

    public function index()
    {
        $data = array(
            'title' => 'Image Barang',
            'imagebarang' => $this->m_imagebarang->get_allData(),
            'isi' => 'imagebarang/v_index'
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
    public function add($id_barang)
    {
        $this->form_validation->set_rules(
            'keterangan',
            'Keterangan',
            'required',
            array(
                'required' => '%s Harus diisi!'
            )
        );

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/imagebarang/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "image";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Add Image Barang',
                    'error_upload' => $this->upload->display_errors(),
                    'barang' => $this->m_barang->get_Data($id_barang),
                    'imagebarang' => $this->m_imagebarang->get_Image($id_barang),
                    'isi' => 'imagebarang/v_add'
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            } else {
                $upload_data    = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/imagebarang/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_barang' => $id_barang,
                    'keterangan' => $this->input->post('keterangan'),
                    'image' => $upload_data['uploads']['file_name'],
                );
                $this->m_imagebarang->add($data);
                $this->session->set_flashdata('pesan', 'Image berhasil ditambahkan');
                redirect('imagebarang/add/' . $id_barang);
            }
        }


        $data = array(
            'title' => 'Add Image Barang',
            'barang' => $this->m_barang->get_Data($id_barang),
            'imagebarang' => $this->m_imagebarang->get_Image($id_barang),
            'isi' => 'imagebarang/v_add'
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function delete($id_barang, $id_image)
    {
        //hapus image
        $image = $this->m_imagebarang->get_Data($id_image);

        if ($image->image != "") {
            unlink('./assets/imagebarang/' . $image->image);
        }

        $data = array('id_image' => $id_image);
        $this->m_imagebarang->delete($data);
        $this->session->set_flashdata('pesan', 'Image berhasil dihapus');
        redirect('imagebarang/add/' . $id_barang);
    }
}

/* End of file Imagebarang.php */