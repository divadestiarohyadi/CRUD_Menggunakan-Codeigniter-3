<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Dosen extends CI_Controller
{
    public function __construct() 
    
    {
        parent::__construct();
        $this->load->model('m_dosen');
    }

    public function index()
    {

        $data = array (

            'judul' => 'Dosen',
            'subjudul' => 'Dosen',
            'page' => 'dosen/v_dosen',
            'dosen' => $this->m_dosen->all_data(),
        );

        $this->load->view('v_template', $data, false);
    }


        public function input_dosen()
    {

        $this->form_validation->set_rules('nidn', 'NIDN', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        $this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        
        if($this->form_validation->run() == FALSE)
        { 
            //jika validasi gagal atau tidak lolos validasi
            $data = array (

            'judul' => 'Input Dosen',
            'page' => 'dosen/v_input_dosen',

        );
        $this->load->view('v_template', $data, false);
        }else {
            $data = array(

                'nidn' => $this->input->post('nidn'),
                'nama_dosen' => $this->input->post('nama_dosen'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            );
        $this->m_dosen->insert_data($data);
        $this->session->set_flashdata('pesan','Data Berhasil ditambahkan !!!!' );
        redirect('dosen/index');
        }
    }

    public function edit_dosen($id_dosen)
    {


        $this->form_validation->set_rules('nidn', 'NIDN', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        $this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        
        if($this->form_validation->run() == FALSE)
        { 
            //jika validasi gagal atau tidak lolos validasi
        $data = array(

            'judul' => 'Edit Dosen',
            'dsn' => $this->m_dosen->detail_data($id_dosen),
            'page' => 'dosen/v_edit_dosen',

            );
        $this->load->view('v_template', $data, false);

    }else{
            $data = array(
                'id_dosen' => $id_dosen, 
                'nidn' => $this->input->post('nidn'),
                'nama_dosen' => $this->input->post('nama_dosen'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            );
        $this->m_dosen->update_data($data);
        $this->session->set_flashdata('pesan','Data Berhasil di Ubah !!!!' );
        redirect('dosen/index');
    }
    }

    public function delete_dosen($id_dosen)
    {
        $data = array('id_dosen' => $id_dosen);

        $this->m_dosen->delete_data($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil di Hapus !!!!');
        redirect('dosen/index');
    }

}

?>