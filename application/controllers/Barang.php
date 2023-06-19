<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('m_barang');
        $this->load->model('m_kategori');
    }

    // List all your items
    public function index($offset = 0)
    {
        $data = array(
            'title' => 'Barang',
            'barang' => $this->m_barang->get_allData(),
            'isi' => 'barang/v_barang'
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules(
            'nama_barang',
            'Nama Barang',
            'required',
            array(
                'required' => '%s Harus diisi!'
            )
        );
        $this->form_validation->set_rules(
            'id_kategori',
            'Kategori',
            'required',
            array(
                'required' => '%s Harus diisi!'
            )
        );
        $this->form_validation->set_rules(
            'harga',
            'Harga Barang',
            'required',
            array(
                'required' => '%s Harus diisi!'
            )
        );
        $this->form_validation->set_rules(
            'deskripsi',
            'Deskripsi Barang',
            'required',
            array(
                'required' => '%s Harus diisi!'
            )
        );

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/image/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "image";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Add Barang',
                    'kategori' => $this->m_kategori->get_allData(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'barang/v_add'
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            } else {
                $upload_data    = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/image/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_barang' => $this->input->post('nama_barang'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'image' => $upload_data['uploads']['file_name'],
                );
                $this->m_barang->add($data);
                $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan');
                redirect('barang');
            }
        }

        $data = array(
            'title' => 'Add Barang',
            'kategori' => $this->m_kategori->get_allData(),
            'isi' => 'barang/v_add'
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    //Update one item
    public function update($id = NULL)
    {
    }

    //Delete one item
    public function delete($id = NULL)
    {
    }
}

/* End of file Barang.php */