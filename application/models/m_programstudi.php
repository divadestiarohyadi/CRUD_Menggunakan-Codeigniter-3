<?php
defined('BASEPATH') or exit ('No direct script access allowed');


class m_programstudi extends CI_Model
{
    public function all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_programstudi');
        return $this->db->get()->result();
    }

    public function insert_data($data)
    {
        $this->db->insert('tbl_programstudi', $data);
        
    }
}
?>