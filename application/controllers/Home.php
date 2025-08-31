<?php
class Home extends CI_Controller
{
    public function index()
    {

        $data = array(

            'judul' => 'Dashboard',
            'subjudul' => 'Dashboard',
            'page' => 'v_home', //tampilan konten
        ); //Fungsinyaa untuk Membuat Variabel untuk mempermudah data Array

        $this->load->view('v_template', $data, false); //Fungsinya buat nampilkan data dari view dan variable
    }
}
