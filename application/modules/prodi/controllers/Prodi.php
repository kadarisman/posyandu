<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_login(); // this is a function in login_helper
    }

    //below the methods for managing the prodi table
    public function index()
    {
        $data['title'] = 'Prodi';
        $data['all_prodi'] = $this->Model_prodi->get_all_prodi();
        $data['total_mahasiswa'] = $this->Model_mahasiswa->count_mahasiswa();
        $data['total_prodi'] = $this->Model_prodi->count_prodi();
        $data['total_dosen'] = $this->Model_dosen->count_dosen();
        $data['selectProdi'] = $this->Model_user->select_where('prodi', 'nama_prodi');
        $data['selectMahasiswa'] = $this->Model_mahasiswa->get_all_mahasiswa();
        $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('v_prodi', $data);
        $this->load->view('templates/footer');
    }

    public function add_prodi()
    {
        $this->form_validation->set_rules('kd_prodi', 'Kd_prodi', 'required|trim|is_unique[prodi.kd_prodi]', [
            'is_unique' => 'Kode Prodi sudah ada buat lain..!',
            'required' => 'Kode Prodi tidak boleh kosong..!',
        ]);
        $this->form_validation->set_rules('nama_prodi', 'Nama_prodi', 'required|trim', [
            'required' => 'Nama Prodi tidak boleh kosong..!'
        ]);

        if ($this->form_validation->run() == false) {
            $errors = array(
                'kd_prodi_error' => form_error('kd_prodi'),
                'nama_prodi_error' => form_error('nama_prodi'),
            );
            echo json_encode(['error' => $errors]);
        } else {
            echo json_encode(['success' => 'Record added successfully.']);
            $data = [
                'kd_prodi' => htmlspecialchars($this->input->post('kd_prodi', true)),
                'nama_prodi' => htmlspecialchars($this->input->post('nama_prodi', true)),
                'created' => date('d-m-Y H:i:s')
            ];
            $this->Model_prodi->add_prodi($data, 'prodi');
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
        }
    }

    public function edit_prodi()
    {
        $data = [
            'kd_prodi' => $this->input->post('kd_prodi', true),
            'nama_prodi' => $this->input->post('nama_prodi', true),
            'modifed' => date('d-m-Y H:i:s')
        ];
        $this->Model_prodi->edit_prodi($data);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Edit</div>');
        redirect('Prodi');
    }

    public function delete_prodi($id)
    {
        $this->Model_prodi->delete_prodi($id);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('Prodi');
    }
    //end for managing the prodi table

}