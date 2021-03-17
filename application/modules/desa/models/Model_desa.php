<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_desa  extends CI_Model
{

    public function get_all_desa()
    {
        $this->db->select('*');
        $this->db->from('desa');
        $this->db->order_by('nama_desa', 'asc');
        return $this->db->get()->result();
    }
    public function count_all_desa()
    {
        return $this->db->count_all_results('desa');
    }

    // public function count_peserta_desa()
    // {
    //     $this->db->select('*, count(id_desa) AS hitung');
    //     $this->db->join('user', 'id_desa');
    //     $this->db->group_by('user.id_desa');
    //     $this->db->where('level', 'peserta');
    //     //$this->db->or_where('level', 'desa');
    //     return $this->db->get('desa')->result();

    //     // return $this->db->query("SELECT *, count(id_desa) AS hitung FROM user  LEFT JOIN desa USING(id_desa) WHERE user.level='peserta' GROUP BY user.id_desa")->result();

    //     //SELECT b.nama_desa, count(a.id_desa) AS total_peserta FROM user a LEFT JOIN desa b USING(id_desa) WHERE a.level='peserta' GROUP BY a.id_desa
    // }

    public function get_desa_name($id_desa)
    {
        $this->db->select('*');
        return $this->db->get_where('desa', ['id_desa' => $id_desa])->row();
    }
    public function create_DB($data)
    {
        $this->db->insert('desa', $data);
    }
}