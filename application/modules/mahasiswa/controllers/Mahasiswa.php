<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_login(); // this is a function in login_helper
    }

    //below the methods for managing the mahasiswa table
    public function index()
    {
        $data['title'] = 'Mahasiswa';
        $data['all_mahasiswa'] = $this->Model_mahasiswa->get_all_mahasiswa();
        $data['total_mahasiswa'] = $this->Model_mahasiswa->count_mahasiswa();
        $data['total_prodi'] = $this->Model_prodi->count_prodi();
        $data['total_dosen'] = $this->Model_dosen->count_dosen();
        $data['selectProdi'] = $this->Model_user->select_where('prodi', 'nama_prodi');
        $data['selectUnit'] = $this->Model_user->select_where('unit', 'kd_unit');
        $data['selectMahasiswa'] = $this->Model_mahasiswa->get_all_mahasiswa();
        $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('v_mahasiswa', $data);
        $this->load->view('templates/footer');
    }

    public function add_mahasiswa()
    {
        $this->form_validation->set_rules('NPM', 'NPM', 'required|trim|is_unique[mahasiswa.NPM]', [
            'is_unique' => 'NPM sudah ada buat lain..!',
            'required' => 'NPM tidak boleh kosong..!',
        ]);
        $this->form_validation->set_rules('nama_mahasiswa', 'nama_mahasiswa', 'required|trim', [
            'required' => 'Nama tidak boleh kosong..!',
        ]);
        $this->form_validation->set_rules('alamat_mahasiswa', 'alamat_mahasiswa', 'required|trim', [
            'required' => 'Alamat tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('kd_prodi', 'kd_prodi', 'required|trim', [
            'required' => 'Prodi tidak boleh kosong..!'
        ]);
        $this->form_validation->set_rules('kd_unit', 'kd_unit', 'required|trim', [
            'required' => 'Unit tidak boleh kosong..!'
        ]);

        if ($this->form_validation->run() == false) {
            $errors = array(
                'NPM_error' => form_error('NPM'),
                'nama_mahasiswa_error' => form_error('nama_mahasiswa'),
                'alamat_mahasiswa_error' => form_error('alamat_mahasiswa'),
                'prodi_mahasiswa_error' => form_error('kd_prodi'),
                'unit_mahasiswa_error' => form_error('kd_unit'),
            );
            echo json_encode(['error' => $errors]);
        } else {
            echo json_encode(['success' => 'Record added successfully.']);
            $data = [
                'NPM' => htmlspecialchars($this->input->post('NPM', true)),
                'nama_mahasiswa' => htmlspecialchars($this->input->post('nama_mahasiswa', true)),
                'alamat_mahasiswa' => htmlspecialchars($this->input->post('alamat_mahasiswa', true)),
                'kd_prodi' => htmlspecialchars($this->input->post('kd_prodi', true)),
                'kd_unit' => htmlspecialchars($this->input->post('kd_unit', true)),
                'status' => 1,
                'created' => date('d-m-Y H:i:s')
            ];
            $this->Model_mahasiswa->add_mahasiswa($data, 'mahasiswa');
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
        }
    }

    public function edit_mahasiswa()
    {
        $data = [
            'NPM' => htmlspecialchars($this->input->post('NPM', true)),
            'nama_mahasiswa' => htmlspecialchars($this->input->post('nama_mahasiswa', true)),
            'alamat_mahasiswa' => htmlspecialchars($this->input->post('alamat_mahasiswa', true)),
            'kd_prodi' => htmlspecialchars($this->input->post('kd_prodi', true)),
            'kd_unit' => htmlspecialchars($this->input->post('kd_unit', true)),
            'status' =>  htmlspecialchars($this->input->post('status', true)),
            'modifed' => date('d-m-Y H:i:s')
        ];
        $this->Model_mahasiswa->edit_mahasiswa($data);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Edit</div>');
        redirect('Mahasiswa');
    }

    public function delete_mahasiswa($id)
    {
        $this->Model_mahasiswa->delete_mahasiswa($id);
        $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
        redirect('mahasiswa');
    }
    //end for managing the mahasiswa table

}