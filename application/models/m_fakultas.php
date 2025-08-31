<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class m_fakultas extends CI_Model 
{
    public function all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_fakultas');
        return $this->db->get()->result(); 
    }

    public function insert_data($data)
    {
        $this->db->insert('tbl_fakultas', $data);
        
    }

    public function detail_data($id_fakultas)
    {
        $this->db->select('*');
        $this->db->from('tbl_fakultas');
        $this->db->where('id_fakultas', $id_fakultas);
        return $this->db->get()->row();
    }


    public function update_data($data)
    {
        $this->db->where('id_fakultas', $data['id_fakultas']);
        $this->db->update('tbl_fakultas', $data);
    }

    public function delete_data($data)
    {
        $this->db->where('id_fakultas', $data['id_fakultas']);
        $this->db->delete('tbl_fakultas', $data);
        
        
    }
}
?>