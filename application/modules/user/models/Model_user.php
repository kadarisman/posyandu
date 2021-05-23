<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{
    //below this codeigniter querys builder to process data users from the database :

    public function get_all_user_admin() // query get all data user from user table
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('level', 'admin');
        return $this->db->get()->result();
    }
    public function get_all_user_desa() // query get all data user from user table
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        $this->db->where('level', 'desa');
        return $this->db->get()->result();
    }

    public function get_all_user_peserta() // query get all data user from user table
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        $this->db->order_by('kriteria', 'asc');
        // $where = array('user.kriteria' => 'Balita', 'user.level' => 'peserta');
        $this->db->where('user.level', 'peserta');
        return $this->db->get()->result();
    }

    public function get_all_user_peserta_balita() // query get all data user from user table
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        $this->db->order_by('kriteria', 'asc');
        $where = array('user.kriteria' => 'Balita', 'user.level' => 'peserta');
        $this->db->where($where);
        return $this->db->get()->result();
    }

    public function get_all_user_peserta_bumil() // query get all data user from user table
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        $this->db->order_by('kriteria', 'asc');
        $where = array('user.kriteria' => 'Ibu Hamil', 'user.level' => 'peserta');
        $this->db->where($where);
        return $this->db->get()->result();
    }

    public function get_all_user_panitia() // query get all data user from user table
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        $this->db->where('level', 'panitia');
        return $this->db->get()->result();
    }

    public function get_all_user_peserta_desa() // query get all data user from user table
    {
        $desa = $this->session->userdata('id_desa');
        $this->db->from('user');
        $this->db->where('id_desa', $desa);
        //$where = array('user.id_desa' => $desa, 'user.kriteria' => 'Balita', 'user.level' => 'peserta');
        $this->db->where('user.level', 'peserta');
        // $this->db->query("SELECT * FROM user where id_desa = '.$desa.'");
        return $this->db->get()->result();
    }

    public function get_all_user_peserta_desa_balita() // query get all data user from user table
    {
        $desa = $this->session->userdata('id_desa');
        $this->db->from('user');
        $this->db->where('id_desa', $desa);
        $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Balita', 'user.level' => 'peserta');
        $this->db->where($where);
        // $this->db->query("SELECT * FROM user where id_desa = '.$desa.'");
        return $this->db->get()->result();
    }

    public function get_all_user_peserta_desa_bumil() // query get all data user from user table
    {
        $desa = $this->session->userdata('id_desa');
        $this->db->from('user');
        $this->db->where('id_desa', $desa);
        $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Ibu Hamil', 'user.level' => 'peserta');
        $this->db->where($where);
        // $this->db->query("SELECT * FROM user where id_desa = '.$desa.'");
        return $this->db->get()->result();
    }


    public function get_all_user_panitia_desa() // query get all data user from user table
    {
        $desa = $this->session->userdata('id_desa');
        $this->db->from('user');
        $this->db->where('id_desa', $desa);
        $this->db->where('level', 'panitia');
        // $this->db->query("SELECT * FROM user where id_desa = '.$desa.'");
        return $this->db->get()->result();
    }

    public function get_user_by_id($id_user)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        $this->db->where('id_user', $id_user);
        return $this->db->get()->row();
    }

    public function add_user($data)
    {
        $this->db->insert('user', $data);
    }

    public function edit_user($data)
    {
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }

    public function delete_user($id_user)
    {
        $this->db->delete('user', ['id_user' => $id_user]);
    }

    public function select_where($table, $orderBy)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($orderBy, "asc");
        return $this->db->get()->result();
    }


    public function count_all_user_pesrta() // pengen lon hitung dile bg
    {
        $this->db->where('level', 'peserta');
        return $this->db->count_all_results('user');
    }

    public function count_user_pesrta_desa() // method nyo
    {
        $desa = $this->session->userdata('id_desa');
        $this->db->from('user');
        $this->db->where('id_desa', $desa);
        $this->db->where('level', 'peserta');
        // $this->db->query("SELECT * FROM user where id_desa = '.$desa.'");
        return $this->db->count_all_results();
    }
    public function count_user_panitia_desa() // method nyo
    {
        $desa = $this->session->userdata('id_desa');
        $this->db->from('user');
        $this->db->where('id_desa', $desa);
        $this->db->where('level', 'panitia');
        // $this->db->query("SELECT * FROM user where id_desa = '.$desa.'");
        return $this->db->count_all_results();
    }

    // public function hitung_coba() // method nyo
    // {
    //     // $this->db->where('username', $this->session->userdata('username')); 

    //     $desa = $this->session->userdata('id_desa');
    //     $this->db->from('user');
    //     $this->db->where('id_desa', $desa);
    //     $this->db->where('level', 'peserta');
    //     // $this->db->query("SELECT * FROM user where id_desa = '.$desa.'");
    //     return $this->db->count_all_results();
    // }


    public function count_all_user_panitia()
    {
        $this->db->where('level', 'panitia');
        return $this->db->count_all_results('user');
    }


    public function count_admin_user()
    {
        return $this->db
            ->where(['level' => 'admin'])
            ->from('user')
            ->count_all_results();
    }
    public function count_admin_desa()
    {
        return $this->db
            ->where(['level' => 'desa'])
            ->from('user')
            ->count_all_results();
    }



    public function count_dosen_user()
    {
        return $this->db
            ->where(['level' => 'dosen'])
            ->from('user')
            ->count_all_results();
    }

    public function count_mahasiswa_user()
    {
        return $this->db
            ->where(['level' => 'mahasiswa'])
            ->from('user')
            ->count_all_results();
    }

    public function user_prodi_get_data() //query for user prodi get self data in table prodi
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->join('prodi', 'prodi.kd_prodi = user.kd_prodi');
        return $this->db->get()->row_array();
    }

    public function user_dosen_get_data() //query for user dosen get self data in table dosen
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->join('dosen', 'dosen.NIDN = user.username');
        return $this->db->get()->row_array();
    }

    public function user_mahasiswa_get_data() //query for user mahasiswa get self data in table mahasiswa
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->join('mahasiswa', 'mahasiswa.NPM = user.username');
        return $this->db->get()->row_array();
    }
}

/* End of file Model_user.php */