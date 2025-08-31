<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_mahasiswa extends CI_Model
{
    //menampilkan seluruh data
    public function all_data()
    {

        $this->db->select('*');
        $this->db->from('tbl_mahasiswa');
        $this->db->join('tbl_fakultas', 'tbl_fakultas.id_fakultas = tbl_mahasiswa.id_fakultas', 'left');
        $this->db->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_mahasiswa.id_prodi', 'left');


        return $this->db->get()->result();
    }

    //Insert data ke database
    public function insert_data($data)
    {
        $this->db->insert('tbl_mahasiswa', $data);
    }

    public function detail_data($id_mahasiswa)
    {
        $this->db->select('*');
        $this->db->from('tbl_mahasiswa');
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        return $this->db->get()->row();
    }


    public function update_data($data)
    {
        $this->db->where('id_mahasiswa', $data['id_mahasiswa']);
        $this->db->update('tbl_mahasiswa', $data);
    }

    public function delete_data($data)
    {
        $this->db->where('id_mahasiswa', $data['id_mahasiswa']);
        $this->db->delete('tbl_mahasiswa', $data);
    }

    public function total_mahasiswa()
    {
        return $this->db->count_all('tbl_mahasiswa');
    }
}
