<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_posyandu extends CI_Model
{
    public function count_all_data_posyandu() //balita
    {
        $this->db->from('posyandu');
        //$this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
        $this->db->join('user', 'user.id_user=posyandu.id_user', 'left');
        //$where = array('user.id_desa' => $desa, 'user.smester' => $smester);
        $this->db->where('user.kriteria', 'Balita');
        // $this->db->query("SELECT * FROM user where id_desa = '.$desa.'");
        return $this->db->count_all_results();
    }
    public function count_all_data_bumil_posyandu() //bumil
    {
        $this->db->from('posyandu');
        //$this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
        $this->db->join('user', 'user.id_user=posyandu.id_user', 'left');
        //$where = array('user.id_desa' => $desa, 'user.smester' => $smester);
        $this->db->where('user.kriteria', 'Ibu Hamil');
        // $this->db->query("SELECT * FROM user where id_desa = '.$desa.'");
        return $this->db->count_all_results();
    }

    public function count_data_posyandu_desa() //balita
    {
        $desa = $this->session->userdata('id_desa');
        $this->db->from('posyandu');
        //$this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
        $this->db->join('user', 'user.id_user=posyandu.id_user', 'left');
        //$where = array('user.id_desa' => $desa, 'user.smester' => $smester);
        $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Balita');
        $this->db->where($where);
        // $this->db->query("SELECT * FROM user where id_desa = '.$desa.'");
        return $this->db->count_all_results();
    }
    public function count_data_posyandu_bumil_desa() //bumil
    {
        $desa = $this->session->userdata('id_desa');
        $this->db->from('posyandu');
        //$this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
        $this->db->join('user', 'user.id_user=posyandu.id_user', 'left');
        $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Ibu Hamil');
        $this->db->where($where);
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

    public function get_all_posyandu_balita_desa()
    {
        $desa = $this->session->userdata('id_desa');
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        $this->db->where('user.id_desa', $desa, 'user.kriteria', 'Balita');
        $this->db->order_by('tahun', 'asc');
        return $this->db->get()->result();
    }
    public function rekap_balita_desa()
    {
        $desa = $this->session->userdata('id_desa');
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $this->db->where('user.id_desa', $desa, 'user.kriteria', 'balita');
        $this->db->order_by('tahun', 'asc');
        return $this->db->get()->result();
    }
    public function rekap_balita_desa_group()
    {
        $desa = $this->session->userdata('id_desa');
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $this->db->where('user.id_desa', $desa, 'user.kriteria', 'balita');
        $this->db->group_by('user.id_user');
        //$this->db->group_by(array('nilai.NIDN', 'nilai.kd_matakuliah', 'nilai.smester', 'nilai.tahun_ajaran'));
        return $this->db->get()->result();
    }

    public function add_posyandu($data)
    {
        $this->db->insert('posyandu', $data);
    }
    public function edit_posyandu($data)
    {
        $this->db->where('id_posyandu', $this->input->post('id_posyandu'));
        $this->db->update('posyandu', $data);
    }
    public function get_posyandu_by_id($id_posyandu)
    {
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        $this->db->where('posyandu.id_posyandu', $id_posyandu);
        return $this->db->get()->row();
    }
    public function delete_posyandu($id_posyandu)
    {
        $this->db->delete('posyandu', ['id_posyandu' => $id_posyandu]);
    }
}