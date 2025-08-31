<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_mahasiswa');
    }

    public function index()
    {
        $data = array(

            'judul' => 'Mahasiswa',
            'subjudul' => 'Halaman Mahasiswa',
            'page' => 'mahasiswa/v_mahasiswa',
            'mhs' => $this->m_mahasiswa->all_data(),
        );
        $this->load->view('v_template', $data, false);
    }

    public function input_mahasiswa()
    {

        $this->form_validation->set_rules('nim', 'NIM', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        $this->form_validation->set_rules('nama_mahasiswa', 'Nama Mahasiswa', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required', [
            'required' => '%s Harus Diisi'
        ]);


        if ($this->form_validation->run() == FALSE) {
            //jika validasi gagal atau tidak lolos validasi
            $data = array(

                'judul' => 'Input Mahasiswa',
                'page' => 'mahasiswa/v_input_mahasiswa',

            );
            $this->load->view('v_template', $data, false);
        } else {
            $data = array(

                'nim' => $this->input->post('nim'),
                'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            );
            $this->m_mahasiswa->insert_data($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil ditambahkan !!!!');
            redirect('mahasiswa/index');
        }
    }


    public function edit_mahasiswa($id_mahasiswa)
    {


        $this->form_validation->set_rules('nim', 'NIM', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        $this->form_validation->set_rules('nama_mahasiswa', 'Nama Mahasiswa', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required', [
            'required' => '%s Harus Diisi'
        ]);


        if ($this->form_validation->run() == FALSE) {
            //jika validasi gagal atau tidak lolos validasi
            $data = array(

                'judul' => 'Edit Mahasiswa',
                'mhs' => $this->m_mahasiswa->detail_data($id_mahasiswa),
                'page' => 'mahasiswa/v_edit_mahasiswa',

            );
            $this->load->view('v_template', $data, false);
        } else {
            $data = array(
                'id_mahasiswa' => $id_mahasiswa,
                'nim' => $this->input->post('nim'),
                'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            );
            $this->m_mahasiswa->update_data($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah !!!!');
            redirect('mahasiswa/index');
        }
    }

    public function delete_mahasiswa($id_mahasiswa)
    {
        $data = array('id_mahasiswa' => $id_mahasiswa);

        $this->m_mahasiswa->delete_data($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil di Hapus !!!!');
        redirect('mahasiswa/index');
    }


    public function total_mahasiswa()
    {
        $data['total_mahasiswa'] = $this->m_mahasiswa->total_mahasiswa();
        $this->load->view('v_home', $data);
    }
}
