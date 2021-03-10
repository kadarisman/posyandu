<?php
defined('BASEPATH') or exit('No direct script access allowed ');

class Model_mahasiswa extends CI_Model
{

    public function get_all_mahasiswa()
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('prodi', 'prodi.kd_prodi=mahasiswa.kd_prodi');
        $this->db->order_by('nama_prodi', 'asc');
        return $this->db->get()->result();
    }

    public function count_mahasiswa()
    {
        return $this->db->count_all('mahasiswa');
    }

    public function add_mahasiswa($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_mahasiswa($data)
    {
        $this->db->where('NPM', $data['NPM']);
        $this->db->update('mahasiswa', $data);
    }

    public function delete_mahasiswa($id)
    {
        $this->db->delete('mahasiswa', ['NPM' => $id]);
    }
}