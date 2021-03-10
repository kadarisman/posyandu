 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Dosen extends CI_Controller
    {

        public function __construct()
        {
            parent::__construct();
            check_login(); // this is a function in login_helper
        }
        //below the methods for managing the dosen table
        public function index()
        {
            $data['title'] = 'Dosen';
            $data['all_Dosen'] = $this->Model_dosen->get_all_dosen();
            $data['total_mahasiswa'] = $this->Model_mahasiswa->count_mahasiswa();
            $data['total_dosen'] = $this->Model_dosen->count_dosen();
            $data['total_prodi'] = $this->Model_prodi->count_prodi();
            $data['selectProdi'] = $this->Model_user->select_where('prodi', 'nama_prodi');
            $data['selectMahasiswa'] = $this->Model_mahasiswa->get_all_mahasiswa();
            $data['user_session'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_dosen', $data);
            $this->load->view('templates/footer');
        }


        public function add_dosen()
        {
            $this->form_validation->set_rules('NIDN', 'Nidn', 'required|trim|is_unique[dosen.NIDN]', [
                'is_unique' => 'Duplikat NIDN..!',
                'required' => 'NIDN tidak boleh kosong..!',
            ]);
            $this->form_validation->set_rules('kd_prodi', 'Kd_prodi', 'required|trim', [
                'required' => 'Kode Prodi tidak boleh kosong..!'
            ]);
            $this->form_validation->set_rules('nama_dosen', 'Nama_dosen', 'required|trim', [
                'required' => 'Nama Dosen tidak boleh kosong..!'
            ]);
            $this->form_validation->set_rules('alamat_dosen', 'Alamat_dosen', 'required|trim', [
                'required' => 'Alamat Dosen tidak boleh kosong..!'
            ]);

            if ($this->form_validation->run() == false) {
                $errors = array(
                    'NIDN_error' => form_error('NIDN'),
                    'kd_prodi_error' => form_error('kd_prodi'),
                    'nama_dosen_error' => form_error('nama_dosen'),
                    'alamat_dosen_error' => form_error('alamat_dosen'),
                );
                echo json_encode(['error' => $errors]);
            } else {
                echo json_encode(['success' => 'Record added successfully.']);
                $data = [
                    'NIDN' => htmlspecialchars($this->input->post('NIDN', true)),
                    'kd_prodi' => htmlspecialchars($this->input->post('kd_prodi', true)),
                    'nama_dosen' => htmlspecialchars($this->input->post('nama_dosen', true)),
                    'alamat_dosen' => htmlspecialchars($this->input->post('alamat_dosen', true)),
                    'status' => 1,
                    'foto' => 'default.jpg',
                    'created' => date('d-m-Y H:i:s')
                ];
                $this->Model_dosen->add_dosen($data, 'dosen');
                $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Tambah</div>');
            }
        }

        public function edit_dosen()
        {
            $data = [
                'NIDN' => htmlspecialchars($this->input->post('NIDN_edit', true)),
                'kd_prodi' => htmlspecialchars($this->input->post('selectProdi_edit', true)),
                'nama_dosen' => htmlspecialchars($this->input->post('nama_dosen_edit', true)),
                'alamat_dosen' => htmlspecialchars($this->input->post('alamat_dosen_edit', true)),
                'status' => htmlspecialchars($this->input->post('status_edit', true)),
                'modifed' => date('d-m-Y H:i:s')
            ];
            $this->Model_dosen->edit_dosen($data);
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Edit</div>');
            redirect('Dosen');
        }


        public function delete_dosen($id)
        {
            $this->Model_dosen->delete_dosen($id);
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert" id="msg">Berhasil di Hapus</div>');
            redirect('Dosen');
        }
        //end for managing the prodi table
    }