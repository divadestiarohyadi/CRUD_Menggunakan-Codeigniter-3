<?php
defined('BASEPATH') or exit ('No direct script accsess allowed');

class m_dosen extends CI_Model
{
    public function all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_dosen');
        return $this->db->get()->result();
    }


    public function insert_data($data)
    {
        $this->db->insert('tbl_dosen', $data);
    }

    public function detail_data($id_dosen)
    {
        $this->db->select('*');
        $this->db->from('tbl_dosen');
        $this->db->where('id_dosen', $id_dosen);
        return $this->db->get()->row();
    }

    public function update_data($data)
    {
        $this->db->where('id_dosen', $data['id_dosen']);
        $this->db->update('tbl_dosen', $data);
        
        
    }

    public function delete_data($data)
    {
        $this->db->where('id_dosen', $data['id_dosen']);
        $this->db->delete('tbl_dosen', $data);
        
        

    }
}

?>