<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_login extends CI_Model
{
    public function desa_session()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        return $this->db->get()->row_array();
    }
    public function panitia_session()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        return $this->db->get()->row_array();
    }
    public function peserta_session()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        return $this->db->get()->row_array();
    }
}