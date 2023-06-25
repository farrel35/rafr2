<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        $this->load->model('m_auth');
    }

    public function register()
    {
        $this->form_validation->set_rules(
            'nama_pelanggan',
            'Nama',
            'required',
            array(
                'required' => '%s Harus diisi!'
            )
        );

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|is_unique[tb_pelanggan.email]',
            array(
                'required' => '%s Harus diisi!',
                'is_unique' => 'Email sudah terdaftar!'
            )
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array(
                'required' => '%s Harus diisi!'
            )
        );

        $this->form_validation->set_rules(
            'ulangi_password',
            'Ulangi Password',
            'required|matches[password]',
            array(
                'required' => '%s Harus diisi!',
                'matches' => 'Password tidak sama!'

            )
        );

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Register',
                'isi' => 'v_register'
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            $data = array(
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
            );
            $this->m_pelanggan->register($data);
            $this->session->set_flashdata('pesan', 'Selamat, Akun berhasil dibuat silahkan login');
            redirect('pelanggan/register');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => '%s Harus diisi!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus diisi!'
        ));


        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->pelanggan_login->login($email, $password);
        }

        $data = array(
            'title' => 'Login',
            'isi' => 'v_login_pelanggan'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function logout()
    {
        $this->pelanggan_login->logout();
    }

    public function akun($id_pelanggan)
    {
        //proteksi halaman

        $this->pelanggan_login->proteksi_halaman();

        $this->form_validation->set_rules(
            'nama_pelanggan',
            'Nama',
            'required',
            array(
                'required' => '%s Harus diisi!'
            )
        );

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required',
            array(
                'required' => '%s Harus diisi!'
            )
        );

        $this->form_validation->set_rules(
            'new_password',
            'Password Baru',
            'required',
            array(
                'required' => '%s Harus diisi!'
            )
        );
        $this->form_validation->set_rules(
            'ulangi_password_baru',
            'Ulangi Password Baru',
            'required|matches[new_password]',
            array(
                'required' => '%s Harus diisi!',
                'matches' => 'Password tidak sama!'
            )
        );

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/image_pelanggan/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = 'image';
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Akun Saya',
                    'detail_akun' => $this->m_pelanggan->get_akun($id_pelanggan),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'v_akun'
                );
                $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
            } else {
                $pelanggan = $this->m_pelanggan->get_akun($id_pelanggan);

                if ($pelanggan->image != "") {
                    unlink('./assets/image_pelanggan/' . $pelanggan->image);
                }

                $upload_data    = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/image_pelanggan/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_pelanggan' => $id_pelanggan,
                    'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('new_password'),
                    'image' => $upload_data['uploads']['file_name'],
                );
                $this->m_pelanggan->edit($data);
                $this->session->set_flashdata('pesan', 'Data berhasil diedit');
                redirect('pelanggan/akun/' . $id_pelanggan);
            }
            // jika tidak ganti image
            $data = array(
                'id_pelanggan' => $id_pelanggan,
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('new_password'),
            );
            $this->m_pelanggan->edit($data);
            $this->session->set_flashdata('pesan', 'Data berhasil diedit');
            redirect('pelanggan/akun/' . $id_pelanggan);
        }
        $data = array(
            'title' => 'Akun Saya',
            'detail_akun' => $this->m_pelanggan->get_akun($id_pelanggan),
            'isi' => 'v_akun'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
}
