<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Programstudi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_programstudi');
    }

    public function index()
    {
        $data = array(
            'judul' => 'Program Studi',
            'subjudul' => 'Halaman Program Studi',
            'page' => 'programstudi/v_programstudi',
            'prog' => $this->m_programstudi->all_data(),
        );
        $this->load->view('v_template', $data, false);
    }

    public function input_programstudi()
    {
        $this->form_validation->set_rules('nama_programstudi', 'Nama Program Studi', 'required', [
            'required' => '%s Harus Di isi'
        ]);

        $this->form_validation->set_rules('ketua_programstudi', 'Ketua Program Studi', 'required', [
            'required' => '%s Harus Di isi'
        ]);

        if($this->form_validation->run() == FALSE)
        {
            $data = array(
                'judul' => 'Input Program Studi',
                'page' => 'programstudi/v_programstudi',
            );
            $this->load->view('v_template', $data, false);
        }else {
            $data = array(
                'nama_programstudi' => $this->input->post('nama_programstudi'),
            );
            $this->m_programstudi->insert_data($data);
            $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan !!!!');
            redirect('programstudi/index');

        }
        
    }
}




?>