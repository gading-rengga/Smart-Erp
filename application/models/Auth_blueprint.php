<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth_blueprint extends CI_Model
{
    public function get_user($username, $password)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->join('tbl_employe', 'tbl_employe.ID = tbl_user.reff', 'right');
        $query = $this->db->get();
        return $query->result_array();
    }
}
