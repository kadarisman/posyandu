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
    public function get_desa_name($id_desa)
    {
        $this->db->select('*');
        $this->db->where('id_desa', $id_desa);
        return $this->db->get('desa')->row();
    }
    public function create_DB($data)
    {
        $this->db->insert('desa', $data);
    }
}