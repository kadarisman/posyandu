<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_posyandu extends CI_Model
{
    public function count_all_data_posyandu()
    {
        return $this->db->count_all_results('posyandu');
    }

    public function count_data_posyandu_desa()
    {
        $desa = $this->session->userdata('id_desa');
        $this->db->from('posyandu');
        //$this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
        $this->db->join('user', 'user.id_user=posyandu.id_user', 'left');
        //$where = array('user.id_desa' => $desa, 'user.smester' => $smester);
        $this->db->where('user.id_desa', $desa);
        // $this->db->query("SELECT * FROM user where id_desa = '.$desa.'");
        return $this->db->count_all_results();
    }
    public function get_all_posyandu()
    {
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        $this->db->order_by('tahun', 'asc');
        return $this->db->get()->result();
    }

    public function get_all_posyandu_desa()
    {
        $desa = $this->session->userdata('id_desa');
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        $this->db->where('user.id_desa', $desa);
        $this->db->order_by('tahun', 'asc');
        return $this->db->get()->result();
    }
    public function add_posyandu($data)
    {
        $this->db->insert('posyandu', $data);
    }
}