<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{

    public function get_user($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password); // password sudah di-md5 di controller
        return $this->db->get('users')->row();
    }
}
