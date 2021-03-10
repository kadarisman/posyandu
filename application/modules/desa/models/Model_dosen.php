<?php
defined('BASEPATH') or exit('No direct script access allowed ');

class Model_dosen extends CI_Model
{
    public function count_dosen()
    {
        return $this->db->count_all('dosen');
    }
    public function get_all_dosen()
    {
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->join('prodi', 'prodi.kd_prodi = dosen.kd_prodi');
        return $this->db->get()->result();
    }

    public function add_dosen($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_dosen($data)
    {
        $this->db->where('NIDN', $data['NIDN']);
        $this->db->update('dosen', $data);
    }

    public function delete_dosen($id)
    {
        $this->db->delete('dosen', ['NIDN' => $id]);
    }
}