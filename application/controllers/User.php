<?php 
 class User extends CI_Controller
 {
    public function index()
    {
        $data = array (

            'judul' => 'User',
            'subjudul' => 'Halaman User',
            'page' => 'v_user',

        );

        $this->load->view('v_template', $data, false);
    }
 }


?>
