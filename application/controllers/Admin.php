<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'isi' => 'v_admin'
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
        
    }

}

/* End of file Controllername.php */
