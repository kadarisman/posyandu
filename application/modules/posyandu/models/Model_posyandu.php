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
    public function count_data_posyandu_ku() //bumil
    {
        $user = $this->session->userdata('id_user');
        $this->db->from('posyandu');
        //$this->db->join('dosen', 'dosen.NIDN = nilai.NIDN', 'left');
        $this->db->join('user', 'user.id_user=posyandu.id_user', 'left');
        $this->db->where('posyandu.id_user', $user);
        // $this->db->query("SELECT * FROM user where id_desa = '.$desa.'");
        return $this->db->count_all_results();
    }
    public function get_all_posyandu_balita()
    {
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        $this->db->where('user.kriteria', 'Balita');
        $this->db->order_by('tahun', 'asc');
        return $this->db->get()->result();
    }
    public function get_all_posyandu_ku()
    {
        $user = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $this->db->where('user.id_user', $user);
        $this->db->order_by('tahun', 'asc');
        return $this->db->get()->result();
    }
    public function get_all_posyandu_bumil()
    {
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        $this->db->where('user.kriteria', 'Ibu Hamil');
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
        $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Balita');
        $this->db->where($where);
        $this->db->order_by('tahun', 'asc');
        return $this->db->get()->result();
    }

    public function rekap_balita()
    {
        $tahun = date('Y');
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        $where = array('user.kriteria' => 'Balita', 'posyandu.tahun' => $tahun);
        $this->db->where($where);
        //$this->db->group_by(array('posyandu.id_user'));
        //$this->db->order_by('tahun', 'asc');
        return $this->db->get()->result();
    }
    public function rekap_balita_desa()
    {
        $tahun = date('Y');
        $desa = $this->session->userdata('id_desa');
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Balita', 'posyandu.tahun' => $tahun);
        $this->db->where($where);
        //$this->db->group_by(array('posyandu.id_user'));
        //$this->db->order_by('tahun', 'asc');
        return $this->db->get()->result();
    }

    public function rekap_bumil()
    {
        $tahun = date('Y');
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        $where = array('user.kriteria' => 'Ibu Hamil', 'posyandu.tahun' => $tahun);
        $this->db->where($where);
        //$this->db->group_by(array('posyandu.id_user'));
        //$this->db->order_by('tahun', 'asc');
        return $this->db->get()->result();
    }

    public function rekap_bumil_desa()
    {
        $tahun = date('Y');
        $desa = $this->session->userdata('id_desa');
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Ibu Hamil', 'posyandu.tahun' => $tahun);
        $this->db->where($where);
        //$this->db->group_by(array('posyandu.id_user'));
        //$this->db->order_by('tahun', 'asc');
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
        //$this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        //$where = array('posyandu.id_posyandu' => $id_posyandu, 'user.kriteria' => 'Balita');
        $this->db->where('posyandu.id_posyandu', $id_posyandu);
        return $this->db->get()->row();
    }

    // public function get_posyandu_by_id_bumil($id_posyandu)
    // {
    //     $this->db->select('*');
    //     $this->db->from('posyandu');
    //     $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
    //     $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
    //     $where = array('posyandu.id_posyandu' => $id_posyandu, 'user.kriteria' => 'Ibu Hamil');
    //     $this->db->where($where);
    //     return $this->db->get()->row();
    // }
    public function delete_posyandu($id_posyandu)
    {
        $this->db->delete('posyandu', ['id_posyandu' => $id_posyandu]);
    }

    public function filter_tahun_balita($tahun)
    {
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        $where = array('user.kriteria' => 'Balita', 'posyandu.tahun' => $tahun);
        $this->db->where($where);
        //$this->db->group_by(array('posyandu.id_user'));
        //$this->db->order_by('tahun', 'asc');
        return $this->db->get()->result();
    }

    public function filter_tahun_balita_desa($tahun)
    {
        $desa = $this->session->userdata('id_desa');
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Balita', 'posyandu.tahun' => $tahun);
        $this->db->where($where);
        //$this->db->group_by(array('posyandu.id_user'));
        //$this->db->order_by('tahun', 'asc');
        return $this->db->get()->result();
    }

    public function filter_tahun_bumil($tahun)
    {
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        $where = array('user.kriteria' => 'Ibu Hamil', 'posyandu.tahun' => $tahun);
        $this->db->where($where);
        //$this->db->group_by(array('posyandu.id_user'));
        //$this->db->order_by('tahun', 'asc');
        return $this->db->get()->result();
    }

    // public function cari_posyandu_bumil($id_posyandu)
    // {
    //     $this->db->select('*');
    //     $this->db->from('posyandu');
    //     //$where = array('posyandu.id_posyandu' => $id_posyandu);
    //     $this->db->where('id_posyandu', $id_posyandu);
    //     //$this->db->group_by(array('posyandu.id_user'));
    //     //$this->db->order_by('tahun', 'asc');
    //     return $this->db->get()->row();
    // }

    public function filter_tahun_bumil_desa($tahun)
    {
        $desa = $this->session->userdata('id_desa');
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Ibu Hamil', 'posyandu.tahun' => $tahun);
        $this->db->where($where);
        //$this->db->group_by(array('posyandu.id_user'));
        //$this->db->order_by('tahun', 'asc');
        return $this->db->get()->result();
    }

    public function get_all_posyandu_bumil_desa()
    {
        $tahun = date('Y');
        $desa = $this->session->userdata('id_desa');
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Ibu Hamil', 'posyandu.tahun' => $tahun);
        $this->db->where($where);
        //$this->db->order_by('tahun', 'asc');
        return $this->db->get()->result();
    }

    //query untuk view data posyandu di beranda view desa
    public function get_all_posyandu_bumil_b($id_desa)
    {
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        $where = array('user.id_desa' => $id_desa, 'user.kriteria' => 'Ibu Hamil');
        $this->db->where($where);
        $this->db->order_by('tahun', 'asc');
        return $this->db->get()->result();
    }

    public function get_all_posyandu_balita_b($id_desa)
    {
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $this->db->join('desa', 'desa.id_desa = user.id_desa', 'left');
        $where = array('user.id_desa' => $id_desa, 'user.kriteria' => 'Balita');
        $this->db->where($where);
        $this->db->order_by('tahun', 'asc');
        return $this->db->get()->result();
    }
    //end

    public function get_all_posyandu_bumil_desa_group()
    {
        $tahun = date('Y');
        $desa = $this->session->userdata('id_desa');
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Ibu Hamil', 'posyandu.tahun' => $tahun);
        $this->db->where($where);
        $this->db->group_by('posyandu.id_user', 'asc');
        return $this->db->get()->result();
    }

    public function get_all_posyandu_bumil_group()
    {
        $tahun = date('Y');
        $this->db->select('*');
        $this->db->from('posyandu');
        $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
        $where = array('user.kriteria' => 'Ibu Hamil', 'posyandu.tahun' => $tahun);
        $this->db->where($where);
        $this->db->group_by('posyandu.id_user', 'asc');
        return $this->db->get()->result();
    }


    // public function rekap_bulan1_desa($tahun)
    // {
    //     $desa = $this->session->userdata('id_desa');
    //     $this->db->select('*');
    //     $this->db->from('posyandu');
    //     $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
    //     $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Balita', 'posyandu.tahun' => $tahun, 'posyandu.bulan' => 'Januari');
    //     $this->db->where($where);
    //     $this->db->group_by('posyandu.id_user');
    //     //$this->db->order_by('tahun', 'asc');
    //     return $this->db->get()->result();
    // }

    // public function rekap_bulan2_desa($tahun)
    // {
    //     $desa = $this->session->userdata('id_desa');
    //     $this->db->select('*');
    //     $this->db->from('posyandu');
    //     $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
    //     $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Balita', 'posyandu.tahun' => $tahun, 'posyandu.bulan' => 'Februari');
    //     $this->db->where($where);
    //     //$this->db->group_by(array('posyandu.id_user'));
    //     //$this->db->order_by('tahun', 'asc');
    //     return $this->db->get()->result();
    // }

    // public function rekap_bulan3_desa($tahun)
    // {
    //     $desa = $this->session->userdata('id_desa');
    //     $this->db->select('*');
    //     $this->db->from('posyandu');
    //     $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
    //     $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Balita', 'posyandu.tahun' => $tahun, 'posyandu.bulan' => 'Maret');
    //     $this->db->where($where);
    //     //$this->db->group_by(array('posyandu.id_user'));
    //     //$this->db->order_by('tahun', 'asc');
    //     return $this->db->get()->result();
    // }
    // public function rekap_bulan4_desa($tahun)
    // {
    //     $desa = $this->session->userdata('id_desa');
    //     $this->db->select('*');
    //     $this->db->from('posyandu');
    //     $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
    //     $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Balita', 'posyandu.tahun' => $tahun, 'posyandu.bulan' => 'April');
    //     $this->db->where($where);
    //     //$this->db->group_by(array('posyandu.id_user'));
    //     //$this->db->order_by('tahun', 'asc');
    //     return $this->db->get()->result();
    // }
    // public function rekap_bulan5_desa($tahun)
    // {
    //     $desa = $this->session->userdata('id_desa');
    //     $this->db->select('*');
    //     $this->db->from('posyandu');
    //     $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
    //     $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Balita', 'posyandu.tahun' => $tahun, 'posyandu.bulan' => 'Mei');
    //     $this->db->where($where);
    //     //$this->db->group_by(array('posyandu.id_user'));
    //     //$this->db->order_by('tahun', 'asc');
    //     return $this->db->get()->result();
    // }
    // public function rekap_bulan6_desa($tahun)
    // {
    //     $desa = $this->session->userdata('id_desa');
    //     $this->db->select('*');
    //     $this->db->from('posyandu');
    //     $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
    //     $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Balita', 'posyandu.tahun' => $tahun, 'posyandu.bulan' => 'Juni');
    //     $this->db->where($where);
    //     //$this->db->group_by(array('posyandu.id_user'));
    //     //$this->db->order_by('tahun', 'asc');
    //     return $this->db->get()->result();
    // }
    // public function rekap_bulan7_desa($tahun)
    // {
    //     $desa = $this->session->userdata('id_desa');
    //     $this->db->select('*');
    //     $this->db->from('posyandu');
    //     $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
    //     $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Balita', 'posyandu.tahun' => $tahun, 'posyandu.bulan' => 'Juli');
    //     $this->db->where($where);
    //     //$this->db->group_by(array('posyandu.id_user'));
    //     //$this->db->order_by('tahun', 'asc');
    //     return $this->db->get()->result();
    // }
    // public function rekap_bulan8_desa($tahun)
    // {
    //     $desa = $this->session->userdata('id_desa');
    //     $this->db->select('*');
    //     $this->db->from('posyandu');
    //     $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
    //     $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Balita', 'posyandu.tahun' => $tahun, 'posyandu.bulan' => 'Agustus');
    //     $this->db->where($where);
    //     //$this->db->group_by(array('posyandu.id_user'));
    //     //$this->db->order_by('tahun', 'asc');
    //     return $this->db->get()->result();
    // }
    // public function rekap_bulan9_desa($tahun)
    // {
    //     $desa = $this->session->userdata('id_desa');
    //     $this->db->select('*');
    //     $this->db->from('posyandu');
    //     $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
    //     $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Balita', 'posyandu.tahun' => $tahun, 'posyandu.bulan' => 'September');
    //     $this->db->where($where);
    //     //$this->db->group_by(array('posyandu.id_user'));
    //     //$this->db->order_by('tahun', 'asc');
    //     return $this->db->get()->result();
    // }
    // public function rekap_bulan10_desa($tahun)
    // {
    //     $desa = $this->session->userdata('id_desa');
    //     $this->db->select('*');
    //     $this->db->from('posyandu');
    //     $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
    //     $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Balita', 'posyandu.tahun' => $tahun, 'posyandu.bulan' => 'Oktober');
    //     $this->db->where($where);
    //     //$this->db->group_by(array('posyandu.id_user'));
    //     //$this->db->order_by('tahun', 'asc');
    //     return $this->db->get()->result();
    // }
    // public function rekap_bulan11_desa($tahun)
    // {
    //     $desa = $this->session->userdata('id_desa');
    //     $this->db->select('*');
    //     $this->db->from('posyandu');
    //     $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
    //     $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Balita', 'posyandu.tahun' => $tahun, 'posyandu.bulan' => 'November');
    //     $this->db->where($where);
    //     //$this->db->group_by(array('posyandu.id_user'));
    //     //$this->db->order_by('tahun', 'asc');
    //     return $this->db->get()->result();
    // }
    // public function rekap_bulan12_desa($tahun)
    // {
    //     $desa = $this->session->userdata('id_desa');
    //     $this->db->select('*');
    //     $this->db->from('posyandu');
    //     $this->db->join('user', 'user.id_user = posyandu.id_user', 'left');
    //     $where = array('user.id_desa' => $desa, 'user.kriteria' => 'Balita', 'posyandu.tahun' => $tahun, 'posyandu.bulan' => 'Desember');
    //     $this->db->where($where);
    //     //$this->db->group_by(array('posyandu.id_user'));
    //     //$this->db->order_by('tahun', 'asc');
    //     return $this->db->get()->result();
    // }
}