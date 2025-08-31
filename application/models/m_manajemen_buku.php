<?php
defined('BASEPATH') or exit('No direct script accsess allowed');

class m_manajemen_buku extends CI_Model
{
    public function all_data()
    {
        $this->db->select('*');
        $this->db->from('buku');
        return $this->db->get()->result();
    }


    public function insert_data($data)
    {
        $this->db->insert('buku', $data);
    }

    public function detail_data($id_buku)
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->where('id_buku', $id_buku);
        return $this->db->get()->row();
    }

    public function update_data($data)
    {
        $this->db->where('id_buku', $data['id_buku']);
        $this->db->update('bukul', $data);
    }

    public function delete_data($data)
    {
        $this->db->where('id_buku', $data['id_buku']);
        $this->db->delete('buku', $data);
    }
}
