<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Blueprint extends CI_Model
{

    public function get($data)
    {
        $this->db->select($data['select']);
        $this->db->from($data['table']);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_where($data)
    {
        $this->db->select($data['select']);
        $this->db->where($data['where'], $data['args']);
        $this->db->from($data['table']);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_multiwhere($data)
    {
        $this->db->select($data['select']);
        foreach ($data['where'] as  $val) {
            $this->db->where($val['data'], $val['args']);
        }
        $this->db->from($data['table']);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_distinct($data)
    {
        $this->db->distinct();
        foreach ($data['select'] as  $val) {
            $this->db->select($val);
        }
        $this->db->from($data['table']);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($database, $data)
    {
        $this->db->insert($database, $data);
    }
}
