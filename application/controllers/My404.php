<?php
class My404 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->output->set_status_header('404');
        $data = array(
            'title' => '404',
            'isi' => 'err404'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
}
