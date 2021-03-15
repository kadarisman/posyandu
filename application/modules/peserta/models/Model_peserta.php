<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_peserta extends CI_Model
{
    public function count_peserta()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('level', 'peserta');
        $this->db->join('desa', 'desa.id_desa = user.id_desa');
        return $this->db->count_all();
    }
    public function count_dosen()
    {
        return $this->db->count_all('dosen');
    }

    public function get_all_dosen()
    {
        $this->db->select('*');
        $this->db->from('dosen');
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