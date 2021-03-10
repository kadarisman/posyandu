<?php
defined('BASEPATH') or exit('No direct script access allowed ');

class Model_prodi extends CI_Model
{
    public function count_prodi()
    {
        return $this->db->count_all('prodi');
    }

    public function get_all_prodi()
    {
        $this->db->select('*');
        $this->db->from('prodi');
        return $this->db->get()->result();
    }

    public function add_prodi($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_prodi($data)
    {
        $this->db->where('kd_prodi', $data['kd_prodi']);
        $this->db->update('prodi', $data);
    }

    public function delete_prodi($id)
    {
        $this->db->delete('prodi', ['kd_prodi' => $id]);
    }
}