<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen_buku extends CI_Controller
{
    public function __construct()

    {
        parent::__construct();
        $this->load->model('m_manajemen_buku');
    }

    public function index()
    {

        $data = array(

            'judul' => 'Manajemen Buku',
            'subjudul' => 'Manajemen Buku',
            'page' => 'buku/v_manajemen_buku',
            'buku' => $this->m_manajemen_buku->all_data(),
        );

        $this->load->view('v_template', $data, false);
    }


    public function input_buku()
    {

        $this->form_validation->set_rules('judul', 'Judul', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        $this->form_validation->set_rules('penulis', 'Penulis', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        $this->form_validation->set_rules('kategori', 'Kategori', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required', [
            'required' => '%s Harus Diisi'
        ]);


        if ($this->form_validation->run() == FALSE) {
            //jika validasi gagal atau tidak lolos validasi
            $data = array(

                'judul' => 'Tambah Buku',
                'page' => 'buku/v_manajemen_buku',

            );
            $this->load->view('v_template', $data, false);
        } else {
            $data = array(

                'judul' => $this->input->post('judul'),
                'penulis' => $this->input->post('penulis'),
                'kategori' => $this->input->post('kategori'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
            );
            $this->m_manajemen_buku->insert_data($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil ditambahkan !!!!');
            redirect('buku/index');
        }
    }

    public function edit_buku($id_buku)
    {


        $this->form_validation->set_rules('judul', 'Judul', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        $this->form_validation->set_rules('penulis', 'Penulis', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        $this->form_validation->set_rules('kategori', 'Kategori', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required', [
            'required' => '%s Harus Diisi'
        ]);


        if ($this->form_validation->run() == FALSE) {
            //jika validasi gagal atau tidak lolos validasi
            $data = array(

                'judul' => 'Edit Buku',
                'buku' => $this->m_manajemen_buku->detail_data($id_buku),
                'page' => 'buku/v_edit_buku',

            );
            $this->load->view('v_template', $data, false);
        } else {
            $data = array(
                'id_buku' => $id_buku,
                'judul' => $this->input->post('judul'),
                'penulis' => $this->input->post('penulis'),
                'kategori' => $this->input->post('kategori'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
            );
            $this->m_manajemen_buku->update_data($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah !!!!');
            redirect('buku/index');
        }
    }

    public function delete_dosen($id_buku)
    {
        $data = array('id_buku' => $id_buku);

        $this->m_manajemen_buku->delete_data($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil di Hapus !!!!');
        redirect('buku/index');
    }
}
